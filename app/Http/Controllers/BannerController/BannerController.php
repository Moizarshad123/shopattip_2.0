<?php

namespace App\Http\Controllers\BannerController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

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
            $banner = Banner::get();
            $perPage = count($banner);

            if (!empty($keyword)) {
                $banner = Banner::where('banner_type', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('banner', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $banner = Banner::paginate($perPage);
            }

            return view('banner.banner.index', compact('banner'));
        }
        return response(view('403'), 403);

    }

    public function create()
    {
        $ACTION = 'ADD';
        
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('banner.banner.create',compact('ACTION'));
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
			'banner' => 'required'
		]);
            // $requestData = $request->all();
            // Banner::create($requestData);
            
            $banner              = new Banner();
            $banner->banner_type = $request->banner_type;
            $banner->title       = $request->title;

            if($request->hasFile('banner')){
                $image         = Storage::disk('website')->put('banners', $request->banner);
                $banner->banner = $image;
            }
            $banner->save();

            return redirect('banner')->with('flash_message', 'Banner added!');
        }
        return response(view('403'), 403);
    }

    public function show($id)
    {
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $banner = Banner::findOrFail($id);
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
            return view('banner.banner.edit', compact('banner','ACTION'));
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
			'banner' => 'required'
		]);
            // $requestData = $request->all();
            
            // $banner = Banner::findOrFail($id);
            //  $banner->update($requestData);

            $banner              = Banner::find($id);
            $banner->banner_type = $request->banner_type;
            $banner->title       = $request->title;

            if($request->hasFile('banner')){
                $image         = Storage::disk('website')->put('banners', $request->banner);
                $banner->banner = $image;
            }
            $banner->save();


             return redirect('banner')->with('flash_message', 'Banner updated!');
        }
        return response(view('403'), 403);

    }

   
    public function destroy($id)
    {
        $model = str_slug('banner','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Banner::destroy($id);

            return redirect('banner')->with('flash_message', 'Banner deleted!');
        }
        return response(view('403'), 403);

    }
}
