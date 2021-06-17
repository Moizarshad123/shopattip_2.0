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
            $brand = Brand::where('deleted_at',null)->get();
            $perPage = count($brand);

            if (!empty($keyword)) {
                $brand = Brand::where('name', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orderBy('id', 'DESC')
                ->paginate($perPage);
            } else {
                $brand = Brand::orderBy('id', 'DESC')->where('deleted_at',null)->paginate($perPage);
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
            return redirect('brand')->with('message', 'Brand added!');
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

             return redirect('brand')->with('message', 'Brand updated!');
        }
        return response(view('403'), 403);

    }

    public function destroy($id)
    {
        $model = str_slug('brand','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Brand::destroy($id);

            return redirect('brand')->with('message', 'Brand deleted!');
        }
        return response(view('403'), 403);

    }

    public function deleteAll(Request $request)
    {

        $date = date('Y-m-d H:i:s');
        $ids = $request->ids;
        $brands = Brand::whereIn('id',explode(",",$ids))->get();
        if(sizeof($brands)){
            foreach($brands as $brand){
                $brands = Brand::where('id',$brand->id)->update(['deleted_at'=>$date]);
            }

            return response()->json(['success'=>"Brand Deleted successfully."]);
        }
        
    }

   
}
