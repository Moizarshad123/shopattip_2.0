<?php

namespace App\Http\Controllers\ChildSubCategory;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SubCategory;
use App\Category;

use App\ChildSubCategory;
use Illuminate\Http\Request;

class ChildSubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $childsubcategory = ChildSubCategory::with('subCategory')->get();
            $perPage = count($childsubcategory);

            if (!empty($keyword)) {
                $childsubcategory = ChildSubCategory::with('subCategory')->where('sub_category_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('url_name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $childsubcategory = ChildSubCategory::with('subCategory')->paginate($perPage);
            }
                // dd($childsubcategory);
            return view('childsubcategory.child-sub-category.index', compact('childsubcategory'));
        }
        return response(view('403'), 403);

    }
    public function create()
    {
        $ACTION = 'CREATES';
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $getSubCategories = SubCategory::all();
            // $getCategories    = Category::all();
            return view('childsubcategory.child-sub-category.create', compact('ACTION','getSubCategories'));
        }
        return response(view('403'), 403);

    }

    public function store(Request $request)
    {
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'sub_category_id' => 'required',
			'name' => 'required',
			'url_name' => 'required'
		]);
            // $requestData = $request->all();
            // ChildSubCategory::create($requestData);
            $childSubCategory = new ChildSubCategory();
            $childSubCategory->sub_category_id = $request->sub_category_id;
            $childSubCategory->name = $request->name;
            $childSubCategory->url_name = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->url_name));
            $childSubCategory->save();
            return redirect('child-sub-category')->with('flash_message', 'ChildSubCategory added!');
        }
        return response(view('403'), 403);
    }

    public function show($id)
    {
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $childsubcategory = ChildSubCategory::with('subCategory')->findOrFail($id);
            return view('childsubcategory.child-sub-category.show', compact('childsubcategory'));
        }
        return response(view('403'), 403);
    }

  
    public function edit($id)
    {
        $ACTION = 'EDIT';
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $childsubcategory = ChildSubCategory::with('subCategory')->findOrFail($id);
            // DD($childsubcategory);
            $getSubCategories = SubCategory::all();
            $getCategoryType = Category::where('id',$childsubcategory['subCategory']->category_id)->first();
            $getCategories = Category::all();
            return view('childsubcategory.child-sub-category.edit', compact('ACTION','getCategoryType','childsubcategory','getSubCategories','getCategories'));
        }
        return response(view('403'), 403);
    }

    public function update(Request $request, $id)
    {
      
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'sub_category_id' => 'required',
			'name' => 'required',
			'url_name' => 'required'
		]);
            // $requestData = $request->all();
            // $childsubcategory->update($requestData);
            
            $childsubcategory = ChildSubCategory::findOrFail($id);
            if($childsubcategory != null ){
                $childsubcategory->sub_category_id = $request->sub_category_id;
                $childsubcategory->name = $request->name;
                $childsubcategory->url_name = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->url_name));
                $childsubcategory->save();
    
                 return redirect('child-sub-category')->with('flash_message', 'ChildSubCategory updated!');
            }else{
                return redirect('child-sub-category')->with('flash_message', 'Oops! Something Went Wrong!');

            }
      
        }
        return response(view('403'), 403);

    }

    public function destroy($id)
    {
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ChildSubCategory::destroy($id);

            return redirect('child-sub-category')->with('flash_message', 'ChildSubCategory deleted!');
        }
        return response(view('403'), 403);

    }

    public function GetCategoryForChildSubCategory($id){

        $getCategories    = Category::where('category_type_id',$id)->get();
        return response()->json($getCategories);
    }

    public function GetSubCategoryForChildSubCategory($id){

        
        $getSubCategories  = SubCategory::where('category_id',$id)->get();
        return response()->json($getSubCategories);

    }
}
