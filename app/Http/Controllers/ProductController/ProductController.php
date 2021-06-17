<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\ChildSubCategory;
use App\ProductVariation;
use App\Brand;
use App\User;
use App\ProductColor;
use App\ProductImage;
use Storage;
use App\Product;
use App\Attribute;
use App\productSpecification;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;


class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
       
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $product = Product::get();

            $perPage = count($product);

            if (!empty($keyword)) {
                $product = Product::where('product_type_id', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->orWhere('subcategory_id', 'LIKE', "%$keyword%")
                ->orWhere('child_subcategory_id', 'LIKE', "%$keyword%")
                ->orWhere('brand_id', 'LIKE', "%$keyword%")
                ->orWhere('tags', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('front_image', 'LIKE', "%$keyword%")
                ->orWhere('colors', 'LIKE', "%$keyword%")
                ->orWhere('options', 'LIKE', "%$keyword%")
                ->orWhere('sale_price', 'LIKE', "%$keyword%")
                ->orWhere('perchase_price', 'LIKE', "%$keyword%")
                ->orWhere('discount', 'LIKE', "%$keyword%")
                ->orWhere('discount_type', 'LIKE', "%$keyword%")
                ->orWhere('shipping_cost', 'LIKE', "%$keyword%")
                ->orderBy('id', 'DESC')
                ->paginate($perPage);
            } else {
                $user_id = auth()->user()->id;
                $user    = User::findorfail($user_id);
                if( $user_id ==1){
                    $added_by_id = $user_id;
                    $product = Product::with('category','subCategory','subChildCategory')->orderBy('id', 'DESC')->paginate($perPage);

                }else{
                    $vendor_id   = $user_id;
                    $added_by_id = $vendor_id;
                    $product = Product::with('category','subCategory','subChildCategory')->where('added_by_id',$added_by_id)->orderBy('id', 'DESC')->paginate($perPage);

                }    
            }

            return view('product.product.index', compact('product'));
        }
        return response(view('403'), 403);

    }

    public function create(){
        $model = str_slug('product','-');
        $brands = Brand::all();
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('product.product.create',compact('brands'));
        }
        return response(view('403'), 403);

    }

    public function store(Request $request){

       
        date_default_timezone_set("Asia/Karachi");
       
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
                // 'tags'              => 'required',
                // 'size'              => 'required',
                // 'fabric'            => 'required',
                // 'colors'            => 'required',
		]);

        $user_id    = auth()->user()->id;
        $user       = User::findorfail($user_id);
      
        $product    = new Product;
        if( $user_id == 1)
        {
           
            $added_by_id                = $user_id;
            $added_by_type              = "admin";
            $product->product_type_id   = $request->product_type_id;
        }
        else
        {
           
            // $vendor_id                  = $user->vendor['id'];
            // dd($vendor_id);
            // $vendor_type_id             = $user->vendor['vendor_type_id'];
            // $added_by_id                = $vendor_id;
            // $added_by_type              = "vendor";
            // $product->product_type_id   = $vendor_type_id;
            $added_by_id                = $user_id;
            $added_by_type              = "vendor";
            $product->product_type_id   = $request->product_type_id;

        }
        $product->added_by_id           = $added_by_id;
        $product->added_by_type         = $added_by_type;
        $product->name                  = $request->name;
        $product->sku                   = $request->sku;
        $product->category_id           = $request->category_id;
        $product->subcategory_id	    = $request->subcategory_id;
        $product->child_subcategory_id  = $request->child_subcategory_id;
        $product->brand_id              = $request->brand_id;
        $product->description           = @$request->description;
        $product->is_featured           = @$request->is_featured_active;
        $product->is_specification      = @$request->specification_active;
        $product->date                  = date('Y-m-d H:i:s');
        $product->sale_price            = @$request->commission+intval($request->sale_price);
        // $product->dollor                = @$request->dollor;
        // $product->riyal                 = @$request->riyal;
        // $product->dinar                 = @$request->dinar;
        // $product->euro                  = @$request->euro;
        $product->purchase_price        = @$request->perchase_price;
        // $product->discount              = @$request->discount;
        // $product->discount_type         = @$request->discount_type;
        $product->shipping_cost         = @$request->shipping_cost;
        $product->commission            = @$request->commission;

        $tags                    = array();
        if($request->tags[0] != null){
            foreach (json_decode($request->tags[0]) as $key => $tag) {
                array_push($tags, $tag->value);
            }
        }
        $product->tags                  = implode(',', $tags);

        $sizes                    = array();
        if($request->size[0] != null){
            foreach (json_decode($request->size[0]) as $key => $size) {
                array_push($sizes, $size->value);
            }
        }
        $product->size                  = implode(',', $sizes);

        $fabrics                    = array();
        if($request->fabric[0] != null){
            foreach (json_decode($request->fabric[0]) as $key => $fabric) {
                array_push($fabrics, $fabric->value);
            }
        }
        $product->fabric                  = implode(',', $fabrics);
       
        $product->num_of_imgs           = count($request->thumbnail_image) + 1;
        $product->url_name              = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name));
        if( $request->has('colors')){
            if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                $color_codes = implode(', ', $request->colors);
                $result_color_ids = \App\ProductColor::select('id')->whereIn('color_code', $request->colors)->get();

                $color_ids =[];
                foreach ($result_color_ids as $key => $value)
                {
                    array_push($color_ids,$value->id);
                }
            
                $product->colors = json_encode($color_ids);
                
            }else {
            
                $colors = array();
                $product->colors = json_encode($colors);
            }
        }
        // $stock = 0;
        // if(sizeof($request->qty)){
        //     for($qty = 0; $qty < count($request->qty); $qty++){
        //         $stock = $stock + $request->qty[$qty];
        //     }
        // }
      
        // $product->current_stock = $stock;
    
        $product->save();
  
        $str   = array();

        if( @$request->has('colors')){
         
            for($i=0; $i<count(@$request->colors); $i++){
                $product_stock             = new ProductVariation;
                $product_stock->product_id = @$product->id;
               
                if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                        $color_name = \App\ProductColor::where('color_code', $request->colors[$i])->first()->name;
                      
                        array_push($str, $color_name);
                   
                }
               
                $product_stock->color = @$str[$i];
                $product_stock->stock = @$request->qty[$i];
                $product_stock->save();
   
           }
        }

        $specification = count($request->specification);
        if( $specification > 0){
            for($i = 1; $i < $specification; $i++){
                $specifications                            = new  productSpecification;
                $specifications->product_id                = $product->id;
                $specifications->specification_title       = $request->specification_name[$i];
                $specifications->specification_description = $request->specification[$i];
                $specifications->save();

            }
        }

        $logo =  "product_".$product->id."_1.".$request->front_image->extension();
        $request->front_image->move(public_path('website/productImages'), $logo);
        $this->addImages($request->thumbnail_image,$product->id);
        return redirect('product/product')->with('message', 'Product added!');
        }
        return response(view('403'), 403);
    }

    function addImages($imgArray,$product_id){
        $pro_num = 1;
        for ($i = 0; $i < count($imgArray); $i++)
        {
            $pro_num++;
            $product_image =  "product_".$product_id."_".$pro_num.".".$imgArray[$i]->extension();
            $imgArray[$i]->move(public_path('website/productImages'), $product_image);
   
        }
        return true;
    }

    public function combinations($arrays) {
      
        $result = array(array());
        foreach ($arrays as $property => $property_values) {
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
      
        return $result;
    }

    public function sku_combination(Request $request){
     
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
          
        }
        else {
            $colors_active = 0;
        }

        $unit_price = $request->sale_price;
        $product_name = $request->name;

        if($request->has('choice_no')){
        
            foreach ($request->choice_no as $key => $no) {
            
                $name = 'choice_options_'.$no;
               
                $data = array();
    
                foreach (json_decode($request[$name][0]) as $key => $item) {
                 
                    array_push($data, $item->value);
                }
               
                array_push($options, $data);
            }
          

        }
            $str = array();
        

            if( $request->has('colors')){
            
            for($i=0; $i<count($request->colors); $i++){
    
                if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                    $color_name = \App\ProductColor::where('color_code', $request->colors[$i])->first()->name;
                    array_push($str, $color_name);
            
                }
            
            }
       
        }
        if($request->product_id != null){
            $product_id = $request->product_id;
            $product_stock   = ProductVariation::where('product_id',$request->product_id)->get();
            $combinations = $this->combinations($options);
            return view('product.product.sku_combinations', compact('combinations', 'unit_price', 'colors_active','product_id','str', 'product_name','product_stock'));
    
        }

        $combinations = $this->combinations($options);
       
        return view('product.product.sku_combinations', compact('combinations', 'unit_price', 'colors_active','str', 'product_name'));

    }

    public function sku_combination_edit(Request $request){
        $product = Product::findOrFail($request->id);
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
         
            $colors_active = 1;
            array_push($options, $request->colors);
        }
        else {
            $colors_active = 0;
        }

        $product_name = $request->name;
        $unit_price = $request->sale_price;
        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $data = array();
            
                foreach (json_decode($request[$name][0]) as $key => $item) {
                    array_push($data, $item->value);
                }
                array_push($options, $data);
            }
        }

        $combinations =  $this->combinations($options);
        return view('product.product.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
    }
   
    public function show($id){
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $product = Product::with('category','subCategory','subChildCategory','productVariaction','brand','productSpecification')->findOrFail($id);
           
            return view('product.product.show', compact('product'));
        }
        return response(view('403'), 403);
    }

    public function edit($id){
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $product = Product::findOrFail($id);
            $user_id = auth()->user()->id;
            $user    = User::findorfail($user_id);
            if( $user_id ==1)
            {
                $Categories         = Category::select('id','name','url_name','category_type_id')->where('status',1)->get();
                $subCategories      = SubCategory::select('id','name','url_name','category_id')->where('status',1)->get();
                $childSubCategories = ChildSubCategory::select('id','name','url_name','sub_category_id')->where('status',1)->get();
               
                $brands     = Brand::orderBy('id','desc')->get();
            }
            else
            {
                // $vendor_type_id = $user->vendor['vendor_type_id'];
                // $Categories         = Category::select('id','name','url_name','category_type_id','level_name')
                //                                 ->where('status',1)
                //                                 ->where('category_type_id',$category_type_id)->get();
                // $subCategories      = SubCategory::select('id','name','url_name','category_id')->where('status',1)->get();
                // $childSubCategories = ChildSubCategory::select('id','name','url_name','sub_category_id')->where('status',1)->get();
               
                // $vendor_type_id = $user->vendor['vendor_type_id'];
                $vendor_type_id = $user_id;
                // $Categories     = Category::select('id','name','url_name','category_type_id')->where('status',1)->where('category_type_id',$vendor_type_id)->get();
                // $brands         = Brand::orderBy('id','desc')->where('brand_type_id',$vendor_type_id)->get();
                $Categories         = Category::select('id','name','url_name','category_type_id')->where('status',1)->get();
                $subCategories      = SubCategory::select('id','name','url_name','category_id')->where('status',1)->get();
                $childSubCategories = ChildSubCategory::select('id','name','url_name','sub_category_id')->where('status',1)->get();
               
                $brands     = Brand::orderBy('id','desc')->get();
    
                
            }
            $tag     = json_decode($product->tags);
            $size     = json_decode($product->size);
            $fabric     = explode(',',$product->fabric);
            $variations = ProductVariation::where('product_id',$id)->get();
            $productSpecification = productSpecification::where('product_id',$id)->get();
            
            return view('product.product.edit', compact('product','brands','Categories','subCategories','childSubCategories','tag','size','fabric','variations','productSpecification'));
         
        }
        return response(view('403'), 403);
    }

    public function update(Request $request, $id){
    
        // dd($request);
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [

		]);


            $user_id    = auth()->user()->id;
            $user       = User::findorfail($user_id);
            $product    = Product::findOrFail($id);
             if( $user_id == 1)
             {
                 $added_by_id               = $user_id;
                 $added_by_type             = "admin";
                 $product->product_type_id  = @$request->product_type_id;
             }
             else
             {
                //  $vendor_id                 = $user->vendor['id'];
                //  $vendor_type_id            = $user->vendor['vendor_type_id'];
                //  $added_by_id               = $vendor_id;
                //  $added_by_type             = "vendor";
                //  $product->product_type_id      = $vendor_type_id;
                 $added_by_id                   = $user_id;
                 $added_by_type                 = "vendor";
                 $product->product_type_id      = @$request->product_type_id;
             }
             $product->added_by_id              = @$added_by_id;
             $product->added_by_type            = @$added_by_type;
             $product->updated_by_id            = @$added_by_id??'null';
             $product->updated_by_type          = @$added_by_type??'null';
             $product->name                     = @$request->name;
             $product->sku                      = @$request->sku;
             $product->category_id              = @$request->category_id;
             $product->subcategory_id	        = @$request->subcategory_id;
             $product->child_subcategory_id     = @$request->child_subcategory_id;
             $product->brand_id                 = @$request->brand_id;
             $product->description              = @$request->description;
             $product->is_featured              = @$request->is_featured_active;
             $product->is_specification         = @$request->specification_active;
            //  $product->current_stock            = @$request->qty;
             $product->date                      = date('Y-m-d H:i:s');
             $product->sale_price               = @$request->commission+intval($request->sale_price);
            //  $product->dollor                   = $request->dollor;
            //  $product->riyal                    = $request->riyal;
            //  $product->dinar                    = $request->dinar;
            //  $product->euro                     = $request->euro;
             $product->purchase_price           = @$request->perchase_price;
            //  $product->discount                 = @$request->discount;
            //  $product->discount_type            = @$request->discount_type;
             $product->shipping_cost            = @$request->shipping_cost;
             $product->commission               = @$request->commission;
             $tags                              = array();

             if($request->tags[0] != null){
                 foreach (json_decode($request->tags[0]) as $key => $tag) {
                     array_push($tags, $tag->value);
                 }
             }
             $product->tags                 = implode(',', $tags);

             $sizes                         = array();
             if($request->size[0] != null){
                 foreach (json_decode($request->size[0]) as $key => $size) {
                     array_push($sizes, $size->value);
                 }
             }
             $product->size                 = implode(',', $sizes);
     
             $fabrics                       = array();
             if($request->fabric[0] != null){
                 foreach (json_decode($request->fabric[0]) as $key => $fabric) {
                     array_push($fabrics, $fabric->value);
                 }
             }
             $product->fabric               = implode(',', $fabrics);
             if($request->hasFile('thumbnail_image')){
                $product->num_of_imgs          = count($request->thumbnail_image) + 1;
             }
             $product->url_name             = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name));
             if( @$request->has('colors')){
                if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                    $color_codes            = implode(', ', $request->colors);
                    $result_color_ids       = \App\ProductColor::select('id')->whereIn('color_code', $request->colors)->get();
        
                    $color_ids =[];
                    foreach ($result_color_ids as $key => $value)
                    {
                        array_push($color_ids,$value->id);
                    }
        
                    $product->colors = json_encode($color_ids);
                }else {
                    $colors = array();
                    $product->colors = json_encode($colors);
                }
            }
            // $stock = 0;
            // if(sizeof($request->qty)){
            //     for($qty = 0; $qty < count($request->qty); $qty++){
            //         $stock = $stock + $request->qty[$qty];
            //     }
            // }
          
            // $product->current_stock = $stock;
             $product->save();
     
             $str   = array();

             $product_stock     = ProductVariation::where('product_id',$id)->delete();
             if( @$request->has('colors')){
                for($i=0; $i<count($request->colors); $i++){
                
                    $product_stock              = new ProductVariation;
                    $product_stock->product_id  = $product->id;
                    if($request->has('colors_active') && $request->has('colors') && count(@$request->colors) > 0){
                        $color_name             = \App\ProductColor::where('color_code', @$request->colors[$i])->first()->name;
                        array_push($str, $color_name);
                    }
                        $product_stock->color   = @$str[$i];
                        $product_stock->stock   = @$request->qty[$i];
                        $product_stock->save();
                }
             }

             $specification = count($request->specification);
             $product_specification     = productSpecification::where('product_id',$id)->delete();
                if( $specification > 0){
                    for($i = 0; $i < $specification; $i++){
                        $specifications                            = new  productSpecification;
                        $specifications->product_id                = $product->id;
                        $specifications->specification_title       = $request->specification_name[$i];
                        $specifications->specification_description = $request->specification[$i];
                        $specifications->save();
                    }
                }
            if($request->hasFile('front_image')){
                $logo =  "product_".$product->id."_1.".$request->front_image->extension();
                $request->front_image->move(public_path('website/productImages'), $logo);
            }
            if($request->hasFile('thumbnail_image')){
                $this->addImages($request->thumbnail_image,$product->id);
            }
           
             return redirect('product/product')->with('message', 'Product updated!');
        }
        return response(view('403'), 403);

    }
  
    public function destroy($id) {
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Product::destroy($id);

            return redirect('product/product')->with('message', 'Product deleted!');
        }
        return response(view('403'), 403);

    }

    public function fetchCategories($product_type_id = null){
      
        $getCategories = Category::where('category_type_id',$product_type_id)->get();
        echo $getCategories;
    }

    public function fetchSubCategories($category_type_id = null){
        $getSubCategories = SubCategory::where('category_id',$category_type_id)->get();
        echo $getSubCategories;
    }

    public function fetchChildSubCategories($subcategory_type_id = null){
        $getSubCategories = ChildSubCategory::where('sub_category_id',$subcategory_type_id)->get();
        echo $getSubCategories;
    }

    public function getColorCodes(){
        $colors = ProductColor::orderBy('name', 'asc')->where('active',1)->get();
       echo $colors;
       
    }

    public function skuCheck( $sku = null){
        if($sku != null){
            $getsku = Product::where('sku',$sku)->first();
            if($getsku != null){
               return 1;
                    
            }else{
                return 0;
            }

        }
      
    }

    public function skuUpdateCheck(Request $request, $sku = null){
        if($sku != null){
            $getsku = Product::where('sku',$sku)->where('id',$request->product_id)->first();
            if($getsku != null){
               return 1;
                    
            }else{
            $getsku = Product::where('sku',$sku)->first();
            if($getsku != null){
                return 'found';
            }

                return 'not found';
            }

        }
      
    }

    public function upload(Request $request){
       
        
        $username='923160896681';///Your Username
        $password='saqlain123';///Your SECRET Password
        $sender='SHOPATTIP';///Your Masking
        $mobile='03160896681';///add comma to send multiple sms like 92301,92310,92321
        $message='Test SMS';///Your Message
        $post =
        "sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&message=".urlencode($message)."&format=json";
        $url = "http://sendpk.com/api/sms.php?username=".$username."&password=".$password."";
        $ch = curl_init();
        $timeout = 0; // set to zero for no timeout
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 
        NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        echo $content = curl_exec($ch);
        /*Print Responce*/
        // echo $result; 
      
    }

    public function test(Request $request){
       return view('product.product.test');
    }

    public function customerReviews(Type $var = null)
    {
        return view('reviews/index');
    }

    public function deleteAll(Request $request)
    {

        $date = date('Y-m-d H:i:s');
        $ids = $request->ids;
        $brands = Product::whereIn('id',explode(",",$ids))->get();
        if(sizeof($brands)){
            foreach($brands as $brand){
                $brands = Product::where('id',$brand->id)->update(['deleted_at'=>$date]);
            }

            return response()->json(['success'=>"Product Deleted successfully."]);
        }
        
    }
    

}
