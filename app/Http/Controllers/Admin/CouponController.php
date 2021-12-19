<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    public function createCoupon(Request $request)
    {
        if($request->method()=='GET')
        {
            return view('admin.create-coupon');
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'code'      => 'required|unique:coupons',
                'coupon_type'      => 'required',
                'coupon_value' => 'required|numeric',
                'cart_value' => 'required|numeric',
                'expiry_date' => 'required'
            ]);
            Coupon::create([
                'code' => $request->code,
                'type' => $request->coupon_type,
                'value' =>$request->coupon_value,
                'cart_value' =>$request->cart_value,
                'expiry_date' =>$request->expiry_date
            ]);

            return redirect()->back()->with('success', 'Coupon has been created successfully.');
        }
    }

    public function showCoupon()
    {
        $coupons= Coupon::latest()->get();
        return view('admin.show-coupon',compact('coupons'));
    }

    public function editCoupon(Request $request,$id)
    {
        $coupons=Coupon::find($id);
        if($request->method()=='GET')
        {
            return view('admin.edit-coupon',compact('coupons'));
        }
        if($request->method()=='POST')
        {
            if($request->code==$coupons->code)
            {
                $validator = $request->validate([
                    'coupon_type'      => 'required',
                    'coupon_value' => 'required|numeric',
                    'cart_value' => 'required|numeric',
                    'expiry_date' => 'required'
                ]);
            }
            else{
                $validator = $request->validate([
                    'code'      => 'required|unique:coupons',
                    'coupon_type'      => 'required',
                    'coupon_value' => 'required|numeric',
                    'cart_value' => 'required|numeric',
                    'expiry_date' => 'required'
                ]);
            }
            $data=array();
            $data['code']=$request->code;
            $data['type']=$request->coupon_type;
            $data['value']=$request->coupon_value;
            $data['cart_value']=$request->cart_value;
            $data['expiry_date']=$request->expiry_date;

            DB::table('coupons')->where('id', $id)->update($data);
            return redirect()->back()->with('success', 'Coupon has been Update successfully.');
        }
    }
    public function deleteCoupon($id)
    {
        DB::table('coupons')->where('id', $id)->delete();
        return redirect()->back();
    }
}
