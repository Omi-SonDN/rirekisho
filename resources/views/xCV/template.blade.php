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
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- local css-->
    <!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/all.css') }}"/-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/content.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/index.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/my-forms.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/header.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/footer.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css') }}"/>

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

</body>

</html>