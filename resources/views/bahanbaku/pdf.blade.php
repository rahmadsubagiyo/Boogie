<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selish barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Selisih Barang</h1>

    <p>Tanggal: {{ date('Y-m-d') }}</p>

    <table>
       <thead>
                        <tr>
                            <th style="background-color:#D3D3D3">No</th>
                            <th style="background-color:#DCDCDC">Nama Artikel</th>
                            <th style="background-color:#D3D3D3">Jenis</th>
                            <th style="background-color:#DCDCDC">Warna</th>
                            <th style="background-color:#D3D3D3">Barang Masuk</th>
                            <th style="background-color:#DCDCDC">Barang Keluar</th>
                            <th style="background-color:#FFC0CB">Selisih</th>
                            <th style="background-color:#D3D3D3">Tanggal Keluar</th>
                            <th style="background-color:#FFC0CB">Harga</th>
                            <th style="background-color:#FFC0CB">Total</th>
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
                            <td style="background-color:#DCDCDC">{{ $barang->barang_keluar }}</td>
                            <td style="background-color:#FFC0CB">{{ $barang->selisih }}</td>
                            <td style="background-color:#D3D3D3">{{ $barang->updated_at }}</td>
                            <td style="background-color:#FFC0CB">{{ $barang->Harga }}</td>
                            <td style="background-color:#FFC0CB">{{ $barang->Harga * $barang-> selisih  }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
</body>

</html>
