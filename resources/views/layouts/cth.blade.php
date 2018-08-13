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

        <!-- untuk code php, selain menggunakan <?php ?>, boleh juga menggunakan... -->
        @php
            $apaSahajaSyarat = true;
        @endphp

        <!-- untuk membuat if statement -->
       @if( $apaSahajaSyarat )

       @else

       @endif

        @php
            $users = [
                ['name' => "Nama User"],
                ['name' => "Nama User2"],
                ['name' => "Nama User3"],
            ];
        @endphp
        <!-- untuk membuat loop setiap rekod (contoh ini array jadi $user['namafield'] digunapakai-->
        <ul>
        @foreach($users as $user)
            <li>{{ $user['name'] }}</li>
        @endforeach

        <!-- jika tiada rekod... -->
        @empty($users)
            <li>Tiada rekod untuk dipaparkan</li>
        @endempty
        </ul>

    <footer>
    </footer>

	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

     @stack('scripts')


</body>
</html>
