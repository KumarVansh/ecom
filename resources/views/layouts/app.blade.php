<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    @include('layouts.header')
</head>
<body>
    @include('layouts.navbar')
    <main class="main">
    @yield('main') 
    </main>
    @include('layouts.footer')
</body>
</html>