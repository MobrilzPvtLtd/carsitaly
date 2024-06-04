<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->currentLocale()) }}" dir="{{ language_direction() }}">

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
        <link href="assets/css/animate.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="assets/css/owl.carousel.css" rel="stylesheet">
	<link href="assets/css/owl-carousel-theme.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="assets/css/flexslider.css" rel="stylesheet" media="screen">
	<link href="assets/css/style.css" rel="stylesheet" media="screen">
	<link href="assets/css/new.css" rel="stylesheet" media="screen">
	<!-- LIGHT -->
	<link rel="stylesheet" type="text/css" href="assets/css/dummy.css" id="select-style">
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- FONTS -->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600' rel='stylesheet' type='text/css'>
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
    </head>

    <body>

        @include('frontend.includes.header')

        <div class="col-md-4">
            <div id="notification-area" style="position: fixed; top: 20px; right: 20px; z-index: 1000;"></div>
        </div>

        <main class="bg-white dark:bg-gray-800">
            @yield('content')
        </main>

        @include('frontend.includes.footer')

        <!-- Scripts -->
        @livewireScripts
        @stack('after-scripts')

        @if(session('success'))
            <script>
                var notificationArea = document.getElementById('notification-area');
                var notificationMessage = document.createElement('div');
                notificationMessage.classList.add('notification');

                var messageText = document.createElement('span');
                messageText.textContent = '{{ session('success') }}';
                notificationMessage.appendChild(messageText);

                var closeButton = document.createElement('button');
                closeButton.textContent = '×';
                closeButton.classList.add('close-button');
                closeButton.onclick = function() {
                    notificationArea.removeChild(notificationMessage);
                };
                notificationMessage.appendChild(closeButton);

                notificationArea.appendChild(notificationMessage);

                setTimeout(function(){
                    notificationArea.removeChild(notificationMessage);
                }, 10000); // 10 seconds
            </script>

        @endif
    </body>

</html>
