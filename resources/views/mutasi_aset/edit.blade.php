<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mutasi Aset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">Edit Mutasi Aset</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('mutasi-aset.update', $mutasiAset->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Aset</label>
                        <select name="aset_id" class="form-select" required>
                            @foreach($asets as $aset)
                                <option value="{{ $aset->id }}"
                                    {{ $mutasiAset->aset_id == $aset->id ? 'selected' : '' }}>
                                    {{ $aset->nama_aset }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi Asal</label>
                        <select name="lokasi_asal_id" class="form-select" required>
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}"
                                    {{ $mutasiAset->lokasi_asal_id == $lokasi->id ? 'selected' : '' }}>
                                    {{ $lokasi->nama_lokasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi Tujuan</label>
                        <select name="lokasi_tujuan_id" class="form-select" required>
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}"
                                    {{ $mutasiAset->lokasi_tujuan_id == $lokasi->id ? 'selected' : '' }}>
                                    {{ $lokasi->nama_lokasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Mutasi</label>
                        <input type="date" name="tanggal_mutasi" class="form-control"
                            value="{{ $mutasiAset->tanggal_mutasi }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3">{{ $mutasiAset->keterangan }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('mutasi-aset.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>

            </div>
        </div>
    </div>

</body>
</html>
