@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Request Support</h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Request
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ route('request.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Request</a><br></br>

                <h4>Request All Data</h4>
                <table id="datatable" class="table table-responsive dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Jenis</th>
                            <th>Laporan</th>
                            <th>Kendala</th>
                            <th>Pengerjaan</th>
                            <th>Tanggal</th>
                            <th>Proses</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($history as $key => $item)
                            <tr>
                                <td>{{ 'R-' . str_pad($loop->iteration, 4, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item['inventory']['user']['name'] }}</td>
                                <td>{{ $item['inventory']['jenis']['nama'] }}</td>
                                <td>{{ $item->laporan}}</td>
                                <td>{{ $item->kendala}}</td>
                                <td>{{ $item->pengerjaan}}</td>
                                <td>{{ $item->created_at->format('d-M-Y ')}}</td>
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

                                {{--  <td>
                                        @if ($item->status == 1)
                                        @php $warna = 'success' @endphp
                                    @else
                                        @php $warna = 'danger' @endphp
                                    @endif
                                    <span class="badge badge-pill badge-{{ $warna }}">
                                        {{ $item->status }}
                                </span>
                                </td>  --}}

                                <td>
                                    @if ($item->status == '0')
                                        <a href="{{ route('history.proses', $item->id) }}" class="btn btn-danger sm" title="Proses"> <i class="ri-donut-chart-fill"></i></a>
                                        <a href="{{ route('history.approve' , $item->id )}}" class="btn btn-info sm" title="Approved" id="ApprovedBtn"> <i class="fas fa-check-circle"></i></a>
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

@endsection
