$(document).ready(function ($) {
    $.tablesorter.customPagerControls({
        table: $('.tableuser'),                   // point at correct table (string or jQuery object)
        pager: $('.pager'),                   // pager wrapper (string or jQuery object)
        pageSize: '.left a',                // container for page sizes
        currentPage: '.right a',               // container for page selectors
        ends: 2,                        // number of pages to show of either end
        aroundCurrent: 1,                        // number of pages surrounding the current page
        link: '<a href="#">{page}</a>', // page element; use {page} to include the page number
        currentClass: 'current',                // current page class name
        adjacentSpacer: ' | ',                    // spacer for page numbers next to each other
        distanceSpacer: ' \u2026 ',               // spacer for page numbers away from each other (ellipsis &amp;hellip;)
        addKeyboard: true,                      // add left/right keyboard arrows to change current page
        idTotalRecord: 'show' + id_local,                      // them so bang ghi vao Id idTotalRecord hien thuc dang goi
        myHtmlSize: '<span>{mysise}</span>',     // them html voi tong so bang ghi hien thi
        myPageCount: '.pagecount'                      // them vao pagination vao class myPageCount
    });

    //$.tablesorter.addWidget({
    //    id: "numbering",
    //    format: function(table) {
    //        var c = table.config;
    //        $("tr:visible", table.tBodies[0]).each(function(i) {
    //            $(this).find('td').eq(0).text(i + 1);
    //        });
    //    }
    //});

    /*
     / loi
     /
     */
    // add parser through the tablesorter addParser method
    $.tablesorter.addParser({
        id: 'checkbox',
        is: function (s) {
            return false;
        },
        format: function (s, table, cell, cellIndex) {
            var $c = $(cell);
            // return 1 for true, 2 for false, so true sorts before false
            if (!$c.hasClass('updateCheckbox')) {
                $c
                    .addClass('updateCheckbox')
                    .bind('change', function () {
                        $(table).trigger('updateCell', [cell]);
                    });
            }
            return ($c.find('input[type=checkbox]')[0].checked) ? 1 : 2;
        },
        type: 'numeric'
    });

    //$.tablesorter.addParser({
    //    id: 'checkbox',
    //    is: function(s) {
    //        return false;
    //    },
    //    format: function(s, table, cell, cellIndex) {
    //        var $t = $(table),
    //            $tb = $t.children('tbody'),
    //            $c = $(table),
    //            c, check,
    //
    //        // resort the table after the checkbox status has changed
    //            resort = false;
    //
    //        if (!$t.hasClass('hasCheckbox')) {
    //
    //            // update the select all visible checkbox in the header
    //            check = function($t) {
    //                var $v = $tb.children('tr:visible'),
    //                    $c = $v.filter('.checked');
    //                $t.find('.selectVisible').prop('checked', $v.length === $c.length);
    //            };
    //
    //            $t
    //                .addClass('hasCheckbox')
    //                // update select all checkbox in header
    //                .bind('pageMoved', function() {
    //                    check($t);
    //                })
    //                // make checkbox in header set all others
    //                .find('thead th:eq(' + cellIndex + ') input[type=checkbox]')
    //                .addClass('selectVisible')
    //                .bind('change', function() {
    //                    c = this.checked;
    //                    $tb.find('> tr:visible td:nth-child(' + (cellIndex + 1) + ') input')
    //                        .each(function() {
    //                            this.checked = c;
    //                            $(this).trigger('change');
    //                        });
    //                }).bind('mouseup', function() {
    //                    return false;
    //                });
    //            $tb.children('tr').each(function() {
    //                $(this).find('td:eq(' + cellIndex + ')').find('input[type=checkbox]')
    //                    .bind('change', function() {
    //                        $t.trigger('updateCell', [$(this).closest('td')[0], resort]);
    //                        check($t);
    //                    });
    //            });
    //        }
    //        // return 1 for true, 2 for false, so true sorts before false
    //        c = ($c.find('input[type=checkbox]')[0].checked) ? 1 : 2;
    //        $c.closest('tr')[c === 1 ? 'addClass' : 'removeClass']('checked');
    //        return c;
    //    },
    //    type: 'numeric'
    //});

    $('.tableuser')
        .tablesorter({
            // input search ///
            // bootstrap default blue green jui dropbox grey dark
            theme: 'blue',
            widgets: ['zebra', 'filter', 'numbering', 'resizable'],
            // *** Appearance ***
            // fix the column widths
            widthFixed: false,
            // include zebra and any other widgets, options:
            // 'uitheme', 'filter', 'stickyHeaders' & 'resizable'
            // the 'columns' widget will require custom css for the
            // primary, secondary and tertiary columns
            //widgets: ['uitheme', 'zebra'],
            //other options: "ddmmyyyy" & "yyyymmdd"
            dateFormat: "mmddyyyy",

            // *** Functionality ***
            // starting sort direction "asc" or "desc"
            sortInitialOrder: "asc",
            // These are detected by default,
            // but you can change or disable them
            headers: {
                // set "sorter : false" (no quotes) to disable the column
                0: {
                    filter: false,
                    sorter: false
                },
                1: {sorter: "text"},
                2: {sorter: "email"},
                3: {sorter: "text"},
                4: {sorter: "shortDate"},
                5: {
                    sorter: "number"
                },
                6: {},
                7: {},
                8: {
                    sorter: false,
                    filter: false
                }
            },
            // extract text from the table - this is how is
            // it done by default
            textExtraction: {
                0: function (node) {
                    return $(node).text();
                },
                1: function (node) {
                    return $(node).text();
                }
            },
            // forces the user to have this/these column(s) sorted first
            sortForce: null,
            // initial sort order of the columns
            // [[columnIndex, sortDirection], ... ]
            //sortList: [[7, 1]],
            // default sort that is added to the end of the users sort
            // selection.
            sortAppend: null,
            // Use built-in javascript sort - may be faster, but does not
            // sort alphanumerically
            sortLocaleCompare: false,
            // Setting this option to true will allow you to click on the
            // table header a third time to reset the sort direction.
            sortReset: false,
            // Setting this option to true will start the sort with the
            // sortInitialOrder when clicking on a previously unsorted column.
            sortRestart: false,
            // The key used to select more than one column for multi-column
            // sorting.
            sortMultiSortKey: "shiftKey",

            // key used to remove sorting on a column
            sortResetKey: 'ctrlKey',

            // *** Customize header ***
            onRenderHeader: function () {
                // the span wrapper is added by default
                //$(this).find('span').addClass('headerSpan');
            },
            // jQuery selectors used to find the header cells.
            selectorHeaders: 'thead th',

            // *** css classes to use ***
            cssAsc: "headerSortUp",
            cssChildRow: "expand-child",
            cssDesc: "headerSortDown",
            cssHeader: "header",
            tableClass: 'tablesorter',

            // *** widget css class settings ***
            // column classes applied, and defined in the skin
            widgetColumns: {css: ["primary", "secondary", "tertiary"]},
            // find these jQuery UI class names by hovering over the
            // Framework icons on this page:
            // http://jqueryui.com/themeroller/
            widgetUitheme: {
                css: [
                    "ui-icon-arrowthick-2-n-s", // Unsorted icon
                    "ui-icon-arrowthick-1-s",   // Sort up (down arrow)
                    "ui-icon-arrowthick-1-n"    // Sort down (up arrow)
                ]
            },
            // pick rows colors to match ui theme
            widgetZebra: {css: ["ui-widget-content", "ui-state-default"]},

            // *** prevent text selection in header ***
            cancelSelection: true,
            // Delay in milliseconds before the filter widget starts searching; This option prevents searching for
            // every character while typing and should make searching large tables faster.
            filter_searchDelay: 300,
            widgetOptions: {
                //if false disable search
                filter_columnFilters: true,
                filter_reset: '.reset',
                zebra: ["even", "odd"],
                filter_startsWith: false,
                filter_childRows: true,
                resizable_widths: ['1%', '15%', '13%', '7%', '10%', '20%', '7%', '10%', '5%']
            },
            // Add select box to 4th column (zero-based index)
            // each option has an associated function that returns a boolean
            // function variables:
            // e = exact text from cell
            // n = normalized value returned by the column parser
            // f = search filter input value
            // i = column index
            filter_functions: {
                //0 : function(c, data) {}
                //5: function (){
                //    return "null";
                //}
                //5 : function($cell, indx){
                //    return $.tablesorter.filterFormatter.uiDateCompare( $cell, indx, {
                //        // defaultDate : '1/1/2014', // default date
                //        cellText : 'dates >= ', // text added before the input
                //        changeMonth : true,
                //        changeYear : true,
                //        compare : '>='
                //    });
                //}
            },

            // *** send messages to console ***
            debug: false
        })
        .tablesorterPager({
            container: $('.pager'),
            size: per_page_local,
            output: 'Hiển thị: {startRow} tới {endRow} trong {totalRows} bảng ghi',

            //
            //    // if true, the table will remain the same height no matter how many
            //    // records are displayed. The space is made up by an empty
            //    // table row set to a height to compensate; default is false
            fixedHeight: true,
            //
            //    // remove rows from the table to speed up the sort of large tables.
            //    // setting this to false, only hides the non-visible rows; needed
            //    // if you plan to add/remove rows with the pager enabled.
            removeRows: false,
            //
            //    // css class names of pager arrows
            //    // next page arrow
            cssNext: '.next',
            // previous page arrow
            cssPrev: '.prev',
            // go to first page arrow
            cssFirst: '.first',
            // go to last page arrow
            cssLast: '.last',
            // select dropdown to allow choosing a page
            cssGoto: '.gotoPage',
            // location of where the "output" is displayed
            cssPageDisplay: '.pagedisplay',
            // dropdown that sets the "size" option
            cssPageSize: '.pagesize',
            // class added to arrows when at the extremes
            // (i.e. prev/first arrows are "disabled" when on the first page)
            // Note there is no period "." in front of this class name
            cssDisabled: 'disabled'
        });

    $('[data-table=table-user] input#table-search').bind("change blur", Search1);
    function Search1() {
        arr_key['loop'] = 0;
        rmListElement();
        rmBtDel();
        $('.checkAll')[0].checked = false;

        var value = $(this).val();
        var dataString = 'keyword=' + value;
        $('input#table-search').off();
        if (value.length >= 0) {
            $.ajax({
                type: "GET",
                url: "/User/search",
                data: dataString,
                cache: false,
                success: function (html) {
                    $(" [data-reload=true]").html(html);
                    // update tablesorter
                    $('table.tablesorter').trigger("update");
                    $("ul.pagination").hide();
                    $("#number-result").show();
                    $(".tabs li").attr("data-keyword", value);
                    $('[data-table=table-user] input#table-search').bind("change blur", Search1);
                }
            });
        }
    }

    // reset event click table sort
    $('.tableuser thead tr th.sort-tb').on('click', function () {
        rmBtDel();
        $('.checkAll')[0].checked = false;
        arr_key['loop'] = 0;
        rmListElement();
    });
    /*
     * set select all false + value default
     * arr_key['loop] cac chi muc ve mac dinh 0
     * remove items is checked in arr_key['list']
     * remove button del multi
     *  set is false checkAll
     */

    /* thông báo 3s*/
    $("div.alert, span.help-block").delay(7000).slideUp();

    $('body').on('click', '.checkAll', function () {
        var indx = 0;
        if ($(this).is(':checked')) {
            is_check = true;
        } else {
            is_check = false;
        }
        $('tbody tr input.cb-element').each(function () {
            if (($(this).closest('.data').css('display')) != 'none') {
                var val = $(this).val();
                if (is_check) {
                    arr_key['list'][indx] = val;
                    arr_key['loop'] = ++indx;
                    $(this)[0].checked = true;
                } else {
                    $(this)[0].checked = false;
                    arr_key['list'] = [];
                }
            }
        });

        if (is_check) {
            if (arr_key['loop'] > 1) {
                addBtDel();
            }
        } else {
            rmBtDel();
            arr_key['loop'] = 0;
            arr_key['list'] = [];
        }
    });

    $('body').on('click', '.cb-element', function () {
        var val = $(this).val();
        var totalRecord = $('#show' + id_local).text();

        if ($(this)[0].checked) {
            arr_key['list'][arr_key['loop']] = val;
            ++arr_key['loop'];
        } else {
            var idx = arr_key['list'].indexOf(val);
            delete arr_key['list'][idx];
            --arr_key['loop'];
        }

        if (arr_key['loop'] > 1) {
            addBtDel();
        } else {
            rmBtDel();
        }

        if (arr_key['loop'] == totalRecord) {
            $('.checkAll')[0].checked = true;
        } else {
            $('.checkAll')[0].checked = false;
        }
    });

    $(".tableuser thead tr td").on('change', function () {
        rmBtDel();
        $('.checkAll')[0].checked = false;
        arr_key['loop'] = 0;
        rmListElement();
    });



    $('.pager span a,.right, span.right .prev, span.right .next').on('click', function () {
        $('.checkAll')[0].checked = false;
        arr_key['loop'] = 0;
        rmListElement();
        rmBtDel();
    });

});

