@extends('layouts.general.meta')
@section('title') Cataloger - Login @endsection
@section('body')
    <div class = "bg-light py-3 py-md-5">
        <div class = "container">
            <div class = "row justify-content-md-center">
                <div class = "col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                    <div class = "bg-white p-4 p-md-5 rounded shadow-sm">
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "text-center mb-5">
                                    <h1>Cataloger</h1>
                                </div>
                            </div>
                        </div>
                        <form action = "{{ url('/login') }}" method = "POST">
                            @csrf
                            <div class = "row gy-3 gy-md-4 overflow-hidden">
                                <div class = "col-12">
                                    <label for = "email" class = "form-label">DepEd ID <span class = "text-danger">*</span></label>
                                    <div class = "input-group">
                                        <input type = "text" name = "email" required>
                                    </div>
                                </div>
                                <div class = "col-12">
                                    <label for = "password" class = "form-label">Password <span class="text-danger">*</span></label>
                                    <div class = "input-group">
                                        <input type = "password" class = "form-control" name = "password" value = "" required>
                                    </div>
                                </div>
                                <div class = "col-12">
                                    @if($errors->has('credentials'))
                                        <b class = "custom-warning">Invalid username or password.</b>
                                        <br>
                                        <br>
                                    @endif
                                    <div class = "d-grid">
                                        <button class = "custom-button" type = "submit">Log In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class = "container">
        <div class = "row">
            <div class = "align-middle col-3"></div>
            <div class = "align-middle col-6">
                <hr>
                <h6 class = "text-center">Premade accounts for testing</h6>
                <hr>
                <table class = "table">
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>DepEd ID</th>
                        <th>Password</th>
                    </tr>
                    <tr>
                        <td>OLSEN, Tulip</td>
                        <td>Principal</td>
                        <td>user1_1</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td>OLSEN, Lake</td>
                        <td>Principal</td>
                        <td>user1_2</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td>COSAY, Jesse</td>
                        <td>Administrator</td>
                        <td>user2_1</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td>DRACULA, Alan</td>
                        <td>Administrator</td>
                        <td>user2_2</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td>MONROE, Grace</td>
                        <td>Grade Level Coordinator</td>
                        <td>user3_1</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td>LAURENT, Simon</td>
                        <td>Grade Level Coordinator</td>
                        <td>user3_2</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td>HUGHES, Amelia</td>
                        <td>Adviser</td>
                        <td>user4_1</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td>TIMMENS, Alrick</td>
                        <td>Adviser</td>
                        <td>user4_2</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td>CORGI, Atticus</td>
                        <td>Adviser</td>
                        <td>user5_1</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td>ONE, One</td>
                        <td>Adviser</td>
                        <td>user5_2</td>
                        <td>password</td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            <div class = "align-middle col-3"></div>
        </div>
    </div>
@endsection