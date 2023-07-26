@extends('layouts.master')

@section('title', 'Transaksi')
@section('header', 'Transaksi')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right"
                                autocomplete="off">Buat Transaksi Baru</a>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Nama Pembeli</th>
                                <th>Jumlah Pembelian</th>
                                <th>Keterangan</th>
                                <th><i>Action</i></th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>

                        </div>
        </div>

        {{-- Modal Transaksi --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="POST" autocomplete="off" @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">member</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" :value="data.name" required>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <input type="text" name="gender" class="form-control" :value="data.gender" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" :value="data.email" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" :value="data.phone_number"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="address" class="form-control" :value="data.address" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
 @endsection

    @section('js')

    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js?v=3.2.0')}}"></script>
    
    <script src="{{ asset('AdminLTE/dist/js/demo.js')}}"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>

<script>
    var actionUrl = '{{ url('members') }}';
    var apiUrl = '{{ url('api/members') }}';

    var columns = [{
            data: 'DT_RowIndex',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'name',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'gender',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'email',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'phone_number',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'address',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'date',
            class: 'text-center',
            orderable: true
        },
        {
            render: function(index, row, data, meta) {
                return '\
                    <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ' + meta.row + ')">\
                        Edit\
                    </a>\
                    <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ' + data.id + ')">\
                        Delete\
                    </a>';
            },
            orderable: false,
            width: '200px',
            class: 'text-center'
        },
    ];
</script>

<script src="{{ asset('assets/js/data.js') }}"></script>

<script type="text/javascript">
    $('select[name=gender]').on('change', function(){
        gender = $('select[name=gender]').val();

        if (gender == 0){
            controller.table.ajax.url(apiUrl).load();
        } else {
            controller.table.ajax.url(apiUrl+'?gender='+gender).load()
        }
    });
</script>
        
    @endsection

