@extends('xCV.template')
@section('title')Bạn không có quyền truy cập trang @endsection
@section('content')

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        .container-403 {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
            bottom: 600px;
        }

        .content-403 {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
<div class="container-403">
    <div class="content-403">
        <div class="title">403. Forbidden!!</div>
        <div><h3>Access denied.!!</h3></div>
    </div>
</div>
@stop
