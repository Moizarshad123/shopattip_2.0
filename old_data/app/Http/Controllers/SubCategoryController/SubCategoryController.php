<?php

namespace App\Http\Controllers\SubCategoryController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $subcategory = SubCategory::where('category_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('url_name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $subcategory = SubCategory::paginate($perPage);
            }

            return view('subcategory.sub-category.index', compact('subcategory'));
        }
        return response(view('403'), 403);

    }

    public function create()
    {
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('subcategory.sub-category.create');
        }
        return response(view('403'), 403);

    }

    public function store(Request $request)
    {
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'category_id' => 'required',
			'name' => 'required',
			'url_name' => 'required'
		]);
            $requestData = $request->all();
            
            SubCategory::create($requestData);
            return redirect('sub-category/sub-category')->with('flash_message', 'SubCategory added!');
        }
        return response(view('403'), 403);
    }

    public function show(SubCategory $sub_category)
    {
        $id = $sub_category->id;
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $subcategory = SubCategory::findOrFail($id);
            return view('subcategory.sub-category.show', compact('subcategory'));
        }
        return response(view('403'), 403);
    }

    public function edit(SubCategory $sub_category)
    {
        $id = $sub_category->id;
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $subcategory = SubCategory::findOrFail($id);
            return view('subcategory.sub-category.edit', compact('subcategory'));
        }
        return response(view('403'), 403);
    }
    public function update(Request $request, SubCategory $sub_category)
    {
        $id = $sub_category->id;
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'category_id' => 'required',
			'name' => 'required',
			'url_name' => 'required'
		]);
            $requestData = $request->all();
            
            $subcategory = SubCategory::findOrFail($id);
             $subcategory->update($requestData);

             return redirect('sub-category/sub-category')->with('flash_message', 'SubCategory updated!');
        }
        return response(view('403'), 403);

    }

    
    public function destroy(SubCategory $sub_category)
    {
        $id = $sub_category->id;
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SubCategory::destroy($id);

            return redirect('sub-category/sub-category')->with('flash_message', 'SubCategory deleted!');
        }
        return response(view('403'), 403);

    }
}
