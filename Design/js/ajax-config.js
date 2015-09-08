$(document).ready(function(){

    /**
     * Permet de charger un contenu en AJAX
     *
     * @param title
     * @param href
     * @param modal
     */
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
            url: 'index.php?url=ajax/level',
            data: { id: $(this).attr('data-id') },
            success: function(html) {
                $('#form-ajax').html(html);
            }
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

    $("#slider-range-max").slider({
        range: "max",
        min: 1,
        max: 10,
        value: $('#note').attr('note'),
        slide: function( event, ui ) {
            $( "#note" ).val( ui.value );
        }
    });
    $( "#note" ).val( $( "#slider-range-max" ).slider( "value" ) );

    $(".list-formation").on('click','.listRefpedago',function(event){
        event.preventDefault();
        var id_formation = $(this).attr('formation');
        $.ajax({
            //url: 'index.php?c=Ajax&a=listRefpedago&id='+id_formation
            url: 'index.php?url=ajax/pedago/' + id_formation
        }).done(function (data){
            $('.ajax-listRefpedago').html(data);
        });
    });

    $(document).on('click','.select-matter',function(event){
        event.preventDefault();
        var id_formation = $(this).attr('formation');
        $.ajax({
            //url: 'index.php?c=Ajax&a=listMatter&id='+id_formation
            url: 'index.php?url=ajax/matters/' + id_formation
        }).done(function (data){
            $('.select-matter').remove();
            $('.selected-matter').html(data);
        });
    });

    $(document).on('click','.deleteRefPedago',function(event){
        event.preventDefault();
        var id_refpedago = $(this).attr('refpedago');
        $.ajax({
            //url: 'index.php?c=Ajax&a=deleteRefPedago&id='+id_refpedago
            url: 'index.php?url=ajax/deleteRefPedago/' + id_refpedago
        }).done(function (){
            $('.refPedago-'+id_refpedago).remove();
        });
    });
});