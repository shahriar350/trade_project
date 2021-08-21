@extends('master')

@section('head')
    <script src="{{ asset('js/jquery-3.6.0.slim.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('body')

    <div class="container mt-5">
        <div class="my-5 flex justify-end">
            <a href="{{ route('trade.index') }}" class="button">All trade data</a>
        </div>
        <h3 id="trade_name_id" class="text-xl text-center text-gray-800 border-b border-gray-500 py-2 mb-4"></h3>
        <div class="my-5">
            <label for="select_name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Select
                Trade Code</label>
            <select onchange="change_select_trade()" name="" id="select_name"
                    class="trade_select block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @foreach($trade_names as $name)
                    <option value="{{$name}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-5">
            <div id="linechart" style="width: 100%; height: 500px"></div>
            <div id="linechart_volume" style="width: 100%; height: 500px"></div>
            <div id="barchart_material" style="width: 100%; height: 1500px;"></div>
        </div>
    </div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        {{--        for select2 start --}}
        $(document).ready(function () {
            $('.trade_select').select2();
        });
        {{--        for select2 end --}}

{{-- google visualize start--}}
        if (document.getElementById('select_name').value !== '') {
            change_select_trade();
        }

        function change_select_trade() {
            var data = {!! json_encode($data, JSON_HEX_TAG) !!};
            var product = [
                [
                    'date',
                    'high',
                    'low',
                    'open',
                    'close',
                    // 'volume',
                ]
            ]
            var vol = [
                [
                    'date',
                    'volume'
                ]
            ]
            var name = document.getElementById('select_name').value
            document.getElementById('trade_name_id').innerText = name
            for (const productKey of data) {
                if (productKey['trade_code'] === name) {
                    product.push(
                        [
                            new Date(productKey['date']),
                            parseFloat(productKey['high']),
                            parseFloat(productKey['low']),
                            parseFloat(productKey['open']),
                            parseFloat(productKey['close']),
                            // parseFloat(productKey['volume'])
                        ]
                    )
                    vol.push([
                        new Date(productKey['date']), parseFloat(productKey['volume'])
                    ])
                }

            }

            google.charts.load('current', {
                'packages': ['corechart', 'gantt']
            });
            google.charts.setOnLoadCallback(lineChart);

            // google.charts.setOnLoadCallback(drawChart);

            function lineChart() {
                //line chart start

                var data = google.visualization.arrayToDataTable(product);
                var options = {
                    title: 'Trade value by Date',
                    legend: {
                        position: 'right'
                    },
                    axes: {
                        x: {
                            0: {side: 'top', label: 'Percentage'} // Top x-axis.
                        }
                    },
                };
                var chart = new google.visualization.LineChart(document.getElementById('linechart'));
                chart.draw(data, options);
                //line chart end
                //line chart for Volume start

                var dataa = google.visualization.arrayToDataTable(vol);
                var optionsa = {
                    title: 'Trade volume by Date',
                    legend: {
                        position: 'right'
                    },
                    axes: {
                        x: {
                            0: {side: 'top', label: 'Percentage'} // Top x-axis.
                        }
                    },
                };
                var charta = new google.visualization.LineChart(document.getElementById('linechart_volume'));
                charta.draw(dataa, optionsa);

                //line chart for volumn end
                //bar chart start
                var baroptions = {
                    bar: {groupWidth: "95%"},
                    axes: {
                        x: {
                            0: {side: 'top', label: 'Percentage'} // Top x-axis.
                        }
                    },
                    chart: {
                        title: 'Bar Graph | Sales',
                    },
                    bars: 'vertical'
                };
                var barchart = new google.visualization.BarChart(document.getElementById('barchart_material'));
                barchart.draw(data, baroptions);
                //bar chart end


            }
        }
        {{-- google visualize end--}}



    </script>

@endsection

