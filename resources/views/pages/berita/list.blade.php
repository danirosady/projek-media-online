@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'berita'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Manajemen Berita</h4>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ route('berita.tambah') }}">
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
                                        Judul
                                    </th>
                                    <th>
                                        Konten
                                    </th>
                                    <th>
                                        Kategori
                                    </th>
                                    <th>
                                        Headline/Pilihan
                                    </th>
                                    <th>
                                        Gambar
                                    </th>
                                    <th class="text-center">
                                        Aksi
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($list_berita as $berita)
                                    <tr>
                                        <td>
                                            {{ $berita->judul_berita }}
                                        </td>
                                        <td>
                                            {{ $berita->konten_berita }}
                                        </td>
                                        <td>
                                            {{ $berita->kategori_berita }}
                                        </td>
                                        <td>
                                            @if ($berita->is_headline == 'no')
                                                <a href="{{ route('berita.headline', ['id_berita' => $berita->id, 'status' => 'yes']) }}">
                                                    <div class="badge badge-light me-3">{{ $berita->is_headline }}</div>
                                                </a>
                                             @else
                                                <a href="{{ route('berita.headline', ['id_berita' => $berita->id, 'status' => 'no']) }}">
                                                    <div class="badge badge-info me-3">{{ $berita->is_headline }}</div>
                                                </a>
                                                @endif
                                            /
                                            @if ($berita->is_berita_pilihan == 'no')
                                                <a href="{{ route('berita.pilihan', ['id_berita' => $berita->id, 'status' => 'yes']) }}">
                                                    <div class="badge badge-light me-3">{{ $berita->is_berita_pilihan }}</div>
                                                </a>
                                             @else
                                                <a href="{{ route('berita.pilihan', ['id_berita' => $berita->id, 'status' => 'no']) }}">
                                                    <div class="badge badge-info me-3">{{ $berita->is_berita_pilihan }}</div>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $berita->gambar }}
                                        </td>
                                        <td class="text-right">
                                            <div class="row float-center">
                                                <div class="col-lg-6">
                                                    <a href="{{ route('berita.edit', ['id' => $berita->id])   }}">
                                                        <button class="btn btn-info btn-block my-1">
                                                        <span class="nc-icon nc-ruler-pencil text-white"></span>
                                                        Ubah</button>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a href="{{ route('berita.hapus', ['id' => $berita->id])   }}">
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
