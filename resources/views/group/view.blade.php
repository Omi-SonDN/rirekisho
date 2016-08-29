@extends('xCV.template')
<title>Xem thông tin nhóm người dùng</title>

@section('content')
    <form method="post">
        <fieldset id="field-box">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"><h3 style="color: #666699;" >Xem thông tin nhóm {{ $Group->name }}</h3></div>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="control-label text-right"><strong>Tên nhóm:</strong></p>
                            </div>
                            <div class="col-md-9">
                                <p class="control-static">{{ $Group->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="control-label text-right"><strong>Nhóm cha:</strong></p>
                            </div>
                            <div class="col-md-9">
                                <p class="control-static">{!! ($Group->theParent())?($Group->theParent()->name):'Không có' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </fieldset>
    </form>
@stop