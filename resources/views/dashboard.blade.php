<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- local css-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/admin/css/3.3.5-bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/content.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/header.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/footer.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/admin/bower_components/statistics/css/morris-0.4.3.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/statistic.css') }}"/>
    <!---  jQuery-->
    <script type="text/javascript" src="{{ URL::asset('/admin/js/jquery-1.12.2.min.js')}}"></script>
</head>
<body>
<header>
    @include('includes.header')
</header>

    <div class="container">
        <div id="main" class="row">
            @yield('content')
        </div>

    </div>
    <div class="footer col-lg-12">
        @include('includes.footer')
    </div>


<script type="text/javascript" src="{{ URL::asset('/admin/js/jquery-1.12.2.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('/admin/js/1.15.0-jquery.validate.js')}}"></script>
{{--thu vien bang bieu--}}
{{--<script type="text/javascript" src="{{ URL::asset('/admin/bower_components/statistics/js/raphael-min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('/admin/bower_components/statistics/js/morris-0.4.3.min.js')}}"></script>--}}
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts-3d.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>

</body>

</html>