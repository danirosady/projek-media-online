@extends('frontend.layout')

@section('konten')




<section class="featured-posts">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 col-xs-12 col-lg-4">
                    <div class="featured-slider mr-md-3 mr-lg-3">
                        <div class="item" style="background-image:url(/img/{{$list_headline[0]['gambar']}})">
                            <div class="post-content">
                                <a href="/kategori/{{$list_headline[0]['slug_kategori']}}" class="post-cat bg-primary">{{$list_headline[0]['nama_kategori']}}</a>
                                <h2 class="slider-post-title">
                                    <a href="/detail/{{$list_headline[0]['slug']}}">{{$list_headline[0]['judul_berita']}}</a>
                                </h2>
                                <div class="post-meta mt-2">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$list_headline[0]['created_at']}}</span>
                                    <span class="post-author">
                                        by
                                        <a href="author.html">{{$list_headline[0]['author_name']}}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12 col-lg-4">
                    <div class="featured-slider mr-lg-3">
                        <div class="item" style="background-image:url(/img/{{$list_headline[1]['gambar']}})">
                            <div class="post-content">
                                <a href="/kategori/{{$list_headline[1]['slug_kategori']}}" class="post-cat bg-danger">{{$list_headline[1]['nama_kategori']}}</a>
                                <h2 class="slider-post-title">
                                    <a href="/detail/{{$list_headline[1]['slug']}}">{{$list_headline[1]['judul_berita']}}</a>
                                </h2>
                                <div class="post-meta mt-2">
                                <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$list_headline[1]['created_at']}}</span>
                                    <span class="post-author">
                                        by
                                        <a href="author.html">{{$list_headline[1]['author_name']}}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-4">
                    <div class="row mt-3 mt-lg-0">
                        <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
                            <div class="post-featured-style" style="background-image:url(/img/{{$list_headline[2]['gambar']}})">
                                <div class="post-content">
                                    <a href="/kategori/{{$list_headline[2]['slug_kategori']}}" class="post-cat bg-success">{{$list_headline[2]['nama_kategori']}}</a>
                                    <h2 class="post-title">
                                        <a href="/detail/{{$list_headline[2]['slug']}}">{{$list_headline[2]['judul_berita']}}</a>
                                    </h2>
                                    <div class="post-meta mt-2">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$list_headline[2]['created_at']}}</span>
                                    <span class="post-author">
                                        by
                                        <a href="author.html">{{$list_headline[2]['author_name']}}</a>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
                            <div class="post-featured-style" style="background-image:url(/img/{{$list_headline[3]['gambar']}})">
                                <div class="post-content">
                                    <a href="/kategori/{{$list_headline[3]['slug_kategori']}}" class="post-cat bg-info">{{$list_headline[3]['nama_kategori']}}</a>
                                    <h2 class="post-title">
                                        <a href="/detail/{{$list_headline[3]['slug']}}">{{$list_headline[3]['judul_berita']}}</a>
                                    </h2>
                                    <div class="post-meta mt-2">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$list_headline[3]['created_at']}}</span>
                                    <span class="post-author">
                                        by
                                        <a href="author.html">{{$list_headline[3]['author_name']}}</a>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                    <div class="news-style-two">
                        <h3 class="news-title">
                            <span>Berita Terbaru</span>
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
                                @if($berita_terbaru->previousPageUrl()  != null)
                                <li class="page-item">
                                    <a class="page-link" href="{{$berita_terbaru->previousPageUrl()}}" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-left mr-2"></i></span>
                                        <span class="">Previous</span>
                                    </a>
                                </li>
                                @endif
                                @if($berita_terbaru->nextPageUrl()  != null)
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
                                <span>Stay in touch</span>
                            </h3>

                            <ul class="list-inline social-widget">
                                <li class="list-inline-item">
                                    <a class="social-page youtube" href="#">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-page facebook" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-page twitter" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-page pinterest" href="#">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-page linkedin" href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a class="social-page youtube" href="#">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>

                            </ul>

                        </div>
                        <div class="widget">
                            <h3 class="news-title">
                                <span>Berita Populer</span>
                            </h3>

                            @foreach($list_berita_populer as $berita_populer)
                            <div class="post-list-block">
                                <div class="post-block-wrapper post-float ">
                                    <div class="post-thumbnail col-4">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="/img/{{$berita_populer->gambar}}" alt="post-thumbnail" />
                                        </a>
                                    </div>
                                    <div class="post-content col-8">
                                        <h2 class="post-title title-sm">
                                            <a href="/detail/{{$berita_populer->slug}}">{{$berita_populer->judul_berita}} </a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>{{date('d-m-Y', strtotime($berita_populer->created_at))}} by {{$berita_populer->author_name}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="widget mb-0">
                            <h3 class="news-title">
                                <span>Berita Pilihan</span>
                            </h3>
                            <div class="post-slide">
                                <div class="item">

                                    @foreach($list_berita_pilihan as $berita_pilihan)
                                    <div class="post-overlay-wrapper clearfix mb-2">
                                        <div class="post-thumbnail">
                                            <a href="/detail/{{$berita_pilihan->slug}}">
                                                <img class="img-fluid" src="/img/{{$berita_pilihan->gambar}}" alt="post-thumbnail" />
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a class="post-category white" href="/kategori/{{$berita_pilihan->slug_kategori}}">{{$berita_pilihan->nama_kategori}}</a>
                                            <h2 class="post-title">
                                                <a href="/detail/{{$berita_pilihan->slug}}">{{$berita_pilihan->judul_berita}}</a>
                                            </h2>
                                            <div class="post-meta white">
                                                <span class="posted-time">{{$berita_pilihan->created_at}}</span>
                                                <span> by </span>
                                                <span class="post-author">
                                                    <a href="author.html">{{$berita_pilihan->author_name}}</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                                <div class="item ">
                                    <div class="post-overlay-wrapper clearfix">
                                        <div class="post-thumbnail">
                                            <a href="single-post.html">
                                                <img class="img-fluid" src="/news/images/news/news-17.jpg" alt="post-thumbnail" />
                                            </a>
                                        </div>

                                        <div class="post-content">
                                            <a class="post-category white" href="post-category-2.html">Nail</a>
                                            <h2 class="post-title">
                                                <a href="single-post.html">5 Best Essie Polishes for Winter...</a>
                                            </h2>
                                            <div class="post-meta white">
                                                <span class="posted-time">10 hours ago</span>
                                                <span> by </span>
                                                <span class="post-author">
                                                    <a href="author.html">Jamalick Jack</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-overlay-wrapper mt-3 clearfix">
                                        <div class="post-thumbnail">
                                            <a href="single-post.html">
                                                <img class="img-fluid" src="/news/images/news/news-19.jpg" alt="post-thumbnail" />
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <a class="post-category white" href="post-category-2.html">Lips</a>
                                            <h2 class="post-title">
                                                <a href="single-post.html">This Red Hot Metallic Lip Tutori...</a>
                                            </h2>
                                            <div class="post-meta white">
                                                <span class="posted-time">5 hours ago</span>
                                                <span> by </span>
                                                <span class="post-author">
                                                    <a href="author.html">Jerin Khan</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news-style-four bg-light section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="block">
                        <h3 class="news-title">
                            <span>Olahraga</span>
                        </h3>

                        <div class="post-list-block">
                            @foreach($list_section_olahraga as $berita_olahraga)
                            <div class="post-block-wrapper post-float clearfix">
                                <div class="post-thumbnail">
                                    <img class="img-fluid" src="/img/{{$berita_olahraga->gambar}}" alt="post-thumbnail" />
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title title-sm">
                                        <a href="/detail/{{$berita_olahraga->slug}}">{{$berita_olahraga->judul_berita}}</a>
                                    </h2>
                                    <div class="post-meta">
                                        <span class="posted-time">{{date('d-m-Y', strtotime($berita_olahraga->created_at))}} by {{$berita_olahraga->author_name}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="block">
                        <h3 class="news-title">
                            <span>Politik</span>
                        </h3>

                        <div class="post-list-block">
                            @foreach($list_section_politik as $berita_politik)
                            <div class="post-block-wrapper post-float clearfix">
                                <div class="post-thumbnail">
                                    <img class="img-fluid" src="/img/{{$berita_politik->gambar}}" alt="post-thumbnail" />
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title title-sm">
                                        <a href="/detail/{{$berita_politik->slug}}">{{$berita_politik->judul_berita}}</a>
                                    </h2>
                                    <div class="post-meta">
                                        <span class="posted-time">{{date('d-m-Y', strtotime($berita_politik->created_at))}} by {{$berita_politik->author_name}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="block">
                        <h3 class="news-title">
                            <span>Teknologi</span>
                        </h3>

                        <div class="post-list-block">
                            @foreach($list_section_teknologi as $berita_teknologi)
                            <div class="post-block-wrapper post-float clearfix">
                                <div class="post-thumbnail">
                                    <img class="img-fluid" src="/img/{{$berita_teknologi->gambar}}" alt="post-thumbnail" />
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title title-sm">
                                        <a href="/detail/{{$berita_teknologi->slug}}">{{$berita_teknologi->judul_berita}}</a>
                                    </h2>
                                    <div class="post-meta">
                                        <span class="posted-time">{{date('d-m-Y', strtotime($berita_teknologi->created_at))}} by {{$berita_teknologi->author_name}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
