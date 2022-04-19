@extends('layouts.layouts')
@section('header', 'Publisher')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{url('publishers/create')}}" class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
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
                    @foreach ($publishers as$key => $pub)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$pub->name}}</td>
                            <td>{{$pub->email}}</td>
                            <td>{{$pub->phone_number}}</td>
                            <td>{{$pub->address}}</td>
                            <td class="text-center">{{count($pub->books)}}</td>
                            <td class="text-center justify-content-center" >
                                <a class="btn btn-warning btn-sm" href="{{url('publishers/'.$pub->id).'/edit'}}" style="border: 0ch">Edit</a>
                                <form action="{{url('publishers', ['id'=>$pub->id])}}" method="POST" class="" >
                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Apa kamu yakin ?')">
                                    @method('delete')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {{ $publishers->links() }}
        </div>
        </div>
    </div>
@endsection
