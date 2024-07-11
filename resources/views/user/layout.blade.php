<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.css')
</head>

<body class="index-page">
    {{-- Header Section --}}
    @include('user.header')

    {{-- Main Section --}}
    <main class="main">
        @yield('main_content')
    </main>

    {{-- footer Section --}}
    @include('user.footer')
</body>
</html>
