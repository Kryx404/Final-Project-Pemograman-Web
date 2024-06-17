@extends('admin.layout.main-admin')
@section('data-baru')
    @include('admin.partials.navbar-admin')
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">

 {{-- cdn sweetalert --}}
 <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js "></script>
 <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css " rel="stylesheet">


    <main>

        <!-- Display error message if there is a signup error -->
        @if (session('signupError'))
            <div class="alert alert-danger">
                {{ session('signupError') }}
            </div>
        @endif



        <div class="data-warga">
            <!-- Heading for the form -->
            <h3 class="text-start mb-4 mt-5">Ubah Data</h3>


            <!-- Form to update user data -->
            <form action="/admin/ubah-data/{{ $warga->id }}" method="post">
                @csrf

                <!-- Form field for name -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        placeholder="Masukkan Nama" name="nama" required value="{{ $warga->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Form field for username and reset password button -->
                <div class="mb-3 row">
                    <div class="col-lg-10">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" placeholder="Masukkan Username" required value="{{ $warga->username }}">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-2">
                        <label for="password" class="form-label">Reset Password</label>
                        <form method="POST" action="{{ route('admin.reset-password', $warga->id) }}">
                            @csrf
                            <button type="submit" class="form-control btn btn-primary">Reset Password</button>
                        </form>
                    </div>
                </div>

                <!-- Form field for address -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" placeholder="Masukkan Alamat" required value="{{ $warga->alamat }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Form field for email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Masukkan Email" required value="{{ $warga->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button onclick="cancelAction()" class="btn btn-secondary">Batal</button>
            </form>

        </div>


    </main>

    <!-- JavaScript function to cancel the action and redirect to admin page -->
    <script>
        
function resetPassword(userId) {
    Swal.fire({
        title: 'Apakah Anda yakin ingin mereset password?',
        text: "Password akan diubah menjadi default.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.reset-password", ":userId") }}'.replace(':id', id),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Gagal mengubah password. Silakan coba lagi.',
                        icon: 'error',
                    });
                }
            });
        }
    });
}
        function cancelAction() {
            window.location.href = '/admin';
        }
    </script>

    @include('admin.partials.footer-admin')
@endsection

