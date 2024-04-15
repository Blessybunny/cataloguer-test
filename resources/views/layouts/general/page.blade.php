@extends('layouts.general.meta')
@section('body')
    <div id = "wrapper">
        <div id = "sidebar">
            <div class = "logo">
                <a href = "{{ url('/login') }}">
                    <div class = "upper">Cataloger</div>
                    <div class = "lower">Record Manager</div>
                </a>
            </div>
            <div class = "user">
                <div class = "name">{{ $auth->name_first }} {{ $auth->name_last }}</div>
                <div class = "role">
                    {{ $auth->is_principal ? 'Principal' : '' }}
                    {{ $auth->is_administrator ? 'Administrator' : '' }}
                    {{ $auth->is_grade_level_coordinator ? 'Grade Level Coordinator' : '' }}
                    {{ $auth->is_adviser ? 'Adviser' : '' }}
                </div>
            </div>
            <div class = "links">
                @if ($auth->is_principal || $auth->is_administrator)
                    <a class = "link" href = "{{ url('/home') }}">Home</a>
                @endif
                @if ($auth->is_principal || $auth->is_administrator)
                    <a class = "link" href = "{{ url('/sections') }}">Sections</a>
                @endif
                <a class = "link" href = "{{ url('/students') }}">Students</a>
                @if ($auth->is_principal || $auth->is_administrator)
                    <a class = "link" href = "{{ url('/users') }}">Users</a>
                @endif
                @if ($auth->is_principal || $auth->is_administrator)
                    <a class = "link" href = "{{ url('/years') }}">Years</a>
                @endif
                <a class = "link" href = "{{ url('/logout') }}">Logout</a>
            </div>
            <div class = "copyright">
                <script>
                    document.getElementsByClassName('copyright')[0].innerHTML = `
                        <div class = "copy">Copyright &copy;${new Date().getFullYear()}</div>
                        <div class = "text">Department of Education</div>
                    `;
                </script>
            </div>
        </div>
        <div id = "content">
            @yield('content')
        </div>
	</div>
@endsection