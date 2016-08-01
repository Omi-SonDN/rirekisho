<?php

namespace app\MyLibrary;

/*
$paging = new pagination_temp();

$paging->class_pagination = "light-theme simple-pagination pagination";// ĐẶT CLASS CHO THÀNH PHẦN PHÂN TRANG THEO Ý MUỐN
$paging->class_active = "current"; // TEN CLASS Active
$paging-> page = $page;// TRANG HIỆN TẠI
$paging-> total = $total; // TONG SO ban ghi
$paging-> per_page=$per_page; // SỐ RECORD TRÊN 1 TRANG default = 10
$paging-> adjacents = $adjacents; // SỐ PAGE  CENTER DEFAULT = 3
$paging-> name_page ='page'; // GET NAMEPAGE  LẤY GIÁ TRỊ PAGE THÔNG QUA PHƯƠNG THỨC POST OR GET
$paging-> name_per_page ='per_page'; // GET NAMEPAGE  LẤY GIÁ TRỊ PAGE THÔNG QUA PHƯƠNG THỨC POST OR GET
$paging-> url_modify = 'mod=editnews';//	THÔNG SỐ SUA URL VOI FUNCTION CN_URL_MODIFY

//goi...
$get_paging= $paging->Load();
*/
class Pagination_temp { // PRE 1 2 3 ... 4 5 6 7 8 9 10 ... 13 14 NEXT 	// 14 PAGE

    public $total; // TONG SO PAGE
    public $per_page = 10; // SỐ RECORD TRÊN 1 TRANG default = 10
    public $adjacents = 3; // SỐ PAGE  CENTER
    public $page; // SỐ PAGE
    public $name_page = 'page'; // GET NAME PAGE
    public $name_per_page = 'per_page'; // GET NAME PER PAGE
    public $url_modify = '';//cn_url_modify('mod=cashshop', '__item', '_id', 'do=action', "opt=".$opt);//	THÔNG SỐ SUA URL VOI FUNCTION CN_URL_MODIFY
    public $class_pagination = 'light-theme simple-pagination pagination'; // TÊN CÁC CLASS
    public $class_active = 'current'; // TEN CLASS Active

    private $start;
    private $prev;
    private $next;
    private $lastpage;
    private $lpm1;

    public function Load()
    {

        /* Setup page vars for display. */
        if ($this->page == 0) $this->page = 1; //if no page var is given, default to 1.
        $this->prev = $this->page - 1; //previous page is $this->class_active page - 1
        $this->next = $this->page + 1; //next page is $this->class_active page + 1
        $this->lastpage = ceil($this->total / $this->per_page); //lastpage.
        $this->lpm1 = $this->lastpage - 1; //last page minus 1

        /* CREATE THE PAGINATION */

//        (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?')

        $pagination = "";
        if ($this->lastpage > 1) {
            $pagination .= "<div class='$this->class_pagination'> <ul>";

            if ($this->page > 1) {
                $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $this->prev . " class='page-link prev' title='Prev'>Prev</a></li>";
            } elseif ($this->page == 1)
                $pagination .= "<li><a rel='nofollow' href='' class='$this->class_active' title='Prev'>Prev</a></li>";

            if ($this->lastpage < 7 + ($this->adjacents * 2)) { // so trang < 13 = so bt hien thi
                for ($counter = 1; $counter <= $this->lastpage; $counter++) {
                    if ($counter == $this->page)
                        $pagination .= "<li><a rel='nofollow' href='#' class='$this->class_active' title='Page number $counter'>$counter</a></li>";
                    else
                        $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $counter . " class='page-link' title='Page number $counter'>$counter</a></li>";
                }
            } elseif ($this->lastpage > 5 + ($this->adjacents * 2)) { //enough pages to hide some so trang >11
                //close to beginning; only hide later pages
                if ($this->page < 1 + ($this->adjacents * 2)) { //  hien tai < 7...... => hientai 1 2 3 4 5 6 7 => hien 1 2 3 4 5 6 7 8 9
                    for ($counter = 1; $counter < 4 + ($this->adjacents * 2); $counter++) { //$counter < 9 + (2 tr cuoi)
                        if ($counter == $this->page)
                            $pagination .= "<li><a rel='nofollow' href='#' class='$this->class_active' title='Page number $counter'>$counter</a></li>";
                        else
                            $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $counter . " class='page-link' title='Page number $counter'>$counter</a></li>";
                    }

                    $pagination .= "<li>...</li>";
                    $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $this->lpm1 . " class='page-link' title='Page number $this->lpm1'>$this->lpm1</a></li>";
                    $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $this->lastpage . " class='page-link' title='Page number $this->lastpage'>$this->lastpage</a></li>";
                } //in middle; hide some front and some back
                elseif ($this->lastpage - ($this->adjacents * 2) > $this->page && $this->page > ($this->adjacents * 2)) { // so tr - 6 > hientai  hienta > 6

                    $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . 1 . " class='page-link' title='1'>1</a></li>";        // trang dau 1
                    $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . 2 . " class='page-link' title='2'>2</a></li>";        // trang thu 2
                    $pagination .= "<li>...</li>";
                    for ($counter = $this->page - $this->adjacents; $counter <= $this->page + $this->adjacents; $counter++) { // 1 2 3 hientai 5 6 7  (tong 7)

                        if ($counter == $this->page)
                            $pagination .= "<li><a rel='nofollow' href='#' class='$this->class_active' title='Page number $counter'>$counter</a></li>";
                        else
                            $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $counter . " class='page-link' title='Page number $counter'>$counter</a></li>";
                    }

                    $pagination .= "<li>...</li>";

                    $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $this->lpm1 . " class='page-link' title='Page number $this->lpm1'>$this->lpm1</a></li>"; // trang cuoi - 1
                    $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $this->lastpage . " class='page-link' title='Page number $this->lastpage'>$this->lastpage</a></li>";  // trang cuoi

                } //close to end; only hide early pages
                else {
                    $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . 1 . " class='page-link' title='1'>1</a></li>";
                    $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . 2 . " class='page-link' title='2'>2</a></li>";
                    $pagination .= "<li>...</li>";

                    for ($counter = $this->lastpage - (2 + ($this->adjacents * 2)); $counter <= $this->lastpage; $counter++) {  // chi so = tong - 8; chi so < tong class="$this->class_active"
                        if ($counter == $this->page) {
                            $pagination .= "<li><a rel='nofollow' href='#' class='$this->class_active' title='Page number $counter'>$counter</a></li>";
                        } else {
                            $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $counter . " class='page-link' title='Page number $counter'>$counter</a></li>";
                        }
                    }
                }
            }

            //next button
            if (($this->page >= 1) && $this->page < $this->lastpage) {
                $pagination .= "<li><a href=" . (($this->url_modify) ? ($this->url_modify) .'&amp;' : '?') . $this->name_per_page . '=' . $this->per_page . '&amp;' . $this->name_page . '=' . $this->next . " class='page-link' title='Next'>Next</a></li>";
            } elseif ($this->page == $this->lastpage) {
                $pagination .= "<li><a rel='nofollow' href='' class='$this->class_active' title='Next'>Next</a></li>";
            }

            $pagination .= "</ul></div>\n";
        }
        return $pagination;
    }
    // get set url
    public static function cn_url_modify()
    {
        global $PHP_SELF;
        $GET = $_GET;
        $args = func_get_args();
        $SN = $PHP_SELF;

        // add new params
        foreach ($args as $ks) {
            // 1) Control
            if (is_array($ks)) {
                foreach ($ks as $vs) {
                    $id = $val = '';

                    if (strpos($vs, '=') !== FALSE) {
                        list($id, $var) = explode('=', $vs, 2);
                    } else {
                        $id = $vs;
                    }
                    if ($id == 'self') {
                        $SN = $var;
                    } elseif ($id == 'reset') {
                        $GET = array();
                    } elseif ($id == 'group') {
                        foreach ($vs as $a => $b) {
                            $GET[$a] = $b;
                        }
                    }
                }
            } // 2) Subtract
            elseif (strpos($ks, '=') === FALSE) {
                $keys = explode(',', $ks);

                foreach ($keys as $key) {
                    $key = trim($key);
                    if (isset($GET[$key])) {
                        unset($GET[$key]);
                    }
                }
            } // 3) Add
            else {
                list($k, $v) = explode('=', $ks, 2);

                $GET[$k] = $v;
                if ($v === '') {
                    unset($GET[$k]);
                }
            }
        }

//        $url = $result = array();
////
//        foreach ($GET as $k => $v) if ($v !== '') $result[$k] = $v;
//        foreach ($result as $k => $v) if(!is_array($v)) $url[] = "$k=".urlencode($v);
//
//        list($ResURL) = array( $SN . ($url ? '?' . join('&', $url) : '' ), $SN, $GET );
//        return $ResURL;
        return Pagination_temp::cn_pack_url($GET, $SN);

    }

