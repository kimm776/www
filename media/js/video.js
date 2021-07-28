  $(document).ready(function() {
  	var screenSize = $(window).width();
		var screenHeight = $(window).height();
  	var current=false;
  	
		$("#content").css('margin-top',screenHeight);
		
  	if( screenSize > 768){
        $("#videoBG").show();
        $("#imgBG").hide();
      }
    if(screenSize <= 768){
        $("#videoBG").hide();
        $("#videoBG").attr('src','');
        $("#imgBG").show();
      }
  	
   $(window).resize(function(){   
      screenSize = $(window).width(); 
      screenHeight = $(window).height();
		  
		  $("#content").css('margin-top',screenHeight);
		 
      if( screenSize > 768 && current==false){
      	
        $("#videoBG").show();
        $("#videoBG").attr('src','images/indexvideo.mp4');
        $("#imgBG").hide();
        current=true;
      }
      if(screenSize <= 768){
        $("#videoBG").hide();
        $("#videoBG").attr('src','');
        $("#imgBG").show();
        current=false;
      }
    }); 
		

		// scroll down click
		$('.down').click(function(){
			  screenHeight = $(window).height();
			  $('html,body').animate({'scrollTop':screenHeight-119}, 1000);
		});
		

    // scroll bg
		$(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        var winSize= $(window).width(); 
        screenHeight = $(window).height();
              
        if(winSize>768){    
            if(scroll>screenHeight-150){ 
                $('#headerArea').css('background', 'rgba(0,0,0,.8)');
                
            }else{
                $('#headerArea').css('background', 'none');
            }
        }

        if(winSize<768){    
          if(scroll>screenHeight-150){ 
              $('#headerArea').css('background', 'rgba(0,0,0,.8)');
              
          }else{
              $('#headerArea').css('background', 'none');
          }
       }
   
    });

    
});