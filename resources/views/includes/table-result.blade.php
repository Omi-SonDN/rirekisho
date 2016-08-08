@if(!$count)
    <tr class="no-record">
        <td colspan="100%">
            <div style="text-align: center;">There are no records to display</div>
        </td>
    </tr>
@else
    @foreach($CVs as $key => $CV)
        <tr class="data{{++$key}}">
            <td class="image">
                <div style=" position: relative;height: 100px;width: 100px;">
                    <?php $image = $CV->User->image;?>
                    @if($image!="")
                        <img style="height: 100px; width: 100px;"
                             src=<?php echo "/img/thumbnail/thumb_" . $image;?> >
                    @else
                        <div class="dropzone-text-place"
                             style="background-color:{{$CV->User->getThemeColor()}} ">
                            <span class="dropzone-text letter-avatar"
                                  style="color: {{$CV->User->getTextColor()}};">
                                {{substr(trim($CV->name), 0, 1)}}
                            </span>
                        </div>
                    @endif
                </div>
            </td>
            <td class="rank">{{$key}}</td>
            <td class="name"><a href="{{url('CV',$CV )}} ">{{ $CV->Name }} </a></td>
            <td class="worth">{{$CV->JGender}}</td>
            <td data-field="age">{{$CV->Age}}</td>
            @can('Visitor')
            <td class="name" style="">@if($CV->position){{$CV->position->name}}@endif </td>
            <td style="">
                <div class="status" id="status{{ $CV->id}}">
                    @include('includes._form_status',['CV' => $CV])
                    @can('Admin')
                        <input type="hidden" value="{{ $CV->id}}" id="id"/>
                        <input type="hidden" value="{{ ($CV->User->email)}}" id="email"/>
                        @if($CV->status->allow_sendmail)
                        <button id="btn_send_email{{ $CV->id}}" class="btn btn-primary btn-send-email col-lg-12" value="{{ $CV->Status }}">Send Email {{ $CV->Status }}</button>
                        @else
                        <button id="btn_send_email{{ $CV->id}}" class="btn btn-primary disabled btn-send-email col-lg-12" value="{{ $CV->Status }}">Send Email {{ $CV->Status }}</button>
                        @endif
                    @endcan
                </div>
            </td>
            @endcan
            @can('Admin')
            <td><a href="{{url('CV',[$CV ,'edit'])}}"><span style="margin-left: 45px;" class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
            @endcan
        </tr>
    @endforeach
@endif
