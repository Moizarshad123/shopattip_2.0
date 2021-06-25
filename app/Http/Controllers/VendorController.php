<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    public function vendorsList(Type $var = null)
    {
        $vendors = Vendor::orderBy('id', 'DESC')->get();
       
        return view('vendors/index',compact('vendors'));
    }

    public function vendorStatusChange(Request $request)
    {
        
        $user = Vendor::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['message'=>'Status change successfully.']);
        // return redirect('product/product')->with('message', 'Product added!');
    }
}
