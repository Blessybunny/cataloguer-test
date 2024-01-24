@extends('layouts.general.page')

@section('title')

Users

@endsection

@section('head')

<link href = "{{ asset('assets/less/students.less') }}" rel = "stylesheet" type = "text/less">

@endsection

@section('content')
	
<section id = "students" class = "container">
	<div class = "row">
		<div class = "col-12">

			<!-- Table -->
			<br>
			<h4 class = "align-middle">User Roster</h4>
			<br>
			
			<table class = "table">
				<tr>
					<th class = "align-middle" style = "width: 150px">DepEd ID</th>
					<th class = "align-middle">Name</th>
					<th class = "align-middle" style = "width: 150px">Role</th>
				</tr>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->info_deped_id }}</td>
						<td>
							<span class = "text-uppercase">{{ $user->info_name_last }},</span>
							<span class = "text-capitalize">{{ $user->info_name_first }}</span>
							<span class = "text-capitalize">{{ $user->info_name_middle }}</span>
							<span class = "text-capitalize">{{ $user->info_name_suffix }}</span>
						</td>
						<td class = "align-middle">
							{{ $user->info_role }}
						</td>
					</tr>
				@endforeach
			</table>

		</div>
	</div>
</section>

@endsection