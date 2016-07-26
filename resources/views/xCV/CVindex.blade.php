@extends('xCV.template')
<title>Danh sách</title>
@section('content')

<div id="list_table" data-table="table-resume">
    <div class="table_action">
        <div class="top_action"></div>
        <div class="bottom_action">
            <ul class="tabs">
            </ul>

            <div class="search" style="float: right">
                <div class="search-forms">
                    <label class="search_icon" for="text">
                        <i class="fa fa-search"></i>
                    </label>
                    <input id="table-search" class="list_search " placeholder="Search " type="text">
                </div>
            </div>
        </div>
        <div class="clear-fix"></div>
        <div style="width: 1200px; height: 60px; float: right; margin-top: 20px">
            <p id="advancedSearch" style="float: right">Advanced search</p>
            <!--advance search-->
            <div id = "adSearch" style="width: 1000px; height: 50px; display: none; float: left; padding-left: 200px">
                <?php
                    $id = DB::select('select * from positions');
                    $status = DB::select('select * from status');
                ?>
                <!--<form id="search" method="POST" action="{{ url('CV/adSearch') }}">-->
                    <input id = "nameSearch" type="text" style="height: 25px" placeholder="Name" name="name" value="">
                    <select id = "positionsSearch" name="positions" value="" style="height: 25px">
                        <option>Vị trí tuyển dụng</option>
                        @foreach ($id as $position)
                            <option value="{{$position->name}}">{{$position->name}}</option>
                        @endforeach
                    </select>
                    <select id = "statusSearch" name="Status" value="" style="height: 25px;">
                        <option>Status</option>
                        @foreach ($status as $sta)
                            <option value="{{$sta->status}}">{{$sta->status}}</option>
                        @endforeach
                    </select>
                    <input id="submitSearch" type="submit" name="submit" value="Search" style="height: 25px">
                <!--</form>-->
            </div>
                <!--advance search-->
            </div>

        </div>
        <div style="float: left; width: 200px">
            <div style="float: left; width: 50px">Show</div>
            <div style="float: left; width: 70px">
                <select id = "show_entries" name="show_entries" value="" style="height: 25px; width : 50px; float: left">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>
            <div style="float: left; width: 70px">entries</div>
        </div>
        <table id="example" class="dataTable" data-sort="" data-field="">
            <thead style="">
                <tr style="height: 50px; ">
                    <th style="width: 15%"></th>
                    <th style="width: 5%"></th>
                    <th class = "sorting" data-field= "name" data-sort = "asc"  style="width: 15%">Họ và tên</th>
                    <th class = "sorting" data-field= "positions" data-sort = "asc" style="width: 15%">Vị trí ứng tuyển</th>
                    <th class = "sorting" data-field= "Gender" data-sort = "asc" style="width: 15%">Giới tính</th>
                    <th class = "sorting" data-field= "Status" data-sort = "asc" style="width: 20%">Status</th>
                    <th class = "sorting" data-field= "Birth_date" data-sort = "asc" style="width: 10%">Tuổi</th>
                    <th style="width: 20%"></th>
                    @can('Admin')
                    <th></th>
                    @endcan
                </tr>
            </thead>
        </table>
        <table class="dataTable">
            <tbody id="list-table-body" data-reload="true">
                @include('includes.table-result')
             </tbody>
        </table>
@stop

