@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mengecek email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link vertifikasi dikirim ke email Anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum lanjut, tolong cek link vertifikasi di email Anda.') }}
                    {{ __('Tidak menerima email vertifikasi ?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kirim ulang') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
