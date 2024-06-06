@extends('user.layout.main-user')

@section('pembayaran')
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
                {{-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72"
                    height="57"> --}}
                <h2>Pembayaran</h2>
            </div>

            <div class="row g-5 justify-content-center">

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Data Pembayaran</h4>


                    <form method="POST" action="{{ route('pembayaran.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <!-- Pilihan bulan -->
                            <div class="col-sm-12">
                                <label for="bulan" class="form-label">Pilihan Bulan</label>
                                <select class="form-select" id="bulan" name="bulan" required value="{{ old('bulan') }}">
                                    <option value="">Pilih Bulan</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <div class="invalid-feedback">
                                    Pilih bulan dengan benar.
                                </div>
                            </div>

                            <!-- Nominal Pembayaran -->
                            <div class="col-sm-12">
                                <label for="nominal" class="form-label">Nominal Pembayaran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control" id="nominal" name="nominal" required
                                    onkeyup="formatRupiah(this)"  placeholder="Masukan nominal pembayaran" value="{{ old('nominal') }}">
                                </div>
                                <div class="invalid-feedback">
                                    Masukan nominal pembayaran.
                                </div>
                            </div>


                            <!-- Upload Bukti Pembayaran -->
                            <div class="col-12">
                                <label for="bukti" class="form-label">Upload Bukti Pembayaran<span
                                        class="text-muted">(Wajib
                                        sertakan bukti pembayaran)</span></label>
                                <input type="file" class="form-control" id="bukti" name="bukti" accept="image/*"
                                    required>
                                @error('bukti')
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'File harus berupa Gambar!',
                                        })
                                    </script>
                                @enderror
                            </div>

                            <!-- Catatan Pembayaran -->
                            <div class="col-sm-12">
                                <label for="catatan" class="form-label">Catatan Pembayaran</label>
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    placeholder="Masukan catatan pembayaran" value="{{ old('catatan') }}">
                                <div class="invalid-feedback">
                                    Masukan catatan pembayaran.
                                </div>
                            </div>


                            <hr class="my-4">

                            <!-- Tombol Bayar -->
                            <button class="w-100 btn btn-lg" type="submit">Bayar</button>
                            {{-- sweet alert --}}
                            @if (Session::has('success'))
                                <script>
                                    Swal.fire({
                                        title: "Berhasil!",
                                        text: "Admin akan mengubah status pembayaran anda secepatnya.",
                                        icon: "success"
                                    });
                                </script>
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Fungsi untuk memformat input menjadi format Rupiah
        function formatRupiah(input) {
            let value = input.value.replace(/[^0-9]/g, '');
            let formattedValue = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
            input.value = formattedValue;
        }
        document.getElementById('nominal').addEventListener('input', function() {
            formatRupiah(this);
        });
    </script>


    {{-- menampilkan footer --}}
    @include('user.partials.footer-user')
@endsection
