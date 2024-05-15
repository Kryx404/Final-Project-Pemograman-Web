@extends('admin.layout.main-admin')

@section('tagihan')
    {{-- menampilkan navbar --}}
    @include('admin.partials.navbar-admin')

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">

    <main>
        <div class="bulan">
            <h3 class="text-start mb-4 mt-5">Status tagihan warga</h3>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Masukan nama bulan:</span>
                <input type="text" class="form-control" placeholder="Nama Bulan" aria-label="Nama Bulan"
                    aria-describedby="basic-addon1">
                <button class="btn btn-primary" type="button">Cari</button>
            </div>
        </div>
        <div class="table-tagihan">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nominal }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>



    {{-- menampilkan footer --}}
    @include('admin.partials.footer-admin')
@endsection
