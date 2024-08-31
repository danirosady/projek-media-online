@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'karyawan'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 text-center">
                <form class="col-md-12" action="{{ route('karyawan.simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Tambah Karyawan') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('NIP') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="nip" class="form-control" placeholder="NIP" required>
                                    </div>
                                    @if ($errors->has('nip'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nip') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Nama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                    </div>
                                    @if ($errors->has('nama'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Alamat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                    </div>
                                    @if ($errors->has('alamat'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('alamat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Kontak') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="kontak" class="form-control" placeholder="Kontak" required>
                                    </div>
                                    @if ($errors->has('kontak'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('kontak') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info">{{ __('Simpan') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
