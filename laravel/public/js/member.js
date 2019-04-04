

$(function(){

    $("#orders-tab").on("click",function(){
        $.ajax({
            type: 'get',                    
            url: "/member/orderShow",               
            cache: false,
            error: function(e)
            {
               alert(e.message);
            },                     
            success: function(data)
	        {
		        $("#show_lists").html(data);
	        }         
        });
    });

    $("#member-tab").on("click",function(){
        $.ajax({
            type: 'get',                    
            url: "/member/memberEdit/",               
            cache: false,
            error: function(e)
            {
               alert(e.message);
            },                     
            success: function(data)
	        {
		        $("#show_lists").html(data);
	        }         
        });
    });


    $("#pass-tab").on("click",function(){
        $.ajax({
            type: 'get',                    
            url: "/member/memberChgPass",               
            cache: false,
            error: function(e)
            {
               alert(e.message);
            },                     
            success: function(data)
	        {
		        $("#show_lists").html(data);
	        }         
        });
    });

    $("#orders-tab").trigger("click");

    

});

