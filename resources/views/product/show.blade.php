@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" role="form" action="#" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nama:</label>
                        <div class="col-sm-10">
                            <label class="control-label col-sm-2" for="pwd" style="text-align: left">{{$product->name}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Harga:</label>
                        <div class="col-sm-10">
                            <label class="control-label col-sm-2" for="pwd" style="text-align: left">{{$product->price}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sel1">Supplier:</label>
                        <div class="col-sm-10">
                            <label class="control-label col-sm-2" for="pwd" style="text-align: left">{{$product->supplier->name}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a href="{{url('product')}}" class="btn btn-default">Back</a>
                            <a href="{{url('product/'.$product->id.'/edit')}}" class="btn btn-info">Edit</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
