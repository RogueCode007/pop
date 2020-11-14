<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function cart(){
        $cartCollection = \Cart::getContent();
        return view('cart.index')->with(['cartCollection' => $cartCollection]);
    }
    public function add(Request $request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes'=>array(
                'img' => $request->img,
            )
            
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item removed');
    }
    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', "Cart cleared");
    }
    public function update(Request $request){
        \Cart::update($request->id, array(
            'quantity' =>array(
                'relative'=> false,
                'value'=> $request->quantity
            )
            ));
            return redirect()->route('cart.index')->with('success_msg', 'Cart has been updated');
    }
    public function checkout(){
        return view('cart.checkout')->with('success', 'Thanks for your order!');
    }
}
