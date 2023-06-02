@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">List Printer</h3><br></br><hr>

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

<!-- Datatable Printer-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ route('add-printer') }}" class="btn btn-dark btn-rounded waves-effect waves-light"
                    style="float:right">Add Printer</a><br>
                <h4>Printer List Data</h4>
                <table id="printer-table" class="table .table-responsive table-bordered dt-responsive" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Users</th>
                            <th>Jenis</th>
                            <th>Merk</th>
                            <th>Tanggal Pembelian</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                </table>
            </div>
        </div>
    </div>
</div>

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="text/javascript">
    $(function (){
        $('#printer-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('index_printer') }}',
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'user.name', name: 'user.name'},
                {data: 'jenis.nama', name: 'jenis.nama'},
                {data: 'merk', name: 'merk'},
                {data: 'tanggal', name: 'tanggal',
                render: function(data, type, full, meta) {
                    // Mengubah format tanggal menggunakan moment.js
                    var formattedDate = moment(data).format('DD MMM, YYYY');
                    return formattedDate;
                }},
                {data: 'action', name: 'action'},

            ],

            createdRow: function(row, data, dataIndex) {
                var id = data.id;
                // mengubah id menjadi format "I-000X"
                var formattedId = "I-" + ("" + id).slice(-3);
                // mengubah isi sel pada kolom ID
                $('td:eq(0)', row).html(formattedId);

                // menambahkan tombol Edit dan Delete
                var actionBtns = '<a href="/edit-printer-' + data.id + '" class="btn btn-success btn-sm mr-2" style="margin-right: 4px;"> <i class="fas fa-edit"></i></a>' +
                                 '<a href="/delete-printer-' + data.id + '" class="btn btn-danger btn-sm" style="margin-right: 4px;"> <i class="fas fa-trash-alt"></i></a>' +
                                 '<a href="/InventarisDetails-' + data.id + '" class="btn btn-info btn-sm" style="margin-right: 4px;"> <i class="fa thin fa-info"></i></a>';
                $('td:eq(5)', row).html(actionBtns);
            }
        });
    });
</script>
@endsection

@endsection
