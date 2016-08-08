$(document).ready(function () {
    var url = '';

    //$(document).on("change", 'form.status', function(){

    $('body').on('change','form.status',function () {

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
                    //set status
                    $('#CV_status' + data.id).val(data.Status);
                    //disable all option in select;
                    $('#status' + data.id + ' option').each(function (k, i) {
                        if (data.Status == $(i).attr('value'))
                            $(i).removeClass('hidden');
                        else
                            $(i).addClass('hidden');
                        //in list next_status on data
                        $(data.next_status).each(function(x,el){
                            if( el.id == $(i).attr('value') ){
                                $(i).removeClass('hidden');
                                return false;
                            }
                            else
                                $(i).addClass('hidden');
                        });
                    });
                    var btn_send_email = '<button id="btn_send_email' + data.id;

                    if( data.allow_sendmail == 1){
                        btn_send_email += '" class="btn btn-primary btn-send-email col-lg-12" value="';
                        btn_send_email += data.Status + '">Send Email ';
                        btn_send_email += data.Status + '</button>';
                    }else {
                        btn_send_email += '" class="btn btn-primary btn-send-email disabled col-lg-12" value="';
                        btn_send_email += data.Status + '">Send Email ';
                        btn_send_email += data.Status + '</button>';
                    }
                    $('#btn_send_email' + data.id).replaceWith(btn_send_email);
                }
            });
        } else {
            $(this).children('select.status').val($('#CV_status' + $(this).children('#id').val()).val());
        }
    });
});