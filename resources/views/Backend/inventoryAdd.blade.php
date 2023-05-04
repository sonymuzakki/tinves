@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Inventory Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Inventaris</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Start Page  -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('invetaris.store') }}" enctype="multipart/from-data" id="myForm">
                    @csrf

                    {{--  <input type="hidden" name="id" value="{{ $inventory_id->id }}"  --}}
                    {{--  <div class="row">
                        <div class="col-6  mb-2">
                            <label  for="ExampleInputEmail" class="form-label">Pengguna</label>
                                <select class="form-control" name="idu" aria-label="Default Select example ">
                                    <option></option>
                                    @foreach ($users as $user )
                                        <option value="{{ $user->idu }}" {{ $user->idu == $user->idu? 'selected="selected"' : ' ' }}>{{ $user->nama}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-6 mb-2">
                            <label  for="ExampleInputEmail" class="form-label">Is Legal OS</label>
                            <select class="form-control" name="isLegalOs" aria-label="Default Select example"disabled>
                              <option>{{ $data->isLegalos }}</option>
                              <option value="1">YES</option>
                              <option value="2">NO</option>
                            </select>
                        </div>
                    </div>  --}}

                    <div class="row">
                        <div class="col-3 mb-2">
                            <label class="col-sm-2 col-form-label">User</label>
                                <div class="form-group col-sm-10">
                                        <select class="form-control select2" name="user_id">
                                            @foreach ($user as $inv)
                                                <option value="{{ $inv->id }}">{{ $inv->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>

                        <div class="col-3">
                            <label class="col-sm-2 col-form-label">Jenis</label>
                                <div class="form-group col-sm-10">
                                    <select name="jenis_id" class="form-select" aria-label="Default select example">
                                        {{--  <select class="form-control select" name="jenis_id" onchange="jenisChanged()">  --}}

                                        <option selected="">Open this select menu</option>
                                        @foreach($jenis as $j)
                                        <option value="{{ $j->id }}"> {{ $j->nama }}</option>
                                    @endforeach
                                        </select>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Hostname</label>
                            <div class="form-group col-11">
                                <input name="hostname" class="form-control" type="text"  placeholder="" id="text">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="col-6">
                            <label class="col-6 col-form-label">OS </label>
                                <div class="form-group col-11">
                                    <select name="os" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                        <option value="WIN 11">WIN 11 </option>
                                        <option value="WIN 10">WIN 10 </option>
                                        <option value="WIN 7">WIN 7 </option>
                                        <option value="WINDOWS SERVER">WINDOWS SERVER </option>
                                        </select>
                                </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Merk</label>
                            <div class="form-group col-11">
                                <input name="merk" class="form-control" type="text" " placeholder="" id="text">
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="col-6 col-form-label">Office </label>
                                <div class="form-group col-11">
                                    <select name="Office" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                        <option value="OHS 2021">OHS 2021 </option>
                                        <option value="OHS 2019">OHS 2019 </option>
                                        <option value="WPS">WPS </option>
                                        {{--  <option value=""> </option>  --}}
                                        </select>
                                </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Processor</label>
                            <div class="form-group col-11">
                                <input name="Processor" class="form-control" type="text" " placeholder="" id="text">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="text" class="col-sm-2 col-form-label">AkunOffice</label>
                            <div class="form-group col-11">
                                <input name="akunOffice" class="form-control" type="text"  placeholder="" id="text">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">RAM</label>
                            <div class="form-group col-11">
                                <input name="ram" class="form-control" type="text"  placeholder="" id="text">
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">SSD</label>
                            <div class="form-group col-11">
                                <input name="ssd" class="form-control" type="text" placeholder="" id="text">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Grafik</label>
                            <div class="form-group col-11">
                                <input name="grafik" class="form-control" type="text"  placeholder="" id="text">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-6 col-form-label">Legal OS ?</label>
                                <div class="form-group col-11">
                                    <select name="legalos" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                        <option value="Yes">Yes </option>
                                        <option value="NO">NO </option>
                                        </select>
                                </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Hardisk</label>
                            <div class="form-group col-11">
                                <input name="hardisk" class="form-control" type="text"  placeholder="" id="text">
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-6 col-form-label">Internet?</label>
                                <div class="form-group col-11">
                                    <select name="internet" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                        <option value="Yes">Yes </option>
                                        <option value="NO">NO </option>
                                        </select>
                                </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="col-6 col-form-label">Security AMP ?</label>
                                <div class="form-group col-11">
                                    <select name="amp" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                        <option value="Yes">Yes </option>
                                        <option value="NO">NO </option>
                                        </select>
                                </div>
                        </div>
                        <div class="col-6">
                            <label class="col-6 col-form-label">Security Umbrella ?</label>
                                <div class="form-group col-11">
                                    <select name="umbrella" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                        <option value="Yes">Yes </option>
                                        <option value="NO">NO </option>
                                        </select>
                                </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Ip Address</label>
                            <div class="form-group col-11">
                                <input name="ipaddress" class="form-control" type="text"  placeholder="" id="text">
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Anydesk ID</label>
                            <div class="form-group col-11">
                                <input name="anydeskid" class="form-control" type="text"  placeholder="" id="text">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">

                        </div>
                    </div>


                    <div class="row mb-3">

                    </div>
                    <!-- end row -->





                    <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">

                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>
@section('js')
{{--  <script type="text/javascript">
    $(document).ready(function(){
        $('#myform').validate({
            rules:{
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
            messages : {
                hostname : {
                    required : 'Please enter your name'
                },
                ram : {
                    required : 'Please enter your ram'
                },
                hardisk : {
                    required : 'Please enter your hardisk'
                },
            },
            errorElement : 'span'
            errorPlacement : function (error,element) {
                error.addClass('invalid--feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element , errorClass , validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element,errorClass,validClass){
                $(element).removeClass('is-invalid')
            },
        });
    });
</script>  --}}

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                user_id: {
                    required : true,
                },
                lokasi_id: {
                    required : true,
                },
                divisi_id: {
                    required : true,
                },
                jenis_id: {
                    required : true,
                },
                hostname: {
                    required : true,
                },
                merk: {
                    required : true,
                },
                Processor: {
                    required : true,
                },
                grafik: {
                    required : true,
                },
                ssd: {
                    required : true,
                },
                os: {
                    required : true,
                },
                Office: {
                    required : true,
                },
                akunOffice: {
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
                user_id: {
                    required : 'Please Enter Your User',
                },
                lokasi_id: {
                    required : 'Please Enter Your Lokasi',
                },
                divisi_id: {
                    required : 'Please Enter Your Divisi',
                },
                jenis_id: {
                    required : 'Please Enter Your Jenis',
                },
                hostname: {
                    required : 'Please Enter Your Hostname',
                },
                merk: {
                    required : 'Please Enter Your merk',
                },
                Processor: {
                    required : 'Please Enter Your Processor',
                },
                grafik: {
                    required : 'Please Enter Your grafik',
                },
                ssd: {
                    required : 'Please Enter Your ssd',
                },
                os: {
                    required : 'Please Enter Your os',
                },
                akunOffice: {
                    required : 'Please Enter Your AkunOffice',
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

<script>
    function jenisChanged() {
        var jenis = document.getElementsByName("jenis")[0].value;
        if (jenis === "printer") {
            document.getElementById("merkInput").style.display = "block";
            document.getElementsByName("os")[0].style.display = "none";
        } else {
            document.getElementById("merkInput").style.display = "block";
            document.getElementsByName("os")[0].style.display = "block";
        }
    }
</script>

@endsection

@endsection
