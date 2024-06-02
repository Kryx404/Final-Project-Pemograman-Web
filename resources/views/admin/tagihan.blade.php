@extends('admin.layout.main-admin')

@section('tagihan')
    {{-- menampilkan navbar --}}
    @include('admin.partials.navbar-admin')

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">

    <main>
        <div class="bulan">
            <h3 class="text-start mb-4 mt-5">Status tagihan warga</h3>


            {{-- <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Masukan nama bulan:</span>
                <input type="text" class="form-control" placeholder="Nama Bulan" aria-label="Nama Bulan"
                    aria-describedby="basic-addon1">
                <button class="btn btn-primary" type="button">Cari</button>
            </div> --}}

            <div class="d-flex align-items-center justify-content-between my-5">
                {{-- search --}}
                <form action="{{ route('admin.tagihan') }}" method="GET" class="w-50 me-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukan kata kunci" name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>

                {{-- filter --}}
                <form action="{{ route('admin.tagihan') }}" method="GET" class="w-50 ms-2">
                    <div class="input-group d-flex">
                        <label class="input-group-text" for="bulanFilter">Filter Bulan:</label>
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
                            <option value="Oktober" {{ request('bulan') == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                            <option value="November" {{ request('bulan') == 'November' ? 'selected' : '' }}>November
                            </option>
                            <option value="Desember" {{ request('bulan') == 'Desember' ? 'selected' : '' }}>Desember
                            </option>
                        </select>
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="table-tagihan">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->tagihan->first()->bulan ?? now()->format('F') }}</td>
                            <td
                                style="{{ $data->tagihan->first() ? 'color:' . ($data->tagihan->first()->status === 'sudah terbayar' ? 'green' : 'red') : 'color:red' }}">
                                {{ $data->tagihan->first() ? $data->tagihan->first()->status : 'belum terbayar' }}
                            </td>

                            <td>{{ $data->tagihan->first()->catatan ?? '-' }}</td>

                            <td>
                                {{ $data->tagihan->first() ? $data->tagihan->first()->created_at->format('d-m-Y') : '-' }}
                            </td>


                            @if ($data->tagihan->first() && $data->tagihan->first()->status == 'sudah terbayar')
                                <td>
                                    {{-- button untuk melihat bukti --}}
                                    <div class="mb-1">
                                        <a href="{{ asset('storage/' . $data->tagihan->first()->bukti) }}"
                                            class="btn btn-info "><i class="bi bi-file-earmark-text"></i> Lihat Bukti
                                        </a>
                                    </div>
                                </td>
                            @else
                                <td>-</td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>



    {{-- menampilkan footer --}}
    @include('admin.partials.footer-admin')
@endsection
