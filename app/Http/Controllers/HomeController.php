<?php

namespace App\Http\Controllers;

use App\Models\Produk\Produk;
use App\Models\Store\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $stores = Store::latest()->paginate(3);
        $new_products = Produk::latest()->paginate(6);
        return view('welcome', compact('stores', 'new_products'));
    }
}
