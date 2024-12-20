<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tugas PWE</title>
    <link rel="stylesheet" href="{{ asset('/css/styles.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    @include('partials.sidebar')
    <div class="main-content">
    @yield('/home')
    @yield('/produk')
    @yield('/addProduk')
    @yield('/editProduk')
    @yield('/laporan')
    @include('partials.footer')
    </div>
</body>
</html>
