@if($type==0)
    @if($errors->any())
    <ul class="danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="panel">
        <div class="panel panel-heading">
            {{$cv->Statusname}}
        </div>
        <div class="panel panel-body">
            <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="type" value="{{$type}}" />
                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control" type="email" placeholder="Recipient's email address" value="{{ $email }}"/>       
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject"/>
                </div>
            </div>
            <button class="btn btn-primary" name="sendMail">Send mail</button>
            </form>
        </div>
    </div>
@endif
@if($type==1)
    @if($errors->any())
    <ul class="danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="panel">
        <div class="panel panel-heading">
            Trạng thái đồng ý phỏng vấn:
        </div>
        <div class="panel panel-body">
            <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="type" value="{{$type}}" />
                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control" type="email" placeholder="Recipient's email address" value="{{ $email }}"/>       
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject"/>
                </div>
                <hr>
                Xin hen ban<br>                
                <div class="form-group">
                    <label for="date" class="label label-default">Ngay: </label>
                    <input type="date" class="form-control" name="date" id="date" data-date='{"startView": 2, "openOnMouseFocus": true}'/>
                </div>
                <div class="form-group">
                    <label for="time" class="label label-default">Vao luc: </label>
                    <input type="time" class="form-control" name="time" id="time"/>
                </div>
                <div class="form-group">
                    <label for="address" class="label label-default">Tai: </label>
                    <input class="form-control" name="address" value="Tầng 8 tòa nhà CTM Số 139 Cầu giấy, phường Quan Hoa, quận Cầu Giấy, Hà Nội."/>
                </div>
                <div class="form-group">
                    <label for="attach" class="label label-default">Attach: </label>
                    <input name="attach[]" class="form-control" type="file" multiple=""/>
                </div>

                <hr>
                <button class="btn btn-primary" name="sendMail">Send mail</button>
            </div>
            </form>
        </div>
    </div>
@endif
@if($type==2)
    @if($errors->any())
    <ul class="danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="panel">
        <div class="panel panel-heading">
            Trạng thái đặt lịch phỏng vấn:
        </div>
        <div class="panel panel-body">
            <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="type" value="{{$type}}" />
                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control" type="email" placeholder="Recipient's email address" value="{{ $email }}"/>       
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name" value="Admin" />
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject" value="Test" />
                </div>
                <hr>
                Xin hen ban<br>                
                <div class="form-group">
                    <label for="date" class="label label-default">Ngay: </label>
                    <input type="date" class="form-control" name="date" id="date" data-date='{"startView": 2, "openOnMouseFocus": true}'/>
                </div>
                <div class="form-group">
                    <label for="time" class="label label-default">Vao luc: </label>
                    <input type="time" class="form-control" name="time" id="time"/>
                </div>
                <div class="form-group">
                    <label for="address" class="label label-default">Tai: </label>
                    <input class="form-control" name="address" value="Tầng 8 tòa nhà CTM Số 139 Cầu giấy, phường Quan Hoa, quận Cầu Giấy, Hà Nội."/>
                </div>
                <div class="form-group">
                    <label for="attach" class="label label-default">Attach: </label>
                    <input name="attach[]" class="form-control" type="file" multiple=""/>
                </div>

                <hr>
                <button class="btn btn-primary" name="sendMail">Send mail</button>
            </div>
            </form>
        </div>
    </div>
@endif
@if($type==3)
    @if($errors->any())
    <ul class="danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="panel">
        <div class="panel panel-heading">
            Trạng thái loại:
        </div>
        <div class="panel panel-body">
            <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="type" value="{{$type}}" />
                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control" type="email" placeholder="Recipient's email address" value="{{ $email }}"/>       
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject"/>
                </div>
                <button class="btn btn-primary" name="sendMail">Send mail</button>
            </div>
            </form>
        </div>
    </div>
@endif
@if($type==9)
    @if($errors->any())
    <ul class="danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="panel">
        <div class="panel panel-heading">
            Trạng thái đồng ý làm bài test:
        </div>
        <div class="panel panel-body">
            <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="type" value="{{$type}}" />
                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control" type="email" placeholder="Recipient's email address" value="{{ $email }}"/>       
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject"/>
                </div>
                <hr>
                Xin hen ban<br>                
                <div class="form-group">
                    <label for="date" class="label label-default">Ngay: </label>
                    <input type="date" class="form-control" name="date" id="date" data-date='{"startView": 2, "openOnMouseFocus": true}'/>
                </div>
                <div class="form-group">
                    <label for="time" class="label label-default">Vao luc: </label>
                    <input type="time" class="form-control" name="time" id="time"/>
                </div>
                <div class="form-group">
                    <label for="address" class="label label-default">Tai: </label>
                    <input class="form-control" name="address" value="Tầng 8 tòa nhà CTM Số 139 Cầu giấy, phường Quan Hoa, quận Cầu Giấy, Hà Nội."/>
                </div>
                <div class="form-group">
                    <label for="attach" class="label label-default">Attach: </label>
                    <input name="attach[]" class="form-control" type="file" multiple=""/>
                </div>

                <hr>
                <button class="btn btn-primary" name="sendMail">Send mail</button>
            </div>
            </form>
        </div>
    </div>
