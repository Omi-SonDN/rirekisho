<li>
        <table class="table table-striped table-bordered editable-table table-reload" id="1_1"
               style="width: 90%;">
            <thead>
            <tr class="">
                <th colspan="5">Lịch sử công việc</th>
            </tr>
            <tr class="">
                <th style="width:7%;"> #</th>
                <th style="width:13%;">Năm</th>
                <th style="width:13%;">Tháng</th>
                <th>Tên nơi làm việc</th>
                <th style="width:7%;">&nbsp;</th>
            </tr>
            </thead>
                @include('includes.record-edit', array('field' => 'Work','type' => 1 ))
        </table>

</li>
<li>
    <div>
        <table class="table table-striped table-bordered editable-table table-reload" id="1_2"
               style="width: 90%;">
            <thead>
            <tr class="">
                <th colspan="5">Thông tin bằng cấp</th>
            </tr>
            <tr class="">
                <th style="width:7%;"> #</th>
                <th style="width:13%;">Năm</th>
                <th style="width:13%;">Tháng</th>
                <th> Tên bằng cấp</th>
                <th style="width:7%;">&nbsp;</th>
            </tr>
            </thead>
            @include('includes.record-edit', array('field' => 'Cert','type' => 2 ))
        </table>

    </div><!-- End table reload-->

</li>
<li class="">
    <div class=" float_left" style="width: 100%;">
        <label class="label" for="positions">Vị trí ứng tuyển</label>
        <div class="input">
            <label class="icon-left" for="positions">
                <i class="fa fa-mail-forward "></i>
            </label>
            <!--change editable="Rirekisho" name=field_name  -->
            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="positions"
                   type="text" class="input-left float_left" placeholder="Vị trí ứng tuyển"
                   value="{{ $CV->positions }}">
            <!-- s_field_name_$key-->
            <div class="success-status float_left" id="s_positions_{{$key}}" style="display:none;">
                <i class="fa fa-pencil-square-o"></i>
            </div>
        </div>
    </div>
</li>
<li class="">
    <div class=" float_left" style="width: 100%;">
        <label class="label" for="Request">Lời nhắn đến nhà tuyển dụng</label>
        <div class="input">
            <label class="icon-left" for="Request">
                <i class="fa fa-mail-forward "></i>
            </label>
            <!-- editable="Rirekisho" name=field_name  -->
            <input id="{{$key}}" editable="Rirekisho" style="width: 90%;" name="Request"
                   type="text" class="input-left float_left" placeholder="Lời nhắn đến nhà tuyển dụng"
                   value=" {{ $CV->Request }}">
            <!-- s_field_name_$key-->
            <div class="success-status float_left" id="s_Request_{{$key}}" style="display:none;">
                <i class="fa fa-pencil-square-o"></i>
            </div>
        </div>
    </div>

</li>