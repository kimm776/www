//슬라이드

$(document).ready(function () {
            
    $('.slideMenu a').click(function(e){ 
          e.preventDefault();

          var value=0;

          if($(this).hasClass('link1')){
             value= $('.slide_con:eq(0)').offset().top-250; 
          }else if($(this).hasClass('link2')){ 
             value= $('.slide_con:eq(1)').offset().top-250; 
          }
          
          $("html,body").stop().animate({"scrollTop":value},1000);
    });
});


//sticky menu
$(document).ready(function () {
        
   $('.slideMenu li:eq(0)').find('a').addClass('spy'); 

   var smh= $('.main').height(); 

   $(window).on('scroll',function(){ 

       var scroll = $(window).scrollTop(); 
       $('.text').text(scroll); 
       
       if(scroll>710){ 
           $('.navBox').addClass('navOn'); 
           $('header').hide();  
       }else{ 
           $('.navBox').removeClass('navOn'); 
           $('header').show();
       }
       
       $('.subNav li').find('a').removeClass('spy'); 
       
       if(scroll>=0 && scroll<1400){ 
           $('.subNav li:eq(0)').find('a').addClass('spy'); 

       }else if(scroll>=1400 && scroll<3000){
           $('.subNav li:eq(1)').find('a').addClass('spy');
       }
        
       
   });
});