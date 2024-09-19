@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'kategori'
])

@section('content')
    <div class="content">
        @session('error')
        <div class="alert alert-danger" role="alert">
            {{ $value }}
        </div>
        @endsession
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Manajemen Kategori</h4>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="mx-4">
                                <a href="{{ route('kategori.tambah') }}">
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
                                        Nama
                                    </th>
                                    <th class="text-center">
                                        Aksi
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($list_kategori as $kategori)
                                    <tr>
                                        <td>
                                            {{ $kategori->nama_kategori }}
                                        </td>
                                        <td class="text-right">
                                                <div class="m-1">
                                                    <a href="{{ route('kategori.edit', ['id' => $kategori->id])   }}">
                                                        <button class="btn btn-info btn-block my-1">
                                                        <span class="nc-icon nc-ruler-pencil text-white"></span>
                                                        Ubah</button>
                                                    </a>
                                                </div>
                                                <div class="m-1">
                                                    <a href="{{ route('kategori.hapus', ['id' => $kategori->id])   }}">
                                                        <button class="btn btn-danger btn-block my-1">
                                                        <span class="nc-icon nc-simple-remove text-white"></span>
                                                        Hapus</button>
                                                    </a>
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
