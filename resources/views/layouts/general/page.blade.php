@extends('layouts.general.meta')

@section('body')

    <!-- Header -->
    <header id = "header" class = "align-items-center d-flex fixed-top header">
        <div class = "align-items-center container d-flex justify-content-between">

            <a href = "{{ url('/login') }}" class = "align-items-center d-flex logo me-auto me-lg-0">
                <h1>Cataloger<span>.</span></h1>
                <span>{{ $auth->name_last }}, {{ $auth->name_first }}</span>
            </a>

            <nav id = "navbar" class = "navbar">
                <ul>

					@if (
                        $auth->is_principal ||
                        $auth->is_administrator
                    )

                        <li><a href = "{{ url('/sections') }}">Sections</a></li>

                    @endif

                    <li><a href = "{{ url('/students') }}">Students</a></li>

					@if (
                        $auth->is_principal ||
                        $auth->is_administrator
                    )

                        <li><a href = "{{ url('/users') }}">Users</a></li>

                    @endif

					@if (
                        $auth->is_principal ||
                        $auth->is_administrator
                    )

                        <li><a href = "{{ url('/years') }}">Years</a></li>

                    @endif

                    <li><a href = "{{ url('/logout') }}">Log out</a></li>
                </ul>
            </nav>

            <i class = "bi bi-list mobile-nav-show mobile-nav-toggle"></i>
            <i class = "bi bi-x d-none mobile-nav-hide mobile-nav-toggle"></i>

        </div>
    </header>

    <!-- Main -->
    <main id = "main">

        @yield('content')

    </main>

    <!-- Footer -->
    <footer id = "footer" class = "align-middle container-fluid footer"></footer>
    <script>
        document.getElementById('footer').innerHTML = `
            Copyright ${new Date().getFullYear()}
            <br>
            Republic of the Philippines. Department of Education.
        `;
    </script>

@endsection