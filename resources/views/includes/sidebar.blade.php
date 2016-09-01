<div id="mySidenav" class="sidenav">
    <ul class="">
        @can('Applicant')
        <li class="nav-link"></li>
        <li class="nav-link">
            <a class="have-submenu" href="{{action('CVController@getInfo')}}">CV của tôi</a>
            <i class="fa fa-angle-down pull-right add-submenu" data-toggle="collapse" data-target="#submenu1"></i>
            <ul class="nav collapse" id="submenu1">
                {{--<li class=""><a href="{{action('CVController@getInfo')}}">Danh sách CV của tôi</a></li>--}}
                @if (count($CV))
                    @if(count($CV) > 1)
                        @foreach($CV as $items)
                            @if ($items->type_cv)
                                <li class=""><a href="{{\URL('CV/upload/'.$items->Hash)}}">Xem CV đính kèm</a>
                                </li>
                            @else
                                <li class=""><a href="{{url('CV',[$items->hash])}}">Xem CV từng bước</a></li>
                            @endif
                        @endforeach
                    @else
                        @foreach($CV as $items)
                            @if ($items->type_cv)
                                <li class=""><a href="{{action('CVController@create')}}">Tạo CV từng bước</a></li>
                                <li class=""><a href="{{\URL('CV/upload/'.$items->hash)}}">Xem CV đính kèm</a>
                                </li>
                            @else
                                <li class=""><a href="{{url('CV',[$items->hash])}}">Xem CV từng bước</a></li>
                                <li class=""><a href="{{action('CVController@getCreateUpload')}}">Tạo CV đính kèm</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @else
                    <li class=""><a href="{{route('CV.create')}}">Tạo CV từng bước</a></li>
                    <li class=""><a href="{{action('CVController@getCreateUpload')}}">Tạo CV đính kèm</a></li>
                @endif
            </ul>
        </li>
        @endcan
        @can('Visitor')
        <li class="bookmark-link">
            <div style="display: table;width:90%; ">
                <a href="#" style="display: table-cell;width: auto;">
                    Bookmark
                </a>
                <a data-action="reload" style="display: table-cell;color:gray;width: 10%; font-weight: 200;"
                   class="moving">
                    <i class="fa fa-refresh"></i>
                </a>
            </div>
        </li>

        @foreach($list as $item)
            @if($item ->live)
            <li class="track-list">
                <label style="display: table;width:100%;">
                    <span style="display: table-cell;width: 30px;"></span>
                    <a href="{{($item->type_cv) ? url('CV/upload',[$item]) : url('CV',[$item])}}"
                       style="display: table-cell; width: 145px; font-size: 15px;font-style: normal; font-weight: 400;">{{$item->User->Last_name}} {{$item->User->First_name}}
                    </a>
                    <input data-action="deleteBookmark" data-bookmark-id="{{$item->User->hash}}"
                           class="plus-button" type="button" style="display: table-cell;width: 25px;" value="Xoá ">
                </label>
            </li>
            @endif
        @endforeach
        @endcan
        @can('Admin')
            <li class="{{(URL::current() == url('User')) ? 'active' : ''}} nav-link"><a
                    href="{{url('User')}}">Quản lý tài khoản</a></li>
            <li class="nav-link"><a href="{{\URL('CV/statistic')}}">Thống kê</a></li>
        @endcan
        @can('SuperAdmin')
        <li class="nav-link"><a href="#" >Cài đặt </a>
            {{--<i class="fa fa-angle-down"></i>--}}
            <i class="fa fa-angle-down pull-right add-submenu" data-toggle="collapse" data-target="#submenu-sa"></i>
            <ul class="nav collapse" id="submenu-sa">
                <li><a href="{{url('positions')}}">Quản lý vị trí tuyển dụng</a></li>
                <li><a href="{{url('status')}}">Quản lý trạng thái</a></li>
                <li><a href="{{url('group_user')}}">Quản lý nhóm người dùng</a></li>
            </ul>
        </li>
        <li class="nav-link">
            <a href="#">Frontend </a>
            <i class="fa fa-angle-down pull-right add-submenu" data-toggle="collapse" data-target="#submenu-fr"></i>
            {{--<i class="fa fa-angle-down"></i>--}}
            <ul class="nav collapse" id="submenu-fr">
                <li><a href="{{url('fgeneral')}}">Thông tin chung</a></li>
                <li><a href="{{url('slide/list')}}">Slider</a></li>
            </ul>
        </li>
        @endcan
    </ul>
</div>
