// faq

$(document).ready(function () {
	var article = $('.article');
    article.find('.a').slideUp(100);
	
	$('.faq .article .trigger').click(function(e){ 
        e.preventDefault(); 

	    var myArticle = $(this).parents('.article');

        if(myArticle.hasClass('hide')){  
            article.find('.a').slideUp(100); 
            article.removeClass('show').addClass('hide'); 

            myArticle.removeClass('hide').addClass('show'); 
            myArticle.find('.a').slideDown(100); 

        } else { 
            myArticle.removeClass('show').addClass('hide');  
            myArticle.find('.a').slideUp(100);  
        }  
    });    
    

    $('.all').toggle(function(e){
        e.preventDefault(); 

        article.find('.a').slideDown(100);
        article.removeClass('hide').addClass('show');
        article.find('span').html('<i class="fas fa-chevron-up"></i>');
        $(this).text('모두닫기▲');

    },function(e){ 
        e.preventDefault(); 

        article.find('.a').slideUp(100);
        article.removeClass('show').addClass('hide');
        article.find('span').html('<i class="fas fa-chevron-down"></i>');
        $(this).text('모두열기▼');
    });

}); 


// tab

$(document).ready(function(){
    var cnt=3;   
    $(".tabs .contlist").hide(); 
    $('.tabs .contlist:eq(0)').show(); 
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
