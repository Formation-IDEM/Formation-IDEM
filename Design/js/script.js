/*
 * AJAX------------------------------------------------------------
 */


 $( document ).ready( function()
{
	$(".list-trainer").on('change', function()
	{
		var user_id = $(this).val();
		$.ajax({
			url: 'index.php?c=Ajax&a=filterTrainer&id='+ user_id
		})
		.done(function(data){
			console.log(data);
			$('#ajax-result-list').html(data);
		});

	});

	$("#search-trainer").autocomplete(
	{
		minChars: 1,
		source: function(term, response)
		{
			console.log(term.term);
			$.getJSON('index.php?c=Ajax&a=autoComplete', 
				{q: term.term},
				function(data)
				{
					response(data);
				}
			);
		}
	});

	// $("#form-timesheet").submit( function(event)
	// {
	// 	event.preventDefault();
		
	// });

} );


/*
 * Permet d'afficher les ref pedago lié a une formation
 */ 
$(".list-formation").on('click','.listRefpedago',function(event){

	event.preventDefault();
	
	var id_formation = $(this).attr('formation');
	
	$.ajax({
		
		url: 'index.php?c=Ajax&a=listRefpedago&id='+id_formation
		
	}).done(function (data){

		$('.ajax-listRefpedago-'+id_formation).html(data);
			
	});
	
});

/*
 * Permet d'afficher une sélection rapide de matière pour les ajoutés
 */
$(document).on('click','.select-matter',function(event){

	event.preventDefault();
	
	var id_formation = $(this).attr('formation');
	
	$.ajax({
		
		url: 'index.php?c=Ajax&a=listMatter&id='+id_formation
		
	}).done(function (data){

		$('.selected-matter-'+id_formation).html(data);
		$('.select-matter').remove();
			
	});
	
});

/*
 * Permet d'ajouter une reference pedagogique via la selection des matière de la formation
 */
$(document).on('submit','.post-add-matter',function(event){

	event.preventDefault();
	
	var matterSend = $('select').val();	
	
	$.ajax({
		
		url: 'index.php?c=Ajax&a=addRefPedago',
		data: $(this).serialize(),
		type: 'POST'
		
	}).done(function (data){		
		
			$('.option-'+matterSend).remove();
			$('.list-matter').append(data);
			
	});

});

/*
 * Permet de supprimer une reference pedagogique via la selection des matière de la formation
 */
$(document).on('click','.deleteRefPedago',function(event){

	event.preventDefault();
	
	var id_refpedago = $(this).attr('refpedago');
	var id_formation = $(this).attr('formation');
	
	$.ajax({
		
		url: 'index.php?c=Ajax&a=deleteRefPedago&id='+id_refpedago
		
	}).done(function (data){
		
		$('.refPedago-'+id_refpedago).remove();
		$('.select-'+id_formation).append(data);	
			
	});
	
});