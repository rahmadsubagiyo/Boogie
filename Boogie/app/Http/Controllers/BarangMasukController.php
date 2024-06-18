<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangs = BarangMasuk::all();
        return view('barang_masuk.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang_masuk.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
        $request->validate([
            'nama_artikel' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'kuantitas' => 'required|integer',
        ]);

        BarangMasuk::create($request->all());
        return redirect()->route('barang_masuk.index')->with('success', 'Barang added successfully!');
    }

    public function edit($id)
    {
        $barang = BarangMasuk::find($id);
        return view('barang_masuk.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic here
        $request->validate([
            'nama_artikel' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'kuantitas' => 'required|integer',
        ]);

        BarangMasuk::find($id)->update($request->all());
        return redirect()->route('barang_masuk.index')->with('success', 'Barang updated successfully!');
    }

    public function destroy($id)
    {
        BarangMasuk::find($id)->delete();
        return redirect()->route('barang_masuk.index')->with('success', 'Barang deleted successfully!');
    }
}
