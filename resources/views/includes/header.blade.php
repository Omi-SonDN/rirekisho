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
                        <li>
                            <div class="btn dropdown-toggle" data-toggle="dropdown" id="box_tb">
                            Thông báo<span class="caret"></span>
                            </div>
                                <?php $cv_active = DB::table('cvs')
                                    ->join('users','users.id', '=', 'cvs.user_id')
                                    ->select(
                                            'users.Last_name as Last_name',
                                            'users.First_name as First_name',
                                            'cvs.id as id',
                                            'cvs.type_cv as type_cv',
                                            'cvs.created_at as created_at'
                                    )
                                    ->where('cvs.Active', '=', 0)
                                    ->where('cvs.live', '=', 1)
                                    ->orderBy('cvs.created_at', 'asc')
                                    ->get();
                                ?>
                                @if($cv_active != null)
                                <div class="number_tb">{{count($cv_active)}}</div>
                                    <ul class="dropdown-menu" id="new_CV">
                                        @foreach($cv_active as $cv_tb)
                                            <li>
                                            @if ($cv_tb->type_cv)
                                                <a href="{{ \URL('CV/upload/'. \App\MyLibrary\myFunction::encodeHashId($cv_tb->id)) }}">{{$cv_tb->Last_name.' '.$cv_tb->First_name}} <small><i class="notes-cv">[Tạo CV {{date_format(date_create($cv_tb->created_at), 'd-m-Y')}}]</i></small></a>
                                            @else
                                                <a href="{{ \URL('CV/'. \App\MyLibrary\myFunction::encodeHashId($cv_tb->id)) }}">{{$cv_tb->Last_name.' '.$cv_tb->First_name}} <small><i class="notes-cv">[Tạo CV {{date_format(date_create($cv_tb->created_at), 'd-m-Y')}}]</i></small></a>
                                            @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                        </li>
                        @endcan

                        <li>
                            <div class="btn dropdown-toggle" data-toggle="dropdown" id="box_tb" style="transform: translate(0,10px)">
                            Chào {{Auth::User()->userName}}
                            </div>
                                <ul class="dropdown-menu" style="transform: translate(0,20px)">
                                    <li><a href="{{url('auth/logout')}}">Đăng xuất</a></li>
                                    <li class="{{(\Request::path() == 'User/'.\Auth::user()->hash) ? 'active' : ''}}"><a
                                    href="{{url('User',[Auth::User()->hash])}}" style="border: 1px solid transparent;" >Chỉnh sửa tài khoản</a>
                                    </li>
                                    <li><a href="{{url('profile/'. Auth::User()->hash)}}">Thông tin tài khoản</a></li>
                                </ul>
                        </li>
                        
                    </ul>

                </div>
                <!-- /.navbar-collapse -->


            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!--hr /-->
</div>
