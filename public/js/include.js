$(document).ready(function () {
        $("cv-forms").each(function () {
            $(this).data("validator").settings.success = false;
        });
        /*************************fix navbar*************************************/

        var nav = $('.navbar');
        var num = $('body').offset().top;
        $(window).bind('scroll', function () {
            if ($(this).scrollTop() > num) {
                nav.addClass("nav_fixed");
            } else {
                num = $('body').offset().top;
                nav.removeClass("nav_fixed");
            }
        });

        $(".burger-effect").bind("click", openNav).removeClass("active");

        //$(".burger-effect").bind("click", closeNav).addClass("active");
        /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.width = "220px";
            document.getElementById("push").style.marginLeft = "220px";
            $(".burger-effect").bind("click", closeNav).addClass("active");
        }

        /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("push").style.marginLeft = "0";
            $(".burger-effect").bind("click", openNav).removeClass("active");
        }


        /*
         var notify = $('[notification=true]'), timer;
         $(document).ajaxStart(function () {

         timer && clearTimeout(timer);
         timer = setTimeout(function () {
         //notify.html("Loading...");
         notify.show();
         }, 10000);
         });

         $(document).ajaxStop(function () {
         clearTimeout(timer);
         notify.hide();
         });
         //noinspection JSUnresolvedFunction
         $(document).ajaxComplete(function (status, text) {

         });

         /*******************slide toggle *************************/
        var slideHeader = $('[slide-header=true]');
        slideHeader.next().hide();
        slideHeader.first().next().show();
        slideHeader.click(function () {
            var content = $(this).next();
            if (!(content.is(":visible"))) {   //no - its hidden - slide all the other open tabs to hide 
                $('[slide-toggle=true]').hide();
                // open up the content needed 
                content.slideToggle(800);
            }
        });
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
        $('input[type=radio][editable=Rirekisho]').change(function () {
            var name = $(this).attr("name");
            var dataString = name + '=' + this.value;
            $.ajax({
                type: "PUT",
                url: "/CV/" + $(this).attr('id'),
                data: dataString,
                success: function (html) {
                }
            });
        });

        $('input[type=checkbox][editable=Rirekisho]').change(switchInput);
        function switchInput() {
            var name = $(this).attr("name");
            var active = 0;
            if ($(this).is(":checked")) {
                active = 1;
            }
            $.ajax({
                type: "PUT",
                url: "/CV/" + $(this).attr('id'),
                data: name + "=" + active,
                success: function (html) {
                }
            });
        }

        /*****************show CV*************************/
        $(".clickable li.p-link a").on('click', function () {
            var name = $(this).attr('name');//gets element
            $(".bd").hide();//hides others
            $("#" + name).show();//show
            $("#p-active").removeAttr('id');// removes css
            $(this).children('i').attr("id", "p-active");
        });
        $(".skippable li.p-link a").on('click', function () {
            var name = $(this).attr('href');
            $("#p-active").removeAttr('id');
            $(this).children('i').attr("id", "p-active");
        });

        /****************bookmark*********************/
        $("[data-action=bookmark]").bind("click", bookmark);
        $("[data-action=deleteBookmark]").bind("click", bookmark);
        function bookmark(e) {
            var data = {
                "bookmark-id": $(this).attr('data-bookmark-id')
            };
            var star = $('[data-action=bookmark]');
            $.ajax({
                type: "PUT",
                url: "/" + "Bookmark/" + $(this).attr('data-bookmark-id'),
                data: $.param(data),
                cache: false,
                success: function (html) {
                    var t = html == "1";
                    if (html == "1") {
                        star.html("<i class='fa fa-star '></i>");
                    } else
                        star.html("<i class='fa fa-star-o '></i>");
                    refresh();
                }
            });
        }

        /**************side bar*****************/
        $("[data-action=reload]")
            .bind("click", refresh)
            .hover(handlerIn, handlerOut);
        function refresh() {
            $(" #mySidenav").load("/Bookmark" + " #mySidenav" + ">*", function () {
                $("[data-action=reload]")//spinner
                    .bind("click", refresh)
                    .hover(handlerIn, handlerOut);
                //$("[data-action=bookmark]").unbind("click", bookmark).bind("click", bookmark);
                $("[data-action=deleteBookmark]").bind("click", bookmark);
            });
        }

        function handlerIn() {
            $(this).html('<i class=" fa fa-refresh fa-spin" style="color:#659;"></i>');
        }

        function handlerOut() {
            $(this).html('<i class=" fa fa-refresh" ></i>');
        }

        reloadBySeconds();
        function reloadBySeconds() {
            var window_focus;
            $(window).focus(function () {
                window_focus = true;
            }).blur(function () {
                window_focus = false;
            });
            var interval;
            last = 0;
            //every 3s reload
            $(document).on('click', function () {
                var d = new Date();
                var f = (d - last) / 1000;
                if ((d - last) / 1000 > 3) {
                    if (window_focus) {
                        check();
                        last = new Date();
                    }
                }
            });
            /*
             interval = window.setTimeout(function () {
             if (window_focus) {
             check();
             }
             }, 3000);*/
            /*
             $(document).on('click', function () {
             if (window_focus) {
             check();
             }
             });*/

        }


        function check() {
            var w = document.getElementById("mySidenav").offsetWidth;
            // if sidebar is opened
            if (w == 220)
                refresh();
            var star = $('[data-action=bookmark]');
            //if star does exist
            if (star.length) {
                $.ajax({
                    type: "GET",
                    url: "/" + "Bookmark/" + star.attr('data-bookmark-id'),
                    data: '',
                    success: function (html) {
                        var t = html == "1";
                        if (html == "1") {
                            star.html("<i class='fa fa-star '></i>");
                        } else
                            star.html("<i class='fa fa-star-o '></i>");

                    }
                });
            }

        }

        /********************************** validate ***********************************/
        var currentTime = new Date();
        var year = currentTime.getFullYear();
        var validator = $("#cv-forms").validate(
            {
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


        function Add(e) {

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

        /***************User profile**********************/

        //dropzone handle
        $('#dropzone')
            .on('dragover', function () {
                $(this).addClass('hover');
            })
            .on('dragleave', function () {
                $(this).removeClass('hover');
            })
            .find('input')
            .on('change', function (e) {
                var file = this.files[0];
                $('#dropzone').removeClass('hover');
                //validation
                if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
                    return alert('File type not allowed.');
                }
                //noinspection JSUnusedLocalSymbols
                var size = file.size;
                //TODO: check image size
                //end validation
                $('#dropzone')
                    .addClass('dropped')
                    .find('img')
                    .remove();
                if ((/^image\/(gif|png|jpeg|jpg)$/i).test(file.type)) {
                    var reader = new FileReader(file);

                    reader.readAsDataURL(file);
                    reader.onload = function (e) {
                        var data = e.target.result,
                            $img = $('<img />').attr('src', data).fadeIn();
                        $('#dropzone').find('.fixed-img').html($img);
                    };

                } else {
                    var ext = file.name.split('.').pop();
                    $('#dropzone').find('.fixed-img').html(ext);
                }
            });
    }
);

