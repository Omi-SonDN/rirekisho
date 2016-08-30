@extends('xCV.template')
<title>Statistic CV</title>
@section('content')

    <div class="row statisic" style="position: relative">
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
                        <li id="position">
                            <a id="positions_statistic" status="position">Thống kê theo vị trí apply</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <div id="">
                        <!-- <form method="get" action="{{ url('CV/downloadCV/pdf') }}">      -->
                            <ul class="menu_download" >
                                <li class="list_do" export-type='pdf'>  
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    DownLoad PDF
                                </li>
                                <li class="list_do" export-type='xlsx'>
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i> 
                                    Download Excel
                                </li>
                            </ul>
                        <!-- </form> -->
                    </div>
                </div>
            
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="statisic-content" style="border: 1px solid #ddd;
            box-shadow: 0 0 30px 0 rgba(0, 0, 0, .1);">

                <!-- ================ ========================== -->
                    <div class="tab-content">
                        <!--      Statistic        -->
                        
                        <?php
                            $id = DB::select('select * from positions');
                            $status = DB::select('select * from status');
                        ?>

                        <div id="error_date"></div>

                        <div class="container" id="sta4" style="padding-top: 30px;">
                        <?php
                            $day = date('Y-m-d');
                            $year = getYear($day);
                            $month = getMonth($day);
                            $dateStart = $year.'-'.$month.'-01'; 

                        ?>

                            <div class="search_po_sa" id="but_search_po" style="display: none">
                                    <label>From: </label>
                                    <input id="startDate" data-date-format="yyyy-mm-dd" name="startDate" value="{{$dateStart}}">
                                    <label>To: </label>
                                    <input id="endDate"  data-date-format="yyyy-mm-dd" name="endDate" value="{{$day}}">
                                    <select id = "positionsSearch" name="position" style="border: none; height: 36px; transform: translate(0,-7px);">
                                        <option value="">Vị trí tuyển dụng</option>
                                        @foreach ($id as $position)
                                            <option value="{{$position->id}}">{{$position->name}}</option>
                                        @endforeach

                                    </select>
                                    <select id = "statusSearch1_" name="status[]" multiple="multiple">
                                        @foreach ($status as $sta_)
                                            <option value="{{$sta_->id}}">{{$sta_->status}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" name="Search" id="searchStatistics" value="Search">

                            </div>
                           
                            <div class="search_po_sa" id="but_search_sa" style="margin-left: 60px">
                                <!-- <form method="GET" action="/CV/search_ab"> -->
                                    <select id = "statusSearch_" name="status[]" multiple="multiple">
                                        @foreach ($status as $sta_)
                                            <option value="{{$sta_->id}}">{{$sta_->status}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" name="Search" id="search_Sta" value="Search">
                                <!-- </form> -->
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