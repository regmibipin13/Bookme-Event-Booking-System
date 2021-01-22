<!DOCTYPE html>
<html>
<head>
	<title>BookMe - Ticket Bookings for different types of shows and programms all over the world</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend.css') }}">
</head>
<body>

@include('frontend.partials.__top_header')

	<div id="app">
		<div class="flash">
			@include('frontend.partials.__flash')
		</div>
		@yield('content')
	</div>

@include('frontend.partials.__footer')

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>