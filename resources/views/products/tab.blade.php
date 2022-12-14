    <!-- Product tab Area Start -->
    <div class="section product-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" data-aos="fade-up">
                    <div class="section-title mb-0">
                        <h2 class="title">Porduk Kami</h2>
                        {{-- <p class="sub-title mb-30px">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do
                            eiusmo tempor incididunt ut labore</p> --}}
                    </div>
                </div>

                <!-- Tab Start -->
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
                <!-- Tab End -->
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        @include('products.new-arrival')
                        @include('products.best-seller')
                        @include('products.sale-items')
                        @include('products.on-sale')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product tab Area End -->
