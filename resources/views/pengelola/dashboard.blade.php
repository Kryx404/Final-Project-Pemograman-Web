@extends('pengelola.layout.main-pengelola')
@section('dashboard')
    @include('pengelola.partials.navbar-pengelola')
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-pengelola.css') }}">
    <main>

        <div class="grafik">
            <h3 class="text-start mb-4 mt-5">Grafikasi Pembayaran</h3>
            <div class="generation mb-4">
                {{-- <h3 class="text-start mb-4 mt-5">Pencarian Berdasarkan Tahun dan Bulan</h3> --}}
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-select" aria-label="Pilih Tahun">
                            <option selected>Pilih Tahun</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" aria-label="Pilih Bulan">
                            <option selected>Pilih Bulan</option>
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
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </div>

            <div class="tabel">
                <table class="table">
                    <h4>2022</h4>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1,001</td>
                            <td>random</td>
                            <td>1,001</td>
                            <td>random</td>
                        </tr>
                        <td>1,001</td>
                        <td>random</td>
                        <td>1,001</td>
                        <td>random</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>


    </main>

    @include('pengelola.partials.footer-pengelola')
@endsection
