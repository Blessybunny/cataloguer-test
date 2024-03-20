@extends('layouts.general.page')

@section('title') Cataloger - Section Manager @endsection

@section('content')

	<section class = "container">

		<!-- Header -->
		<div class = "row">
			<div class = "align-self-center col-4">
				<a href = "{{ url('/home') }}">
					<button class = "button" type = "button">Back</button>
				</a>
			</div>
			<div class = "align-self-center col-4">
				<h4 class = "text-center">Section Index</h4>
			</div>
			<div class = "align-self-center col-4">
			</div>
		</div>

		<!-- Index -->
		<div class = "row">
			<div class = "col-12">
				<hr>
			</div>
			<div class = "col-12">
				<table class = "table">
					<thead>
						<tr>
							<th class = "text-left" width = "200">Level</th>
							<th></th>
							<th class = "text-left" width = "200">Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($grades as $grade)

							<tr>
								<td class = "text-center">Grade {{ $grade->grade }}</td>
								<td></td>
								<td>
									<div class = "container-fluid">
										<div class = "row">
											<div class = "col">
												<a href = "{{ url('/sections/view', $grade->id) }}">View</a>
											</div>
											<div class = "col">

												@if ($auth->is_principal)

													<a href = "{{ url('/sections/edit', $grade->id) }}">Edit</a>

												@endif

											</div>
										</div>
									</div>
								</td>
							</tr>

						@endforeach

					<tbody>
				</table>
			</div>
		</div>

	</section>

@endsection