//슬라이드

$(document).ready(function () {

  $('.slideMenu li:eq(0)').find('a').addClass('spy'); 
  $('.slideMenu li:eq(0)').find('a').addClass('current'); 

    $('.slideMenu a').click(function(e){ 
          e.preventDefault();

          var value=0;

          if($(this).hasClass('link1')){ 
            value= $('.slide_con:eq(0)').offset().top-100;
            $('.slideMenu li:eq(0)').find('a').addClass('spy'); 
            $('.slideMenu li:eq(0)').find('a').addClass('current'); 

          }else if($(this).hasClass('link2')){ 
             value= $('.slide_con:eq(1)').offset().top-100;
             $('.slideMenu li:eq(1)').find('a').addClass('spy'); 
             $('.slideMenu li:eq(1)').find('a').addClass('current'); 

          }else if($(this).hasClass('link3')){ 
            value= $('.slide_con:eq(2)').offset().top-100;
            $('.slideMenu li:eq(2)').find('a').addClass('spy'); 
            $('.slideMenu li:eq(2)').find('a').addClass('current'); 

         }else if($(this).hasClass('link4')){ 
            value= $('.slide_con:eq(3)').offset().top-100;
            $('.slideMenu li:eq(3)').find('a').addClass('spy'); 
            $('.slideMenu li:eq(3)').find('a').addClass('current'); 

         }else if($(this).hasClass('link5')){ 
            value= $('.slide_con:eq(4)').offset().top-100;
            $('.slideMenu li:eq(4)').find('a').addClass('spy'); 
            $('.slideMenu li:eq(4)').find('a').addClass('current'); 
         }
          
          $("html,body").stop().animate({"scrollTop":value},1000);
    });
});


//sticky menu
$(document).ready(function () {
        
   $('.slideMenu li:eq(0)').find('a').addClass('spy'); 
   $('.slideMenu li:eq(0)').find('a').addClass('current'); 

   var smh= $('.main').height(); 
   var top1 = $('.navBox').offset().top-200;

   $(window).on('scroll',function(){ 

      var scroll = $(window).scrollTop(); 
       
      console.log(scroll + 'top' + top1); 
       
      if(scroll>top1){ 
           $('.navBox').addClass('navOn'); 
           $('header').hide();  
      }else{ 
           $('.navBox').removeClass('navOn'); 
           $('header').show();
      }
       
      $('.subNav li').find('a').removeClass('spy'); 
      $('.subNav li').find('a').removeClass('current'); 
       
      if(scroll>=0 && scroll<1500){ 
          $('.subNav li:eq(0)').find('a').addClass('spy');
          $('.subNav li:eq(0)').find('a').addClass('current');

      }else if(scroll>=1500 && scroll<2400){
          $('.subNav li:eq(1)').find('a').addClass('spy');
          $('.subNav li:eq(1)').find('a').addClass('current');

      }else if(scroll>=2400 && scroll<3300){
          $('.subNav li:eq(2)').find('a').addClass('spy');
          $('.subNav li:eq(2)').find('a').addClass('current');

      }else if(scroll>=3300 && scroll<4100){
          $('.subNav li:eq(3)').find('a').addClass('spy');
          $('.subNav li:eq(3)').find('a').addClass('current');

      }else if(scroll>=4100 && scroll<5100){
          $('.subNav li:eq(4)').find('a').addClass('spy');
          $('.subNav li:eq(4)').find('a').addClass('current');

      }
   });
});


// 애니메이션
$(document).ready(function() {


    $('.wp1').waypoint(function() {    
      $('.wp1').addClass('animated fadeInRight');
    }, {
      offset: '100%'        
    });
    $('.wp2').waypoint(function() {
      $('.wp2').addClass('animated fadeInRight');
    }, {
      offset: '100%'
    });        
    $('.wp3').waypoint(function() {
      $('.wp3').addClass('animated fadeInRight');
    }, {
      offset: '100%'
    });
    $('.wp4').waypoint(function() {
      $('.wp4').addClass('animated fadeInRight');
    }, {
      offset: '100%'
    });
    $('.wp5').waypoint(function() {
      $('.wp5').addClass('animated fadeInRight');
    }, {
      offset: '100%'
    });

});

