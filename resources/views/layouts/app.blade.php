<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @yield('navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @if ($page == 'pembukaan-rekening')
        @vite(['resources/js/pages/pengajuan.js'])
    @endif

    @if ($page == 'approval-pembukaan-rekening')
        @vite(['resources/js/pages/approval_pembukaan_rekening.js'])
    @endif

</body>

</html>
