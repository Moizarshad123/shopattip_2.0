<?php

namespace App\Http\Controllers\DiscountController;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\Discount;
use App\SubCategory;
use App\ChildSubCategory;
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    
    public function index(Request $request)
    {
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $discount = Discount::where('category_type', 'LIKE', "%$keyword%")
                ->orWhere('disount_type', 'LIKE', "%$keyword%")
                ->orWhere('discount', 'LIKE', "%$keyword%")
                ->orWhere('start_date', 'LIKE', "%$keyword%")
                ->orWhere('end_date', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                // $discount = Discount::paginate($perPage);
                $discount = Discount::with('category','subCategory','subChildCategory')->paginate($perPage);
                // dd($discount);

            }

            return view('discount.discount.index', compact('discount'));
        }
        return response(view('403'), 403);

    }

  
    public function create()
    {
        $ACTION = 'CREATEE';

        $categories = Category::all();

        
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('discount.discount.create',compact('categories','ACTION'));
        }
        return response(view('403'), 403);

    }

    
    public function store(Request $request)
    {
        // dd($request);
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
            'product_type_id' => 'required',
			'category_id' => 'required',
			'subcategory_id' => 'required',
			'child_subcategory_id' => 'required',
			'disount_type' => 'required',
			'discount' => 'required',
			'start_date' => 'required',
			'end_date' => 'required'
		]);
            // $requestData = $request->all();
            // Discount::create($requestData);
            $discount                        = new Discount();
            $discount->product_type_id       = $request->product_type_id;
            $discount->category_id           = $request->category_id;
            $discount->subcategory_id	     = $request->subcategory_id;
            $discount->child_subcategory_id  = $request->child_subcategory_id;
            $discount->disount_type          = $request->disount_type;
            $discount->discount              = $request->discount;
            $discount->start_date            = $request->start_date;
            $discount->end_date              = $request->end_date;
            $discount->save();
            return redirect('discount')->with('flash_message', 'Discount added!');
        }
        return response(view('403'), 403);
    }

    
    public function show($id)
    {
        
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            // $discount = Discount::findOrFail($id);
            $discount = Discount::with('category','subCategory','subChildCategory')->findOrFail($id);

            return view('discount.discount.show', compact('discount'));
        }
        return response(view('403'), 403);
    }

  
    public function edit($id)
    {
        $categories = Category::all();
        $ACTION = 'EDIT';


        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $discount           = Discount::findOrFail($id);
            $Categories         = Category::select('id','name','url_name','category_type_id')->where('status',1)->get();
            $subCategories      = SubCategory::select('id','name','url_name','category_id')->where('status',1)->get();
            $childSubCategories = ChildSubCategory::select('id','name','url_name','sub_category_id')->where('status',1)->get();
            return view('discount.discount.edit', compact('discount','Categories','subCategories','subCategories','childSubCategories','ACTION'));
        }
        return response(view('403'), 403);
    }

   
    public function update(Request $request, $id)
    {
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
                'product_type_id' => 'required',
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'child_subcategory_id' => 'required',
                'disount_type' => 'required',
                'discount' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
		]);
            // $requestData = $request->all();
            
            $discount = Discount::findOrFail($id);
            //  $discount->update($requestData);

             $discount->product_type_id       = $request->product_type_id;
             $discount->category_id           = $request->category_id;
             $discount->subcategory_id	     = $request->subcategory_id;
             $discount->child_subcategory_id  = $request->child_subcategory_id;
             $discount->disount_type          = $request->disount_type;
             $discount->discount              = $request->discount;
             $discount->start_date            = $request->start_date;
             $discount->end_date              = $request->end_date;
             $discount->save();

             return redirect('discount')->with('flash_message', 'Discount updated!');
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
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Discount::destroy($id);

            return redirect('discount')->with('flash_message', 'Discount deleted!');
        }
        return response(view('403'), 403);

    }
}
