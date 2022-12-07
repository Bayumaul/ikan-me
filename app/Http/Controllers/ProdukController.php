<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Store\Store;
use App\Models\ProdukPhotos;
use Illuminate\Http\Request;
use App\Models\Produk\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produk::with('thumbnail')->latest()->paginate(17);
        foreach ($products as $product) {
            if ($product->thumbnail == null) {
                $product->have_thumbnail = 1;
            } else $product->have_thumbnail = 0;
            $from_date = Carbon::parse(date('Y-m-d', strtotime($product->created_at)));
            $through_date = Carbon::parse(date('Y-m-d', strtotime(now())));
            $shift_difference = $from_date->diffInDays($through_date);
            if ($shift_difference > 7) {
                $product->new = 1;
            } else $product->new = 0;
        }
        return view('products.index', compact('products'));
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
            'stok' => $request->stok,
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
        // return $produk->photos;
        return view('products.show', compact('produk'));
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

        // return $abcde;
        if ($request->file('foto')) {
            foreach ($request->foto as $key => $value) {
                $image = $request->file('foto')[$key];
                $image->storeAs('product/images/', $image->hashName());
                ProdukPhotos::create([
                    'produk_id' => $produk->id,
                    'foto' => $image->hashName(),
                ]);
            }
        } else {
            $product = Produk::find($produk->id);
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'stok' => $request->stok,
                'description' => $request->description,
            ]);
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
