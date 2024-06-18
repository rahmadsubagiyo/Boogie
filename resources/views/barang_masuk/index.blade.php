<!-- resources/views/barang_masuk/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Barang Masuk</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ route('barang_masuk.create') }}" class="btn btn-primary" style="margin-top: 1rem;">Tambah Barang</a>
            </h6>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th style="background-color:#D3D3D3">No</th>
                            <th style="background-color:#DCDCDC">Nama Artikel</th>
                            <th style="background-color:#D3D3D3">Jenis</th>
                            <th style="background-color:#DCDCDC">Warna</th>
                            <th style="background-color:#D3D3D3">Kuantitas</th>
                            <th style="background-color:#D3D3D3">Harga</th>
                            <th style="background-color:#DCDCDC">Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                        <tr>
                            <td style="background-color:#D3D3D3">{{ $loop->iteration }}</td>
                            <td style="background-color:#DCDCDC">{{ $barang->nama_artikel }}</td>
                            <td style="background-color:#D3D3D3">{{ $barang->jenis }}</td>
                            <td style="background-color:#DCDCDC">{{ $barang->warna }}</td>
                            <td style="background-color:#D3D3D3">{{ $barang->kuantitas }}</td>
                            <td style="background-color:#DCDCDC">{{ number_format($barang->Harga) }}</td>
                            <td style="background-color:#DCDCDC">{{ $barang->created_at }}</td>

                            <td>
                                <a href="{{ route('barang_masuk.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('barang_masuk.destroy', $barang->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection