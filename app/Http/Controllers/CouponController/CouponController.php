<?php

namespace App\Http\Controllers\CouponController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $model = str_slug('coupon','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $coupon = Coupon::get();
            $perPage = count($coupon);

            if (!empty($keyword)) {
                $coupon = Coupon::where('coupon', 'LIKE', "%$keyword%")
                ->orWhere('coupon_type', 'LIKE', "%$keyword%")
                ->orWhere('coupon_amount', 'LIKE', "%$keyword%")
                ->orWhere('start_date', 'LIKE', "%$keyword%")
                ->orWhere('end_date', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $coupon = Coupon::paginate($perPage);
            }

            return view('coupon.coupon.index', compact('coupon'));
        }
        return response(view('403'), 403);

    }

    public function create()
    {
        $action = 'add';

        $model = str_slug('coupon','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('coupon.coupon.create',compact('action'));
        }
        return response(view('403'), 403);

    }

    public function store(Request $request)
    {
        $model = str_slug('coupon','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'coupon' => 'required',
			'coupon_type' => 'required',
			'coupon_amount' => 'required|max:5',
			'start_date' => 'required',
			'end_date' => 'required'
		]);
            $requestData = $request->all();
            
            Coupon::create($requestData);
            return redirect('coupon')->with('flash_message', 'Coupon added!');
        }
        return response(view('403'), 403);
    }

    public function show($id)
    {
        $model = str_slug('coupon','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $coupon = Coupon::findOrFail($id);
            return view('coupon.coupon.show', compact('coupon'));
        }
        return response(view('403'), 403);
    }

    public function edit($id)
    {
        $action = 'edit';
        $model = str_slug('coupon','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $coupon = Coupon::findOrFail($id);
            return view('coupon.coupon.edit', compact('coupon','action'));
        }
        return response(view('403'), 403);
    }

    public function update(Request $request, $id)
    {
        $model = str_slug('coupon','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'coupon' => 'required',
			'coupon_type' => 'required',
			'coupon_amount' => 'required|max:5',
			'start_date' => 'required',
			'end_date' => 'required'
		]);
            $requestData = $request->all();
            
            $coupon = Coupon::findOrFail($id);
             $coupon->update($requestData);

             return redirect('coupon')->with('flash_message', 'Coupon updated!');
        }
        return response(view('403'), 403);

    }

    public function destroy($id)
    {
        $model = str_slug('coupon','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Coupon::destroy($id);

            return redirect('coupon')->with('flash_message', 'Coupon deleted!');
        }
        return response(view('403'), 403);

    }
}
