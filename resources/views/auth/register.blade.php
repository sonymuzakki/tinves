<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Tinves - Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="SD INTERCOM" name="sony" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="logo/favicon.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="logo/icon.png" height="75" class="logo-dark mx-auto" alt="">
                                    <img src="logo/icon.png" height="75" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

                        <div class="p-3">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="name" name="name" type="text" required="" placeholder="Nama Lengkap">
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="username" name="username" type="text" required="" placeholder="Username">
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="email" name="email" type="email" required="" placeholder="Email">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control"  id="password" type="password" required="" name="password"  required autocomplete="new-password" placeholder="Password">
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="password_confirmation" type="password" required="" name="password_confirmation" required placeholder="Password">
                                        <x-input-error :messages="$errors->get('password_confirmation')"
                                    </div>
                                </div>

                                <div class="form-group text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>

                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3 text-center">
                                        <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->


        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
