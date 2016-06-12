@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{url('receiving/create')}}" class="btn btn-default">Tambah Receiving</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Tanggal</th>
                        <th>Product</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($receivings as $receiving)
                        <tr>
                            <td>{{$receiving->id}}</td>
                            <td>{{$receiving->created_at}}</td>
                            <td>{{$receiving->product->name}}</td>
                            <td>{{$receiving->quantity}}</td>
                            <td>
                                <a href="{{url('receiving/'.$receiving->id.'/edit')}}" class="btn btn-info">Edit</a>
                                <div>
                                    <form action="{{url('receiving/'.$receiving->id)}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete" />
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
