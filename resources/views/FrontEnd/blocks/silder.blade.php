<div>
    <!-- Carousel -->
    <div id="templatemo-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($slides as $slide)
            <div class="item @if($slide == $slides->first()) active @endif" style="background-image:url({{asset($slide->image)}})">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>{{$slide->text}}</h1>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#templatemo-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#templatemo-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /#templatemo-carousel -->
</div>