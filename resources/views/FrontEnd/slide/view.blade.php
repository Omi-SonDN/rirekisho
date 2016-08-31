@extends('xCV.template')
<title>Xem Slide</title>

@section('content')
    <form method="post">
        <fieldset id="field-box">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"><h3 style="color: #666699;" >Xem slide {{ $slide->name }}</h3></div>
            </div>
            <hr>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="control-label text-right"><strong>Tên slide:</strong></p>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $slide->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="control-label text-right"><strong>Ảnh:</strong></p>
                        </div>
                        <div class="col-md-9">
                            <img src="{{asset($slide->image)}}" style="width:100%"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="control-label text-right"><strong>Text:</strong></p>
                        </div>
                        <div class="col-md-9">
                            <p>{!! $slide->text !!}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="control-label text-right"><strong>Vị trí:</strong></p>
                        </div>
                        <div class="col-md-9">
                            <p>{{$slide->order}}</p>
                        </div>
                    </div>
                </div>
            </div>           
        </fieldset>
    </form>
@stop