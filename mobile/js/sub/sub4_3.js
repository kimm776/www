$(document).ready(function(){
    var cnt=7;   
    $(".contlist").hide(); 
    $('.contlist:eq(0)').show(); 
    $('.tab1').css('background','#ea5206').css('color','#fff'); 
    
    $('.tab').click(function(e){  

        e.preventDefault();

        var ind=$(this).index('.tabs .tab'); 

        $(".contlist").hide(); 
        $(".contlist:eq("+ind+")").show(); 
        $('.tab').css('color','#333').css('background','#fff');
        $(this).css('background','#ea5206').css('color','#fff');
    });                                         
    
});