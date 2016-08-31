@extends('xCV.template')
@section('title')Sửa Slide @endsection

@section('content')
    <form action="{{route('slide::update',['id'=>$slide->id])}}" method="post" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Sửa slide</h3></label>
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
                                       name="name" value="{!! old('name')?old('name'):$slide->name !!}">
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
                            <div class="preview">
                                <img src="{{asset($slide->image)}}" style="width:100%"/>
                            </div>
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
                                <textarea aria-required="true" name="text" id="description" class="input-right form-data" rows="3" >{{old('text')?old('text'):$slide->text}}</textarea>
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        {{ $errors->first('text') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 100%;">
                            <label class="label">Sắp xếp <i style="color: red;">*</i></label>
                            <div class="input">
                                <input type="number" name="order" value="{{old('order')?old('name'):$slide->order}}"></textarea>
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