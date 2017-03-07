$(function(){

	// Toggle the delete buttons
	$(".toggleBtn").click(function(e){
		var remove = $(this).parent().filter(".option"),
			show = remove.hide().siblings().show();
			
		e.preventDefault();
	});
	// Delete
	$(".deleteComfirmed").click(function(e){
		// Get ID of the link to delete
		var linkId = $(this).attr("id").replace("deleteComfirmed", "");
		var parent = $(this).parents(".link");
		
		$.ajax({
			type: "POST",
			url: "includes/tihid_delete.php",
			data: { linkId : linkId },
			success: function(response){
				parent.effect("highlight",{color:"#fb6c6c"},500).fadeOut(200,function(){
					parent.remove();
				});	
			}
		});
		
		e.preventDefault();
	});
	
});