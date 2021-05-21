@extends('layouts.landing')

@section('title')
    <title>About Us | Go-Kinclong</title>
@endsection

@section('content')
    <!-- Begin Main Content Area -->
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('landing/images/fix/haha.png') }}">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item text-night-rider">
                            <h2 class="breadcrumb-heading">About Us</h2>
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
        <div class="about-banner different-bg-position section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-banner-content text-center section-space-bottom-95">
                            <div class="section-title">
                                <span class="about-sub-title text-primary">Introduction</span>
                                <h2 class="about-title mb-5">Go-Kinclong</h2>
                                <p class="short-desc mb-0">Go-Kinclong berdiri dengan semangat menebar kebaikan dan menjadi inspirasi kebaikan. Puluhan juta kendaraan mengaspal di jalanan Indonesia setiap hari menjalankan roda perekonomian negara dan mobilitas bagi warganya. Kendala pada kendaraan menjadi ketakutan dan kekhawatiran bagi para penggunanya. Disisi lain waktu menjadi begitu berharga untuk bisa dinikmati bersama keluarga. Go-Kinclong hadir menjadi solusi atas kekhawatiran dan ketakutan sehingga membuat para pengendara menjadi merasa aman dan nyaman pergi kemanapun. Dan dengan layanan On-demand memberikan waktu yang lebih pada mereka untuk bersama keluarga.
                                </p>
                            </div>
                        </div>
                        <div class="about-banner-img row">
                            <div class="col-lg-4">
                                <div class="single-img img-hover-effect">
                                    <img class="img-full" src="{{ asset('landing/images/fix/1.png') }}" alt="About Banner">
                                </div>
                            </div>
                            <div class="col-lg-4 section-space-top-100">
                                <div class="single-img img-hover-effect">
                                    <img class="img-full" src="{{ asset('landing/images/fix/2.png') }}" alt="About Banner">
                                </div>
                            </div>
                            <div class="col-lg-4 section-space-top-100 pt-lg-0">
                                <div class="single-img img-hover-effect">
                                    <img class="img-full" src="{{ asset('landing/images/fix/3.png') }}" alt="About Banner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="team-member section-space-y-axis-100">
            <div class="container">
                <div class="section-title text-center pb-55">
                    <span class="about-sub-title text-primary">Group G</span>
                    <h2 class="about-title mb-0">Team Member</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container team-member-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="team-member-item img-gradient-effect">
                                        <div class="team-member-img">
                                            <a href="#">
                                                <img class="img-full" src="{{ asset('landing/images/fix/Lailatul Maghfiroh.png') }}" alt="Team Member">
                                            </a>
                                        </div>
                                        <div class="team-member-content">
                                            <h2 class="title mb-0">Lailatul Maghfiroh</h2>
                                            <span class="occupation">180516628527</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="team-member-item img-gradient-effect">
                                        <div class="team-member-img">
                                            <a href="#">
                                                <img class="img-full" src="{{ asset('landing/images/fix/Rinanda Arinta Julia.png') }}" alt="Team Member">
                                            </a>
                                        </div>
                                        <div class="team-member-content">
                                            <h2 class="title mb-0">Rinanda Arinta Julia</h2>
                                            <span class="occupation">180516628512</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="team-member-item img-gradient-effect">
                                        <div class="team-member-img">
                                            <a href="#">
                                                <img class="img-full" src="{{ asset('landing/images/fix/Try Selviana Silaban.png') }}" alt="Team Member">
                                            </a>
                                        </div>
                                        <div class="team-member-content">
                                            <h2 class="title mb-0">Try Selviana Silaban</h2>
                                            <span class="occupation">180516628514</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="team-member-item img-gradient-effect">
                                        <div class="team-member-img">
                                            <a href="#">
                                                <img class="img-full" src="{{ asset('landing/images/fix/Wike Nofitasari.png') }}" alt="Team Member">
                                            </a>
                                        </div>
                                        <div class="team-member-content">
                                            <h2 class="title mb-0">Wike Nofitasari</h2>
                                            <span class="occupation">180516628509</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Main Content End Here -->
@endsection
