@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admin'
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
                <form class="col-md-12" action="{{ route('admin.update', $data_admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Ubah Data') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Nama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $data_admin->name }}" required>
                                    </div>
                                    @if ($errors->has('nama'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Alamat" value="{{ $data_admin->email }}" required>
                                    </div>
                                    @if ($errors->has('alamat'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Role') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select name="role" class="form-control">
                                            <option value="superadmin"
                                            @if                                           ($data_admin->role=='superadmin')selected
                                            @endif>Superadmin</option>
                                            <option value="editor"
                                            @if                                           ($data_admin->role=='editor')selected
                                            @endif>Editor</option>
                                            <option value="guest"
                                            @if                                           ($data_admin->role=='guest')selected
                                            @endif>Guest</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
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
