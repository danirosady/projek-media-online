@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'berita'
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
                            <table class="table table-bordered table-hover">
                                <thead class=" text-primary">
                                    <th class=" text-center">
                                        No
                                    </th>
                                    <th class=" text-center">
                                        Judul
                                    </th>
                                    <th class=" text-center">
                                        Konten
                                    </th>
                                    <th class=" text-center">
                                        Kategori
                                    </th>
                                    <th class=" text-center">
                                        Headline/Pilihan
                                    </th>
                                    <th class=" text-center">
                                        Gambar
                                    </th class=" text-center">
                                    <th class="text-center" style="width: 200px;" >
                                        Aksi
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($list_berita as $berita)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $berita->judul_berita }}
                                        </td>
                                        <td>
                                            {{ Str::limit(strip_tags($berita->konten_berita), 120) }}
                                        </td>
                                        <td class="text-center">
                                            {{ $berita->nama_kategori }}
                                        </td>
                                        <td>
                                            @if ($berita->is_headline == 'no')
                                                <a href="{{ route('berita.headline', ['id_berita' => $berita->id, 'status' => 'yes']) }}">
                                                    <div class="badge h6 badge-light me-3">{{ $berita->is_headline }}</div>
                                                </a>
                                             @else
                                                <a href="{{ route('berita.headline', ['id_berita' => $berita->id, 'status' => 'no']) }}">
                                                    <div class="badge h6 badge-info me-3">{{ $berita->is_headline }}</div>
                                                </a>
                                                @endif
                                            /
                                            @if ($berita->is_berita_pilihan == 'no')
                                                <a href="{{ route('berita.pilihan', ['id_berita' => $berita->id, 'status' => 'yes']) }}">
                                                    <div class="badge h6 badge-light me-3">{{ $berita->is_berita_pilihan }}</div>
                                                </a>
                                             @else
                                                <a href="{{ route('berita.pilihan', ['id_berita' => $berita->id, 'status' => 'no']) }}">
                                                    <div class="badge h6 badge-info me-3">{{ $berita->is_berita_pilihan }}</div>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <img src="{{ asset('img') }}/{{ $berita->gambar }}">
                                            </div>
                                        </td>
                                        <td class="text-right">
                                                <div class="m-1">
                                                    <a href="{{ route('berita.edit', ['id' => $berita->id])   }}">
                                                        <button class="btn btn-info btn-block my-1">
                                                        <span class="nc-icon nc-ruler-pencil text-white"></span>
                                                        Ubah</button>
                                                    </a>
                                                </div>
                                                <div class="m-1">
                                                    <a href="{{ route('berita.hapus', ['id' => $berita->id])   }}">
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
