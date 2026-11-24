
@extends('layout')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Data Penanggung Jawab</h2>

    <div class="mb-3">
        <a href="{{ route('penanggung-jawab.create') }}" class="btn btn-pink">
            + Tambah Penanggung Jawab
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
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>No. HP</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($penanggungJawabs as $penanggungJawab)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penanggungJawab->nama }}</td>
                                <td>{{ $penanggungJawab->jabatan }}</td>
                                <td>{{ $penanggungJawab->no_hp }}</td>
                                <td>{{ $penanggungJawab->keterangan }}</td>
                                <td>
                                    <a href="{{ route('penanggung-jawab.edit', $penanggungJawab->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('penanggung-jawab.destroy', $penanggungJawab->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">

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
                                <td colspan="6" class="text-center">
                                    Belum ada data penanggung jawab.
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
