<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BarangMasuk;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barangs = BarangMasuk::all();
        return view('Selisih.index', compact('barangs'));
    }

    public function masuk()
    {
        return view('barangmasuk');
    }

    public function selisih()
    {
        return view('selisih');
    }
}
