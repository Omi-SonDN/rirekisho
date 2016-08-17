@extends('xCV.template')
<title>About us</title>
@section('content')

    {{--<div class="body_wrapper">--}}

        {{--<form action="profile.php?do=dismissnotice" method="post" id="notices" class="notices">--}}
            {{--<input type="hidden" name="do" value="dismissnotice">--}}
            {{--<input type="hidden" name="s" value="">--}}
            {{--<input type="hidden" name="securitytoken" value="guest">--}}
            {{--<input type="hidden" id="dismiss_notice_hidden" name="dismiss_noticeid" value="">--}}
            {{--<input type="hidden" name="url" value="">--}}
            {{--<ol>--}}
                {{--<li class="restore" id="navbar_notice_1">--}}

                    {{--If this is your first visit, be sure to--}}
                    {{--check out the <a href="faq.php" target="_blank"><b>FAQ</b></a> by clicking the--}}
                    {{--link above. You may have to <a href="register.php" target="_blank"><b>register</b></a>--}}
                    {{--before you can post: click the register link above to proceed. To start viewing messages,--}}
                    {{--select the forum that you want to visit from the selection below.--}}
                {{--</li>--}}
            {{--</ol>--}}
        {{--</form>--}}


        <div class="member_content userprof fullwidth" style="display:block;" id="member_content">
            <div class="profile_widgets member_summary userprof_moduleinactive userprof_moduleinactive_border sidebarleft col-md-3"
                 id="sidebar_container">
                <div class="block mainblock moduleinactive_bg">
                    <h1 class="blocksubhead prof_blocksubhead">

					<span id="userinfo">
						<span class="member_username"><img src="{{asset('')}}"><font color="#996633 ">bqngoc</font></span>
						<span class="member_status">
                            <img class="inlineimg onlinestatus"
                                 src="{{asset('')}}"
                                 {{--alt="bqngoc Đang Ngoại tuyến" border="0"--}}
                                 {{--title="bqngoc Đang Ngoại tuyến" />--}}
                        </span>

							<br>
							<span class="usertitle"><center><b><font color="#996633">Thành Viên</font></b>
                                </center></span>



					</span>
                    </h1>
                    <div id="userinfoblock" class="floatcontainer">

                        <ul id="usermenu" class="usermenu">


                            <li>
                                <a href="search.php?do=finduser&amp;userid=104&amp;contenttype=vBForum_Post&amp;showposts=1"><img
                                            src="{{asset('/frontend/images/site_icons/forum.png')}}" alt="Tìm tất cả bài viết"
                                            class="inlineimg" title="Tìm tất cả bài viết"> Tìm tất cả bài viết</a></li>
                            <li>
                                <a href="search.php?do=finduser&amp;userid=104&amp;starteronly=1&amp;contenttype=vBForum_Thread"><img
                                            src="{{asset('/frontend/images/site_icons/forum.png')}}" alt="Tìm tất cả Bài bắt đầu"
                                            class="inlineimg" title="Tìm tất cả Bài bắt đầu"> Tìm tất cả Bài bắt đầu</a>
                            </li>


                        </ul>
                    </div>
                </div>


                <!-- stats_mini -->
                <div id="view-stats_mini" class="subsection block">
                    <div class="mini_stats blockbody userprof_content userprof_content_border">
                        <div class="userinfo ">
                            <h5 class="blocksubhead userprof_blocksubhead smaller">Mini Statistics</h5>

                            <div class="blockrow member_blockrow">

                                <dl class="stats">
                                    <dt>Ngày tham gia</dt>
                                    <dd> 11-09-2015</dd>
                                </dl>


                                <dl class="stats">
                                    <dt>Hoạt động cuối</dt>
                                    <dd> 11-26-2015 <span class="time">08:11 PM</span></dd>
                                </dl>


                                <dl class="stats">
                                    <dt>Avatar</dt>
                                    <dd class="avatar"><img
                                                src=""
                                                alt="bqngoc's Avatar" id="user_avatar" title="bqngoc's Avatar"></dd>
                                </dl>

                            </div>
                        </div>
                        <!-- blockbody -->
                    </div>
                    <!-- widget block mini_stats -->
                </div>
                <div class="underblock"></div>
                <!-- / stats_mini -->

                <div class="friends_mini friends block">
                    <h5 class="blocksubhead userprof_blocksubhead smaller ">


                        <a href="member.php?104-bqngoc#friends-content" class="textcontrol"
                           onclick="return tabViewPicker(document.getElementById('friends-tab'));">Xem thêm</a>

                        <span class="friends_total">1</span> Bạn bè
                    </h5>

                    <div class="blockbody userprof_content userprof_content_border">
                        <div class="blockrow member_blockrow">

                            <ul class="friends_list floatcontainer">
                                <li>
                                    <a class="image_friend_link" href="member.php?1-Administrator">
                                        <img src="image.php?u=1&amp;dateline=1446913852&amp;type=thumb"
                                             alt="Administrator" width="59" height="48" border="0"
                                             title="Administrator">
                                    </a>

                                    <div class="friend_info">
                                        <h6><a href="member.php?1-Administrator" class="username" title="Administrator"><img
                                                        src="{{asset('/frontend/images/icontruocnick/admin.gif')}}" border="0"><font
                                                        color="red"><b>Administrator</b></font></a></h6>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="underblock"></div>


                <!-- visitors -->
                <div id="view-visitors" class="subsection block">
                    <div class="visitors">
                        <h5 class="blocksubhead userprof_blocksubhead smaller">Khách ghé thăm gần đây</h5>

                        <div class="blockbody userprof_content userprof_content_border">
                            <div class="blockrow member_blockrow">

                                <div class="meta">
                                    1 khách ghé thăm gần đây là:
                                </div>
                                <ol class="commalist">

                                    <li><a class="username" href="member.php?1-Administrator"><img
                                                    src="{{asset('/frontend/images/icontruocnick/admin.gif')}}" border="0"><font
                                                    color="red"><b>Administrator</b></font></a></li>

                                </ol>

                                <span class="totalvisits">Trang này được xem 7 lần</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="underblock"></div>
                <!-- / visitors -->


            </div>

            <div class="member_tabs contentright col-md-9" id="userprof_content_container">

                <div class="tabbackground" id="profile_tabs">
                    <div class="floatleft" id="tab_container">
                        <dl class="tabslight">
                            <dt>Tab Content</dt>

                            <dd class="userprof_module"><a id="activitystream-tab"
                                                           href="#activitystream"
                                                           onclick="return tabViewPicker(this);">bqngoc's Activity</a>
                            </dd>

                            <dd class="userprof_moduleinactive"><a id="aboutme-tab"
                                                                   href="#aboutme"
                                                                   onclick="return tabViewPicker(this);">Về tôi</a></dd>
                            <dd class="userprof_moduleinactive"><a id="friends-tab"
                                                                   href="#friends-content"
                                                                   onclick="return tabViewPicker(this);">Bạn bè</a></dd>


                        </dl>
                    </div>

                    <div class="memberprofiletabunder"></div>
                </div>

                <div class="profile_content userprof">
                    <div id="view-activitystream" class="selected_view_section">
                        <!-- activitystream -->
                        <div id="view-activitystream" class="subsection block">
                            <script type="text/javascript">
                                <!--
                                var activity_stream_options = {
                                    'type': 'member',
                                    'mindateline': '0',
                                    'maxdateline': '0',
                                    'minscore': '0',
                                    'minid': '',
                                    'maxid': '',
                                    'count': '0',
                                    'totalcount': '0',
                                    'perpage': '30',
                                    'refresh': '1'
                                };
                                // -->
                            </script>
                            <div class="activitystream_block">
                                <div id="activity_tab_container">
                                    <div class="clearfix">
                                        <dl class="as-tabs">
                                            <dt>Tab Content</dt>
                                            <dd id="asall" class="selected">
                                                <div>
                                                    <a href="member.php?104-bqngoc&amp;tab=activitystream&amp;type=all">All</a>
                                                </div>
                                            </dd>
                                            <dd id="asuser" class="">
                                                <div>
                                                    <a href="member.php?104-bqngoc&amp;tab=activitystream&amp;type=user">bqngoc</a>
                                                </div>
                                            </dd>
                                            <dd id="asfriend" class="">
                                                <div>
                                                    <a href="member.php?104-bqngoc&amp;tab=activitystream&amp;type=friends">Bạn
                                                        bè</a></div>
                                            </dd>

                                            <dd id="asphoto" class="">
                                                <div>
                                                    <a href="member.php?104-bqngoc&amp;tab=activitystream&amp;type=photos">Photos</a>
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>

                                <div id="newactivity_container"
                                     class="newactivity hidden userprof_headers userprof_headers_border">
                                    <span id="newactivitylink" href="#">New Activity (<span
                                                id="newactivitycount"></span>)</span>
                                </div>

                                <ul id="activitylist">
                                    <li id="olderactivity" class="hidden">
                                        <div class="block1">
                                            <hr>
                                        </div>
                                        <div class="block2">Older Activity</div>
                                        <div class="block3">
                                            <hr>
                                        </div>
                                    </li>

                                </ul>

                                <div id="moreactivity_container"
                                     class="moreactivity userprof_headers userprof_headers_border">
                                    <a id="moreactivitylink" class="hidden"
                                       href="member.php?104-bqngoc&amp;tab=activitystream&amp;type=all&amp;page=1">More
                                        Activity</a>
                                    <span id="noresults">No More Results</span>
                                    <img id="moreactivityprogress" class="hidden" src="{{asset('/frontend/images/misc/progress3.gif')}}"
                                         alt="~~Progress~~" title="~~Progress~~">
                                </div>
                            </div>
                        </div>
                        <div class="underblock"></div>
                        <!-- / activitystream -->
                    </div>
                    <div id="view-visitor_messaging" class="view_section vm_other_prof">

                    </div>
                    <div id="view-aboutme" class="view_section">


                        <div class="blocksubhead subsectionhead userprof_headers userprof_headers_border">
                            <span class="subsectiontitle">About bqngoc</span>

                            <!-- basic information -->
                            <h4 class="subsectionhead-understate" id="about-me">Thông tin cơ bản</h4>

                        </div>
                        <div class="subsection">
                            <div class="blockbody userprof_content userprof_content_border">


                            </div>
                        </div>


                        <!-- stats -->
                        <div id="view-stats" class="subsection block">
                            <!-- Statistics -->
                            <div class="blocksubhead subsectionhead userprof_headers userprof_headers_border">
                                <h4 id="view-statistics" class="subsectionhead-understate" style="width:100%">Thống
                                    kê</h4><br>
                            </div>
                            <div class="blockbody subsection userprof_content userprof_content_border">


                                <h5 class="subblocksubhead subsubsectionhead first">Tổng số bài gửi</h5>
                                <dl class="blockrow stats">
                                    <dt>Tổng số bài gửi</dt>
                                    <dd> 8</dd>
                                </dl>
                                <dl class="blockrow stats">
                                    <dt>Gửi mỗi ngày</dt>
                                    <dd> 0.03</dd>
                                </dl>


                                <h5 class="subsubsectionhead">Total Thanks</h5>
                                <dl class="stats">
                                    <dt>Total Thanks</dt>
                                    <dd>2</dd>
                                </dl>
                                <ul class="group">
                                    <li>


                                        Thanked 2 Times in 2 Posts


                                    </li>
                                    <!--	<li>
                                            <a href="post_thanks.php?do=findthanks&amp;u=104">Find all thanked posts by bqngoc</a>
                                        </li>
                                        <li>
                                            <a href="post_thanks.php?do=findthanks_user_gave&amp;u=104">Find all posts thanked by bqngoc</a>
                                        </li>-->
                                </ul>

                                <h5 class="subblocksubhead subsubsectionhead">Thông tin chung</h5>

                                <dl class="blockrow stats">
                                    <dt>Hoạt động cuối</dt>
                                    <dd> 11-26-2015 <span class="time">08:11 PM</span></dd>
                                </dl>


                                <dl class="blockrow stats">
                                    <dt>Ngày tham gia</dt>
                                    <dd> 11-09-2015</dd>
                                </dl>

                                <dl class="blockrow stats">
                                    <dt>Giới thiệu</dt>
                                    <dd> 0</dd>
                                </dl>


                            </div>
                            <!-- view-statistics -->
                        </div>
                        <div class="underblock"></div>
                        <!-- / stats -->
                    </div>
                    <div id="view-friends-content" class="view_section">


                        <h3 class="subsectionhead userprof_title" id="friends">
                            <span class="friends_total">1</span> Bạn bè
                        </h3>

                        <div>
                            <ol class="friends_list floatcontainer userprof_modborder_fill">
                                <li id="friend_mini_1" class="userprof_content userprof_content_border">
                                    <div class="friend_info">
                                        <h4><a href="member.php?1-Administrator" class="username"><img
                                                        src="{{asset('/frontend/images/icontruocnick/admin.gif')}}" border="0"><font
                                                        color="red"><b>Administrator</b></font></a>&nbsp;<img
                                                    class="inlineimg onlinestatus"
                                                    src="{{asset('/frontend//statusicon/user-offline.png')}}"
                                                    alt="Administrator Đang Ngoại tuyến" border="0"
                                                    title="Administrator Đang Ngoại tuyến">
                                        </h4>

                                        <p class="description"></p>
                                        <center><b><font color="red">Administrator</font></b></center>
                                        <p></p>

                                        <div class="presence">


                                        </div>
                                    </div>
                                    <a class="image_friend_link" href="member.php?1-Administrator">
                                        <img src="image.php?u=1&amp;dateline=1446913852&amp;type=thumb"
                                             alt="Administrator" width="59" height="48" title="Administrator">
                                    </a>

                                </li>
                            </ol>
                            <!-- friends_list -->
                        </div>
                        <!-- blockbody -->

                        <div class="userprof_title">
                            Hiển thị bạn bè từ 1 đến 1 của 1
                        </div>


                        <!-- view-friends -->
                    </div>
                    <div id="view-infractions-content" class="view_section">

                    </div>
                    <div id="view-reputation-content" class="view_section">

                    </div>

                </div>
            </div>
        </div>

        {{--<div id="footer" class="floatcontainer footer">--}}

            {{--<form action="forum.php" method="get" id="footer_select" class="footer_select">--}}


            {{--<select name="styleid" onchange="switch_id(this, 'style')">--}}
            {{--<optgroup label="Chọn Giao diện">--}}
            {{--<option class="hidden"></option>--}}
            {{--</optgroup>--}}


            {{--<optgroup label="&nbsp;Standard Styles">--}}

            {{--<option value="3" class="" selected="selected">-- Huyết Long</option>--}}

            {{--</optgroup>--}}


            {{--<optgroup label="&nbsp;Mobile Styles">--}}

            {{--<option value="2" class="">-- Default Mobile Style</option>--}}

            {{--</optgroup>--}}


            {{--</select>--}}


            <!-- / Begin Google Analytics Codes -->
            {{--<script>--}}
            {{--(function (i, s, o, g, r, a, m) {--}}
            {{--i['GoogleAnalyticsObject'] = r;--}}
            {{--i[r] = i[r] || function () {--}}
            {{--(i[r].q = i[r].q || []).push(arguments)--}}
            {{--}, i[r].l = 1 * new Date();--}}
            {{--a = s.createElement(o),--}}
            {{--m = s.getElementsByTagName(o)[0];--}}
            {{--a.async = 1;--}}
            {{--a.src = g;--}}
            {{--m.parentNode.insertBefore(a, m)--}}
            {{--})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');--}}
            {{----}}
            {{--ga('create', 'UA-48086228-1', 'vietitc.net');--}}
            {{--ga('send', 'pageview');--}}
            {{----}}
            {{--//                </script>--}}
                            <!-- / End Google Analytics Codes -->
                            <!-- / Begin Alexa -->
            {{--//                <div style="display:none"><a href="http://www.alexa.com/data/details/main?url=http://vietitc.net"--}}
            {{--//                                             class="AlexaSiteStatsWidget"><img--}}
            {{--//                                src="http://xsltcache.alexa.com/site_stats/gif/t/b/dmlldGl0Yy5uZXQ=/s.gif" border="0"--}}
            {{--//                                alt="Alexa Certified Site Stats for vietitc.net"--}}
            {{--//                                title="Alexa Certified Site Stats for vietitc.net"></a>--}}
            {{--//                    <script type="text/javascript" language="JavaScript"--}}
            {{--src="http://xslt.alexa.com/site_stats/js/t/b?url=vietitc.net"></script>--}}
            {{--//                </div>--}}
            <!-- /Begin Alexa -->


            {{--<select name="langid" onchange="switch_id(this, 'lang')">--}}
            {{--<optgroup label="Chọn nhanh Ngôn Ngữ">--}}
            {{--<option value="1" class="">-- English (US)</option>--}}
            {{--<option value="2" class="" selected="selected">-- tv</option>--}}
            {{--</optgroup>--}}
            {{--</select>--}}

            {{--//            </form>--}}

            {{--<ul id="footer_links" class="footer_links">--}}
                {{--<li><a href="sendmessage.php" rel="nofollow" accesskey="9">Liên lạc với chúng tôi</a></li>--}}


                {{--<li><a href="archive/index.php">Lưu trữ</a></li>--}}


                {{--<li><a href="member.php?104-bqngoc#top" onclick="document.location.hash='top'; return false;">Lên--}}
                        {{--trên</a></li>--}}
            {{--</ul>--}}


            {{--<script type="text/javascript">--}}
                <!--
                // Main vBulletin Javascript Initialization
                //                vBulletin_init();
                //-->
{{--//            </script>--}}

        </div>
    {{--</div>--}}
    <script type="text/javascript">

        <!--
        var isIE7 = navigator.userAgent.toLowerCase().indexOf('msie 7') != -1;
        var isIE = navigator.userAgent.toLowerCase().indexOf('msie') != -1;
        var isIE6 = navigator.userAgent.toLowerCase().indexOf('msie 6') != -1;
        var THISUSERID = 104;


        vB_XHTML_Ready.subscribe(init_PostBits_Lite);

        function init_PostBits_Lite()
        {
            var postbits = YAHOO.util.Dom.getElementsByClassName("postbit_lite", "li", "postlist");
            for (var i = 0; i < postbits.length; i++)
            {
                new PostBit_Lite(postbits[i]);
            }
        }

        function PostBit_Lite(postbit)
        {
            this.postbit = YAHOO.util.Dom.get(postbit);
            this.postid = postbit.id.substr("piccom_".length);
            this.inlinemod = new InlineModControl(this.postbit, this.postid, "imodsel");
        }

        function getParentElement(starterElement, classPattern, testTagName) {
            var currElement = starterElement;
            var foundElement = null;
            while(!foundElement && (currElement = currElement.parentNode)) {
                if ((classPattern && (currElement.className.indexOf(classPattern) != -1)) || (testTagName && (testTagName.toLowerCase() == currElement.tagName.toLowerCase())))
                {
                    foundElement = currElement;
                }
            }
            //go up the parentNode tree until found element with matching className
            return foundElement;
        }

        //getParentElement
        function tabViewPicker(anchorObject) {
            var clickedTabId = null;
            var tabtree = getParentElement(anchorObject,"tabslight");
            var anchorInventory = tabtree.getElementsByTagName("a");
console.log(tabtree);
            var tabIds = [];
            for (var i=0; (currAnchor = anchorInventory[i]); i++) {
                var anchorId = currAnchor.href.substring(currAnchor.href.indexOf("#") + 1, currAnchor.href.length);
                var parentDd = getParentElement(currAnchor,null,"dd");
                if (currAnchor == anchorObject) {
                    clickedTabId = anchorId;
                    parentDd.className = "userprof_module";
                }
                else {
                    parentDd.className = "userprof_moduleinactive";
                }
                tabIds.push(anchorId);
            }

            //loop thru anchors to gather all tab IDs and set appropriate selected status
            for (var j=0; (currTabId = tabIds[j]); j++) {
                var elem = document.getElementById("view-" + currTabId);
                if (!elem) {continue;}
                if (currTabId == clickedTabId) {
                    //elem.className="selected_view_section";
                    YAHOO.util.Dom.replaceClass(elem, "view_section", "selected_view_section");
                }
                else
                {
                    //elem.className="view_section";
                    YAHOO.util.Dom.replaceClass(elem, "selected_view_section", "view_section");
                }
            }

            //set appropriate status on all tabs.
            return false;
        }
        //-->
    </script>

@stop