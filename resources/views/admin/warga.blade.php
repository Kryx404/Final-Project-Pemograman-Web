@extends('admin.layout.main-admin')

@section('warga')
    {{-- menampilkan navbar --}}
    @include('admin.partials.navbar-admin')

    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">

    {{-- cdn sweetalert --}}
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css " rel="stylesheet">

    <main>

        <div class="data-warga">
            <h3 class="text-start mb-4 mt-5">Data Warga</h3>
            <a href="{{ route('admin.data-baru.store') }}" class="btn btn-primary">Tambah data baru</a>

            <form action="{{ route('admin.index') }}" method="GET">
                <div class="input-group mb-3 w-50 mt-4">
                    <span class="input-group-text">Cari warga</span>
                    <input type="text" class="form-control" placeholder="Masukan kata kunci" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>

            {{-- @if ($warga->isEmpty())
                <p class="text-danger">Data warga tidak ditemukan.</p>
            @endif --}}
            @if ($warga->isEmpty())
                <script>
                    Swal.fire("Data Tidak Ditemukan!");
                </script>
            @endif

        </div>

        {{-- @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif --}}

        {{-- sweet alert --}}
        @if (Session::has('success'))
            <script>
                Swal.fire("Data Berhasil Ditambahkan!");
            </script>
        @endif

        <div class="table-warga">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">Username</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($warga as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->alamat }}</td>

                            <td>
                                <a href='/admin/ubah-data/{{ $data->id }}' class="btn btn-primary"><i
                                        class="bi bi-pencil"></i> Ubah</a>

                                <form id="delete-form-{{ $data->id }}"
                                    action="{{ route('admin.data-baru.destroy', $data->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="deleteData({{ $data->id }})"><i class="bi bi-trash"></i>
                                        Hapus</button>
                                </form>

                                {{-- sweet alert hapus --}}
                                <script>
                                    function deleteData(id) {
                                        Swal.fire({
                                            title: 'Apakah Anda Yakin?',
                                            text: "Data akan dihapus secara permanen!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Ya, Hapus!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire({
                                                    title: "Berhasil!",
                                                    text: "Data berhasil dihapus.",
                                                    icon: "success"
                                                });
                                            }
                                        })
                                    }
                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>

    {{-- menampilkan footer --}}
    @include('admin.partials.footer-admin')
@endsection
