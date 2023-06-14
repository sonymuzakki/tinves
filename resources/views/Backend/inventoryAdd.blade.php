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

                    <div class="row">

                        <!-- User Dan Jenis -->
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
                                <div class="form-group col-sm-10 mb-3">
                                    <select name="jenis" id="payFor" class="form-select" aria-label="Default select example">
                                        <option default disabled selected value="">Open this select menu</option>
                                        <option value="PC">PC</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="printer">Printer</option>
                                        <option value="ups">UPS</option>
                                    </select>
                                </div>
                        </div>

                        <!-- PC -->
                        <div id="PC" style="display: none;">
                            <div class="row">
                                <div class="row">
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
                                                        </select>
                                                </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-6">
                                                <label class="form-label">Tahun Pembelian</label>
                                                <div class="input-group" id="datepicker1">
                                                    <input type="text" class="form-control" name="tanggal" placeholder="dd M, yyyy"
                                                    data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        <div class="col-6">
                                            <label for="text" class="col-sm-2 col-form-label">AkunOffice</label>
                                            <div class="form-group col-11">
                                                <input name="akunOffice" class="form-control" type="text"  placeholder="" id="text">
                                            </div>
                                        </div>
                                    </div>

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
                                    <div class="div">
                                        <div class="mb-4">
                                            <label class="form-label">Tahun Pembelian</label>
                                            <div class="input-group" id="datepicker1">
                                                <input type="text" class="form-control" name="tanggal" placeholder="dd M, yyyy"
                                                data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                    </div>
                                    <!-- end row -->



                                </div>
                            </div>
                        </div>

                        <!-- Printer -->
                        <div id="printer" style="display: none;">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                                    <div class="form-group col-11">
                                        <input name="merk" class="form-control" type="text" placeholder="" id="merk">
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                    <label class="form-label">Tahun Pembelian</label>
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" class="form-control" name="tanggal" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    {{--  <div class="row">
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
                    <!-- end row -->  --}}


                    {{-- <div class="col-3">
                        <label class="col-sm-2 col-form-label">Jenis</label>
                            <div class="form-group col-sm-10">
                                <select name="jenis_id" id="jenis_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach($jenis as $j)
                                    <option value="{{ $j->id }}"> {{ $j->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div> --}}
                    {{-- <div class="col-3">
                        <label class="col-sm-2 col-form-label">Jenis</label>
                        <div class="form-group col-sm-10 mb-3">
                            <select name="jenis_id" id="payFor" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                <option value="PC">PC</option>
                                <option value="Laptop">Laptop</option>
                                <option value="printer">Printer</option>
                                <option value="printer">UPS</option>
                            </select>
                    </div> --}}
                    {{-- <label for="payFor">Jenis</label>
                    <select name="payFor" id="payFor">
                        <option disabled selected value>-</option>
                        <option value="service">Service</option>
                        <option value="product">Product</option>
                    </select> --}}
                    {{-- <div style="display: none;" id="PC">
                        <select name="serviceId">
                        <option disabled selected value>-</option>
                        <option value="service1">service 1</option>
                        <option value="service2">service 2</option>
                        </select>

                        <div class="div">
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
                    </div> --}}

                    <div style="display: none;" id="printer">
                        <select name="productId">
                        <option disabled selected value>-</option>
                        <option value="product1">product 1</option>
                        <option value="product2">product 2</option>
                        </select>

                        <div class="div">
                            <div class="col-6">
                                <label class="col-6 col-form-label">AMP ?</label>
                                    <div class="form-group col-11">
                                        <select name="umbrella" class="form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            <option value="Yes">Yes </option>
                                            <option value="NO">NO </option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div>


                    {{--<div class="col-3" id="jenis_id">
                            <label class="col-sm-2 col-form-label">Jenis</label>
                                <div class="form-group col-sm-10">
                                    <select name="jenis_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        <option value="printer">printer</option>
                                        <option value="pc">pc</option>
                                    </select>
                                </div>
                        </div>  --}}
                        {{--  <div class="row">
                            <div class="col-3">
                                <label class="col-sm-2 col-form-label">Jenis</label>
                                <div class="form-group col-sm-10">
                                    <select name="jenis_id" id="jenis_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach($jenis as $j)
                                            <option value="{{ $j->id }}"> {{ $j->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>  --}}

                        {{--  <div id="printerFields" style="display: none;">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                                    <div class="form-group col-11">
                                        <input name="merk" class="form-control" type="text" placeholder="" id="merk">
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="tanggal_pembelian" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                                    <div class="form-group col-11">
                                        <input name="tanggal_pembelian" class="form-control" type="date" placeholder="" id="tanggal_pembelian">
                                    </div>
                                </div>
                            </div>
                        </div>  --}}

                    <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>
@section('js')
{{--  <script type="text/javascript">
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

</script>  --}}

<script>
    document.getElementById('payFor').addEventListener("change", function (e) {
    if (e.target.value === 'printer') {
        document.getElementById('PC').style.display = 'none';
        document.getElementById('printer').style.display = 'block';
    } else {
        document.getElementById('printer').style.display = 'none';
        document.getElementById('PC').style.display = 'block'
    }


});
</script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi datepicker
        $('#datepicker1 input').datepicker({
            autoclose: true // Menutup kalender setelah memilih tanggal
        });
    });
</script>

{{-- <script>
    document.getElementById('payFor').addEventListener("change", function (e) {
        var selectedValue = e.target.value;
        if (selectedValue === 'printer') {
            document.getElementById('PC').style.display = 'none';
            document.getElementById('printer').style.display = 'block';
        } else {
            document.getElementById('printer').style.display = 'none';
            document.getElementById('PC').style.display = 'block';
        }
    });
</script> --}}
{{--  <script>
    $(document).ready(function() {
        // Listen for changes in the "Jenis" select menu
        $('#jenis_id').on('change', function() {
            var selectedOption = $(this).val();

            // Hide all form fields
            $('#printerFields').hide();

            // Show form fields based on selected option
            if (selectedOption === 'PRINTER') {
                $('#printerFields').show();
            }
        });
    });
</script>  --}}
@endsection

@endsection
