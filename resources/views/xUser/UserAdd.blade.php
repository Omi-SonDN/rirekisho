@extends('xCV.template')
<title>Thêm thông tin người dùng</title>

@section('content')
    <form action="{{action('UsersController@postAddUser')}}" method="POST" class="my-forms" id="profile-forms"
          enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Thêm User</h3></label>
            @include('includes.flash-alert')
            <hr>
            <div class="float_left col-lg-3">
                <div class="dropzone-container">
                    <div id="dropzone">
                        <div class="fixed-img">
                            <div class="dropzone-text-place">
                                <span class="dropzone-text">Tải hình ảnh</span>
                            </div>
                        </div>
                        <input id="fileInput" type="file" accept="image/png,image/jpg,image/bmp,image/jpeg"
                               name="txtImage"/>
                    </div>
                    <i> Click để tải hình ảnh</i>
                    @if ($errors->has('txtImage'))
                        <span class="help-block">
                            {{ $errors->first('txtImage') }}
                        </span>
                    @endif
                </div>

            </div>
            <div class="float_left col-lg-9">
                <ul slide-toggle=true class="pull-left">
                    <div class="col-lg-6">
                        <li class="bottom_20px">
                            <div class="">
                                <label class="title" for="txtName">Tài khoản đăng nhập <i style="color: red;">*</i></label>

                                <div class="input">
                                    <label class="icon-right" for="txtName">
                                        <i class="fa fa-user"></i>
                                    </label>
                                    <input required="required" type="text" placeholder="Username" class="input-right"
                                           name="txtName" value="{!! old('txtName') !!}">
                                    @if ($errors->has('txtName'))
                                        <span class="help-block">
							            {{ $errors->first('txtName') }}
						            </span>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="bottom_20px">
                            <div class="">
                                <label class="title" for="txtEmail">Email <i style="color: red;">*</i> </label>

                                <div class="input">
                                    <label class="icon-right" for="txtEmail">
                                        <i class="fa fa-envelope-o"></i>
                                    </label>
                                    <input required="required" type="email" class="input-right" placeholder="Email"
                                           name="txtEmail" value="{!! old('txtEmail') !!}">
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
                            <div class="" style="">
                                <label class="title" for="txtPass">Password <i style="color: red;">*</i></label>

                                <div class="input">
                                    <label class="icon-right" for="Password">
                                        <i class="fa fa-key"></i>
                                    </label>
                                    <input type="password" required="required" class="input-right"
                                           placeholder="Password"
                                           name="txtPass" value="">
                                    @if ($errors->has('txtPass'))
                                        <span class="help-block">
							           {{ $errors->first('txtPass') }}
						            </span>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="bottom_20px">
                            <div class="">
                                <label class="title" for="txtRePass">Re-Password <i style="color: red;">*</i></label>

                                <div class="input">
                                    <label class="icon-right" for="txtRePass">
                                        <i class="fa fa-key"></i>
                                    </label>
                                    <input required="required" type="password" class="input-right"
                                           placeholder="Re-Password"
                                           name="txtRePass" value="">
                                    @if ($errors->has('txtRePass'))
                                        <span class="help-block">
							            {{ $errors->first('txtRePass') }}
						            </span>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </div>
                </ul>
                <div class="clearfix"></div>
                <div class="form-inline mt8 role-control col-lg-12">
                    <label class="title col-lg-2">Role Level</label>
                    @can('SuperAdmin')
                    <label class="radio col-lg-2">
                        <input name="rdLevel" {{(old('rdLevel') == '2') ? 'checked' : '' }} value="2" type="radio" /><i></i>Admin
                    </label>
                    @endcan
                    <label class="radio col-lg-2">
                        <input name="rdLevel" {{(old('rdLevel') == '1') ? 'checked' : '' }} value="1" type="radio" /><i></i>Duyệt CV
                    </label>
                    <label class="radio col-lg-2">
                        <input name="rdLevel" {{(old('rdLevel') == '0') ? 'checked' : '' }} value="0" checked type="radio" /><i></i>Ứng viên
                    </label>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>

            <div class="clearfix"></div>
            <div class="col-lg-4 fix-with4 mt8">
                <label class="title" for="txtHo">Họ của bạn <i style="color: red;">*</i></label>

                <div class="input">
                    <label class="icon-right" for="txtHo">
                        <i class="fa fa-user"></i>
                    </label>
                    <input required="required" type="text" placeholder="Nguyen" class="input-right"
                           name="txtHo" value="{!! old('txtHo') !!}">
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
                    <label class="icon-right" for="txtTen"><i class="fa fa-user"></i></label>
                    <input required="required" type="text" placeholder="Van A" class="input-right"
                           name="txtTen" value="{!! old('txtTen') !!}">
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
                        <label class="icon-right" for="txtbDanh"><i class="fa fa-info"></i></label>
                        <input name="txtbDanh" type="text" class="input-right"
                               placeholder="Gaixinh" value="{{old('txtbDanh')}}">
                    </div>
            </div>
            <div class="col-lg-4 mt20">
                <label class="title" for="txtNsinh">Ngày sinh(dd-mm-yy) <i style="color: red;">*</i></label>

                <div class="input">
                    <label class="icon-right" for="txtNsinh">
                        <i class="fa fa-calendar-o"></i>
                    </label>
                    <input required="required" type="date" class="input-right"
                           name="txtNsinh" value="{!! old('txtNsinh') !!}">
                    @if ($errors->has('txtNsinh'))
                        <span class="help-block">
							            {{ $errors->first('txtNsinh') }}
						            </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 mt20">
                <label class="title" for="txtSdt">Số điện thoại di động <small><i>0*|(+84)*-xxx-xxxx</i></small><i style="color: red;">*</i></label>

                <div class="input">
                    <label class="icon-right" for="txtSdt"><i class="fa fa-phone"></i></label>
                    <input required="required" type="text" placeholder="(+84)98-123-1234" class="input-right"
                           name="txtSdt" value="{!! old('txtSdt') !!}">
                    @if ($errors->has('txtSdt'))
                        <span class="help-block">
							            {{ $errors->first('txtSdt') }}
						            </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 mt20">
                    <div class="col-lg-6">
                        <label class="radio"><input type="radio" name="rdGender" {{ old('rdGender') == "0" ? 'checked' : '' }} checked value="0"><i></i>Nữ</label>
                        <label class="radio"><input type="radio" name="txtMarriage" {{ old('txtMarriage') == "0" ? 'checked' : '' }} checked value="0"><i></i>Độc thân</label>
                    </div>
                    <div class="col-lg-6">
                        <label class="radio"><input type="radio" name="rdGender" {{ old('rdGender') == "1" ? 'checked' : '' }} value="1"><i></i>Nam</label>
                        <label class="radio"><input type="radio" name="txtMarriage" {{ old('txtMarriage') == "1" ? 'checked' : '' }} value="1"><i></i>Đã kết hôn</label>
                    </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 mt20">
                <label class="title" for="txtAddres">Thông tin liên hệ <i style="color:red">*</i></label>

                <div class="input">
                    <label class="icon-left" for="txtAddres"><i class="fa fa-info"></i></label>
                    <input required name="txtAddres" type="text" class="input-left float_left"
                           placeholder="Số xxx Giang Văn Minh, Quận Ba Đình, Hà Nội" value="{!! old('txtAddres') !!}">

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
                                  class="input-left">{!! old('txtInfo') !!}</textarea>
                    </div>
                </div>
            <hr>
            <div class="clearfix"></div>
            <ul class="mt20 pull-right mr_15">
                <li class="cancel">
                    <input type="submit" form="profile-forms" value="Add User"
                           class="b-purple">
                    <input type="button" form="profile-forms" name="" value="Cancel"
                           class="b-purple" onclick="window.location='{{\URL::route('User.index')}}'">
                </li>
            </ul>
        </fieldset>

    </form>

@stop