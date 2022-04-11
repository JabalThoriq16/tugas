@extends('layouts.layouts')
@section('header', 'catalog')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah buku</th>
                        <th>Tanggal dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catalogs as$key => $catalog)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$catalog->name}}</td>
                            <td class="text-center">{{count($catalog->books)}}</td>
                            <td>{{date('d M Y'. strtotime($catalog->create_at))}}</td>
                        </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>
@endsection
