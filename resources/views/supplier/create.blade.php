@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal" role="form" method="post" action="{{url('supplier')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nama:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="pwd" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Alamat:</label>
                        <div class="col-sm-10">
                            <textarea name="address" class="form-control" placeholder="Alamat">

                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Telepon:</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" id="pwd" placeholder="Telepon">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="pwd" placeholder="Email">
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
