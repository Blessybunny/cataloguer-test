@extends('layouts.general.page', ['auth' => $auth])

@section('title') Cataloger - Home @endsection

@section('content')

<section class = "container">
	<div class = "row">

		<!-- Header -->
		<div class = "col">
			<h4 class = "text-center">Home</h4>
			<p class = "text-center">Manager selection</p>
		</div>

	</div>
	<div class = "row">

		<!-- Subtitle -->
		<div class = "col">
            <hr>
		</div>

	</div>
	<div class = "row">

		<!-- Index -->
		<div class = "col">
			<div class = "container-fluid">
				<div class = "row">

					<!-- Sections -->

					@if ($auth->DB_ROLE_id == 1 || $auth->DB_ROLE_id == 2)

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

					@if ($auth->DB_ROLE_id == 1 || $auth->DB_ROLE_id == 2)

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

					@if ($auth->DB_ROLE_id == 1 || $auth->DB_ROLE_id == 2)

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
		</div>

	</div>
</section>

@endsection