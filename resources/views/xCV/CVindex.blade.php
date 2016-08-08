@extends('xCV.template')
<title>Danh sách</title>
@section('content')

<div id="list_table" data-table="table-resume">

    <div class="controlle-search col-md-12">
        {{--<p id="advancedSearch" style="float: right">Advanced search</p>--}}
        <!--advance search-->
        <div id="adSearch">
        <!--<form id="search" method="POST" action="{{-- url('CV/adSearch') --}}">-->
            <input id = "nameSearch" type="text" placeholder="Name" name="name" value="{{ (Request::has('search')) ? Request::input('search') : ''}}" onchange="adSearchChange('', this.value)">
            <select id = "positionsSearch" name="positions" onchange="adSearchChange('', '', this)">
                <option value="">--Vị trí tuyển dụng--</option>
                @foreach ($_Position as $position)
                    <option @if (Request::has('apply_to')) {{ (Request::input('apply_to') == $position->id) ? 'selected' : ''}} @endif value="{{$position->id}}">{{$position->name}}</option>
                @endforeach

            </select>

            <select id = "statusSearch" name="Status" onchange="adSearchChange('', '', '', this)">
                <option value="">--Status--</option>
                @can('Visitor')
                <option value="1">Chờ duyệt</option>
                <option value="2">Đồng ý phỏng vấn</option>
                @endcan
                @can('Admin')
                @foreach (\App\Status::all() as $sta)
                    <option @if (Request::has('status')) {{ (Request::input('status') == $sta->id) ? 'selected' : ''}} @endif value="{{$sta->id}}">{{$sta->status}}</option>
                @endforeach
                @endcan
            </select>
            <input id="submitSearch" type="submit" name="submit" value="Search">
        <!--</form>-->
        </div>
        <!--advance search-->

        <div style="float: left; width: 200px">
            <div style="float: left; width: 50px">Show</div>
            <div style="float: left; width: 70px">
                <select id = "show_entries" name="show_entries" style="height: 25px; width : 50px; float: left" onchange="adSearchChange(this)">
                    <option @if (Request::has('per_page')) {{ (Request::input('per_page') == 10) ? 'selected' : ''}} @endif value="10">10</option>
                    <option @if (Request::has('per_page')) {{ (Request::input('per_page') == 15) ? 'selected' : ''}} @endif value="15">15</option>
                    <option @if (Request::has('per_page')) {{ (Request::input('per_page') == 25) ? 'selected' : ''}} @endif value="25">25</option>
                    <option @if (Request::has('per_page')) {{ (Request::input('per_page') == 50) ? 'selected' : ''}} @endif value="50">50</option>
                    <option @if (Request::has('per_page')) {{ (Request::input('per_page') == 100) ? 'selected' : ''}} @endif value="100">100</option>
                    <option @if (Request::has('per_page')) {{ (Request::input('per_page') == 200) ? 'selected' : ''}} @endif value="200">200</option>
                </select>
            </div>
            <div style="float: left; width: 70px">entries</div>
        </div>
    </div>
    <div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">
            </div>
        </div>
    </div>

    <table id="example" class="dataTable" data-sort="" data-field="">
        <thead>
        <tr>
            <th class="ab" style="width: 150px"></th>
            <th class="ab" style="width: 50px"></th>
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
                    class="sorting_asc" data-sort="asc"
                @endif
                onclick="adSearchChange('', '', '', '', this)" data-field="name" style="width: 150px">Họ và tên</th>
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
                onclick="adSearchChange('', '', '', '', this)" data-field="Gender"  style="width: 100px">Giới tính</th>
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
                onclick="adSearchChange('', '', '', '', this)" data-field="Birth_date" style="width: 100px">Tuổi</th>
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
                onclick="adSearchChange('', '', '', '', this)" data-field="positions" style="width: 110px">Apply to</th>
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
                onclick="adSearchChange('', '', '', '', this)" data-field="Status" style="width: 180px">Status</th>
            @endcan
            @can('Admin')
                <th style="width: 30px;color: #666699;font-size: 13pt;">Hành động</th>
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
<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('js/CV_changeStatus.js') }}"></script>
<script src="{{ asset('js/email_send.js') }}"></script>

@stop

