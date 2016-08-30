@if( isset($modal))
    <div class="col-md-12 header-createcv">
        <blockquote>
        <p>Bạn đã tạo thành công CV đính kèm file. </p>
        <p>Bạn có muốn gây ấn tượng tốt với nhà tuyển dụng, vui lòng upload CV bên dưới đây.</p>
        </blockquote>
    </div>
@endif
<fieldset id="field-box">
<label slide-header=true class="fix-lb slide-header box_white block_ntv_dangnhap">
    I. File CV
</label>
<ul slide-toggle=true>
    <li>
        <div class="hasfile">
            @if ($CV->attach)
                Hiên tại bạn đã có CV trên hệ thống <a href="/" title="Ominext JSC" target="_blank">Ominext JSC</a>:
                <a href="{{'/files/' . $CV->attach}}" target="_blank" download="{{$CV->attach}}" title="File CV: {{$CV->attach}}">{{$CV->attach}}</a>

                <iframe src="{{'/files/' . $CV->attach}}" class="col-lg-12 mt8" style="margin-bottom: 30px; height:500px;" frameborder="0"></iframe>
                @else
                Hiên tại bạn chưa có CV trên hệ thống <a href="/" title="Ominext JSC">Ominext JSC</a>:
            @endif
        </div>
        <div>
            <div class="input fix-file">
                <input id="{{$CV->hash}}" name="attach" type="file" accept=".pdf"/>
                <div class="success-status float_left" id="s_attach_{{$CV->hash}}" style="display:none;">
                    <i class="fa fa-pencil-square-o"></i>
                </div>
                <div class="clear-fix"></div>
                <div class="error-box error-text float_left">
                    <span id="attach-error"></span>
                </div>
            </div>
        </div>
    </li>
</ul>
</fieldset>

@if( isset($modal))
    <div class="box_white block_ntv_dangnhap">
        @include('includes.CVActionSort', ['items'=>$CV])
    </div>
@endif