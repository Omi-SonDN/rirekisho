@extends('xCV.template')
<title>Statistic CV</title>
@section('content')

    <div class="row statisic">
        <div class="col-md-3" style="border: 1px solid #ddd;
            box-shadow: 0 0 30px 0 rgba(0, 0, 0, .1);">
            <div class="statisic-sidebar" style=" margin-bottom: 20px">
                <!-- SIDEBAR BUTTONS -->
                <div class="search-title">
                    Thống kê
                </div>
                <!-- END SIDEBAR BUTTONS --> 
                 
                <!-- SIDEBAR MENU -->
                <div class="statisic-menu">
                    <ul class="nav" id="status_statistic">
                        <li class="active" id="month">
                            <a id="month_statistic" status="month">Thống kê theo tháng </a>
                        </li>
                        <li id="quarter">
                            <a id="quarter_statistic" status="quarter">Thống kê theo quý </a>
                        </li>
                        <li id="year">
                            <a id="year_statistic" status="year">Thống kê theo năm </a>
                        </li>
                        <li id="positions">
                            <a id="positions_statistic" status="position">thống kê theo Positions </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="statisic-content" style="border: 1px solid #ddd;
            box-shadow: 0 0 30px 0 rgba(0, 0, 0, .1);">

                <!-- ================ ========================== -->
                    <div class="tab-content">
                        <!--      Statistic        -.>
                        
                        <!--<div id="container" style="width:100%; height:400px;"y></div>-->
                        <?php
                            $id = DB::select('select * from positions');
                        ?>

                        <div class="container" id="sta4" style="padding-top: 30px;">

                            <div class="search_po_sa" style="display: none">
                                    <label>Date: </label>
                                    <input id="startDate" data-date-format="yyyy-mm-dd" name="startDate">
                                    <label>To: </label>
                                    <input id="endDate"  data-date-format="yyyy-mm-dd" name="endDate">
                                    <select id = "positionsSearch" name="position">
                                        <option value="">Vị trí tuyển dụng</option>
                                        @foreach ($id as $position)
                                            <option value="{{$position->id}}">{{$position->name}}</option>
                                        @endforeach

                                    </select>
                                    <input type="submit" name="Search" id="searchStatistics" value="Search">
                            </div>

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-default">
                                    <div class="panel-heading" style="height: 40px"></div>
                                        <div class="panel-body">
                                            <div id="container2">
                                                @include('includes.positions_chart')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--      Statistic        -->
                    </div>
                 <!-- ================ ========================== -->
                
            </div>
        </div>
    </div>

    <br>
    <br>
@endsection