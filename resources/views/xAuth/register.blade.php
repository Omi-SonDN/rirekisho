@extends('xAuth.begin')
<title>Đăng ký</title>
@section('content')

    <form id="register" class="form-horizontal my-forms m-top-50"
          role="form" method="POST" action="/auth/register">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="h3-title">
            <h3 class="clao"><i class="fa fa-lock form-inline"></i> Đăng ký</h3>
        </div>
        <fieldset class="fix">
            <ul>
                <li class="bottom_20px">
                    <div class="">
                        <label class="label" for="userName">Tên tài khoản <i style="color:red">*</i> </label>
                        <div class="input">
                            <label class="icon-right" for="userName">
                                <i class="fa fa-user"></i>
                            </label>
                            <input type="text" class="input-right" placeholder="Tên " name="userName" maxlength="15"
                                   value="{{ old('userName') }}">
                            @if ($errors->has('userName'))
                                <span class="help-block">
                            {{ $errors->first('userName') }}
                        </span>
                            @endif
                        </div>
                    </div>
                </li>
                <li class="bottom_20px">
                    <div class="">
                        <label class="label" for="email">Email <i style="color:red">*</i></label>
                        <div class="input">
                            <label class="icon-right" for="email">
                                <i class="fa fa-envelope-o"></i>
                            </label>
                            <input type="email" class="input-right" placeholder="Email" name="email"
                                   value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                            @endif
                        </div>
                    </div>
                </li>
                <li class="bottom_20px">
                    <div class="">
                        <label class="label" for="password">Password <i style="color:red">*</i> </label>
                        <div class="input">
                            <label class="icon-right" for="Password">
                                <i class="fa fa-key"></i>
                            </label>
                            <input type="password" class="input-right" placeholder="Password" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                            @endif
                        </div>
                    </div>

                </li>
                <li class="bottom_20px">
                    <div>
                        <label class="label" for="password_confirmation">Re-Password <i style="color:red">*</i> </label>
                        <div class="input">
                            <label class="icon-right" for="password_confirmation">
                                <i class="fa fa-key"></i>
                            </label>
                            <input type="password" class="input-right" placeholder="Confirm Password"
                                   name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                            {{ $errors->first('password_confirmation') }}
                        </span>
                            @endif
                        </div>
                    </div>
                </li>
                <li>
                    <div class="">
                        <label class="title col-lg-3">Giới tính</label>
                        <div class="col-lg-4 m-left-25">
                            <label class="radio radio-inline"><input type="radio" id="" name="Gender"
                                                                     value="0" {{(old('Gender') == 0) ? 'checked' : ''}}
                                                                     checked><i></i>Nữ</label>
                        </div>
                        <div class="col-lg-4 m-left-25">
                            <label class="radio radio-inline"><input type="radio" id="" name="Gender"
                                                                     value="1" {{(old('Gender') == 1) ? 'checked' : ''}}><i></i>Nam</label>
                        </div>
                    </div>
                </li>
            </ul>

        </fieldset>
        <div class="clr col-lg-12 m-top-40">
            <div class="mt8">
                <input type="button" onclick="callBack()" value="Quay lại" class="pull-right btn b-purple ml_15">
                <input type="submit" form="register" name="submit" value="Đăng ký" class="pull-right b-purple">
            </div>
        </div>

    </form>


@stop