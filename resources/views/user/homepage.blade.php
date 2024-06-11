@extends('user.layout.main-user')

@section('homepage')
    {{-- menampilkan navbar --}}
    @include('user.partials.navbar-user')

    <main>
        <section class="section d-flex justify-content-center align-items-center">
            <div class="section-container pb-3  mt-5">
                {{-- logic sapaan otomatis --}}
                @php
                    $jam = date('H');
                    if ($jam < '12') {
                        echo '<h2>Selamat Siang: ' . Auth::user()->nama . ' </h2>';
                    } elseif ($jam < '18') {
                        echo '<h2>Selamat Malam: ' . Auth::user()->nama . ' </h2>';
                    } else {
                        echo '<h2>Selamat Pagi: ' . Auth::user()->nama . ' </h2>';
                    }
                @endphp
                <p class="pb-2 mt-4">Kebersihan lingkungan adalah tanggung jawab kita bersama. Mari bergabung dalam upaya menjaga kebersihan lingkungan dengan membayar 
                    iuran sampah secara rutin. Iuran yang Anda bayarkan akan digunakan untuk mendukung pengelolaan sampah yang lebih efektif, memastikan sampah terkelola dengan baik, dan mencegah pencemaran lingkungan. 
                    Dengan kontribusi Anda, kita bisa menciptakan lingkungan yang lebih bersih, sehat, dan nyaman untuk semua. Bayar iuran sampah sekarang dan jadilah bagian dari solusi lingkungan yang berkelanjutan.</p>
            </div>
        </section>

        {{-- tagihan --}}
        <section class="section justify-content-center align-items-center">
            <div class="section-container pb-3 d-flex flex-column align-items-start text-start mt-5">
                <h2> Riwayat Pembayaran</h2>
            </div>
            <table class="table table-striped table-sm " style="back">
                <thead>
                    <tr>
                        <th scope="col">Bulan</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Auth::user()->tagihan as $tagihan)
                        <tr>
                            <td>{{ $tagihan->bulan ?? 'Tidak ada tagihan' }}</td>
                            <td>{{ $tagihan->nominal ?? 'Tidak ada nominal' }}</td>
                            <td>{{ $tagihan->status }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <button class="btn rounded-5 px-4 py-2 mt-3" onclick="window.location.href='/pembayaran';">Bayar
                Sekarang</button>
        </section>
    </main>


    {{-- menampilkan footer --}}
    @include('user.partials.footer-user')
@endsection
