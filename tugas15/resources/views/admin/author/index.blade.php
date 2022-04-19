@extends('layouts.layouts')
@section('header', 'Author')
@section('content')
<div id="controller">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" @click="addData()">
                Create Author
            </button>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
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
                    @foreach ($authors as $key => $author)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->phone_number }}</td>
                            <td>{{ $author->address }}</td>
                            <td class="text-center">{{ count($author->books) }}</td>
                            <td class="text-center justify-content-center">
                                <a class="btn btn-warning btn-sm" href="#" @click="editData({{$author}})">Edit</a>
                                <a class="btn btn-danger btn-sm" href="#" @click="deleteData({{ $author->id }})"> Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {{ $authors->links() }}
        </div>
    </div>
    <div class="modal fade" id="Author" tabindex="-1" role="dialog" aria-labelledby="formAuthor" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Author</h5>
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
    <script type="text/javascript">
        var controller = new Vue({
        el: '#controller',
        data: {
            data:{},
            actionUrl:'{{url('authors')}}',
            editStatus: false
        },
        methods:{
            addData(){
                this.data={};
                this.actionUrl = '{{url('authors')}}';
                this.editStatus =false;
                $('#Author').modal();
            },
            editData(data){
                this.data=data;
                this.actionUrl = '{{url('authors')}}'+'/'+data.id;
                this.editStatus =true;
                $('#Author').modal();
                console.log(data);
            },
            deleteData(id){
                this.actionUrl = '{{url('authors')}}'+'/'+id;
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