var arr_key = [];
arr_key['loop'] = 0;
arr_key['list'] = [];


// xac nhan co xoa
function xacnhanxoa(msg) {
    if (window.confirm(msg)) {
        return true;
    }
    return false;
}

//reload page parameter _url
function redirect(_url) {
    window.location = _url;
}

// goi tooltip
function topxTip(content) {
    Tip(content, PADDING, 1, BORDERWIDTH, 0, BGCOLOR, '', STICKY, 1, DURATION, 10000, CLICKCLOSE, true);
}
function rmListElement() {
    for (var key in arr_key['list']) {
        $('.cb-element').attr("checked", false);
    }
    arr_key['list'] = []
}

function addBtDel() {
    return $('.active-del').html('<button class="btn btn-primary" onclick="multi_del_use()"><i class="fa  fa-trash-o" style="margin: 0 auto;"></i> Xóa tài khoản đã chọn</button>');
}

function rmBtDel() {
    return $(".table_action span.active-del button").remove();
}

// del multi record user
function multi_del_use() {
    var result = confirm("Có chắc xóa nhiều bảng ghi không?");
    if (result) {
        var check_del_user = $('input:checkbox:checked.cb-element').map(function () {
            return this.value;
        }).get();

        check_del_user = String(check_del_user);
        $.ajax({
            type: "GET",
            url: "/user/" + check_del_user + "/del",
            data: "",
            cache: false,
            beforeSend: function () {
                $('.wait-modal-load').addClass("loading");
            },
            success: function (data) {
                redirect(data);
                //alert('Bạn đã xóa thành công!');
                //console.log(data);
            },
            ajaxStop: function () {
                $('.wait-modal-load').removeClass("loading");
            }
        });
    }
}
