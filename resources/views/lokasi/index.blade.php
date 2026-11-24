
@extends('layout')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Data Lokasi Aset</h2>

    <div class="mb-3">
        <a href="{{ route('lokasi.create') }}" class="btn btn-pink">
            + Tambah Lokasi
        </a>

        <a href="{{ route('aset.index') }}" class="btn btn-pink">
            Kembali ke Data Aset
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lokasi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($lokasis as $lokasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lokasi->nama_lokasi }}</td>
                                <td>{{ $lokasi->keterangan }}</td>
                                <td>
                                    <a href="{{ route('lokasi.edit', $lokasi->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('lokasi.destroy', $lokasi->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus lokasi ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    Belum ada data lokasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection
