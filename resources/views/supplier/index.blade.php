@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{url('supplier/create')}}" class="btn btn-default">Tambah Supplier</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{$supplier->id}}</td>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->address}}</td>
                            <td>{{$supplier->phone}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>
                                <a href="{{url('supplier/'.$supplier->id.'/edit')}}" class="btn btn-info">Edit</a>
                                <div>
                                    <form action="{{url('supplier/'.$supplier->id)}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete" style="" />
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
