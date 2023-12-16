@extends('layouts.general.master')

@section('master-content')

    <!-- Header -->
	<header id = "header" class = "header fixed-top d-flex align-items-center">
		<div class = "container d-flex align-items-center justify-content-between">
			
			<!-- Name -->
			<a href = "{{ url('/manager') }}" class = "logo d-flex align-items-center me-auto me-lg-0">
				<h1 class = "capitalize">Cataloger<span>.</span></h1>
			</a>

			<!-- Navigation -->
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
    
@endsection