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
<?php $key = $CV ;?>
<h1 style="">
    Resume
</h1>

<ul class="list">
    <li>
        <table class="table-bordered table table-striped" style="width: 100%;">
            <thead>
            <tr class="">
                <th colspan="2" style="text-align: right;">{{$CV->updated_at}}</th>
                <th rowspan="4"></th>
            </tr>


            </thead>
            <tbody>
            <tr class="">
                <td style="width:10%;"> Furigana</td>
                <td>{{$CV->Furigana_name}} </td>

            </tr>
            <tr class="">
                <td style="width:10%;"> Tên</td>
                <td>{{$CV->name}} </td>

            </tr>
            <tr class="">
                <td style="width:10%;"></td>
                <td>{{$CV->BDay}} （満 {{$CV->Age}}歳） {{$CV->Jgender}}</td>

            </tr>
            <tr class="">
                <td style="width:10%;"> Address</td>
                <td>{{$CV->Address}} </td>
                <td style="width:23%;">Phone: {{$CV->Phone}}</td>
            </tr>
            <tr class="">
                <td style="width:10%;"></td>
                <td>{{$CV->Contact_information}} </td>
                <td style="width:23%;"></td>
            </tr>
            </tbody>
        </table>

    </li>
    <li>
        <table class="table-bordered table table-striped" style="width: 100%;">
            <thead>
            <tr class="">
                <th colspan="4">School history</th>
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
                        <center>There are no records to display</center>
                    </td>
                </tr>
            @else
                <?php $i = 0;?>
                @foreach ($School as $Record)
                    <?php $r_id = $Record ; ?>
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
                <th colspan="4">Work history</th>
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
                    <td colspan="5">
                        <center>There are no records to display</center>
                    </td>
                </tr>
            @else
                <?php $i = 0;?>
                @foreach ($Work as $Record)
                    <?php $r_id = $Record ; ?>
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
                <th colspan="2" style="text-align: right;">Self -intro</th>

            </tr>


            </thead>
            <tbody>
            <tr class="">
                <td style="width:10%;"> Self -intro</td>
                <td>{{$CV->Self_intro}} 　{{$CV->Self_intro}}</td>
            </tr>
            <tr class="">
                <td style="width:10%;"> 希望</td>
                <td>Et omnis ea illum illo id　{{$CV->Request}}  </td>
            </tr>

            </tbody>
        </table>

    </li>
</ul>

</body>

</html>