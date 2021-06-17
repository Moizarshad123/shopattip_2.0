<?php

namespace App\Http\Controllers\Slider;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;  
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('slider','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $slider = Slider::where('deleted_at',null)->get();

            $perPage = count($slider);

            if (!empty($keyword)) {
                $slider = Slider::where('slider_type', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('slider_image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $slider = Slider::orderBy('id', 'DESC')->where('deleted_at',null)->paginate($perPage);
            }

            return view('slider.slider.index', compact('slider'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ACTION = 'ADD';
        $model = str_slug('slider','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('slider.slider.create',compact('ACTION'));
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('slider','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'slider_type' => 'required',
			'slider_image' => 'required'
		]);
            $requestData = $request->all();
            
            Slider::create($requestData);
            $slider       = new Slider();
            $slider->slider_type = $request->slider_type;
            $slider->title = $request->title;
            if($request->hasFile('slider_image')){
                $image       = Storage::disk('website')->put('Slider', $request->slider_image);
                $slider->slider_image = $image;
            }
            $slider->save();
            return redirect('slider/slider')->with('message', 'Slider added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('slider','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $slider = Slider::findOrFail($id);
            return view('slider.slider.show', compact('slider'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ACTION = 'EDIT';
        $model = str_slug('slider','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $slider = Slider::findOrFail($id);
            return view('slider.slider.edit', compact('slider','ACTION'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('slider','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'slider_type' => 'required',
			'slider_image' => 'required'
		]);
          
            $slider = Slider::findOrFail($id);
           
            if($request->hasFile('slider_image')){
                $image       = Storage::disk('website')->put('Slider', $request->slider_image);
                $slider->slider_image = $image;
                $slider->slider_type = $request->slider_type;
                $slider->title = $request->title;
            }else{
                $slider->slider_type = $request->slider_type;
                $slider->title = $request->title;
            }
            $slider->save();

             return redirect('slider/slider')->with('message', 'Slider updated!');
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
        $model = str_slug('slider','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Slider::destroy($id);

            return redirect('slider/slider')->with('message', 'Slider deleted!');
        }
        return response(view('403'), 403);

    }

    public function deleteAll(Request $request)
    {

        $date = date('Y-m-d H:i:s');
        $ids = $request->ids;
        $brands = Slider::whereIn('id',explode(",",$ids))->get();
        if(sizeof($brands)){
            foreach($brands as $brand){
                $brands = Slider::where('id',$brand->id)->update(['deleted_at'=>$date]);
            }

            return response()->json(['success'=>"Slider Deleted successfully."]);
        }
        
    }
}
