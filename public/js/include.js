$(document).ready(function () {
    $('#startDate').datepicker();
    $('#endDate').datepicker();

    if($('#faicon').length>0)
        $('#faicon').iconpicker();
    /*************************fix navbar*************************************/

    tinymce.init({
        selector: '.tinymce-textarea',
        plugins: "link"
    });
    if ($('#prev_status').length > 0)
        $('#prev_status').select2();
    if ($('#infor').length > 0)
        $('#infor').select2();
    /****** dateitme *******/
    $('.date-picker').datepicker();
    $('#stardate').datepicker();
    $('#enddate').datepicker();


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
        if (!(content.is(":visible"))) {  //no - its hidden - slide all the other open tabs to hide 
            $('[slide-toggle=true]').hide();
            // open up the content needed 
            content.slideToggle(800);
        }
    });

    $('.apply_to').click(function () {
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

    $('body').on('change', 'input[name="attach"]', function (e) {
        e.preventDefault();
        //var self = $(this);
        var data = new FormData();
        data.append('_token', $('input[name=_token]').val());
        data.append('attach', $('input[type=file]')[0].files[0]);
        data.append('_method', 'PUT');

        if ($('input[type=file]').val()) {
            $.ajax({
                type: "POST",
                url: "/CV/" + $(this).attr('id'),
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data, html) {
                    if (data['is_ck'] != 'false') {
                        $('.hasfile').html('<span class="abc">Hiên tại bạn đã có CV trên hệ thống <a href="/" target="_blank" title="Ominext JSC">Ominext JSC: ' +
                        ' <a target="_blank" href="' + data['url'] + '" download="' + data['namefile'] + '" title="File CV: ' + data['namefile'] + '">' + data['namefile'] + '</a> ' +
                        ' <iframe src="' + data['url'] + '" class="col-lg-12 mt8" style="margin-bottom: 30px; height:500px;" frameborder="0"></iframe>');

                        $('a.appendflie').replaceWith('<a target="_blank" href="' + data['url'] + '" class="btn appendflie"><i class="fa fa-cloud-download icon_24 icon-24"></i> TẢI VỀ</a>');
                    } else {
                        alert(data['info']);
                    }
                }
            });
            //return false;
        } else {
            $(this).attr('value', $(this).val());
        }
    });


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


// search with button submit
    $("#submitSearch").on('click', function () {
        var data_to_send = arrToStrdata(cachedData);
        if (data_to_send) {
            advSearch(data_to_send)
        }
    });

});

//var cachedData = Array();
//var elements = $(".set_"+id_local);
//elements.each(function(){
//    if($(this).attr('type')== 'text'){
//        cachedData[$(this).attr('name')] = $(this).val();
//        //console.log('INPUT: '+$(this).val());
//    }
//    if($(this).attr('type')== 'radio'){
//        if($(this).is(":checked")){
//            cachedData[$(this).attr('name')] = $(this).val();
//            //console.log('RADIO: '+$(this).val());
//        }
//    }
//    if($(this).is('th')){
//        cachedData[$(this).attr('data-field')] = $(this).attr('data-field');
//        cachedData[$(this).attr('data-sort')] = $(this).attr('data-sort');
//        console.log('TH: '+$(this).attr('data-field'));
//    }
//    if($(this).is('select')){
//        cachedData[$(this).attr('name')] = $(this).find('option:selected').val();
//        //console.log('SELECT: '+$(this).find('option:selected').val());
//    }
//});

var cachedData = Array();
var elements = document.getElementsByClassName("set_" + id_local);
for (var i = 0; i < elements.length; i++) {
    if (elements[i].localName === 'select' || elements[i].localName === 'input') {
        cachedData[elements[i].name] = elements[i].value;
    }
    if (elements[i].localName === 'th') {
        for (var key in (elements[i].dataset)) {
            if (key in elements[i].dataset) {
                //console.log(elements[i].dataset);
                cachedData[key] = elements[i].dataset[key];
            }
        }
    }
}
// xoa bo id va value chua duoc khai bao cachedData
for (var kills in cachedData) {
    if (cachedData[kills] === undefined || cachedData[kills] === undefined) {
        delete cachedData[kills];
    }
}

