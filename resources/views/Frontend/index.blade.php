<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tinves - Toyota Inventory System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="logo/favicon.png">
        <!-- Place favicon.ico in the root directory -->
		<!-- CSS here -->
        <link rel="stylesheet" href="frontend/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="frontend/assets/css/animate.min.css">
        <link rel="stylesheet" href="frontend/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="frontend/assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="frontend/assets/css/slick.css">
        <link rel="stylesheet" href="frontend/assets/css/default.css">
        <link rel="stylesheet" href="frontend/assets/css/style.css">
        <link rel="stylesheet" href="frontend/assets/css/responsive.css">
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="tinves-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>
            <div id="sticky-header" class="menu__area transparent-header">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu__wrap">
                                <nav class="menu__nav">
                                    <div class="logo">
                                        <a href="" class="logo__black"><img src="frontend/assets/img/logo/toyotaintercom.png" alt=""></a>
                                    </div>
                                    <div class="navbar__wrap main__menu d-none d-xl-flex">
                                        <ul class="navigation">
                                            <li class=""><a href="index.html"></a></li>
                                            <li class=""><a href="/dashboard"></a></li>
                                            <li ><a href=""></a></li>
                                            <li class="menu-item-has-children"><a href="#"> </a>
                                        </ul>
                                    </div>
                                    <div class="header__btn d-none d-md-block">
                                        <a href="{{ route('admin.logout') }}" class="btn">Log out</a>
                                    </div>
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="menu__backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section class="banner">
                <div class="container custom-container">
                    <div class="row align-items-center justify-content-center justify-content-lg-between"></div>
                </div>
            </section>
            <!-- banner-area-end -->

            <!-- work-process-area -->
            <section class="work__process">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section__title text-center">
                                <span class="sub-title">Hi - {{ Auth::user()->name }} </span>
                                <h2 class="title">Welcome Request Support Toyota Intercom</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="section__title">
                            <span class="sub-title">Request Support</span>
                            <h2 class="title">Any Request? <br> please describe your problem</h2>
                        </div>
                    </div>
                    <div class="row work__process__wrap">
                        <div class="col">
                            <div class="work__process__item">

                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="homeContact__form">
                                <form method="POST" action="{{ route('request') }}" enctype="multipart/from-data" id="myForm">
                                    @csrf

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">User</label>
                                        <div class="form-group col-sm-10">
                                            <select name="inventory_id"class="form-select" aria-label="Default select example" value=()>
                                                <option selected value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                                                @foreach($inventory as $i)
                                                {{--  <option value="{{ $i->id }}">{{ $i->user->name}}</option>  --}}
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Jenis</label>
                                        <div class="form-group col-sm-10">
                                            <select name="inventory_id" class="form-select" aria-label="Default select example">
                                                {{--  <option selected="">Open this select menu</option>  --}}
                                                @foreach($inventory as $u)
                                                        <option value="{{ $u->id }}">{{ $u->jenis->nama }}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="text" class="col-2 col-form-label">Laporan</label>
                                        <div class="form-group col-10">
                                            <input name="laporan" class="form-control" type="text" placeholder="" id="text">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info waves waves-effect waves-light "value="Submit">
                                </form>

                            </div>
                        </div>
                    </div>
                    {{--  <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">Request Support</span>
                            <h2 class="title">Any Request? <br> please describe your problem</h2>
                        </div>
                    </div>  --}}
                </div>
            </section>
            <!-- work-process-area-end -->

        </main>
        <!-- main-area-end -->



        {{--  <section class="homeContact">
            <div class="container">
                <div class="homeContact__wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section__title">
                                <span class="sub-title">Request Support</span>
                                <h2 class="title">Any Request? <br> please describe your problem</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="homeContact__form">
                                <form method="POST" action="{{ route('request') }}" enctype="multipart/from-data" id="myForm">
                                    @csrf

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">User</label>
                                        <div class="form-group col-sm-10">
                                            <select name="inventory_id"class="form-select" aria-label="Default select example" value=()>
                                                <option selected value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                                                @foreach($inventory as $i)
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Jenis</label>
                                        <div class="form-group col-sm-10">
                                            <select name="inventory_id" class="form-select" aria-label="Default select example">
                                                @foreach($inventory as $u)
                                                        <option value="{{ $u->id }}">{{ $u->jenis->nama }}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="text" class="col-2 col-form-label">Laporan</label>
                                        <div class="form-group col-10">
                                            <input name="laporan" class="form-control" type="text" placeholder="" id="text">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info waves waves-effect waves-light "value="Submit">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  --}}




		<!-- JS here -->
        <script src="frontend/assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="frontend/assets/js/bootstrap.min.js"></script>
        <script src="frontend/assets/js/isotope.pkgd.min.js"></script>
        <script src="frontend/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="frontend/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="frontend/assets/js/element-in-view.js"></script>
        <script src="frontend/assets/js/slick.min.js"></script>
        <script src="frontend/assets/js/ajax-form.js"></script>
        <script src="frontend/assets/js/wow.min.js"></script>
        <script src="frontend/assets/js/plugins.js"></script>
        <script src="frontend/assets/js/main.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;

               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;

               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;

               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break;
            }
            @endif
           </script>
    </body>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    users: {
                        required : true,
                    },
                    laporan: {
                        required : true,
                    },
                },
                messages :{
                    users: {
                        required : 'Please Enter Your Users',
                    },
                    laporan: {
                        required : 'Please Enter Your Laporan',
                    },
                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
</html>
