<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\ChildSubCategory;

use App\Brand;
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
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('product.product.create');
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
            
            Product::create($requestData);
            return redirect('product/product')->with('flash_message', 'Product added!');
        }
        return response(view('403'), 403);
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
