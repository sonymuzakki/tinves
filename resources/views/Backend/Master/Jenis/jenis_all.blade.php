@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Master Jenis</h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Jenis
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

                <a href="{{ route('jenis.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Jenis</a> <br>

                <h4>Jenis All Data</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Jenis</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            {{--  @php
                                $no = 1;
                            @endphp  --}}
                            @foreach ($jenis as $key => $item)
                            <tr>
                                <td>{{ 'J-' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                     <a href="{{ route('jenis.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                     <a href="{{ route('jenis.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                     {{--  <a href="{{ route('jenis.details', $item->id) }}" class="btn btn-danger sm" title="Details" > <i class="fa thin fa-info"></i></a>  --}}
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
