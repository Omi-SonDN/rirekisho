@extends('xCV.template')
@section('title')Sửa nhóm @endsection

@section('content')
    <form class="form-horizontal" action="{{route('group_user.update', $Group_user->id)}}" method="post" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Sửa nhóm người dùng</h3></label>
            @include('includes.flash-alert')
            <hr>
            <div class="float_left" style="width: 100%;  ">
               <input name="_method" type="hidden" value="PUT">
                <ul slide-toggle=true>
                    <li>
                        <div class="float_right " style="width: 100%;">
                            <label class="control-label col-xs-3"><strong>Tên nhóm người dùng</strong><i style="color: red;">*</i></label>
                            <div class="input col-xs-9">
                                <input type="text" class="form-control"
                                       name="name" value="{{old('name')?old('name'):$Group_user->name}}">
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
                                    @foreach( App\Group_user::all() as $grp )
                                    @if($grp->id==$Group_user->id) <?php continue; ?> @endif;
                                    <option @if($grp->id) selected @endif value="{{$grp->id}}">{{$grp->name}}</option>
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
                                   class="b-purple btn btn-primary" onclick="window.location='{{URL::route('group_user.index')}}'">
                        </div>
                    </li>
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>
    </form>
@stop
