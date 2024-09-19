<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModel;
use App\Models\KategoriModel;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index(){
            $list_berita = BeritaModel::leftJoin('kategori', 'berita.kategori_berita', 'kategori.id')
                ->leftJoin('users', 'berita.author', 'users.id')
                ->select('berita.*', 'kategori.nama_kategori')
                ->get();

        return view('pages.berita.list', ['list_berita' => $list_berita]);
    }

    public function tambah(){
        $kategori_list = KategoriModel::get();
        return view('pages.berita.tambah', ['kategori_list' => $kategori_list]);
    }

    public function edit($id_berita){
        $data_berita = BeritaModel::where('id', $id_berita)->first();
        $kategori_list = KategoriModel::get();

        return view('pages.berita.edit', ['data_berita' => $data_berita, 'kategori_list' => $kategori_list]);
    }

    public function hapus($id_berita){
        $data_berita = BeritaModel::where('id', $id_berita)->delete();

        return redirect('berita')->with('success', 'Berhasil menghapus data');
    }

    public function update(Request $request, $id_berita){

        $save_data = BeritaModel::where('id', $id_berita)->first();

        if ($request->gambar != null) {
            //hapus gambar lama
            if (file_exists(public_path('img/'. $save_data->gambar))) {
                unlink(public_path('img/'. $save_data->gambar));
            }
            //simpan data gambar
            $imageName = $request->kategori_berita.'_'.time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('img'), $imageName);
            $save_data->gambar = $imageName;

        }

        $slug = strtolower(str_replace(' ', '_',$request->judul_berita));

        $save_data->judul_berita     = $request->judul_berita;
        $save_data->konten_berita    = $request->konten_berita;
        $save_data->kategori_berita  = $request->kategori_berita;
        $save_data->author           = Auth::id();
        $save_data->slug             = $slug;
        $save_data->save();

        return redirect('berita')->with('success', 'Berhasil mengubah data');
    }

    public function simpan(Request $request){

        $imageName = $request->kategori_berita.'_'.time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('img'), $imageName);
        $slug = strtolower(str_replace(' ', '_',$request->judul_berita));

        $save_data = new BeritaModel();
        $save_data->judul_berita     = $request->judul_berita;
        $save_data->konten_berita    = $request->konten_berita;
        $save_data->kategori_berita  = $request->kategori_berita;
        $save_data->author           = Auth::id();
        $save_data->slug             = $slug;
        $save_data->gambar           = $imageName;
        $save_data->save();
        return redirect('berita')->with('success', 'Berhasil menyimpan data');
    }

    public function setheadline($id_berita, $status){
        $save_data = BeritaModel::where('id', $id_berita)->first();
        $save_data->is_headline = $status;
        $save_data->save();

        return redirect('berita')->with('success', 'Berhasil menyimpan data');
    }

    public function setpilihan($id_berita, $status){
        $save_data = BeritaModel::where('id', $id_berita)->first();
        $save_data->is_berita_pilihan = $status;
        $save_data->save();

        return redirect('berita')->with('success', 'Berhasil menyimpan data');
    }
}
