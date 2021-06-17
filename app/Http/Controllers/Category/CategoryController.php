<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Storage;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $model = str_slug('category','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $category = Category::get();
            $perPage = count($category);

            if (!empty($keyword)) {
                $category = Category::where('category_type_id', 'LIKE', "%$keyword%")
                // ->orWhere('level_name', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                // ->orWhere('url_name', 'LIKE', "%$keyword%")
                // ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('banner', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orderBy('id', 'DESC')
                ->paginate($perPage);
            } else {
                $category = Category::orderBy('id', 'DESC')->where('deleted_at',null)->paginate($perPage);
            }

            return view('category.category.index', compact('category'));
        }
        return response(view('403'), 403);

    }

    public function create()
    {
       
        $ACTION = 'CREATES';
        $model = str_slug('category','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('category.category.create',compact('ACTION'));
        }
        return response(view('403'), 403);

    }

    public function store(Request $request)
    {
        $model = str_slug('category','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'category_type_id' => 'required',
			// 'level_name' => 'required',
			'name' => 'required',
			// 'url_name' => 'required',
			// 'description' => 'required',
			// 'banner' => 'required',
			'status' => 'required'
		]);
            $requestData = $request->all();

            try{
                $image = Storage::disk('website')->put('categories', $request->banner);
            }catch(\Exception $e){}//end trycatch.
            
            // Category::create($requestData);
            $category                       = new Category();
            $category->category_type_id     = $request->category_type_id;
            // $category->level_name           = $request->level_name;
            $category->name                 = $request->name;
            // $category->url_name             = $request->url_name;
            // $category->description          = $request->description;
            $category->banner               = $image??"";
            $category->status               = $request->status;
            $category->save();
            return redirect('category/category')->with('message', 'Category added!');
        }
        return response(view('403'), 403);
    }

    public function show(Category $category)
    {
        $model = str_slug('category','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $id = $category->id;
            $category = Category::findOrFail($id);
            // return $category;
            return view('category.category.show', compact('category'));
        }
        return response(view('403'), 403);
    }

    public function edit(Category $category)
    {
       
        $ACTION = 'EDIT';
        $model = str_slug('category','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $id = $category->id;
            $category = Category::findOrFail($id);
            return view('category.category.edit', compact('category','ACTION'));
        }
        return response(view('403'), 403);
    }

    public function update(Request $request, Category $category)
    {
        // dd($request);
        $id = $category->id;
        $model = str_slug('category','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'category_type_id' => 'required',
			// 'level_name' => 'required',
			'name' => 'required',
			// 'url_name' => 'required',
			// 'description' => 'required',
			// 'banner' => 'required',
			'status' => 'required'
		]);
            // $requestData = $request->all();
            if($request->hasFile('banner')){
                // try{
                    $image    = Storage::disk('website')->put('categories', $request->banner);
                    $category = Category::findOrFail($id);
                    $category->update(['category_type_id'   =>$request->category_type_id,
                                        // 'level_name'        =>$request->level_name,
                                        'name'              =>$request->name,
                                        // 'url_name'          =>$request->url_name,
                                        // 'description'       =>$request->description,
                                        'banner'            =>$image,
                                        'status'            =>$request->status,
                    ]);
                // }catch(\Exception $e){}//end trycatch.
            }else{
                $category = Category::findOrFail($id);
                $category->update(['category_type_id'   =>$request->category_type_id,
                                    // 'level_name'        =>$request->level_name,
                                    'name'              =>$request->name,
                                    // 'url_name'          =>$request->url_name,
                                    // 'description'       =>$request->description,
                                    // 'banner'            =>$image,
                                    'status'            =>$request->status,
                ]);
            }
            
             return redirect('category/category')->with('message', 'Category updated!');
        }
        return response(view('403'), 403);

    }

    public function destroy(Category $category)
    {
        $id = $category->id;
        $model = str_slug('category','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Category::destroy($id);

            return redirect('category/category')->with('message', 'Category deleted!');
        }
        return response(view('403'), 403);

    }

    public function deleteAll(Request $request)
    {

        $date = date('Y-m-d H:i:s');
        $ids = $request->ids;
        $brands = Category::whereIn('id',explode(",",$ids))->get();
        if(sizeof($brands)){
            foreach($brands as $brand){
                $brands = Category::where('id',$brand->id)->update(['deleted_at'=>$date]);
            }

            return response()->json(['success'=>"Category Deleted successfully."]);
        }
        
    }
}
