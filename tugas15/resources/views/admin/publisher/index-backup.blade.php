@extends('layouts.layouts')
@section('header', 'Publisher')
@section('css')
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<div id="controller">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" @click="addData()">
                Create publisher
            </button>
        </div>

        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Books</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $key => $publisher)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->email }}</td>
                            <td class="text-center">{{ $publisher->phone_number }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td class="text-center">{{ count($publisher->books) }}</td>
                            <td class=" justify-content-center">
                                <div class="action row" style="width: 130px">
                                    <a class="btn btn-warning btn-sm col-sm-4 m-1" href="#" @click="editData({{$publisher}})">Edit</a>
                                    <a class="btn btn-danger btn-sm col-sm-6 m-1" href="#" @click="deleteData({{ $publisher->id }})"> Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {{-- {{ $publishers->links() }} --}}
        </div>
    </div>
    <div class="modal fade" id="Publisher" tabindex="-1" role="dialog" aria-labelledby="formPublisher" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Publisher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control" name="name" :value="data.name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email" class="form-control" name="email" :value="data.email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label >Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" :value="data.phone_number" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label >Address</label>
                            <input type="text" class="form-control" name="address" :value="data.address" placeholder="Enter address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('asset/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('asset/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('asset/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> 
<script>
    $(function () {
      $("#dataTable").DataTable();
    });
</script>
<script type="text/javascript">
    var controller = new Vue({
    el: '#controller',
    data: {
        data:{},
        actionUrl:'{{url('publishers')}}',
        editStatus: false
    },
    methods:{
        addData(){
            this.data={};
            this.actionUrl = '{{url('publishers')}}';
            this.editStatus =false;
            $('#Publisher').modal();
        },
        editData(data){
            this.data=data;
            this.actionUrl = '{{url('publishers')}}'+'/'+data.id;
            this.editStatus =true;
            $('#Publisher').modal();
            console.log(data);
        },
        deleteData(id){
            this.actionUrl = '{{url('publishers')}}'+'/'+id;
            if (confirm("Are You sure?")) {
                axios.post(this.actionUrl, {_method:'DELETE'}).then(response=>{
                    location.reload();
                })
            }
        }
    }
    })
</script>
@endsection