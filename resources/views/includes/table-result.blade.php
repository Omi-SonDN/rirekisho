@if(!$count)
    <tr class="no-record">
        <td colspan="100%">
            <div style="text-align: center;">There are no records to display</div>
        </td>
    </tr>
@else
    <?php $CVx = $CVs->reject(function ($item) {
        return $item->Name == null || $item->Age == "0000-00-00";
    });
    ?>
    @foreach($CVx as $key => $CV)
        <tr class="data{{$key}}">
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
            <td class="worth">{{$CV->JGender or ''}}</td>
            <td data-field="age">{{$CV->Age or ''}}</td>
            @can('Visitor')
            <td class="name" style="{{$CV->position}}"><?php $vt = DB::table('positions')->select('name')->where('id', $CV->apply_to)->first(); if(count($vt)) echo $vt->name; ?></td>
            <td style="">
                <div class="status" id="status{{ $CV->id or ''}}">
                    @include('includes._form_status',['CV' => $CV])
                    @can('Admin')
                    <input type="hidden" value="{{ $CV->id or ''}}" id="id"/>
                    <input type="hidden" value="{{ ($CV->User->email) or ''}}" id="email"/>
                    <button id="btn_send_email{{ $CV->id or ''}}" class="btn btn-primary btn-send-email" value="{{ $CV->Status }}">Send Email {{ $CV->Status }}</button>
                    @endcan
                </div>
            </td>
            @endcan
            @can('Admin')
            <td><button style="margin-left: 25px;"class="btn btn-default btn-edit"><a href="{{url('CV',[$CV ,'edit'])}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></button></td>
            @endcan
        </tr>
    @endforeach
        <tr id="number-result" style="display: none;">
            <td colspan="100%">Có {{$count}} kết quả</td>
        </tr>
@endif

<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
        </div>
    </div>
</div>

<meta name="_token" content="{!! csrf_token() !!}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('js/CV_changeStatus.js') }}"></script>
<script src="{{ asset('js/email_send.js') }}"></script>
