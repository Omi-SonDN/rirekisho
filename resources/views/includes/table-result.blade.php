@if(!$count)
    <tr class="no-record">
        <td colspan="100%">
            <div style="text-align: center;">Chưa có thông tin nào mô tả</div>
        </td>
    </tr>
@else

    @foreach($CVs as $key => $CV)
        <tr class="data{{++$key}}">
            <td class="image" style="width: 90px">
                <div style=" position: relative;height: 100px;width: 100px; cursor: pointer" onmouseover="topxTip(document.getElementById('tip_{{$CV->hash}}').innerHTML)" onmouseout="UnTip()">
                    <?php $image = $CV->User->image;?>
                    @if($image!="")
                        <img style="height: 100px; width: 100px;"
                             src=<?php echo "/img/thumbnail/thumb_" . $image;?> >
                    @else
                        <div class="dropzone-text-place"
                             style="background-color:{{$CV->User->getThemeColor()}} ">
                            <span class="dropzone-text letter-avatar"
                                  style="color: {{$CV->User->getTextColor()}};">
                                {{substr(trim($CV->User->Name), 0, 1)}}
                            </span>
                        </div>
                    @endif
                </div>
            </td>

            <td class="name">
                @if ($CV->type_cv)
                    <a href="{{ \URL('CV/upload/'. $CV->hash) }}" title="Xem CV {{$CV->name_cv}}">{{ $CV->User->Name }} </a>
                @else
                    <a href="{{url('CV',$CV )}}" title="Xem CV {{$CV->name_cv}}">{{ $CV->User->Name }} </a>
                @endif
            </td>
            <td class="worth">{{$CV->User->JGender}}</td>
            <td data-field="age">{{$CV->User->Age}}</td>

            @can('Visitor')
            <td class="name" style="">{{(!empty($CV->positionCv)) ? $CV->positionCv->NamePosition : '---'}}</td> 
            <td style="">
                <div class="status" id="status{{ $CV->id}}">
                    @include('includes._form_status',['CV' => $CV])
                    @can('Admin')
                        <input type="hidden" value="{{ $CV->id}}" id="id"/>
                        <input type="hidden" value="{{ ($CV->User->email)}}" id="email"/>

                        @if(!empty($CV->status))
                            @if($CV->status->allow_sendmail)
                                <button id="btn_send_email{{ $CV->id}}" class="btn btn-primary btn-send-email col-lg-12" value="{{ $CV->Status }}">Send Email</button>
                            @else
                            <button id="btn_send_email{{ $CV->id}}"></button>
                            @endif
                        @else
                            <!-- <button id="btn_send_email{{ $CV->id}}" class="btn btn-primary disabled btn-send-email col-lg-12" value="">Send Email </button> -->
                        @endif
                    @endcan
                </div>
            </td>
            @endcan
            @can('Admin')

            <td style="text-align: center">
                <table style="margin: 0 auto">
                    <tr>
                        <td>
                            @if ($CV->type_cv == 0)
                                <a href="{{url('CV',[$CV ,'edit'])}}" title="Sửa CV tên: {{$CV->name_cv }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            @else
                                <a href="{{ \URL('CV/upload/'. $CV->hash .'/edit') }}" title="Sửa CV tên: {{$CV->name_cv }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            @endif
                        </td>
                        <td>
                            @if ($CV->type_cv == 0)
                                <a style="-webkit-user-select: none;{{ ($CV->Active == 0) ? 'color:red;' : 'color: #008000' }}" {!! ($CV->Active == 0) ? 'alt="Cv Offline" title="CV chưa được được duyệt"' : 'alt="Cv Online" title="CV đã được duyệt"' !!}  href="{{url('CV',$CV )}}" ><span class="fa fa-power-off"></span></a>
                            @else
                                <a style="-webkit-user-select: none;{{ ($CV->Active == 0) ? 'color:red;' : 'color: #008000' }}" {!! ($CV->Active == 0) ? 'alt="Cv Offline" title="CV chưa được được duyệt"' : 'alt="Cv Online" title="CV đã được duyệt"' !!}  href="{{ \URL('CV/upload/'. $CV->hash) }}" ><span class="fa fa-power-off"></span></a>
                            @endif
                        </td>
                        <td>
                            @if ($CV->type_cv == 0)
                                <span style="-webkit-user-select: none; opacity: 0.2;" class="fa fa-paperclip"></span>
                            @else
                                <span style="-webkit-user-select: none; color:#008000; cursor: pointer;" title="CV đính kèm file" class="fa fa-paperclip"></span>
                            @endif
                        </td>
                        <td>
                            <a href="javascript:void(0);" onclick="getDeleteCV('{{$CV->hash}}', '{{$CV->type_cv}}');" title="Xóa CV tên: {{$CV->name_cv }}">
                                <span class="fa fa-trash-o" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                    @can('SuperAdmin')
                    <tr>
                        <td colspan="100%" style="text-align: center;">
                            <img
                                @if ($CV->live)
                                    src="{{asset('/admin/img'). '/users_online.gif' }}"
                                @else
                                    src="{{asset('/admin/img'). '/users_offline.gif' }}"
                                @endif
                            alt=""/>
                        </td>
                    </tr>
                    @endcan
                </table>
            </td>

            @endcan

        </tr>
        <div class="topx-bit">
            <div class="floatcontainer" id="tip_{{$CV->hash}}" style="display:none;">
                <div class="childforum forumbit_post">
                    <div class="forumrow table topx-tip-info">
                        <ul style="line-height: 2;">
                            <li>
                                {{($CV->name_cv)}}
                            </li>
                            <li>
                                {{($CV->positionCV->name)}}
                            </li>
                            <li>
                                {!!($CV->Checkcv)!!}
                            </li>   
                        </ul>                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
