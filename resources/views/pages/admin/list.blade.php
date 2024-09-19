@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admin'
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
                        <h4 class="card-title"> Manajemen Admin</h4>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ route('admin.tambah') }}">
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
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                    <th class="text-center">
                                        Aksi
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($list_admin as $admin)
                                    <tr>
                                        <td>
                                            {{ $admin->name }}
                                        </td>
                                        <td>
                                        {{ $admin->email }}
                                    </td>
                                    <td>
                                            {{ $admin->role }}
                                        </td>
                                        <td class="text-right">
                                            <div class="row float-center">
                                                <div class="col-lg-6">
                                                    <a href="{{ route('admin.edit', ['id' => $admin->id])   }}">
                                                        <button class="btn btn-info btn-block my-1">
                                                        <span class="nc-icon nc-ruler-pencil text-white"></span>
                                                        Ubah</button>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a href="{{ route('admin.hapus', ['id' => $admin->id])   }}">
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
