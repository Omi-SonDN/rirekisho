$(document).ready(function () {
    
    var url = '';
    $('.status').on('click', '.btn-send-email:not(.disabled)',function(){
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

