@extends('layouts.master')

@section('title', 'Buat User')
@section('header', 'Buat User')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right"
                    autocomplete="off">Buat User Baru</a>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Email</th>
                                <th>Nomer Telp</th>
                                <th>Alamat</th>
                                <th><i>Action</i></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

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
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    
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

<script type="text/javascript">
    var actionUrl = '{{ url('books') }}';
    var apiUrl = '{{ url('api/books') }}';

    var app = new Vue({
        el: '#controller',
        data: {
            books: [],
            search: '',
            book: {},
            editStatus: false
        },
        mounted: function() {
            this.get_books();
        },
        methods: {
            get_books() {
                const _this = this;
                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(data) {
                        _this.books = JSON.parse(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            },
            addData() {
                this.book = {};
                this.editStatus = false;
                $('#modal-default').modal();
            },
            editData(book) {
                this.book = book;
                this.actionUrl = '{{ url('books') }}' + '/' + book.id;
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(id) {
                this.actionUrl = '{{ url('books') }}' + '/' + id;
                if (confirm("Are you sure?")) {
                    axios.post(this.actionUrl, {
                        _method: 'DELETE'
                    }).then(response => {
                        location.reload();
                    });
                }
            },
            numberWithSpaces(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        },
        computed: {
            filteredList() {
                return this.books.filter(book => {
                    return book.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        }
    });
</script>
        
    @endsection
