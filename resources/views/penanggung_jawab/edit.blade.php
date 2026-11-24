<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penanggung Jawab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">Edit Penanggung Jawab</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('penanggung-jawab.update', $penanggungJawab->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control"
                            value="{{ $penanggungJawab->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control"
                            value="{{ $penanggungJawab->jabatan }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control"
                            value="{{ $penanggungJawab->no_hp }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3">{{ $penanggungJawab->keterangan }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('penanggung-jawab.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>

            </div>
        </div>
    </div>

</body>
</html>
