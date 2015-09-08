$(document).on("click",".manage-formations",function( event ){
		
		event.preventDefault();
		
		var id_formation = $(this).attr('formation');
		
		$.ajax({
			url: "index.php?c=Ajax&a=refpedago&id="+id_formation
		})
		
		.done(function(data) {
			$(".refpedago-list-"+id_formation).html(data);
		});
		
	});
	
$(document).on("click",".deleteref",function( event ){
		
		event.preventDefault();
		
		var id_refpedago = $(this).attr('refpedago');
		
		$.ajax({
			url: "index.php?c=Ajax&a=removeRefpedago&id="+id_refpedago
		})
		
		.done(function(data) {
			$(".refpedago-"+id_refpedago).remove();
		});
		
	});