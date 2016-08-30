@extends('xCV.template')
<title>Sửa nhóm</title>

@section('content')
    <form class="form-horizontal" action="{{route('group.update', $Group->id)}}" method="post" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Sửa nhóm </h3></label>
            @include('includes.flash-alert')
            <hr>
            <div class="float_left" style="width: 100%;  ">
               <input name="_method" type="hidden" value="PUT">
                <ul slide-toggle=true>
                    <li>
                        <div class="float_right " style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Tên nhóm </strong><i style="color: red;">*</i></label>
                            <div class="input col-xs-9">
                                <input type="text" class="form-control"
                                       name="name" value="{{old('name')?old('name'):$Group->name}}">
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
                            <label class="control-label col-xs-3"><strong>Nhóm cha</strong><i style="color: red;">*</i></label>
                            <div class="input col-xs-9">
                                <select name="parent" class="form-control">
                                    <option value="NULL">-- Không có --</option>
                                    @foreach( App\Group::all() as $grp )
                                    @if($grp->id==$Group->id) <?php continue; ?> @endif;
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
                            <input type="submit" form="profile-forms" name="submit1" value="Update group"
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
