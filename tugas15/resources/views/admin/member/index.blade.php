@extends('layouts.layouts')
@section('header', 'Member')
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
                Create Member
            </button>
        </div>

        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
        </div>
    </div>
    <div class="modal fade" id="Member" tabindex="-1" role="dialog" aria-labelledby="formMember" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Member</h5>
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
                            <select class="form-select" name="gender" aria-label="Default select example">
                                <option selected>Pilih..</option>
                                <option value="p">Perempuan</option>
                                <option value="l">Laki-laki</option>
                              </select>
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
<script type="text/javascript">
    var actionUrl = '{{url('members')}}';
    var apiUrl = '{{url('api/members')}}';

    var columns = [
        {data:'DT_RowIndex', class:'text-center',orderable:true},
        {data:'name', class:'text-center',orderable:true},
        {data:'gender', class:'text-center',orderable:true},
        {data:'email', class:'text-center',orderable:true},
        {data:'phone_number', class:'text-center',orderable:true},
        {data:'address', class:'text-center',orderable:true},
        {render:function(index,row,data,meta){
            return `<a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>`+" "+`<a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Hapus</a>`;
        }, orderable:false, width:'100px', class:'text-center'},
    ];

    var controller = new Vue({
    el: '#controller',
    data: {
        datas:[],
        data:{},
        actionUrl,
        apiUrl,
        editStatus:false,
    },
    mounted: function(){
        this.datatable();
    },
    methods:{
        datatable(){
            const _this = this;
            _this.table = $('#datatable').DataTable({
                ajax:{
                    url: _this.apiUrl,
                    type:'GET',
                },
                columns:columns
            }).on('xhr',function(){
                _this.datas = _this.table.ajax.json().data;
            });
        },
        addData(){
            this.data={};
            this.editStatus =false;
            $('#Member').modal();
        },
        editData(event, row){
            this.data =this.datas[row];
            this.editStatus =true;
            $('#Member').modal();
        },
        deleteData(event, id){
            if (confirm("Are You sure?")) {
                $(event.target).parents('tr').remove();
                axios.post(this.actionUrl+'/'+id, {_method:'DELETE'}).then(response=>{
                    alert('Data has been removed');
                });
            }
        },
        submitForm(event,id){
            event.preventDefault();
            const _this = this;
            var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
            axios.post(actionUrl, new FormData($(event.target)[0])).then(response=>{
                $('#Member').modal('hide');
                _this.table.ajax.reload();
            });
        },
    }
    });
</script>
<script>
    $(function () {
      $("#dataTable").DataTable(
      );
    });
</script>
@endsection