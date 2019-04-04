

$(function(){

    $(".hoverMenu").hover(function(){
				
        $(".hoverHide").hide();
        
        var id = $(this).data("id");
        
        $("#hover_ul"+id).show();
        
    }, function(){
        
        $(".hoverHide").hide();
        
    });



    $("#owl_test").owlCarousel({
        items: 1,
        rtl: false,
        loop: true,
        nav: false,
        dots: true,

        autoplayTimeout: 9000,
        autoplay: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive: { 0 : {items: 1}, 480 : {items: 1}, 768 : {items: 1}, 980 : {items: 1}, 1200 : {items: 1} }             
    });


});

