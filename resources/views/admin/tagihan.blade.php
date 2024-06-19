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
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->tagihan->first()->bulan ?? now()->format('F') }}</td>

                            <td>
                                @if ($data->tagihan->first())
                                <button type="button" class="btn {{ $data->tagihan->first()->status_with_color['button'] }}" style="color: {{ $data->tagihan->first()->status_with_color['color'] }}">
                                    {{ $data->tagihan->first()->status_with_color['status'] }}
                                </button>
                                @else
                                    -
                                @endif
                            </td>

                            <td>{{ $data->tagihan->first()->catatan ?? '-' }}</td>

                            <td>
                                {{ $data->tagihan->first() ? $data->tagihan->first()->created_at->format('d-m-Y') : '-' }}
                            </td>




                            {{-- button untuk melihat bukti --}}
                            @if (
                                $data->tagihan->first() &&
                                    ($data->tagihan->first()->status == 'Menunggu Konfirmasi' ||
                                        $data->tagihan->first()->status == 'Sudah Terbayar'))
                                <td>
                                    <div class="mb-1">
                                        <a href="{{ asset('storage/' . $data->tagihan->first()->bukti) }}"
                                            class="btn btn-info "><i class="bi bi-file-earmark-text"></i> Lihat Bukti
                                        </a>
                                    </div>
                                </td>
                            @else
                                <td>-</td>
                            @endif


                            {{-- button untuk merubah data pada database kolom status --}}

                            @if ($data->tagihan->first() && $data->tagihan->first()->status == 'Menunggu Konfirmasi')
                                <td>
                                    <form action="{{ route('admin.update-status-tagihan', $data->tagihan->first()->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success"><i
                                                class="bi bi-check-lg"></i></button>
                                    </form>
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
