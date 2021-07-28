// 네비

$(document).ready(function() {

    // 2depth 열기,닫기
    $('ul.dropdownmenu').hover(
        function() { 
            $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); 
            $('#headerArea').animate({height:335},'fast').clearQueue();
        },
        function() {
            $('ul.dropdownmenu li.menu ul').fadeOut('fast'); 
            $('#headerArea').animate({height:165},'normal').clearQueue();
        
    });


    // 1depth효과 
    $('ul.dropdownmenu li.menu').hover( 
        function() { 
            $('.depth1',this).css('color','#3e4c97');
        },
        function() {
            $('.depth1',this).css('color','#333');
    });

    //탭처리
    $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').slideDown('normal');
        $('#headerArea').animate({height:345},'fast').clearQueue();
    });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').slideUp('fast');
        $('#headerArea').animate({height:165},'normal').clearQueue();    
    });
});


//상단이동 코드

$(document).ready(function () {
            
    $('.topMove').hide(); 
 
    $(window).on('scroll',function(){ 
          var scroll = $(window).scrollTop();  
       
          if(scroll>680){      
             $('.topMove').fadeIn('slow');  
          }else{
             $('.topMove').fadeOut('fast'); 
          }
    });

    // top버튼을 클릭하면 상단으로 이동시키기
    $('.topMove').click(function(e){ 
          e.preventDefault();

       //스크롤 위치를 이동시키기
       $("html,body").stop().animate({"scrollTop":0},1000); 
    }); 
});



//패밀리사이트

$(document).ready(function() {
	$('.select .arrow').click(function(e){
        e.preventDefault();

		$('.select .aList').show();
        $('.select i').removeClass('fa-chevron-right').addClass('fa-chevron-down');		  
	});
	$('.select').mouseleave(function(){
		$('.select .aList').hide();
        $('.select i').removeClass('fa-chevron-down').addClass('fa-chevron-right');		  
	});
	
	//tab키 처리
	  $('.select .arrow').on('focus', function () {        
              $('.select .aList').show();	
       });
       $('.select .aList li:last').find('a').on('blur', function () { 
              $('.select .aList').hide();
       });  
});

// search box
$(document).ready(function() {
    $('.search_box').hide();
    
	$('.search_select .search_arrow').toggle(function(){
		$('.search_select .search_aList').slideDown(); 
	}, function(){
		$('.search_select .search_aList').slideUp('fast');
	});

});

