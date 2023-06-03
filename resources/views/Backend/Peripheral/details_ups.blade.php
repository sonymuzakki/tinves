@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">ups Details</h3><br></br><hr>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Pages</a></li>
                    <li class="breadcrumb-item active">ups
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
                <form method="POST" action="" enctype="multipart/from-data" id="myForm">
                    @csrf


                    <div class="col-12 mb-3">
                        <label class="col-sm-12 col-form-label">User</label>
                        <div class="form-group col-sm-12">
                            <select class="form-control select2" name="user_id" disabled>
                                @foreach ($users as $inv)
                                    <option value="{{ $inv->id }}">{{ $inv->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="col-sm-12 col-form-label">Jenis</label>
                        <div class="form-group col-sm-12 mb-4">
                            <select name="jenis_id" class="form-select" aria-label="Default select example" disabled>
                                <option selected="">Open this select menu</option>
                                @foreach($jenis as $j)
                                    <option value="{{ $j->id }}" {{ $j->id == $ups->jenis_id ? 'selected' : '' }} >{{ $j->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                        <div class="row">
                            <div class="mb-4">
                                <label class="form-label">Tahun Pembelian</label>
                                <div class="input-group" id="datepicker1">
                                    <input type="text" class="form-control" name="tanggal" value="{{ date('d-m-Y', strtotime($ups->tanggal)) }}" placeholder="dd M, yyyy"
                                    data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker" disabled>
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                    <div class="div">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-4">
                                    <label for="" class="form-label">Merk</label>
                                        <input type="text" name="merk" value="{{ $ups->merk }}" class="form-control" id=""
                                            placeholder="Merk" value="" required disabled>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <input type="submit" class="btn btn-info waves waves-effect waves-light mb-7" value="Submit">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi datepicker
        $('#datepicker1 input').datepicker({
            autoclose: true // Menutup kalender setelah memilih tanggal
        });
    });

</script>
@endsection
@endsection

