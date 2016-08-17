<div class="danger"></div>
<div class="panel">
    <div class="panel panel-heading">
        <h3 style="color: #666699; text-align: center;">Trạng thái: {{$status->status}}</h3>
    </div>
    <div class="panel panel-body">
        <form method="post" action="{{ url('emails/sendEmail1') }}" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$id}}"/>
                <input type="hidden" name="type" value="{{$type}}"/>
                <div class="form-group">
                    <label for="recipient" class="label label-primary">Recipient: <i style="color:red">*</i> </label>
                    <input name="recipient" class="form-control " type="email"
                           placeholder="Recipient's email address" value="{{ $email }}" />
                           @if ($errors->has('recipient'))
                                <span class="help-block">
                                    {{ $errors->first('recipient') }}
                                </span>
                            @endif
                </div>
                <div class="form-group">
                    <label for="sender" class="label label-primary">Sender: <i style="color:red">*</i></label>
                    <input name="sender" class="form-control" placeholder="Sender's name" value="{{Auth::user()->name}}"/>
                </div>

                <div class="form-group">
                    <label for="subject" class="label label-primary">Subject: <i style="color:red">*</i> </label>
                    <input name="subject" class="form-control" placeholder="Subject" value="[Thông báo] {{$status->status}}"/>
                </div>
                @if(count($status->info))
                <hr>
                Xin hen ban<br>
                @endif
                @if(in_array('Date',$status->info))
                <div class="form-group">

                    <label for="date" class="label label-primary">Ngay: <i style="color:red">*</i> </label>
                    <input type="date" class="form-control" name="date" id="date"
                           data-date='{"startView": 2, "openOnMouseFocus": true}'/>
                </div>
                @endif
                @if(in_array('Time',$status->info))
                <div class="form-group">
                    <label for="time" class="label label-primary">Vao luc: <i style="color:red">*</i> </label>
                    <input type="time" class="form-control" name="time" id="time"/>
                </div>
                @endif
                @if(in_array('Address',$status->info))
                <div class="form-group">
                    <label for="address" class="label label-primary">Tai: <i style="color:red">*</i> </label>
                    <input class="form-control" name="address"
                           value="Tầng 8 tòa nhà CTM Số 139 Cầu giấy, phường Quan Hoa, quận Cầu Giấy, Hà Nội."/>
                </div>
                @endif
                @if(in_array('Attach',$status->info))
                <div class="form-group">
                    <label for="attach" class="label label-primary">Attach: </label>
                    <input name="attach[]" class="form-control" type="file" multiple=""/>
                </div>
                @endif
            </div>
            <button class="btn btn-primary col-lg-5" name="preview">Xem trước</button>
            <button class="btn btn-primary col-lg-5 col-lg-push-2" name="sendMail">Send mail</button>
        </form>
    </div>
</div>