<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<nav class="navbar navbar-light bg-light mb-4">
  <div class="container"><a class="navbar-brand" href="{{ route('stok-barang') }}">Logistik</a></div>
</nav>
<main class="container">@yield('content')</main>
</body></html>
