<div class="dropzone-container">
    <div id="dropzone">
        <div class="fixed-img">
            @if($user->image!="")
                <img src=<?php echo "/img/thumbnail/thumb_" . $user->image;?> >
            @else
                <div class="dropzone-text-place">
                    <span class="dropzone-text">Tải hình ảnh</span>
                </div>
            @endif
        </div>
        <input id="fileInput" type="file" accept="image/png,image/jpeg" name="txtImage"/>
    </div>
    <i> Click để tải hình ảnh</i>
    @if ($errors->has('txtImage'))
        <span class="help-block">
                            {{ $errors->first('txtImage') }}
                        </span>
    @endif
</div>

