

@extends('admin.admin_master')
@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Printer Add</h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Pages</a></li>
                    <li class="breadcrumb-item active">Printer
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

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="col-sm-6 col-form-label">User</label>
                            <div class="form-group col-sm-10">
                                <select class="form-control select2" name="user_id">
                                    @foreach ($user as $inv)
                                        <option value="{{ $inv->id }}">{{ $inv->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <label class="col-sm-6 col-form-label">Jenis</label>
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

                    <div class="div">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Merk</label>
                                        <input type="text" name="deskripsi" class="form-control" id=""
                                            placeholder="Deskripsi" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                          <label class="form-label">Default Functionality</label>
                          <div class="input-group" id="datepicker1">
                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                              data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                          <label class="form-label">Default Functionality</label>
                          <div class="input-group" id="datepicker1">
                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                              data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                          <label class="form-label">Default Functionality</label>
                          <div class="input-group" id="datepicker1">
                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                              data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                          <label class="form-label">Default Functionality</label>
                          <div class="input-group" id="datepicker1">
                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                              data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                          </div>
                        </div>
                    </div>

                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
