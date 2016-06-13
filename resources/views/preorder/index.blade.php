@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{url('preorder/create')}}" class="btn btn-default">Tambah Pre Order</a>
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
                    @foreach($preOrders as $preOrder)
                        <tr>
                            <td>{{$preOrder->id}}</td>
                            <td>{{$preOrder->created_at}}</td>
                            <td>{{$preOrder->product->name}}</td>
                            <td>{{$preOrder->quantity}}</td>
                            <td>
                                <a href="{{url('preorder/'.$preOrder->id.'/edit')}}" class="btn btn-info">Edit</a>
                                <div>
                                    <form action="{{url('preorder/'.$preOrder->id)}}" method="post">
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
