@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" role="form" method="post" action="{{url('product/'.$product->id)}}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="put" />
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nama:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="pwd" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Harga:</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" value="{{$product->price}}" class="form-control" id="pwd" placeholder="Harga">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sel1">Supplier:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sel1">
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}" @if($supplier->id == $product->supplier_id) selected @endif>{{$supplier->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
