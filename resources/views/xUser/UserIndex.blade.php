@extends('xCV.template')
<title>Danh sách người dùng</title>
@section('content')
    <div id="list_table" data-table="table-user">
        <div class="table_action">
            <div class="top_action"></div>
            <div class="bottom_action">
                <button class='btn btn-primary'><a href="{{route('getadduser')}}"><i class="fa fa-plus" style="margin: 0 auto;"></i> Thêm User</a></button>
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
                        <th class="header-none-sort filter-false" filter-false>#</th>
                        <th class="header-none-sort filter-false">Avatar</th>

                        <th data-field="name" ><a>Name</a></th>
                        <th data-field="email"><a>Email</a></th>
                        <th class="first-name filter-select" data-placeholder="Select a type">Type</th>
                        {{--<th class="header-none-sort"></th>--}}
                        <th class="header-none-sort filter-false"><input class="fix-class-check checkAll" type="checkbox" /></th>
                    </tr>
                </thead>
                <tbody id="list-table-body" data-reload="true">
                @if(!count($users))
                    <tr class="no-record">
                        <td colspan="6">
                            <div style="text-align: center;">There are no records to display</div>
                        </td>
                    </tr>
                @else
                    @foreach ($users as $key => $row)
                        <tr class="data">
                            <td></td>
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
                            <td class="name"><i class="fa fa-pencil fa-fw"></i>&nbsp<a href="{{url('User',$row->hash)}}" title="Edit {{ $row->name }}">{{ $row->name }} </a></td>
                            <td class="name">{{ $row->email }}  </td>
                            <td> {{ $row->getRole() }}</td>
                            <td>
                                <input class="fix-class-check cb-element" type="checkbox" value="{{$row->hash}}" name="arrDel[]" style="opacity: 1">
                                <a href="{{route('getdeluser', $row->hash)}}" onclick="return xacnhanxoa('Bạn có chắc là xóa không!')" title="Delete {{$row->name}}"><i class="fa fa-trash-o  fa-fw"></i>&nbsp Delete</a>
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
                    # per page:
                    <a href="#" class="current">10</a> |
                    <a href="#">20</a> |
                    <a href="#">40</a> |
                    <a href="#">75</a>
                </span>
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
@stop

