@extends('xCV.template')
<title>Xem hồ sơ {{$CV->name_cv}}</title>
@section('content')

    <div class="p-box" style="height: 700px;">
        <div class="top-card " style="">
            <div class="profile">
                <div class="profile-picture ">
                    <?php ?>
                    @if(isset($image)&&($image!=""))
                        <img style="height: 200px; width: 200px;" src=<?php echo "/img/thumbnail/thumb_" . $image;?> >
                    @else
                        <div class="dropzone-text-place"
                             style="background-color:{{$CV->User->getThemeColor()}} ">
                            <span class="dropzone-text letter-avatar"
                                  style="color: {{$CV->User->getTextColor()}};font-size:120px;">
                                {{substr(trim($CV->User->Name), 0, 1)}}
                            </span>
                        </div>
                    @endif
                </div>
                <div class="clear-fix"></div>
                <div class="profile-overview ">

                    <ul class="profile-nav skippable">
                        <li class="title">
                            <h2> {{$CV->User->Last_name}} {{$CV->User->First_name}}</h2>
                            <h3>{{$CV->User->Furigana_name}}
                                @can('Visitor')
                                <a data-action="bookmark" data-bookmark-id="{{$CV->user->hash}}"
                                   style='color:#efa907;' title="Bookmark this user!">
                                    @if($bookmark)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o "></i>
                                    @endif
                                </a>

                                @endcan
                            </h3>
                        </li>

                        <li class="p-link">
                            <a class="" href="#S-info">
                                <i class="fa fa-user " id="p-active"></i>
                                <div class="li-text">Thông tin cá nhân</div>

                            </a>
                        </li>

                        <li class="p-link">
                            <a class="" href="#File-pdf">
                                <i class="fa fa-file-pdf-o"></i><div class="li-text">File đính kèm</div>
                            </a>
                        </li>
                        <li class="p-link">
                            <a class="" href="#S-selfintro">
                                <i class="fa fa-file-text "></i>
                                <div class="li-text">Pro・Nguyện vọng</div>

                            </a>
                        </li>

                        <li class="p-link">
                            <a href="{{($CV->attach) ? '/files/'.$CV->attach : '#'}}" title="{{$CV->name_cv}}" target="_blank">
                                <i class="fa fa-download "></i><div class="li-text">Download CV</div>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="profile-link">
                    <a href=""></a>
                </div>
                @can('Visitor')
                <div class="clear-fix"></div>
                <table class="imagetable">
                    <th><span>@can('Admin')Duyệt CV -@endcan Ghi chú</span> <span class="fa fa-remove pull-right rm-text" onclick="clearContents('txt_{{$CV->hash}}')" title="Xóa hết ghi chú"></span></th>
                    <tr>
                        @can('Admin')
                        <td>
                            <div class="fix-info-cv pull-left">{{$CV->Checkcv}} &nbsp; &nbsp;</div>
                            <div class="onoffswitch pull-right">
                                <input type="checkbox" name="check_{{($CV->id)}}" onclick="isChanges(this.id)" class="onoffswitch-checkbox" id="myCheck_{{$CV->hash}}" {{($CV->Active == 1) ? 'checked' : ''}} />
                                <label class="onoffswitch-label" for="myCheck_{{$CV->hash}}">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </td>
                        @endcan
                    </tr>
                    <tr>
                        <td style="width: 100%; padding: 0">
                            <textarea id="txt_{{$CV->hash}}" rows="8" name="txtNotes" style="resize: vertical; width: 100%" onchange="isChanges(this.id)">{!! old('txtNotes', isset($CV) ? $CV->notes : '') !!}</textarea>
                            <button type="button" onclick="upActNotee('{{$CV->hash }}', 'myCheck_{{$CV->hash}}', 'txt_{{$CV->hash}}')" class="btn btn-default btn-sm btn-ac-note btn-{{$CV->hash}}">submit</button>
                            @can('Admin')
                            <button type="button" onclick="getDeleteCV('{{$CV->hash }}', {{$CV->type_cv}})" title="Xóa CV {{$CV->name_cv}}" class="btn btn-default btn-sm btn-ac-note btn-{{$CV->hash}}">Delete</button>
                            @endcan
                            <button type="button" title="Trang chủ" onclick="returnHome()" class="btn btn-default btn-sm btn-ac-note">Cancel</button>
                            <div class="wait-modal-load"></div>
                        </td>
                    </tr>
                </table>
                @endcan
                @if (Auth::user()->getRole() == 'Applicant')
                    <button type="button" title="Trang chủ" onclick="returnHome()" class="btn btn-default btn-sm btn-ac-note pull-right">Cancel</button>
                    @endcan
            </div>

        </div>

        <div class="basic-info">
            <div class="hd">

            </div>

            <div class="bd">
                <ul>
                    <li id="S-info">
                        <table>
                            <th colspan="100%"><h2 style="text-align: left;">Thông tin cá nhân</h2></th>
                            <tr>
                                <th><h4>Ngày sinh</h4></th>
                                <td>{{$CV->User->Birthday}} （{{$CV->User->Age}} tuổi）</td>

                            </tr>
                            <tr>
                                <th><h4>Giới tính</h4></th>
                                <td> {{$CV->User->Jgender}} </td>
                            </tr>

                            <tr>
                                <th><h4>Tình trạng hôn nhân</h4></th>
                                <td>{{$CV->User->Jmarriage}} </td>

                            </tr>
                        </table>
                    </li>
                    <hr/>
                    <li id="">
                        <table>
                            <th colspan="2"><h2 style="text-align: left;">Thông tin liên lạc</h2></th>
                            <tr>
                                <th><h4>Điện thoại</h4></th>
                                <td>{{$CV->User->Phone}}</td>

                            </tr>
                            <tr>
                                <th><h4>Địa chỉ hiện tại</h4></th>
                                <td>{{$CV->User->Address}}</td>

                            </tr>
                            <tr>
                                <th><h4>Địa chỉ liên hệ</h4></th>
                                <td>{{$CV->User->Contact_information}}</td>

                            </tr>
                        </table>
                    </li>
                    <hr/>
                    <li id="File-pdf">
                        <table>
                            <th colspan="100%"><h2 style="text-align: left;">File đính kèm </h2></th>
                            <tr>
                                <td style="width: 100%; padding: 0">
                                @if ($CV->attach)
                                    <iframe src="{{'/files/' . $CV->attach}}" class="mt8 fix-file-view" style="margin-bottom: 30px; height:450px;" frameborder="0"></iframe>
                                @else
                                    Chưa có file đính kèm
                                @endif
                                </td>
                            </tr>
                        </table>
                    </li>

                    <li id="S-selfintro">
                        <table class="table table-sm table-hover table-show">
                            <thead>
                            <tr>
                                <th colspan="100%"><h2 style="text-align: left;">Giới thiệu bản thân</h2></th>
                            </tr>
                            </thead>
                            @if ($CV->User->Self_intro)
                                <tr>
                                    <td class="col-lg-12">{{$CV->User->Self_intro}} </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="col-lg-12">Chưa có thông tin mô tả nào</td>
                                </tr>
                            @endif
                        </table>
                    </li>
                    <li>
                        <table class="table table-sm table-hover table-show">
                            <thead>
                            <tr>
                                <th colspan="100%"><h2 style="text-align: left;">Vị trí ứng tuyển</h2></th>
                            </tr>
                            </thead>
                            @if ($CV->positionCv->NamePosition)
                                <tr>
                                    <td class="col-lg-12">{{$CV->positionCv->NamePosition}} </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="col-lg-12">Chưa có thông tin mô tả nào</td>
                                </tr>
                            @endif
                        </table>
                    </li>
                    <li>
                        <table class="table table-sm table-hover table-show">
                            <thead>
                            <tr>
                                <th colspan="100%"><h2 style="text-align: left;">Nguyện vọng</h2></th>
                            </tr>
                            </thead>
                            @if ($CV->Request)
                                <tr>
                                    <td class="col-lg-12">{{$CV->Request}} </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="col-lg-12">Chưa có thông tin mô tả nào</td>
                                </tr>
                            @endif
                        </table>
                    </li>
                </ul>
            </div>

        </div>
        <div class="ft">
            Ngày cập nhật: {{$CV->updated_at}}
        </div>
    </div>

@stop