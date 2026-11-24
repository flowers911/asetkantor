
@extends('layout')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Data Aset Kantor</h2>

    <div class="mb-3">
        <a href="{{ route('kategori.index') }}" class="btn btn-pink">Kategori</a>
        <a href="{{ route('lokasi.index') }}" class="btn btn-pink">Lokasi</a>
        <a href="{{ route('penanggung-jawab.index') }}" class="btn btn-pink">Penanggung Jawab</a>
        <a href="{{ route('mutasi-aset.index') }}" class="btn btn-pink">Mutasi Aset</a>
        <a href="{{ route('laporan-aset.index') }}" class="btn btn-pink">Laporan Aset</a>
    </div>

    <div class="mb-3">
        <a href="{{ route('aset.create') }}" class="btn btn-pink">
            + Tambah Aset
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
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($asets as $aset)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $aset->nama_aset }}</td>
                                <td>{{ $aset->kategori->nama_kategori }}</td>
                                <td>{{ $aset->lokasi->nama_lokasi }}</td>
                                <td>{{ $aset->jumlah }}</td>
                                <td>{{ $aset->kondisi }}</td>
                                <td>
                                    <a href="{{ route('aset.edit', $aset->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('aset.destroy', $aset->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus aset ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Belum ada data aset.
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
