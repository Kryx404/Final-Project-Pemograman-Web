@extends('landing-page.layout.main')

@section('penggunaan')
    {{-- menampilkan navbar --}}
    @include('landing-page.partials.navbar')
    {{-- css --}}
    <link rel="stylesheet" href="css/style-penggunaan.css">

    <section class="mb-5">
        <div>
            <h3 class="mb-3">Cara Penggunaan</h3>
            <ul>
                <li class="mb-1">1. Lakukan login dengan memasukkan username dan password yang telah terdaftar.</li>
                <li class="mb-1">2. Cek tagihan di halaman home.</li>
                <li class="mb-1">3. Apabila terdapat tagihan yang perlu dibayar, klik tombol bayar sekarang dan akan
                    diarahkan ke halaman
                    pembayaran.</li>
                <li class="mb-1">4. Pada halaman pembayaran, masukkan bulan, nominal serta bukti pembayaran setelah itu
                    klik tombol
                    kirim.</li>
                <li>5. Setelah melakukan pembayaran, admin akan mengecek data Anda. Ketika sudah disetujui, maka dapat
                    dilihat di riwayat tagihan.</li>
            </ul>
        </div>
    </section>
    {{-- menampilkan footer --}}
    @include('landing-page.partials.footer')
@endsection
