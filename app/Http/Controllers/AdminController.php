<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $list_admin = AdminModel::get();

        return view('pages.admin.list', ['list_admin' => $list_admin]);
    }

    public function tambah(){
        return view('pages.admin.tambah');
    }

    public function edit($id_admin){
        $data_adm = AdminModel::where('id', $id_admin)->first();

        return view('pages.admin.edit', ['data_admin' => $data_adm]);
    }

    public function hapus($id_admin){
        $data_adm = AdminModel::where('id', $id_admin)->delete();

        return redirect('admin')->with('success', 'Berhasil menghapus data');
    }

    public function update(Request $request, $id_admin){
        $save_data = AdminModel::where('id', $id_admin)->first();
        $save_data->name    = $request->nama;
        $save_data->email  = $request->email;
        $save_data->password  = Hash::make($request->password);
        $save_data->role  = $request->role;
        $save_data->save();

        return redirect('admin')->with('success', 'Berhasil mengubah data');
    }

    public function simpan(Request $request){
        $save_data = new AdminModel();
        $save_data->name    = $request->nama;
        $save_data->email  = $request->email;
        $save_data->password  = Hash::make($request->password);
        $save_data->role  = $request->role;
        $save_data->save();
        return redirect('admin')->with('success', 'Berhasil menyimpan data');
    }
}
