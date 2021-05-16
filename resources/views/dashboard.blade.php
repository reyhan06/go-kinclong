@extends('layouts.app')
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Home</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrumb-right">
                <a href="{{ route('books.create') }}" class="btn btn-primary waves-effect waves-float waves-light">Book Now</a>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Open Book start -->
        <section id="open-book">
            <h5 class="mb-2">Bookingan Aktif</h5>
            <div class="row">
                <div class="col-md-6 col-xl-12">
                    <div class="card text-center shadow-none bg-transparent border-primary">
                        <div class="card-body">
                            <h4 class="card-title">Saat ini anda belum memiliki Bookingan yang aktif</h4>
                            <p class="card-text">Silahkan tekan tombol <strong>Book Now</strong> di atas yah</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row match-height">
                <div class="col-md-6 col-lg-4">
                    <div class="card card-app-design border-primary mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="badge badge-light-primary">03 Sep, 20</div>
                                <div class="badge badge-pill badge-light-primary">New</div>
                            </div>
                            <h4 class="card-title">Cuci Mobil Small Reguler Interior dan Eksterior</h4>
                            <p class="card-text">Toyota dengan nomor plat <strong>B 1234 CD</strong>.<br>Status: <strong>sedang menunggu konfirmasi</strong></p>
                            <div class="design-planning-wrapper">
                                <div class="design-planning">
                                    <p class="card-text mb-25">Date</p>
                                    <h6 class="mb-0">12 Apr, 21 - 10.00</h6>
                                </div>
                                <div class="design-planning">
                                    <p class="card-text mb-25">Cost</p>
                                    <h6 class="mb-0">Rp. 50.000</h6>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-outline-primary waves-effect">View details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-app-design border-primary mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="badge badge-light-primary">03 Sep, 20</div>
                                <div class="badge badge-pill badge-light-info">Process</div>
                            </div>
                            <h4 class="card-title">Cuci Motor Small Waterless</h4>
                            <p class="card-text">Honda dengan nomor plat <strong>B 567 EF</strong>.<br>Status: <strong>Menunggu jadwal layanan tiba</strong></p>
                            <div class="design-planning-wrapper">
                                <div class="design-planning">
                                    <p class="card-text mb-25">Date</p>
                                    <h6 class="mb-0">12 Apr, 21 - 10.00</h6>
                                </div>
                                <div class="design-planning">
                                    <p class="card-text mb-25">Cost</p>
                                    <h6 class="mb-0">Rp. 50.000</h6>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-outline-primary waves-effect">View details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-app-design border-primary mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="badge badge-light-primary">03 Sep, 20</div>
                                <div class="badge badge-pill badge-light-primary">New</div>
                            </div>
                            <h4 class="card-title">Cuci Mobil Small Reguler Interior dan Eksterior</h4>
                            <p class="card-text">Toyota dengan nomor plat <strong>B 1234 CD</strong>.<br>Status: <strong>sedang menunggu konfirmasi</strong></p>
                            <div class="design-planning-wrapper">
                                <div class="design-planning">
                                    <p class="card-text mb-25">Date</p>
                                    <h6 class="mb-0">12 Apr, 21 - 10.00</h6>
                                </div>
                                <div class="design-planning">
                                    <p class="card-text mb-25">Cost</p>
                                    <h6 class="mb-0">Rp. 50.000</h6>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-outline-primary waves-effect">View details</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
        <!-- Open Book end -->

        <!-- Book Statistics start -->
        <section id="open-book">
            <h5 class="mb-2">Info Bookingan</h5>
            <div class="row match-height">
                <div class="col-lg-8 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Statistik</h4>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">230k</h4>
                                            <p class="card-text font-small-3 mb-0">Sales</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                    <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user avatar-icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">8.549k</h4>
                                            <p class="card-text font-small-3 mb-0">Customers</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">1.423k</h4>
                                            <p class="card-text font-small-3 mb-0">Products</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="media">
                                        <div class="avatar bg-light-success mr-2">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">$9745</h4>
                                            <p class="card-text font-small-3 mb-0">Revenue</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-info p-50 mb-1">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-medium-5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder">2</h2>
                            <p class="card-text">Jadwal bookingan hari ini</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-info p-50 mb-1">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-medium-5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder">3</h2>
                            <p class="card-text">Bookingan yang perlu direview</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Book Statistics end -->

        <!-- Book List start -->
        <section id="book-list">
            <h5 class="mb-2">Daftar Riwayat Bookingan</h5>
            <div class="row">
                <div class="col-md-6 col-xl-12">
                    <div class="card text-center shadow-none bg-transparent border-primary">
                        <div class="card-body">
                            <h4 class="card-title">Saat ini anda belum memiliki riwayat Bookingan apapun</h4>
                            <p class="card-text">Silahkan tekan tombol <strong>Book Now</strong> di atas yah</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row match-height">
                <div class="col-lg-12 col-12">
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover-animation">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">Status</th>
                                            <th style="width:10%;">Tanggal</th>
                                            <th style="width:40%;">Layanan</th>
                                            <th style="width:15%;">Kendaraan</th>
                                            <th style="width:15%;">Pemilik</th>
                                            <th style="width:15%;">Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="avatar bg-light-primary">
                                                    <div class="avatar-content" data-toggle="tooltip" data-placement="right" title="" data-original-title="Selesai">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor font-medium-3"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>12 Apr, 21</span>
                                            </td>
                                            <td>
                                                <div class="font-weight-bolder">Cuci Mobil Large Reguler Interior dan Eksterior</div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="font-weight-bolder mb-25">B 1234 CD</span>
                                                    <span class="font-small-2 text-muted">Toyota</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="font-weight-bolder mb-25">Uzumaki Naruto</span>
                                                    <span class="font-small-2 text-muted">0812345678</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="font-weight-bolder">Rp 50.000</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-12">
                    <div class="card card-transaction border-warning">
                        <div class="card-header">
                            <h4 class="card-title">Berikan Review Terbaik Pada Bookinganmu!</h4>
                        </div>
                        <div class="card-body">
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-warning rounded">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info avatar-icon font-medium-3"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <a href="#"><h6 class="transaction-title text-warning">Toyota - B 1234 CD</h6></a>
                                        <small>Cuci Mobil Large Reguler Interior dan Eksterior</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder">12 Apr, 2021</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-warning rounded">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info avatar-icon font-medium-3"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <a href="#"><h6 class="transaction-title text-warning">Toyota - B 1234 CD</h6></a>
                                        <small>Cuci Mobil Large Reguler Interior dan Eksterior</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder">12 Apr, 2021</div>
                            </div>
                            <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-warning rounded">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info avatar-icon font-medium-3"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <a href="#"><h6 class="transaction-title text-warning">Toyota - B 1234 CD</h6></a>
                                        <small>Cuci Mobil Large Reguler Interior dan Eksterior</small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder">12 Apr, 2021</div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div> --}}
        </section>
        <!-- Book List end -->

    </div>
@endsection
