@extends('layouts.app')
@section('content')
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>1 .</span> <a data-bs-toggle="collapse" class="collapsed"
                                            aria-expanded="true" href="#my-account-1">Detail Nama Produk </a>
                                    </h3>
                                </div>
                                <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <form method="POST"
                                                action="{{ @$produk ? route('produk.update', $produk->id) : route('produk.store') }}">
                                                @csrf
                                                @if (@$produk)
                                                    @method('PUT')
                                                @endif
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Nama Produk</label>
                                                            <input type="text" name="name" placeholder="Nama Produk"
                                                                required value="{{ @$produk->name }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-select">
                                                            <label>Kategori Produk</label>
                                                            <br>
                                                            <select name="category_id"
                                                                style="background: transparent none repeat scroll 0 0;
                                                                    border: 1px solid #ebebeb;
                                                                    color: #474747;
                                                                    font-size: 14px;
                                                                    padding-left: 20px;
                                                                    padding-right: 10px;
                                                                    width: 100%;
                                                                    outline: 0;
                                                                    height: 45px;">
                                                                @foreach ($categories as $category)
                                                                    <option
                                                                        @if (@$product->category_id = $category->id) selected @endif
                                                                        value="{{ $category->id }}">
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Harga Produk</label>
                                                            <input type="number" name="price" placeholder="Harga Produk"
                                                                required
                                                                value="{{ @$produk ? number_format(@$produk->price) : 0 }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Deskripsi Produk</label>
                                                            <textarea name="description" placeholder="Deskripsi Produk" required>{{ @$produk->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Stok</label>
                                                            <input type="number" name="stok" placeholder="Harga Produk"
                                                                required value="{{ @$produk->stok }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">
                                                            @if (@$produk)
                                                                Update
                                                            @else
                                                                Create
                                                            @endif
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="600">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title">
                                        <span>2.</span>
                                        <a data-bs-toggle="collapse" class="collapsed" aria-expanded="false"
                                            href="#my-account-2">Tambah Foto Produk
                                        </a>
                                    </h3>
                                </div>

                                <div id="my-account-2" class="panel-collapse collapse show" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <form method="POST"
                                                action="{{ @$produk ? route('produk.update', $produk->id) : route('produk.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @if (@$produk)
                                                    @method('PUT')
                                                @endif
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Foto 1</label>
                                                            <input type="file" name="foto[]" placeholder="Nama Produk"
                                                                required value="{{ @$produk->name }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Foto 2</label>
                                                            <input type="file" name="foto[]" placeholder="Nama Produk"
                                                                required value="{{ @$produk->name }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Foto 3</label>
                                                            <input type="file" name="foto[]" placeholder="Nama Produk"
                                                                required value="{{ @$produk->name }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Foto 4</label>
                                                            <input type="file" name="foto[]" placeholder="Nama Produk"
                                                                required value="{{ @$produk->name }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                                    </div>
                                                    @if (@$produk)
                                                        <div class="billing-btn">
                                                            <button type="submit">
                                                                Upload
                                                            </button>
                                                        </div>
                                                    @else
                                                        <button disabled type="submit">
                                                            Upload
                                                        </button>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="600">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title">
                                        <span>3.</span>
                                        <a data-bs-toggle="collapse" class="collapsed" aria-expanded="true"
                                            href="#my-account-3">Foto Produk
                                        </a>
                                    </h3>
                                </div>

                                <div id="my-account-3" class="panel-collapse collapse show" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            @foreach ($photos as $photo)
                                                <img width="50%" height="50%"
                                                    src="{{ asset('/storage/product/images/' . $produk->name . '/' . $photo->foto) }}"
                                                    alt="" srcset="">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection