@extends('layouts.layouts')
@section('header', 'create catalog')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Catalog</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('catalogs')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
