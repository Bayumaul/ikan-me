   <!-- Banner Section Start -->
   <div class="section pb-100px pt-100px">
       <div class="container">
           <!-- Banners Start -->
           <div class="row">
               @foreach ($stores as $store)
                   <!-- Banner Start -->
                   <div class="col-lg-4 col-12 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                       <div class="banner-2">
                           @if ($store->logo != null)
                               <img class="mb-2" src="{{ asset('storage/store/images/' . @$store->logo) }}"
                                   alt="logo" />
                               <br>
                           @else
                               <img src="https://source.unsplash.com/random/370x212?fish" alt="" />
                           @endif
                           <div class="info justify-content-start">
                               <div class="content align-self-center">
                                   <h3 class="title text-white">
                                       {{ $store->name }} <br /> Collection
                                   </h3>
                                   <a href="{{ route('produk.index') }}" class="shop-link">Shop Now</a>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- Banner End -->
               @endforeach
           </div>
           <!-- Banners End -->
       </div>
   </div>
   <!-- Banner Section End -->
