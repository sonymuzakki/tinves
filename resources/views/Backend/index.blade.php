@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">List Inventory</h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Pages</a></li>
                    <li class="breadcrumb-item active">Inventory
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Datatable Inventory-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ route('invetaris.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Inventory</a>

                <h4>Inventory All Data</h4>
                <table id="inventory-table" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Hostname</th>
                            <th>User</th>
                            <th>Jenis</th>
                            <th>Divisi</th>
                            <th>Lokasi</th>
                            <th width="4%" class="text-center">Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

@section('js')
<script type="text/javascript">
    $(function (){
        $('#inventory-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('index_json') }}',
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'hostname', name: 'hostname', visible:false, searchable:true},
                {data: 'user.name', name: 'user.name'},
                {data: 'jenis.nama', name: 'jenis.nama'},
                {data: 'divisi.nama', name: 'divisi.nama'},
                {data: 'lokasi.nama', name: 'lokasi.nama'},
                {data: 'action', name: 'action'},
                {data: 'merk', name: 'merk', visible:false, searchable:true},
                {data: 'Processor', name: 'Processor', visible:false, searchable:true},
                {data: 'ram', name: 'ram', visible:false, searchable:true},
                {data: 'grafik', name: 'grafik', visible:false, searchable:true},
                {data: 'hardisk', name: 'hardisk', visible:false, searchable:true},
                {data: 'ssd', name: 'ssd', visible:false, searchable:true},
                {data: 'os', name: 'os', visible:false, searchable:true},
                {data: 'Office', name: 'Office', visible:false, searchable:true},
                {data: 'akunOffice', name: 'akunOffice', visible:false, searchable:true},
                {data: 'legalos', name: 'legalos', visible:false, searchable:true},
                {data: 'internet', name: 'internet', visible:false, searchable:true},
                {data: 'ipaddress', name: 'ipaddress', visible:false, searchable:true},
                {data: 'amp', name: 'amp', visible:false, searchable:true},
                {data: 'umbrella', name: 'umbrella', visible:false, searchable:true},
                {data: 'anydeskid', name: 'anydeskid', visible:false, searchable:true},
            ],

            createdRow: function(row, data, dataIndex) {
                var id = data.id;
                // mengubah id menjadi format "I-000X"
                var formattedId = "I-" + ("" + id).slice(-3);
                // mengubah isi sel pada kolom ID
                $('td:eq(0)', row).html(formattedId);

                // menambahkan tombol Edit dan Delete
                var actionBtns = '<a href="/InventarisEdit-' + data.id + '" class="btn btn-success btn-sm mr-2" style="margin-right: 4px;"> <i class="fas fa-edit"></i></a>' +
                                 '<a href="/InventarisDelete-' + data.id + '" class="btn btn-danger btn-sm" style="margin-right: 4px;"> <i class="fas fa-trash-alt"></i></a>' +
                                 '<a href="/InventarisDetails-' + data.id + '" class="btn btn-info btn-sm" style="margin-right: 4px;"> <i class="fa thin fa-info"></i></a>';
                $('td:eq(5)', row).html(actionBtns);
            }
        });
    });
</script>
@endsection

@endsection
