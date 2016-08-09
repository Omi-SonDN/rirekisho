@extends('xCV.template')
<title>Xem thông tin trạng thái CV</title>

@section('content')
    <form method="post">
        <fieldset id="field-box">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"><h3 style="color: #666699;" >Xem thông tin trạng thái CV {{ $Status->status }}</h3></div>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="control-label text-right"><strong>Trạng thái:</strong></p>
                            </div>
                            <div class="col-md-9">
                                <p class="control-static">{{ $Status->status }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="control-label text-right"><strong>Được gửi email:</strong></p>
                            </div>
                            <div class="col-md-9">
                                <p class="control-static">{!! $Status->allow_send !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="control-label text-right"><strong>Những trạng thái trước:</strong></p>
                            </div>
                            <div class="col-md-9">
                                <ul>
                                    @foreach( $Status->previous_status as $stt)
                                    <?php $status = \App\Status::find($stt); ?>
                                    <li><a href="{{url('status',[$status ,'view'])}}">{{ $status->status }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="control-label text-right"><strong>Thông tin cần hiển thị:</strong></p>
                            </div>
                            <div class="col-md-9">
                                <ul>
                                    @foreach( $Status->info as $field)
                                    <li>{{ $field }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="control-label text-right"><strong>Email template:</strong></p>
                            </div>
                            <div class="col-md-9">
                                <p>{!! $Status->email_template !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </fieldset>
    </form>
@stop