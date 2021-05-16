@extends('layouts.app')

@if (! $is_customer)
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
@endif

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Book {{ $book->invoice_number ? "($book->invoice_number)" : '' }}</h2>
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
        @if (session('message'))
            <!-- Alert start -->
            <section id="alert-colors">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Sukses!</h4>
                            <div class="alert-body">
                                {{ session('message') }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Alert end -->
        @endif

        @if ($errors->any())
        <!-- Alert start -->
        <section id="alert-colors">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Terdapat kesalahan. Pastikan:</h4>
                        @foreach ($errors->all() as $error)
                            <div class="alert-body">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Alert end -->
        @endif

        @if ($book->is_new)
            @if ($is_customer)
                <!-- Information start -->
                <section id="information">
                    <div class="row kb-search-content-info">
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content"></div>
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="page-kb-category.html">
                                    <img src="{{ asset('images/illustration/email.svg') }}" class="card-img-top" alt="knowledge-base-image">
                                    <div class="card-body text-center">
                                        <h4>Menunggu Konfirmasi</h4>
                                        <p class="text-body mt-1 mb-0">Kami akan segera mengabarkan Anda kembali baik melalui email maupun kontak yang Anda berikan paling lambat 1x15 menit.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Information start -->
            @else
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
            @endif
        @elseif ($book->is_processed)
            @if ($book->is_executed)
                <!-- Information start -->
                <section id="information">
                    <div class="row kb-search-content-info">
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content"></div>
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card border-primary">
                                <a href="page-kb-category.html">
                                    <img src="{{ asset('images/illustration/demand.svg') }}" class="card-img-top" alt="knowledge-base-image">
                                    <div class="card-body text-center">
                                        <h4>Terkonfirmasi dan Jadwal Telah Tiba</h4>
                                        <p class="text-body mt-1 mb-0">
                                            Bookingan telah berhasil dikonfirmasi.
                                            Jadwal bookingan juga telah tiba dan akan siap dilayani.
                                            <strong>Silahkan kunjungi Go-Kinclong 15 menit sebelum jam {{ timeFormat($book->schedule_start_at) }} WIB.</strong>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Information start -->
            @else
                <!-- Information start -->
                <section id="information">
                    <div class="row kb-search-content-info">
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content"></div>
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="page-kb-category.html">
                                    <img src="{{ asset('images/illustration/demand.svg') }}" class="card-img-top" alt="knowledge-base-image">
                                    <div class="card-body text-center">
                                        <h4>Terkonfirmasi dan Menunggu Jadwal Tiba</h4>
                                        <p class="text-body mt-1 mb-0">
                                            Bookingan telah berhasil dikonfirmasi.
                                            Silahkan menunggu jadwal layanan tiba.
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Information start -->
            @endif
        @elseif ($book->is_finished)
            @if ($book->needs_to_be_reviewed)
                <!-- Information start -->
                <section id="information">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12"></div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card card-congratulation-medal border-warning">
                                <div class="card-body">
                                    <h5>Bookingan Selesai</h5>
                                    <p class="card-text font-small-3">Bookingan telah selesai dan <br>menunggu untuk direview</p>
                                    <h3 class="mb-75 mt-4">
                                        <span class="text-primary">Terima kasih 😊</span>
                                    </h3>
                                    @if ($is_customer)
                                        <a href="{{ route('books.add_review', $book->id) }}" class="btn btn-primary waves-effect waves-float waves-light">Review Sekarang</a>
                                    @endif
                                    <div class="float-right">
                                        <img src="{{ asset('images/illustration/badge.svg') }}" class="congratulation-medal" alt="Medal Pic">

                                    </div>
                                </div>
                            </div>


                            {{-- <div class="card border-warning">
                                <a href="page-kb-category.html">
                                    <img src="{{ asset('images/illustration/badge.svg') }}" class="card-img-top" alt="knowledge-base-image">
                                    <div class="card-body text-center">
                                        <h4>Bookingan Selesai dan Menunggu Review</h4>
                                        <p class="text-body mt-1 mb-0">Bookingan telah selesai dan sedang menunggu untuk direview oleh {{ $is_customer ? 'Anda' : 'Pelanggan' }}</p>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </section>
                <!-- Information start -->
            @else
                <!-- Information start -->
                <section id="information">
                    <div class="row kb-search-content-info">
                        <div class="col-md-3 col-sm-6 col-12 kb-search-content"></div>
                        <div class="col-md-6 col-sm-6 col-12 kb-search-content">
                            <div class="card card-congratulations">
                                <div class="card-body text-center">
                                    <img src="{{ asset('images/elements/decore-left.png') }}" class="congratulations-img-left" alt="card-img-left">
                                    <img src="{{ asset('images/elements/decore-right.png') }}" class="congratulations-img-right" alt="card-img-right">
                                    <div class="avatar avatar-xl bg-primary shadow">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-1 text-white">Bookingan Selesai</h1>
                                        <p class="card-text m-auto w-75">
                                            Bookingan telah selesai dan telah direview {{ $is_customer ? 'oleh Anda' : '' }} <br>
                                            <strong>Terima kasih 😊</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Information start -->
            @endif
        @elseif ($book->is_canceled)
            <!-- Information start -->
            <section id="information">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12"></div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="avatar bg-light-danger p-50 mb-1">
                                    <div class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square font-medium-5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                                    </div>
                                </div>
                                <h2 class="font-weight-bolder">Bookingan dibatalkan</h2>
                                <p class="card-text">Alasan: {{ $book->cancel_note }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Information start -->
        @endif

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Bookingan</h4>
                            @if ($book->invoice_number)
                                <h4 class="card-title"><a href="{{ route('books.invoice', $book->id) }}" class="btn btn-outline-primary" target="_blank">Lihat Invoice</a></h4>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($is_customer)
                                <form class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="name">Nama</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="name" class="form-control" value="{{ $book->customer_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="phone">Kontak (HP)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="phone" class="form-control" value="{{ $book->customer_phone }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="vehicle_type">Jenis Kendaraan</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="vehicle_type" class="form-control" value="{{ $book->vehicle_type }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="vehicle_license_plate">Plat Nomor Kendaraan</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="vehicle_license_plate" class="form-control" value="{{ $book->vehicle_license_plate }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="service">Layanan</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="service" class="form-control" value="{{ $book->service_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-3 col-form-label">
                                                    <label for="fp-date-start">Jadwal Tiba</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="fp-date-start" class="form-control" value="{{ dateTimeFormat($book->schedule_start_at) }} WIB" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($book->schedule_end_at)
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="fp-date-end">Jadwal Selesai</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="fp-date-end" class="form-control" value="{{ dateTimeFormat($book->schedule_end_at) }} WIB" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($book->can_be_canceled)
                                            <div class="col-sm-9 offset-sm-3">
                                                <a href="{{ route('books.edit_state_to_cancel', $book->id) }}" class="btn btn-outline-danger mr-1 waves-effect waves-float waves-light">Batalkan?</a>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            @else
                                @if ($book->is_finished_or_canceled)
                                    <form class="form form-horizontal">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="name">Nama</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="name" class="form-control" value="{{ $book->customer_name }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="phone">Kontak (HP)</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="phone" class="form-control" value="{{ $book->customer_phone }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="vehicle_type">Jenis Kendaraan</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="vehicle_type" class="form-control" value="{{ $book->vehicle_type }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="vehicle_license_plate">Plat Nomor Kendaraan</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="vehicle_license_plate" class="form-control" value="{{ $book->vehicle_license_plate }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="service">Layanan</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="service" class="form-control" value="{{ $book->service_name }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-3 col-form-label">
                                                        <label for="fp-date-start">Jadwal Tiba</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="fp-date-start" class="form-control" value="{{ dateTimeFormat($book->schedule_start_at) }} WIB" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($book->schedule_end_at)
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="fp-date-end">Jadwal Selesai</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="fp-date-end" class="form-control" value="{{ dateTimeFormat($book->schedule_end_at) }} WIB" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                @else
                                    <form class="form form-horizontal" action="{{ $book->can_be_finished ? route('books.end', $book->id) : route('books.update', $book->id) }}" method="post">
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
                                            @if ($book->schedule_end_at)
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="end_time">Jadwal Jam Selesai</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <select id="end_time" class="select2 form-control form-control-lg" name="end_time" required>
                                                                <option value="{{ old('end_time', timeFormat($book->schedule_end_at)) }}">{{ old('end_time', timeFormat($book->schedule_end_at)) }} WIB</option>
                                                                @foreach ($times as $time)
                                                                    <option value="{{ $time }}">{{ $time }} WIB</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-sm-9 offset-sm-3">
                                                @if ($book->can_be_finished)
                                                    <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Perbarui dan Selesaikan</button>
                                                @else
                                                    <button type="submit" class="btn btn-outline-primary mr-1 waves-effect waves-float waves-light">Perbarui</button>
                                                @endif
                                                <a href="{{ route('books.edit_state_to_cancel', $book->id) }}" class="btn btn-outline-danger mr-1 waves-effect waves-float waves-light">Batalkan?</a>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Horizontal form layout section end -->
    </div>
@endsection
