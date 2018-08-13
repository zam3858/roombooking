<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
	<header>

        @guest
            <!-- jika user tidak login, ini akan dipaparkan -->
        @else
            <!-- jika user telah login, ini akan dipaparkan -->
            <!-- Mendapatkan nama pengguna yang sedang login pada sistem -->
            {{ Auth::user()->name }}

        @endguest

    <!-- pada setiap view yang dibuat, kandungan dibawah bahagian section('content') akan
    dimasukkan disini -->
    @yield('content')

       <!-- untuk membuat if statement -->

       @if( $apaSahajaSyarat )

       @else

       @endif



    <footer>
    </footer>

	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

	
     @stack('scripts')
</body>
</html>
