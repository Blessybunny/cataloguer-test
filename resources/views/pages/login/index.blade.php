@extends('layouts.general.page')

@section('title')
    Login
@endsection

@section('content-page')

    <main id = "main">
        <section class = "vh-100">
            <div class = "container py-5 h-100">
                <div class = "row d-flex justify-content-center align-items-center h-100">
                    <div class = "col col-xl-10">
                        <div class = "card" style = "border-radius: 1rem;">
                            <div class = "row g-0">
                            <div class = "col-md-6 col-lg-5 d-none d-md-block" style = "
                                background-image: url({{ asset('assets/img/login.jpg') }});
                                background-size: cover;
                            ">
                            </div>
                            <div class = "col-md-6 col-lg-7 d-flex align-items-center">
                                <div class = "card-body p-4 p-lg-5 text-black">
                                    <form>
                                        <div class = "d-flex align-items-center mb-3 pb-1">
                                            <span class = "h1 fw-bold mb-0">Login</span>
                                        </div>

                                        <h5 class = "fw-normal mb-3 pb-3" style = "letter-spacing: 1px;">Sign into your account</h5>

                                        <div class = "form-outline mb-4">
                                            <input type = "email" id = "form2Example17" class = "form-control form-control-lg">
                                            <label class = "form-label" for = "form2Example17">School email address</label>
                                        </div>

                                        <div class = "form-outline mb-4">
                                            <input type = "password" id = "form2Example27" class = "form-control form-control-lg">
                                            <label class = "form-label" for = "form2Example27">Password</label>
                                        </div>

                                        <div class = "pt-1 mb-4">
                                            <a class = "btn btn-dark btn-lg btn-block" href = "{{ url('/manager') }}">Login</a>
                                        </div>

                                        <p class = "mb-5 pb-lg-2" style = "color: #393f81;">Forgot password? <a href = "#!" style = "color: #393f81;">Contact suppot</a></p>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection