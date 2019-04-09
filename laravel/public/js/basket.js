

$(function(){

    $(".calAmount").on("keyup", function(){
        
        var id = $(this).data("id");
        var qty = $("#qty_"+id).val();
        var price = $("#price_"+id).val();
        var amount = qty*price;
        
        $("#amount_"+id).val(amount);
        $("#amt_show_"+id).html(amount);

        calToTotal();
        
    });

    $(".chkQty").on("blur", function(){
        
        var id = $(this).data("id");
        var qty = $("#qty_"+id).val();

        $.ajax({
            type: 'get',                    
            url: "/product/chkBasketQty/"+id+"/"+qty,               
            cache: false,
            error: function(e)
            {
               alert(e.message);
            },                     
            success: function(data)
	        {   
                if(data == 1){

                alert("該品項目前庫存數不足!");
                
                $("#qty_"+id).val(0);
                var qty = $("#qty_"+id).val();
                var price = $("#price_"+id).val();
                var amount = qty*price;
        
                $("#amount_"+id).val(amount);
                $("#amt_show_"+id).html(amount);

                calToTotal();

                } 

                
		       
	        }         
        });

       
        




    });





    $("#same_buyer").on("click", function(){


        var name = $("#name").val();
        var mobile = $("#mobile").val();
        var city = $("#city").val();
        var town = $("#town").val();
        var zipcode = $("#zipcode").val();
        var address = $("#address").val();
        
        if($("#same_buyer").prop("checked")){
            $("#ship_to").val(name);
            $("#ship_tel").val(mobile);
            $("#ship_city").val(city);
            $("#ship_town").val(town);
            $("#ship_zipcode").val(zipcode);
            $("#ship_address").val(address);
        } else {
            $("#ship_to").val("");
            $("#ship_tel").val("");
            $("#ship_city").val("");
            $("#ship_town").val("");
            $("#ship_zipcode").val("");
            $("#ship_address").val("");
        }

       

        

        
        
    });



  

});

function calToTotal(){

    var total = parseFloat(0);
    var amount_tol = parseFloat(0);
    var shipping = chkNaN(parseFloat($("#shipping").val()));

    $(".calToTotal").each(function(){


        

        var amount = parseFloat($(this).val());

        

        total += amount;
        amount_tol += amount;


    });

    total += shipping;

    console.log(total);

    $("#total").val(total);
    $("#amount").val(amount_tol);
    $("#total_show").html(total);
    $("#amt_show").html(amount_tol);

}


function chkNaN(amount){

    if(isNaN(amount)){
        return 0;
    } else {
        return amount;
    }
}
