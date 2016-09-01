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
