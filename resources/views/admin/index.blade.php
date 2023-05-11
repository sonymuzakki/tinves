<!-- FullCalendar -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<style>
    @media (max-width: 767px) {
        /* Gaya untuk perangkat mobile dengan lebar maksimum 767px */
        #calendar {
            width: 100%;
            height: 300px;
        }
        /* Atur gaya lainnya sesuai kebutuhan */
</style>
@extends('admin.admin_master')

@section('admin')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="mb-sm-0">Dashboard</h2>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tinves</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">All Inventory</p>
                            <h4 class="mb-2">{{ $totalinven }}</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class=" ri-mac-line font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">All Users</p>
                            <h4 class="mb-2">{{ $totaluser }}</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-user-3-line font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">All Request</p>
                            <h4 class="mb-2">{{ $totalreq }}</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-file-text-line font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">All Request Proses</p>
                            <h4 class="mb-2">{{ $totalreqpen }}</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-success rounded-3">
                                <i class="ri-file-history-fill font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

    <!-- Datatable Support-->
    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-body">

                    {{--  <a href="{{ route('request.all') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right width=">View More</a><br></br>  --}}

                    <h4>Request Proses Data</h4>
                    <table id="scroll" class="table dt-responsive nowrap w-100" style="border-collapse:collapse;border-spacing:0; width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Jenis</th>
                                <th>Laporan</th>
                                <th>Tanggal</th>
                                <th>Proses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($allData as $key => $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $item['inventory']['user']['name'] }}</td>
                                    <td>{{ $item['inventory']['jenis']['nama'] }}</td>
                                    <td>{{ $item->laporan}}</td>
                                    {{--  <td>{{ $item->created_at->format('l\,d-m-Y h:i')}}</td>  --}}
                                    <td>{{ $item->created_at->format('d-M-Y h:i')}}</td>
                                    <td>
                                        @if ($item->status == "0")
                                            <button type="button" class="btn btn-warning waves-effect waves-light">
                                                <i class="ri-error-warning-line align-middle me-2"></i>
                                            </button>
                                        @elseif ($item->status == "1")
                                            <button type="button" class="btn btn-success waves-effect waves-light">
                                                <i class="ri-check-line align-middle me-2"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == '0')
                                        <a href="{{ route('history.proses', $item->id) }}" class="btn btn-danger sm" title="Proses"> <i class="ri-donut-chart-fill"></i></a>
                                        <a href="{{ route('history.approvedsh' , $item->id )}}" class="btn btn-info sm" title="Approved" id="ApprovedBtn"> <i class="fas fa-check-circle"></i></a>
                                        @elseif ($item->status == '1')
                                            <h5 class="container"> - </h5>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h4>Notes</h4>
                    <table id="tableScroll" class="table dt-responsive nowrap w-100" style="border-collapse:collapse;border-spacing:0; width:100%;">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($notes as $key => $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->created_at->format('d-M-Y h:i')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- FullCalendar-->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 style="border-bottom: 1px solid #000 padding-bottom:2px margin-bottom:10px">Monitoring Peripheral</h4><br>
                    <div id="calendar" style="width: 100%; height: 85%;"></div>
                </div>
            </div>
        </div>
    </div>

</div>

@section('js')
<!-- FullCalendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Datatables -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>

<!-- Js Fullcalendar -->
    <script type="text/javascript">
        $(document).ready(function () {

            /*------------------------------------------
            --------------------------------------------
            Get Site URL
            --------------------------------------------
            --------------------------------------------*/
            var SITEURL = "{{ url('/') }}";

            /*------------------------------------------
            --------------------------------------------
            CSRF Token Setup
            --------------------------------------------
            --------------------------------------------*/
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*------------------------------------------
            --------------------------------------------
            FullCalender JS Code
            --------------------------------------------
            --------------------------------------------*/
            var calendar = $('#calendar').fullCalendar({
                            editable: true,
                            events: SITEURL + "/fullcalender",
                            displayEventTime: false,
                            editable: true,
                            eventRender: function (event, element, view) {
                                if (event.allDay === 'true') {
                                        event.allDay = true;
                                } else {
                                        event.allDay = false;
                                }
                            },
                            selectable: true,
                            selectHelper: true,
                            select: function (start, end, allDay) {
                                var title = prompt('Event Title:');
                                if (title) {
                                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                    $.ajax({
                                        url: SITEURL + "/fullcalenderAjax",
                                        data: {
                                            title: title,
                                            start: start,
                                            end: end,
                                            type: 'add'
                                        },
                                        type: "POST",
                                        success: function (data) {
                                            displayMessage("Event Created Successfully");

                                            calendar.fullCalendar('renderEvent',
                                                {
                                                    id: data.id,
                                                    title: title,
                                                    start: start,
                                                    end: end,
                                                    allDay: allDay
                                                },true);

                                            calendar.fullCalendar('unselect');
                                        }
                                    });
                                }
                            },
                            eventDrop: function (event, delta) {
                                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                                $.ajax({
                                    url: SITEURL + '/fullcalenderAjax',
                                    data: {
                                        title: event.title,
                                        start: start,
                                        end: end,
                                        id: event.id,
                                        type: 'update'
                                    },
                                    type: "POST",
                                    success: function (response) {
                                        displayMessage("Event Updated Successfully");
                                    }
                                });
                            },
                            eventClick: function (event) {
                                var deleteMsg = confirm("Do you really want to delete?");
                                if (deleteMsg) {
                                    $.ajax({
                                        type: "POST",
                                        url: SITEURL + '/fullcalenderAjax',
                                        data: {
                                                id: event.id,
                                                type: 'delete'
                                        },
                                        success: function (response) {
                                            calendar.fullCalendar('removeEvents', event.id);
                                            displayMessage("Event Deleted Successfully");
                                        }
                                    });
                                }
                            }

                        });

            });

            /*------------------------------------------
            --------------------------------------------
            Toastr Success Code
            --------------------------------------------
            --------------------------------------------*/
            function displayMessage(message) {
                toastr.success(message, 'Event');
            }

    </script>

<!-- Js Table scroll -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tableScroll').DataTable({
            "scrollY": "80vh",
            "scrollCollapse": true,
            "lengthChange": false,
            "paging":false,
            });
            $('.dataTables_length').addClass('bs-select');
        });
        $(document).ready(function () {
            $('#scroll').DataTable({
                "scrollY": "80vh",
                "scrollCollapse": true,
                "lengthChange": false,
                "paging":false,
            });
            $('.dataTables_length').addClass('bs-select');
            });
    </script>

@endsection
@endsection
