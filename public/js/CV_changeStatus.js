$(document).ready(function () {
    var url = '';

    var the_status = [
        [1],
        [2, 12, 9],
        [3],
        [8, 25],
        [],
        [6, 7],
        [2, 21],
        [24],
        [4, 14],
        [22],
        [6, 7],
        [5, 13],
        [4],
        [10],
        [15],
        [18, 19],
        [20],
        [4],
        [17],
        [16, 26],
        [],
        [4],
        [11],
        [12, 9],
        [4],
        [24, 27, 4],
        [17],
        [31, 28, 30],
        [4],
        [27],
        [14, 4],
        [4],
    ];

    $('form.status').change(function () {
        var result = confirm("Want to change?");
        var stt = $(this).children('select.status').val();
        if (result) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            var data = {
                id: $(this).children('#id').val(),
                status: stt
            };
            $.ajax({
                type: 'POST',
                url: url + '/CV/changeStatus',
                data: data,
                dataType: 'json',
                success: function (data) {
                    $('#CV_status' + data.id).val(data.status);
                    //disable all option in select;
                    $('#status' + data.id + ' option').each(function (k, i) {
                        if (data.status == $(i).attr('value'))
                            $(i).removeClass('hidden');
                        else
                            $(i).addClass('hidden');
                        var a = the_status[data.status - 1];
                        $.each(a, function (key, value) {
                            if (value == $(i).attr('value')) {
                                $(i).removeClass('hidden');
                                return false;
                            }
                            else
                                $(i).addClass('hidden');
                        });
                    });
                    var btn_send_email = '<button id="btn_send_email' + data.id;

                    if (stt != 1 && stt != 2 && stt != 3 && stt != 9 && stt != 12 && stt != 26 && stt != 29) {
                        btn_send_email += '" class="btn btn-primary btn-send-email disabled col-lg-12" value="';
                        btn_send_email += data.status + '">Send Email ';
                        btn_send_email += data.status + '</button>';
                    }
                    else {
                        btn_send_email += '" class="btn btn-primary btn-send-email col-lg-12" value="';
                        btn_send_email += data.status + '">Send Email ';
                        btn_send_email += data.status + '</button>';
                    }

                    $('#btn_send_email' + data.id).replaceWith(btn_send_email);
                }
            });
        } else {
            $(this).children('select.status').val($('#CV_status' + $(this).children('#id').val()).val());
        }
    });
});