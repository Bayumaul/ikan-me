<!-- New Product Start -->
<div class="section mt-5 pb-100px">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12" data-aos="fade-up">
                <div class="section-title text-center mb-11">
                    <h2 class="title">Produk Baru</h2>
                    {{-- <p class="sub-title">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo
                        tempor incididunt ut labore
                    </p> --}}
                </div>
            </div>
        </div>
        <!-- section title start -->
        <div class="new-product-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
            <div class="new-product-wrapper swiper-wrapper">
                @foreach ($new_products as $product)
                    <!-- Single Prodect -->
                    <div class="new-product-item swiper-slide">
                        <div class="product">
                            <div class="thumb">
                                <a href="{{ route('produk.show', $product->id) }}" class="image">
                                    {{-- <img src="assets/images/product-image/1.jpg" alt="Product" /> --}}
                                    <img src="{{ asset('storage/product/images/' . $product->thumbnail->foto) }}"
                                        alt="Product" />

                                    <img class="hover-image"
                                        src="{{ asset('storage/product/images/' . $product->thumbnail->foto) }}"
                                        alt="Product" />
                                </a>
                                <span class="badges">
                                    <span class="new">New</span>
                                </span>
                                <div class="actions">
                                    {{-- <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="#" class="action quickview" data-link-action="quickview"
                                        title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                            class="icon-size-fullscreen"></i></a>
                                    <a href="compare.html" class="action compare" title="Compare"><i
                                            class="icon-refresh"></i></a> --}}
                                </div>
                                {{-- <button title="Add To Cart" class=" add-to-cart">Add
                                    To Cart</button> --}}
                            </div>
                            <div class="content">
                                <h5 class="title"><a
                                        href="{{ route('produk.show', $product->id) }}">{{ $product->name }} </a></h5>
                                <span class="price">
                                    <span class="new">Rp {{ number_format($product->price, 2) }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<!-- New Product End -->
