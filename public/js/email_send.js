$(document).ready(function ($) {

    var url = '';
    $(document).on("click", '.status .btn-send-email:not(.disabled)', function(){
        //console.log(1);
    //$('.status').on('click', '.btn-send-email:not(.disabled)', function () {

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
});

