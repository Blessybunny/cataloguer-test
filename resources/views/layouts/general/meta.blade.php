<!doctype html>
<html lang = "en">
	<head>
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
		<meta name = "viewport" content = "initial-scale=1, width=device-width">
		<title>@yield('title')</title>
		<link href = "{{ asset('assets/css/bootstrap.min.css') }}" rel = "stylesheet">
		<link href = "{{ asset('assets/css/dataTables.min.css') }}" rel = "stylesheet">
		<link href = "{{ asset('assets/less/general.less') }}" rel = "stylesheet" type = "text/less">
		<script src = "{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src = "{{ asset('assets/js/dataTables.min.js') }}"></script>
		@yield('head')
	</head>
    <body>
		@yield('body')
    </body>
	<script src = "{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src = "{{ asset('assets/js/less.min.js') }}"></script>
	<script src = "{{ asset('assets/js/general.js') }}"></script>

</html>