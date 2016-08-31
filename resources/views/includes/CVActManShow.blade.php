@can('Visitor')
<div class="clear-fix"></div>
<table class="imagetable">
    <th><span>@can('Admin')Duyệt CV -@endcan Ghi chú</span> <span class="fa fa-remove pull-right rm-text"
                                                                  onclick="clearContents('txt_{{$CV->hash}}')"
                                                                  title="Xóa hết ghi chú"></span></th>
    <tr>
        @can('Admin')
        <td>
            <div class="fix-info-cv pull-left">{{$CV->Checkcv}} &nbsp; &nbsp;</div>
            <div class="onoffswitch pull-right">
                <input type="checkbox" name="check_{{($CV->id)}}" onclick="isChanges(this.id, '{{$CV->hash}}')"
                       class="onoffswitch-checkbox"
                       id="myCheck_{{$CV->hash}}" {{($CV->Active == 1) ? 'checked' : ''}} />
                <label class="onoffswitch-label" for="myCheck_{{$CV->hash}}">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div>
        </td>
        @endcan
    </tr>
    <tr>
        <td style="width: 100%; padding: 0">
            <textarea id="txt_{{$CV->hash}}" rows="5" name="txtNotes" style="resize: vertical; width: 100%"
                      onkeyup="isChanges(this.id, '{{$CV->hash}}')">{!! old('txtNotes', isset($CV) ? $CV->notes : '') !!}</textarea>
        </td>
    </tr>
    <th><span>Người giới thiệu</span><span class="fa fa-remove pull-right rm-text"
                                           onclick="clearBoxUserCeo('searchBoxCeo_{{$CV->hash}}', 'textarea_ceo_{{$CV->hash}}')"
                                           title="Xóa người giới thiệu"></span></th>
    <tr>
        <td style="width: 100%; padding: 0">
            <div class="m-left-15">
                <div class="col-md-9">
                    <input type="search" name="txt_user_ceo" id="searchBoxCeo_{{$CV->hash}}" class="searchbox-user"
                           onkeyup="return searchUser(this, 'field_{{$CV->hash}}', 'btn_ceo_{{$CV->hash}}', 'searchclear')"
                           placeholder="Tìm kiếm email"/>
                    <span id="searchclear"
                          onclick="clearBoxSearch(this.id, 'searchBoxCeo_{{$CV->hash}}', 'field_{{$CV->hash}}', 'btn_ceo_{{$CV->hash}}')"
                          class="glyphicon glyphicon-remove-circle"></span>
                </div>
                <div class="pull-right">
                    <button class="btn btn-sm btn-default" {{isset($CV->user_gioi_thieu) ? 'disabled="disabled"' : ''}}
                            id="btn_ceo_{{$CV->hash}}" title="Thêm người giới thiệu"> Add
                    </button>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="search-field" id="field_{{$CV->hash}}"></div>
            <div class="clearfix"></div>
            <div class="fix-show-ceo" id="box_ceo_{{$CV->hash}}">
                @if ($CV->user_gioi_thieu)
                    <div class="textarea" id="textarea_ceo_{{$CV->hash}}" valUser="{{$CV->user_gioi_thieu}}"
                         contenteditable="false"><img src="{{$data_UserCeo->image}}"/> {{$data_UserCeo->userName}}</div>
                @endif
            </div>
        </td>
    </tr>
    <tr>
        <td style="width: 100%; padding: 0">
            <button type="button"
                    onclick="upActNotee('{{$CV->hash }}', 'myCheck_{{$CV->hash}}', 'txt_{{$CV->hash}}','textarea_ceo_{{$CV->hash}}')"
                    class="btn btn-default btn-sm btn-ac-note btn-submit-{{$CV->hash}}">submit
            </button>
            @can('Admin')
            <button type="button" onclick="getDeleteCV('{{$CV->hash }}', '{{$CV->type_cv}}')"
                    title="Xóa CV {{$CV->name_cv}}" class="btn btn-default btn-sm btn-ac-note btn-{{$CV->hash}}">Delete
            </button>
            @endcan
            <button type="button" title="Quản lý CV" onclick="redirect('{{action('CVController@index')}}')"
                    class="btn btn-default btn-sm btn-ac-note">Cancel
            </button>
            <div class="wait-modal-load"></div>
        </td>
    </tr>
</table>
@endcan
    @if (Auth::user()->id == $CV->user_id && Auth::user()->getRole() == 'Applicant')
    <button type="button" title="Quản lý CV của tui" onclick="redirect('{{route('cv.info')}}')"
            class="btn btn-default btn-sm btn-ac-note pull-right">Cancel
    </button>
    @endcan

    <script type="text/javascript">
        $(document).ready(function () {
            $('#searchclear').css('display', 'none');
            var is_userCeo = '<?php echo $CV->user_gioi_thieu; ?>';
            var idCV = '<?php echo $CV->hash; ?>';
            if (is_userCeo.length && is_userCeo != '0') {
                $('#searchBoxCeo_' + idCV).attr('disabled', true);
            } else {
                $('#searchBoxCeo_' + idCV).attr('disabled', false);
            }
            // an voi submit form
            $('.btn-submit-' + idCV).attr('disabled', true);
        });

        //tim kiem user gioi thieu trong cv
        function searchUser(obj, idField, idBtnAddCeo, idsearchclear) {
            var val = obj.value;
            var idBoxSearch = $(obj).attr('id');
            var idCeo_CV = idBtnAddCeo.substr(4, idBtnAddCeo.length);
            var token = $('meta[name="_token"]').attr('content');
            $(obj).removeAttr('style');

            $('#' + idBtnAddCeo).attr('disabled', true);

            if (val.length) {
                $('#' + idsearchclear).css('display', 'block');
            } else {
                $('#' + idsearchclear).css('display', 'none');
            }

            if (isEmail(val)) {
                obj.style.border = '1px solid green';

                var dataString = 'email=' + val + '&_token=' + token;
                $.ajax({
                    type: "GET",
                    url: '{{route('user.search.email')}}',
                    data: dataString,
                    cache: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.length) {
                            var setZise = 3;
                        } else {
                            var setZise = 2;
                        }

                        var option = '<select name="" onclick="txtBoxAddUser(this, \'' + idBoxSearch + '\', \'' + idBtnAddCeo + '\', \'' + idField + '\', \'' + idCeo_CV + '\', \'' + idsearchclear + '\')" id="myautocomplete" size="' + setZise + '">';
                        if (data.length) {
                            for (var key in data) {
                                option += '<option value="' + data[key]['userId'] + '" set="img" style="background-image:url(' + data[key]['image'] + '); background-size: 25px 30px; padding-left: 25px;"> &nbsp' + data[key]['userName'] + '</option>';
                            }
                        } else {
                            option += '<option value="0">Không tìm thấy</option>'
                        }
                        option += '</select>';

                        $('#' + idField).show().html(option);
                    }
                });
            } else {

                obj.style.border = '2px solid red';
                $('#' + idField).hide();
            }

        }
    </script>