@extends('xCV.template')
@section('title')Hiện tại Server không có phản hồi @endsection

@section('content')
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
        .container {
            text-align: center;
            /*display: table-cell;*/
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
        .error-back {
            text-decoration: none;
            color: #430400;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: bold;}
        .error-back:hover {
            color: #EB957D;
            text-shadow: 0 0 3px black;
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>

<div class="container">
    <div class="content">
        <span>
            <h1>{{$e->getStatusCode()}}</h1>
            <h2>{{ $e->getMessage() }}</h2>
        </span>
        <img src="{{asset('public/user/img/503.jpg')}}" width="600" height="449" />
        <a href="{{url('/')}}" title="Back to site" class="error-back">Trang chủ</a>
    </div>
</div>
@stop
