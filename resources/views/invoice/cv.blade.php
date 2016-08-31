<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- local css-->

    <style>
        @page {
            margin-top: 4.3em;
        }

        * {
            font-family: verdana, DejaVu Sans, sans-serif;
            /*font-family: ipagothic;*/
        }

        /*
        @font-face {
            font-family: 'ipagothic';
            src: url('fonts/ipaex.ttf') format('truetype');
        }*/
        li {
            list-style: none;
        }

        li:after {
            content: ".";
            display: block;
            clear: both;
            font-size: 0;
            line-height: 0;
            height: 0;
            overflow: hidden;
            margin-bottom: 40px;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        .table-bordered {
            border: 1px solid #ddd;

        }

        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
            padding: 8px;
            vertical-align: top;
            border-top: 1px solid #ddd;
            font-size: 12px;
            text-align: left;
        }

        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border-left: 1px solid #ddd;
        }

        .table-striped > tbody > tr:nth-child(odd) > td, .table-striped > tbody > tr:nth-child(odd) > th {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<?php $key = $CV;?>
<h1 style="text-align: center">
    SƠ YẾU LÝ LỊCH
</h1>

<ul class="list">
    <li>
        <table class="table-bordered table table-striped" style="width: 100%;">
            <thead>

            </thead>
            <tbody>
            
            <tr class="">
                <td style="width:15%; font-weight: 700;">Họ và Tên</td>
                <td>{{$CV->User->name}} </td>
                <td rowspan="3" style="" >
                    @if(isset($CV->User->image) && ($CV->User->image != ""))
                            <img style="height: 130px; width: 120px; padding-left: 15px;"
                                 src="{{public_path('/img/thumbnail').'/thumb_'. ($CV->User->image) }}" >
                    @else
                        <div class=""
                             style="background-color:{{$CV->User->getThemeColor()}};  width: 120px; height: 130px; text-align: center ">
                            <span class=""
                                  style="color: {{$CV->User->getTextColor()}};font-size:60pt;">
                                {{substr(trim($CV->User->Name), 0, 1)}}
                            </span>
                        </div>
                    @endif
                </td>

            </tr>

            <tr class="">
                <td style="width:15%; font-weight: 700;">Ngày sinh</td>
                <td>{{$CV->User->Birthday}} （満 {{$CV->User->Age}}歳） {{$CV->User->JGender}}</td>

            </tr>
            <tr class="">
                <td style="width:15%; font-weight: 700;">Email</td>
                <td>{{$CV->User->email}} </td>
                <!-- <td style="width:23%;"></td> -->
            </tr>
            <tr class="">
                <td style="width:15%; font-weight: 700;">Địa chỉ</td>

                <td>{{$CV->User->Address}} </td>
                <td style="width:23%;"></td>
            </tr>
            <tr class="">
                <td style="width:15%; font-weight: 700;">Điện thoại</td>
                <td>{{$CV->User->Phone}} </td>
                <td style="width:23%;"></td>
            </tr>
            </tbody>
        </table>

    </li>
    <li>
        <table class="table-bordered table table-striped" style="width: 100%;">
            <thead>
            <tr class="">
                <th colspan="4">Quá trình học tập</th>
            </tr>
            <tr class="">
                <th style="width:7%;"> #</th>
                <th style="width:13%;">Năm</th>
                <th style="width:13%;">Tháng</th>
                <th>Tên cơ sở giáo dục</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $School = $Records->filter(function ($item) {
                return $item->getRole() == "School";
            });
            ?>
            @if(!$School->count())
                <tr>
                    <td colspan="4">
                        <center>Không có thông tin</center>
                    </td>
                </tr>
            @else
                <?php $i = 0;?>
                @foreach ($School as $Record)
                    <?php $r_id = $Record; ?>
                    <tr class="">
                        <td>{{++$i}}</td>


                        <td>
                            <span>{{getyear($Record->Date)}}</span>

                        </td>
                        <td>
                            <span>{{getMonth($Record->Date)}}</span>
                        </td>
                        <td>
                            <span>{{$Record->Content}}</span>
                        </td>


                    </tr>
                @endforeach
            @endif

            </tbody>
            <tfoot>
            <tr>
                <td colspan="4"></td>
            </tr>
            </tfoot>
        </table>

    </li>
    <li>

        <table class=" table-bordered table table-striped" style="width: 100%;">
            <thead>
            <tr class="">
                <th colspan="4">Kinh nghiệm làm việc</th>
            </tr>
            <tr class="">
                <th style="width:7%;"> #</th>
                <th style="width:13%;">Năm</th>
                <th style="width:13%;">Tháng</th>
                <th>Tên nơi làm việc</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $Work = $Records->filter(function ($item) {
                return $item->getRole() == "Work";
            });
            ?>
            @if(!$Work->count())
                <tr>
                    <td colspan="4">
                        <center>Không có thông tin</center>
                    </td>
                </tr>
            @else
                <?php $i = 0;?>
                @foreach ($Work as $Record)
                    <?php $r_id = $Record; ?>
                    <tr class="">
                        <td>{{++$i}}</td>


                        <td>
                            <span>{{getyear($Record->Date)}}</span>

                        </td>
                        <td>
                            <span>{{getMonth($Record->Date)}}</span>
                        </td>
                        <td>
                            <span>{{$Record->Content}}</span>
                        </td>


                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

    </li>
    <li>
        <table class="table-bordered table table-striped" style="width: 100%;">
            <thead>
            <tr class="">
                <th colspan="2" style="text-align: left;">Vị trí ứng tuyển</th>

            </tr>


            </thead>
            <tbody>
            <tr class="">
                <td style="width:20%;">Vị trí ứng tuyển</td>
                <td>{{$CV->positionCv->NamePosition}}</td>
            </tr>
            </tbody>
        </table>

    </li>
    <li>
        <table class="table-bordered table table-striped" style="width: 100%;">
            <thead>
            <tr class="">
                <th colspan="2" style="text-align: left;">Giới thiệu bản thân</th>

            </tr>


            </thead>
            <tbody>
            <tr class="">
                <td style="width:20%;">Giới thiệu bản thân</td>
                <td>{{$CV->User->Self_intro}}</td>
            </tr>
            <tr class="">
                <td style="width:20%;">Nguyện vọng</td>
                <td>Etomnis eaillum illid　{{$CV->Request}}  </td>
            </tr>

            </tbody>
        </table>

    </li>
</ul>

</body>

</html>