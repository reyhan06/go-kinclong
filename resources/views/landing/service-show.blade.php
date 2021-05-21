@extends('layouts.landing')

@section('title')
    <title>Services | Go-Kinclong</title>
@endsection

@section('content')
    <!-- Begin Main Content Area -->
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('landing/images/fix/haha.png') }}">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item text-night-rider">
                            <h2 class="breadcrumb-heading">Detail Layanan</h2>
                            <ul>
                                <li>
                                    <h4>Go-Kinclong | Sistem Pemesanan Layanan Cuci Mobil dan Motor</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-product-area section-space-top-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-product-img">
                            <div class="swiper-container mb-6">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="{{ asset($service->image) }}" class="single-img gallery-popup">
                                            <img class="img-full" src="{{ asset($service->image) }}" alt="Product Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-9 pt-lg-0">
                        <div class="single-product-content">
                            <h2 class="title mb-3">{{ $service->name }}</h2>
                            <div class="price-box pb-3">
                                <span class="new-price text-danger">{{ toRupiah($service->cost) }}</span>
                            </div>
                            <div class="rating-box-wrap pb-55">
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="review-status ps-4">
                                    <a href="#">( {{ $review_count }} Customer Review )</a>
                                </div>
                            </div>
                            <p class="short-desc mb-9">{{ $service->description }}</p>
                            <ul class="quantity-with-btn pb-9">
                                <li class="add-to-cart">
                                    <a class="btn btn-custom-size lg-size btn-primary" href="{{ route('books.create') }}">Book Now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content End Here -->
@endsection
