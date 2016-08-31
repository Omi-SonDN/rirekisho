@extends('xCV.template')
@section('title')Thông tin cá nhân @endsection
@section('content')

    <div class="member_content userprof fullwidth" style="display:block;" id="member_content">
        <div class="profile_widgets member_summary userprof_moduleinactive userprof_moduleinactive_border sidebarleft col-md-3"
             id="sidebar_container">
            <div class="block mainblock moduleinactive_bg">
                <h1 class="blocksubhead prof_blocksubhead">

				<span id="userinfo">
					<span class="member_username"><font color="#996633 ">{{$dtUser->userName}}</font></span>
					<span class="member_status">
                    </span>

                        <div style="width: 210px; height: 150px; margin-top: 20px;">
                        @if($dtUser->image != "" && file_exists(public_path($path = '/img/thumbnail/thumb_'.$dtUser->image)))
                            <img style="height: 150px; width: 210px;" src="{{ asset($path) }}">
                        @else
                            <div class="dropzone-text-place"
                                 style="background-color:{{$dtUser->getThemeColor()}} ">
                                <span class="dropzone-text letter-avatar"
                                      style="color: {{$dtUser->getTextColor()}};">
                                    {{substr(trim($dtUser->Name), 0, 1)}}
                                </span>
                            </div>
                        @endif
                        </div>
				</span>
                </h1>
                <div id="userinfoblock" class="floatcontainer">

                </div>
            </div>


            <!-- stats_mini -->
            <div id="view-stats_mini" class="subsection block">
                <div class="mini_stats blockbody userprof_content userprof_content_border">
                    <div class="userinfo ">
                        <h5 class="blocksubhead userprof_blocksubhead smaller">Mini Statistics</h5>

                        <div class="blockrow member_blockrow">
                            <?php
                            $date = $dtUser->created_at;
                                $date = date('d-m-Y H:i A',strtotime($date))
                            ?>

                            <dl class="stats">
                                <dt>Ngày tham gia:</dt>
                                <dd> {{$date}}</dd>
                            </dl>


                            <dl class="stats">
                                <dt>Vị trí: </dt>
                                <dd> {{$dtUser->getRole()}}</dd>
                            </dl>

                        </div>
                    </div>
                    <!-- blockbody -->
                </div>
                <!-- widget block mini_stats -->
            </div>
            <div class="underblock"></div>
            <!-- / stats_mini -->
        </div>

        <div class="member_tabs contentright col-md-9" id="userprof_content_container">
            
            <div class="profile_content userprof">
                <div id="view-activitystream" class="selected_view_section">
                    <!-- activitystream -->
                    <div id="view-activitystream" class="subsection block">
                        <div class="activitystream_block">
                            <div id="activity_tab_container">
                                <div class="clearfix">
                                    <dl class="as-tabs">
                                        
                                        
                                    </dl>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="underblock"></div>
                    <!-- / activitystream -->
                </div>
                <div id="view-aboutme" class="view_section">
                    <div class="box_user_pro">
                            <p class="title_pro">Thông tin cơ bản</p>
                            <ul class="userProfile">
                                <?php
                                    //$date = date_create($dtUser->created_at);
                                    //$date = date_format($date, 'd-m-Y');
                                ?>
                                <li class="user_pro_">
                                    <dt style="float: left">Họ và tên: </dt>
                                    <dd style="float: left"> {{$dtUser->Name}}</dd>
                                </li>
                                <li class="user_pro_">
                                    <dt>Email: </dt>
                                    <dd> {{$dtUser->email}}</dd>
                                </li>
                                <li class="user_pro_">
                                    <dt>Ngày sinh:</dt>
                                    <dd> {{$dtUser->Birthday}}</dd>
                                </li>
                                <li class="user_pro_">
                                    <dt>Giới tính:</dt>
                                    <dd> {{$dtUser->JGender}}</dd>
                                </li>
                                <li class="user_pro_">
                                    <dt>Địa chỉ:</dt>
                                    <dd> {{$dtUser->Address}}</dd>
                                </li>
                            </ul>
                    </div>
                    <div class="box_user_pro" style="height: 150px">
                        <p class="title_pro">Giới Thiệu bản thân</p>
                            <ul class="userProfile">
                                <li class="user_pro_">
                                    <dd style="float: left"> {{$dtUser->Self_intro}}</dd>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop