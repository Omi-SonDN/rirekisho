@extends('xAuth.begin')
<title>Đăng ký</title>
@section('content')
    <!--div  class="page-title"><h3>Tạo CV mới</h3></div-->

    <form id="register" class="form-horizontal my-forms  "
          role="form" method="POST" action="/auth/register">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <fieldset id="field-box">
            <ul>
                <li>
                    <h3 class="">Đăng ký</h3>
                </li>
                <li>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
                <li class="bottom_20px">
                    <div class="" style="width: 80%;">
                        <label class="label" for="name">Họ tên </label>
                        <div class="input">
                            <label class="icon-right" for="name">
                                <i class="fa fa-user"></i>
                            </label>
                            <input type="text" class="input-right" placeholder="Tên " name="name"
                                   value="{{ old('name') }}">
                        </div>
                    </div>
                </li>
                <li class="bottom_20px">
                    <div class="" style="width: 80%;">
                        <label class="label" for="email">Email </label>
                        <div class="input">
                            <label class="icon-right" for="email">
                                <i class="fa fa-envelope-o"></i>
                            </label>
                            <input type="email" class="input-right" placeholder="Email" name="email"
                                   value="{{ old('email') }}">
                        </div>
                    </div>
                </li>
                <li class="bottom_20px">
                    <div class="" style="width: 80%;">
                        <label class="label" for="password">Password </label>
                        <div class="input">
                            <label class="icon-right" for="Password">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input type="password" class="input-right" placeholder="Password" name="password">
                        </div>
                    </div>

                </li>
                <li class="bottom_20px">
                    <div style="width: 80%;">
                        <label class="label" for="password_confirmation">Password </label>
                        <div class="input">
                            <label class="icon-right" for="password_confirmation">
                                <i class="fa fa-edit"></i>
                            </label>
                            <input type="password" class="input-right" placeholder="Confirm Password"
                                   name="password_confirmation">
                        </div>
                    </div>

                </li>

                <li>
                    <input type="submit" form="register" name="submit" value="Đăng ký" class="float_right b-purple">
                </li>
            </ul>

        </fieldset>

    </form>

@stop