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



        
            <section class = "container">
                <div class = "justify-content-center row">
                    <div class = "col-12 col-lg-6 col-md-8 col-xl-5">
                        <div class = "card">
                            <div class = "card-body p-5 text-center">
                                <div class = "mb-md-5 mt-md-4 pb-5">
                                    <h2 class = "text-uppercase">Login</h2>
                                    <p>Please enter your DepEd ID and password!</p>
                                    <div class = "form-outline">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>









                                    

                                    <div class="form-outline mb-4">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Password</label>
                                    </div>

                                    <p class="small mb-5 pb-lg-2"><a class="-50" href="#!">Forgot password?</a></p>

                                    <button class="btn btn-lg px-5" type="submit">Login</button>

                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class=""><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#!" class=""><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                        <a href="#!" class=""><i class="fab fa-google fa-lg"></i></a>
                                    </div>

                                    </div>

                                    <div>
                                    <p class="mb-0">Don't have an account? <a href="#!" class="-50 fw-bold">Sign Up</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>







            <section class = "vh-100">
                <div class = "container">
                    <div class = "row justify-content-center">
                        <div class = "col">
                            <div class = "card">
                                <div class = "row">
                                <div class = "col-md-6 col-lg-5 d-none d-md-block" style = "
                                    background-image: url({{ asset('assets/img/login.jpg') }});
                                    background-size: cover;
                                ">
                                </div>
                                <div class = "col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class = "card-body p-4 p-lg-5 text-black">
                                        <form action = "{{ url('/login') }}" method = "POST">=
                                            @csrf
                                            <div class = "d-flex align-items-center mb-3 pb-1">
                                                <span class = "h1 fw-bold mb-0">Login</span>
                                            </div>

                                            <h5 class = "fw-normal mb-3 pb-3" style = "letter-spacing: 1px;">Sign into your account</h5>

                                            <div class = "form-outline mb-4">
                                                <input name = "email" type = "text" id = "form2Example17" class = "form-control form-control-lg">
                                                <label class = "form-label" for = "form2Example17">0123456789 | 0223456789</label>
                                            </div>

                                            <div class = "form-outline mb-4">
                                                <input name = "password" type = "password" id = "form2Example27" class = "form-control form-control-lg">
                                                <label class = "form-label" for = "form2Example27">Password</label>
                                            </div>

                                            <div class = "pt-1 mb-4">
                                                <input type = "submit">Login</a>
                                            </div>

                                            <p class = "mb-5 pb-lg-2" style = "color: #393f81;">Forgot password? <a href = "#!" style = "color: #393f81;">Contact suppot</a></p>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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