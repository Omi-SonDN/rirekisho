<header id="header">
    <!-- BEGIN MENU -->
    <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header fix-hedar-logo">
                    <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- LOGO -->
                    <!-- TEXT BASED LOGO -->
                    {{-- <a class="navbar-brand" href="/"><span>Ominext JSC</span></a> --}}

                    <!-- IMG BASED LOGO  -->
                    <a class="navbar-brand" href="/"><img src="{{asset('frontend/img/logo.png')}}" alt="logo"></a>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul id="top-menu" class="nav navbar-nav navbar-right main-nav top_header_">
                        <li class="{{(URL::current() == url('/')) ? 'active' : ''}}"><a href="{{url('/')}}">Trang
                                chủ</a></li>
                        @if (Auth::check())
                            @can('Admin')
                            <li class="{{(URL::current() == url('User')) ? 'active' : ''}}"><a
                                        href="{{url('User')}}" style="color: #f36f21;">User</a></li>
                            @endcan
                            @can('Visitor')
                            <li class="{{(URL::current() == url('CV')) ? 'active' : ''}}"><a href="{{url('CV')}}" style="color: #f36f21;">Quản
                                    lý CV</a></li>
                            @endcan
                            @can('Applicant')
                            <li class="{{(URL::current() == url('CV/info')) ? 'active' : ''}}"><a href="CV/info" style="color: #f36f21;">Tạo CV</a></li>
                            @endcan

                            {{--<li><a href="#">Events</a></li>--}}
                            {{--<li><a href="#">Gallery</a></li>--}}
                            {{--<li><a href="#">Blog</a></li>--}}
                            {{--<li><a href="about">Contact</a></li>--}}
                            <li class="dropdown fixavatar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    <img
                                    @if(Auth::user()->image)
                                        src="{!! asset('/img/thumbnail/thumb_'.Auth::user()->image) !!}"
                                        @else
                                        src="{!! asset('/frontend/img/no-avatar.jpg') !!}"
                                        @endif
                                        title="{{Auth::user()->userName}}" width="44" height="44" border="0">
                                        <span class="caret" style="color: #f36f21;"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="profile">Thông tin cá nhân</a></li>
                                    @can('SuperAdmin')
                                    <li><a href="{{url('positions')}}">Quản lý vị trí tuyển dụng</a></li>
                                    <li><a href="{{url('status')}}">Quản lý trạng thái</a></li>
                                    <li><a href="{{\URL('CV/statistic')}}">Thống kê</a></li>
                                    @endcan
                                    @can('Applicant')


                                    @if (count($pCV))
                                        @if(count($pCV) > 1)
                                            @foreach($pCV as $items)
                                                @if ($items->type_cv)
                                                    <li class=""><a href="{{\URL('CV/upload/'.$items->Hash)}}">Xem CV
                                                            đính kèm</a>
                                                    </li>
                                                @else
                                                    <li class=""><a href="{{url('CV',[$items->hash])}}">Xem CV từng
                                                            bước</a></li>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($pCV as $items)
                                                @if ($items->type_cv)
                                                    <li class=""><a href="{{action('CVController@create')}}">Tạo CV từng
                                                            bước</a></li>
                                                    <li class=""><a href="{{\URL('CV/upload/'.$items->hash)}}">Xem CV
                                                            đính kèm</a>
                                                    </li>
                                                @else
                                                    <li class=""><a href="{{url('CV',[$items->hash])}}">Xem CV từng
                                                            bước</a></li>
                                                    <li class=""><a href="{{action('CVController@getCreateUpload')}}">Tạo
                                                            CV đính kèm</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    @else
                                        <li class=""><a href="{{route('CV.create')}}">Tạo CV từng bước</a></li>
                                        <li class=""><a href="{{action('CVController@getCreateUpload')}}">Tạo CV đính
                                                kèm</a></li>
                                    @endif
                                    @endcan
                                    <li><a href="{{\URL('auth/logout')}}">Thoát</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{\URL('auth/login')}}" style="color: #f36f21;">Đăng nhập</a></li>
                            <li><a href="{{\URL('auth/register')}}" style="color: #f36f21;">Đăng ký</a></li>
                        @endif
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
    </div>
    <!-- END MENU -->
</header>