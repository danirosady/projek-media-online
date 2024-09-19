@extends('frontend.layout')

@section('konten')





<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                <div class=""></div>
                <div class="news-style-two">
                    <h3 class="news-title">
                        <span>Indeks Berita</span>
                    </h3>
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="post-list-block m-top-0">

                                @foreach($berita_terbaru as $berita)
                                <div class="post-block-wrapper post-float clearfix">
                                    <div class="post-thumbnail col-5">
                                        <a href="/detail/{{$berita->slug}}">
                                            <img class="img-fluid" src="/img/{{$berita->gambar}}" alt="post-thumbnail" />
                                        </a>
                                    </div>

                                    <div class="post-content col-7">
                                        <h2 class="post-title title-sm">
                                            <a href="/detail/{{$berita->slug}}">{{$berita->judul_berita}}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{$berita->created_at}} by {{$berita->author_name}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <nav aria-label="pagination-wrapper" class="pagination-wrapper">
                        <ul class="pagination justify-content-center">
                            @if($berita_terbaru->previousPageUrl() != null)
                            <li class="page-item">
                                <a class="page-link" href="{{$berita_terbaru->previousPageUrl()}}" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-left mr-2"></i></span>
                                    <span class="">Previous</span>
                                </a>
                            </li>
                            @endif
                            @if($berita_terbaru->nextPageUrl() != null)
                            <li class="page-item">
                                <a class="page-link" href="{{$berita_terbaru->nextPageUrl()}}" aria-label="Next">
                                    <span class="">Next</span>
                                    <span aria-hidden="true"><i class="fa fa-angle-double-right ml-2"></i></span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h3 class="news-title">
                            <span>Filter</span>
                        </h3>

                        <div>
                            <h4>Search by Keyword</h4>
                            <form action="/search/by-keyword" method="post">
                                @csrf
                                <input type="text" class="form-control" name="keyword">
                                <input type="submit" class="mt-2 btn btn-small btn-primary" value="Cari">
                            </form>
                        </div>
                        <hr>
                        <div class="mt-4">

                            <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/smoothness/jquery-ui.css">
                            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                            <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>


                            <h4>Search by Data Range</h4>
                            <form action="/search/by-date" method="post">
                                @csrf
                                <input type="text" id="datepicker-a" class="form-control" placeholder="Tanggal Mulai" name="tanggal_mulai">
                                <input type="text" id="datepicker-b" class="form-control mt-2" placeholder="Tanggal Akhir" name="tanggal_akhir">
                                <input type="submit" class="mt-2 btn btn-small btn-primary" value="Cari">
                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $("#datepicker-a").datepicker({
        dateFormat: "yy-mm-dd"
    });
    $("#datepicker-b").datepicker({
        dateFormat: "yy-mm-dd"
    });
</script>

@endsection
