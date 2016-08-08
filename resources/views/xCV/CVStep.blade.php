@extends('xCV.template')
<title>{{isset($isUpload) ? 'Tạo CV có file đính kèm' : 'Tạo CV từng bước'}}{{isset($isUploadedit) ? 'Sửa CV có file đính kèm' : 'Sửa CV từng bước'}}</title>
@section('content')
    <div class="box_white block_ntv_dangnhap">
        @include('includes.flash-alert')
        @if (count($CV))
            @include('includes.CVRuleInfo')
            @if($CV->type_cv)
                @include('includes.CVUploadStep')
            @else
                @include('includes.CVFormStep')
            @endif
            <div class="clearfix"></div>
            @include('includes.CVActionMan', ['items'=>$CV])
        @else
            @include('includes.CVRuleInfo')
       @endif
    </div>

@stop