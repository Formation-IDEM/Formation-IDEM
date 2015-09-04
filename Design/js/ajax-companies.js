$(document).ready(function() {
    $('#ajax-companies').on('change', function(event) {
        event.preventDefault();
        $.ajax({
            type: 'GET',
            cache: true,
            url: 'index.php?url=ajax/stages/' + $(this).val(),
            success: function(data) {
                $('.row').html(data);
            }
        });
    });
});