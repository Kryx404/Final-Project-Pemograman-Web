@extends('pengelola.layout.main-pengelola')
@section('detail-laporan')
    @include('pengelola.partials.navbar-pengelola')
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-pengelola.css') }}">

  {{-- link chart js --}}
    <main>

        <h3 class="text-start mb-4 mt-5">Detail Laporan</h3>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Total</th>
                    <th>Tanggal Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tagihan  as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->tagihan->user->nama }}</td>
                    <td>{{ number_format($data->nominal, 0, ',', '.') }}</td>
                    <td>{{ $data->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>




    </main>

    @include('pengelola.partials.footer-pengelola')
@endsection
