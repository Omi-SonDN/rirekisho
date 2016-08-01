@if(!$count)
    <tr class="no-record">
        <td colspan="100%">
            <div style="text-align: center;">There are no records to display</div>
        </td>
    </tr>
@else
    <?php //$CVx = $CVs->reject(function ($item) {
        //return $item->Name == null || $item->Age == "0000-00-00";
    //});
    ?>

    @foreach($CVs as $key => $CV)
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
            <td class="rank">{{++$key}}</td>
            <td class="name"><a href="{{url('CV',$CV )}} ">{{ $CV->Name }} </a></td>
            <td class="worth">{{$CV->JGender or ''}}</td>
            <td data-field="age">{{$CV->Age or ''}}</td>
            @can('Visitor')
            <td class="name" style="{{$CV->position}}">
                <select class="form-control" name="_positions" onchange="change_positions(this, {{ $CV->id }})">
                    <option>-- Chọn vị trí --</option>
                    @foreach ($_Position as $position)
                        @if(Auth::user()->getRole() === 'Visitor')
                            @if ($position->id === $CV->apply_to)
                                <option selected value="{{$position->id}}">{{$position->name}}</option>
                            @endif
                        @else
                            <option {{($position->id === $CV->apply_to) ? 'selected' : ''}} value="{{$position->id}}">{{$position->name}}</option>
                        @endif
                    @endforeach
                </select>
            </td>

            <td style="">
                <div class="status" id="status{{ $CV->id or ''}}">
                    @include('includes._form_status',['CV' => $CV])
                    @can('Admin')
                        <input type="hidden" value="{{ $CV->id or ''}}" id="id"/>
                        <input type="hidden" value="{{ ($CV->User->email) or ''}}" id="email"/>
                        <button id="btn_send_email{{ $CV->id or ''}}" class="btn btn-primary btn-send-email col-lg-12" value="{{ $CV->Status }}">Send Email {{ $CV->Status }}</button>
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
