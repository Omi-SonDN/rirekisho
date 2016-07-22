<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Group user</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <!---  jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <!---  bootstrap-->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script src="{{ URL::asset('js/include.js') }}"></script>
        <script src="{{ URL::asset('js/groups.js') }}"></script>
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- local css-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/content.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/index.css') }}"/>

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/my-forms.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/header.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css') }}"/>

        <!--tagIt-->
        <script src="{{ url('tag-it-master/js/tag-it.js') }}" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
        <link href="{{ url('tag-it-master/css/jquery.tagit.css') }}" rel="stylesheet" type="text/css">

        <script src="{{ url('js/groups_tagIt.js') }}" type="text/javascript"></script>
        </head>
        <body>

            <div class="header">
                <div class="top">
                    <div class="toptext">
                        <a href="">
                            <span style="color: #8A2BE2;" class="">
                            </span>
                            Rirekisho </a>
                    </div>

                </div>
                <div class="clr"></div>
                <div class="navbar"><!-- jquery nav bar-->
                    <div class="nav_area">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse">
                                <ul class="float_right nav navbar-nav">
                                    <li><a href="{{url('CV')}}">Trang chủ</a></li>
                                    @can('Admin')
                                    <li><a href="{{url('User')}}">User</a></li>
                                    <li><a href="{{url('positions')}}">Positions</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Email
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('emails/create')}}">Send email</a></li>
                                            <li><a href="{{url('groups')}}">Group email</a></li>
                                        </ul>
                                    </li>
                                    @endcan
                                    @can('Applicant')
                                    @endcan
                                    @can('Visitor')
                                    <li class="active"><a href="{{url('CV')}}">Danh sách CV<span
                                                class="sr-only">(current)</span></a></li>
                                    @endcan
                                    <li><a href="{{url('about')}}">About</a></li>
                                    <li><a href="{{url('User',[Auth::User()->id])}}">Cài đặt</a></li>
                                    <li><a href="{{url('auth/logout')}}">Đăng xuất</a></li>
                                    <li><a> Hello {{Auth::User()->name}}</a></li>
                                </ul>

                            </div><!-- /.navbar-collapse -->


                        </div><!-- /.container-fluid -->
                    </div>
                    <div class="clr"></div>
                    <div class="warning-box" style=""> <!-- jquery nav bar-->
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse">
                                <div notification="true" class="">

                                    <span>There must be some error while loading this page. Please <a href="." class="normal_color">refresh! </a>
                                    </span>
                                </div>
                            </div><!-- /.navbar-collapse -->
                            </nav>
                            @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                            @endif

                        </div>

                    </div>
                </div>
                <!--hr /-->
            </div>

            <br>
            <br>
            <div class="container">
                <div id="main" class="row">
                    @yield('content')

                </div>

            </div>
            <footer class="row simple">
                @include('includes.footer')
            </footer>
</body>
</html>