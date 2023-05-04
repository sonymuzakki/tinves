@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h2 class="mb-sm-0">Form Inventaris</h2><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Form Inventaris
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form method="post" action="storeInventaris" enctype="multipart/from-data">
                    @csrf
                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">Hostname</label>
                    <div class="col-8">
                        <input name="hostname" class="form-control" type="text" placeholder="" id="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">Ram</label>
                    <div class="col-8">
                        <input name="ram" class="form-control" type="text" placeholder="" id="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">Hardisk</label>
                    <div class="col-8">
                        <input name="hardisk" class="form-control" type="text" placeholder="" id="text">
                    </div>
                </div>

                {{--  <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-8">
                        <input name="username" class="form-control" type="text" placeholder="Username" id="text">
                    </div>
                </div>  --}}

                {{--  <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">User Email</label>
                    <div class="col-8">
                        <input name="email" class="form-control" type="email" placeholder="Nama" id="text">
                    </div>
                </div>  --}}

                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Update Profile">
                </form>

                {{--  <form>
                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-8">
                        <input name="email" class="form-control" type="email" placeholder="Nama" id="text">
                    </div>
                </div>
                </form>  --}}
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
