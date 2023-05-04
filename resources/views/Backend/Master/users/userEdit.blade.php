@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{--  <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Divisi add Page</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Divisi</li>
                </ol>
            </div>
        </div>
    </div>
</div>  --}}
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Users add Page</h4>
                </div>
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id"  value="{{ $user->id }}" >
                    <div class="row mb-3">
                        <label for="text" class="col-2 col-form-label">Users</label>
                        <div class="form-group col-10">
                            <input name="name" class="form-control" type="text" value="{{ $user->name }}" placeholder=""                                id=" text">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="text" class="col-2 col-form-label">Username</label>
                        <div class="form-group col-10">
                            <input name="username" class="form-control" type="text" value="{{ $user->username }}" placeholder=""                                id=" text">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Divisi</label>
                        <div class="form-group col-sm-10">
                            <select name="divisi_id" class="form-select" aria-label="Default select example">
                                @foreach ($divisi as $role)
                                    <option value="{{ $role->id }}" {{ $user->divisi_id == $role->id ? 'selected' : '' }}>{{ $role->nama }}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="form-group col-sm-10">
                            <select name="lokasi_id" class="form-select" aria-label="Default select example">
                                @foreach ($lokasi as $role)
                                    <option value="{{ $role->id }}" {{ $user->lokasi_id == $role->id ? 'selected' : '' }}>{{ $role->nama }}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Update">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#myForm').validate({
        rules: {
            nama: {
                required: true,
            },
        },
        messages: {
            nama: {
                required: 'Please Enter Your Nama Divisi',
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });
});
</script>

@endsection
