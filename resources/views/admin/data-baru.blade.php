@extends('admin.layout.main-admin')
@section('data-baru')
    @include('admin.partials.navbar-admin')
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
    <main>

        <div class="data-warga">
            <h3 class="text-start mb-4 mt-5">Tambah data baru</h3>
        <form>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary">Batal</button>
        </form>

        </div>


    </main>

    @include('admin.partials.footer-admin')
@endsection
