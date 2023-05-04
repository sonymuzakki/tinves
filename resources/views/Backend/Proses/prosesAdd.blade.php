@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Proses add Page</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Proses</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('proses.store') }}" enctype="multipart/from-data" id="myForm">
                    @csrf

                    <div class="row mb-3">

                        <label class="col-sm-2 col-form-label">User</label>
                        <div class="form-group col-sm-10">
                            <select name="request_id"class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach($history as $h)
                                <option value="{{ $h->id }}">{{ $h->inventory->user->name}}</option>
                               @endforeach
                                </select>
                        </div>
                    </div>
                    {{--  <div class="row mb-3">

                        <label class="col-sm-2 col-form-label">User</label>
                        <div class="form-group col-sm-10">
                            <select name="history_id"class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach($inventory as $i)
                                <option value="{{ $i->id }}">{{ $i->user->name}}</option>
                            @endforeach
                                </select>
                        </div>
                    </div>  --}}

                    <div class="row mb-4">
                        <label for="text" class="col-2 col-form-label">Kendala</label>
                        <div class="form-group col-10">
                            <input name="kendala" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="text" class="col-2 col-form-label">Pengerjaan</label>
                        <div class="form-group col-10">
                            <input name="pengerjaan" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="text" class="col-2 col-form-label">Status</label>
                        <div class="form-group col-10">
                            <input name="status" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>



                    {{--  <div class="row mb-4">
                    <label class="col col-form-label">Single Select</label>
                        <div class="form-group col-10">
                        <select name="inventory_id" class="form-control select2">
                            <option>Select</option>
                            <optgroup label="">
                                @foreach($inventory as $i)
                                <option value="{{ $i->id }}">{{ $i->user->name}}</option>
                               @endforeach
                            </optgroup>
                        </select>
                        </div>
                    </div>  --}}

                {{--  <div class="row mb-4">
                    <label for="text" class="col-2 col-form-label">Laporan</label>
                    <div class="form-group col-10">
                        <input name="laporan" class="form-control" type="text" placeholder="" id="text">
                    </div>
                </div>  --}}

                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                hostname: {
                    required : true,
                },
                ram: {
                    required : true,
                },
                hardisk: {
                    required : true,
                },
            },
            messages :{
                hostname: {
                    required : 'Please Enter Your Hostname',
                },
                ram: {
                    required : 'Please Enter Your Ram',
                },
                hardisk: {
                    required : 'Please Enter Your hardisk',
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

</script>

@endsection
