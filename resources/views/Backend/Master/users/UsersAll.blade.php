@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Manage Users</h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Users
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

                <a href="{{ route('user.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Users</a> <br>

                <h4>user All Data</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th width="15%">Divisi</th>
                            <th width="15%">Lokasi</th>
                            {{--  <th>Password</th>  --}}
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            {{--  @php
                                $no = 1;
                            @endphp  --}}
                            @foreach ($user as $key => $item)
                            <tr>
                                <td>{{ 'U-' . str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item['divisi']['nama']}}</td>
                                <td>{{ $item['lokasi']['nama']}}</td>
                                {{--  <td>{{ $item->password_plain }}</td>  --}}

                                <td>
                                     <a href="{{ route('user.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                     <a href="{{ route('user.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
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
