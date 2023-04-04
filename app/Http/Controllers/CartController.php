<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // session()->flush();
        return view('cart.cart');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $product = Product::findOrFail($id);
        $cartItems = session()->get('cartItems', []);
        if(isset($cartItems[$id])){
            $cartItems[$id]['quantity'] ++;
        }else{
            $cartItems[$id] = [
                'image_path' => $product->image_path,
                'name' => $product->name,
                'details' => $product->details,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cartItems', $cartItems);
        return redirect()->back()->with('success', 'Product successfully added');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {   
        if($request->id && $request->quantity)
        $cartItems = session()->get('cartItems');
        $cartItems[$request->id]['quantity'] = $request->quantity;

       session()->put('cartItems', $cartItems);
       return redirect()->back()->with('success', 'Quantity updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if($request->id){
            $cartItems = session()->get('cartItems');
            if(isset($cartItems[$request->id])){
                unset($cartItems[$request->id]);
                session()->put('cartItems',$cartItems);
            }

            return redirect()->back()->with('success', 'Product deleted successfully');
        }

    }
}
