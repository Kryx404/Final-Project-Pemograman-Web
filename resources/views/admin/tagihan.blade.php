@extends('admin.layout.main-admin')

@section('tagihan')
    {{-- menampilkan navbar --}}
    @include('admin.partials.navbar-admin')

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">

    <main>
        <div class="bulan">
            <h3 class="text-start mb-4 mt-5">Status tagihan warga</h3>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Masukan nama bulan:</span>
                <input type="text" class="form-control" placeholder="Nama Bulan" aria-label="Nama Bulan"
                    aria-describedby="basic-addon1">
                <button class="btn btn-primary" type="button">Cari</button>
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
                        <th scope="col" style="width: 12%;">Aksi</th>
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
                                style="{{ $data->tagihan->first() ? ($data->tagihan->first()->status == 'sudah terbayar' ? 'color:green' : 'color:red') : 'color:red' }}">
                                {{ $data->tagihan->first() ? $data->tagihan->first()->status : 'belum terbayar' }}
                            </td>

                            <td>
                                <div class="mb-1">
                                    <a href='' class="btn btn-success "><i class="bi bi-check-lg"></i> Terbayar</a>
                                </div>
                                <div class="mt-1">
                                    <a href='' class="btn btn-warning "><i class="bi bi-bell"></i> Ingatkan</a>
                                </div>
                            </td>

                            <td>
                                <div class="mb-1">
                                    <a href='{{ $data->tagihan->first() ? asset('bukti/' . $data->id . '/' . $data->tagihan->first()->bukti) : '#' }}'
                                        class="btn btn-info "><i class="bi bi-file-earmark-text"></i> Lihat Bukti</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    {{-- @php
                        $sortedUsers = $users->sortBy(function ($user) {
                            return $user->tagihan->first()
                                ? ($user->tagihan->first()->status == 'sudah terbayar'
                                    ? 0
                                    : 1)
                                : 1;
                        });
                    @endphp
                    @foreach ($sortedUsers as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->tagihan->first()->bulan ?? now()->format('F') }}</td>
                            <td
                                style="{{ $data->tagihan->first() ? ($data->tagihan->first()->status == 'sudah terbayar' ? 'color:green' : 'color:red') : 'color:red' }}">
                                {{ $data->tagihan->first() ? $data->tagihan->first()->status : 'belum terbayar' }}
                            </td>
                            <td>
                                <div class="mb-1">
                                    <a href='' class="btn btn-success "><i class="bi bi-check-lg"></i> Terbayar</a>
                                </div>
                                <div class="mt-1">
                                    <a href='' class="btn btn-warning "><i class="bi bi-bell"></i> Ingatkan</a>
                                </div>
                            </td>
                            <td>
                                <div class="mb-1">
                                    <a href='{{ $data->tagihan->first() ? asset('bukti/' . $data->id . '/' . $data->tagihan->first()->bukti) : '#' }}'
                                        class="btn btn-info "><i class="bi bi-file-earmark-text"></i> Lihat Bukti</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </main>



    {{-- menampilkan footer --}}
    @include('admin.partials.footer-admin')
@endsection
