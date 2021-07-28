// 탭

$(document).ready(function(){
    var cnt=7;   
    $(".tabs .contlist").hide(); 
    $('.tabs .contlist:eq(0)').show(); 
    $('.tabs').css('background','#fff').css('color','#333');
    $('.tabs .tab1').css('background','#ea5206').css('color','#fff'); 
    
    $('.tabs .tab').click(function(e){  

        e.preventDefault();

        var ind=$(this).index('.tabs .tab'); 

        $(".tabs .contlist").hide(); 
        $(".tabs .contlist:eq("+ind+")").show(); 
        $('.tab').css('color','#333').css('background','#fff');
        $(this).css('background','#ea5206').css('color','#fff');
    });                                         
    
});