// set data input + radio th select =>> goi den ham adsearch
function onclickSetData(ojbect, isNamefunc) {
    if (ojbect.localName === 'select' || ojbect.localName === 'input') {
        cachedData[ojbect.name] = ojbect.value;
    }
    if (ojbect.localName === 'th') {
        for (var key in (ojbect.dataset)) {
            if (key in cachedData) {
                cachedData[key] = ojbect.dataset[key];
            }
        }
        // change icon sort asc + desc
        $(".dataTable .sorting_asc, .sorting_desc").attr("class", "sorting");
        //$(".dataTable th").attr("class", "sorting");
        if(dataSort = ojbect.dataset.sort == 'asc'){
            $(ojbect).attr("data-sort", "desc");
            $(ojbect).attr("class", "sorting_desc");
        } else {
            $(ojbect).attr("data-sort", "asc");
            $(ojbect).attr("class", "sorting_asc");
        }
    }
    //alert(ojbect.baseURI);
    var data_to_send = arrToStrdata(cachedData);
    if (isNamefunc) {
        if (cachedData[isNamefunc].length > 2) {
            advSearch(data_to_send);
        }
    } else {
        // gui du lieu vao ajax
        advSearch(data_to_send);
    }
}
// convert arrary to string send ajax adsearch
function arrToStrdata(arr) {
    var isloop = false;
    for (var key in arr) {
        if (!isloop) {
            var str = '' + key + '=' + arr[key];
            isloop = true;
        } else {
            str += '&' + key + '=' + arr[key];
        }
    }
    return str;
}


// function send data search CV
function advSearch(dataString) {
    $.ajax({
        type: "POST",
        url: "/CV/adSearch",
        data: dataString,
        cache: false,
        dataType: "json",
        success: function (data) {
            //console.log(data);
            $("[data-reload=true]").html(data['data']);
            $(".pagination ul").remove();
            $(".pagination").html(data['pagination']);
            window.history.pushState('', '', data['url']);
        }
    });
}
/******************** show entries *****************************/

$('#show_entries').on('chang', function () {
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
$(document).ready(function () {
    /****** dateitme *******/
    $('.date-picker').datepicker();
    $('#stardate').datepicker();
    $('#enddate').datepicker();

    // $('#stardate').change(function(){
    //     $('#enddate').datepicker({startDate:$('#stardate').val()});
    // });
    // $('#enddate').change(function(){
    //     $('#stardate').datepicker({endDate:$('#enddate').val()});
    // });
});

// dang ky cv cac truong thong tin bat buoc
function submitCVRule (ischeck) {
    if (ischeck){
		var isck = true;
    }
	else{
		var isck = false;
    }

	$.ajax({
        type: 'POST',
        url: $('#cv-rule').attr('action'),
        data: $('#cv-rule').serialize() + '&checkcrete=' + ischeck,
        cache: false,
        success: function (html) {
            if (isck) {
                alert(html['notes']);
            } else {
                //$("#idEditCv").html('<button  data-toggle="modal" data-target="#modalCvCreate" type="button" class="btn btn-primary">CHỈNH SỬA</button>');

                $("#modalDataContent").html(html);
                $('#modalData').modal('show');
            }
        },
        error: function (xhr, status, errorThrown) {
            //if (xhr.status === 422) {
                $.each(xhr.responseJSON, function (key, value) {
                    errorsHtml = '<div class="col-lg-12 alert-danger">' + value[0] + '</div>';
                    $('.' + key).show().html(errorsHtml).delay(3000).fadeOut(300);
                });
            //}
        }
    });
}

function lam_moi_ttv(id) {

    if (id) {
        $.ajax({
            type: 'PUT',
            url: "/CV/" + id,
            data: 'id=' + id,
            dataType: 'json',
            cache: false,
            success: function (data) {
                //alert('Update dữ liệu thành công!')
                //redirect(data['url']);
                createCustomAlert('Update dữ liệu thành công!');
            }
        });
    }
}

var ALERT_TITLE = "";
var ALERT_BUTTON_TEXT = "Ok";

function createCustomAlert(txt) {
    d = document;

    if(d.getElementById("modalContainer")) return;

    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    mObj.style.height = d.documentElement.scrollHeight + "px";

    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";
    if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
    alertObj.style.visiblity="visible";

    h1 = alertObj.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLE));

    msg = alertObj.appendChild(d.createElement("p"));
    //msg.appendChild(d.createTextNode(txt));
    msg.innerHTML = txt;

    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = "#";
    btn.focus();
    btn.onclick = function() { removeCustomAlert();return false; }

    alertObj.style.display = "block";

}

