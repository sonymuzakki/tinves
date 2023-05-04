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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('request.all') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">View More</a> <br>

                    <h4>Request Proses Data</h4>
                    <table id="" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>User</th>
                                <th>Jenis</th>
                                <th>Laporan</th>
                                <th>Tanggal</th>
                                <th>Proses</th>
                                <th width="20%">Action</th>
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
                                         {{--  <a href="{{ route('lokasi.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                         <a href="{{ route('lokasi.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>  --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--  <!-- Datatable Notes -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('request.all') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">View More</a> <br></br>

                    <h4>Request Proses Data</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>User</th>
                                <th>Jenis</th>
                                <th>Laporan</th>
                                <th>Tanggal</th>
                                <th>Proses</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($allData as $key => $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $item['inventory']['user']['name'] }}</td>
                                    <td>{{ $item['inventory']['jenis']['nama'] }}</td>
                                    <td>{{ $item->laporan}}</td>
                                    <td>{{ $item->created_at->format('d-M-Y h:i')}}</td>
                                    <td>
                                        @if ($item->status == "0")
                                            <button type="button" class="btn btn-warning waves-effect waves-light">
                                                <i class="ri-error-warning-line align-middle me-2"></i> Pending
                                            </button>
                                        @elseif ($item->status == "1")
                                            <button type="button" class="btn btn-success waves-effect waves-light">
                                                <i class="ri-check-line align-middle me-2"></i> Success
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
    </div>
    <!-- end row -->  --}}

</div>
@endsection
