@extends('layouts.app')
@section('title')
    Toko Saya
@endsection
@section('content')
    <!-- account area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>1 .</span> <a data-bs-toggle="collapse" class="collapsed"
                                            aria-expanded="true" href="#my-account-1">Edit Nama Toko </a>
                                    </h3>
                                </div>
                                <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>Informasi Toko Saya</h4>
                                                <h5>Detail Toko</h5>
                                            </div>
                                            <form method="POST"
                                                action="{{ @$store ? route('store.update', $store->id) : route('store.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @if (@$store)
                                                    @method('PUT')
                                                @endif
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Nama Toko</label>
                                                            <input type="text" name="name" placeholder="Nama Toko"
                                                                required value="{{ @$store->name }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Deskripsi Toko</label>
                                                            <textarea name="description" placeholder="Deskripsi Toko" required>{{ @$store->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Alamat Toko</label>
                                                            <textarea name="address" placeholder="Alamat Toko" required>{{ @$store->address }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Logo</label>
                                                            @if (@$store->logo != null)
                                                                <img class="mb-2"
                                                                    src="{{ asset('storage/store/images/' . @$store->logo) }}"
                                                                    alt="logo" />
                                                                <br>
                                                            @endif
                                                            <input type="file" name="logo" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">
                                                            @if (@$store)
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
                            <div class="panel panel-default single-my-account m-0" data-aos="fade-up" data-aos-delay="600">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title">
                                        <span>2 .</span>
                                        <a class="@if (!@$store) disabled @endif"
                                            href="{{ url('store/list-product') }}">Daftar Produk
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account mt-4" data-aos="fade-up" data-aos-delay="800">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title">
                                        <span>3 .</span>
                                        <a class="@if (!@$store) disabled @endif"
                                            href="{{ url('store/list-product') }}">Daftar Pesanan
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account area end -->
@endsection
