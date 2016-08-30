<div id="templatemo-contact">
    <div class="container">
        <div class="row">
            <div class="templatemo-line-header head_contact">
                <div class="text-center">
                    <hr class="team_hr team_hr_left hr_gray"/>
                    <span class="txt_darkgrey">CONTACT US</span>
                    <hr class="team_hr team_hr_right hr_gray"/>
                </div>
            </div>
            <div class="test-monial-time-line pull-left">
                <div class="col-sm-8">
                    <div class="templatemo-contact-map" id="map-canvas">
                        @if($dtCp)
                            {!! $dtCp->map !!}
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <i>Tìm chúng tôi tại <span class="txt_orange"> @if($dtCp){!!
                        $dtCp->address !!}@endif</span></i>
                </div>
                <div class="col-sm-4 contact_right">
                    <h3>Liên hệ với chúng tôi.</h3>

                    <p><img src="{{ URL::asset('/frontend/img/location.png') }}" alt="icon 1"/>  @if($dtCp){!!
                        $dtCp->address !!}@endif</p>

                    <p><img src="{{ URL::asset('/frontend/img/phone1.png') }}" alt="icon 2"/> @if($dtCp)
                            @foreach(explode(',', $dtCp->phones) as $item) {!! $item !!} @endforeach
                        @endif</p>

                    <p><img src="{{ URL::asset('/frontend/img/globe.png') }}" alt="icon 3"/><a class="link_orange"
                                                                                               href="#"><span
                                    class="txt_orange">@if($dtCp){!! $dtCp->nameCompany !!}@endif</span></a></p>
                                    @include('includes.flash-alert')
                    <form class="form-horizontal" action="{{url('contact').'#templatemo-contact'}}" method="post" >
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name..." maxlength="40" value="{!! old('name') !!}" />
                            @if ($errors->has('name'))
                                <span style="color:red;" class="help-block">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email..." maxlength="40" value="{!! old('email') !!}"/>
                            @if ($errors->has('email'))
                                <span style="color:red;" class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" style="height: 130px;"
                                      placeholder="Write down your message..." name="message">{!! old('message') !!}</textarea>
                                      @if ($errors->has('message'))
                                <span style="color:red;" class="help-block">
                                    {{ $errors->first('message') }}
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-orange pull-right">SEND</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.container -->
</div><!-- /#templatemo-contact -->