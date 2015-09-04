$('#load-toggle').click(function(event) {
    event.preventDefault();
    $.ajax({
        type: 'GET',
        url: 'index.php?url=ajax/companies',
        /*
         success: function(data) {
         $('#results').html(data);
         $('#load-toggle').html('Recharger les résultats');
         }
         */

        success: function(data) {
            //$('#result').html(data);
            var output = '<ul>';
            var object = jQuery.parseJSON(data);
            console.log(object);
            $.each(object, function(key, value) {
                console.log(value);
                output += '<li>' + key + ' : ' + value.name + '</li>';
            });
            output += '</ul>';
            $('#results').html(output);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $('#results').html(textStatus)
        }

    });
    /*
     $.get('index.php?url=ajax/companies', function(data) {
     $('#result').html(data);
     })
     */
});