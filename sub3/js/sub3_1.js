
// 좌석배치도 모달

$(document).ready(function() {
 
    //이벤트 처리
    $('.event_btn').toggle(function(){
        $('.event').animate({left: 0},'slow');
        $(this).text('close');
    }, function(){
        $('.event').animate({left: -810},'fast');
        $(this).text('좌석배치도');
    });
 
    // 모달팝업 처리
    $('.open_btn').click(function(){  
        $('.box').fadeIn('fast');
        $('.pop').fadeIn('slow');
    });
    $('.close_btn').click(function(){ 
        $('.box').fadeOut('fast');
        $('.pop').fadeOut('slow');
    });
 
 });

 
// 버튼 탭

$(document).ready(function(){

    $('.tab1').css('opacity',1)
    
    $('.tab').click(function(){ 
        $('.tab').css('opacity',.4);
        $(this).css('opacity',1);
    }); 
});