@extends('xCV.template')
<title>Xem thông tin vị trí tuyển dụng</title>

@section('content')
    <form method="post">
        <fieldset id="field-box">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"><h3 style="color: #666699;" >Xem thông tin vị trí {{ $Positions->name }}</h3></div>
            </div>
            <hr>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="control-label text-right"><strong>Vị trí:</strong></p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $Positions->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="control-label text-right"><strong>Trạng thái:</strong></p>
                        </div>
                        <div class="col-md-9">
                            <p>{!! $Positions->ActPosition !!}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="control-label text-right"><strong>Mô tả:</strong></p>
                        </div>
                        <div class="col-md-9">
                            <p>{{$Positions->description}}</p>
                        </div>
                    </div>
                </div>
            </div>           
        </fieldset>
    </form>
@stop