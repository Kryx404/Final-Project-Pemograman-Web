<!DOCTYPE html>
<html>

<head>
    <title>Pembayaran Belum Terkonfirmasi</title>
    <style>
        /* Gaya CSS untuk PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Pembayaran Belum Terkonfirmasi</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Nominal</th>
                <th>Bulan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tagihan as $item)
                @if ($item->status == 'Menunggu Konfirmasi')
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->nominal }}</td>
                        <td>{{ $item->bulan }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
