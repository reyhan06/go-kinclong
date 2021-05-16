@extends('layouts.app')

@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('vendor_js')
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page_js')
    <script src="{{ asset('js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('js/scripts/forms/pickers/form-pickers.js') }}"></script>
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Book</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Book</a></li>
                            <li class="breadcrumb-item active">Show</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Information start -->
        <section id="information">
            <div class="row kb-search-content-info">
                <div class="col-md-4 col-sm-6 col-12 kb-search-content"></div>
                <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                    <div class="card">
                        <a href="page-kb-category.html">
                            <img src="{{ asset('images/illustration/email.svg') }}" class="card-img-top" alt="knowledge-base-image">
                            <div class="card-body text-center">
                                <h4>Menunggu Konfirmasi Anda</h4>
                                <p class="text-body mt-1 mb-0">
                                    Pastikan data di bawah sudah benar.
                                    Anda dapat mengubah data tersebut bila diperlukan.
                                    Jika sudah, silahkan tekan tombol kirim.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Information start -->

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Bookingan</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('books.confirm', $book->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="name">Nama</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="name" class="form-control" name="customer_name" placeholder="Nama lengkap" value="{{ old('customer_name', $book->customer_name) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="phone">Kontak (HP)</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="phone" class="form-control" name="customer_phone" placeholder="Contoh: 08123456789" value="{{ old('customer_phone', $book->customer_phone) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="vehicle_type">Jenis Kendaraan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="vehicle_type" class="form-control" name="vehicle_type" placeholder="Contoh: Toyota" value="{{ old('vehicle_type', $book->vehicle_type) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="vehicle_license_plate">Plat Nomor Kendaraan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="vehicle_license_plate" class="form-control" name="vehicle_license_plate" placeholder="Contoh: B 1234 CD" value="{{ old('vehicle_license_plate', $book->vehicle_license_plate) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="service">Layanan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select id="service" class="select2 form-control form-control-lg" name="service_id" required>
                                                    <option value="{{ old('service_id', $book->service_id) }}">{{ old('service_id') ? $services->firstWhere('id', old('service_id'))->name .' ('. $services->firstWhere('id', old('service_id'))->cost .')' : $book->service_name .' ('. toRupiah($book->service_cost) .')' }}</option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}">{{ $service->name ." ($service->cost)" }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="fp-date">Jadwal Tanggal</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="fp-date" name="date" class="form-control flatpickr-date" placeholder="Masukkan jadwal tanggal yang diinginkan" value="{{ old('date', date('Y-m-d', strtotime($book->schedule_start_at))) }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="time">Jadwal Jam Mulai</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select id="time" class="select2 form-control form-control-lg" name="time" required>
                                                    <option value="{{ old('time', timeFormat($book->schedule_start_at)) }}">{{ old('time', timeFormat($book->schedule_start_at)) }} WIB</option>
                                                    @foreach ($times as $time)
                                                        <option value="{{ $time }}">{{ $time }} WIB</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="end_time">Jadwal Jam Selesai</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select id="end_time" class="select2 form-control form-control-lg" name="end_time" required>
                                                    @if (old('end_time'))
                                                        <option value="{{ old('end_time') }}">{{ old('end_time') }} WIB</option>
                                                    @else
                                                        <option value="">Silahkan dipilih...</option>
                                                    @endif
                                                    @foreach ($times as $time)
                                                        <option value="{{ $time }}">{{ $time }} WIB</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Konfirmasi</button>
                                        <a href="{{ route('books.edit_state_to_cancel', $book->id) }}" class="btn btn-outline-danger mr-1 waves-effect waves-float waves-light">Tolak?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Horizontal form layout section end -->
    </div>
@endsection
