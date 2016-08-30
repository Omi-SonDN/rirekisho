$(document).ready(function ($) {

    var url = '';

    //$(document).on("click", '.status .btn-send-email:not(.disabled)', function(){
        //console.log(1);
    //$('.status').on('click', '.btn-send-email:not(.disabled)', function () {

    $('body').on('click', '.btn-send-email:not(.disabled)', function () {

        //$('.btn-send-email').click(function(){
        var id = $(this).closest('div.status').find('form.status').children('#id').val();
        var type = $(this).val();
        var email = $(this).closest('div.status').find('#email').val();

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
                //select date;
                $('#myModal').find('#date').datepicker({format: 'yyyy/mm/dd',});
                $('#myModal').find('#time').wickedpicker();
                $('#myModal').modal('show');
            }
        });
    });

     $('#myModal').on('click','button[name=preview]',function(e){
        e.preventDefault();
        var form = new FormData($('#myModal form')[0]);
        form.append('_action','preview');
        $.ajax({
            type: 'POST',
            url: $('#myModal form')[0].action,
            data: form,
            contentType: false,
            processData: false,
            success: function(response){
                $('#preview-content').html(response);
                $('#emailPreview').modal('show');
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
    });
    $('#myModal').on('submit','form',function(e){
        var form = new FormData($('#myModal form')[0]);
        var sent = null;
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

