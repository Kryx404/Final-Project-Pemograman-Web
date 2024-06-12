<!DOCTYPE html>
<html>

<head>
    <title>Daftar Tagihan</title>
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
    <h1>Daftar Tagihan</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nominal</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tagihan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->nama }}</td>
                    <td>{{ $item->nominal }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
