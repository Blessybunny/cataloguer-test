<!doctype html>
<html lang = "en">

	<head>

		<!-- Main -->
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
		
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
		<link href = "{{ asset('assets/less/general.less') }}" rel = "stylesheet" type = "text/less">

		@yield('head')

	</head>

    <body>
		<!-- Main -->
		<header id = "header" class = "header fixed-top d-flex align-items-center">
			<div class = "container d-flex align-items-center justify-content-between">
				
				<a href = "{{ url('/login') }}" class = "logo d-flex align-items-center me-auto me-lg-0">
					<h1 class = "capitalize">Cataloger<span>.</span></h1>
				</a>

				<nav id = "navbar" class = "navbar">
					<ul>
						<li><a href = "{{ url('/logout') }}">Log out</a></li>
					</ul>
				</nav>
				
				<i class = "mobile-nav-toggle mobile-nav-show bi bi-list"></i>
				<i class = "mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

			</div>
		</header>

		<!-- Main -->
		<main id = "main">
			@yield('content')
		</main>

		<!-- Footer -->
		<footer id = "footer" class = "align-middle container-fluid footer">
			This project is a proof-of-concept demo and does not use legitimate data and information.
			<br>
			All names are fictitious personas and do not reflect real subjects.
		</footer>
		
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
        
    </body>
	
</html>