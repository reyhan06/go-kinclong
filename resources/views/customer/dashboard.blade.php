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
                                    <a href="{{ route('books.index', ['state' => 'new']) }}" class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square avatar-icon"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $data['new'] }}</h4>
                                            <p class="card-text font-small-3 mb-0">Baru</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                    <a href="{{ route('books.index', ['state' => 'processed']) }}" class="media">
                                        <div class="avatar bg-light-warning mr-2">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader avatar-icon"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $data['processed'] }}</h4>
                                            <p class="card-text font-small-3 mb-0">Diproses</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <a href="{{ route('books.index', ['state' => 'finished']) }}" class="media">
                                        <div class="avatar bg-light-success mr-2">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square avatar-icon"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $data['finished'] }}</h4>
                                            <p class="card-text font-small-3 mb-0">Selesai</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <a href="{{ route('books.index', ['state' => 'canceled']) }}" class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square avatar-icon"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $data['canceled'] }}</h4>
                                            <p class="card-text font-small-3 mb-0">Batal</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <a href="{{ route('books.index', ['today' => 1]) }}" class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-warning p-50 mb-1">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crosshair avatar-icon"><circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line></svg>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder">{{ $data['today'] }}</h2>
                            <p class="card-text">Jadwal bookingan hari ini</p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <a href="{{ route('books.index', ['review' => 1]) }}" class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-info p-50 mb-1">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star avatar-icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder">{{ $data['review'] }}</h2>
                            <p class="card-text">Bookingan yang perlu direview</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Book Statistics end -->

        <!-- Book List start -->
        <section id="book-list">
            <h5 class="mb-2">Daftar Riwayat Bookingan</h5>
            @if ($data['lists']->isEmpty())
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
            @else
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Layanan</th>
                                                <th>Kendaraan</th>
                                                <th>Pemilik</th>
                                                <th>Biaya</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['lists'] as $book)
                                                <tr>
                                                    <td>
                                                        {!! $book->icon !!}
                                                    </td>
                                                    <td>
                                                        <span>{{ dateTimeFormat($book->schedule_start_at) }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('books.show', $book->id) }}" class="font-weight-bolder">{{ $book->service_name }}</a>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="d-flex flex-column">
                                                            <span class="font-weight-bolder mb-25">{{ $book->vehicle_license_plate }}</span>
                                                            <span class="font-small-2 text-muted">{{ $book->vehicle_type }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="d-flex flex-column">
                                                            <span class="font-weight-bolder mb-25">{{ $book->customer_name }}</span>
                                                            <span class="font-small-2 text-muted">{{ $book->customer_phone }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bolder">{{ toRupiah($book->service_cost) }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
        <!-- Book List end -->

    </div>
@endsection
