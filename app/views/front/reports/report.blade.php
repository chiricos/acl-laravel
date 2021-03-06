@extends('layou/plantille')

@section('titleContent')
    <h1>Consultas</h1>
@stop

@section('content')

    <a class="business-fixed buttonA" href="{{route('charts')}}">Consultas de Clientes</a>
    <a class="business buttonA" href="{{route('chart')}}" style="color: #07b4e3">Consultas de productos</a>

    <section class="reports">
        <div id="chart_div">
            <input class="countBranding hidden " value="{{$brandingTotal}}">
            <input class="countWeb hidden" value="{{$webTotal}}">
            <input class="countMarketing hidden" value="{{$marketingTotal}}">
            <input class="countProduction hidden" value="{{$productionTotal}}">
            <input class="countStrategy hidden" value="{{$strategyTotal}}">
            <input class="countPrint hidden" value="{{$printTotal}}">
        </div>
    </section>

    <div class="wrapperReports">
        <table class="tableContent">
            <thead>
            <tr>
                <th>Dependencia</th>
                <th>Nombre del producto</th>
                <th>Cliente</th>
                <th>Valor del producto</th>
            </tr>
            </thead>
            <tbody>

            @foreach($branding as $branding)
                @for($i=0;$i<count($branding['businessProduct']);$i++)
                <tr>
                    <td>BRANDING</td>
                    <td>{{$branding->name}}</td>
                    @foreach($business as $client)
                        @if( $branding['businessProduct'][$i]['business_id']==$client->id)
                            <td>{{$client->name}}</td>
                        @endif
                    @endforeach
                    <td>$ {{$branding['businessProduct'][$i]->value}}</td>

                </tr>
                @endfor

            @endforeach


            @foreach($web as $web)
                @for($i=0;$i<count($web['businessProduct']);$i++)
                    <tr>
                        <td>WEB</td>
                        <td>{{$web->name}}</td>
                        @foreach($business as $client)
                            @if( $web['businessProduct'][$i]['business_id']==$client->id)
                                <td>{{$client->name}}</td>
                            @endif
                        @endforeach
                        <td>$ {{$web['businessProduct'][$i]->value}}</td>
                    </tr>
                @endfor

            @endforeach


            @foreach($marketing as $marketing)
                @for($i=0;$i<count($marketing['businessProduct']);$i++)
                    <tr>
                        <td>MARKETING</td>
                        <td>{{$marketing->name}}</td>
                        @foreach($business as $client)
                            @if( $marketing['businessProduct'][$i]['business_id']==$client->id)
                                <td>{{$client->name}}</td>
                            @endif
                        @endforeach
                        <td>$ {{$marketing['businessProduct'][$i]->value}}</td>
                    </tr>
                @endfor

            @endforeach


            @foreach($production as $production)
                @for($i=0;$i<count($production['businessProduct']);$i++)
                    <tr>
                        <td>PRODUCCION AUDIOVISUAL</td>
                        <td>{{$production->name}}</td>
                        @foreach($business as $client)
                            @if( $production['businessProduct'][$i]['business_id']==$client->id)
                                <td>{{$client->name}}</td>
                            @endif
                        @endforeach
                        <td>$ {{$production['businessProduct'][$i]->value}}</td>
                    </tr>
                @endfor

            @endforeach


            @foreach($strategy as $strategy)
                @for($i=0;$i<count($strategy['businessProduct']);$i++)
                    <tr>
                        <td>ESTRATEGIA</td>
                        <td>{{$strategy->name}}</td>
                        @foreach($business as $client)
                            @if( $strategy['businessProduct'][$i]['business_id']==$client->id)
                                <td>{{$client->name}}</td>
                            @endif
                        @endforeach
                        <td>$ {{$strategy['businessProduct'][$i]->value}}</td>
                    </tr>
                @endfor

            @endforeach


            @foreach($print as $print)
                @for($i=0;$i<count($print['businessProduct']);$i++)
                    <tr>
                        <td>IMPRESION</td>
                        <td>{{$print->name}}</td>
                        @foreach($business as $client)
                            @if( $print['businessProduct'][$i]['business_id']==$client->id)
                                <td>{{$client->name}}</td>
                            @endif
                        @endforeach
                        <td>$ {{$print['businessProduct'][$i]->value}}</td>
                    </tr>
                @endfor

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
            var branding=$('.countBranding').val();
            var web=$('.countWeb').val();
            var marketing=$('.countMarketing').val();
            var production=$('.countProduction').val();
            var strategy=$('.countStrategy').val();
            var print=$('.countPrint').val();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['('+branding+') Branding', parseInt(branding)],
                ['('+web+') web y app', parseInt(web)],
                ['('+marketing+') Marketing', parseInt(marketing)],
                ['('+production+') Produccion audiovisual', parseInt(production)],
                ['('+strategy+') Estrategia', parseInt(strategy)],
                ['('+print+') Impresion', parseInt(print)]
            ]);

            // Set chart options
            var total=parseInt(branding)
                    + parseInt(web)
                    + parseInt(marketing)
                    + parseInt(production)
                    + parseInt(strategy)
                    + parseInt(print);
            var options = {'title':'REPORTE DE PRODUCTOS('+total+')',
                'width':350,
                'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

@stop