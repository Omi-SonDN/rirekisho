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
    <table class="export" style="">
        @if($cv_ != null)
        <thead>
            <tr><th colspan="5" style="text-align: center; height: 30px; background-color: #ddd;">Thống kê số lượng CV theo {{$text}}</th></tr>
        </thead>
    
        <tbody>
            
            <tr>
                <td style="background-color: #666699; width:10px"></td>
                <td style="background-color:#666699">Name</td>
                <td style="background-color:#666699">Email</td>
                <td style="background-color:#666699">Vị trí</td>
                <td style="background-color:#666699">Trạng thái</td>
            </tr>
                <?php $i = 1 ?>
                @foreach($cv_ as $cv1)
                    <tr>
                        <td style="">{{$i++}}</td>
                        <td style="width: 20px">{{$cv1->User->Name}}</td>
                        <td style="">{{$cv1->User->email}}</td>
                        <td style="">{{$cv1->positionCv->NamePosition}}</td>
                        <td style="">{{$cv1->status->StatusName}}</td>
                        
                    </tr>
                @endforeach
        </tbody>
        @else
        <thead>
            <tr><th colspan="5" style="text-align: center; height: 30px; background-color: #ddd;">Không có dữ liệu</th></tr>
        </thead>
    
        @endif
    </table>
</body>

</html>