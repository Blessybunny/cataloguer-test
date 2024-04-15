@extends('layouts.general.page')
@section('title') Cataloger - Student Manager @endsection
@section('content')
    <form action = "{{ url('/students/edit/lock', $student->id) }}" method = "POST">
        @csrf
        <div class = "container-fluid">
			<div class = "row">
				<div class = "col-12">
					<h1 class = "custom-header">
						<div class = "main">Students</div>
						<div class = "subtitle">Editor | Settings | {{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</div>
						<hr>
					</h1>
					<b>Created on: </b>{{ $student->created_at->format('l jS \\of F Y') }}
					<br>
					<b>Edited on: </b>{{ $student->updated_at->format('l jS \\of F Y') }}
					<hr>
					@if (session()->get('updated'))
						<b class = "custom-success">Successfully updated!</b>
						<hr>
					@endif
				</div>
			</div>
		</div>
        <div class = "container">
            <div class = "row">
                <div class = "col-4">
					<b>Miscellaneous:</b>
					<div class = "border-all-light" style = "padding: 15px;">
                        <label>
                            <input
                                name = "ST_locker"
                                type = "checkbox"
                                {{  $student->ST_locker ? 'checked' : '' }}
                            >
                            <span>Lock Editing</span>
                        </label>
                    </div>
                    <br>
					<b>Subject (Nihongo):</b>
					<div class = "border-all-light" style = "padding: 15px;">
                        @foreach ($grades as $grade)
                            <label>
                                <input
                                    name = "ST_sf9_g{{ $grade->grade }}_subject_jp"
                                    type = "checkbox"
                                    {{  $student->{'ST_sf9_g'.$grade->grade.'_subject_jp'} ? 'checked' : '' }}
                                >
                                <span>Show for SF9 (Grade {{ $grade->grade }})</span>
                            </label>
                            <label>
                                <input
                                    name = "ST_sf10_g{{ $grade->grade }}_subject_jp"
                                    type = "checkbox"
                                    {{  $student->{'ST_sf10_g'.$grade->grade.'_subject_jp'} ? 'checked' : '' }}
                                >
                                <span>Show for SF10 (Grade {{ $grade->grade }})</span>
                            </label>
                            @if ($loop->index + 1 != $loop->count)
                                <hr>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class = "container">
            <div class = "row">
				<div class = "col-12">
					<hr>
					<input class = "custom-button" type = "submit" value = "Update">
				</div>
            </div>
        </div>
	</form>
@endsection