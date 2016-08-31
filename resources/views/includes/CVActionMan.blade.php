<div class="box_white mt20">
    <div class="block_ntv_dangnhap">
        <div class="demo-list mt_16 pl_4">
            @if (Auth::user()->id == $items->user_id)
            <div class="icheckbox_square-blue">
                <label class="checkbox-inline font14">
                    <input type="checkbox" name="txtLiveCv" id="live_{{$items->hash}}" onchange="getChangeLiveCv(this.id, '{{$items->hash}}')" {{($items->live == 1) ? 'checked' : ''}} class="fix-class-check ckf"> Cho phép nhà tuyển dụng tìm kiếm hồ sơ và liên hệ với bạn
                </label>
            </div>
            @endif
        </div>
        <div class="mt_16 pl_4">
            <a href="javascript:void(0);" class="btn pl_16 floatLeft" title="Cập nhật thời gian" onclick="lam_moi_ttv('{{$items->hash}}');">
                <i class="fa fa-calendar icon_24 icon-24"></i> LÀM MỚI
            </a>
            @if ($items->type_cv)
                @if ((Route::getCurrentRoute()->uri() !== 'CV/create/upload') && (Route::getCurrentRoute()->uri() !== 'CV/create/upload/{id}/edit'))
                    <a href="{{\URL('CV/upload/'. $items->hash.'/edit')}}" class="btn "><i class="fa fa-edit icon_24 icon-24"></i> CHỈNH SỬA</a>
                @endif
                <a href="{{ \URL('CV/upload/'. $items->hash) }}" class="btn "><i class="fa fa-eye icon_24 icon-24"></i> XEM</a>
            @else
                @if ((Route::current()->getName() !== 'CV.edit') && (Route::current()->getName() !== 'CV.create'))
                    <a href="{{route('CV.edit', [$items->hash])}}" class="btn " title="Sửa CV {{$items->name_cv}}"><i class="fa fa-edit icon_24 icon-24"></i> CHỈNH SỬA</a>
                @endif
                <a href="{{url('CV',[$items->hash])}}" class="btn " title="Xem CV {{$items->name_cv}}"><i class="fa fa-eye icon_24 icon-24"></i> XEM</a>
            @endif
            <a href="javascript:void(0);" class="btn btn-grey ml_8" title="Xóa CV {{$items->name_cv}}" onclick="getDeleteCV('{{$items->hash}}', {{$items->type_cv}});"><i class="fa fa-trash-o icon_24 icon-24"></i> XÓA</a>
            @if ($items->type_cv)
                @if($items->attach && file_exists(public_path($path = '/files/'.$items->attach)))
                    <a target="_blank" href="{{$path}}" class="btn appendflie"><i class="fa fa-cloud-download icon_24 icon-24"></i> TẢI VỀ</a>
                @else
                    <a class="appendflie"></a>
                @endif
            @endif
            <a href="/CV/info" class="btn btn-grey ml_8" title="Trang chủ"><i class="fa fa-undo icon_24 icon-24"></i> Cancel</a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>