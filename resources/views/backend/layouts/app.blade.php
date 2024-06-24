<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ language_direction() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link type="image/png" href="{{ asset('img/favicon.png') }}" rel="icon">
        <link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon" sizes="76x76">
        <meta name="keyword" content="{{ setting('meta_keyword') }}">
        <meta name="description" content="{{ setting('meta_description') }}">

        <!-- Shortcut Icon -->
        <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
        <link type="image/ico" href="{{ asset('img/favicon.png') }}" rel="icon" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('app.name') }}</title>

        <script src="{{ asset('vendor/jquery/jquery-3.6.4.min.js') }}"></script>

        @vite(['resources/sass/app-backend.scss', 'resources/js/app-backend.js'])

        <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+Bengali+UI&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @yield('style')
        <style>
            body {
                font-family: Ubuntu, "Noto Sans Bengali UI", Arial, Helvetica, sans-serif
            }

            p.notify001 {
                color: #fff;
                background-color: #e62525;
                width: 1.5vw;
                height: 3vh;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 41px;
                font-size: 12px;
            }
        </style>

        @stack('after-styles')

        <x-google-analytics />

        @livewireStyles

    </head>

    <body>
        <!-- Sidebar -->
        @include('backend.includes.sidebar')
        <!-- /Sidebar -->

        <div class="wrapper d-flex flex-column min-vh-100">

          {{-- header --}}
          @include('backend.includes.header')

          <div class="body flex-grow-1">
                <div class="container-lg">

                    @include('flash::message')

                    <!-- Errors block -->
                    @include('backend.includes.errors')
                    <!-- / Errors block -->

                    <!-- Main content block -->
                    @yield('content')
                    <!-- / Main content block -->

                </div>
            </div>

            {{-- Footer block --}}
            {{-- <x-backend.includes.footer /> --}}
        </div>

        <!-- Scripts -->
        @livewireScripts

        @stack('after-scripts')
        <!-- / Scripts -->

        @yield('script')

        <script>
            $('.is_view').click(function() {
                var target = $(this).data('target');
                console.log(target);
                $.ajax({
                    url: '/admin/is_view',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        target: target
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.log('An error occurred: ' + error);
                    }
                });
            });
        </script>

    </body>

</html>
