
@extends('layout')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Data Mutasi Aset</h2>

    <div class="mb-3">
        <a href="{{ route('mutasi-aset.create') }}" class="btn btn-pink">
            + Tambah Mutasi
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
                            <th>Nama Aset</th>
                            <th>Lokasi Asal</th>
                            <th>Lokasi Tujuan</th>
                            <th>Tanggal Mutasi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($mutasiAsets as $mutasiAset)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mutasiAset->aset->nama_aset }}</td>
                                <td>{{ $mutasiAset->lokasiAsal->nama_lokasi }}</td>
                                <td>{{ $mutasiAset->lokasiTujuan->nama_lokasi }}</td>
                                <td>{{ $mutasiAset->tanggal_mutasi }}</td>
                                <td>{{ $mutasiAset->keterangan ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('mutasi-aset.edit', $mutasiAset->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('mutasi-aset.destroy', $mutasiAset->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus mutasi ini?')">

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
                                <td colspan="7" class="text-center">
                                    Belum ada data mutasi aset.
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
