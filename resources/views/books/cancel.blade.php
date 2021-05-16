@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Cancel Book</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('books.show', $id) }}">Book</a></li>
                            <li class="breadcrumb-item active">Cancel</li>
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
                            <h4 class="card-title">Silahkan isi data di bawah ini</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('books.cancel', $id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 col-form-label">
                                                <label for="cancel_note">Alasan Pembatalan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" id="cancel_note" class="form-control" name="cancel_note" placeholder="Masukkan alasan" value="{{ old('cancel_note') }}" required>
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
