@extends('xCV.template')
@section('title')Thêm thông tin vị trí tuyển dụng @endsection

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
                                <input type="text" class="input-right form-data"
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
                            <label>Trạng thái<i style="color: red;">*</i></label>
                                <input name="active" value="0" type="radio" >Không kích hoạt
                                <input name="active" value="1" type="radio" >Kích hoạt
                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        {{ $errors->first('active') }}
                                    </span>
                                @endif
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="form-group ">
                            <label>Icon <i style="color: red;">*</i></label>
                            <div class="input">
                                <input type="text" id="faicon" class="input-right form-data form-control"
                                       name="icon" value="{!! old('icon') !!}">
                                @if ($errors->has('icon'))
                                    <span class="help-block">
                                        {{ $errors->first('icon') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label">Mô tả <i style="color: red;">*</i></label>
                            <div class="input">
                                <textarea aria-required="true" name="description" id="description" class="input-right form-data" rows="3" >{{old('description')}}</textarea>
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
                    </li>
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>
    </form>
@stop