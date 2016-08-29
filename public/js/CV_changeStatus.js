$(document).ready(function () {
    var url = '';

    //$(document).on("change", 'form.status', function(){

    //
    var old_status_id = null;
    $('body').on('click','select.status',function (e) {
        if( e.clientX > 0 && e.clientY > 0){
            old_status_id = $(this).val();
        }
    });

    $('body').on('change','form.status',function (e) {
        var result = confirm("Bạn có muốn thay đổi trạng thái?");
        var stt = $(this).children('select.status').val();
        var self=$(this);
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
                        if( $.inArray(parseInt($(i).attr('value')),data.old_status) >= 0 ){
                            $(i).removeClass('hidden').css('color','#a94442');
                            return true;
                        }
                        if( $.inArray(parseInt($(i).attr('value')),data.next_status) >= 0 ){
                            $(i).removeClass('hidden').css('color','#000000');
                            return true;
                        }
                        if (data.Status == parseInt($(i).attr('value'))){
                            $(i).removeClass('hidden').css('color','#000000');
                            return true;
                        }
                        $(i).addClass('hidden').css('color','#000000');
                    });

                    var btn_send_email = '';

                    if( data.allow_sendmail == 1){
                        btn_send_email = '<button id="btn_send_email';
                        btn_send_email += '" class="btn btn-primary btn-send-email col-lg-12" value="';
                        btn_send_email += data.Status + '">Send Email ';
                        btn_send_email += '</button>';
                    }
                    self.closest('div.status').find('div.btn_send_mail').html(btn_send_email);
                }
            });
        } else {
            $(this).children('select.status').val($('#CV_status' + $(this).children('#id').val()).val());
        }
    });
});