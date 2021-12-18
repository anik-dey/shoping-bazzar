<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('users.cart', compact('cartItems'));
    }
    public function addToCart($id)
    {
        $product= Product::where('product_id', $id)->first();
        //  dd($product->product_name);
        \Cart::add([
            'id' => $product->product_id,
            'code' => $product->product_code,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => "1",
            'attributes' => array(
                'image' => $product->product_image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->back();
        // return redirect()->route('cart.list');
    }

    public function updateCart($quantity,$id,$fun)
    {
        if($fun=="1")
        {
            $quanties=$quantity-1;
            if($quanties==0)
            {
                $quanties=1;
                \Cart::update(
                    $id,
                    [
                        'quantity' => [
                            'relative' => false,
                            'value' => $quanties
                        ],
                    ]
                );
            }
            \Cart::update(
                $id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $quanties
                    ],
                ]
            );

        }
        else if($fun=="2"){
            $quanties=$quantity+1;
            \Cart::update(
                $id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $quanties
                    ],
                ]
            );
        }
        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->back();
    }

    public function removeCart($id)
    {
        \Cart::remove($id);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->back();
    }

    public function clearAllCart()
    {
        \Cart::clear();
       session()->flash('success', 'All Item Cart Clear Successfully !');
       return redirect()->back();
    }
}
