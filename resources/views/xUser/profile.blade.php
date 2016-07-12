<div class="dropzone-container" style="margin: 30px 0 0 30px;">
    <div id="dropzone">
        <div class="fixed-img">
            @if($user->image!="")
                <img  src=<?php echo "/img/thumbnail/thumb_" . $user->image;?> >
            @else
                <div class="dropzone-text-place">
                    <span class="dropzone-text">Upload photos</span>
                </div>
            @endif
        </div>
        <input id="fileInput" type="file" accept="image/png,image/jpeg" name="image"/>
    </div>
    <i> Click to edit</i>
</div>

