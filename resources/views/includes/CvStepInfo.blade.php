<?php $id = 0; ?>
@foreach($CV as $items)
    <div class="box_white">
        <div class="mt23">
            <div class="title_lange text_title_white_lange text_white bg_blue">
                <p class="font18 text_white mt20 " id="cv_1"><i class=""></i>Hồ sơ {{++$id .':' . $items->name_cv}}</p>
            </div>

            <div class="block_ntv_dangnhap tab_right mt8">
                <div class="tab col-xs-12">
                    <div id="ho_so1" class="tab-content_cv">
                        <div class="pl_4 pt_18 row">
                            <p class="line-icon mb_4 "><span class="bold">Mã hồ sơ:</span> <span class="bold text-tim-nhat"> {{$items->Hash}}  </span></p>
                        </div>
                        <div class="col-xs-6 pl_4">
                            <p class="line-icon mb_4"><span class="bold">Loại Hồ sơ:</span> <span class="job_value">{{$items->cvType}}</span></p>
                            <p class="line-icon mb_4"><span class="bold">Ngày tạo:</span> <span class="job_value">{{date("d-m-Y", strtotime($items->created_at))}}</span></p>
                        </div>
                        <div class="col-xs-6">
                            <p class="line-icon mb_4 ml-6">
                                <span class="bold">Tình trạng:</span>
                                <span class="text_red_box">{{$items->Checkcv}}</span>
                            </p>
                            <p class="line-icon mb_4 ml-6">
                                <span class="bold">Lượt xem:</span> <span class="job_value">196</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>

                        @include('includes.CVActionMan')

                        <div class="mt_18"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<br>
