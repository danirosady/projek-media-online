<?php

namespace App\Http\Controllers;
use App\Models\KaryawanModel;


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

        return view('pages.dashboard', ['total_karyawan' => $total_karyawan]);
    }
}
