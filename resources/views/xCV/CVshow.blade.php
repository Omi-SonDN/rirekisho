@extends('xCV.template')
<title>Xem </title>
@section('content')

    <!--div class="display-box" style=""-->
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
                                {{substr(trim($CV->name), 0, 1)}}
                            </span>
                        </div>
                    @endif
                </div>
                <div class="clear-fix"></div>
                <div class="profile-overview ">

                    <ul class="profile-nav skippable">
                        <li class="title">
                            <h2> {{$CV->Last_name}} {{$CV->First_name}}</h2>
                            <h3>{{$CV->Furigana_name}}
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
                            <a class="" href="#S-school">
                                <i class="fa fa-graduation-cap"></i>
                                <div class="li-text">Chứng chỉ・Bằng cấp</div>

                            </a>
                        </li>
                        <li class="p-link">
                            <a href="#S-work">
                                <i class="fa fa-history "></i>
                                <div class="li-text">Kinh nghiệm làm việc</div>

                            </a>
                        </li>
                        <li class="p-link">
                            <a class="" href="#S-selfintro">
                                <i class="fa fa-file-text "></i>
                                <div class="li-text">Pro・Nguyện vọng</div>

                            </a>
                        </li>
                        <li class="p-link">
                            <a class="" href="#S-skill">
                                <i class="fa fa-keyboard-o "></i>
                                <div class="li-text">IT skill</div>
                            </a>
                        </li>

                        <li class="p-link">
                            <a href="{{url('CV',[$CV ,'getPDF'])}}" name="">
                                <i class="fa fa-download "></i>
                                <div class="li-text">Download CV</div>

                            </a>
                        </li>

                    </ul>
                </div>
                <div class="profile-link">
                    <a href=""></a>
                </div>
            </div>

        </div>

        <div class="basic-info">
            <div class="hd">

            </div>

            <div class="bd">
                <ul>
                    <li id="S-info">
                        <table>
                            <tr>
                                <th colspan="2"><h2 style="text-align: left;">Thông tin cá nhân</h2></th>
                            </tr>
                            <tr>
                                <th><h4>Ngày sinh</h4></th>
                                <td>{{$CV->Birthday}} （{{$CV->Age}} tuổi）</td>

                            </tr>
                            <tr>
                                <th><h4>Giới tính</h4></th>
                                <td> {{$CV->Jgender}} </td>
                            </tr>

                            <tr>
                                <th><h4>Tình trạng hôn nhân</h4></th>
                                <td>{{$CV->Jmarriage}} </td>

                            </tr>
                        </table>
                    </li>
                    <li id="">
                        <table>
                            <tr>
                                <th colspan="2"><h2 style="text-align: left;">Thông tin liên lạc</h2></th>
                            </tr>
                            <tr>
                                <th><h4>Điện thoại</h4></th>
                                <td>{{$CV->Phone}}</td>

                            </tr>
                            <tr>
                                <th><h4>Địa chỉ hiện tại</h4></th>
                                <td>{{$CV->Address}}</td>

                            </tr>
                            <tr>
                                <th><h4>Địa chỉ liên hệ</h4></th>
                                <td>{{$CV->Contact_information}}</td>

                            </tr>
                        </table>
                    </li>
                    <li id="S-school">
                        <table>
                            <tr>
                                <th colspan="2"><h2 style="text-align: left;">Quá trình học tập</h2></th>
                            </tr>
                            <?php
                            $School = $Records->filter(function ($item) {
                                return $item->getRole() == "School";
                            });
                            ?>
                            @if(!$School->count())
                                <tr>
                                    <th></th>
                                    <td style="color: gray;">There are no records to display</td>
                                </tr>
                            @else
                                @foreach ($School as $Record)
                                    <?php $r_id = $Record ; ?>

                                    <tr>
                                        <th><h4>{{$Record->VNDate}}</h4></th>
                                        <td>{{$Record->Content}}  </td>
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
                        <table>
                            <tr>
                                <th colspan="2"><h2 style="text-align: left;">Chứng chỉ・Bằng cấp</h2></th>
                            </tr>


                            @if(!$Cert ->count())
                                <tr>
                                    <th></th>
                                    <td style="color: gray;">There are no records to display</td>
                                </tr>
                            @else
                                @foreach ($Cert as $Record)
                                    <?php $r_id = $Record ; ?>

                                    <tr>
                                        <th><h4>{{$Record->VNDate}}</h4></th>
                                        <td>{{$Record->Content}}  </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </li>
                    <li id="S-work">
                        <table>
                            <tr>
                                <th colspan="2"><h2 style="text-align: left;">Kinh nghiệm làm việc</h2></th>
                            </tr>

                            <?php
                            $Work = $Records->filter(function ($item) {
                                return $item->getRole() == "Work";
                            });
                            ?>

                            @if(!$Work ->count())
                                <tr>
                                    <th></th>
                                    <td style="color: gray;">There are no records to display</td>
                                </tr>
                            @else
                                @foreach ($Work as $Record)
                                    <?php $r_id = $Record ; ?>

                                    <tr>
                                        <th><h4>{{$Record->VNDate}}</h4></th>
                                        <td>{{$Record->Content}}  </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>

                    </li>

                    <li id="S-selfintro">
                        <table>
                            <tr>
                                <th colspan="2"><h2 style="text-align: left;">Giới thiệu bản thân</h2></th>
                                <tr><th></th><td>{{$CV->Self_intro}} </td></tr>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table>
                            <tr>
                                <th colspan="2"><h2 style="text-align: left;">Nguyện vọng</h2></th>
                                <tr><th></th><td>{{$CV->Request}} </td></tr>
                            </tr>

                        </table>
                    </li>
                    <li>
                        <?php
                        $Skill = $skills->filter(function ($item) {
                            return $item->getRole() == "Language";
                        });
                        ?>
                        <table>
                            <tr>
                                <th><h2>Language</h2></th>
                            </tr>
                            @if(!$Skill ->count())
                                <tr>
                                    <th></th>
                                    <td style="color: gray;">There are no records to display</td>
                                </tr>
                            @else
                                @foreach ($Skill as $Record)
                                    <tr>
                                        <th><h4>{{$Record->name}}</h4></th>
                                        <td>{{$Record->study_time}}  {{$Record->work_time}}  </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </li>
                    <li id="S-skill">
                        <table>
                            <tr>
                                <th colspan="2" ><h2 style="text-align: left;">Programing language</h2></th>
                            </tr>
                            <?php
                            $Skill = $skills->filter(function ($item) {
                                return $item->getRole() == "ProgLang";
                            });
                            ?>
                            @if(!$Skill->count())
                                <tr>
                                    <th></th>
                                    <td style="color: gray;">There are no records to display</td>
                                </tr>
                            @else
                                @foreach ($Skill as $Record)
                                    <tr>
                                        <th><h4>{{$Record->name}}</h4></th>
                                        <td>{{$Record->study_time}}  {{$Record->work_time}} </td>
                                    </tr>
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
                        <table>
                            <tr>
                                <th><h2>Framework</h2></th>
                            </tr>
                            @if(!$Skill ->count())
                                <tr>
                                    <th></th>
                                    <td style="color: gray;">There are no records to display</td>
                                </tr>
                            @else
                                @foreach ($Skill as $Record)
                                    <tr>
                                        <th><h4>{{$Record->name}}</h4></th>
                                        <td>{{$Record->study_time}}  {{$Record->work_time}}  </td>
                                    </tr>
                                @endforeach
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