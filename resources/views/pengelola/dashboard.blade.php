@extends('pengelola.layout.main-pengelola')
@section('dashboard')
    @include('pengelola.partials.navbar-pengelola')
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-pengelola.css') }}">

  {{-- link chart js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <main>

        <div class="grafik">
            <h3 class="text-start mb-4 mt-5">Grafikasi Pembayaran</h3>


               {{-- chart js --}}
               <div>
                <canvas id="myChart"></canvas>
            </div>

            <div class="generation mb-4">
                {{-- <h3 class="text-start mb-4 mt-5">Pencarian Berdasarkan Tahun dan Bulan</h3> --}}
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-select" aria-label="Pilih Tahun" id="tahun">
                            <option selected>Pilih Tahun</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        {{-- <select class="form-select" aria-label="Pilih Bulan">
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
                        </select> --}}
                        <form action="{{ route('pengelola') }}" method="GET" class="w-100 ms-2">
                            <select class="form-select" id="bulanFilter" name="bulan">
                                <option value="">Pilih Bulan...</option>
                                <option value="Januari" {{ request('bulan') == 'Januari' ? 'selected' : '' }}>Januari</option>
                                <option value="Februari" {{ request('bulan') == 'Februari' ? 'selected' : '' }}>Februari
                                </option>
                                <option value="Maret" {{ request('bulan') == 'Maret' ? 'selected' : '' }}>Maret</option>
                                <option value="April" {{ request('bulan') == 'April' ? 'selected' : '' }}>April</option>
                                <option value="Mei" {{ request('bulan') == 'Mei' ? 'selected' : '' }}>Mei</option>
                                <option value="Juni" {{ request('bulan') == 'Juni' ? 'selected' : '' }}>Juni</option>
                                <option value="Juli" {{ request('bulan') == 'Juli' ? 'selected' : '' }}>Juli</option>
                                <option value="Agustus" {{ request('bulan') == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                                <option value="September" {{ request('bulan') == 'September' ? 'selected' : '' }}>September
                                </option>
                                <option value="Oktober" {{ request('bulan') == 'Oktober' ? 'selected' : '' }}>Oktober </option>
                                <option value="November" {{ request('bulan') == 'November' ? 'selected' : '' }}>November
                                </option>
                                <option value="Desember" {{ request('bulan') == 'Desember' ? 'selected' : '' }}>Desember
                                </option>
                            </select>
                            {{-- <div class="col-md-2"> --}}
                            <button type="button" class="btn btn-primary">Cari</button>
                            {{-- </div> --}}
                        </form>
                    </div>
                    {{-- <div class="col-md-2">
                            <button type="button" class="btn btn-primary">Cari</button>
                        </div> --}}
                </div>
            </div>


            {{-- tabel --}}
            <div class="tabel">
                <table class="table">
                    <h4 id="tahunTabel"></h4>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Total Pemasukan</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanPerBulan as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data['bulan'] }}</td>
                                <td>{{ $data['total_nominal'] }}</td>
                                <td>
                                    @php
                                        $details = $laporan->where('tagihan.bulan', $data['bulan']);
                                        $detailIds = $details->pluck('id')->implode(',');
                                    @endphp
                                    @if ($details->count() > 1)
                                        <a href="{{ route('pengelola.detail', $detailIds) }}"
                                            class="btn btn-info">Lihat Detail</a>
                                    @else
                                        @foreach ($details as $item)
                                            <a href="{{ route('pengelola.detail', $item->id) }}"
                                                class="btn btn-info">Lihat Detail</a>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
