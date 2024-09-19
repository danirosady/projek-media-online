<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $data = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->paginate('10');

        $list_headline = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('is_headline', '=', 'yes')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_berita_pilihan = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('is_berita_pilihan', '=', 'yes')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_berita_populer = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->orderBy('jumlah_views','desc')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_section_olahraga = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('nama_kategori', 'LIKE' , "olahraga")
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_section_politik = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
          ->where('nama_kategori', 'LIKE' , "politik")
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_section_teknologi = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('nama_kategori', 'LIKE' , "teknologi")
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        return view('frontend.homepage', [
            'berita_terbaru'=>$data,
            'list_headline'=>$list_headline,
            'list_berita_pilihan'=>$list_berita_pilihan,
            'list_berita_populer'=>$list_berita_populer,
            'list_section_olahraga'=>$list_section_olahraga,
            'list_section_politik'=>$list_section_politik,
            'list_section_teknologi'=>$list_section_teknologi,
        ]);
    }

    public function detail_berita($slug){
        BeritaModel::where('slug', $slug)->increment('jumlah_views', 1);

        $berita = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('berita.slug', $slug)
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->first();


        $list_berita_pilihan = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('is_berita_pilihan', '=', 'yes')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_berita_populer = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->orderBy('jumlah_views','desc')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_section_olahraga = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('kategori_berita',5)
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_section_politik = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('kategori_berita',4)
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_section_teknologi = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('kategori_berita',3)
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();


        return view('frontend.detail', [
            'detail_berita'=>$berita,
            'list_berita_pilihan'=>$list_berita_pilihan,
            'list_berita_populer'=>$list_berita_populer,
            'list_section_olahraga'=>$list_section_olahraga,
            'list_section_politik'=>$list_section_politik,
            'list_section_teknologi'=>$list_section_teknologi,
        ]);
    }


    public function kategori($slug_kategori){
        $detail_kategori = KategoriModel::where('slug', $slug_kategori)->first();
        $id_kategori = $detail_kategori->id;


        $data = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('kategori_berita', $id_kategori)
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->paginate('10');

        $list_berita_pilihan = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('is_berita_pilihan', '=', 'yes')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_berita_populer = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->orderBy('jumlah_views','desc')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        return view('frontend.kategori', [
            'berita_terbaru'=>$data,
            'list_berita_pilihan'=>$list_berita_pilihan,
            'list_berita_populer'=>$list_berita_populer,
            'detail_kategori'=>$detail_kategori,
        ]);
    }


    public function indeks_berita(){


        $data = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->paginate('10');

        $list_berita_pilihan = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->where('is_berita_pilihan', '=', 'yes')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        $list_berita_populer = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
        ->leftJoin('users', 'berita.author', 'users.id')
        ->orderBy('jumlah_views','desc')
        ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->take(4)->get();

        return view('frontend.indeks-berita', [
            'berita_terbaru'=>$data,
        ]);
    }

    public function search(Request $request, $search_type){

        if($search_type == 'by-keyword'){
            $data = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
            ->leftJoin('users', 'berita.author', 'users.id')
            ->where('judul_berita', 'LIKE' , "%{$request->keyword}%")
            ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->paginate('10');
        }
        elseif($search_type == 'by-date'){
            $data = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
            ->leftJoin('users', 'berita.author', 'users.id')
            ->whereBetween('berita.created_at', [$request->tanggal_mulai,$request->tanggal_akhir])
            ->select('berita.*', 'kategori.nama_kategori', 'kategori.slug as slug_kategori', 'users.name as author_name')->paginate('10');
        }

        return view('frontend.indeks-berita', [
            'berita_terbaru'=>$data,
        ]);


    }
}
