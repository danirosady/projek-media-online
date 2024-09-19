@extends('frontend.layout')

@section('konten')





    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                    <div class=""></div>
                    <div class="news-style-two">
                        <h3 class="news-title">
                            <span>Berita Terbaru pada {{$detail_kategori->nama_kategori}}</span>
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

@endsection
