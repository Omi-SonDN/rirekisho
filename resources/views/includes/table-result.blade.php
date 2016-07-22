<?php $count = $CVs->count();?>
@if(!$count)
    <tr class="no-record">
        <td colspan="6">
            <div style="text-align: center;">There are no records to display</div>
        </td>
    </tr>
@else
    <?php $CVx = $CVs->reject(function ($item) {
        return $item->Name == null || $item->Age == "0000-00-00";
    });
    $i = 0;
    ?>
    @foreach ($CVx as $CV)
        <tr class="data">
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
            <td class="rank">{{++$i}}</td>
            <td class="name"><a href="{{url('CV',$CV )}} ">{{ $CV->Name }} </a></td>
            <td class="name">{{ $CV->Furigana_name }}  </td>
            <td class="worth">{{$CV->j_gender}}</td>
            <td data-field="age">{{ $CV->Age }} 歳</td>
            <td></td>
            @can('Visitor')
            <td>
                <div class="position" id="position{{ $CV->id }}">
                    {{ $CV->position->name }}
                </div>
            </td>
            @endcan
            @can('Admin')
            <td>
                <div class="status" id="status{{ $CV->id }}">
                    @include('includes._form_status',['CV' => $CV])
                    <input type="hidden" value="{{ $CV->id }}" id="id"/>
                    <input type="hidden" value="{{ $CV->User->email }}" id="email"/>
                    <button id="btn_send_email{{ $CV->id }}" class="btn btn-primary btn-send-email" value="{{ $CV->Status }}">Send Email {{ $CV->Status }}</button>
                </div>
            </td>
            <td><a href="{{url('CV',[$CV ,'edit'])}}">Sửa</a></td>
            @endcan
        </tr>
    @endforeach
    <tr id="number-result" style="display: none;">
        <td colspan="6">Có {{$count }} kết quả</td>
    </tr>
@endif
<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
        </div>
    </div>
</div>

<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('js/CV_changeStatus.js') }}"></script>
<script src="{{ asset('js/email_send.js') }}"></script>