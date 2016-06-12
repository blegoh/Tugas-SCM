@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{url('product/create')}}" class="btn btn-default">Tambah Product</a>
                <script>
                        jQuery('#date').datepicker({
                            datesDisabled:[@foreach($date as $date){{ '"'.$date.'",'}}@endforeach]
                        });
                </script>
                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{url('product/'.$product->id.'/edit')}}" class="btn btn-info">Edit</a>
                                <div>
                                    <form action="{{url('product/'.$product->id)}}" method="post">
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
