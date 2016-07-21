// Data table sort user class
$(document).ready(function ($) {

    $.tablesorter.customPagerControls({
        table          : $table,                   // point at correct table (string or jQuery object)
        pager          : $pager,                   // pager wrapper (string or jQuery object)
        pageSize       : '.left a',                // container for page sizes
        currentPage    : '.right a',               // container for page selectors
        ends           : 2,                        // number of pages to show of either end
        aroundCurrent  : 1,                        // number of pages surrounding the current page
        link           : '<a href="#">{page}</a>', // page element; use {page} to include the page number
        currentClass   : 'current',                // current page class name
        adjacentSpacer : ' | ',                    // spacer for page numbers next to each other
        distanceSpacer : ' \u2026 ',               // spacer for page numbers away from each other (ellipsis &amp;hellip;)
        addKeyboard    : true                      // add left/right keyboard arrows to change current page
    });

    var $table =  $('#datatables');
    var $pager =  $('.pager');

    $table
        .tablesorter({
            // input search ///
            // bootstrap default blue green jui dropbox grey dark
            theme: 'bootstrap',
            widgets: ['zebra', 'pager', 'filter'],
            // *** Appearance ***
            // fix the column widths
            widthFixed: true,
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
                0: {sorter: false},
                1: {sorter: false},
                2: {sorter: "text"},
                3: {sorter: "email"},
                4: {sorter: "text"},
                5: {sorter: false}
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
            sortList: [ [4, 1]],
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
            filter_searchDelay : 300,
            widgetOptions : {
                //if false disable search
                filter_columnFilters: true,
                filter_reset : '.reset',
                zebra : ["even", "odd"],
                filter_startsWith: false,
                filter_childRows: true
            },
            // Add select box to 4th column (zero-based index)
            // each option has an associated function that returns a boolean
            // function variables:
            // e = exact text from cell
            // n = normalized value returned by the column parser
            // f = search filter input value
            // i = column index
            filter_functions : {
                //0 : function(c, data) {}
            },

            // *** send messages to console ***
            debug: false
        })
        .tablesorterPager({
            container: $pager,
            output: 'showing: {startRow} to {endRow} of {totalRows} rows',
            size: 10,
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

        //set up pager controls
        $('.pager .left a').on('click', function () {
            $(this)
                .addClass('current')
                .siblings()
                .removeClass('current');
            $table.trigger('pagesize', $(this).html());
            return false;
        });
        $('.pager .right .pagecount').on('click', 'a', function(){
            $(this)
                .addClass('current')
                .siblings()
                .removeClass('current');
            $table.trigger('pageSet', $(this).html());
            return false;
        });

    /* thông báo 3s*/
    $("div.alert, span.help-block").delay(3000).slideUp();
});


// xac nhan co xoa
function xacnhanxoa(msg) {
    if (window.confirm(msg)) {
        return true;
    }
    return false;
}