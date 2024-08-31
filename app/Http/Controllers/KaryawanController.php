<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaryawanModel;

class KaryawanController extends Controller
{
    public function index(){
        $list_karyawan = KaryawanModel::get();

        return view('pages.karyawan.list', ['list_karyawan' => $list_karyawan]);
    }

    public function tambah(){
        return view('pages.karyawan.tambah');
    }

    public function edit($id_karyawan){
        $data_kar = KaryawanModel::where('id', $id_karyawan)->first();

        return view('pages.karyawan.edit', ['data_karyawan' => $data_kar]);
    }

    public function hapus($id_karyawan){
        $data_kar = KaryawanModel::where('id', $id_karyawan)->delete();

        return redirect('karyawan')->with('success', 'Berhasil menghapus data');
    }

    public function update(Request $request, $id_karyawan){
        $save_kar = KaryawanModel::where('id', $id_karyawan)->first();
        $save_kar->nip     = $request->nip;
        $save_kar->nama    = $request->nama;
        $save_kar->alamat  = $request->alamat;
        $save_kar->kontak  = $request->kontak;
        $save_kar->save();

        return redirect('karyawan')->with('success', 'Berhasil mengubah data');
    }

    public function simpan(Request $request){
        $save_data = new KaryawanModel();
        $save_data->nip     = $request->nip;
        $save_data->nama    = $request->nama;
        $save_data->alamat  = $request->alamat;
        $save_data->kontak  = $request->kontak;
        $save_data->status  = "1";
        $save_data->save();
        return redirect('karyawan')->with('success', 'Berhasil menyimpan data');
    }
}
