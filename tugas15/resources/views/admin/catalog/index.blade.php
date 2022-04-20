@extends('layouts.layouts')
@section('header', 'catalog')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{url('catalogs/create')}}" class="btn btn-sm btn-primary pull-right">Create New Catalogs</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Total Books</th>
                        <th>Create At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catalogs as$key => $catalog)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$catalog->name}}</td>
                            <td class="text-center">{{count($catalog->books)}}</td>
                            <td>{{formatDates($catalog->create_at)}}</td>
                            <td class="text-center" >
                                <div class="row justify-content-center">
                                    <a class="btn btn-warning btn-sm m-2" href="{{url('catalogs/'.$catalog->id).'/edit'}}">Edit</a>
                                    <form action="{{url('catalogs', ['id'=>$catalog->id])}}" method="POST" class="" >
                                        <input class="btn btn-danger btn-sm m-2" type="submit" value="Delete" onclick="return confirm('Apa kamu yakin ?')">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {{ $catalogs->links() }}
        </div>
        </div>
    </div>
@endsection
