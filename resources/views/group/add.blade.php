@extends('xCV.template')
<title>Thêm nhóm</title>

@section('content')
    </ul>
    <form class="form-horizontal" action="{{route('group.store')}}" method="post" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Thêm nhóm </h3></label>
            @include('includes.flash-alert')
            <hr>
            <div class="float_left" style="width: 100%;  ">
                {{--<input name="_method" type="hidden" value="PUT">--}}
                <ul slide-toggle=true>
                    <li>
                        <div class="float_right " style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Tên nhóm: </strong><i style="color: red;">*</i></label>
                            <div class="input col-xs-9">
                                <input type="text" class="form-control"
                                       name="name" value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="float_right " style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Nhóm cha:</strong></label>
                            <div class="input col-xs-9">
                                <select name="parent" class="form-control">
                                    <option value="NULL">-- Không có --</option>
                                    @foreach( App\Group::all() as $grp )
                                    <option value="{{$grp->id}}">{{$grp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li class="cancel" style="margin-right:20px;">
                        <div>
                            <input type="submit" form="profile-forms" name="submit1" value="Add group"
                                   class="b-purple btn btn-primary">
                            <input type="button" form="profile-forms" name="" value="Cancel"
                                   class="b-purple btn btn-primary" onclick="window.location='{{URL::route('group.index')}}'">
                        </div>
                    </li>
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>
    </form>
@stop
