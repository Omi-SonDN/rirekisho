@extends('xCV.template')
<title>Chỉnh sửa thông tin người dùng</title>
<!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/uploadCV.css') }}"/-->
@section('content')
    <?php $key = $user->hash;?>
    <form action="/User/{{$key}}" method="post" class="my-forms" id="profile-forms" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset id="field-box">
            <div class=" float_left" style="width: 30%;">
                @include('xUser.profile')
                @can('SuperAdmin')
                @if (Auth::user()->id != $user->id)
                <div class="clear-fix"></div> <hr>
                <div class="form-group">
                    <label class="title">User Level</label>

                    <label class="radio-inline">
                        <input name="rdoLevel" value="2" <?php if ($user->role == 2) echo 'checked="checked"'; else echo ''; ?> type="radio">Admin
                    </label>

                    <label class="radio-inline">
                        <input name="rdoLevel" value="1" <?php if ($user->role == 1) echo 'checked="checked"'; else echo ''; ?> type="radio">Visitor
                    </label>
                    <label class="radio-inline">
                        <input name="rdoLevel" value="0" <?php if ($user->role == 0) echo 'checked="checked"'; else echo ''; ?> type="radio">Applicant
                    </label>
                </div>
                @endif
                @endcan

            </div>
            <div class=" float_left" style="width: 60%;  ">
                <input name="_method" type="hidden" value="PUT">
                <label slide-header="true">Thông tin tài khoản </label>
                <ul slide-toggle=true>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 80%;">
                            <label class="label" for="name">Họ tên </label>
                            <div class="input">
                                <label class="icon-right" for="name">
                                    <i class="fa fa-user"></i>
                                </label>
                                <input type="text" class="input-right" name="name"
                                       value="{{$user->name }}">
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right" style="width: 80%;">
                            <label class="label" for="email">Email </label>
                            <div class="input">
                                <label class="icon-right" for="email">
                                    <i class="fa fa-envelope-o"></i>
                                </label>
                                <input type="email" class="input-right" placeholder="Email" name="email"
                                       value="{{ $user->email}}">
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="" href="{{url('User',[$user->hash ,'edit'])}}">Đổi mật khẩu </a>
                    </li>
                </ul>

                <ul>
                    <li class="cancel">
                        <input type="submit" form="profile-forms" name="submit1" value="Thay đổi"
                               class="b-purple">
                        <input type="button" form="profile-forms" name="" value="Cancel"
                               class="b-purple" onclick="window.location='{{\URL::route('User.index')}}'">
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
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>


    </form>



@stop