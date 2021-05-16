@extends('layouts.app')

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
    </div>
    <div class="content-body">
        <!-- Book Today start -->
        <section id="today-book">
            <h5 class="mb-2">Bookingan Hari Ini</h5>
            @if ($data['today']->isNotEmpty())
                <div class="row match-height">
                    @foreach ($data['today'] as $book)
                        <div class="col-md-6 col-lg-4">
                            <div class="card card-app-design border-primary mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <div class="badge badge-light-primary">{{ dateTimeFormat($book->created_at, 0) }}</div>
                                        <div class="badge badge-pill badge-light-primary">{{ $book->state }}</div>
                                    </div>
                                    <h4 class="card-title">{{ $book->service_name }}</h4>
                                    <p class="card-text">{{ $book->vehicle_type }} dengan nomor plat <strong>{{ $book->vehicle_license_plate }}</strong>.<br>Status: <strong>{{ $book->status }}</strong></p>
                                    <div class="design-planning-wrapper">
                                        <div class="design-planning">
                                            <p class="card-text mb-25">Jadwal</p>
                                            <h6 class="mb-0">{{ dateTimeFormat($book->schedule_start_at) }}</h6>
                                        </div>
                                        <div class="design-planning">
                                            <p class="card-text mb-25">Biaya</p>
                                            <h6 class="mb-0">{{ toRupiah($book->service_cost) }}</h6>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary waves-effect">Lihat</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="card text-center shadow-none bg-transparent border-primary">
                            <div class="card-body">
                                <h4>Tidak ada Bookingan yang perlu diproses di hari ini</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
        <!-- Book Today end -->

        <!-- Statistic start -->
        <section id="statistic-book">
            <h5 class="mb-2">Statistik Bookingan</h5>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <a href="{{ route('books.index', ['state' => 'new']) }}" class="card btn btn-outline-primary waves-effect">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">{{ $data['new'] }}</h2>
                                <p class="card-text">Bookingan Baru</p>
                            </div>
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square font-medium-5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <a href="{{ route('books.index', ['state' => 'processed']) }}" class="card btn btn-outline-warning waves-effect">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">{{ $data['processed'] }}</h2>
                                <p class="card-text">Bookingan Diproses</p>
                            </div>
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader font-medium-5"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <a href="{{ route('books.index', ['state' => 'finished']) }}" class="card btn btn-outline-success waves-effect">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">{{ $data['finished'] }}</h2>
                                <p class="card-text">Bookingan Selesai</p>
                            </div>
                            <div class="avatar bg-light-success p-50 m-0">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square font-medium-5"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <a href="{{ route('books.index', ['state' => 'canceled']) }}" class="card btn btn-outline-danger waves-effect">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">{{ $data['canceled'] }}</h2>
                                <p class="card-text">Bookingan Gagal</p>
                            </div>
                            <div class="avatar bg-light-danger p-50 m-0">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square font-medium-5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Statistic end -->

        <!-- Book List start -->
        <section id="book-list">
            <h5 class="mb-2">Daftar Riwayat Bookingan</h5>
            <div class="row">
                @if ($data['lists']->isNotEmpty())
                    <div class="col-lg-12 col-12">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Jadwal</th>
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
                @else
                    <div class="col-md-6 col-xl-12">
                        <div class="card text-center shadow-none bg-transparent border-primary">
                            <div class="card-body">
                                <h4>Tidak ada riwayat Bookingan apapun</h4>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- Book List end -->

    </div>
@endsection
