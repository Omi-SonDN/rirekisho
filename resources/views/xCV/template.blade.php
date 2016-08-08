<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!---  jQuery-->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.2.min.js" defer></script>
    <!---  bootstrap-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" defer></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" defer></script>
    <script type="text/javascript"> (function () {
            var css = document.createElement('link');
            css.href = '//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })(); </script>
    <script src="{{ URL::asset('js/include.js')}}" defer></script>
    <!-- script src="{{ URL::asset('js/bootstrap-datepicker.js')}}"></script> -->
    

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- local css-->
<!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/all.css') }}"/-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/content.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datepicker3.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/index.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/my-forms.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/header.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/footer.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css') }}"/>
    <!--CSS lib tablesorter -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/admin/bower_components/datatables-sort/css/tablesorter.pager.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/customtables.css') }}"/>
    <!--CSS theme tablesorter -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/admin/bower_components/datatables-sort/css/theme.bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/admin/bower_components/datatables-sort/css/theme.blue.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/admin/bower_components/datatables-sort/css/theme.dark.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/admin/bower_components/datatables-sort/css/theme.default.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/admin/bower_components/datatables-sort/css/theme.dropbox.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/admin/bower_components/datatables-sort/css/theme.grey.min.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/admin/bower_components/datatables-sort/css/theme.jui.min.css') }}"/>

</head>
<body>
<header>
    @include('includes.header')
    @include('includes.sidebar')
</header>
<div id="push">
    <div id="hamburger" class="burger-place">
        <a class="burger-effect burger-icon" href="#"><span></span></a>
    </div>
    <div class="container">
        <div id="main" class="row">
            @yield('content')

        </div>

    </div>

<!--footer class="row simple">
    @include('includes.footer')
        </footer-->
</div>
<!-- DataTables JavaScript -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="{{asset('/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/select2.full.min.js')}}" async></script>
{{--<script type="text/javascript" src="{{asset('/admin/bower_components/datatables-sort/js/jquery-latest.js')}}"></script>--}}
<script type="text/javascript"
        src="{{asset('/admin/bower_components/datatables-sort/js/jquery.tablesorter.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('/admin/bower_components/datatables-sort/js/jquery.tablesorter.widgets.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('/admin/bower_components/datatables-sort/addons/pager/jquery.tablesorter.pager.js')}}"></script>
<script type="text/javascript"
        src="{{asset('/admin/bower_components/datatables-sort/js/pager-custom-controls.js')}}"></script>
<!-- Giet xung dot :))  [$ Jquery]-->
{{--<script type="text/javascript"> jQuery.noConflict(); </script>--}}

<script type="text/javascript" src="{{ URL::asset('/admin/js/func.bqn.js')}}"></script>
</body>

</html>