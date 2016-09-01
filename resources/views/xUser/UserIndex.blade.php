@extends('xCV.template')
@section('title')Danh sách người dùng @endsection

@section('content')
    <div id="list_table" data-table="table-user">
        <div class="table_action">
            <div class="top_action"></div>
            <div class="bottom_action">
                <a href="{{route('getadduser')}}" class='btn btn-primary' style="color: #fff"><i class="fa fa-user-plus" style="margin: 0 auto;">
                    </i> Thêm tài khoản</a>
                <span class="active-del"></span>

                <div class="wait-modal-load"></div>
                <div class="search">
                    <div class="search-forms">
                        <label class="search_icon" for="text">
                            <i class="fa fa-search"></i>
                        </label>
                        <input id="table-search" class="list_search " placeholder="Search " type="text">
                    </div>
                </div>
            </div>
            <div class="clear-fix"></div>
        </div>
        @include('includes.flash-alert')
        <div>
            <table id="datatables" class="tableuser tablesorter">
                <thead>
                <tr>
                    <th class="header-none-sort filter-false">Avatar</th>
                    <th class="sort-tb" data-field="name"><a>Tên tài khoản</a></th>
                    <th class="sort-tb" data-field="email"><a>Email</a></th>
                    <th class="header-none-sort sort-tb filter-select" filter-false>G.Tính</th>
                    <th class="header-none-sort sort-tb">Sinh nhật</th>
                    <th class="header-none-sort sort-tb">Số điện thoại</th>
                    <th class="header-none-sort sort-tb filter-select">Số CV</th>
                    <th class="first-name sort-tb filter-select" data-placeholder="Select a type">Type</th>
                    <th class="header-none-sort filter-false"><input class="fix-class-check checkAll" type="checkbox"/>
                    </th>
                </tr>
                </thead>
                <tbody id="list-table-body" data-reload="true">
                @if(!count($users))
                    <tr class="no-record">
                        <td colspan="100%">
                            <div style="text-align: center;">Chưa có thông tin mô tả nào</div>
                        </td>
                    </tr>
                @else
                    @foreach ($users as $key => $row)
                        <tr class="data">
                            <td class="image">
                                <div style=" position: relative;height: 50px;width: 50px;">
                                    @if($row->image!="" && file_exists(public_path($path = '/img/thumbnail/thumb_'.$row->image)))
                                        <img style="height: 50px; width: 50px;" src="{{asset($path)}}">
                                    @else
                                        <div class="dropzone-text-place"
                                             style="background-color:{{$row->getThemeColor()}} ">
                                            <span class="dropzone-text letter-avatar"
                                                  style="color: {{$row->getTextColor()}};">
                                                {{substr(trim($row->name), 0, 1)}}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="name"><a href="{{url('User',$row->hash)}}" title="Sửa {{ $row->userName }}">{{ $row->userName }} </a>
                            </td>
                            <td class="name">{{ $row->email }}  </td>
                            <td>{{$row->JGender}}</td>
                            <td>{{$row->Birthday}}</td>
                            <td>{{$row->Phone}}</td>
                            <td>{{$row->CV->count()}}</td>
                            <td> {{ $row->getRole() }}</td>
                            <td>
                                <div class="col-lg-12">
                                    <input class="fix-class-check cb-element" type="checkbox"
                                           value="{{$row->hash}}"
                                           name="arrDel[]">
                                </div>
                                <div class="col-lg-12 mt8">
                                    <table style="margin: 0 auto">
                                        <tr>
                                            <td>
                                                <a href="{{url('User',$row->hash)}}" title="Sửa {{ $row->userName }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                            </td>
                                            <td>
                                                <a href="{{route('getdeluser', $row->hash)}}" onclick="return xacnhanxoa('Bạn có chắc là xóa không!')" title="Xóa {{$row->userName}}">
                                                    <span class="fa fa-trash-o" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <?php //echo $users->render(); ?>

            <!-- pagination jquery lib tablesorter -->
            <div id="" class="pager pages-tablesorter">
                <span class="left">
                    Số bảng ghi:
                    @foreach(config('app.list_per_page') as $items)
{{--                        <a href="#" class="{{$items == config('app.per_page') ? 'current' : ''}}">{{$items}}</a> |--}}
                        <a href="#" class="">{{$items}}</a> |
                    @endforeach
                </span>
                <span id="{{'show'. \Illuminate\Support\Facades\Auth::user()->hash}}"></span>
                <span class="pagedisplay"></span>
                <span class="right">
                    <span class="prev">
                        <img src="http://mottie.github.com/tablesorter/addons/pager/icons/prev.png"/> Prev&nbsp;
                    </span>
                    <span class="pagecount"></span>
                    &nbsp;<span class="next">Next
                        <img src="http://mottie.github.com/tablesorter/addons/pager/icons/next.png"/>
                    </span>
            </span>
            </div>


        </div>
    </div>
@stop

