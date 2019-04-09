

$(function(){

    $("#updateShipNo").on("click",function(){

        var csrf = $('meta[name="csrf-token"]').attr('content');
				
       var id = $("#id").val();
       var ship_no = $("#ship_no").val();

       $.ajax({
        type: 'POST',                    
        url: "/admin/orders/updateShipNo",               
        cache: false,
        data : {
            'id' : id,
            'ship_no' : ship_no,
            '_token': csrf
        },
        error: function(e)
        {
           alert(e.message);
        },                     
        success: function(data)
        {  
        }         
    });


        
    });



   



});

