<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? null }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- load assets template --}}
        <!-- favicon -->
        {{-- <link rel="shortcut icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png"> --}}
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
        <!-- fontawesome -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/all.min.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets') }}/bootstrap/css/bootstrap.min.css">
        <!-- owl carousel -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/magnific-popup.css">
        <!-- animate css -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/animate.css">
        <!-- mean menu css -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/meanmenu.min.css">
        <!-- main style -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/main.css">
        <!-- responsive -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css">
        {{-- end load assets template --}}

        {{-- load css custom --}}
        <link rel="stylesheet" href="{{ asset('assets') }}/css/custom.css">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        {{-- <x-jet-banner /> --}}

        {{-- <div class="min-h-screen bg-gray-100"> --}}

             <!--PreLoader-->
            <div class="loader">
                <div class="loader-inner">
                    <div class="circle"></div>
                </div>
            </div>
            <!--PreLoader Ends-->

            {{-- @livewire('navigation-menu') --}}

            {{-- header --}}
                @include('layouts.headers.header')
            {{-- end header --}}

            {{-- add content --}}
                @yield('content')
            {{-- end add content --}}

            {{-- footer --}}
                @include('layouts.footers.footer')
            {{-- end footer --}}

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            {{-- <main>
                {{ $slot }}
            </main> --}}
        {{-- </div> --}}

        @stack('modals')

        @livewireScripts

        {{-- load js template --}}
        <!-- jquery -->
        <script src="{{ asset('assets') }}/js/jquery-1.11.3.min.js"></script>
        <!-- bootstrap -->
        <script src="{{ asset('assets') }}/bootstrap/js/bootstrap.min.js"></script>
        <!-- count down -->
        <script src="{{ asset('assets') }}/js/jquery.countdown.js"></script>
        <!-- isotope -->
        <script src="{{ asset('assets') }}/js/jquery.isotope-3.0.6.min.js"></script>
        <!-- waypoints -->
        <script src="{{ asset('assets') }}/js/waypoints.js"></script>
        <!-- owl carousel -->
        <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
        <!-- magnific popup -->
        <script src="{{ asset('assets') }}/js/jquery.magnific-popup.min.js"></script>
        <!-- mean menu -->
        <script src="{{ asset('assets') }}/js/jquery.meanmenu.min.js"></script>
        <!-- sticker js -->
        <script src="{{ asset('assets') }}/js/sticker.js"></script>
        <!-- main js -->
        <script src="{{ asset('assets') }}/js/main.js"></script>
        {{-- end load js template --}}

        {{-- custom js --}}
        <script src="{{ asset('assets/js/global.js') }}"></script>

        @stack('js')
    </body>

    {{-- @livewireScripts --}}

</html>