///****************** search name date age status*************************/
//
//    $(".dataTable th").on('click', function () {
//
//         var entries = $('#show_entries').val();
//         var dataSort = $(this).attr("data-sort");
//         var dataField = $(this).attr("data-field");
//         var nameSearch = $('#nameSearch').val();
//         var positionsSearch = $('#positionsSearch').val();
//         var statusSearch = $('#statusSearch').val();
//         var entrie = $('#show_entries').val();
//
//         var dataString = "data-sort=" + dataSort +
//             "&data-field=" + dataField +
//             "&nameSearch=" + nameSearch +
//             "&positionsSearch=" + positionsSearch +
//             "&statusSearch=" + statusSearch +
//             "&entrie=" + entries;
//
//         $(".dataTable .sorting_asc").attr("class", "sorting");
//         $(".dataTable .sorting_asc").attr("data-sort", "asc");
//         $(".dataTable .sorting_desc").attr("class", "sorting");
//         $(".dataTable .sorting_desc").attr("data-sort", "asc");
//
//         if (dataSort == "desc") {
//             $(this).attr("data-sort", "asc");
//             $(this).attr("class", "sorting_asc");
//
//         } else {
//             $(this).attr("data-sort", "desc");
//             $(this).attr("class", "sorting_desc");
//         }
//
//         var dataSortAff = $(this).attr("data-sort");
//
//         $("#example").attr("data-field", dataField);
//         $("#example").attr("data-sort", dataSortAff);
//
//         if (dataString) {
//             advSearch(dataString)
//         }
//    });

