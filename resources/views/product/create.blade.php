@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" role="form" method="post" action="{{url('product')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nama:</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" class="form-control" id="pwd" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Harga:</label>
                        <div class="col-sm-6">
                            <input type="text" name="price" class="form-control" id="pwd" placeholder="Harga">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sel1">Supplier:</label>
                        <div class="col-sm-6">
                            <select name="supplier_id" class="form-control" id="sel1">
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
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
