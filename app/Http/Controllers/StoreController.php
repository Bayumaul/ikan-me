<?php

namespace App\Http\Controllers;

use App\Models\Store\Store;
use Illuminate\Http\Request;
use App\Models\Produk\Produk;
use RealRashid\SweetAlert\Facades\Alert;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::where('user_id', auth()->user()->id)->first();
        return view('store.create', compact('store'));
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
        // return $request->logo;
        $this->validate($request, [
            'logo'     => 'image|mimes:png,jpg,jpeg',
            'name'     => 'required',
            'description'   => 'required'
        ]);


        $duplicate = Store::where('name', $request->name)->first();
        if ($duplicate) return back()->with('error', 'Nama Toko Sudah ada');
        $store = Store::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
        ]);

        if ($request->logo) {
            $image = $request->file('logo');
            $image->storeAs('store/images/', $image->hashName());
            $store->update(['logo' => $image->hashName()]);
        }
        Alert::success('Toko Berhasil Dibuat !');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $this->validate($request, [
            'logo'     => 'image|mimes:png,jpg,jpeg',
            'name'     => 'required',
            'description'   => 'required'
        ]);
        $store->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
        ]);

        if ($request->logo) {
            $image = $request->file('logo');
            $image->storeAs('store/images/', $image->hashName());
            $store->update(['logo' => $image->hashName()]);
        }
        Alert::success('Toko Berhasil Diupdate !');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }

    public function product()
    {
        $store = Store::where('user_id', auth()->user()->id)->first();
        $products = Produk::where('store_id', $store->id)->with('category')->get();
        return view('store.product', compact('store', 'products'));
    }
}
