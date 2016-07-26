<?php
if (!empty($field)) {
    $filtered = $Records->filter(function ($item) use ($field) {
        return $item->getRole() == $field;
    });
}
?>
<tbody id="{{$key}}" data-response="1_{{$type}}_1">
@if(!$filtered->count())
    <tr class="no-record">
        <td colspan="5">
            <div style="text-align: center;">There are no records to display</div>
        </td>
    </tr>
@else
    <?php $i = 0;?>
    @foreach ($filtered as $Record)

        <?php $r_id = $Record->hash ; ?>
        <tr id="{{$r_id}}">
            <td>{{++$i}}</td>

            <td name="edit" data-table="Record">
                <span class="jShow" id="cell_{{$r_id}}">{{getyear($Record->Date)}}</span>
                <input name="Year" class="editbox" id="cell_input_{{$r_id}}"
                       value="{{getyear($Record->Date)}}">
            </td>
            <td name="edit" data-table="Record">
                <span class="jShow" id="cell_{{$r_id}}">{{getMonth($Record->Date)}}</span>
                <input name="Month" class="editbox" id="cell_input_{{$r_id}}"
                       value="{{getMonth($Record->Date)}}">
            </td>
            <td name="edit" data-table="Record">
                <span class="jShow" id="cell_{{$r_id}}">{{$Record->Content}}</span>
                <input name="Content" class="editbox" id="cell_input_{{$r_id}}"
                       value="{{$Record->Content}}">
            </td>
            <td class="last" data-table="Record">
                <input class="float_right plus-button" type="button" name="delete"
                       value="Xoá"/>

            </td>
        </tr>
    @endforeach
@endif
    </tbody>

        <?php $cv_id = $key;?>

        <tfoot>
        <tr>
            <td colspan="5" style="height:45px;">
                <div class="error-box error-text float_left">
                    <span id="1_{{$type}}_1_0"></span>
                </div>

                <input class="plus-button float_right" type="button" name="increase"
                       value="+ Thêm"/>
            </td>
        </tr>
        <tr class="first last odd" newrow="Record" id="{{$cv_id}}" data-react="1_{{$type}}_1"
            style="display:none;">
            <td></td>
            <td>
                <input name="Year" type="text" style="height: 25px;">
            </td>
            <td>
                <input name="Month" type="text" style="height: 25px;">
            </td>
            <td>
                <input type="text" style="height: 25px;" name="Content">
            </td>
            <td class="last">
                <input class="float_right plus-button" type="button" name="save" value="Lưu"/>
            </td>
        </tr>

        </tfoot>