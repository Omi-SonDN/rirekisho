@extends('xCV.template')
@section('title')Thêm trạng thái @endsection

@section('content')
    </ul>
    <form class="form-horizontal" action="{{route('status::postaddstatus')}}" method="post" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Thêm trạng thái CV </h3></label>
            @include('includes.flash-alert')
            <hr>
            <div class="float_left" style="width: 100%;  ">
                {{--<input name="_method" type="hidden" value="PUT">--}}
                <ul slide-toggle=true>
                    <li>
                        <div class="float_right " style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Tên trạng thái </strong><i style="color: red;">*</i></label>
                            <div class="input col-xs-9">
                                <input type="text" class="input-right form-data"
                                       name="status" value="{{old('status')}}">
                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                                {{ $errors->first('status') }}
                                            </span>
                                        @endif
                            </div>
                            
                        </div>
                    </li>
                    <li>
                        <div class="float_right " style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Cho phép gửi mail</strong><i style="color: red;">*</i></label>
                            <div class="input col-xs-9">
                                <label>
                                    <input type="radio" class="" name="allow_sendmail" value="1">
                                    Cho phép gửi mail
                                </label>
                                <label>
                                    <input type="radio" class="" name="allow_sendmail" value="0">
                                    Không cho phép gửi mail
                                </label>
                                        @if ($errors->has('allow_sendmail'))
                                            <span class="help-block">
                                                {{ $errors->first('allow_sendmail') }}
                                            </span>
                                        @endif
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="float_right " style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Visitor quản lý</strong><i style="color: red;">*</i></label>
                            <div class="input col-xs-9">
                                <label>
                                    <input type="radio" class="" name="role_VisitorStatus" value="1">
                                    Cho phép 
                                </label>
                                <label>
                                    <input type="radio" class="" name="role_VisitorStatus" value="0">
                                    Không cho phép
                                </label>
                                        @if ($errors->has('role_VisitorStatus'))
                                            <span class="help-block">
                                                {{ $errors->first('role_VisitorStatus') }}
                                            </span>
                                        @endif
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="float_right" style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Những trạng thái trước</strong></label>
                            <div class="input col-xs-9">
                                <select name="prev_status[]" id="prev_status" multiple="multiple" style="width: 100%;">
                                    @foreach( \App\Status::all() as $stt )
                                        <option value="{{$stt->id}}">{{$stt->id}} : {{$stt->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="float_right" style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Thông tin cần hiển thị</strong></label>
                            <div class="input col-xs-9">
                                <select name="infor[]" id="infor" multiple="multiple" style="width: 100%;">
                                    <option value="Date">Date</option>
                                    <option value="Time">Time</option>
                                    <option value="Address">Address</option>
                                    <option value="Attach">Attach</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="float_right " style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Email Template</strong></label>
                            <div class="input col-xs-9">
                                <textarea name="email_template" class="tinymce-textarea" rows=10></textarea>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li class="cancel" style="margin-right:20px;">
                        <div>
                            <input type="submit" form="profile-forms" name="submit1" value="Add status"
                                   class="b-purple btn btn-primary">
                            <input type="button" form="profile-forms" name="" value="Cancel"
                                   class="b-purple btn btn-primary" onclick="window.location='{{URL::route('status.index')}}'">
                        </div>
                    </li>
                </ul>
            </div>
        </fieldset>
    </form>
@stop
