@extends('user.layout.main-user')

@section('profil')
    {{-- menampilkan navbar --}}
    @include('user.partials.navbar-user')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/style-user.css') }}">

    {{-- cdn sweetalert --}}
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css " rel="stylesheet">

    <main>
        <div class="container">

            <div class="py-5 text-center">
                <h2>Profil</h2>
            </div>

            <div class="row g-5 justify-content-center">

                <div class="col-md-7 col-lg-8">

                    <div class="row g-3">

                        <div class="col-12">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ Auth::user()->username }}" readonly>
                        </div>

                        <div class="col-12">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ Auth::user()->nama }}" readonly>
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ Auth::user()->alamat }}" readonly>
                        </div>

                        <div class="col-12">
                            <form action="{{ route('user.profil.update') }}" method="post">
                                @csrf
                                <label for="password" class="form-label">Password lama:</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" required>

                                <label for="password" class="form-label mt-3">Password baru:</label>
                                <input type="password" class="form-control" id="password" name="password" required>

                                <label for="password" class="form-label mt-3">Konfirmasi Password:</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>

                                <button type="submit" class="btn btn-primary mt-3">Ganti Password</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>




        </div>
    </main>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Password telah diubah!',
                    text: 'Password anda telah berhasil diubah.',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif


    {{-- menampilkan footer --}}
    @include('user.partials.footer-user')
@endsection
