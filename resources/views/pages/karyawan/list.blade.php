@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'karyawan'
])

@section('content')
    <div class="content">
        @session('error')
        <div class="alert alert-danger" role="alert">
            {{ $value }}
        </div>
        @endsession
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Data Karyawan</h4>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ route('karyawan.tambah') }}">
                                    <button class="btn btn-danger btn-block"
                                    >
                                    <span class="nc-icon nc-simple-add text-white"></span>
                                    Tambah</button>
                                </a>
                            </div>
                        </div>


                    @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                    @endsession

                        <div class="table">
                            <table class="table">
                                <thead class=" text-primary">

                                    <th>
                                        NIP
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Alamat
                                    </th>
                                    <th>
                                        Kontak
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th class="text-center">
                                        Aksi
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($list_karyawan as $karyawan)
                                    <tr>
                                        <td>
                                            {{ $karyawan->nip }}
                                        </td>
                                        <td>
                                            {{ $karyawan->nama }}
                                        </td>
                                        <td>
                                        {{ $karyawan->alamat }}
                                    </td>
                                    <td>
                                            {{ $karyawan->kontak }}
                                        </td>
                                        <td>
                                            @switch($karyawan->status)
                                                @case(1)
                                                    Aktif
                                                    @break
                                                @case(0)
                                                    Tidak Aktif
                                                    @break
                                                @default
                                                    Status Tidak Diketahui
                                            @endswitch
                                        </td>
                                        <td class="text-right">
                                            <div class="row float-center">
                                                <div class="col-lg-6">
                                                    <a href="{{ route('karyawan.edit', ['id' => $karyawan->id])   }}">
                                                        <button class="btn btn-info btn-block my-1">
                                                        <span class="nc-icon nc-ruler-pencil text-white"></span>
                                                        Ubah</button>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a href="{{ route('karyawan.hapus', ['id' => $karyawan->id])   }}">
                                                        <button class="btn btn-danger btn-block my-1">
                                                        <span class="nc-icon nc-simple-remove text-white"></span>
                                                        Hapus</button>
                                                    </a>
                                                </div>
                                            </div>
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
    </div>
@endsection
