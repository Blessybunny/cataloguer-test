<!doctype html>
<html lang = "en">

	<head>

		<!-- Main -->
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
		<meta name = "viewport" content = "initial-scale=1, width=device-width">

		<title>@yield('title')</title>

		<!-- Template -->
		<link href = "{{ asset('yummy/img/favicon.png') }}" rel = "icon">
		<link href = "{{ asset('yummy/img/apple-touch-icon.png') }}" rel = "apple-touch-icon">
		<link rel = "preconnect" href = "https://fonts.googleapis.com">
		<link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
		<link href = "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel = "stylesheet">
		<link href = "{{ asset('yummy/vendor/bootstrap/css/bootstrap.min.css') }}" rel = "stylesheet">
		<link href = "{{ asset('yummy/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel = "stylesheet">
		<link href = "{{ asset('yummy/vendor/aos/aos.css') }}" rel = "stylesheet">
		<link href = "{{ asset('yummy/vendor/glightbox/css/glightbox.min.css') }}" rel = "stylesheet">
		<link href = "{{ asset('yummy/vendor/swiper/swiper-bundle.min.css') }}" rel = "stylesheet">
		<link href = "{{ asset('yummy/css/main.css') }}" rel = "stylesheet">

		<!-- Custom -->
		<link href = "{{ asset('assets/css/dataTables.dataTables.min.css') }}" rel = "stylesheet">
		<link href = "{{ asset('assets/less/general.less') }}" rel = "stylesheet" type = "text/less">

		<script src = "{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src = "{{ asset('assets/js/dataTables.min.js') }}"></script>

		@yield('head')

	</head>

    <body>

		@yield('body')

    </body>

	<!-- Template -->
	<script src = "{{ asset('yummy/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src = "{{ asset('yummy/vendor/aos/aos.js') }}"></script>
	<script src = "{{ asset('yummy/vendor/glightbox/js/glightbox.min.js') }}"></script>
	<script src = "{{ asset('yummy/vendor/purecounter/purecounter_vanilla.js') }}"></script>
	<script src = "{{ asset('yummy/vendor/swiper/swiper-bundle.min.js') }}"></script>
	<script src = "{{ asset('yummy/vendor/php-email-form/validate.js') }}"></script>
	<script src = "{{ asset('yummy/js/main.js') }}"></script>

	<!-- Custom -->
	<script src = "{{ asset('assets/js/less.min.js') }}"></script>
	<script src = "{{ asset('assets/js/general.js') }}"></script>

</html>