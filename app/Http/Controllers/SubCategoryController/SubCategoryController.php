<?php

namespace App\Http\Controllers\SubCategoryController;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $subcategory = SubCategory::with('category')->get();
            $perPage = count($subcategory);

            if (!empty($keyword)) {
                $subcategory = SubCategory::with('category')->where('category_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('url_name', 'LIKE', "%$keyword%")
                ->orderBy('id', 'DESC')
                ->paginate($perPage);
            } else {
                $subcategory = SubCategory::with('category')->where('deleted_at',null)->orderBy('id', 'DESC')->paginate($perPage);
            }

            return view('subcategory.sub-category.index', compact('subcategory'));
        }
        return response(view('403'), 403);

    }

    public function create(){
        $ACTION = 'CREATES';
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('subcategory.sub-category.create',compact('ACTION'));
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
            // $requestData = $request->all();
            $subCategory = new SubCategory();
            $subCategory->category_id = $request->category_id;
            $subCategory->name = $request->name;
            $subCategory->url_name = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->url_name));
            $subCategory->save();
            
            // SubCategory::create($requestData);
            return redirect('sub-category/sub-category')->with('message', 'SubCategory added!');
        }
        return response(view('403'), 403);
    }

    public function show(SubCategory $sub_category)
    {
        $id = $sub_category->id;
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $subcategory = SubCategory::with('category')->findOrFail($id);
            return view('subcategory.sub-category.show', compact('subcategory'));
        }
        return response(view('403'), 403);
    }

    public function edit(SubCategory $sub_category)
    {
        // dd($sub_category);
        $ACTION = 'EDIT';
        $id = $sub_category->id;
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $subcategory = SubCategory::with('category')->findOrFail($id);
            // dd($subcategory->category_id);
            $getCategories = Category::all();
            return view('subcategory.sub-category.edit', compact('subcategory','ACTION','getCategories'));
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
            
            // $subcategory = SubCategory::findOrFail($id);
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->category_id = $request->category_id;
            $subCategory->name = $request->name;
            $subCategory->url_name = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->url_name));
            $subCategory->save();
            //  $subcategory->update($requestData);

             return redirect('sub-category/sub-category')->with('message', 'SubCategory updated!');
        }
        return response(view('403'), 403);

    }

    
    public function destroy(SubCategory $sub_category)
    {
        $id = $sub_category->id;
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            SubCategory::destroy($id);

            return redirect('sub-category/sub-category')->with('message', 'SubCategory deleted!');
        }
        return response(view('403'), 403);

    }

    public function fetchCategoryBaseList( $category_type_id = null)
    {
        $categories = Category::where('category_type_id',$category_type_id)->get();
        echo $categories ;
    }

    public function deleteAll(Request $request)
    {

        $date = date('Y-m-d H:i:s');
        $ids = $request->ids;
        $brands = SubCategory::whereIn('id',explode(",",$ids))->get();
        if(sizeof($brands)){
            foreach($brands as $brand){
                $brands = SubCategory::where('id',$brand->id)->update(['deleted_at'=>$date]);
            }

            return response()->json(['success'=>"Products Deleted successfully."]);
        }
        
    }
}
