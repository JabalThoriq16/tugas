@extends('layouts.layouts')
@section('header', 'Edit Publisher')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Publisher</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('publishers/'.$publisher->id)}}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="card-body">
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$publisher->name}}">
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{$publisher->email}}">
                        </div>
                        <div class="form-group">
                            <label >Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" placeholder="Enter Phone Number" value="{{$publisher->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label >Adress</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{$publisher->address}}">
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
