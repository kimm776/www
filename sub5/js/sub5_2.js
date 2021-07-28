// 버튼 탭

$(document).ready(function(){

    $('.tab1').css('opacity',1)
    
    $('.tab').click(function(){ 
        $('.tab').css('opacity',.4);
        $(this).css('opacity',1);
    }); 
});