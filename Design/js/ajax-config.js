$(document).ready(function(){

    var loadModal = function(title, href) {
        console.log(href);
        $.ajax({
            type: 'GET',
            url: href,
            success: function(data) {
                $('#globalModal').modal('show');
                $('#myModalLabel').html(title);
                $('.modal-body').html(data);
            }
        });
    };

    $('.create').click(function(event) {
        event.preventDefault();
        loadModal('Créer un nouvel élément', $(this).attr('href'));
    });

    $('.update').click(function(event) {
        event.preventDefault();
        loadModal('Modifier l\'élement', $(this).attr('href'));
    })

    $('.load').click(function(event) {
        event.preventDefault();
        loadModal($(this).attr('data-title'), $(this).attr('href'))
    });
});