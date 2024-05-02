@extends('user.layout.main-user')

@section('pembayaran')
    {{-- menampilkan navbar --}}
    @include('user.partials.navbar-user')

    <div class="container">
        <main>
            <div class="py-5 text-center">
                {{-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72"
                    height="57"> --}}
                <h2>Pembayaran</h2>
            </div>

            <div class="row g-5 justify-content-center">

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Data Pembayaran</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="firstName" class="form-label">Pilihan Bulan</label>
                                <select class="form-select" id="bulan" required>
                                    <option value="">Pilih Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <div class="invalid-feedback">
                                    Pilih bulan dengan benar.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Nominal</label>
                                <input type="email" class="form-control" id="nominal" placeholder="Rp.">
                                <div class="invalid-feedback">
                                    Masukan nominal dengan benar.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label">Upload Bukti Pembayaran<span
                                        class="text-muted">(Wajib sertakan bukti pembayaran)</span></label>
                                <input type="file" class="form-control" id="bukti" accept="image/*">
                            </div>
                            <hr class="my-4">


                            <button class="w-100 btn btn-primary btn-lg" type="submit">Bayar</button>
                    </form>
                </div>
            </div>
        </main>

    </div>




    {{-- menampilkan footer --}}
    @include('user.partials.footer-user')
@endsection
