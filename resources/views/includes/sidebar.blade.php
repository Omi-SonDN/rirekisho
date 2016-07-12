<div id="mySidenav" class="sidenav">
    <ul class="">
        @can('Applicant')
            <li class="nav-link"></li>
            <li class="nav-link"><a href="{{url('CV',[$CV->hash,'edit'])}}">Tạo CV mới</a></li>
            <li class="nav-link"><a href="{{url('CV',[$CV->hash])}}">Xem CV</a></li>
            <li class="nav-link"><a href="{{url('CV',[$CV->hash,'view'])}}">Xem CV 2</a></li>
        @endcan
        @can('Visitor')
            <li class="bookmark-link">
                <div style="display: table;width:90%; ">
                    <a href="#" style="display: table-cell;width: auto;">
                        Bookmark
                    </a>
                    <a data-action="reload" style="display: table-cell;color:gray;width: 10%; font-weight: 200;"
                       class="moving">
                        <i class=" fa fa-refresh"></i>
                    </a>
                </div>
            </li>
            @foreach($list as $item)
                <li class="track-list">
                    <label style="display: table;width:100%;">
                        <span style="display: table-cell;width: 30px;"></span>
                        <a href="{{url('CV',[$item])}}"
                           style="display: table-cell; width: 145px; font-size: 15px;font-style: normal; font-weight: 400;">{{$item->Last_name}} {{$item->First_name}}</a>
                        <input data-action="deleteBookmark" data-bookmark-id="{{$item->user->hash}}"
                               class="plus-button" type="button" style="display: table-cell;width: 25px;" value="Xoá ">
                    </label>
                </li>
            @endforeach
            <li class="active nav-link"><a href="{{url('CV')}}">Danh sách CV</a>
            </li>
        @endcan
        <li class="nav-link">
            <a href="{{url('User',[Auth::User()->hash])}}">Cài đặt</a>
        </li>
    </ul>
</div>