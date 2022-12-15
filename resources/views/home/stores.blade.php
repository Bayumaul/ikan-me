<!-- 2nd tab start -->
<div class="tab-pane fade show active" id="tab-product-best-sellers">
    <div class="row">
        @foreach ($stores as $store)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up" data-aos-delay="200">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="{{ route('store.show', $store->id) }}" class="image">
                            @if ($store->logo == null)
                                <img src="{{ asset('assets/images/template/logo1.png') }}" alt="Product" />
                                <img class="hover-image" src="{{ asset('assets/images/template/logo1.png') }}"
                                    alt="Product" />
                            @else
                                <img src="{{ asset('storage/store/images/' . @$store->logo) }}" alt="Product" />
                                <img class="hover-image" src="{{ asset('storage/store/images/' . @$store->logo) }}"
                                    alt="Product" />
                            @endif
                        </a>
                        <a href="{{ route('store.show', $store->id) }}" title="Add To Cart" class=" add-to-cart">Liat
                            Toko </a>
                    </div>
                    <div class="content">
                        <h5 class="title"><a href="{{ route('store.show', $store->id) }}">{{ $store->name }}
                            </a></h5>
                        <span>
                            <span class="new">{{ $store->address }}</span>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- 2nd tab end -->
