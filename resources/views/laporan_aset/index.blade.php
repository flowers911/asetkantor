
@extends('layout')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Laporan Data Aset</h2>

    <div class="mb-3">
        <a href="{{ route('aset.index') }}" class="btn btn-pink">
            Kembali ke Data Aset
        </a>
    </div>

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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
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
