<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function index(){
        $list_kategori = KategoriModel::get();

        return view('pages.kategori.list', ['list_kategori' => $list_kategori]);
    }

    public function tambah(){
        return view('pages.kategori.tambah');
    }

    public function edit($id_kategori){
        $data_kategori = KategoriModel::where('id', $id_kategori)->first();

        return view('pages.kategori.edit', ['data_kategori' => $data_kategori]);
    }

    public function hapus($id_kategori){
        $data_kategori = KategoriModel::where('id', $id_kategori)->delete();

        return redirect('kat')->with('success', 'Berhasil menghapus data');
    }

    public function update(Request $request, $id_kategori){
        $save_kat = KategoriModel::where('id', $id_kategori)->first();
        $save_kat->nama_kategori    = $request->nama;
        $save_kat->slug    = strtolower(str_replace(' ', '-', $request->nama));
        $save_kat->save();

        return redirect('kat')->with('success', 'Berhasil mengubah data');
    }

    public function simpan(Request $request){
        $save_data = new KategoriModel();
        $save_data->nama_kategori    = $request->nama;
        $save_data->slug             = strtolower(str_replace(' ', '-', $request->nama));
        $save_data->save();
        return redirect('kat')->with('success', 'Berhasil menyimpan data');
    }
}
