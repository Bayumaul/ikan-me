    <!-- Product tab Area Start -->
    <div class="section product-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" data-aos="fade-up">
                    <div class="section-title mb-0">
                        <h2 class="title">Toko Terpercaya</h2>
                    </div>
                </div>

                {{-- <!-- Tab Start -->
                <div class="col-md-12 text-center mb-40px" data-aos="fade-up" data-aos-delay="200">
                    <ul class="product-tab-nav nav justify-content-center">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                href="#tab-product-new-arrivals">New Arrivals</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                href="#tab-product-best-sellers">Best
                                Sellers </a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-product-sale-item">Sale
                                Items</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-product-on-sales">On
                                Sales</a></li>
                    </ul>
                </div>
                <!-- Tab End --> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        @include('home.stores')
                        {{-- @include('home.new-arrival') --}}
                        {{-- @include('home.best-seller')
                        @include('home.sale-items')
                        @include('home.on-sale') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product tab Area End -->
