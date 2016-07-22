$(document).ready(function () {
    var url = '';
    
    $("#members").tagit({
        singleField: true,
        allowSpaces: true,
        removeConfirmation: true,
        placeholderText: "Groups",
        
        tagSource: function (request, response) {
            $.ajax({
                url: url + "/groups/getUsername",
                data: {term: request.term},
                dataType: "json",
                type: 'POST',
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            label: item.name + ': ' + item.email,
                            value: item.name
                        };
                    }));
                    
                }
            });
        }});
    });