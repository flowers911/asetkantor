<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mutasi Aset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">Tambah Mutasi Aset</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('mutasi-aset.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Aset</label>
                        <select name="aset_id" class="form-select" required>
                            <option value="">-- Pilih Aset --</option>
                            @foreach($asets as $aset)
                                <option value="{{ $aset->id }}">
                                    {{ $aset->nama_aset }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi Asal</label>
                        <select name="lokasi_asal_id" class="form-select" required>
                            <option value="">-- Pilih Lokasi Asal --</option>
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}">
                                    {{ $lokasi->nama_lokasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi Tujuan</label>
                        <select name="lokasi_tujuan_id" class="form-select" required>
                            <option value="">-- Pilih Lokasi Tujuan --</option>
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}">
                                    {{ $lokasi->nama_lokasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Mutasi</label>
                        <input type="date" name="tanggal_mutasi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>

                    <a href="{{ route('mutasi-aset.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>

            </div>
        </div>
    </div>

</body>
</html>
