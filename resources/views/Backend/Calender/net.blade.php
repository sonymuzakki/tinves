{{--

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

@extends('admin.admin_master')


@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h2 class="mb-sm-0">Monitoring Peripheral</h2><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Inventaris
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="network" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Events</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="title">
        <span id="titleError" class="text-danger"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card mb-0">
            <div class="card-body">
                <div id="calendar">
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>
    $('document').ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        var network = @json($events);
        var calendar = $('#calendar').fullCalendar({
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events: network,
            selectable:true,
            selecthelper:true,
            select: function (start,end,AllDays){
                $('#network').modal('toggle');

                $('#saveBtn').click(function(){
                    var title = $('#title').val();
                    var start_date = moment(start).format('YYYY-MM-DD');
                    var end_date = moment(end).format('YYYY-MM-DD');

                    $.ajax({
                        url:"{{ route('cal.store') }}",
                        type:"POST",
                        dataType:'json',
                        data:{ title, start_date, end_date},
                        success:function(response)
                        {
                            console.log(response)
                        },
                        error:function(error)
                        {

                        }
                    })

                })

            }
        });
    });
</script>
@endsection

@endsection  --}}


<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>@yield  ('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="SD INTERCOM" name="sony" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- App favicon -->
        {{--  <link rel="shortcut icon" href="assets/images/favicon.ico">  --}}
        <link rel="shortcut icon" href="logo/favicon.png">

        <!-- FullCalendar -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />


        <!-- jquery.vectormap css -->
        <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        {{--  <link href="{{ asset ('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  --}}
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset ('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive Table css -->
        <link href="{{ asset ('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset ('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset ('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset ('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Toast -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

        <link href="{{ asset ('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset ('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <!-- Header -->
            @include('admin.body.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.body.sidebar')
            <!-- Left Sidebar End -->


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <!-- Title -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h2 class="mb-sm-0">Monitoring Peripheral</h2><br></br><hr>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="">Form</a></li>
                                        <li class="breadcrumb-item active">Data Inventaris
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->

                    <!-- Modal -->
                        <div class="modal fade" id="network" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Events</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" id="title">
                                        <span id="titleError" class="text-danger"></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div id="calendar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Page-content -->

        <!-- Footer -->
            @include('admin.body.footer')
        <!-- End Footer -->

            </div>
        <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">

                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
            <script src="{{ asset('assets/libs/jquery/jquery.min.js')  }}"></script>
            <script src="{{  asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
            <script src="{{  asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
            <script src="{{  asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
            <script src="{{  asset('assets/libs/node-waves/waves.min.js') }}"></script>

            <script src="{{  asset('assets/libs/select2/js/select2.min.js') }}"></script>
            <script src="{{  asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
            <script src="{{  asset('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
            <script src="{{  asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
            <script src="{{  asset('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
            <script src="{{  asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
            <script src="{{  asset('assets/js/pages/form-advanced.init.js') }}"></script>

        <!-- FullCalendar -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>


        <!-- jquery.vectormap map -->
            <script src="{{  asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
            <script src="{{  asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <!-- Required datatable js -->
            <script src="{{  asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{  asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Responsive examples -->
            <script src="{{  asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{  asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

            {{--  <script src="{{  asset('assets/js/pages/dashboard.init.js') }}"></script>  --}}

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

            <script src="{{  asset('assets/js/code.js') }}"></script>

        <!-- App js -->
            <script src="{{  asset('assets/js/app.js') }}"></script>
        <!-- Toast-->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



        <!-- Required Datatable -->
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

        <!-- App js -->
            <script src="{{  asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{  asset('assets/libs/datatables.net-bs4/js/datatables.bootstrap.min.js') }} "></script>


        {{-- Dattable init js   --}}
        <script src="{{  asset('assets/js/pages/datatables.init.js') }}"></script>

        {{-- Validate js   --}}
        <script src="{{  asset('assets/js/validate.min.js') }}"></script>

        @yield('js')

        {{--  Required datatable js  --}}
        <script src="assets/libs/dattables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/dattables.net-bs4/js/datatables.bootstrap.min.js"></script>

        {{-- Dattable init js   --}}
        <script src="assets/js/pages/datatables.init.js"></script>

        {{-- Validate js   --}}
        <script src="assets/js/validate.min.js"></script>

           {{--  <!-- Data Table-->
            $(document).ready(function () {
                $('#dttables').DataTable();
            });  --}}

            <script>
                $('document').ready(function(){
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var network = @json($events);
                    var calendar = $('#calendar').fullCalendar({
                        header:{
                            left:'prev,next today',
                            center:'title',
                            right:'month,agendaWeek,agendaDay'
                        },
                        events: network,
                        selectable:true,
                        selecthelper:true,
                        select: function (start,end,AllDays){
                            $('#network').modal('toggle');

                            $('#saveBtn').click(function(){
                                var title = $('#title').val();
                                var start_date = moment(start).format('YYYY-MM-DD');
                                var end_date = moment(end).format('YYYY-MM-DD');

                                $.ajax({
                                    url:"{{ route('cal.store') }}",
                                    type:"POST",
                                    dataType:'json',
                                    data:{ title, start_date, end_date},
                                    success:function(response)
                                    {
                                        $('#network').modal('hide')
                                        $('#calendar').fullCalendar('renderEvent', {
                                            'title': response.title,
                                            'start_date': response.start_date,
                                            'end_date': response.end_date,
                                        });
                                        calendar.refetchEvents();
                                        {{--  $('#calendar').fullCalendar('refetchEvents');  --}}
                                    },
                                    error:function(errors)
                                    {
                                        if(error.responseJSON.errors){
                                            $('#titleError').html(error.responseJSON.errors.title);
                                        }
                                    }
                                })

                            })

                        }
                    });
                });
            </script>

    </body>

</html>
