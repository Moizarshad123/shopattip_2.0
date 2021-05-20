<?php

namespace App\Http\Controllers\DiscountController;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\Discount;
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
                $discount = Discount::paginate($perPage);
            }

            return view('discount.discount.index', compact('discount'));
        }
        return response(view('403'), 403);

    }

  
    public function create()
    {
        $action = 'add';

        $categories = Category::all();

        
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('discount.discount.create',compact('categories','action'));
        }
        return response(view('403'), 403);

    }

    
    public function store(Request $request)
    {
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'category_type' => 'required',
			'disount_type' => 'required',
			'discount' => 'required',
			'start_date' => 'required',
			'end_date' => 'required'
		]);
            $requestData = $request->all();
            
            Discount::create($requestData);
            return redirect('discount')->with('flash_message', 'Discount added!');
        }
        return response(view('403'), 403);
    }

    
    public function show($id)
    {
        
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $discount = Discount::findOrFail($id);
            return view('discount.discount.show', compact('discount'));
        }
        return response(view('403'), 403);
    }

  
    public function edit($id)
    {
        $categories = Category::all();
        $action = 'edit';


        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $discount = Discount::findOrFail($id);
            return view('discount.discount.edit', compact('discount','categories','action'));
        }
        return response(view('403'), 403);
    }

   
    public function update(Request $request, $id)
    {
        $model = str_slug('discount','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'category_type' => 'required',
			'disount_type' => 'required',
			'discount' => 'required',
			'start_date' => 'required',
			'end_date' => 'required'
		]);
            $requestData = $request->all();
            
            $discount = Discount::findOrFail($id);
             $discount->update($requestData);

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
