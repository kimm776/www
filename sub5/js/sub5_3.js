//  팬시박스
$(document).ready(function() {
    //기본 갤러리 코드
    $('.fancyBox a').fancybox({
        //추가 옵션넣기
        'overlayOpacity': .7,
        'overlayColor': '#000',
        'transitionIn'	:	'elastic',
        'transitionOut'	:	'elastic',
        'speedIn'		:	300, 
        'speedOut'		:	200
    });
});

// 탭

$(document).ready(function(){
    var cnt=1;   
    $(".tabs .contlist").hide();  
    
    $('.tabs .tab').click(function(e){  

        e.preventDefault();

        var ind=$(this).index('.tabs .tab'); 

        $(".tabs .contlist:eq("+ind+")").show(); 
        $(".tabs .tab1").hide();  
    });                                         
    
});