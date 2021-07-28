$(document).ready(function(){
    // trailer img change
    var screenSize = $(window).width(); // 실행하자마자 해당 디바이스의 해상도 너비(max-width)를 변수로 넣음
 
    function screenW(){     
        if(screenSize>640){ 
            $('.tra1').attr('src','./images/trailer1.jpg');
        }else(screenSize<640){
            $('.tra1').attr('src','./images/trailer1_big.png');
        }
    }
     
    screenW();  
        
    $(window).resize(function(){
      screenSize = $(window).width();  
        
      screenW(); 
    }); 

});