<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use DB;
use App\Category;
use App\SubCategory;
use App\ChildSubCategory;
use App\Banner;
use App\Product;
use App\Slider;
use App\HomeSection;
use App\HomeLayout;



use Illuminate\Support\Facades\Validator;


class PagesController extends Controller
{
    public function HomePage()
    {
        
        $models = scandir(public_path()."/models");
		$sliders            = Slider::where('deleted_at',null)->get();
        $allcategories      = Category::with('subCategory','subCategory.childSubcategory')->where('status',1)->where('deleted_at',null)->get();
        $subCategory      = SubCategory::where('status',1)->where('deleted_at',null)->get();
        $childcategories      = ChildSubCategory::with('subCategory','subCategory.category')->where('status',1)->where('deleted_at',null)->get();
        // dd($allcategories);


        // $allcategories      = DB::select("SELECT categories.name AS category_name, categories.id 
        //                         as category_id, sub_categories.name 
        //                         AS subcategory_name, sub_categories.id 
        //                         AS subcategory_id,child_sub_categories.name 
        //                         AS child_subcategory_name, child_sub_categories.id 
        //                         AS child_subcategory_id FROM categories 
        //                         LEFT OUTER JOIN sub_categories ON sub_categories.category_id = categories.id 
        //                         LEFT OUTER JOIN child_sub_categories ON child_sub_categories.sub_category_id = sub_categories.id 
        //                         ORDER BY categories.id");

        // dd($allcategories);
       
		$newArrivals        = Product::where('product_type_id',1)->orderBy('id','DESC')->skip(0)->take(12)->get();
		// $latesProducts      = Product::where('product_type_id',1)->where('created_at', '>', Carbon::now()->startOfWeek())->skip(0)->take(12)->get();
		$latesProducts      = Product::where('product_type_id',1)->orderBy('id','ASC')->skip(0)->take(12)->get();
		$featureProducts    = Product::where('product_type_id',1)->where('is_featured',1)->orderBy('id','DESC')->skip(0)->take(12)->get();

        return view('frontend.homepage',compact('allcategories','sliders','newArrivals','latesProducts','featureProducts'));
    }

    public function addToCart($id = null)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
      
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "id"    => $product->id,
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->sale_price,
                        "image" => $product->front_image,
                        "costprice" => $product->sale_price,

                    ]
            ];
            session()->put('cart', $cart);
            return response()->json(['message' => "Product added to Cart"]);


        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return response()->json(['message' => "Product added to Cart"]);

            
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id"    => $product->id,            
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->sale_price,
            "image" => $product->front_image,
            "costprice" => $product->sale_price,
        ];
        session()->put('cart', $cart);
        return response()->json(['message' => "Product added to Cart"]);
    } 

    public function removeCart($id = null)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return 1;
        }else{
            return 0;

        }
    }

    public function getChildCategory( $id = null)
    {
        $childcategories      = ChildSubCategory::where('sub_category_id',$id)->where('status',1)->where('deleted_at',null)->get();
        echo $childcategories;

    }

    public function categoryBanner($id = null)
    {
        $banner = Category::where('id', $id)->first();
        echo $banner->banner;
    }
}
