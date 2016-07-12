@extends('xCV.template')
<title>Chỉnh sửa thông tin người dùng</title>
<!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/uploadCV.css') }}"/-->
@section('content')
    <?php $key = $user->hash ;?>
    <form action="/User/{{$key}}" method="post" class="my-forms" id="profile-forms" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset id="field-box">
            <div class=" float_left" style="width: 30%;">
                @include('xUser.profile')
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
                                <input type="text" class="input-right"  name="name"
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
                    <li >
                        <a class="" href="{{url('User',[$user->hash ,'edit'])}}">Đổi mật khẩu </a>
                    </li>
                </ul>

                <ul>
                    <li>
                        <input type="submit" form="profile-forms" name="submit1" value="Thay đổi"
                               class="float_right b-purple">
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