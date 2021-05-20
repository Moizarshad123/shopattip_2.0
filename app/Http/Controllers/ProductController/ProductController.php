<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\ChildSubCategory;

use App\Brand;
use App\User;

use Storage;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

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
                ->paginate($perPage);
            } else {
                $product = Product::paginate($perPage);
            }

            return view('product.product.index', compact('product'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('product','-');
        $brands = Brand::all();
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('product.product.create',compact('brands'));
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

   
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
        //     $this->validate($request, [
		// 	'product_type_id' => 'required',
		// 	'category_id' => 'required',
		// 	'subcategory_id' => 'required',
		// 	'child_subcategory_id' => 'required',
        //     'name' => 'required',
		// 	'brand_id' => 'required',
		// 	'description' => 'required',
		// 	'front_image' => 'required',
		// 	'sale_price' => 'required',
		// 	'perchase_price' => 'required'
		// ]);
        $user_id    = auth()->user()->id;
        $user       = User::findorfail($user_id);
      
        $product    = new Product;
        if( $user_id == 1)
        {
            $added_by_id              = $user_id;
            $added_by_type            = "admin";
            $product->product_type_id = $request->product_type_id;
        }
        else
        {
           
            $vendor_id                = $user->vendor['id'];
            $vendor_type_id           = $user->vendor['vendor_type_id'];
            $added_by_id              = $vendor_id;
            $added_by_type            = "vendor";
            $product->product_type_id = $vendor_type_id;
        }
        $product->added_by_id           = $added_by_id;
        $product->added_by_type         = $added_by_type;
        $product->name                  = $request->name;
        $product->category_id           = $request->category_id;
        $product->subcategory_id	    = $request->subcategory_id;
        $product->child_subcategory_id  = $request->child_subcategory_id;
        $product->brand_id              = $request->brand_id;
        $product->current_stock         = count($request->variation_quantity);
        $product->description           = $request->description;
        $product->sale_price            = $request->commission+intval($request->sale_price);
        $product->purchase_price        = $request->perchase_price;
        $product->discount              = $request->discount;
        $product->discount_type         = $request->discount_type;
        $tags                           = array();
        if($request->tags[0] != null){
            foreach (json_decode($request->tags[0]) as $key => $tag) {
                array_push($tags, $tag->value);
            }
        }
        $product->tags              = implode(',', $tags);
        $product->num_of_imgs      = count($request->thumbnail_image) + 1;
        $product->url_name         = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name));
        
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $color_codes = implode(', ', $request->colors);
            $result_color_ids = \App\ProductColor::select('id')->whereIn('color_code', $request->colors)->get();

            $color_ids =[];
            foreach ($result_color_ids as $key => $value)
            {
                array_push($color_ids,$value->id);
            }

            $product->colors = json_encode($color_ids);
        }
        else {
            $colors = array();
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $str          = 'choice_options_'.$no;
                $item['id']   = $key+1;
                $item['name'] = $no;

                $data = array();
                foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                    array_push($data, $eachValue->value);
                }
                $item['values'] = $data;
                array_push($choice_options, $item);
            }
          }
      
        $product->options = json_encode($choice_options);


     ########     shipping
      if ($request->has('shipping_type')) {
        if($request->shipping_type == 'free'){
            $product->shipping_cost = 0;
        }
        elseif ($request->shipping_type == 'flat_rate') {

            $product->shipping_cost = $request->shipping_cost;
        }
    }
        
        $product->save();
            // $requestData = $request->all();
            
            // Product::create($requestData);
            return redirect('product/product')->with('flash_message', 'Product added!');
        }
        return response(view('403'), 403);
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

    public function sku_combination(Request $request)
    {
       
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
                // dd(json_decode($request[$name][0]));
                foreach (json_decode($request[$name][0]) as $key => $item) {
                 
                    array_push($data, $item->value);
                }
               
                array_push($options, $data);
            }
          

        }
 
        $combinations = $this->combinations($options);
        return view('product.product.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));

//        return view('admin.pages.products.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
    }

    public function sku_combination_edit(Request $request)
    {
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
        $unit_price = $request->unit_price;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $product = Product::findOrFail($id);
            return view('product.product.show', compact('product'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $product = Product::findOrFail($id);
            return view('product.product.edit', compact('product'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'product_type_id' => 'required',
			'category_id' => 'required',
			'subcategory_id' => 'required',
			'child_subcategory_id' => 'required',
			'brand_id' => 'required',
			'description' => 'required',
			'front_image' => 'required',
			'sale_price' => 'required',
			'perchase_price' => 'required'
		]);
            $requestData = $request->all();
            
            $product = Product::findOrFail($id);
             $product->update($requestData);

             return redirect('product/product')->with('flash_message', 'Product updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Product::destroy($id);

            return redirect('product/product')->with('flash_message', 'Product deleted!');
        }
        return response(view('403'), 403);

    }

    public function fetchCategories($product_type_id = null)
    {
      
        $getCategories = Category::where('category_type_id',$product_type_id)->get();
        echo $getCategories;
    }
    public function fetchSubCategories($category_type_id = null)
    {
        $getSubCategories = SubCategory::where('category_id',$category_type_id)->get();
        echo $getSubCategories;
    }

    public function fetchChildSubCategories($subcategory_type_id = null)
    {
        $getSubCategories = ChildSubCategory::where('sub_category_id',$subcategory_type_id)->get();
        echo $getSubCategories;
    }

    
    
}
