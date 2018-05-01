@extends('layouts.app')
@section('script')
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script type="text/javascript">

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Pending Requests',11],
                ['Approved Requests', 2],
                ['Disapproved Requests', 4],
            ]);

            var options = {
                    title: 'Request\'s Status '
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Your Comments"
                },
                axisX: {
                    title: "Time"
                },
                axisY: {
                    title: "Percentage",
                    suffix: "%"
                },
                data: [{
                    type: "line",
                    name: "CPU Utilization",
                    connectNullData: true,
                    //nullDataLineDashType: "solid",
                    xValueType: "dateTime",
                    xValueFormatString: "DD MMM hh:mm TT",
                    yValueFormatString: "#,##0.##\"%\"",
                    dataPoints: [
                        { x: 1501048673000, y: 35.939 },
                        { x: 1501052273000, y: 40.896 },
                        { x: 1501055873000, y: 56.625 },
                        { x: 1501059473000, y: 26.003 },
                        { x: 1501063073000, y: 20.376 },
                        { x: 1501066673000, y: 19.774 },
                        { x: 1501070273000, y: 23.508 },
                        { x: 1501073873000, y: 18.577 },
                        { x: 1501077473000, y: 15.918 },
                        { x: 1501081073000, y: null }, // Null Data
                        { x: 1501084673000, y: 10.314 },
                        { x: 1501088273000, y: 10.574 },
                        { x: 1501091873000, y: 14.422 },
                        { x: 1501095473000, y: 18.576 },
                        { x: 1501099073000, y: 22.342 },
                        { x: 1501102673000, y: 22.836 },
                        { x: 1501106273000, y: 23.220 },
                        { x: 1501109873000, y: 23.594 },
                        { x: 1501113473000, y: 24.596 },
                        { x: 1501117073000, y: 31.947 },
                        { x: 1501120673000, y: 31.142 }
                    ]
                }]
            });
            chart.render();

        }
    </script>

@stop
@section('style')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <link href="bootstrap-social-gh-pages/bootstrap-social.css" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap-social-gh-pages/assets/css/font-awesome.css" rel="stylesheet">
    </head>

@stop
@section('content')
    <body style="background-color: white">
    <div class="container" style="float: left; width: 50%;">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <!--Card-->
                <div class="card card-cascade wider reverse my-4 z-depth-2 ">

                    <!--Card image-->
                    <div  style="height: 200px;overflow: hidden;">
                        <img src="{{$profile->background_img}}"
                             class="img-fluid">

                    </div>
                    <div class="position-relative d-flex justify-content-center">
                        <img src="{{$profile->profile_pic}}" alt="Profile Pic" class="img-thumbnail rounded-circle "
                             style="height: 200px;overflow: hidden;margin:-100px auto 0; width: 200px;">
                    </div>
                    <!--/Card image-->

                    <!--Card content-->
                    <div class="card-body text-center">
                        <!--Title-->
                        <table class="m-auto">
                            <tbody>
                            <tr>
                                <td class="h3-responsive">
                                    <strong>{{$profile->first_name.' '.$profile->surname}}</strong></td>
                            </tr>
                            <tr>
                                <td class="lead">{{$profile->department->name.' Department'}}</td>
                            </tr>
                            <tr>
                                <td class="lead">{{'Email: '.$profile->email}}</td>
                            </tr>
                            <tr>
                                <td class="lead">{{'ID: '.$profile->emp_id}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @Normal
        <div id="chartContainer" style="height: 370px; width: 50%;"></div>
        <div  id="piechart" style="float: right; width: 750px; height: 500px;"></div>
    @endNormal

@endsection




