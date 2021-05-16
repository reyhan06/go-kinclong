@extends('layouts.app')

@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('vendor_js')
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection

@section('page_js')
    <script src="{{ asset('js/scripts/forms/form-select2.js') }}"></script>
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Add Review</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('books.show', $book->id) }}">Book</a></li>
                            <li class="breadcrumb-item active">Add Review</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        @if ($errors->any())
        <!-- Alert start -->
        <section id="alert-colors">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Gagal membuat bookingan. Pastikan:</h4>
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

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Berikan Bintang dan ulasan terbaik Anda</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('books.review', $book->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="stars">Bintang</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select id="stars" class="select2 form-control form-control-lg" name="stars" required>
                                                    @for ($i=5; $i >= 1; $i--)
                                                        <option value="{{ $i }}">@for ($j=0; $j < $i; $j++) ⭐ @endfor</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="description">Ulasan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea id="description" class="form-control" rows="3" name="description" placeholder="Masukkan ulasan" value="{{ old('description') }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Kirim</button>
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
