<tbody id="{{$key}}" data-response="2_{{$type}}_1">
<?php
/** @var string $field */
if (!empty($field)) {
    $Lang = $skills->filter(function ($item) use ($field) {
        return $item->getRole() == $field;
    });
}
?>
@if(!$Lang->count())
    <tr class="no-record">
        <td colspan="5">
            <div style="text-align: center;">There are no records to display</div>
        </td>
    </tr>
@else
    <?php $i = 0;?>
    @foreach ($Lang as $Record)
        <?php $r_id = $Record->hash; ?>
        <tr id="{{$r_id}}">
            <td>{{++$i}}</td>
            <td name="edit" data-table="Skill">
                <span class="jShow" id="cell_{{$r_id}}">{{$Record->name}}</span>
                <input class="editbox" id="cell_input_{{$r_id}}"
                       name="name" value="{{$Record->name}}">
            </td>
            <td name="edit" data-table="Skill">
                <span class="jShow" id="cell_{{$r_id}}" style="font-style: italic">
                    {{$Record->study_time}}  </span>
                <input class="editbox" id="cell_input_{{$r_id}}"
                       name="study_time"
                       value=" {{$Record->study_time}}">
                tháng
            </td>
            <td name="edit" data-table="Skill">
                <span class="jShow" id="cell_{{$r_id}}" style="font-style: italic">
                    {{$Record->work_time}}  </span>
                <input class="editbox" id="cell_input_{{$r_id}}"
                       style="display:none;height: 25px;" name="work_time"
                       value="{{$Record->work_time}}">
                tháng
            </td>
            <td class="last" data-table="Skill">
                <input class="float_right plus-button" type="button" name="delete"
                       value="Xoá"/>

            </td>
        </tr>
    @endforeach
@endif
    </tbody>
        <?php $cv_id = $key; // cv id
        ?>
        <tfoot>
        <tr>
            <td colspan="5" style="height:45px;">
                <div class="error-box error-text float_left">
                    <span id="2_{{$type}}_1_0"></span>
                </div>

                <input class="plus-button float_right" type="button" name="increase"
                       value="+ Thêm"/>
            </td>
        </tr>
        <tr class="first last odd" id="{{$cv_id}}" newrow="Skill" data-react="2_{{$type}}_1 "
            style="display:none;">
            <td></td>
            <td>
                <input name="name" type="text" style="height: 25px;">
            </td>
            <td>
                <input name="study_time" type="text" style="height: 25px;"> <i>tháng</i>
            </td>
            <td>
                <input name="work_time" type="text" style="height: 25px;"> <i>tháng</i>
            </td>
            <td class="last">
                <input class="float_right plus-button" type="button" name="save" value="Lưu"/>
            </td>
        </tr>
        </tfoot>