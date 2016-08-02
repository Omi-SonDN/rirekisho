@extends('xCV.template')
<title>Thống kê</title>
@section('content')
<div class="block full">
    
    <!-- Table Styles Title -->
    <div class="block-title">
        <h2><strong>Thống kê CV trong tháng</strong></h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" class="" action="">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="select_date">Chọn khoảng thời gian:</label>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-daterange" data-date-format="dd/mm/yyyy">
                            <input type="text" id="startdate" name="startdate" class="form-control text-center date-picker" placeholder="Từ ngày" @if(isset($startdate)) value="{{$startdate}}" @endif>
                            <span class="input-group-addon"><i class="fa fa-angle-right" style="margin-top: 0px;"></i></span>
                            <input type="text" id="enddate" name="enddate" class="form-control text-center date-picker" placeholder="đến ngày" @if(isset($enddate)) value="{{$enddate}}" @endif>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                	<div class="row">
	                    <div class="col-md-3">
	                    	<label class="control-label">Vị trí:</label>
		                    <div class="">
		                        <?php $positions = \App\Positions::where('active',1)->get(); ?>
		                        <select name="positions" value="" style="height: 25px">
			                        <option>Vị trí tuyển dụng</option>
			                        @foreach( $positions as $position )
			                            <option value="{{$position->id}}">{{$position->name}}</option>
			                        @endforeach
			                    </select>
			                </div>
	                    </div>
	                    <div class="col-md-3">
	                    	<label class="control-label">Trạng thái CV:</label>
		                    <div class="">
			                    <?php $status = \App\Status::all(); ?>
		                        <select name="status" value="" style="height: 25px">
			                        <option>Trạng thái</option>
			                        @foreach( $status as $stt )
			                            <option value="{{$stt->id}}">{{$stt->status}}</option>
			                        @endforeach
			                    </select>
		                    </div>
	                    </div>
	                </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="gi gi-blacksmith"></i> Lập bảng</button>
                </div>
            </form>
        </div>
        @if( isset($result) )
        <table class="dataTable">
            <tbody id="list-table-body" data-reload="true">
                @include('includes.table-result')
            </tbody>
        </table>
        @endif
    </div>
    <!-- END Table Styles Title -->
   @stop
   @section('addtional-js')
<!-- <script src="{{asset('public/js/bootstrap-datepicker.js')}}"></script> -->
<script>
    $('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
    $('#enddate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
</script>

@stop