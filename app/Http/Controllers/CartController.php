<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->where('status', 0)->latest()->get();
        foreach ($carts as $cart) {
            $cart->total = $cart->quantity * $cart->product->price;
        }

        return view('carts.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, Request $request)
    {
        return $request->all();
        $cart->delete();

        Alert::success('Produk Berhasil Dihapus !');
        return back();
    }
    public function updatecart(Request $request)
    {
        // return $request->all();
        foreach ($request->product_id as $key => $value) {
            $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $request->product_id[$key])->first();
            $cart->update(['quantity' => $request->quantity[$key]]);
        }
        Alert::success('Keranjang Berhasil Diperbaharui !');
        return back();
    }
    public function destroyall()
    {
        Cart::where('user_id', auth()->user()->id)->delete();

        Alert::success('Keranjang Berhasil Dihapus !');
        return back();
    }
}
