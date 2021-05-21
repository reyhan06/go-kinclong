@extends('layouts.landing')

@section('title')
    <title>Home | Go-Kinclong</title>
@endsection

@section('content')
    <!-- Begin Slider Area -->
    <div class="slider-area">

        <!-- Main Slider -->
        <div class="swiper-container main-slider swiper-arrow with-bg_white">
            <div class="swiper-wrapper">
                <div class="swiper-slide animation-style-01">
                    <div class="slide-inner bg-height" data-bg-image="{{ asset('landing/images/fix/Awal.png') }}">
                        <div class="container">
                            <div class="slide-content text-white">
                                <h3 class="sub-title">Kendaraan Kotor Tapi Gak Sempat Nyuci?</h3>
                                <h2 class="title mb-3">Go-Kinclong solusinya!</h2>
                                <p class="short-desc different-width mb-10">Order pelayanan dengan mudah, Percayakan ke spesialis kami, Kendaraanmu jadi kinclong seketika!
                                </p>
                                <div class="button-wrap">
                                    <a class="btn btn-custom-size lg-size btn-primary" href="{{ route('books.create') }}">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide animation-style-01">
                    <div class="slide-inner bg-height" data-bg-image="{{ asset('landing/images/fix/Awal2.png') }}">
                        <div class="container">
                            <div class="slide-content text-white">
                                <h2 class="title mb-3">Murah</h2>
                                <p class="short-desc different-width mb-10">Harga yang kami berikan adalah kulaitas dengan harga TERBAIK, karena kami sangat mengetahui keinginan dan sifat customer bahwa customer sangat ingin mencuci kendaraan
                                    dengan harga murah dengan kulitas terbaik!</p>
                                <div class="button-wrap">
                                    <a class="btn btn-custom-size lg-size btn-primary" href="{{ route('books.create') }}">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination with-bg d-md-none"></div>

            <!-- Custom Arrows -->
            <div class="custom-arrow-wrap d-none d-md-block">
                <div class="custom-button-prev"></div>
                <div class="custom-button-next"></div>
            </div>
        </div>

    </div>
    <!-- Slider Area End Here -->

    <div class="background-img">
        <div class="inner-bg">
            <img src="{{ asset('landing/images/background-img/inner-bg/1-1-496x566.png') }}" alt="Inner Background">
        </div>
        <div class="banner-area section-space-top-100">
            <div class="container">
                <div class="section-title style-2 pb-55">
                    <h2 class="title mb-0">Layanan Cuci Kendaraan Terlaris</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover-effect">
                            <div class="banner-img img-zoom-effect">
                                <img class="img-full" src="{{ asset('landing/images/fix/p1.png') }}" alt="Banner Image">
                                <div class="inner-content text-white">
                                    <h3 class="offer">IDR 55.000</h3>
                                    <h2 class="title">Cuci Mobil Small Reguler Eksterior dan Interior</h2>
                                    <div class="button-wrap">
                                        <a class="btn btn-custom-size btn-primary" href="{{ route('books.create') }}">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-6 pt-md-0">
                        <div class="banner-item img-hover-effect">
                            <div class="banner-img img-zoom-effect">
                                <img class="img-full" src="{{ asset('landing/images/fix/p2.png') }}" alt="Banner Image">
                                <div class="inner-content text-white">
                                    <h3 class="offer">IDR 50.000</h3>
                                    <h2 class="title mb-5">Cuci Mobil Large Reguler Eksterior</h2>
                                    <div class="button-wrap">
                                        <a class="btn btn-custom-size btn-primary" href="{{ route('books.create') }}">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-6 pt-lg-0">
                        <div class="banner-item img-hover-effect">
                            <div class="banner-img img-zoom-effect">
                                <img class="img-full" src="{{ asset('landing/images/fix/p3.png') }}" alt="Banner Image">
                                <div class="inner-content text-white">
                                    <h3 class="offer">IDR 20.000</h3>
                                    <h2 class="title mb-5">Cuci Motor Medium Reguler</h2>
                                    <div class="button-wrap">
                                        <a class="btn btn-custom-size btn-primary" href="{{ route('books.create') }}">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Begin Shipping Area -->
        <div class="shipping-area section-space-y-axis-100">
            <div class="container">
                <div class="shipping-bg" data-bg-image="{{ asset('landing/images/shipping/bg/1-1-1280x202.jpg') }}">
                    <div class="row shipping-wrap py-5 py-xl-0">
                        <div class="col-lg-4">
                            <div class="shipping-item">
                                <div class="shipping-img">
                                    <img src="{{ asset('landing/images/fix/ikon 1.png') }}" alt="Shipping Icon">
                                </div>
                                <div class="shipping-content">
                                    <h2 class="title">Sesuai Kebutuhan</h2>
                                    <p class="short-desc mb-0">Layanan kami melayani dimana saja dan kapan saja sesuai kebutuhanmu0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-4 pt-lg-0">
                            <div class="shipping-item">
                                <div class="shipping-img">
                                    <img src="{{ asset('landing/images/fix/ikon 2.png') }}" alt="Shipping Icon">
                                </div>
                                <div class="shipping-content">
                                    <h2 class="title">Layanan Berkualitas</h2>
                                    <p class="short-desc mb-0">Spesialis kami memiliki pengetahuan dan perlengkapan yang berkualitas. Menjadikan pelayanan semakin memuaskan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-4 pt-lg-0">
                            <div class="shipping-item">
                                <div class="shipping-img">
                                    <img src="{{ asset('landing/images/fix/ikon 3.png') }}" alt="Shipping Icon">
                                </div>
                                <div class="shipping-content">
                                    <h2 class="title">Spesialis Handal</h2>
                                    <p class="short-desc mb-0">Spesialis kami berasal dari bengkel-bengkel terpercaya dan juga talent-talent terlatih yang sudah mahir di bidangnya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shipping Area End Here -->

    </div>

    <!-- Begin Newsletter Area -->
    <div class="newsletter-area section-border-y-axis">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="newsletter-img">
                        <img src="{{ asset('landing/images/fix/langkah2.png') }}" alt="Newsletter Image">
                    </div>
                </div>
                <div class="col-md-6 align-self-md-center pb-10 pb-md-0">
                    <div class="newsletter-content">
                        <h2 class="newsletter-title mb-4">Langkah-Langkah Pemesanan</h2>
                    </div>
                    </form>
                    <!-- Mailchimp Alerts -->
                    <div class="mailchimp-alerts text-centre pt-5">
                        <div class="mailchimp-submitting"></div>
                        <div class="mailchimp-success"></div>
                        <div class="mailchimp-error"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Area End Here -->

    @if ($reviews->isNotEmpty())
        <!-- Begin Testimonial Area -->
        <div class="testimonial-area bg-white-smoke section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container testimonial-slider">
                            <div class="swiper-wrapper">
                                @foreach ($reviews as $review)
                                    <div class="swiper-slide testimonial-item">
                                        <div class="user-info mb-3">
                                            <div class="user-content">
                                                <h4 class="user-name mb-1">{{ $review->book->customer_name }}</h4>
                                            </div>
                                        </div>
                                        <p class="user-comment mb-6">{{ $review->description }}

                                        </p>
                                        <div class="rating-box">
                                            <ul>
                                                @for ($i=0; $i < $review->stars; $i++)
                                                    <li><i class="fa fa-star"></i></li>
                                                @endfor
                                            </ul>
                                            <span class="title">{{ $review->stars }}.0</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="testimonial-pagination with-bg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial Area End Here -->
    @endif

@endsection
