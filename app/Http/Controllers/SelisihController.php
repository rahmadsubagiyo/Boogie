<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use PDF;



class SelisihController extends Controller
{
    // BarangMasukController.php
    public function index()
    {
        $barangs = BarangMasuk::all();

        // Array untuk menyimpan selisih barang berdasarkan nama dan warna
        $selisih = [];

        // Menghitung selisih barang
        foreach ($barangs as $item) {
            $key = $item->nama . '|' . $item->warna;

            if (!isset($selisih[$key])) {
                $selisih[$key] = [
                    'id' => $item->id,
                    'nama' => $item->nama_artikel,
                    'jenis' => $item->jenis,
                    'warna' => $item->warna,
                    'masuk' => 0,
                    'keluar' => 0,
                    'selisih' => 0,
                    'updated_at' => $item->updated_at,
                    'Harga' => $item->Harga,
                ];
            }

            $selisih[$key]['masuk'] += $item->kuantitas;
            $selisih[$key]['keluar'] += $item->barang_keluar;
            $selisih[$key]['selisih'] = $selisih[$key]['masuk'] - $selisih[$key]['keluar'];
        }

        // Konversi ke koleksi Laravel untuk kemudahan manipulasi
        $selisih = collect($selisih);

        // Kembalikan view dengan data yang dihitung
        return view('Selisih.index', ['selisih' => $selisih]);
        // return view('Selisih.index', compact('barangs'));
    }

    public function create()
    {
        return view('selisih.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
        $request->validate([
            'nama_artikel' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'kuantitas' => 'required|integer',
            'barang_keluar' => 'required|integer',
            'Harga' => 'required|integer',
        ]);

        BarangMasuk::create($request->all());
        return redirect()->route('Selisih.index')->with('success', 'Barang added successfully!');
    }

    public function edit($id)
    {
        $barang = BarangMasuk::find($id);
        return view('Selisih.edit', compact('barang'));
    }
    public function update(Request $request, $id)
    {
        // Validation logic here
        $request->validate([
            'nama_artikel' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'kuantitas' => 'required|integer',
            'barang_keluar' => 'required|integer',
            'Harga' => 'required|integer',
        ]);

        $barang = BarangMasuk::find($id);

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }

        $barangKeluar = $request->input('barang_keluar', 0);
        $selisih = $barang->kuantitas - $barangKeluar;

        // Update BarangMasuk record
        $barang->update([
            'nama_artikel' => $request->input('nama_artikel'),
            'jenis' => $request->input('jenis'),
            'warna' => $request->input('warna'),
            'kuantitas' => $request->input('kuantitas'),
            'barang_keluar' => $request->input('barang_keluar'),
            'selisih' => $selisih,
            'Harga' => $request->input('Harga'),

        ]);

        return redirect()->route('Selisih.index')->with('success', 'Barang updated successfully!');
    }
    public function destroy($id)
    {
        BarangMasuk::find($id)->delete();
        return redirect()->route('Selisih.index')->with('success', 'Barang deleted successfully!');
    }



    public function downloadPDF()
    {
        $barangs = BarangMasuk::all();
        $pdf = PDF::loadView('bahanbaku.pdf', compact('barangs'));
        return $pdf->download('Selisih barang.pdf');
    }
}
