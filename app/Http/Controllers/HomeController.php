<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\KaryawanModel;
use App\Models\KategoriModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $total_karyawan = KaryawanModel::count();
        $total_berita = BeritaModel::count();
        $total_views = BeritaModel::sum('jumlah_views');
        $total_kategori = KategoriModel::count();
        $total_user = AdminModel::count();

        return view('pages.dashboard', ['total_karyawan' => $total_karyawan,
                                        'total_berita' => $total_berita,
                                        'total_views' => $total_views,
                                        'total_kategori' => $total_kategori,
                                        'total_user' => $total_user
                                        ]);
    }
}
