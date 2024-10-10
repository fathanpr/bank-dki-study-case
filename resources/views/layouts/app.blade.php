<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome/css/all.min.css') }}">
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
        @vite(['resources/js/pages/approval.js'])
    @endif
</body>

</html>
