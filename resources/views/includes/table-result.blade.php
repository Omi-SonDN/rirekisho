@if(!$count)
    <tr class="no-record">
        <td colspan="100%">
            <div style="text-align: center;">There are no records to display</div>
        </td>
    </tr>
@else

    {{--@foreach($CVs as $key => $CV)--}}
        {{--<tr class="data{{++$key}}">--}}
            {{--<td class="rank">{{$key}}</td>--}}

    <?php //$CVx = $CVs->reject(function ($item) {
        //return $item->Name == null || $item->Age == "0000-00-00";
    //});
        $i = 0;
    ?>

    @foreach($CVs as $key => $CV)
        <tr class="data{{$key}}">
            <td class="rank" style="text-align: center">{{++$i }}</td>
            <td class="image">
                <div style=" position: relative;height: 100px;width: 100px; cursor: progress" onmouseover="topxTip(document.getElementById('tip_{{$CV->hash}}').innerHTML)" onmouseout="UnTip()">
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
                    <a href="{{ \URL('CV/create/upload/'. $CV->hash) }}" title="Xem CV {{$CV->name_cv}}">{{ $CV->User->Name }} </a>
                @else
                    <a href="{{url('CV',$CV )}}" title="Xem CV {{$CV->name_cv}}">{{ $CV->User->Name }} </a>
                @endif
            </td>
            <td class="worth">{{$CV->User->JGender}}</td>
            <td data-field="age">{{$CV->User->Age}}</td>

            @can('Visitor')
            <td class="name" style="">{{(!empty($CV->positionCv)) ? $CV->positionCv->name : '---'}}</td>
            <td style="">
                <div class="status" id="status{{ $CV->id}}">
                    @include('includes._form_status',['CV' => $CV])
                    @can('Admin')
                        <input type="hidden" value="{{ $CV->id}}" id="id"/>
                        <input type="hidden" value="{{ ($CV->User->email)}}" id="email"/>

                        @if(!empty($CV->status))
                            <button id="btn_send_email{{ $CV->id}}" class="btn btn-primary btn-send-email {{($CV->status->allow_sendmail) ? '' : 'disabled'}} col-lg-12" value="{{ $CV->Status }}">Send Email {{ $CV->Status }}</button>
                        @else
                            <button id="btn_send_email{{ $CV->id}}" class="btn btn-primary disabled btn-send-email col-lg-12" value="">Send Email </button>
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
                                <a href="{{ \URL('CV/create/upload/'. $CV->hash .'/edit') }}" title="Sửa CV tên: {{$CV->name_cv }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            @endif
                        </td>
                        <td>
                            @if ($CV->type_cv == 0)
                                <a style="-webkit-user-select: none;{{ ($CV->Active == 0) ? 'color:red;' : 'color: #008000' }}" {!! ($CV->Active == 0) ? 'alt="Cv Offline" title="CV chưa được được duyệt"' : 'alt="Cv Online" title="CV đã được duyệt"' !!}  href="{{url('CV',$CV )}}" ><span class="fa fa-power-off"></span></a>
                            @else
                                <a style="-webkit-user-select: none;{{ ($CV->Active == 0) ? 'color:red;' : 'color: #008000' }}" {!! ($CV->Active == 0) ? 'alt="Cv Offline" title="CV chưa được được duyệt"' : 'alt="Cv Online" title="CV đã được duyệt"' !!}  href="{{ \URL('CV/create/upload/'. $CV->hash) }}" ><span class="fa fa-power-off"></span></a>
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
                            <a href="javascript:void(0);" onclick="getDeleteCV('{{$CV->hash}}', {{$CV->type_cv}});" title="Xóa CV tên: {{$CV->name_cv }}">
                                <span class="fa fa-trash-o" aria-hidden="true"></span>
                                {{--<input type="checkbox" name="checkDelCV" />--}}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="100%" style="text-align: center">
                        {!! $CV->Livecv !!}
                        </td>
                    </tr>
                </table>
            </td>

            @endcan

        </tr>
        <!-- -------------------------BQN custom Tooltip CV chua chinh lai css custom.css---------------------------------------- -->
        <div class="topx-bit">
            <div class="floatcontainer" id="tip_{{$CV->hash}}" style="display:none;">
                <div class="forumhead foruminfo topx-tip-head" style="margin-top:0px;">
                    <h2><span class="forumtitle">Thông tin</span></h2>
                </div>
                <hr>
                <div class="childforum forumbit_post">
                    <div class="forumrow table topx-tip-info">
                        <div> • <strong>Tiêu đề:</strong> <a href="{{\URL('CV.show', [$CV->hash])}}" title="{{ucfirst($CV->name_cv)}}">{{ucfirst($CV->name_cv)}}</a></div>
                        <div> • <strong>Vị trí tuyển dụng:</strong> <a href="">{{ucfirst('rtllk77777777llll')}}</a></div>
                        <div> • <strong>Kết quả:</strong> <a href="">{{ucfirst('rtllkl7777777llll')}}</a></div>
                        <div> • <strong>Nguyện vọng:</strong> {!! $CV->Self_intro !!}</div>
                        <hr>
                        <div class="col-lg-3"> • <strong>Thể loại:</strong> {{ucfirst($CV->cvType)}}</div>
                        <div class="col-lg-3"> • <strong>Duyệt:</strong> {{$CV->Checkcv}}</div>
                        <div class="col-lg-3"> • <strong>Duyệt bởi:</strong> {!! ucfirst($CV->ActBycv) !!}</div>
                        @can('SuperAdmin')
                        <div> • <strong>Trạng thái:</strong> {!! $CV->Livecv !!}</div>
                        @endcan

                        <div class="clearfix"></div>
                        <div class="col-lg-4"><span class="fa fa-anchor"> </span> <strong>Tác giả:</strong> <a href="#" title="Viet them trang thong tin tai khoan">{{ucfirst($CV->User->Name)}}</a></div>
                        <div class="col-lg-4"><span class="fa fa-tags"> </span> <strong>Ngày khởi tạo:</strong> {{date("d-m-Y H:m A", strtotime($CV->created_at))}}</div>
                        <div class="col-lg-4"><span class="fa fa-tags"> </span> <strong>Last post time:</strong> {{date("d-m-Y H:m A", strtotime($CV->updated_at))}}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
