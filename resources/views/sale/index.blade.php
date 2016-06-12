@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row" ng-controller="SaleController">

                    <div class="col-md-3">
                        <label>Search Products: <input ng-model="searchKeyword" class="form-control"></label>

                        <table class="table table-hover">
                            <tr ng-repeat="product in products | filter: searchKeyword | limitTo:10">

                                <td>@{{product.name}}</td>
                                <td><button class="btn btn-success btn-xs" type="button" ng-click="addSaleTemp(product, newsaletemp)"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></button></td>

                            </tr>
                        </table>
                    </div>

                    <div class="col-md-9">


                        <table class="table table-bordered">
                            <tr>
                                <th>Item ID</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>&nbsp;</th></tr>
                            <tr ng-repeat="newsaletemp in saletemp">
                                <td>@{{newsaletemp.id}}</td>
                                <td>@{{newsaletemp.name}}</td>
                                <td>@{{newsaletemp.price | currency}}</td>
                                <td>
                                    <input type="text" style="text-align:center" autocomplete="off" name="quantity" ng-change="updateSaleTemp(newsaletemp)" ng-model="newsaletemp.quantity" size="2">
                                </td>
                                <td>@{{newsaletemp.price * newsaletemp.quantity | currency}}</td>
                                <td>
                                    <button class="btn btn-danger btn-xs" type="button" ng-click="removeSaleTemp(newsaletemp.id)">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total" class="col-sm-4 control-label">Add Payment</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-addon">$</div>
                                            <input type="text" class="form-control" id="add_payment" ng-model="add_payment"/>
                                        </div>
                                    </div>
                                </div>
                                <div>&nbsp;</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier_id" class="col-sm-4 control-label">TOTAL:</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static"><b>@{{sum(saletemp) | currency}}</b></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="amount_due" class="col-sm-4 control-label">Amount Due</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static">@{{add_payment - sum(saletemp) | currency}}</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <form action="/sale" method="post">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-success btn-block">Complete Sale</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/controllers/SaleController.js"></script>
    <script src="/js/services/product.js"></script>
@endsection