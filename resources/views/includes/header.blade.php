<body>
<div class="header">
    <div class="navbar">
        <div class="nav_area">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <div class="navbar-header">
                        <a class="navbar-brand toptext" href="{{URL('/')}}">Ominext JSC</a>
                    </div>
                    <ul class="float_right nav navbar-nav">
                        <li class="{{(URL::current() == url('/')) ? 'active' : ''}}"><a href="{{url('/')}}">Trang
                                chủ</a></li>
                        @if (Auth::user()->getRole() !== 'Applicant')
                            <li class="{{(URL::current() == url('CV')) ? 'active' : ''}}"><a href="{{url('CV')}}">Quản lý CV</a></li>
                        @endif

                        @can('Admin')
                        <li class="{{(URL::current() == url('User')) ? 'active' : ''}}"><a
                                    href="{{url('User')}}">User</a></li>
                        @endcan
                        <li><a href="{{url('auth/logout')}}">Đăng xuất</a></li>
                        <li class="{{(\Request::path() == 'User/'.\Auth::user()->hash) ? 'active' : ''}}"><a
                                    href="{{url('User',[Auth::User()->hash])}}" style="border: 1px solid transparent;">Chào {{Auth::User()->userName}}</a>
                        </li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->


            </div>
            <!-- /.container-fluid -->
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
                    </div>
                    <!-- /.navbar-collapse -->
                    </nav>

                </div>

            </div>
        @endif
    </div>
    <!--hr /-->
</div>


</body>
</html>
