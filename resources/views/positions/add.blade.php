@extends('xCV.template')
<title>Thêm thông tin vị trí tuyển dụng</title>

@section('content')
    <form action="{{route('position::postaddposition')}}" method="post" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Thông tin vị trí tuyển dụng </h3></label>
            @include('includes.flash-alert')
            <hr>
            <div class="float_left" style="width: 100%;">
                {{--<input name="_method" type="hidden" value="PUT">--}}
                <ul slide-toggle=true>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label" for="name">Vị trí tuyển dụng <i style="color: red;">*</i></label>
                            <div class="input">
                                <input required="required" type="text" placeholder="Position" class="input-right"
                                       name="name" value="{!! old('name') !!}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="form-group">
                            <label class="title">Trạng thái</label>
                                <input name="active" value="0" type="radio" >Không kích hoạt
                                <input name="active" value="1" type="radio" >Kích hoạt
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label">Mô tả <i style="color: red;">*</i></label>
                            <div class="input">
                                <textarea aria-required="true" name="description" id="description" class="input-right" rows="3" >{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li class="cancel">
                        <input type="submit" form="profile-forms" name="submit1" value="Add Position"
                               class="b-purple">
                        <input type="button" form="profile-forms" name="" value="Cancel"
                               class="b-purple" onclick="window.location='{{URL::route('positions.index')}}'">
                    </li>
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>
    </form>
@stop