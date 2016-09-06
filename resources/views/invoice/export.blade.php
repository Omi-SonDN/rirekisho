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
        
        @if($cv != null)
            <?php $listCV = $cv[0]->listPo?>
            <thead>
                <tr>
                    <th colspan="{{count($listCV) + 2 }}" style="text-align: center; height: 40px; background-color: #ddd;"">
                    Thống kê số lượng CV theo {{$text}}</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td style="background-color: #666699"></td>
                <td style="background-color: #666699">CV update</td>
                    
                    @for($i = 0; $i < count($listCV); $i++)
                        <td style="width: 15px; background-color: #666699">{{ $listCV[$i]['status']}}</td>
                    @endfor
            </tr>
            @foreach($cv as $cv1)
                <tr>
                    <td style="">{{ $cv1->ox }} </td>
                    <td style="">{{ $cv1->count }}</td>
                    <?php $listCV = $cv1->listPo?>
                    @for($i = 0; $i < count($listCV); $i++)
                        <td style="">{{ $listCV[$i]['count']}}</td>
                    @endfor
                </tr>
            @endforeach
            
        </tbody>
        @else
            <thead>
                <tr>
                    <td style="">Không có dữ liệu</td>
                </tr>
            </thead>
        @endif
    </table>
</body>

</html>