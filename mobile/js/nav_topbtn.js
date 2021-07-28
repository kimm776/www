$(document).ready(function() {
   var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
 	
   $(".menu_ham").click(function(e) { //메뉴버튼 클릭시
    e.preventDefault();
       
       var documentHeight =  $(document).height();
       $("#gnb").css('height',documentHeight); 

      if(op==false){
        $("#gnb").animate({right:0,opacity:1}, 'fast');
        $('#headerArea').addClass('mn_open');
        op=true;
      }else{
        $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
        $('#headerArea').removeClass('mn_open');
        op=false;
      }

   });
   
   
    //2depth 메뉴 교대로 열기 처리 
    var onoff=[false,false,false,false,false];
    var arrcount=onoff.length;
    
    console.log(arrcount);
    
    $('#gnb .depth1 h3 a').click(function(){
        var ind=$(this).parents('.depth1').index();
        
        //console.log(ind);
        
       if(onoff[ind]==false){
        //$('#gnb .depth1 ul').hide();
        $(this).parents('.depth1').find('ul').slideDown('slow');
        $(this).parents('.depth1').siblings('li').find('ul').slideUp();
         for(var i=0; i<arrcount; i++) onoff[i]=false; 
         onoff[ind]=true;
           
         $('.depth1 span').html('<i class="fas fa-chevron-down"></i>');  
         $(this).find('span').html('<i class="fas fa-chevron-up"></i>'); 
            
       }else{
         $(this).parents('.depth1').find('ul').slideUp();
         onoff[ind]=false;   
           
         $(this).find('span').html('<i class="fas fa-chevron-down"></i>');     
       }
    });    

    //top_btn
    $('#footerArea .top_btn').click(function(){
        $("html,body").animate({"scrollTop": 0}, 1700)
    })

    $('.topMove').hide(); 

    $(window).on('scroll',function(){ 
          var scroll = $(window).scrollTop();  
       
          if(scroll>600){      
             $('.topMove').fadeIn('slow');  
          }else{
             $('.topMove').fadeOut('fast'); 
          }
    });
 
    $('.topMove').click(function(e){ 
          e.preventDefault();
 
       $("html,body").stop().animate({"scrollTop":0},1000); 
    }); 
  
  });


