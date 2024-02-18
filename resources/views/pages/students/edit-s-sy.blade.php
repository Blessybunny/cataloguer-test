@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

	<form action = "{{ url('/students/edit/s_sy', $student->id) }}" method = "POST">

		@csrf

		<section class = "container">
			<div class = "row">

				<!-- Action -->
				<div class = "col">
					<a href = "{{ url('/students') }}">
						<button class = "button" type = "button">Back</button>
					</a>
				</div>

				<!-- Header -->
				<div class = "col">
					<h4 class = "text-center">Student Manager</h4>
					<p class = "text-center">Manage student info, grades, and forms</p>
				</div>

				<!-- Action -->
				<div class = "col">
					<input class = "button float-right" type = "submit" value = "Save">
				</div>

			</div>
			<div class = "row">

				<!-- Subtitle -->
				<div class = "col">
					<hr>
					<h6 class = "text-center">Edit</h6>
					<p class = "text-center">{{ strtoupper($student->info_name_last) }}, {{ ucfirst($student->info_name_first) }} {{ ucfirst($student->info_name_middle) }} {{ ucfirst($student->info_name_suffix) }}</p>
					<hr>
				</div>

			</div>
			<div class = "row">

				<!-- Edit -->
				<div class = "col">

                    <!-- Grade 7 Section -->
                    <label>
                        <span style = "min-width: 150px;">Grade 7 Section:</span>
                        <select name = "">
                            <option value = ""></option>
                        </select>
                    </label>
                    <br>

                    <!-- Grade 8 Section -->
                    <label>
                        <span style = "min-width: 150px;">Grade 8 Section:</span>
                        <select name = "">
                            <option value = ""></option>
                        </select>
                    </label>
                    <br>

                    <!-- Grade 9 Section -->
                    <label>
                        <span style = "min-width: 150px;">Grade 9 Section:</span>
                        <select name = "">
                            <option value = ""></option>
                        </select>
                    </label>
                    <br>

                    <!-- Grade 10 Section -->
                    <label>
                        <span style = "min-width: 150px;">Grade 10 Section:</span>
                        <select name = "">
                            <option value = ""></option>
                        </select>
                    </label>
                    <hr>
                    
                    <!-- LOCKED: School Year -->
					@php

                        $index = 0;

                    @endphp

                    @foreach ($grades as $grade)

                        @php

                            $index++;

                        @endphp

                        <label>
                            <span style = "min-width: 200px;">Grade {{ $grade->grade }} School Year:</span>
                            <select name = "DB_YEAR_ID_g{{ $grade->grade }}">
                                <option value = ""></option>

                                @foreach ($years as $year)

                                    <option value = "{{ $year->id }}" {{ $student->{'DB_YEAR_ID_g'.$grade->grade} == $year->id ? "selected" : "" }}>{{ $year->year }}-{{ $year->year + 1 }}</option>

                                @endforeach

                            </select>
                        </label>

                        @if ($index != $loop->count)

                            <br>

                        @endif

                    @endforeach

				</div>
			
			</div>
		</section>

	</form>

@endsection