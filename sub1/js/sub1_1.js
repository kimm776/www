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


// 탭

$(document).ready(function(){
    var cnt=3;
    $(".contlist").hide();
    $('.contlist:eq(0)').show();
    $('.tab1').css('background','#eee').css('color','#333').css('font-weight','bold'); 
    
    $('.tab').click(function(e){ 

        e.preventDefault();

        var ind=$(this).index('.tab');

        $(".contlist").hide();
        $(".contlist:eq("+ind+")").fadeIn('slow'); 

        $('.tab').css('color','#999').css('font-weight',400).css('background','none');
        $(this).css('background','#eee').css('color','#333').css('font-weight','bold'); 
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
        
        if(scroll>=0 && scroll<1700){ 
            $('.subNav li:eq(0)').find('a').addClass('spy'); 

        }else if(scroll>=1700 && scroll<5000){
            $('.subNav li:eq(1)').find('a').addClass('spy');
        }
         
        
    });
});