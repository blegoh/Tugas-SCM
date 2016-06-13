@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                    <div class="panel-body">
                        <div id="chart_div"></div>
                        <form class="form-horizontal" role="form" method="post" action="{{url('priority')}}">
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
    </div>
@endsection

@section('script')
        <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                {!! $chart !!}
            ]);

            // Set chart options
            var options = {'title':'How Much Pizza I Ate Last Night',
                'width':1000,
                'height':600};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);

        }

    </script>
@endsection