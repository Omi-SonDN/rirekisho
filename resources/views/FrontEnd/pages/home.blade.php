@extends('FrontEnd.master')
<title>Chào mừng bạn đến trang website Ominext</title>


@section('content')
    <div class="clearfix"></div>
    <!----start-test-monials---->
    <div  id="test" class="testmonials">
        <div class="container">
            <div class="templatemo-line-header head_contact">
                <div class="text-center">
                    <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">Testimonial</span>
                    <hr class="team_hr team_hr_right hr_gray"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="test-monial-time-line-left-text">
                <p class="cb">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
            </div>

            <!----start-testmonial-time-line---->
            <div class="test-monial-time-line">
                <div class="col-md-6 test-monial-time-line-left">
                    <div class="test-monial-time-line-grid test-monial-time-line-grid-l1">
                        <div class="col-md-9 test-monial-time-line-left-text">
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                        </div>
                        <div class="col-md-3 test-monial-time-line-left-pic">
                            <img src="{{ URL::asset('/frontend/images/pic1.jpg') }}" title="name" />
                            <a href="#">John Doe</a>
                        </div>
                        <span class="grid-point"> </span>
                    </div>
                </div>
                <div class="col-md-6 test-monial-time-line-right">
                    <div class="test-monial-time-line-grid test-monial-time-line-grid-r1">
                        <div class="col-md-3 test-monial-time-line-left-pic">
                            <img src="{{ URL::asset('/frontend/images/pic2.png') }}" title="name" />
                            <a href="#">John Doe</a>
                        </div>
                        <div class="col-md-9 test-monial-time-line-left-text">
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                        </div>
                        <span class="grid-point grid-point1"> </span>
                    </div>
                    <div class="test-monial-time-line-grid test-monial-time-line-grid-r2">
                        <div class="col-md-3 test-monial-time-line-left-pic">
                            <img src="{{ URL::asset('/frontend/images/pic2.png') }}" title="name" />
                            <a href="#">John Doe</a>
                        </div>
                        <div class="col-md-9 test-monial-time-line-left-text">
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
                        </div>
                        <span class="grid-point grid-point1"> </span>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="test-monial-timeline-connector">
                    <span> </span>
                </div>
                <div class="clearfix"> </div>
                <a class="more-testmonial-time-line" href="#"> <span>More</span></a>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
    <!----//End-testmonial-time-line---->

@include('FrontEnd.blocks.contact', ['dtCp'=> $configcp])
@stop
