@extends('layouts.app')
@section('title')
    Daftar Pesanan
@endsection
@section('content')
    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Daftar Pesanan Saya</h3>
            <div class="row">
                @if ($orders->count() == 0)
                    <div class="empty-text-contant text-center">
                        <i class="icon-handbag"></i>
                        <h1>Tidak ada item lagi di keranjang Anda</h1>
                        <a class="empty-cart-btn" href="{{ route('produk.index') }}">
                            <i class="ion-ios-arrow-left"> </i> Lanjutkan Belanja
                        </a>
                    </div>
                @else
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table id="datatable">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        @foreach ($order->carts as $item)
                                            <tr>
                                                <td class="product-name"><a href="#">{{ $item->product->name }}</a>
                                                </td>
                                                <td class="product-price-cart"><span class="amount">Rp
                                                        {{ number_format($item->product->price, 2) }}</span></td>
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" type="text" name="quantity[]"
                                                            value="{{ $item->quantity }}" />
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">Rp
                                                    {{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                                    {{-- @if ($)
                                                        
                                                    @else
                                                        
                                                    @endif --}}
                                                <td class="product-subtotal">Rp
                                                    {{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                                <td class="product-remove">
                                                    <a onclick="destroy({{ $item->id }})"><i class="icon-close"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection
@section('scripts')
    <script src="{{ asset('/js/cart/index.js') }}"></script>
@endsection
