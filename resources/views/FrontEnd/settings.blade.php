@extends('xCV.template')
<title>Cài đặt thông tin chung</title>

@section('content')
    <form action="{{route('fgeneral::update')}}" method="post" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Cài đặt chung</h3></label>
            @include('includes.flash-alert')
            <hr>
            <div class="float_left" style="width: 100%;">
                {{--<input name="_method" type="hidden" value="PUT">--}}
                <ul slide-toggle=true>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label" for="email">Email <i style="color: red;">*</i></label>
                            <div class="input">
                                <input type="text" class="input-right form-data"
                                       name="email" value="{!! old('email')?old('email'):$setting->get('email')->value !!}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label">Ominext <i style="color: red;">*</i></label>
                            <div class="input">
                                <textarea aria-required="true" name="ominext" id="description" class="input-right form-data" rows="3" >{{old('ominext')?old('ominext'):$setting->get('ominext')->value}}</textarea>
                                @if ($errors->has('ominext'))
                                    <span class="help-block">
                                        {{ $errors->first('ominext') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li class="cancel">
                        <input type="submit" form="profile-forms" name="submit1" value="Cập nhật"
                               class="b-purple">
                    </li>
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>
    </form>
@stop