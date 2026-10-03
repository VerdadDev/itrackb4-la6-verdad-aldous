<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet">
</head>
<body class="container text-bg-white">
    
    <h1 class="text-center p-4">@yield('title', 'My Manga Library')</h1>
    <p>Prepared by: Aldous Malvin Verdad</p>
    @include('partials._nav')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/
            dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>