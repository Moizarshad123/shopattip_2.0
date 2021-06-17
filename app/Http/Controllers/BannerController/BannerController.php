<?php

namespace App\Http\Controllers\BannerController;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\Banner;
use Storage;

use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $banner = Banner::where('deleted_at',null)->get();
            $perPage = count($banner);

            if (!empty($keyword)) {
                $banner = Banner::with('category')->where('banner_type', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('banner', 'LIKE', "%$keyword%")
                ->orderBy('id', 'DESC')
                ->paginate($perPage);
            } else {
                $banner = Banner::with('category')->where('deleted_at',null)->orderBy('id', 'DESC')->paginate($perPage);
                // dd($banner);
            }

            return view('banner.banner.index', compact('banner'));
        }
        return response(view('403'), 403);

    }

    public function create()
    {
        $ACTION = 'ADD';
        $categories = Category::all();
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('banner.banner.create',compact('ACTION','categories'));
        }
        return response(view('403'), 403);

    }

    public function store(Request $request)
    {
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'banner_type' => 'required',
			'title' => 'required',
			'banner' => 'required',
			'category_type' => 'required'
		]);
            // $requestData = $request->all();
            // Banner::create($requestData);
            
            $banner                     = new Banner();
            $banner->banner_type        = $request->banner_type;
            $banner->title              = $request->title;
            $banner->category_type      = $request->category_type;

            if($request->hasFile('banner')){
                $image         = Storage::disk('website')->put('banners', $request->banner);
                $banner->banner = $image;
            }
            $banner->save();

            return redirect('banner')->with('message', 'Banner added!');
        }
        return response(view('403'), 403);
    }

    public function show($id)
    {
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $banner = Banner::with('category')->findOrFail($id);
            return view('banner.banner.show', compact('banner'));
        }
        return response(view('403'), 403);
    }
    public function edit($id)
    {
        $ACTION = 'EDIT';
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $banner = Banner::findOrFail($id);
            $getCategories = Category::all();
            return view('banner.banner.edit', compact('banner','ACTION','getCategories'));
        }
        return response(view('403'), 403);
    }

    public function update(Request $request, $id)
    {
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'banner_type' => 'required',
			'title' => 'required',
			'banner' => 'required',
			'category_type' => 'required'

		]);
            // $requestData = $request->all();
            
            // $banner = Banner::findOrFail($id);
            //  $banner->update($requestData);

            $banner                 = Banner::find($id);
            $banner->banner_type    = $request->banner_type;
            $banner->title          = $request->title;
            $banner->category_type  = $request->category_type;


            if($request->hasFile('banner')){
                $image         = Storage::disk('website')->put('banners', $request->banner);
                $banner->banner = $image;
            }
            $banner->save();


             return redirect('banner')->with('message', 'Banner updated!');
        }
        return response(view('403'), 403);

    }

   
    public function destroy($id)
    {
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Banner::destroy($id);

            return redirect('banner')->with('message', 'Banner deleted!');
        }
        return response(view('403'), 403);

    }

    public function fetchCategoriesList($brand_type_id = null)
    {
        $categories = Category::where('category_type_id',$brand_type_id)->get();
        echo $categories;
    }



    public function deleteAll(Request $request)
    {

        $date = date('Y-m-d H:i:s');
        $ids = $request->ids;
        $banners = Banner::whereIn('id',explode(",",$ids))->get();
        if(sizeof($banners)){
            foreach($banners as $banner){
                $banner = Banner::where('id',$banner->id)->update(['deleted_at'=>$date]);
            }

            return response()->json(['success'=>"Banner Deleted successfully."]);
        }
        
    }
}
