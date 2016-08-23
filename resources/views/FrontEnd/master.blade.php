<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="_token" content="{!! csrf_token() !!}" />

    <!-- local css-->
    <link href="{{ URL::asset('/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="{{ URL::asset('/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="{{ URL::asset('/frontend/css/superslides.css') }}">
    <!-- Slick slider css file -->
    <link href="{{ URL::asset('/frontend/css/slick.css') }}" rel="stylesheet">
    <!-- Circle counter cdn css file -->
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="{{ URL::asset('/frontend/css/jquery.tosrus.all.css') }}" />
    <!-- Default Theme css file -->
    <link id="switcher" href="{{ URL::asset('/frontend/css/themes/default-theme.css') }}" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="{{ URL::asset('/frontend/css/templatemo_style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontend/css/style-profile.css') }}" rel="stylesheet">

</head>
<body>
<header>
    <!-- BEGIN MENU -->

    @include('FrontEnd.blocks.header')
    <!-- END MENU -->
</header>

<!--=========== BEGIN SLIDER SECTION ================-->
@if (isset($isslider))
@include('FrontEnd.blocks.silder')
@endif
<!--=========== END SLIDER SECTION ================-->
    {{--<div class="container">--}}
        {{--<div id="main" class="row">--}}
            @yield('content')
        {{--</div>--}}
{{----}}
    {{--</div>--}}
<!--=========== BEGIN FOOTER SECTION ================-->
    @include('FrontEnd.blocks.footer',['dtCp'=> $configcp])
        <!--=========== END FOOTER SECTION ================-->

        <!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"></a>
<!-- END SCROLL TOP BUTTON -->

<script type="text/javascript" src="{{ URL::asset('/admin/js/jquery-1.12.2.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('/admin/js/1.15.0-jquery.validate.js')}}"></script>
<!-- Preloader js file -->
{{--<script src="{{ URL::asset('/frontend/js/queryloader2.min.js')}}" type="text/javascript"></script>--}}
<!-- For smooth animatin  -->
<script src="{{ URL::asset('/frontend/js/wow.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{ URL::asset('/frontend/js/bootstrap.min.js')}}"></script>
<!-- slick slider -->
<script src="{{ URL::asset('/frontend/js/slick.min.js')}}"></script>
<!-- superslides slider -->
<script src="{{ URL::asset('/frontend/js/jquery.easing.1.3.js')}}"></script>
<script src="{{ URL::asset('/frontend/js/jquery.animate-enhanced.min.js')}}"></script>
<script src="{{ URL::asset('/frontend/js/jquery.superslides.min.js')}}" type="text/javascript" charset="utf-8"></script>
<!-- for circle counter -->
<script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
<!-- Gallery slider -->
<script type="text/javascript" language="javascript" src="{{ URL::asset('/frontend/js/jquery.tosrus.min.all.js')}}"></script>

<!-- Custom js-->
<script src="{{ URL::asset('/frontend/js/custom.js')}}"></script>

</body>

</html>