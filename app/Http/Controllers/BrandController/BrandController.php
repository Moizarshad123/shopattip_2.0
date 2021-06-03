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
            $brand = Brand::get();
            $perPage = count($brand);

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
        $ACTION = 'ADD';
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('brand.brand.create',compact('ACTION'));
        }
        return response(view('403'), 403);

    }

    public function store(Request $request)
    {
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'brand_type_id' => 'required',
			'name' => 'required',
			'logo' => 'required',
		]);
         
            $brand       = new Brand();
            $brand->brand_type_id = $request->brand_type_id;
            $brand->name = $request->name;
            if($request->hasFile('logo')){
                $image       = Storage::disk('website')->put('brands', $request->logo);
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
			'brand_type_id' => 'required',
			'name' => 'required',
			'logo' => 'required',
		]);
            // $requestData = $request->all();
            // $brand = Brand::findOrFail($id);
            //  $brand->update($requestData);

            $brand       = Brand::find($id);
            $brand->brand_type_id = $request->brand_type_id;
            $brand->name = $request->name;
            if($request->hasFile('logo')){
                $image       = Storage::disk('website')->put('brands', $request->logo);
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
