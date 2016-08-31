@extends('xCV.template')
@section('title')Thêm Slide @endsection

@section('content')
    <form action="{{route('slide::postSlide')}}" method="post" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Thêm slide</h3></label>
            @include('includes.flash-alert')
            <hr>
            <div class="float_left" style="width: 100%;">
                {{--<input name="_method" type="hidden" value="PUT">--}}
                <ul slide-toggle=true>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label" for="name">Tên slide <i style="color: red;">*</i></label>
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
                            <label class="title">Ảnh<i style="color: red;">*</i></label>
                                <input type="file" name='image'/>
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        {{ $errors->first('image') }}
                                    </span>
                                @endif
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label">Text <i style="color: red;">*</i></label>
                            <div class="input">
                                <textarea aria-required="true" name="text" id="description" class="input-right form-data" rows="3" >{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label">Sắp xếp <i style="color: red;">*</i></label>
                            <div class="input">
                                <input type="number" name="order" value="{{old('order')}}"></textarea>
                                @if ($errors->has('order'))
                                    <span class="help-block">
                                        {{ $errors->first('order') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li class="cancel">
                        <input type="submit" form="profile-forms" name="submit1" value="Thêm Slide"
                               class="b-purple">
                    </li>
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>
    </form>
@stop