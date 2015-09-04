//Parti Ajax-----------------------------------------


//Permet d'afficher les matières lié a une formation///////////////////////
$(".list-formation").on('click','.listRefpedago',function(event){

	event.preventDefault();
	
	var id_formation = $(this).attr('formation');
	
	$.ajax({
		
		url: 'index.php?c=Ajax&a=listRefpedago&id='+id_formation
		
	}).done(function (data){

		$('.ajax-listRefpedago-'+id_formation).html(data);
			
	});
	
});
////////////////////////////////////////////////////////////////////////////

//Permet d'afficher une sélection rapide de matière pour les ajoutés////////
$(document).on('click','.select-matter',function(event){

	event.preventDefault();
	
	$.ajax({
		
		url: 'index.php?c=Ajax&a=listMatter'
		
	}).done(function (data){

		$('.selected-matter').html(data);
			
	});
	
});
/////////////////////////////////////////////////////////////////////////////

//Permet d'ajouter une reference pedagogique via la selection des matière de la formation
$(document).on('submit','.post-add-matter',function(event){

	event.preventDefault();
	
	$.ajax({
		
		url: 'index.php?c=Ajax&a=addRefPedago',
		data: $(this).serialize()
		
	}).done(function (data){

		
			
	});
	
});
/////////////////////////////////////////////////////////////////////////////