@if( isset($modal))
    <div class="col-md-12 header-createcv">
        <blockquote>
            <p>Bạn đã tạo thành công CV từng bước. </p>
            <p>Bạn có muốn gây ấn tượng tốt với nhà tuyển dụng, vui lòng điền thông tin bên dưới đây.</p>
        </blockquote>
    </div>
@endif
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

@if( isset($modal))
    <div class="box_white block_ntv_dangnhap">
        @include('includes.CVActionSort', ['items'=>$CV])
    </div>
@endif

<script type="text/javascript">
    $(document).ready(function(){
        /***************Auto-submit*******************************/
        //TODO: type=text
        $("[editable=Rirekisho]").click(function () {
            var key = $(this).attr('id');
            var name = $(this).attr("name");
            var sucess_status = $("#s_" + name + "_" + key);
            sucess_status.hide();
        }).change(function () {
            var key = $(this).attr('id');
            var name = $(this).attr("name");
            var sucess_status = $("#s_" + name + "_" + key);

            if (validator.element($(this)))
                $.ajax({
                    type: "PUT",
                    url: "/CV/" + key,
                    data: $(this).serialize(),
                    cache: false,
                    success: function (html) {
                        sucess_status.show(20);
                    }
                });

        });

        /******************radio button********************/
        //$('input[type=radio][editable=Rirekisho]').change(function () {
        //$('body').on('change', 'input[type=radio][editable=Rirekisho]', function () {
        //    var name = $(this).attr("name");
        //    var dataString = name + '=' + this.value;
        //    $.ajax({
        //        type: "PUT",
        //        url: "/CV/" + $(this).attr('id'),
        //        data: dataString,
        //        success: function (html) {
        //        }
        //    });
        //});

        //$('input[type=checkbox][editable=Rirekisho]').change(switchInput);
        //$('body').on('change','input[type=checkbox]', '[editable=Rirekisho]', function() {
        //    var name = $(this).attr("name");
        //    var active = 0;
        //    if ($(this).is(":checked")) {
        //        active = 1;
        //    }
        //
        //    $.ajax({
        //        type: "PUT",
        //        url: "/CV/" + $(this).attr('id'),
        //        data: name + "=" + active,
        //        success: function (html) {
        //        }
        //    });
        //});
        /********************************** validate ***********************************/
        var currentTime = new Date();
        var year = currentTime.getFullYear();

        var validator = $("#cv-forms").validate({
        //var validator = $(document.getElementById('cv-forms')).validate({
            //$('body').blur("cv-forms", function() {
            //    var validator = $('#cv-forms').validate({
            rules: {
                Year: {
                    required: true,
                    digits: true,
                    range: [1950, year]
                },
                Month: {
                    required: true,
                    digits: true,
                    range: [1, 12]

                },
                Content: {
                    required: true
                },
                "study_time": {
                    required: true,
                    digits: true,
                    min: 1
                },
                "work_time": {
                    required: true,
                    digits: true,
                    min: 1
                },
                name: {
                    required: true
                },
                github: {
                    url: true
                },
                linkedin: {
                    url: true
                }
            },
            messages: {
                Year: {
                    range: jQuery.validator.format("Năm phải lớn hơn {0} và nhỏ hơn số năm hiện tại "),
                    required: "Bạn chưa điền đủ thông tin cho trường năm"
                },
                Content: {
                    required: "Bạn chưa điền đủ thông tin cho các trường  "
                },
                Month: {
                    required: "Bạn chưa điền đủ thông tin cho trường tháng "
                },
                name: {
                    required: "Bạn chưa điền đủ thông tin cho trường tên kĩ năng "
                },
                study_time: {
                    required: "Bạn chưa điền đủ thông tin cho trường thời gian học  "
                },
                work_time: {
                    required: "Bạn chưa điền đủ thông tin cho trường thời gian làm việc "
                }
            },
            errorElement: "div",
            errorPlacement: function (error, element) {
                var react = element.closest('tbody').attr('data-response');
                if (element.attr("name") == "Year" || element.attr("name") == "Month" || element.attr("name") == "Content" || element.attr("name") == "study_time" || element.attr("name") == "work_time" || element.attr("name") == "name") {
                    error.insertAfter("#" + react + "_0");
                } else if (element.attr("name") == "github" || element.attr("name") == "linkedin") {
                    var name = element.attr('name');
                    error.insertAfter("#" + name + "-error");
                } else {
                    error.insertAfter(element);
                }
            }
        });
        //});
//noinspection SpellCheckingInspection
        jQuery.extend(jQuery.validator.messages, {
            required: "Bạn chưa điền đủ thông tin",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "Bạn phải điền số .",
            digits: "Bạn phải điền số.",
            ditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            accept: "Please enter a value with a valid extension.",
            maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
            minlength: jQuery.validator.format("Please enter at least {0} characters."),
            rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
            range: jQuery.validator.format("Điền số trong khoảng {0} đến {1}."),
            max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
            min: jQuery.validator.format("Bạn phải điền số lớn hơn {0}.")
        });

        /******************Editable Table********************/
            // records table
        $(document).mouseup(function () {
            $(".editbox").hide();
            $(".jShow").show();
        });

        function resetTable() {
            //prevent repeat binding or bind only local element
            $('[name=increase]')
                    .unbind("click", Add)
                    .bind("click", Add);
            $('[name=delete]')
                    .unbind("click", Delete)
                    .bind("click", Delete);
            $('[name=edit]')
                    .unbind("click", editCell)
                    .bind("click", editCell);
        }


        resetTable();
        function editCell() {
            var ID = $(this).closest('tr').attr('id');//record/skill id
            var url = $(this).attr('data-table');
            var cell = $(this).find("#cell_input_" + ID);
            var cellContent = $(this).children('#cell_' + ID);
            cellContent.hide();
            cell.show();
            $(this).change(function () {
                if (validator.element(cell)) {

                    $.ajax({
                        type: "PUT",
                        url: "/" + url + "/" + ID,
                        data: cell.serialize(),
                        cache: false,
                        success: function (html) {
                            cellContent.html(cell.val());
                            cell.hide();
                            cellContent.show();

                        }
                    });
                }

            });
        }


        function Add(isthis) {
            var elements = $(this).closest('tr').next().clone();
            var dataReact = elements.attr('data-react');
            elements.appendTo('.editable-table tbody[data-response=' + dataReact + ']');
            elements.show();
            elements.find("[name=save]").bind("click", Save);
            $(this).unbind("click", Add);
        }

        function Save() {
            var tr_e = $(this).closest('tr');
            var url = tr_e.attr('newrow');
            var tds = tr_e.children("td");
            var input1 = tds.eq(1).children("input[type=text]");//year
            var inputs = tr_e.find("td input[type=text]");
            var dataString = inputs.serialize()
                    + "&id=" + tr_e.attr('id') + "&data-react=" + tr_e.attr('data-react');
            //id - cv
            var t = 1;
            inputs.each(function () {
                if (validator.element($(this)) == false) t = false;
            });

            if (t) {
                $.ajax({
                    type: "POST",
                    url: "/" + url,
                    data: dataString,
                    cache: false,
                    success: function (react) {
                        $(" #" + react).load(location.href + " #" + react + ">*", function () {
                            resetTable();
                        });
                    }
                });
            }
        }

        function Delete() {
            var tr_e = $(this).closest('tr'); //tr
            var ID = tr_e.attr('id');//record id
            var url = $(this).closest('td').prev().attr('data-table');
            $.ajax({
                type: "DELETE",
                url: "/" + url + "/" + ID,
                data: "",
                cache: false,
                success: function (react) {
                    $(" #" + react).load(location.href + " #" + react + ">*", function () {
                        resetTable();
                    });


                }
            });
        }
    });
</script>