@endif
@if($type==12)
    @if($errors->any())
    <ul class="danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="panel">
        <div class="panel panel-heading">
            Trạng thái nhận:
        </div>
        <div class="panel panel-body">
            <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="type" value="{{$type}}" />
                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control" type="email" placeholder="Recipient's email address" value="{{ $email }}"/>       
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject"/>
                </div>
                <hr>
                Xin hen ban<br>                
                <div class="form-group">
                    <label for="date" class="label label-default">Ngay: </label>
                    <input type="date" class="form-control" name="date" id="date" data-date='{"startView": 2, "openOnMouseFocus": true}'/>
                </div>
                <div class="form-group">
                    <label for="time" class="label label-default">Vao luc: </label>
                    <input type="time" class="form-control" name="time" id="time"/>
                </div>
                <div class="form-group">
                    <label for="address" class="label label-default">Tai: </label>
                    <input class="form-control" name="address" value="Tầng 8 tòa nhà CTM Số 139 Cầu giấy, phường Quan Hoa, quận Cầu Giấy, Hà Nội."/>
                </div>
                <div class="form-group">
                    <label for="attach" class="label label-default">Attach: </label>
                    <input name="attach[]" class="form-control" type="file" multiple=""/>
                </div>

                <hr>
                <button class="btn btn-primary" name="sendMail">Send mail</button>
            </div>
            </form>
        </div>
    </div>
@endif
@if($type==26)
    @if($errors->any())
    <ul class="danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="panel">
        <div class="panel panel-heading">
            Lịch làm bài test:
        </div>
        <div class="panel panel-body">
            <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="type" value="{{$type}}" />
                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control" type="email" placeholder="Recipient's email address" value="{{ $email }}"/>       
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject"/>
                </div>
                <hr>
                Xin hen ban<br>                
                <div class="form-group">
                    <label for="date" class="label label-default">Ngay: </label>
                    <input type="date" class="form-control" name="date" id="date" data-date='{"startView": 2, "openOnMouseFocus": true}'/>
                </div>
                <div class="form-group">
                    <label for="time" class="label label-default">Vao luc: </label>
                    <input type="time" class="form-control" name="time" id="time"/>
                </div>
                <div class="form-group">
                    <label for="address" class="label label-default">Tai: </label>
                    <input class="form-control" name="address" value="Tầng 8 tòa nhà CTM Số 139 Cầu giấy, phường Quan Hoa, quận Cầu Giấy, Hà Nội."/>
                </div>
                <div class="form-group">
                    <label for="attach" class="label label-default">Attach: </label>
                    <input name="attach[]" class="form-control" type="file" multiple=""/>
                </div>

                <hr>
                <button class="btn btn-primary" name="sendMail">Send mail</button>
            </div>
            </form>
        </div>
    </div>
@endif
@if($type==29)
    @if($errors->any())
    <ul class="danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="panel">
        <div class="panel panel-heading">
            Phỏng vấn lại:
        </div>
        <div class="panel panel-body">
            <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">        
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="type" value="{{$type}}" />
                <div class="form-group">
                    <label for="recipient" class="label label-default">Recipient: </label>
                    <input name="recipient" class="form-control" type="email" placeholder="Recipient's email address" value="{{ $email }}"/>       
                </div>

                <div class="form-group">
                    <label for="sender" class="label label-default">Sender: </label>
                    <input name="sender" class="form-control" placeholder="Sender's name"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-default">Subject: </label>
                    <input name="subject" class="form-control" placeholder="Subject"/>
                </div>
                <hr>
                Xin hen ban<br>                
                <div class="form-group">
                    <label for="date" class="label label-default">Ngay: </label>
                    <input type="date" class="form-control" name="date" id="date" data-date='{"startView": 2, "openOnMouseFocus": true}'/>
                </div>
                <div class="form-group">
                    <label for="time" class="label label-default">Vao luc: </label>
                    <input type="time" class="form-control" name="time" id="time"/>
                </div>
                <div class="form-group">
                    <label for="address" class="label label-default">Tai: </label>
                    <input class="form-control" name="address" value="Tầng 8 tòa nhà CTM Số 139 Cầu giấy, phường Quan Hoa, quận Cầu Giấy, Hà Nội."/>
                </div>
                <div class="form-group">
                    <label for="attach" class="label label-default">Attach: </label>
                    <input name="attach[]" class="form-control" type="file" multiple=""/>
                </div>

                <hr>
                <button class="btn btn-primary" name="sendMail">Send mail</button>
            </div>
            </form>
        </div>
    </div>
@endif