// JavaScript Document

$(document).ready(function() {

    var timeonoff;   
    var imageCount=3;   
    var cnt=1;   
    var onoff=true; 
    
    $('.btn1').css('background','#bbc2d5'); 
    $('.btn1').css('width','50'); 
    $('.gallery .link1').fadeIn('slow'); 
 
    function moveg(){
      cnt++;  
      for(var i=1;i<=imageCount;i++){
        $('.gallery .link'+i).hide();
      }
      $('.gallery .link'+cnt).fadeIn('slow'); 
                            
      for(var i=1;i<=imageCount;i++){
          $('.btn'+i).css('background','#fff'); 
          $('.btn'+i).css('width','22');
        }
        $('.btn'+cnt).css('background','#bbc2d5');
        $('.btn'+cnt).css('width','50');                
        if(cnt==imageCount)cnt=0;
    }
      timeonoff= setInterval( moveg , 4500);
  
    
   $('.mbutton').click(function(event){  
	     var $target=$(event.target); 
         clearInterval(timeonoff);
	 
	     for(var i=1;i<=imageCount;i++){
	         $('.gallery .link'+i).hide(); 
         } 
	 
		  if($target.is('.btn1')){
				 cnt=1;
		  }else if($target.is('.btn2')){
				 cnt=2; 
		  }else if($target.is('.btn3')){ 
				 cnt=3; 
		  }
		  $('.gallery .link'+cnt).fadeIn('slow');  
		  
		  for(var i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','#fff'); 
              $('.btn'+i).css('width','22');
		  }
          $('.btn'+cnt).css('background','#bbc2d5');
           $('.btn'+cnt).css('width','50');
       
          if(cnt==imageCount)cnt=0;  
          timeonoff= setInterval( moveg , 4500); 
       
          if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/stop.png)');
	     }
        
    });


	 //stop/play 버튼 클릭시 타이머 동작/중지
  $('.ps').click(function(){ 
       if(onoff==true){
	       clearInterval(timeonoff);  
		   $(this).css('background','url(images/play.png)');
           onoff=false;   
	   }else{  
		  timeonoff= setInterval( moveg , 4500); 
		   $(this).css('background','url(images/stop.png)');
		   onoff=true; 
	   }
  });	



});




