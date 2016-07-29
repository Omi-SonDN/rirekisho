<?php

function str_split_unicode($str, $l = 0)
{
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, 'UTF-8');
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, 'UTF-8');
        }

        return $ret;
    }

    return preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
}

function create_Time($str)
{
    str_split_unicode($str, "/");
    $date_1 = date_create($date1);
}

function getYear($value)
{
    $value = date_create($value);

    return date_format($value, 'Y');
}

function getMonth($value)
{
    $value = date_create($value);

    return date_format($value, 'm');
}

function getDateDate($value)
{
    $value = strtotime($value);

    return date('Y-m-d', $value);
}


