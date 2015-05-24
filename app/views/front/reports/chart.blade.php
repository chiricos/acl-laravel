@extends('layou/plantille')

@section('titleContent')
    <h1>Reportes</h1>
@stop

@section('content')

    <a class="business-fixed buttonA" href="{{route('charts')}}" style="color: #07b4e3">Reporte de Clientes</a>
    <a class="business buttonA" href="{{route('chart')}}">Reporte de productos</a>

    <section class="reports">
        <div id="chart_div">
            <input class="countBusiness hidden" value="{{count($business)}}">
            <input class="countClient hidden" value="{{count($client)}}">
            <input class="countRecurrent hidden" value="{{$recurrent}}">
        </div>
    </section>

    <div class="wrapperReports">
        <table class="tableContent">
            <thead>
                <tr>
                    <th>Vendedor</th>
                    <th>Clientes</th>
                    <th>Prospecto</th>
                    <th>Productos Vendidos</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    @if($user->count_business)
                    <td>{{$user->name}} {{$user->last_name}}</td>
                    <td>{{$user->client}}</td>
                    <td>{{$user->prospect}}</td>
                    @if($user->all_products)
                    <td>{{$user->all_products}}</td>
                    @else
                    <td>0</td>
                    @endif
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('javascript')

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        // Load the Visualization API and the piechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.

        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            var business=parseInt($('.countBusiness').val());
            var client=parseInt($('.countClient').val())-parseInt($('.countRecurrent').val());
            var recurrent=parseInt($('.countRecurrent').val());
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['('+business+') Clientes', business],
                ['('+client+') Prospectos', client],
                ['('+recurrent+') Recurrentes', recurrent]
            ]);

            // Set chart options
            var total=business+client+recurrent;
            var options = {'title':'REPORTE DE CLIENTES('+total+')',
                'width':350,
                'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

@stop