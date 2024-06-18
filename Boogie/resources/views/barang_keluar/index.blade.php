<!-- resources/views/barang_keluar/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Barang Keluar</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Artikel</th>
                            <th>Jenis</th>
                            <th>Warna</th>
                            <th>Barang Masuk</th>
                            <th>Barang Keluar</th>
                            <th>Tanggal Keluar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->nama_artikel }}</td>
                            <td>{{ $barang->jenis }}</td>
                            <td>{{ $barang->warna }}</td>
                            <td>{{ $barang->kuantitas }}</td>
                            <td>{{ $barang->barang_keluar }}</td>

                            <td>{{ $barang->updated_at }}</td>

                            <td>
                                <a href="{{ route('barang_keluar.edit', $barang->id) }}" class="btn btn-warning btn-sm">Barang_Keluar</a>
                                <form action="{{ route('barang_keluar.destroy', $barang->id) }}" method="POST" style="display: inline;">
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