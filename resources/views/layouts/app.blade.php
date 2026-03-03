<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }} &mdash; Surat Desa</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/modules/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/components.css') }}">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"> --}}

    {{-- Vite handles Chart.js + Alpine --}}
    @vite(['resources/js/app.js'])

    <!-- Google Analytics (Optional) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('layouts.header')

            <div class="main-sidebar sidebar-style-2">
                @include('layouts.sidebar')
            </div>

            <!-- Main Content -->
            @yield('content')

            <footer class="main-footer">
                @include('layouts.footer')
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('template/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('template/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('template/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/stisla.js') }}"></script>

    <!-- JS Libraries -->
    <script src="{{ asset('template/dist/assets/modules/jquery.sparkline.min.js') }}"></script>
    {{-- ❌ JANGAN MUAT Chart.js DI SINI LAGI --}}
    {{-- <script src="{{ asset('template/dist/assets/modules/chart.min.js') }}"></script> --}}
    <script src="{{ asset('template/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('template/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('template/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/custom.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
{{-- 
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script> --}}

    <script>
        document.querySelector('#modalImport form').addEventListener('submit', function() {
            let btn = document.getElementById('btnImport');
            let text = document.getElementById('importText');
            let load = document.getElementById('importLoading');
            btn.disabled = true;
            text.style.display = 'none';
            load.style.display = 'inline-block';
        });
    </script>


    {{-- Tempat untuk script dari tiap halaman --}}
    @yield('scripts')
</body>

</html>
