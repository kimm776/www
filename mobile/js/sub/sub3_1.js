$(document).ready(function(){

    $('.tab1').css('opacity',1);
    $('.tab2').css('opacity',.4);
    
    $('.tab').click(function(){ 
        $('.tab').css('opacity',.4);
        $(this).css('opacity',1);
    }); 
});