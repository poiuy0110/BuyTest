$(function(){

	$(".prod_complete").on("keyup", function(){



		filename = "/admin/getProdComplete";
		
						//alert("AAA");
		
		                show_id = $(this).attr("show_id");
						_this = $(this);
						
						$(this).autocomplete({
							minLength: 1,
							source: function( request, response ) {
								$.getJSON( filename, request, function( data, status, xhr ) {
				
									if($.type(data) ==="null") response("");
									 
									 response($.map( data, function( item ) {
									 	
										 	return {
					                                label: item.id +" "+(item.name ? item.name : " ") ,
					                                value: item.id,
					                                text: item.name
					                            }   
					                            
										}) //$.map End
										
									)//response End
									
							}); //$.getJSON End
							
						} ,//source End
						select: function( event, ui ) {
							if (typeof(show_id) !== "undefined") {
								$("#" + show_id).html(ui.item.text);
							} else {
								$(this).siblings('.auto_msg').remove('.auto_msg');
								(ui.item.text ? $("<span class='auto_msg'>"+ui.item.text+"</span>").insertAfter($(this)) : "");
							}
							
					      }
					});


	});




});
	
	
	
	
	
	