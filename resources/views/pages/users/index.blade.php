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
			<h6 class = "align-middle custom-header">Users Roster</h6>
			
			<table class = "table">
				<tr>
					<th class = "align-middle" style = "width: 150px">LRN</th>
					<th class = "align-middle">Name</th>
					<th class = "align-middle">Role</th>
					<th class = "align-middle">Option</th>
				</tr>
				@foreach ($users as $user)
					<tr>
						<td class = "align-middle left">{{ $user->info_id }}</td>
						<td class = "align-middle left">
							<span class = "uppercase">{{ $user->info_name_last }},</span>
							<span class = "capitalize">{{ $user->info_name_first }},</span>
							<span class = "capitalize">{{ $user->info_name_middle }}</span>
						</td>
						<td class = "align-middle left">
						</td>
						<td>
						</td>
					</tr>
				@endforeach
			</table>
			
			<!-- Temp -->
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

		</div>
	</div>
</section>

@endsection