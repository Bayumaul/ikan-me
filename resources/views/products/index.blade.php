@extends('layouts.app')
@section('title')
    Produk
@endsection
@section('content')
    <div class="shop-category-area pb-100px pt-70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  col-md-12">
                    <!-- Shop Top Area Start -->
                    <div class="shop-top-bar d-flex">
                        <!-- Left Side start -->
                        <p>There Are {{ $products->count() }} Products.</p>
                        <!-- Left Side End -->
                        <!-- Right Side Start -->
                        <div class="select-shoing-wrap d-flex align-items-center">
                            <div class="shot-product">
                                <p>Sort By:</p>
                            </div>
                            <div class="shop-select">
                                <select class="shop-sort">
                                    <option data-display="Relevance">Relevance</option>
                                    <option value="1"> Name, A to Z</option>
                                    <option value="2"> Name, Z to A</option>
                                    <option value="3"> Price, low to high</option>
                                    <option value="4"> Price, high to low</option>
                                </select>

                            </div>
                        </div>
                        <!-- Right Side End -->
                    </div>
                    <!-- Shop Top Area End -->

                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area">

                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6" data-aos="fade-up"
                                    data-aos-delay="600">
                                    <!-- Single Prodect -->
                                    <div class="product mb-25px">
                                        <div class="thumb">
                                            <a href="{{ route('produk.show', $product->id) }}" class="image">
                                                @if ($product->have_thumbnail == 0)
                                                    <img src="{{ asset('storage/product/images/' . $product->thumbnail->foto) }}"
                                                        alt="Product" />
                                                    <img class="hover-image"
                                                        src="{{ asset('storage/product/images/' . $product->thumbnail->foto) }}"
                                                        alt="Product" />
                                                @else
                                                    <img src="assets/images/product-image/6.jpg" alt="Product" />
                                                    <img class="hover-image" src="assets/images/product-image/6.jpg"
                                                        alt="Product" />
                                                @endif
                                            </a>
                                            <span class="badges">
                                                {{-- <span class="sale">-5%</span> --}}
                                                @if ($product->new == 0)
                                                    <span class="new">New</span>
                                                @endif
                                            </span>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            {{-- <button title="Add To Cart" class=" add-to-cart">Add
                                                To Cart</button> --}}
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a
                                                    href="{{ route('produk.show', $product->id) }}">{{ $product->name }}</a>
                                            </h5>
                                            <span class="price">
                                                {{-- <span class="new">$38.50</span> --}}
                                                <span class="new">Rp . {{ number_format($product->price, 2) }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--  Pagination Area Start -->
                        <div class="pro-pagination-style text-center mb-md-30px mb-lm-30px mt-30px" data-aos="fade-up">
                            {{ $products->links('layouts.paginate') }}
                        </div>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->
                </div>
            </div>
        </div>
    </div>
@endsection
