<div class="dropzone-container">
    <div id="dropzone">
        <div class="fixed-img">
            @if($user->image != "" && file_exists(public_path($path = '/img/thumbnail/thumb_'.$user->image)))
                <img style="height: 75px; width: 75px;" src="{{ asset($path) }}">
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

