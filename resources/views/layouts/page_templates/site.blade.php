<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('storage/css/site.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="/css/site.css" rel="stylesheet" type="text/css"> --}}
    <title>@yield('title')</title>
</head>

<body class="body-styles">
    {{-- Barra de navegação --}}
    <header class="header-styles">
        @include('layouts.navbars.sitebar')
    </header>

    {{-- Conteúdo --}}
    <main class="main-styles">
        @yield('content')
    </main>

    {{-- Rodapé --}}
    @include('layouts.footers.sitefooter')
</body>

</html>