// search with button submit
    $("#submitSearch").on('click', function(){
        var dataSort = 'asc';
        var dataField = 'name';
        var nameSearch = $('#nameSearch').val();
        var positionsSearch = $('#positionsSearch').val();
        var statusSearch = $('#statusSearch').val();
        var entries = $('#show_entries').val();

        var dataString = "data-sort=" + dataSort +
            "&data-field=" + dataField +
            "&nameSearch=" + nameSearch +
            "&positionsSearch=" + positionsSearch +
            "&statusSearch=" + statusSearch +
            "&entrie=" + entries;

        if (dataString) {
            advSearch(dataString)
        }
    });

// search change cv
function adSearchChange (per_page, s_name, pos, status, thead){

    if (per_page) {
        var entries = per_page.value;
    } else {
        var entries = $('#show_entries').val();
    }

    if (s_name) {
        var nameSearch = s_name;
    } else {
        var nameSearch = $('#nameSearch').val();
    }

    if (pos) {
        var positionsSearch = pos.value;
    } else {
        var positionsSearch = $('#positionsSearch').val();
    }

    if (status) {
        var statusSearch = status.value;
    } else {
        var statusSearch = $('#statusSearch').val();
    }
    if (thead) {
        var dataSort = $(thead).attr("data-sort");
        var dataField = $(thead).attr("data-field");

        if (dataSort == 'asc') {
            dataSort = 'desc';
        } else {
            dataSort = 'asc';
        }

        $('.dataTable th').each(function() {
            if($(this).attr('data-field') == dataField) {
                $(this).attr("data-sort",dataSort);
                $(this).attr("class",'sorting_'+dataSort);
            } else {
                // $(this).attr("data-sort",'asc');
                // $(this).attr("class",'sorting');
                if($(this).attr('class') != 'ab'){
                    $(this).attr("data-sort",'asc');
                    $(this).attr("class",'sorting');
                } 
        }
        });

    } else {
        var dataSort;
        var dataField;
        $('.dataTable th').each(function() {
            if($(this).hasClass('sorting_asc')) {
                dataSort = $(this).attr("data-sort");
                dataField = $(this).attr("data-field");
            } else if ($(this).hasClass('sorting_desc')) {
                dataSort = $(this).attr("data-sort");
                dataField = $(this).attr("data-field");
            }
        });
        if ( !dataSort || !dataField || (dataSort  == 'undefined') || (dataField == 'undefined')) {
            dataSort = 'asc';
            dataField = 'name';

            $('.dataTable th').each(function() {
                if($(this).attr('data-field') == 'name') {
                    $(this).attr("data-sort",'asc');
                    $(this).attr("class",'sorting_asc');
                } else {
                        $(this).attr("data-sort",'asc');
                        $(this).attr("class",'sorting');
                }
            }); 
        }
    }
    var dataString = "data-sort=" + dataSort +
        "&data-field=" + dataField +
        "&nameSearch=" + nameSearch +
        "&positionsSearch=" + positionsSearch +
        "&statusSearch=" + statusSearch +
        "&entrie=" + entries;

    // search name 3 characters  Min lenght
    if (nameSearch.length > 2 && s_name){
        advSearch(dataString)
    }else {
        advSearch(dataString)
    }

}

// function send data search CV
function advSearch(dataString){
    $.ajax({
        type: "POST",
        url: "/CV/adSearch",
        data: dataString,
        cache: false,
        success: function (data) {
            //console.log(data);
            $("[data-reload=true]").html(data['data']);
            $(".pagination ul").remove();
            $(".pagination").html(data['pagination']);
            window.history.pushState('','',data['url']);
        }
    });
}
/******************** show entries *****************************/

$('#show_entries').on('chang', function(){
    var entries = $('#show_entries').val();

});

// thay doi vi tri tuyen dung
function change_positions(val, id) {
    if (val.value) {
        var _confirm = confirm("Bạn có chắc thay đổi ví trí tuyển dụng?");
        if (_confirm) {
            $.ajax({
                type: "POST",
                url: "/CV/changeStatus",
                data: '_potions=' + val.value + '&id=' + id,
                cache: false,
                success: function (data) {
                    //redirect(data['url']);
                }
            });
        } else {
            $(val).val('-- Chọn vị trí --');
        }
    }
}

