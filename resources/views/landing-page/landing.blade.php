@extends('landing-page.layout.main')

@section('landing')

{{-- menampilkan navbar --}}
    @include('landing-page.partials.navbar')

    <div class="section d-flex justify-content-center align-items-center">
        <div class="section-container p-5 d-flex flex-column align-items-end text-end mt-5">
            <h2>Trash-P: Mudahnya Bayar Sampah Bulanan Secara Online</h2>
            <p class="pb-2">Selamat datang di Trash-P solusi modern untuk membayar sampah bulanan dengan mudah dan
                cepat.
                Dengan website ini, Anda bisa melakukan pembayaran secara online tanpa ribet.
                Nikmati kenyamanan bayar tagihan sampah dari mana saja, kapan saja.</p>
            <button class="btn rounded-5 px-4 py-2" onclick="window.location.href='/login';">Masuk</button>
        </div>
    </div>

    <!-- kegiatan -->
    <section class="kegiatan">
        <div class="d-flex flex-row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h1 class="text-center mt-5 mb-4 pb-3 fw-bold">Kegiatan Wilayah</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="image/kegiatan1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">KEGIATAN JALAN SEHAT 17 AGUSTUS 1945</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quasi ad
                            molestias harum porro aut quae cum nihil quibusdam quod, similique repellat molestiae nulla
                            eveniet beatae magni ea natus. Tenetur?</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="image/kegiatan2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">KEGIATAN TAKBIR KELILING</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quasi ad
                            molestias harum porro aut quae cum nihil quibusdam quod, similique repellat molestiae nulla
                            eveniet beatae magni ea natus. Tenetur?</p>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="image/kegiatan3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">KEGIATAN PENGAJIAN</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quasi ad
                            molestias harum porro aut quae cum nihil quibusdam quod, similique repellat molestiae nulla
                            eveniet beatae magni ea natus. Tenetur?</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end kegiatan -->

    <!-- about -->
    <section class="about mb-5 pt-4 pb-5 mb-5">
        <div class="col-md-12">
            <h1 class="text-light text-center fw-bold mt-5 mb-4 pb-3">About</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-5 ">
                    <img src="image/about.jpg" class="about-img img-fluid">
                </div>
                <div class="col-7 text-light ">
                    <p>Trash-P Adalah website untuk membantu Masyarakat membayar tagihan sampah setiap bulannya
                        dengan mudah. Trash-P adalah webiste yang diciptakan oleh sekelompok mahasiswa Jurusan Sistem
                        Informasi
                        Universitas Pembangunan Nasional Veteran Jawa Timur. Dengan Trash-P ini diharapkan bisa memudahkan
                        Masyarakat
                        di Dusun Buncitan, Kabupaten Sidoarjo.</p>
                </div>
            </div>
        </div>
    </section>
{{-- menampilkan footer --}}
    @include('landing-page.partials.footer')
@endsection
