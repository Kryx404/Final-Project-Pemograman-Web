@extends('admin.layout.main-admin')

@section('warga')
    {{-- menampilkan navbar --}}
    @include('admin.partials.navbar-admin')

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">

    <main>

        <div class="data-warga">
            <h3 class="text-start mb-4 mt-5">Data Warga</h3>
            <a onclick="window.location.href='/admin/data-baru'" class="btn btn-primary">Tambah data baru</a>
            <div class="input-group mb-3 w-50 mt-4">
                <span class="input-group-text" id="basic-addon1">Cari warga</span>
                <input type="text" class="form-control" placeholder="Masukan kata kunci" aria-label="Nama Bulan"
                    aria-describedby="basic-addon1">
                <button class="btn btn-primary" type="button">Cari</button>
            </div>
        </div>
        <div class="table-warga">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">Username</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($warga as $warga)
                        <tr></tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $warga->nama }}</td>
                        <td>{{ $warga->username }}</td>
                        <td>{{ $warga->alamat }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Ubah</a>
                            <form action="{{ route('admin.data-baru.destroy', $warga->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>



    {{-- menampilkan footer --}}
    @include('admin.partials.footer-admin')
@endsection
