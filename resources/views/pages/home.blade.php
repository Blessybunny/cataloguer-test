@extends('layouts.general.page')

@section('title') Cataloger - Home @endsection

@section('content')

	<section class = "container">

			<!-- Header -->
			<div class = "row">
				<div class = "align-self-center col-12">
					<h4 class = "text-center">Home</h4>
				</div>
				<div class = "align-self-center col-12">
					<hr>
				</div>
			</div>

			<!-- Index -->
			<div class = "row">

				<!-- Sections -->

				@if (
					$auth->is_principal ||
					$auth->is_administrator
				)

					<div class = "col-3">
						<a href = "{{ url('/sections') }}" class = "card h-100">
							<div class = "card-body">
								<h6 class = "card-title text-center">Section Manager</h6>
								<p class = "card-subtitle text-center">Manage section names for each grade level</p>
							</div>
						</a>
					</div>

				@endif

				<!-- Students -->
				<div class = "col-3">
					<a href = "{{ url('/students') }}" class = "card h-100">
						<div class = "card-body">
							<h6 class = "card-title text-center">Student Manager</h6>
							<p class = "card-subtitle text-center">Manage student info, grades, and forms</p>
						</div>
					</a>
				</div>

				<!-- Users -->

				@if (
					$auth->is_principal ||
					$auth->is_administrator
				)

					<div class = "col-3">
						<a href = "{{ url('/users') }}" class = "card h-100">
							<div class = "card-body">
								<h6 class = "card-title text-center">User Manager</h6>
								<p class = "card-subtitle text-center">Manage user permission and access</p>
							</div>
						</a>
					</div>

				@endif

				<!-- School Years -->

				@if (
					$auth->is_principal ||
					$auth->is_administrator
				)

					<div class = "col-3">
						<a href = "{{ url('/years') }}" class = "card h-100">
							<div class = "card-body">
								<h6 class = "card-title text-center">School Year Manager</h6>
								<p class = "card-subtitle text-center">Manage school year monthly attendance counts and more</p>
							</div>
						</a>
					</div>

				@endif

			</div>

		</div>
	</section>

@endsection