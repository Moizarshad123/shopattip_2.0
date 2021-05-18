<?php

namespace App\Http\Controllers\BrandController;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Brand;
use Storage;

use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $brand = Brand::where('name', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $brand = Brand::paginate($perPage);
            }

            return view('brand.brand.index', compact('brand'));
        }
        return response(view('403'), 403);

    }

    public function create()
    {
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('brand.brand.create');
        }
        return response(view('403'), 403);

    }

    public function store(Request $request)
    {
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
         
            $brand       = new Brand();
            $brand->name = $request->name;
            if($request->hasFile('logo')){
                $image       = Storage::disk('website')->put('banners', $request->logo);
                $brand->logo = $image;
            }
            $brand->save();
            return redirect('brand')->with('flash_message', 'Brand added!');
        }
        return response(view('403'), 403);
    }

    public function show($id)
    {
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $brand = Brand::findOrFail($id);
            return view('brand.brand.show', compact('brand'));
        }
        return response(view('403'), 403);
    }
    public function edit($id)
    {
        $ACTION = 'EDIT';
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $brand = Brand::findOrFail($id);
            return view('brand.brand.edit', compact('brand','ACTION'));
        }
        return response(view('403'), 403);
    }

    public function update(Request $request, $id)
    {
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            // $requestData = $request->all();
            // $brand = Brand::findOrFail($id);
            //  $brand->update($requestData);

            $brand       = Brand::find($id);
            $brand->name = $request->name;
            if($request->hasFile('logo')){
                $image       = Storage::disk('website')->put('banners', $request->logo);
                $brand->logo = $image;
            }
            $brand->save();

             return redirect('brand')->with('flash_message', 'Brand updated!');
        }
        return response(view('403'), 403);

    }

    public function destroy($id)
    {
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Brand::destroy($id);

            return redirect('brand')->with('flash_message', 'Brand deleted!');
        }
        return response(view('403'), 403);

    }
}
