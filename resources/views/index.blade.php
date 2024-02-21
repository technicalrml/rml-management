<!DOCTYPE html>
<html lang="en">
    @include('partials.header')
    <body class="bg-gradient-primary d-flex align-items-center min-vh-100">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img style="width: 35%;" src="{{ asset('img/rml-logo-login.png') }}" alt="RML Logo"><br>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    @include('partials.alert')
                                    <br>
                                    <form class="user" action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <br>
                                        <button type="submit"  class="btn btn-primary btn-user btn-block" name="login">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    @include('partials.js')
    </body>
</html>
