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
    });

    $('input[name="country"]').autoComplete({
        minChars: 1,
        source: function(term, response){
            $.getJSON('index.php?url=ajax/nationalities', { country: term }, function(data) {
                response(data);
            });
        }
    });

    $(document).on('click', '#add-level', function(){
        $('#add-level-form').toggle();
    });

    $(document).on('click', '.edit-level', function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            //url: "index.php?c=ajax&a=editLevelForm",
            url: 'index.php?url=ajax/editLevelForm',
            data: { id: $(this).attr('data-id') }
        }).done(function( html ) {
            $('#form-ajax').html(html);
        });
    });

    $(document).on('submit', '#edit-level-form', function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            //url: "index.php?c=ajax&a=editLevel",
            url: 'index.php?url=ajax/editLevel',
            data: $(this).serialize()
        }).done(function( html ) {
            $('#results-ajax').html(html);
            $('#form-ajax').empty();
        });
    });
});