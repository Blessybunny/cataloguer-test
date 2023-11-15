<!doctype html>
<html lang = "en">

	<head>

		<!-- Main -->
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
		
		<title>@yield('title')</title>

		<!-- Template -->
		<link href = "yummy/img/favicon.png" rel = "icon">
		<link href = "yummy/img/apple-touch-icon.png" rel = "apple-touch-icon">
		<link rel = "preconnect" href = "https://fonts.googleapis.com">
		<link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
		<link href = "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel = "stylesheet">
		<link href = "yummy/vendor/bootstrap/css/bootstrap.min.css" rel = "stylesheet">
		<link href = "yummy/vendor/bootstrap-icons/bootstrap-icons.css" rel = "stylesheet">
		<link href = "yummy/vendor/aos/aos.css" rel = "stylesheet">
		<link href = "yummy/vendor/glightbox/css/glightbox.min.css" rel = "stylesheet">
		<link href = "yummy/vendor/swiper/swiper-bundle.min.css" rel = "stylesheet">
		<link href = "yummy/css/main.css" rel = "stylesheet">

		<!-- Custom -->
		<link href = "assets/less/master.less" rel = "stylesheet" type = "text/less">

		@yield('head')

	</head>

    <body>
		<!-- Main -->
        @yield('master-content')
		
		<!-- Template -->
		<script src = "yummy/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src = "yummy/vendor/aos/aos.js"></script>
		<script src = "yummy/vendor/glightbox/js/glightbox.min.js"></script>
		<script src = "yummy/vendor/purecounter/purecounter_vanilla.js"></script>
		<script src = "yummy/vendor/swiper/swiper-bundle.min.js"></script>
		<script src = "yummy/vendor/php-email-form/validate.js"></script>
		<script src = "yummy/js/main.js"></script>

		<!-- Custom -->
		<script src = "assets/js/less.js"></script>
        
    </body>
	
</html>