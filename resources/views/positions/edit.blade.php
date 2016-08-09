@extends('xCV.template')
<title>Sửa thông tin vị trí tuyển dụng</title>

@section('content')
    <form action="{{route('position::update', $Positions->id)}}" method="post" class="my-forms" id="profile-forms"
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
                                <input  type="text"  class="input-right form-data" name="name" value="{{old('name')?old('name'):$Positions->name}}">
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
                            <label class="title">Trạng thái <i style="color: red;">*</i></label>
                                <input name="active" value="0" type="radio" <?php if ($Positions->active == 0) { echo 'checked';}?>>Không kích hoạt
                                <input name="active" value="1" type="radio" <?php if ($Positions->active == 1) { echo 'checked';}?>>Kích hoạt
                                        @if ($errors->has('active'))
                                            <span class="help-block">
                                                {{ $errors->first('active') }}
                                            </span>
                                        @endif
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label">Mô tả <i style="color: red;">*</i></label>
                            <div class="input">
                                <textarea aria-required="true" name="description" id="description" class="input-right" rows="3" >{{old('description') ? old('description') : $Positions->description}}</textarea>
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
                        <input type="submit" form="profile-forms" name="submit1" value="Edit Position"
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