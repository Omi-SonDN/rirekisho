$(document).ready(function () {

    var url = '';
    $('body').on('click', '.btn-send-email:not(.disabled)', function () {
        //$('.btn-send-email').click(function(){
        var id = $(this).parent('.status').find('form.status').children('#id').val();
        var type = $(this).val();
        var email = $(this).prev('#email').val();

        data = {
            type: type,
            email: email,
            id: id
        };

        $.ajax({
            type: 'POST',
            url: url + '/emails/createFormEmail',
            data: data,
            success: function (data) {
                $('#modal-content').html(data);
                $('#myModal').modal('show');
            }
        });
    });
    $('#myModal').on('show.bs.modal',function(e){
        $('#myModal form').submit(function(e){
            var form = new FormData($('#myModal form')[0]);
            var sent = $.ajax({
                type: 'POST',
                url: $('#myModal form')[0].action,
                data: form,
                contentType: false,
                processData: false,
                success: function(){
                    alert('Email has been sent.');
                    $('#myModal').modal('hide');
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    if(jqXHR.status == 422 ){
                        $('#myModal div.danger').html('');
                        var text = '<ul class="alert alert-danger">';
                        $.each(jqXHR.responseJSON, function (key, value) {
                            text += '<li>'+value+'</li>';
                        });
                        text += '</ul>';
                        $('#myModal div.danger').append(text);
                    }
                }
            });
            return false;
        });
    });
});

