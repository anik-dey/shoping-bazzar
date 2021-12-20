<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    public function userCoupon(Request $request)
    {
        $currentDate = date('Y-m-d');
        $currentDate = date('Y-m-d', strtotime($currentDate));
        $coupon_code=$request->coupon_code;
        $coupon=Coupon::where('code',$coupon_code)->whereDate('expiry_date','>=',$currentDate)->where('cart_value','<=',\Cart::getTotal())->first();
        if(!$coupon)
        {
            session()->flash('message','Coupon code is invalid');
            return redirect()->back();
        }
        session()->put('coupon',[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value
        ]);

        $tax=\Cart::getTotal()*5/100;

        if($coupon->type== 'fixed')
        {
            $discount= $coupon->value;
            $cartItems = \Cart::getContent();
            $grand_total=round(\Cart::getTotal()+$tax-$discount);
            session()->flash('discount','Coupon code is invalid');
            return view('users.cart', compact('cartItems','discount','tax','grand_total'));

        }
        else if($coupon->type== 'percent')
        {
            $discount= \Cart::getTotal()*$coupon->value/100;
            $cartItems = \Cart::getContent();
            $grand_total=round(\Cart::getTotal()+$tax-$discount);
            session()->flash('discount','Coupon code is invalid');
            return view('users.cart', compact('cartItems','discount','tax','grand_total'));

        }
    }
}
