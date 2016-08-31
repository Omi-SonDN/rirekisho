@extends('xCV.template')
@section('title')Quản lý hồ sơ @endsection

@section('content')

<div class="form-group col-lg-12">
    @if (count($CV))
        @if(count($CV) > 1)
            @include('includes.CVStepInfo')
        @else
            @foreach($CV as $items)
                @include('includes.CVStepInfo')
                <div class="box_white mt20">
                    <div class="block_ntv_dangnhap">
                        @if ($items->type_cv)
                            <div class="col-lg-12"><a href="{{action('CVController@create')}}">Tạo CV từng bước</a></div>
                        @else
                            <div class="col-lg-12"><a href="{{action('CVController@getCreateUpload')}}">Tạo CV đính kèm</a></div>
                        @endif
                    </div>
                </div>

            @endforeach
        @endif
    @else
        <div class="box_white">

            <div class="block_ntv_dangnhap">
                <span class="text_red_box fw-500">Bạn chưa có Hồ sơ trên Ominext JSC</span>
            </div>
            <div class="block-info">
                <p class="fw-500 mt_20">NẾU BẠN CHƯA CÓ HỒ SƠ TRÊN MÁY TÍNH:</p>
                <a href="{{route('CV.create')}}" class="btn btn-primary fix-btn-ccv">TẠO HỒ SƠ BẰNG FORM KHAI TỪNG BƯỚC</a>
                <hr>
                <p class="fw-500 mt_22">NẾU BẠN ĐÃ CÓ HỒ SƠ TRÊN MÁY TÍNH:</p>
                <a href="{{action('CVController@getCreateUpload')}}" class="btn btn-success fix-btn-ccv"><span class="fa fa-paperclip"> TẠO HỒ SƠ BẰNG CÁCH TẢI FILE ĐÍNH KÈM</a>
            </div>
            <div class="block_ntv_dangnhap hr_box mt_24">

                <p class="mt_18 fw-500">Bạn gặp khó khăn khi tạo hồ sơ? Liên hệ Hotline hỗ trợ Người tìm việc:</p>

                <p>Giờ hành chính: <span class="italic">miền Bắc</span> <span class="text_pink">(04) xxxx 2424</span>, <span class="italic">miền Nam</span> <span class="text_pink">(08) xxxx 2424</span></p>
            </div>
        </div>
    @endif
</div>
@stop