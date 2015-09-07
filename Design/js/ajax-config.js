$(document).ready(function(){

    var loadContent = function(title, href, modal) {
        $.ajax({
            type: 'GET',
            url: href,
            success: function(data) {
                if( modal ) {
                    $('#globalModal').modal('show');
                    $('#myModalLabel').html(title);
                    $('.modal-body').html(data);
                } else {
                    $('#title').html(title);
                    $('#list').html(data);
                }
            }
        });
    };

    $('#close-toggle').click(function(event) {
        event.preventDefault();
        $('#list').html('');
    });

    $('.create').click(function(event) {
        event.preventDefault();
        loadContent('Créer un nouvel élément', $(this).attr('href'), true);
    });

    $('.update').click(function(event) {
        event.preventDefault();
        loadContent('Modifier l\'élement', $(this).attr('href'), true);
    })

    $('.load').click(function(event) {
        event.preventDefault();
        loadContent($(this).attr('data-title'), $(this).attr('href'), true)
    });

    $('.list').click(function(event) {
        event.preventDefault();
        loadContent($(this).attr('data-title'), $(this).attr('href'));
    })
});