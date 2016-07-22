$(document).ready(function () {

    var url = '';

    //display modal form for editing
    $('#pos-list').on('click', '.open-modal', function () {
        var position_id = $(this).val();
        var my_url = url + 'positions/' + position_id + '/edit';

        $.get(my_url, function (data) {
            //success data
            $('#position_id').val(data.id);
            $('#position_name').val(data.name);
            $('#position_active').val(data.active);
            $('#btn-save').val("update");
            $('#error-frmPositions').html('');

            $('#myModal').modal('show');
        });
    });

    //display modal form for creating new position
    $('#btn_pos_create').click(function () {
        $('#btn-save').val("add");
        $('#frmPositions').trigger("reset");
        $('#error-frmPositions').html('');
        $('#myModal').modal('show');
    });

    //delete task and remove it from list
    $('#pos-list').on('click', '.delete-pos',function(){
        var position_id = $(this).val();
        var my_url = url + 'positions/' + position_id;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }
        });

        $.ajax({
            type: "DELETE",
            url: my_url,
            success: function (data) {
                console.log(data);

                $("#pos" + data.id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new position / update existing position
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            name: $('#position_name').val(),
            active: $('#position_active').is(':checked')
        };

        console.log(formData);
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var position_id = $('#position_id').val();
        var my_url = url + 'positions';

        if (state == "update") {
            type = 'PUT'; //for updating existing resource
            my_url = url + 'positions/' + position_id;
        }

        jQuery.ajax({
            url: my_url,
            data: formData,
            dataType: 'json',
            type: type,
            success: function (data) {
                console.log(data);        

                var pos = '<tr id="pos' + data.id + '">';
                pos += '<td>' + data.name + '</td>';
                pos += '<td>' + data.active + '</td>';
                pos += '<td><button class="btn btn-warning btn-lg open-modal"';
                pos += 'name="btn_position" id="btn_position" value="' + data.id;
                pos += '">Edit</button> <button class="btn btn-danger btn-lg delete-pos"';
                pos += 'name="btn_delete" id="btn_delete" value="' + data.id + '">Delete</button>';
                pos += '</td></tr>';

                if (state == "add") {
                    //if user added a new record
                    $('#pos-list').append(pos);
                } else {
                    //if user updated an existing record
                    $("#pos" + position_id).replaceWith(pos);
                }

                $('#frmPositions').trigger("reset");

                $('#myModal').modal('hide');
            }
            ,
            error: function (data) {
                console.log('Error:', data);
                $('#error-frmPositions').html(data.responseText);
            }
        });
    });
});