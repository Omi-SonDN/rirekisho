@extends('xCV.template')
<title>Chỉnh sửa thông tin người dùng</title>

@section('content')
    <form action="{{route('User.update',[$user->hash])}}" method="post" class="my-forms" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Sửa thông tin tài khoản</h3></label>
            @include('includes.flash-alert')
            <hr>

            <div class="float_left col-lg-3">
                @include('xUser.profile')
            </div>
            <div class=" float_left col-lg-9">
                <ul slide-toggle=true class="pull-left">
                    <div class="col-lg-6">
                        <li class="bottom_20px">
                            <div class="float_right ">
                                <label class="title" for="name">Tài khoản đăng nhập</label>
                            <div class="input">
                                <label class="icon-right" for="txtName">
                                    <i class="fa fa-user"></i>
                                </label>
                                <input type="text" class="input-right" name="txtName" maxlength="15"
                                       value="{{old('txtName', isset($user->userName) ? $user->userName : '')}}">
                                @if ($errors->has('txtName'))
                                    <span class="help-block">
							           {{ $errors->first('txtName') }}
						            </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right">
                            <label class="title" for="txtEmail">Email </label>
                            <div class="input">
                                <label class="icon-right" for="txtEmail">
                                    <i class="fa fa-envelope-o"></i>
                                </label>
                                <input type="email" class="input-right" placeholder="Email" name="txtEmail"
                                       value="{{old('txtEmail', isset($user->email) ? $user->email : '')}}">
                                @if ($errors->has('txtEmail'))
                                    <span class="help-block">
							           {{ $errors->first('txtEmail') }}
						            </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    </div>
                    <div class="col-lg-6">
                        <li class="bottom_20px">
                            <div class="float_right ">
                                <label class="title"> Mật khẩu cũ </label>

                                <div class="input">
                                    <label class="icon-right" for="oldPass">
                                        <i class="fa fa-key"></i>
                                    </label>
                                    <input type="password" class="input-right" name="oldPass"
                                           placeholder="Mật khẩu cũ"
                                           value="">
                                    @if ($errors->has('oldPass'))
                                        <span class="help-block">
							           {{ $errors->first('oldPass') }}
						            </span>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="bottom_20px">
                            <div class="float_right">
                                <label class="title"> Mật khẩu mới </label>

                                <div class="input">
                                    <label class="icon-right" for="txtNewPass">
                                        <i class="fa fa-key"></i>
                                    </label>
                                    <input type="password" class="input-right" name="txtNewPass"
                                           placeholder="Mật khẩu mới"
                                           value="">
                                    @if ($errors->has('txtNewPass'))
                                        <span class="help-block">
							           {{ $errors->first('txtNewPass') }}
						            </span>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </div>
                </ul>
                <div class="clearfix"></div>
                <div class="form-inline mt8 role-control col-lg-12">
                    @can('Admin')
                    @if (Auth::user()->id != $user->id)
                        <div class="row">
                            <label class="title col-lg-12">Group:</label>
                            <div class="col-lg-12">
                                <select name="group" style="width:100%;" class="form-control">
                                    <option value="" @if(old('group',$user->group)=='') selected @endif >--Không có--</option>
                                    @foreach( App\Group_user::all() as $group )
                                        <option value="{{$group->id}}" @if(old('group',$user->group)==$group->id) selected @endif>{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @endcan
                </div>
                <div class="clearfix"></div>
                <div class="form-inline mt8 role-control col-lg-12">
                    @can('Admin')
                    @if (Auth::user()->id != $user->id)
                        <div class="form-inline">
                            <label class="title col-lg-2">Role Level</label>
                            @can('SuperAdmin')
                            <label class="radio col-lg-2">
                                <input name="rdoLevel"
                                       value="2" <?php if ($user->role == 2) echo 'checked="checked"'; else echo ''; ?>
                                       type="radio"><i></i></i>Admin
                            </label>
                            @endcan
                            <label class="radio col-lg-2">
                                <input name="rdoLevel"
                                       value="1" <?php if ($user->role == 1) echo 'checked="checked"'; else echo ''; ?>
                                       type="radio"><i></i>Duyệt CV
                            </label>
                            <label class="radio col-lg-2">
                                <input name="rdoLevel"
                                       value="0" <?php if ($user->role == 0) echo 'checked="checked"'; else echo ''; ?>
                                       type="radio"><i></i>Ứng viên
                            </label>
                        </div>
                    @endif
                    @endcan
                </div>
            </div>

            <div class="clearfix"></div>
            <hr>

            <div class="col-lg-4 fix-with4 mt8">
                <label class="title" for="name">Họ của bạn <i style="color: red;">*</i></label>

                <div class="input">
                    <label class="icon-right" for="txtHo">
                        <i class="fa fa-user"></i>
                    </label>
                    <input required="required" type="text" placeholder="Nguyen" class="input-right"
                           name="txtHo" value="{{ old('txtHo', isset($user->Last_name) ? $user->Last_name : '') }}">
                    @if ($errors->has('txtHo'))
                        <span class="help-block">
							            {{ $errors->first('txtHo') }}
						            </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 fix-with4 mt8">
                <label class="title" for="txtTen">Tên của bạn <i style="color: red;">*</i></label>

                <div class="input">
                    <label class="icon-right" for="name"><i class="fa fa-user"></i></label>
                    <input required="required" type="text" placeholder="Van A" class="input-right"
                           name="txtTen" value="{{ old('txtTen', isset($user->First_name) ? $user->First_name : '') }}">
                    @if ($errors->has('txtTen'))
                        <span class="help-block">
							            {{ $errors->first('txtTen') }}
						            </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 fix-with4 mt8">
                <label class="title" for="txtbDanh">Bí danh </label>

                <div class="input">
                    <label class="icon-right" for="text"><i class="fa fa-info"></i></label>
                    <input name="txtbDanh" type="text" class="input-right"
                           placeholder="Gaixinh" value="{{old('txtbDanh', isset($user->Furigana_name) ? $user->Furigana_name : '')}}">
                </div>
            </div>
            <div class="col-lg-4 mt20">
                <label class="title" for="txtNsinh">Ngày sinh(dd-mm-yy) <i style="color: red;">*</i></label>

                <div class="input">
                    <label class="icon-right" for="name">
                        <i class="fa fa-calendar-o"></i>
                    </label>
                    <input required="required" type="date" class="input-right"
                           name="txtNsinh" value="{!! old('txtNsinh', isset($user->Birth_date) ? $user->Birth_date : '') !!}">
                    @if ($errors->has('txtNsinh'))
                        <span class="help-block">
							            {{ $errors->first('txtNsinh') }}
						            </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 mt20">
                <label class="title" for="txtSdt">Số điện thoại di động
                    <small><i>(+84)xx-xxx-xxxx</i></small>
                    <i style="color: red;">*</i></label>

                <div class="input">
                    <label class="icon-right" for="txtSdt"><i class="fa fa-phone"></i></label>
                    <input id="phone-number" required="required" type="text" placeholder="(+84)98-123-1234" class="input-right"
                           name="txtSdt" value="{!! old('txtSdt', isset($user->Phone) ? $user->Phone : '') !!}">
                    @if ($errors->has('txtSdt'))
                        <span class="help-block">
							            {{ $errors->first('txtSdt') }}
						            </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 mt20">
                <div class="col-lg-6">
                    <label class="radio"><input type="radio"
                                                name="rdGender" {{ ($user->rdGender == 0) ? 'checked' : '' }} checked
                                                value="0"><i></i>Nữ</label>
                    <label class="radio"><input type="radio"
                                                name="txtMarriage" {{ ($user->Marriage == 0) ? 'checked' : '' }}
                                                checked value="0"><i></i>Độc thân</label>
                </div>
                <div class="col-lg-6">
                    <label class="radio"><input type="radio"
                                                name="rdGender" {{ ($user->Gender == 1) ? 'checked' : '' }} value="1"><i></i>Nam</label>
                    <label class="radio"><input type="radio"
                                                name="txtMarriage" {{ ($user->Marriage == 1) ? 'checked' : '' }}
                                                value="1"><i></i>Đã kết hôn</label>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 mt20">
                <label class="title" for="txtAddres">Thông tin liên hệ <i style="color:red">*</i></label>

                <div class="input">
                    <label class="icon-left" for="txtAddres"><i class="fa fa-info"></i></label>
                    <input required name="txtAddres" type="text" class="input-left float_left"
                           placeholder="Số xxx Giang Văn Minh, Quận Ba Đình, Hà Nội" value="{!! old('txtAddres', isset($user->Address) ? $user->Address : '') !!}">

                    @if ($errors->has('txtAddres'))
                        <span class="help-block">
							            {{ $errors->first('txtAddres') }}
						            </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-12 mt20">
                <label class="title" for="txtInfo">Giới thiệu bản thân</label>

                <div class="input">
                        <textarea name="txtInfo" type="text" rows="4"
                                  class="input-left">{!! old('txtInfo', isset($user->Self_intro) ? $user->Self_intro : '') !!}</textarea>
                </div>
            </div>
            <hr>
            <div class="clearfix"></div>

            <ul class="mt20 pull-right mr_15">
                    <li class="cancel">
                        <input type="submit" value="Thay đổi"
                               class="b-purple">
                        <input type="button"
                               @if(Auth::user()->getRole() == 'Applicant' || Auth::user()->getRole() == 'Visitor')
                                    onclick="window.location='{{\URL('/profile')}}'"
                               @else
                                   @if(Auth::user()->id == $user->id)
                                        onclick="window.location='{{\URL('/profile')}}'"
                                    @else
                                        onclick="window.location='{{\URL::route('User.index')}}'"
                                    @endif
                               @endif
                               value="Cancel" class="b-purple">
                    </li>

            </ul>

        </fieldset>

    </form>



@stop