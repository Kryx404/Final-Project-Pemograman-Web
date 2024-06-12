@extends('pengelola.layout.main-pengelola')
@section('dashboard')
    @include('pengelola.partials.navbar-pengelola')
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-pengelola.css') }}">

  {{-- link chart js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <main>

            <h3 class="text-start mb-4 mt-5">Grafikasi Pembayaran</h3>


               {{-- chart js --}}
               <div class="chart-js">
                <canvas id="myChart"></canvas>
             </div>


            {{-- tabel --}}
            <div class="tabel mt-5">
                <table class="table">
                    <h4 id="tahunTabel"></h4>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Total Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanPerBulan as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data['bulan'] }}</td>
                                <td>{{ $data['total_nominal'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- buttton pdf --}}
            <div class="d-flex justify-content-end">
            <a class="btn btn-danger rounded-5 px-4 py-2 mt-3" href="{{ route('pengelola.pdf') }}"><i class="bi bi-filetype-pdf me-2"></i>Cetak PDF</a>
            </div>
    </main>

    {{-- script chart js --}}
    <script>
        const ctx = document.getElementById('myChart');
        const bulanMap = {};
        @foreach ($tagihan as $data)
            if (!bulanMap['{{ $data->bulan }}']) {
                bulanMap['{{ $data->bulan }}'] = 0;
            }
            bulanMap['{{ $data->bulan }}'] += {{ $data->nominal }};
        @endforeach

        const bulan = Object.keys(bulanMap);
        const nominal = Object.values(bulanMap);

        // Urutkan bulan sesuai urutan bulan
        bulan.sort();

        // Menyusun ulang data nominal sesuai urutan bulan
        const nominalSorted = bulan.map(b => bulanMap[b]);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: bulan,
                datasets: [{
                    label: 'Grafik Pembayaran',
                    data: nominalSorted,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    @include('pengelola.partials.footer-pengelola')
@endsection
