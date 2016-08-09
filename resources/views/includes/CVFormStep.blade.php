<?php $key = $CV->hash;?>
<form action="" method="post" class="my-forms" id="cv-forms" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="id" name="id" value="">
    <fieldset id="field-box">
        <label slide-header=true class="fix-lb slide-header box_white block_ntv_dangnhap"> I. Thông tin tuyển dụng</label>
        <ul slide-toggle=true>
            <li>
                <div>
                    <table class="table table-striped table-bordered editable-table" id="1_0" style="width: 90%;">
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
            @include('xCV.CVedit2')

        </ul>

        <label slide-header=true class="fix-lb slide-header box_white block_ntv_dangnhap">II. Kĩ năng ứng viên</label>
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

        <label slide-header=true class="fix-lb slide-header box_white block_ntv_dangnhap">III. Link đến profile hoặc project đã làm</label>
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
</form>