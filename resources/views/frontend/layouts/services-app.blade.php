<!DOCTYPE html>
<html class="load-full-screen" lang="{{ str_replace('_', '-', app()->currentLocale()) }}" dir="{{ language_direction() }}">

<head>
    <meta charset="utf-8" />
    <link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon" sizes="76x76">
    <link type="image/png" href="{{ asset('img/favicon.png') }}" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ setting('meta_description') }}">
    <meta name="keyword" content="{{ setting('meta_keyword') }}">
    @include('frontend.includes.meta')

    <!-- Shortcut Icon -->
    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
    <link type="image/ico" href="{{ asset('img/favicon.png') }}" rel="icon" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- STYLES -->
	<link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/owl-carousel-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('assets/css/flexslider.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" media="screen">
	<!-- LIGHT -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dummy.css') }}" id="select-style">
	<link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <style>
        .notification {
            background-color: #31733c;
            color: white;
            padding: 5px 12px 5px 15px;
            margin: 25px;
            border-radius: 5px;
            position: relative;
        }
        .close-button {
            background: transparent;
            border: none;
            color: inherit;
            cursor: pointer;
            font-size: 20px;
            padding: 5px;
            margin-left: 70px;
        }
    </style>
	<!-- FONTS -->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600' rel='stylesheet' type='text/css'>

</head>

<body class="load-full-screen">
    <div id="loader" class="load-full-screen">
        <div class="loading-animation">
            <span><i class="fa fa-plane"></i></span>
            <span><i class="fa fa-bed"></i></span>
            <span><i class="fa fa-ship"></i></span>
            <span><i class="fa fa-suitcase"></i></span>
        </div>
    </div>

    <div class="site-wrapper">
        @include('frontend.includes.services-header')

        <div class="col-md-4">
            <div id="notification-area" style="position: fixed; top: 20px; right: 20px; z-index: 1000;"></div>
        </div>
        @yield('services-content')

        @include('frontend.includes.services-footer')
    </div>

    @php
        $currentUrl = Request::url();
        $segments = explode('/', $currentUrl);
        $serviceType = end($segments);

        if ($serviceType == 'cars') {
            $cars = App\Models\Service::get();
            $minPrice = PHP_INT_MAX;
            $maxPrice = 0;
            foreach ($cars as $key => $value) {
                if ($value->price < $minPrice) {
                    $minPrice = $value->price;
                }
                if ($value->price > $maxPrice) {
                    $maxPrice = $value->price;
                }
            }
        }else {
            $service = App\Models\Service::where('service_type', $serviceType)->get();
            $minPrice = PHP_INT_MAX;
            $maxPrice = 0;
            foreach ($service as $key => $value) {
                if ($value->price < $minPrice) {
                    $minPrice = $value->price;
                }
                if ($value->price > $maxPrice) {
                    $maxPrice = $value->price;
                }
            }
        }
    @endphp

    @livewireScripts
    @stack('after-scripts')

    @include('frontend.includes.script')

    <script type="module" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&libraries=drawing,geometry,places"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var autocompleteOptions = {
                types: ['geocode']
            };

            var autocompleteStartingPoint = new google.maps.places.Autocomplete(document.getElementById('starting_point'), autocompleteOptions);
            var autocompleteEndingPoint = new google.maps.places.Autocomplete(document.getElementById('ending_point'), autocompleteOptions);
            // var autocompleteCity = new google.maps.places.Autocomplete(document.getElementById('city'), autocompleteOptions);
        });
    </script>
</body>

</html>
