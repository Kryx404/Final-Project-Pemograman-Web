@extends('admin.layout.main-admin')
@section('data-baru')
    @include('admin.partials.navbar-admin')
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
    <main>

        @if (session('signupError'))
            <div class="alert alert-danger">
                {{ session('signupError') }}
            </div>
        @endif



        <div class="data-warga">
            <h3 class="text-start mb-4 mt-5">Tambah data baru</h3>

            
            <form action="/admin/data-baru" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        placeholder="Masukkan Nama" name="nama" required  value="{{ old('nama') }}" autofocus>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" placeholder="Masukkan Username" required value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Masukkan Password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" placeholder="Masukkan Alamat" required value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Masukkan Email" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button onclick="cancelAction()" class="btn btn-secondary">Batal</button>
            </form>
        </div>


    </main>

    <script>
        function cancelAction() {
            window.location.href = '/admin';
        }
    </script>

    @include('admin.partials.footer-admin')
@endsection