function removeCustomAlert() {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}

// Xoa  cv
function getDeleteCV(id, type) {
    if (id) {
        $.ajax({
            type: 'DELETE',
            url: "/CV/" + id,
            data: 'type_cv=' + type,
            dataType: 'json',
            cache: false,
            success: function (data) {
                alert(data['notes']);
                redirect(data['url']);
            },
            error: function (xhr, status, errorThrown) {
            }
        });
    }
}

// cap nhap lai active + notes cv
function upActNotee(idCV, idAct, idNote, idUserCeo) {
    var is_check = document.getElementById("myCheck_" + idCV);
    var _notes = document.getElementById("txt_" + idCV).value;
    var is_ceo = document.getElementById("textarea_ceo_" + idCV);
    if (is_ceo) {
        var _ceo = is_ceo.attributes['valuser'].nodeValue;
    } else {
        var _ceo = '';
    }
    if (is_check == undefined || !is_check.checked) {
        var _check = 0;
    } else {
        var _check = 1;
    }

    if (getChanges(idAct) || getChanges(idNote) || getChanges(idUserCeo)) {
        $.ajax({
            type: "POST",
            url: "/cv/actnotes/" + idCV,
            data: 'txtAction=' + _check + "&txtNotes=" + _notes + '&txtCeo=' + _ceo,
            cache: false,
            beforeSend: function () {
                $('.wait-modal-load').addClass("loading");
            },
            success: function (data) {
                alert(data['info']);

                removeKey([idAct, idNote, idUserCeo]);
                $('.btn-submit-' + idCV).attr('disabled', true);
            },
            ajaxStop: function () {
                $('.wait-modal-load').removeClass("loading");
            }
        });
    }
}


// get home
function returnHome() {
    window.location.href = '/';
}

// mang toan cuc
var arr__ActNotes = [];

// is changes
function isChanges(key, idCV, calfunc) {
    arr__ActNotes[key] = document.getElementById(key).value;
    if (calfunc) {
        returnHome();
    }
    $('.btn-submit-' + idCV).attr('disabled', false);
}

function getChanges(getkey) {
    if (arr__ActNotes[getkey]) {
        return true;
    } else {
        return false;
    }
}
// xoa key trong mang
function removeKey(rmarray) {
    for (x in rmarray) {
        if (arr__ActNotes[rmarray[x]]) {
            delete arr__ActNotes[rmarray[x]];
        }
    }
}

// xoa notes cv
function clearContents(id) {
    var idCV = id.substr(4, id.length);
    if (document.getElementById(id).value.length >= 1) {
        document.getElementById(id).value = "";
        arr__ActNotes[id] = true;
        $('.btn-submit-' + idCV).attr('disabled', false);
    }
}

// chi chu tai khoan moi co quyen
// thay doi CV truc tuyen hay khong
function getChangeLiveCv(element, id) {
    var liveCv = (document.getElementById(element).checked) ? 1 : 0;

    $.ajax({
        type: "PUT",
        url: "/CV/" + id,
        data: 'txtLiveCv=' + liveCv,
        cache: false,
        success: function (data) {
            //alert('Đã cập nhập thành công');
            //redirect(data);
            $('input[name="txtLiveCv"]').each(function (key, value) {
                if (element != $(value).attr('id')) {
                    $('#' + $(value).attr('id')).attr("checked", false);
                } else if (liveCv) {
                    $('#' + element).attr("checked", true);
                }
            });
        }
    });
}