    public static function cn_pack_url($GET, $URL = PHP_SELF)
    {
        $url = $result = array();

        foreach ($GET as $k => $v) if ($v !== '') $result[$k] = $v;
        foreach ($result as $k => $v) if(!is_array($v)) $url[] = "$k=".urlencode($v);

        list($ResURL) = array( $URL . ($url ? '?' . join('&', $url) : '' ), $URL, $GET );
        return $ResURL;
    }

    public static function cn_arr_pagina($array, $_url, $page, $per_page, $adjacents=3, $name_per_page='per_page',$name_page='page', $class_active='current', $class_pagination='light-theme simple-pagination pagination'){
 
         //$paging-> total = $total = count($array); // TONG SO PAGE
         //$paging-> cn_url_modify = $cn_url_modify;
         $arr =array();
         $paging = new Pagination_temp();
         
         $paging-> class_pagination = $class_pagination;// ĐẶT CLASS CHO THÀNH PHẦN PHÂN TRANG THEO Ý MUỐN
         $paging-> class_active = $class_active; // TEN CLASS Active
         $paging-> page = $page;  // TRANG
        $paging-> total = $total = count($array);; // TONG SO PAGE
        $paging-> per_page = $per_page; // SỐ RECORD TRÊN 1 TRANG default = 10
        $paging-> adjacents = $adjacents; // SỐ PAGE  CENTER DEFAULT = 3
        $paging-> name_page = $name_page; // GET NAMEPAGE  LẤY GIÁ TRỊ PAGE THÔNG QUA PHƯƠNG THỨC POST OR GET
        $paging-> name_per_page = $name_per_page; // GET NAMEPAGE  LẤY GIÁ TRỊ PAGE THÔNG QUA PHƯƠNG THỨC POST OR GET
        $paging-> url_modify = $_url;// THÔNG SỐ SUA URL VOI FUNCTION CN_URL_MODIFY 
  
         
         if($page <= 0) $page_end = $per_page; 
         else if($page != 0) $page_end = $per_page*$page;
          
         $page_frist = (--$page_end) - $per_page;
         
         $_id = 0;
         //for($id = 0; $id < $total; $id++){
         foreach($array as $key => $raw){
          //if($id > $page_end) break;
          if($page_frist < $_id && $_id <= $page_end) $arr[$key] = $array[$key];
          ++$_id;
         }
         
         //goi...
         $get_paging= $paging->Load();
         
         return array($arr, $get_paging);
    }
}