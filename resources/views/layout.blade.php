
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengelolaan Aset</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff7fb;
            color: #4a3540;
        }

        .navbar {
            background-color: #f5dce8;
        }

        .navbar-brand {
            color: #70465b;
            font-weight: bold;
        }

        .card {
            border: 1px solid #f0d6e3;
            border-radius: 12px;
        }

        .btn-pink {
            background-color: #d98caf;
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background-color: #c7799d;
            color: white;
        }

        .table thead th {
            background-color: #f5dce8;
            color: #70465b;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('aset.index') }}">
                Pengelolaan Aset Kantor
            </a>
        </div>
    </nav>

    <main class="container pb-5">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
