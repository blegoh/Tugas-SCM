@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" role="form" method="post" action="{{url('receiving')}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sel1">Product:</label>
                        <div class="col-sm-6">
                            <select name="product_id" class="form-control" id="sel1">
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Jumlah:</label>
                        <div class="col-sm-6">
                            <input type="text" name="quantity" class="form-control" id="pwd" placeholder="Jumlah">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
