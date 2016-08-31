@extends('xCV.template')
@section('title')Xem hồ sơ {{$CV->name_cv}} @endsection

@section('content')

    <!--div class="display-box" style=""-->
    <div class="p-box" style="height: 700px;">
        <div class="top-card " style="">
            <div class="profile">
                <div class="profile-picture ">
                    @if(isset($image)&&($image!=""))
                        <img style="height: 100px; width: 100px;"
                             src="{{asset('/img/thumbnail').'/thumb_'.$CV->User->image }}">
                    @else
                        <div class="dropzone-text-place"
                             style="background-color:{{$CV->User->getThemeColor()}} ">
                            <span class="dropzone-text letter-avatar"
                                  style="color: {{$CV->User->getTextColor()}};font-size:55px;">
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
                                <a class="bookmark-btn" data-action="bookmark" data-bookmark-id="{{$CV->user->hash}}"
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
                            <a class="" href="#S-school">
                                <i class="fa fa-graduation-cap"></i>
                                <div class="">Chứng chỉ・Bằng cấp</div>
                            </a>
                        </li>
                        <li class="p-link">
                            <a href="#S-work">
                                <i class="fa fa-history "></i>
                                <div class="li-text">Kinh nghiệm làm việc</div>
                            </a>
                        </li>
                        <li class="p-link">
                            <a class="" href="#S-skill">
                                <i class="fa fa-keyboard-o "></i>

                                <div class="li-text">IT skill</div>
                            </a>
                        </li>
                        <li class="p-link">
                            <a class="" href="#S-selfintro">
                                <i class="fa fa-file-text "></i>
                                <div class="li-text">Pro・Nguyện vọng</div>
                            </a>
                        </li>
                        <li class="p-link">
                            <a target="_blank" href="{{url('CV',[$CV ,'getPDF'])}}" name="">
                                <i class="fa fa-download "></i>
                                <div class="li-text">Download CV</div>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="profile-link">
                    <a href=""></a>
                </div>

                @include('includes.CVActManShow')

            </div>
        </div>
        <div class="basic-info">
            <div class="hd"></div>
            <div class="bd">
                <ul>
                    <li id="S-info">
                        <table>
                            <tr>
                                <th colspan="2"><h2 style="text-align: left;">Thông tin cá nhân</h2></th>
                            </tr>
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
                            <tr>
                                <th colspan="2"><h2 style="text-align: left;">Thông tin liên lạc</h2></th>
                            </tr>
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
                    <li id="S-school">
                            <?php
                            $School = $Records->filter(function ($item) {
                                return $item->getRole() == "School";
                            });
                            ?>
                                <table class="table table-hover table-show">
                                    <thead>
                                    <tr class="tr-show">
                                        <th colspan="100%"><h2>Quá trình học tập</h2></th>
                                    </tr>
                                    </thead>
                            @if(!$School->count())
                                        <tr>
                                            <td colspan="100%" style="color: gray;">Không có thông tin</td>
                                        </tr>
                            @else
                                        <tr class="tr-show">
                                            <td class="title col-lg-3">Tên cơ sở giáo dục</td>
                                            <td class="title col-lg-3">Ngày tháng năm</td>
                                        </tr>
                                @foreach ($School as $Record)
                                            <?php $r_id = $Record; ?>

                                    <tr>
                                        <td class="show-dt">{{$Record->Content}}  </td>
                                        <td class="show-dt">{{$Record->VNDate}}  </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </li>
                    <li>
                        <?php
                        $Cert = $Records->filter(function ($item) {
                            return $item->getRole() == "Cert";
                        });
                        ?>
                            <table class="table table-hover table-show">
                                <thead>
                                <tr class="tr-show">
                                    <th colspan="100%"><h2>Chứng chỉ・Bằng cấp</h2></th>
                                </tr>
                                </thead>
                            @if(!$Cert ->count())
                                    <tr>
                                        <td colspan="100%" style="color: gray;">Không có thông tin</td>
                                    </tr>
                            @else
                                    <tr class="tr-show">
                                        <td class="title col-lg-3">Tên nơi làm việc</td>
                                        <td class="title col-lg-3">Ngày tháng năm</td>
                                        {{--<td class="title col-lg-3">Năm</td>--}}
                                    </tr>
                                @foreach ($Cert as $Record)
                                        <?php $r_id = $Record; ?>

                                    <tr>
                                        <td class="show-dt">{{$Record->Content}}  </td>
                                        <td class="show-dt">{{$Record->VNDate}}  </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </li>
                    <li id="S-work">
                        <?php
                            $Work = $Records->filter(function ($item) {
                                return $item->getRole() == "Work";
                            });
                            ?>

                        <table class="table table-hover table-show">
                            <thead>
                            <tr class="tr-show">
                                <th colspan="100%"><h2>Kinh nghiệm làm việc</h2></th>
                            </tr>
                            </thead>
                            @if(!$Work ->count())
                                <tr>
                                    <td colspan="100%" style="color: gray;">Không có thông tin</td>
                                </tr>
                            @else
                                <tr class="tr-show">
                                    <td class="title col-lg-3">Tên ngôn ngữ</td>
                                    <td class="title col-lg-3">Ngày tháng năm</td>
                                    {{--<td class="title col-lg-3">Thời gian làm việc</td>--}}
                                </tr>
                                @foreach ($Work as $Record)
                                    <?php $r_id = $Record; ?>

                                    <tr>
                                        <td class="show-dt">{{$Record->Content}}  </td>
                                        <td class="show-dt">{{$Record->VNDate}}  </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </li>
                    <li>
                        <?php
                        $Skill = $skills->filter(function ($item) {
                            return $item->getRole() == "Language";
                        });
                        ?>
                        <table class="table table-hover table-show">
                            <thead>
                            <tr class="tr-show">
                                <th colspan="100%"><h2>Ngoại ngữ</h2></th>
                            </tr>
                            </thead>
                            @if(!$Skill ->count())
                            <tr>
                                <td colspan="100%" style="color: gray;">Không có thông tin</td>
                            </tr>
                        @else
                                <tr class="tr-show">
                                    <td class="title col-lg-3">Tên ngôn ngữ</td>
                                    <td class="title col-lg-3">Thời gian tự học</td>
                                    <td class="title col-lg-3">Thời gian làm việc</td>
                                </tr>
                            @foreach ($Skill as $Record)
                                <tr>
                                    <td class="show-dt">{{$Record->name}}</td>
                                    <td class="show-dt">{{$Record->study_time}}</td>
                                    <td class="show-dt">{{$Record->work_time}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </table>
                    </li>
                    <li id="S-skill">
                        <table class="table table-hover table-show">
                            <thead>
                            <tr class="tr-show">
                                <th colspan="100%"><h2>Ngôn ngữ</h2></th>
                            </tr>
                            </thead>
                            <?php
                            $Skill = $skills->filter(function ($item) {
                                return $item->getRole() == "ProgLang";
                            });
                            ?>
                            @if(!$Skill->count())
                                <tr>=
                                    <td colspan="100%" style="color: gray;">Không có thông tin</td>
                                </tr>
                            @else
                                <tr class="tr-show">
                                    <td class="title">Tên ngôn ngữ</td>
                                    <td class="title">Thời gian tự học</td>
                                    <td class="title">Thời gian làm việc</td>
                                </tr>
                                @foreach ($Skill as $Record)
                                    <td class="show-dt">{{$Record->name}}</td>
                                    <td class="show-dt">{{$Record->study_time}}</td>
                                    <td class="show-dt">{{$Record->work_time}}</td>
                                @endforeach
                            @endif
                        </table>
                    </li>
                    <li>
                        <?php
                        $Skill = $skills->filter(function ($item) {
                            return $item->getRole() == "Framework";
                        });
                        ?>
                            <table class="table table-sm table-hover table-show">
                                <thead>
                                <tr class="tr-show">
                                    <th colspan="100%"><h2>Framework</h2></th>
                            </tr>
                                </thead>

                                @if(!$Skill ->count())
                                <tr>
                                    <td colspan="100%" style="color: gray;">Không có thông tin</td>
                                </tr>
                            @else
                                    <tr class="tr-show">
                                        <td class="title">Tên Framework đã sử dụng</td>
                                        <td class="title">Thời gian tự học</td>
                                        <td class="title">Thời gian làm việc</td>
                                    </tr>
                                @foreach ($Skill as $Record)
                                    <tr>
                                        <td class="show-dt">{{$Record->name}}</td>
                                        <td class="show-dt">{{$Record->study_time}}</td>
                                        <td class="show-dt">{{$Record->work_time}}</td>
                                    </tr>
                                @endforeach
                            @endif
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