$('#searchStatistics').on('click', function(){
    $key_search = $('#positionsSearch').val();

    var day = new Date().toJSON().slice(0,10);
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();
    if(startDate > endDate || endDate > day){
        $('#error_date').show();
        $('#error_date').text('Nhập sai ngày tháng!');
    } else {
        $('#error_date').hide();
        $.ajax({
            type: "POST",
            url: "/CV/statisticSearch",
            data : {
                'startDate' : $('#startDate').val(),
                'endDate' : $('#endDate').val(),
                'key_search': $key_search
            },
            cache: false,
            success: function (data) {
                $('#container2').html(data);
            }
        });
    }
    
});

$('#status_statistic li a').on('click', function(){
    var ox = $(this).attr('status');
    $('#error_date').hide();

    $('#status_statistic li.active').removeClass();
    $(this).parent().addClass('active');

    if(ox == 'position'){
        $('.search_po_sa').show();
    } else {
        $('.search_po_sa').hide();
    }
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();
    var dataString = "ox=" + ox + '&startDate=' + startDate + '&endDate=' + endDate;
    $.ajax({
        type: "POST",
        url: "/CV/statisticStatus",
        data: dataString,
        cache: false,
        success: function (data) {
            $('#container2').html(data);
        }
    });
});

function phonenumber(obj) {
    var phoneno = /^\(\+84\)[0-9]{2,3}[-]\d{3}[-]\d{4}$/;
    if (obj.value.match(phoneno)) {
        obj.style.border = '1px solid green';

        return true;
    }
    else {
        obj.style.border = '2px solid red';
        return false;
    }
}

// return url with url
function redirect(_url) {
    window.location = _url;
}

// call function login
function callLogin(){
    var newURL = window.location.protocol + "//" + window.location.host + "/auth/login";
    window.location = newURL;
}


// mask  phone-number vn (+84) xx-xxx-xxxx OR (+84) xxx-xxx-xxxx
var options;
options = {
    onKeyPress: function (cep, e, field, options) {
        var masks = ['(+84)000-000-0000', '(+84)00-000-00000'];
        mask = (cep.length > 16) ? masks[0] : masks[1];

        $('#phone-number').mask(mask, options);
    }
};

$('#phone-number').mask('(+84)00-000-0000', options);


// validate email
function isEmail(email) {
    var regex = /^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    return regex.test(email);
}
// them user gioi thieu vao o tim kiem email
/* tham so
 * this
 *  id cua search box
 *  id cua btn add
 *  id cua do du lieu
 *  id cua ceo_cv
 */
function txtBoxAddUser(obj, idBoxSearch, idBtnAddCeo, idField, idCeo_CV, idsearchclear) {
    var id_User = parseInt($(obj).val());
    if (id_User) {
        var name_User = obj.options[obj.selectedIndex].text;
        var img_url = obj.options[obj.selectedIndex].style.cssText;
        var _style = img_url + ' width: 177px; background-repeat: no-repeat; background-size: 25px;';
        var nameFunc = 'addUserCeo(\''+idBoxSearch+'\', \''+ idCeo_CV +'\', \''+ idBtnAddCeo +'\', \''+ idField +'\', \'' + idsearchclear +'\')';

        $('#' + idBoxSearch).attr({'style': _style, 'valId': id_User});
        $('#' + idBoxSearch).val(name_User);

        $('#' + idBtnAddCeo).attr({'onclick': nameFunc, 'disabled': false});
    }
    $(obj).remove();
}

