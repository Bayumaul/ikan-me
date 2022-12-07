<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produk\Produk;
use App\Models\ProdukPhotos;
use App\Models\Store\Store;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([]);

        $product = Produk::create([
            'store_id' => Store::where('user_id', auth()->user()->id)->first()->id,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect(route('produk.edit', $product->id))
            ->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $photos = ProdukPhotos::where('produk_id', $produk->id)->get();
        $categories = Category::all();
        return view('products.create', compact('categories', 'produk', 'photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        if ($request->file('foto')) {
            foreach ($request->foto as $key => $value) {
                $image = $request->file('foto')[$key];
                $image->storeAs('product/images/' . $produk->name, $image->hashName());
                ProdukPhotos::create([
                    'produk_id' => $produk->id,
                    'foto' => $image->hashName(),
                ]);
            }
        }
        return back()
            ->with('success', 'Produk / Foto Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
