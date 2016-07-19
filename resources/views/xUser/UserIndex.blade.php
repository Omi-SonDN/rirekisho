@extends('xCV.template')
<title>Danh sách người dùng</title>
@section('content')
    <div id="list_table" data-table="table-user">
        <div class="table_action">
            <div class="top_action"></div>
            <div class="bottom_action">
                <ul class="tabs">
                    <li><a href="{{route('getadduser')}}"><i class="fa fa-plus" style="margin: 0 auto;"></i> Thêm User</a></li>
                    <li class="tab">
                        Sắp xếp danh sách:
                    </li>
                    <li class="tab select" data-field="name" data-sort="asc" data-keyword="">
                        <a>Tên </a>
                    </li>
                    <li class="tab select" data-field="email" data-sort="asc" data-keyword="">
                        <a>Email </a>
                    </li>
                    <li class="" data-field="updated_at" data-sort="asc" data-keyword="">
                        <a>Ngày cập nhật</a>
                    </li>
                    <li class="" data-field="role" data-sort="asc" data-keyword="">
                        <a>Role</a>
                    </li>
                </ul>
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
        @include('includes.flash-alert');
        <div>
            <table id="the_list">
                <thead>
                <tr>
                    <th style="width: 17%;"></th>
                    <th style="width: 5%;">#</th>
                    <th data-field="name" ><a>Name</a></th>
                    <th data-field="email" style="width: 28%;"><a>Email</a></th>
                    <th style="width: 10%;">Type</th>
                    <th style="width: 10%;">Action</th>
                </tr>
                </thead>
                <tbody id="list-table-body" data-reload="true">
                @if(!$count)
                    <tr class="no-record">
                        <td colspan="5">
                            <div style="text-align: center;">There are no records to display</div>
                        </td>
                    </tr>
                @else
                    <?php $i = 0;?>
                    @foreach ($users as $row)
                        <tr class="data">
                            <td class="image">
                                <div style=" position: relative;height: 100px;width: 100px;">
                                    @if($row->image!="")
                                        <img style="height: 100px; width: 100px;"
                                             src=<?php echo "/img/thumbnail/thumb_" . $row->image;?> >
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
                            <td class="rank">{{++$i}}</td>
                            <td class="name"><i class="fa fa-pencil fa-fw"></i>&nbsp<a href="{{url('User',$row->hash)}} ">{{ $row->name }} </a></td>
                            <td class="name">{{ $row->email }}  </td>
                            <td> {{ $row->getRole() }}</td>
                            <td>
                                {{--<a href="url('User',[$row->hash ])">Sửa</a>--}}{{--{{route('destroyuser')}}--}}
                                <a href="{{route('getdeluser', $row->hash)}}" onclick="return xacnhanxoa('Bạn có chắc là xóa không!')" title="Delete {{$row->name}}"><i class="fa fa-trash-o  fa-fw"></i>&nbsp Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr id="number-result" style="display: none;">
                        <td colspan="5">Có {{$count }} kết quả</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <?php echo $users->render(); ?>
        </div>


    </div>

@stop

