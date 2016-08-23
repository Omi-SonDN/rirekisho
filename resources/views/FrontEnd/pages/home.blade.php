@extends('FrontEnd.master')
<title>Chào mừng bạn đến trang website Ominext</title>


@section('content')
    <div class="clearfix"></div>
    <!-- start-test-monial -->
    <div class="position">
        <div class="title text-center">
            WE CREATE THE NEXT VALUES!
        </div>
        <div class="content text-center">
            <div class="contrainer">
                <div class="row">
                    @foreach($positions as $position)
                    <div class="col-md-4">
                        <p class="icon"><i class="fa {{$position->icon}}"></i></p>
                        <p class="name">{{$position->name}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
    <section style="background-color:#efefef; padding: 70px 0px;">
        <div class="container introduce">
            <div class="col-md-6">
                <img src="{{asset('frontend/img/Home-map.png')}}" alt="" style="width:100%;"/>
            </div>
            <div class="col-md-6 right-content">
                {!!  $settings->get("ominext")->value !!}
            </div>
        </div>  
    </section>
@include('FrontEnd.blocks.contact', ['dtCp'=> $configcp])
@stop
