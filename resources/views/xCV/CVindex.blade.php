@extends('xCV.template')
<title>Danh sách</title>
@section('content')

<div id="list_table" data-table="table-resume">

    <div style="width: 1200px; height: 40px; float: right; margin-top: 0px">
        <p id="advancedSearch" style="float: right">Advanced search</p>
        <!--advance search-->
        <div id = "adSearch" style="width: 1000px; height: 50px; display: block; float: left; padding-left: 200px">
        <?php
            $id = DB::select('select * from positions');
            $status = DB::select('select * from status');
        ?>
        <!--<form id="search" method="POST" action="{{-- url('CV/adSearch') --}}">-->
            <input id = "nameSearch" type="text" style="height: 25px" placeholder="Name" name="name" value="">
            <select id = "positionsSearch" name="positions" value="" style="height: 25px">
                <option value="">--Vị trí tuyển dụng--</option>
                @foreach ($id as $position)
                    <option value="{{$position->id}}">{{$position->name}}</option>
                @endforeach
            </select>
            <select id = "statusSearch" name="Status" value="" style="height: 25px;">
                <option value="">--Status--</option>
                @can('Visitor')
                <option value="1">Chờ duyệt</option>
                <option value="2">Đồng ý phỏng vấn</option>
                @endcan
                @can('Admin')
                @foreach ($status as $sta)
                    <option value="{{$sta->id}}">{{$sta->status}}</option>
                @endforeach
                @endcan
            </select>
            <input id="submitSearch" type="submit" name="submit" value="Search" style="height: 25px">
        <!--</form>-->
        </div>
        <!--advance search-->
    </div>
    <div style="float: left; width: 200px">
        <div style="float: left; width: 50px">Show</div>
        <div style="float: left; width: 70px">
            <select id = "show_entries" name="show_entries" value="" style="height: 25px; width : 50px; float: left">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">25</option>
                <option value="15">50</option>
                <option value="15">100</option>
            </select>
        </div>
        <div style="float: left; width: 70px">entries</div>
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
              <th style="width: 150px"></th>
              <th style="width: 50px"></th>
              <th class = "sorting" data-field= "name" data-sort = "asc"  style="width: 150px">Họ và tên</th>
              <th class = "sorting" data-field= "Gender" data-sort = "asc" style="width: 100px">Giới tính</th>
              <th class = "sorting" data-field= "Birth_date" data-sort = "asc" style="width: 100px">Tuổi</th>
              @can('Visitor')
              <th class = "sorting" data-field= "positions" data-sort = "asc" style="width: 110px">Apply to</th>
              <th class = "sorting" data-field= "Status" data-sort = "asc" style="width: 180px">Status</th>
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

</div>
<div class="pagination pull-right">
    <ul>
        @if ($CVs->currentPage() != 1)
            <li class="pre"><a href="{!! $CVs->url($CVs->currentPage()-1) !!}">Prev</a></li>
        @elseif ($CVs->currentPage() == 1)
            <li class="active"><a onclick="return false" href="javascript:void(0)">Prev</a></li>
        @endif
        @for ($i = 1; $i <= $CVs->lastPage(); $i++)
            <li class="{!! $CVs->currentPage() == $i ? 'active' : null !!}"><a href="{!! $CVs->url($i) !!}">{!! $i !!}</a></li>
        @endfor
        @if ($CVs->currentPage() != $CVs->lastPage())
            <li><a href="{!! $CVs->url($CVs->currentPage()+1) !!}">Next</a></li>
        @elseif ($CVs->currentPage() == $CVs->lastPage())
            <li class="active"><a  onclick="return false" href="javascript:void(0)">Next</a></li>
        @endif
    </ul>

<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('js/CV_changeStatus.js') }}"></script>
<script src="{{ asset('js/email_send.js') }}"></script>


@stop

