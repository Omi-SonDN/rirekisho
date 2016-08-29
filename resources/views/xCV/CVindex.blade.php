@extends('xCV.template')
@section('title')Danh sách @endsection

@section('content')

    <div id="list_table" data-table="table-resume">

    <div class="controlle-search col-md-12 box_white block_ntv_dangnhap">
        {{--<p id="advancedSearch" style="float: right">Advanced search</p>--}}
        <!--advance search-->
        <div id="adSearch">
        <!--<form id="search" method="POST" action="{{-- url('CV/adSearch') --}}">-->
            <input id = "nameSearch" class="set_{{\Auth::user()->hash}}" type="text" placeholder="Name" name="name" value="{{ (Request::has('search')) ? Request::input('search') : ''}}" onkeyup="onclickSetData(this, this.name)">
            <select id = "positionsSearch" class="set_{{\Auth::user()->hash}}" name="positions" onchange="onclickSetData(this);">
                <option value="">--Vị trí tuyển dụng--</option>
                @foreach ($_Position as $position)
                    <option @if (Request::has('apply_to')) {{ (Request::input('apply_to') == $position->id) ? 'selected' : ''}} @endif value="{{$position->id}}">{{$position->name}}</option>
                @endforeach
            </select>

                <select id="statusSearch" class="set_{{\Auth::user()->hash}}" name="Status"
                        onchange="onclickSetData(this);">
                    <option value="">-- Trạng thái --</option>
                    @foreach ($_Status as $sta)
                        <option @if (Request::has('status')) {{ (Request::input('status') == $sta->id) ? 'selected' : ''}}
                                @endif value="{{$sta->id}}">{{$sta->status}}</option>
                    @endforeach

                </select>
                <input id="submitSearch" type="submit" name="submit" value="Tìm kiếm">
                <!--</form>-->
            </div>
            
            <!--advance search-->
        <div class="box_search">
            <div style="float: left; width: 200px">
                <div style="float: left; width: 60px">Hiển thị</div>
                <div style="float: left; width: 60px">
                    <select class="set_{{\Auth::user()->hash}}" id="show_entries" name="show_entries"
                            style="height: 25px; width : 50px; float: left" onchange="onclickSetData(this);">
                        @foreach(config('app.list_per_page') as $its)
                            <option @if (Request::has('per_page'))
                                {{ (Request::input('per_page') == $its) ? 'selected' : ''}}@endif value="{{$its}}">{{$its}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="float: left; width: 70px">mục</div>
            </div>
            <div class="clearfix"></div>
            <div class="box_white block_ntv_dangnhap" style="background-image: linear-gradient(to bottom, #fff 0px, #e0e0e0 100%); background-repeat: repeat-x; ">
                <div class="col-lg-6">
                    <label>Thể loại CV</label>&nbsp;
                    <label class="radio-inline"><input type="radio" class="set_{{\Auth::user()->hash}}"
                                                       onclick="onclickSetData(this)" name="txtType" value="2"
                                                       checked/> Tất cả</label>
                    <label class="radio-inline"><input type="radio" onclick="onclickSetData(this)" name="txtType"
                                                       value="0"/>CV từng bước</label>
                    <label class="radio-inline"><input type="radio" onclick="onclickSetData(this)" name="txtType"
                                                       value="1"/> CV đính kèm</label>
                </div>
                @can('Admin')
                <div class="col-lg-6">
                    <label>Kiểm định CV</label>&nbsp;
                    <label class="radio-inline"><input type="radio" class="set_{{\Auth::user()->hash}}"
                                                       onclick="onclickSetData(this)" name="txtActive" value="2"
                                                       checked/> Tất cả</label>
                    <label class="radio-inline"><input type="radio" onclick="onclickSetData(this)" name="txtActive"
                                                       value="1"/> Đã kích hoạt</label>
                    <label class="radio-inline"><input type="radio" onclick="onclickSetData(this)" name="txtActive"
                                                       value="0"/> Chưa kích hoạt</label>
                </div>
                @endcan
                @can('SuperAdmin')
                <div class="col-lg-6">
                    <label>Trạng thái CV</label>&nbsp;
                    <label class="radio-inline"><input type="radio" class="set_{{\Auth::user()->hash}}"
                                                       onclick="onclickSetData(this)" name="txtLive" value="2" checked/>
                        Tất cả</label>
                    <label class="radio-inline"><input type="radio" onclick="onclickSetData(this)" name="txtLive"
                                                       value="1"/> Trực tuyến</label>
                    <label class="radio-inline"><input type="radio" onclick="onclickSetData(this)" name="txtLive"
                                                       value="0"/> Không trực tuyến</label>
                </div>
                @endcan
            </div>
        </div>

            <div class="clearfix"></div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" id="modal-content"></div>
                </div>
            </div>

        </div>
        <div class="modal fade" id="emailPreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="preview-content"></div>
            </div>
        </div>

            <table id="example" class="dataTable" data-sort="" data-field="">
                <thead>
                <tr>
                    <th class="ab set_{{\Auth::user()->hash}}" data-sort="" data-field="" style="width: 90px">Ảnh</th>
                    <th @if (Request::has('data-field') && Request::has('data-sort'))
                        @if(Request::input('data-field') == 'name')
                            @if (Request::input('data-sort') == 'asc ')
                                class="sorting_asc" data-sort="asc"
                                @else
                                class="sorting_desc" data-sort="desc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                onclick="onclickSetData(this);" data-field="name" style="width: 150px">Họ và tên
                    </th>
                    <th @if (Request::has('data-field') && Request::has('data-sort'))
                        @if(Request::input('data-field') == 'Gender')
                            @if (Request::input('data-sort') == 'asc ')
                                class="sorting_asc" data-sort="asc"
                                @else
                                class="sorting_desc" data-sort="desc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                onclick="onclickSetData(this);" data-field="Gender"  style="width: 100px">G.Tính
                    </th>
                    <th @if (Request::has('data-field') && Request::has('data-sort'))
                        @if(Request::input('data-field') == 'Birth_date')
                            @if (Request::input('data-sort') == 'asc ')
                                class="sorting_asc" data-sort="asc"
                                @else
                                class="sorting_desc" data-sort="desc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                onclick="onclickSetData(this);" data-field="Birth_date" style="width: 50px">Tuổi
                    </th>
                    @can('Visitor')
                    <th @if (Request::has('data-field') && Request::has('data-sort'))
                        @if(Request::input('data-field') == 'positions')
                            @if (Request::input('data-sort') == 'asc ')
                                class="sorting_asc" data-sort="asc"
                                @else
                                class="sorting_desc" data-sort="desc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                onclick="onclickSetData(this);" data-field="positions" style="width: 110px">Ví trí tuyển
                        dụng
                    </th>
                    <th @if (Request::has('data-field') && Request::has('data-sort'))
                        @if(Request::input('data-field') == 'Status')
                            @if (Request::input('data-sort') == 'asc ')
                                class="sorting_asc" data-sort="asc"
                                @else
                                class="sorting_desc" data-sort="desc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                @else
                                class="sorting" data-sort="asc"
                                @endif
                                onclick="onclickSetData(this);" data-field="Status" style="width: 180px">Trạng thái
                    </th>
                    @endcan
                    @can('Admin')
                    <th class="ab" style="width: 30px;color: #666699;font-size: 13pt;">Hành động</th>
                    @endcan

                </tr>
                </thead>
                <tbody id="list-table-body" data-reload="true">
                @include('includes.table-result')

                </tbody>
            </table>

            <div class="pagination pull-right">
                {!! $get_paging or '' !!}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var id_local = '<?php echo Auth::user()->hash; ?>';
    </script>
@stop

