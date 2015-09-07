/*
 * AJAX------------------------------------------------------------
 */


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

		$('.selected-matter').html(data);
			
	});
	
});

/*
 * Permet d'ajouter une reference pedagogique via la selection des matière de la formation
 */
$(document).on('submit','.post-add-matter',function(event){

	event.preventDefault();
	
	$.ajax({
		
		url: 'index.php?c=Ajax&a=addRefPedago',
		data: $(this).serialize(),
		type: 'POST'
		
	}).done(function (data){
		
		$('.list-matter').append(data);		
			
	});
	
});

/*
 * Permet de supprimer une reference pedagogique via la selection des matière de la formation
 */
$(document).on('click','.deleteRefPedago',function(event){

	event.preventDefault();
	
	var id_refpedago = $(this).attr('refpedago');
	
	$.ajax({
		
		url: 'index.php?c=Ajax&a=deleteRefPedago&id='+id_refpedago
		
	}).done(function (data){

		//Une fois la réference pedagogique supprimer, on supprime la ligne qui l'afficher avant
		$('.refPedago-'+id_refpedago).remove();
			
	});
	
});