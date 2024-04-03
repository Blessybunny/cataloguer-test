@extends('layouts.general.page')

@section('title') Cataloger - Student Manager @endsection

@section('content')

    <form action = "{{ url('/students/edit/lock', $student->id) }}" method = "POST">

        @csrf

        <section class = "container">

            <!-- Header -->
            <div class = "row">
                <div class = "align-self-center col-4">
                    <a href = "{{ url('/students') }}">
                        <button class = "button" type = "button">Back</button>
                    </a>
                </div>
                <div class = "align-self-center col-4">
                    <h4 class = "text-center">Student Editor</h4>
                    <p class = "text-center">{{ $student->info_name_last }}, {{ $student->info_name_first }} {{ $student->info_name_middle }} {{ $student->info_name_suffix }}</p>
                </div>
				<div class = "align-self-center col-4">
					<input class = "button float-right" type = "submit" value = "Save">
				</div>
            </div>

            <!-- Content -->
            <div class = "row">
                <div class = "col-12">
                    <hr>
                </div>
                <div class = "col-4">

					<!-- Miscellaneous -->
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

                </div>
                <div class = "col-4">
                    
                    <!-- Subject (Nihongo) -->
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

        </section>

	</form>

@endsection