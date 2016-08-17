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
                    <i>You can find us on 80 Dagon Studio, Yankin Street, <span class="txt_orange">Digital Estate</span>
                        in Yangon.</i>
                </div>
                <div class="col-sm-4 contact_right">
                    <p>Lorem ipsum dolor sit amet, consectetu adipiscing elit pendisse as a molesti.</p>

                    <p><img src="{{ URL::asset('/frontend/img/location.png') }}" alt="icon 1"/>  @if($dtCp){!!
                        $dtCp->address !!}@endif</p>

                    <p><img src="{{ URL::asset('/frontend/img/phone1.png') }}" alt="icon 2"/> @if($dtCp)
                            @foreach(explode(',', $dtCp->phones) as $item) {!! $item . ' or' !!} @endforeach
                        @endif</p>

                    <p><img src="{{ URL::asset('/frontend/img/globe.png') }}" alt="icon 3"/><a class="link_orange"
                                                                                               href="#"><span
                                    class="txt_orange">@if($dtCp){!! $dtCp->nameCompany !!}@endif</span></a></p>

                    <form class="form-horizontal" action="#">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Name..." maxlength="40"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email..." maxlength="40"/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" style="height: 130px;"
                                      placeholder="Write down your message..."></textarea>
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