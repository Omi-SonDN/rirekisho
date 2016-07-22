$(document).ready(function () {

    var url = '';

    //display modal form for editing
    $('#groups-list').on('click', '.open-modal', function () {
        var group_id = $(this).val();
        var my_url = url + 'groups/' + group_id + '/edit';

        $.get(my_url, function (data) {
            //success data
            $('#group_id').val(data.id);
            $('#group_name').val(data.name);
            $('#btn-save').val("update");
            $('#error-frmGroups').html('');

            $('#myModal').modal('show');
        });
    });

    //display modal form for creating new group
    $('#btn_group_create').click(function () {
        $('#btn-save').val("add");
        $('#frmGroups').trigger("reset");
        $('#error-frmGroups').html('');
        $('#myModal').modal('show');
    });

    //delete group and remove it from list
    $('#groups-list').on('click', '.delete-group', function () {
        var group_id = $(this).val();
        var my_url = url + 'groups/' + group_id;

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

                $("#group" + data.id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //edit list member
    //display modal list member
    $('#groups-list').on('click', '.group_info', function () {
        var group_id = $(this).val();
        var my_url = url + 'groups/' + group_id;

        $.get(my_url, function (data) {
            //success data
            $('#members').tagit("removeAll");
            for (var i = 0; i < data.users.length; i++) {
                $("#members").tagit("createTag", data.users[i].name);
            }
            $('#group_id').val(data.id);
            $('#error-frmMembers').html('');

            $('#myModal1').modal('show');
        });
    });
    //update list member
    $('#btn-member-save').click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault();

        var my_url = url + 'groups/updateListMember';

        var formData = {
            members: $('#members').val(),
            group_id: $('#group_id').val()
        };
        console.log(formData);
        jQuery.ajax({
            url: my_url,
            data: formData,
            dataType: 'json',
            type: "POST",
            success: function (data) {
                console.log(data);

                $('#frmMembers').trigger("reset");
                $('#myModal1').modal('hide');
            },
            error: function (data) {
                console.log('Error:', data);
                $('#error-frmMembers').append(data.responseText);
            }
        });
    });

//create new group / update existing group
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            name: $('#group_name').val()
        };

        console.log(formData);
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var group_id = $('#group_id').val();
        var my_url = url + 'groups';

        if (state == "update") {
            type = 'PUT'; //for updating existing resource
            my_url = url + 'groups/' + group_id;
        }

        jQuery.ajax({
            url: my_url,
            data: formData,
            dataType: 'json',
            type: type,
            success: function (data) {
                console.log(data);

                var group = '<tr id="group' + data.id + '" tabindex="-1"><td>' + data.name;
                group += '</td><td><button class="btn btn-info btn-lg group_info" ';
                group += 'name="btn_group_info" id="btn_group_info" value="';
                group += data.id + '">Show group\'s members</button></td>';
                group += '<td><button class="btn btn-warning btn-lg open-modal"';
                group += 'name="btn_group" id="btn_group" value="' + data.id;
                group += '">Edit</button> <button ';
                group += 'class="btn btn-danger btn-lg delete-group" name="btn_delete"';
                group += 'id="btn_delete" value="' + data.id + '">Delete';
                group += '</button></td></tr>';

                if (state == "add") {
                    //if user added a new record
                    $('#groups-list').append(group);
                    $('#group' + data.id).focus();
                } else {
                    //if user updated an existing record
                    $("#group" + group_id).replaceWith(group);
                }

                $('#frmGroups').trigger("reset");

                $('#myModal').modal('hide');
            }
            ,
            error: function (data) {
                console.log('Error:', data);
                $('#error-frmGroups').html(data.responseText);
            }
        });
    });
});