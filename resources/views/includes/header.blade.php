<body>
<div class="header">
    <!--div class="top">
        <div class="toptext">
            <a href="">
				<span style="color: #8A2BE2;" class="">
				</span>
                Rirekisho </a>
        </div>

    </div>
    <div class="clr"></div-->
    <div class="navbar">
        <div class="nav_area">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <div class="navbar-header">
                        <a class="navbar-brand toptext" href="{{URL('/')}}">Ominext JSC</a>
                    </div>
                    <ul class="float_right nav navbar-nav">
                        {{--{{ dd(Route::getCurrentRoute())}}--}}
                        @if (Auth::user()->getRole() === 'Applicant')
                            <li class="{{(Route::getCurrentRoute() =='/') ? 'active' : ''}}"><a href="{{url('/')}}">Trang chủ</a></li>
                        @else
                            <li class="{{(Route::getCurrentRoute() =='CV') ? 'active' : ''}}"><a href="{{url('CV')}}">Trang chủ</a></li>
                        @endif
                        @can('Admin')
                            <li {!! (\Request::route()->getName() == 'User.index') ? 'class="active"' : '' !!}><a href="{{url('User')}}">User</a></li>

                        {{--<li @if(URL::current() == url('CV')) class="active" @endif ><a href="{{url('CV')}}">Trang chủ</a></li>--}}
                        {{--@can('Admin')--}}
                            {{--<li @if(URL::current() == url('User')) class="active" @endif><a href="{{url('User')}}">User</a></li>--}}
                            {{--<li @if(URL::current() == url('positions')) class="active" @endif><a href="{{url('positions')}}">Quản lý vị trí tuyển dụng</a></li>--}}
                            {{--<li @if(URL::current() == url('status')) class="active" @endif><a href="{{url('status')}}">Quản lý trạng thái</a></li>--}}

                        @endcan
                        <li><a href="{{url('auth/logout')}}">Đăng xuất</a></li>
                        <li class="{{(\Request::path() == 'User/'.\Auth::user()->hash) ? 'active' : ''}}"><a href="{{url('User',[Auth::User()->hash])}}" style="border: 1px solid transparent;">Chào {{Auth::User()->name}}</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->


            </div><!-- /.container-fluid -->
        </div>

        <div class="clr"></div>
        @if(0)
            <div class="warning-box" style=""> <!-- jquery nav bar-->
                <div class="container-fluid">
                    <div class="collapse navbar-collapse">
                        <div notification="true" class="">

                    <span>There must be some error while loading this page. Please <a href="." class="normal_color">refresh! </a>
                        </span>
                        </div>
                    </div><!-- /.navbar-collapse -->
                    </nav>

                </div>

            </div>
        @endif
    </div>
    <!--hr /-->
</div>


</body>
</html>
