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
    <?php $apply_to = $cv[0]->apply_to;
        $count = count($apply_to) + 1;
    ?>
    <table class="export">
        <thead>
            <tr><th colspan={{$count}} style="text-align: center; height: 30px; background-color: #ddd;">Thống kê số lượng CV theo {{$text}}</th></tr>
        </thead>
    
        <tbody>
            <tr>
                <td style="background-color: #666699"></td>
                

                @foreach($apply_to as $po)
                <td style="background-color:#666699; width: 15px">{{ $po->name }}</td>
                @endforeach

                @foreach($cv as $cv_)
                <tr>
                    <td style="">{{ $cv_->ox }} </td>
                    
                    <?php $apply_to = $cv_->apply_to; ?>

                    @foreach($apply_to as $po)
                    <td style="">{{ $po->count }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tr>
        
        </tbody>
    </table>

</body>

</html>