// add user user vao cv
function addUserCeo(idBoxSearch, idCeo_CV, idBtnAddCeo, idField, idsearchclear) {
    var $idBoxSearch = $('#'+idBoxSearch);
    var is_idCV = myCompare(idBoxSearch, idField, '_');
    var valUserCeo = $idBoxSearch.attr('valid');
    var url_img = '';
    var showhtml = '<div class="textarea" contenteditable="false"';
    if (valUserCeo) {
        $idBoxSearch.attr('style').split(/.*\("|"\).*/).forEach(function (items) {
            if (items) {
                url_img = items;
            }
        });
        var textUser = $idBoxSearch.val();
        var set_img = '<img src="' + url_img + '"/> ' + textUser;
        showhtml += ' name="txtAddCeo" id="textarea_' + idCeo_CV + '" valUser="' + valUserCeo + '"> ' + set_img + '</div>';
    } else {
        showhtml += '/></div>';
    }
    $('#box_' + idCeo_CV).html(showhtml);

    arr__ActNotes['textarea_' + idCeo_CV ] = valUserCeo;
    // sau khi them thanh cong
    // tra ve mac dinh <=> chi cho phep 1 nguoi gioi thieu
    clearBoxSearch(idsearchclear, idBoxSearch, idField, idBtnAddCeo);
    $('#' + idBoxSearch).attr('disabled', true);

    if(is_idCV) {
        $('.btn-submit-' + is_idCV).attr('disabled', false);
    }
}

// xoa gia tri trong the input tim kiem nguoi gioi thieu
function clearBoxSearch (idClearBoxSearch, idBoxSearch, idField, idBtnAddCeo) {
    $('#' + idClearBoxSearch).css('display', 'none');
    $('#' + idBoxSearch).removeAttr('style');
    $('#' + idBoxSearch).val('');
    $('#' + idField).hide();
    $('#'+idBtnAddCeo).attr('disabled', true);
}

// xoa nguoi gioi thieu
function clearBoxUserCeo(idBoxSearch, idUserCeo){
   // tim kiem idCV
    var is_idCV = myCompare(idBoxSearch, idUserCeo, '_');

    // neu ton tai co nguoi gioi thieu
    // xoa nguoi gioi thieu
    if ($('#' +idUserCeo).length) {
        $('#' + idBoxSearch).attr('disabled', false);
        $('#' + idUserCeo).remove();
        arr__ActNotes[idUserCeo] = true;

        if(is_idCV) {
            $('.btn-submit-' + is_idCV).attr('disabled', false);
        }
    }
}

/* so sanh chuoi
 * input: String
 * output: String compare first
 */
function myCompare(str1, str2, s){
    var result = '';
	var split_str = ' ';
	if (s) {
		split_str = s;
	}
    if (str1 && str2) {
        var tmpStr1 = str1.split(split_str);
        var tmpStr2 = str2.split(split_str);

        for (var key1 in tmpStr1) {
            var _temp = tmpStr1[key1];
            for (var key2 in tmpStr2) {
                if (_temp == tmpStr2[key2]) {
                    result = _temp;
                    break;
                }
            }
        }
    }
    return result;
}

$('.menu_download .list_do').on('click', downloadCV);
//$('.reaction-box li').on('click', downloadCV);

function downloadCV(){
    var export_type = $(this).attr('export-type');
    var status = $('#status_statistic li.active').attr('id');

    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();

    if(status == 'position'){
        var day = new Date().toJSON().slice(0,10);
        if(startDate > endDate || endDate > day){
            $('#error_date').show();
            $('#error_date').text('Nhập sai ngày tháng!');
        } else {
            $('#error_date').hide();
            $.ajax({
                type: "GET",
                url: "/downloadCV/" + export_type,
                data : {
                    'status' : status,
                    'startDate' : startDate,
                    'endDate' : endDate,
                    'key_search' : $('#positionsSearch').val()
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data.path);
                    var path = data.path;
                    //download file
                    location.href = path;
                }
            });
        }
    }else{
        $('#error_date').hide();
        $.ajax({
        type: "GET",
            url: "/downloadCV/" + export_type,
            data : {
                'status' : status,
                'startDate' : startDate,
                'endDate' : endDate,
                'key_search' : $('#positionsSearch').val()
            },
            dataType: 'json',
            success: function (data) {
                console.log(data.path);
                var path = data.path;
                //download file
                location.href = path;
            }
        });
    }
}

