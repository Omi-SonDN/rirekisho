<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .export > thead > tr > th, .export > tbody > tr > td{
            text-align: left;
            font-family: verdana, DejaVu Sans, sans-serif;
            border: 1px solid;
            text-align: left;
        }
    </style>
</head>
<body>
	<?php $cv = $data?>
    <table class="export" style="">
        <thead>
            <tr>
                <th colspan="3" style="text-align: center; height: 30px">
                Thống kê số lượng CV theo {{$text}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="">{{$text}}</td>
                <td style="">Số lượng CV update</td>
                <td style="">Số lượng CV Pass</td>
            </tr>
            @foreach($cv as $cv1)
            <tr>
                <td style="">{{ $cv1->ox }} </td>
                <td style="">{{ $cv1->count }}</td>
                <td style="">{{ $cv1->count_pass }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>