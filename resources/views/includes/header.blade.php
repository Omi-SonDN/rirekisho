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
                        @can('Admin')
                        <li>
                            <div class="btn dropdown-toggle" data-toggle="dropdown" id="box_tb">
                            Thông báo<span class="caret"></span>
                            </div>
                                <?php $cv_active = DB::table('cvs')
                                    ->join('users','users.id', '=', 'cvs.user_id')
                                    ->where('cvs.Active', '=', 0)
                                    ->orderBy('cvs.created_at')
                                    ->get();
                                ?>
                                @if($cv_active != null)
                                <div class="number_tb">{{count($cv_active)}}</div>
                                    <ul class="dropdown-menu" id="new_CV" style="overflow: scroll; transform: translate(-165px,0); width: 300px; height: 350px">
                                        @foreach($cv_active as $key => $cv_tb)
                                            <?Php
                                                $user_id = DB::table('cvs')->where('user_id', '=', $cv_tb->id)->get();
                                                $id_tb = Hashids::encode($user_id[0]->id);
                                                $date = date_create($user_id[0]->created_at);
                                                $date = date_format($date, 'd-m-Y');
                                            ?>
                                            <li>
                                            @if ($cv_tb->type_cv)
                                                <a href="{{ \URL('CV/upload/'. $id_tb) }}">{{$cv_tb->Last_name.' '.$cv_tb->First_name}} upload CV {{$date}}</a>
                                            @else
                                                <a href="{{ \URL('CV/show/'.$id_tb) }}">{{$cv_tb->Last_name.' '.$cv_tb->First_name}} upload CV {{$date}}</a>
                                            @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                        </li>
                        @endcan
                        <!-- <li><a href="{{url('auth/logout')}}">Đăng xuất</a></li>
                        <li class="{{(\Request::path() == 'User/'.\Auth::user()->hash) ? 'active' : ''}}"><a
                                    href="{{url('User',[Auth::User()->hash])}}" style="border: 1px solid transparent;" >Chào {{Auth::User()->userName}}</a>
                        </li> -->

                        <li>
                            <div class="btn dropdown-toggle" data-toggle="dropdown" id="box_tb" style="transform: translate(0,10px)">
                            Chào {{Auth::User()->userName}}
                            </div>
                                <ul class="dropdown-menu" style="transform: translate(0,20px)">
                                    <li><a href="{{url('auth/logout')}}">Đăng xuất</a></li>
                                    <li class="{{(\Request::path() == 'User/'.\Auth::user()->hash) ? 'active' : ''}}"><a
                                    href="{{url('User',[Auth::User()->hash])}}" style="border: 1px solid transparent;" >Chỉnh sửa thông tin</a>
                                    </li>
                                    <li><a href="{{url('profile')}}">Thông tin cá nhân</a></li>
                                </ul>
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
