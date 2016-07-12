@extends('xCV.template',['CV' => $CV])
<title>Tạo CV</title>
@section('content')
    <!--div  class="page-title"><h3>Tạo CV mới</h3></div-->
    <?php $key = $CV->hash;?>
    <form action="" method="post" class="my-forms" id="cv-forms">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset id="field-box">
            @can('Admin')
            <ul>
                <li style="">
                    <span class="" id="">Note:  </span>
                    <input class="" style="width: 90%;line-height: 28px;margin-top:10px;" id="{{$key}}" editable="Rirekisho" name="notes" value="{{$CV->notes}}">
                    <span class="success-status" id="s_notes_{{$key}}" style="display:none;">
                        <i class="fa fa-pencil-square-o"></i>
                    </span>
                </li>
            </ul>
            @endcan
            <label slide-header=true class="slide-header">
                I. Thông tin cá nhân
                @can('Admin')
                    <div class=" float_right">
                        Active &nbsp &nbsp
                        <input type="checkbox" class="ios-switch tinyswitch purple" id="{{$key}}"
                               name="Active" editable="Rirekisho"
                               @if ($CV->Active)
                               checked
                                @endif
                        />
                        <div class="float_right">
                            <div></div>
                        </div>
                    </div>
                @endcan
            </label>
            <ul slide-toggle=true>

                <li class="">
                    <div class="float_left" style="width: 45%;">
                        <label class="label" for="name">Họ </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="Last_name" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->Last_name }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Last_name_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>

                    </div>
                    <div class=" float_left" style="width: 50%;">
                        <label class="label" for="name">Tên </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="First_name" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->First_name }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_First_name_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="">
                    <div class="float_left" style="width: 45%;">
                        <label class="label" for="name">Tên bằng kana </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i>カナ </i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="Furigana_name"
                                   type="text" class="input-left float_left" placeholder="some text"
                                   value="{{ $CV->Furigana_name }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Furigana_name_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="float_left" style="width: 20%; margin-top:30px;">

                        <div class="float_left">
                            <label for="gender0" class="radio">
                                <input type="radio" id="gender0" editable="Rirekisho"
                                       name="Gender" value=0 <?php if (!$CV->Gender) {
                                    echo 'checked';
                                }?> ><i></i>Nữ</label>
                        </div>
                        <div class="float_right">
                            <label for="gender1" class="radio"><input type="radio" id="gender1" editable="Rirekisho"
                                                                      name="Gender" value=1 <?php if ($CV->Gender) {
                                    echo 'checked';
                                }?>><i></i>Nam
                            </label>
                        </div>

                    </div>
                </li>
                <li class="">
                    <div class="float_left" style="width: 45%;">
                        <label class="label" for="name">Ngày sinh(dd-mm-yy) </label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-calendar-o"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" type="text" editable="Rirekisho" name="B_date"
                                   class="input-left float_left" style="width: 60%;" placeholder="some text"
                                   value="{{ $CV->Birthday }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_B_date_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class=" float_left" style="width: 50%;">
                        <label class="label" for="name">Điện thoại</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-phone"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 60%;" name="Phone" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->Phone }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Phone_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class="label" for="name">Địa chỉ</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Address" type="text"
                                   class="input-left float_left" placeholder="some text" value="{{ $CV->Address }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Address_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class="label" for="name">Thông tin liên hệ</label>
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Contact_information"
                                   type="text" class="input-left float_left" placeholder="some text"
                                   value="{{ $CV->Contact_information }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Contact_information_{{$key}}"
                                 style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div>
                        <table class="table table-striped table-bordered editable-table" id="1_0"
                               style="width: 90%;"> <!-- id  = record + school-->
                            <thead>
                            <tr class="">
                                <th colspan="5">School history**</th>
                            </tr>
                            <tr class="">
                                <th style="width:7%;"> #</th>
                                <th style="width:13%;">Năm</th>
                                <th style="width:13%;">Tháng</th>
                                <th>Tên cơ sở giáo dục</th>
                                <th style="width:7%;">&nbsp;</th>
                            </tr>
                            </thead>

                            @include('includes.record-edit', array('field' => 'School','type' => 0 ))


                        </table>

                    </div><!-- End table reload-->

                </li>
                <li class="">
                    <div class=" float_left" style="width: 100%;">
                        <label class="label" for="">Giới thiệu bản thân</label>
                        <div class="input">
                            <label class="icon-left" for="">
                                <i class="fa fa-edit"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Self_intro"
                                   type="text" class="input-left float_left" placeholder="some text"
                                   value="{{ $CV->Self_intro }}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_Self_intro_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
            <label slide-header=true class="slide-header"> II. Thông tin tuyển dụng</label>
            <ul slide-toggle=true>
                @include('xCV.CVedit2')
            </ul>
            <label slide-header=true class="slide-header">
                III. Kĩ năng ứng viên
            </label>
            <ul slide-toggle=true>
                <li>
                    <!-- table reload -->
                    <table class="table table-striped table-bordered editable-table table-reload" id="2_1"
                           style="width: 90%;"> <!-- id  =  skill + language -->
                        <thead>
                        <tr class="">
                            <th colspan="5">Ngôn ngữ lập trình</th>
                        </tr>
                        <tr class="">
                            <th style="width:5%;"> #</th>
                            <th>Tên ngôn ngữ</th>
                            <th style="width:15%;">Thời gian tự học</th>
                            <th style="width:15%;">Thời gian làm việc</th>
                            <th style="width:7%;">&nbsp;</th>
                        </tr>
                        </thead>
                        @include('includes.skill-table', array('field' => 'ProgLang','type' => 1))

                    </table>

                </li>
                <li>
                    <!-- table reload -->
                    <table class="table table-striped table-bordered editable-table" id="2_0"
                           style="width: 90%;"> <!-- id  =  skill + language -->
                        <thead>
                        <tr class="">
                            <th colspan="5">Ngôn ngữ (tiếng Anh, Nhật, Trung...)</th>
                        </tr>
                        <tr class="">
                            <th style="width:5%;"> #</th>
                            <th>Tên ngôn ngữ</th>
                            <th style="width:15%;">Thời gian tự học</th>
                            <th style="width:15%;">Thời gian làm việc</th>
                            <th style="width:7%;">&nbsp;</th>
                        </tr>
                        </thead>
                        @include('includes.skill-table', array('field' => 'Language','type' => 0))

                    </table>

                </li>
                <li>
                    <!-- table reload -->
                    <table class="table table-striped table-bordered editable-table" id="2_3"
                           style="width: 90%;"> <!-- id  =  skill + language -->
                        <thead>
                        <tr class="">
                            <th colspan="5">Framework</th>
                        </tr>
                        <tr class="">
                            <th style="width:5%;"> #</th>
                            <th>Tên Framework đã sử dụng</th>
                            <th style="width:15%;">Thời gian tự học</th>
                            <th style="width:15%;">Thời gian làm việc</th>
                            <th style="width:7%;">&nbsp;</th>
                        </tr>
                        </thead>
                        @include('includes.skill-table', array('field' => 'Framework','type' => 3))

                    </table>

                </li>

            </ul>
            <label slide-header=true class="slide-header">
                IV. Link đến profile hoặc project đã làm
            </label>
            <ul slide-toggle=true>
                <li class="">
                    <div class="float_left" style="width: 10%;">
                        <label for="name" class="label">Github </label>
                    </div>
                    <div class="float_left" style="width: 80%;">
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-github-square"></i>
                            </label><!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;"
                                   name="github" type="text"
                                   class=" float_left input-left " placeholder="URL" value="{{$CV->github}}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_github_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                            <div class="clear-fix"></div>
                            <div class="error-box error-text float_left">
                                <span id="github-error"></span>
                            </div>
                        </div>

                    </div>
                </li>
                <li class="">
                    <div class="float_left" style="width: 10%;">
                        <label for="name" class="label">LinkedIn </label>
                    </div>
                    <div class="float_left" style="width: 80%;">
                        <div class="input">
                            <label class="icon-left" for="text">
                                <i class="fa fa-linkedin"></i>
                            </label>
                            <!--change editable="Rirekisho" name=field_name  -->
                            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;"
                                   name="linkedin" type="text"
                                   class=" float_left input-left " placeholder="URL" value="{{ $CV->linkedin}}">
                            <!-- s_field_name_$key-->
                            <div class="success-status float_left" id="s_linkedin_{{$key}}" style="display:none;">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                            <div class="clear-fix"></div>
                            <div class="error-box error-text float_left">
                                <span id="linkedin-error"></span>
                            </div>
                        </div>

                    </div>

                </li>
            </ul>

        </fieldset>

        <fieldset class="tbFooter">
        </fieldset>


    </form>



@stop