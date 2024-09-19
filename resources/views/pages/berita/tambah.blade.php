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
                <form class="col-md-12" action="{{ route('berita.simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Tambah Berita      ') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-2 col-form-label text-right">{{ __('Judul  :') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="judul_berita" class="form-control" placeholder="Judul" required>
                                    </div>
                                    @if ($errors->has('judul'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('judul') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label text-right">{{ __('Konten  :') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <textarea name="konten_berita" id="content" class="form-control" placeholder="Konten" required> </textarea>
                                    </div>
                                    @if ($errors->has('konten'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('konten') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label text-right">{{ __('Kategori  :') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select name="kategori_berita" class="form-control">
                                        @foreach ($kategori_list as  $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
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
                                <label class="col-md-2 col-form-label text-right">{{ __('Gambar  :') }}</label>
                                <div class="col-md-9">
                                    <div class="form-control-file">
                                        <input type="file" name="gambar" class="form-control" placeholder="Upload" required>
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
