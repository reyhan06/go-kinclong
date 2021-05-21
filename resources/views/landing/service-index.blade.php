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
                            <h2 class="breadcrumb-heading">Wash Services</h2>
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
        <div class="shop-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 order-lg-1 order-2 pt-10 pt-lg-0">
                        <div class="sidebar-area style-2">
                            <div class="widgets-area mb-9">
                                <h2 class="widgets-title mb-5">Jenis dan Ukuran Kendaraan</h2>
                                <div class="widgets-item">
                                    <ul class="widgets-category">
                                        <li>
                                            <a href="{{ route('landing.services.index', ['vehicle' => 'car', 'size' => 'small']) }}">Mobil | Small
                                                <span>({{ $counts['car-small'] }})</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('landing.services.index', ['vehicle' => 'car', 'size' => 'large']) }}">Mobil | Large
                                                <span>({{ $counts['car-large'] }})</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('landing.services.index', ['vehicle' => 'motorcycle', 'size' => 'small']) }}">Motor | Small maks.125 cc
                                                <span>({{ $counts['motorcycle-small'] }})</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('landing.services.index', ['vehicle' => 'motorcycle', 'size' => 'medium']) }}">Motor | Medium maks.150 cc
                                                <span>({{ $counts['motorcycle-medium'] }})</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('landing.services.index', ['vehicle' => 'motorcycle', 'size' => 'large']) }}">Motor | Large maks.250 cc
                                                <span>({{ $counts['motorcycle-large'] }})</span>
                                            </a>
                                        </li>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 order-lg-2 order-1">
                        <div class="tab-content text-charcoal pt-8">
                            <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                                <div class="product-grid-view row">
                                    @foreach ($services as $service)
                                        <div class="col-xl-4 col-sm-6 pt-6">
                                            <div class="product-item">
                                                <div class="product-img img-zoom-effect">
                                                    <a href="single-product-variable.html">
                                                        <img class="img-full" src="{{ asset($service->image) }}" alt="Product Images">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <a class="product-name pb-1" href="{{ route('landing.services.show', $service->slug) }}">{{ $service->name }}</a>
                                                    <div class="price-box">
                                                        <div class="price-box-holder">
                                                            <span>Harga:</span>
                                                            <span class="new-price text-primary">{{ toRupiah($service->cost) }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-add-action">
                                                        <ul>
                                                            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                                                                <a href="{{ route('landing.services.show', $service->slug) }}" data-tippy="View" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                                    <i class="pe-7s-look"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content End Here -->
@endsection
