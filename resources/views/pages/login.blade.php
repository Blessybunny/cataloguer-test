<!doctype html>
<html lang = "en">

	<head>

		<!-- Main -->
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
		<meta name = "viewport" content = "initial-scale=1, width=device-width">
		
		<title>Cataloger - Login</title>

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

	</head>

    <body>

		<!-- Header -->
		<header id = "header" class = "align-items-center d-flex fixed-top header">
			<div class = "align-items-center container d-flex justify-content-between">
				
				<a class = "align-items-center d-flex logo me-auto me-lg-0">
					<h1 class = "capitalize">Cataloger<span>.</span></h1>
				</a>

			</div>
		</header>

		<!-- Main -->
		<main id = "main">
            <form action = "{{ url('/login') }}" method = "POST">

                @csrf

                <section class = "container">
                    <div class = "justify-content-center row">
                        <div class = "col-12 col-lg-6 col-md-8 col-xl-5">
                            <div class = "card">
                                <div class = "card-body p-5 text-center">
                                    <div class = "mt-md-4 mb-md-5 pb-5">

                                        <h2 class = "text-uppercase">Login</h2>
                                        <p>Please enter your DepEd ID and password</p>

                                        <div class = "form-outline mb-4">
                                            <label class = "form-label">DepEd ID</label>
                                            <input name = "email" type = "text" class = "form-control form-control-lg">
                                        </div>
                                        <div class = "form-outline mb-4">
                                            <label class = "form-label">Password</label>
                                            <input name = "password" type = "password" class = "form-control form-control-lg">
                                        </div>

                                        <button class = "button" type = "submit">Login</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                        <tr>
                            <td>Principal</td>
                            <td>user1_1</td>
                            <td>password</td>
                        </tr>
                        <tr>
                            <td>Principal</td>
                            <td>user1_2</td>
                            <td>password</td>
                        </tr>
                        <tr>
                            <td>Administrator</td>
                            <td>user2_1</td>
                            <td>password</td>
                        </tr>
                        <tr>
                            <td>Administrator</td>
                            <td>user2_2</td>
                            <td>password</td>
                        </tr>
                        <tr>
                            <td>Grade Level Coordinator</td>
                            <td>user3_1</td>
                            <td>password</td>
                        </tr>
                        <tr>
                            <td>Grade Level Coordinator</td>
                            <td>user3_2</td>
                            <td>password</td>
                        </tr>
                        <tr>
                            <td>Adviser</td>
                            <td>user4_1</td>
                            <td>password</td>
                        </tr>
                        <tr>
                            <td>Adviser</td>
                            <td>user4_2</td>
                            <td>password</td>
                        </tr>
                        <tr>
                            <td>Teacher</td>
                            <td>user5_1</td>
                            <td>password</td>
                        </tr>
                        <tr>
                            <td>Teacher</td>
                            <td>user5_2</td>
                            <td>password</td>
                        </tr>
                    </table>
                </section>

            </form>
		</main>

		<!-- Footer -->
		<footer id = "footer" class = "align-middle container-fluid footer"></footer>
        <script>
            document.getElementById('footer').innerHTML = `
                Copyright ${new Date().getFullYear()}
                <br>
                Republic of the Philippines. Department of Education.
            `;
        </script>
		
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