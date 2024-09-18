@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'berita'
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
            <div class="col-md-12 text-center">
                <form class="col-md-12" action="{{ route('berita.update', $data_berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Ubah Berita') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-2 col-form-label text-right">{{ __('Judul:') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input value="{{ $data_berita->judul_berita }}" type="text" name="judul_berita" class="form-control" placeholder="Judul" required>
                                    </div>
                                    @if ($errors->has('judul'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('judul') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label text-right">{{ __('Konten:') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <textarea name="konten_berita" id="content" class="form-control" placeholder="Konten" required>{{ $data_berita->konten_berita }}</textarea>
                                    </div>
                                    @if ($errors->has('konten'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('konten') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label text-right">{{ __('Kategori:') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select name="kategori_berita" class="form-control">
                                        @foreach ($kategori_list as $kategori)
                                        <option value="{{ $kategori->id }}" @if($data_berita->kategori_berita == $kategori->id) selected @endif>{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    @if ($errors->has('kategori'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('kategori') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label text-right">{{ __('Atribut  :') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group text-left ml-2">
                                        <div class="col-md-6">
                                            <input class="form-check-input" type="checkbox" name="headline" id="headline">
                                            <label class="form-check-label" for="headline">
                                                {{ __('Headline') }}
                                            </label>
                                        </div>
                                        @if ($errors->has('berita_pilihan'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('berita_pilihan') }}</strong>
                                            </span>
                                        @endif
                                        <div class="col-md-6">
                                            <input class="form-check-input" type="checkbox" name="berita_pilihan" id="berita_pilihan">
                                            <label class="form-check-label" for="berita_pilihan">
                                                {{ __('Berita Pilihan') }}
                                            </label>
                                        </div>
                                        @if ($errors->has('headline'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('headline') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label text-right">{{ __('Gambar:') }}</label>
                                <div class="col-md-9">
                                    <div class="form-control-file">
                                        <input type="file" id="file-upload" name="gambar" class="form-control" onchange="updateLabel()">
                                    </div>
                                    @if ($errors->has('gambar'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('gambar') }}</strong>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create( document.querySelector('#content'))
        .catch( error => {
            console.error(error);
        });
    </script>

    @endsection
