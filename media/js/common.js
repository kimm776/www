$(document).ready(function(){

    //nav

    var screenHeight = $(window).height();
    
    $(".menu_ham").toggle(function() {
        $("#gnb").slideDown('100');
        $('.menu_ham').addClass('mn_open');

        }, function() {
        $("#gnb").slideUp('fast');
        $('.menu_ham').removeClass('mn_open');
    });
      
     
    var current=0; 
    $(window).resize(function(){ 
        var screenSize = $(window).width();  

        if(screenSize > 1024){  
            $("#gnb").show();
            $('.menu_ham').removeClass('mn_open');
            
        }
        if(current==1 && screenSize <= 1024){ 
            $("#gnb").hide();  
        }
    }); 


    // top_btn
    $('.top_btn').click(function(e){
        e.preventDefault();
        $("html,body").stop().animate({"scrollTop":0},1500); 
    });

});