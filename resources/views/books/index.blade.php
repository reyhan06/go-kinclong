@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Book</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Book</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Book List start -->
        <section id="book-list">
            <div class="row">
                @if ($books->isNotEmpty())
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
                                            @foreach ($books as $book)
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
                                <h4>Tidak ada Bookingan apapun</h4>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- Book List end -->
    </div>
@endsection
