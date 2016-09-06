<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
       .export > thead > tr > th{
            text-align: left;
            font-family: verdana, DejaVu Sans, sans-serif;
            border: 1px solid;
            text-align: left;
            width: 20px;
            background-color: #666699
        }
        .export > tbody > tr > td{
            text-align: left;
            font-family: verdana, DejaVu Sans, sans-serif;
            border: 1px solid;
            text-align: left;
            width: 20px;

        }
    </style>
</head>
<body>
	<?php $cv = $data?>
    
    <table class="export">
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
            @foreach($cv as $cv_)
                <?php $apply_to = $cv_->apply_to; ?>
                @foreach($apply_to as $listCV)
                    <?php $list = $listCV->listCV; ?>
                    @foreach($list as $list_)
                        @if($list_ != null)
                            <tr>
                                <td style="">{{ $cv_->ox }} </td>
                                <td style="">{{$list_->User->Name}}</td>
                                <td style="">{{$list_->User->email}}</td>
                                <td style="">{{$list_->positionCv->NamePosition}}</td>
                                <td style="">{{$list_->status->StatusName}}</td>
                                
                            </tr>
                            
                        @endif
                    @endforeach
                @endforeach
            @endforeach
            
        
        </tbody>
    </table>

</body>

</html>