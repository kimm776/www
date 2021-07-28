$(document).ready(function(){

    // champion
    var cnt=3;
    $('.contlist').hide();
    $('.contlist').eq(0).slideDown();
    $('.txt').hide();
    $('.txt').eq(0).show();
    $('.tab').css('filter','grayscale(100%)');
    $('.tab1').css('filter','grayscale(0%)');

    $('.tab').click(function(e){
        e.preventDefault();
        var ind=$(this).index('.tab');
        $('.contlist').hide();
        $('.contlist:eq('+ind+')').slideDown();
        $('.txt').hide();
        $('.txt:eq('+ind+')').show();
        $('.tab').css('filter','grayscale(100%)');
        $(this).css('filter','grayscale(0%)');
    })

    
    // universe

    var screenWsize = $(window).width();
    var info=$('.uni_box');
    
    $('.link1 .text').css('display','block')

    $('.title a').click(function(e){
        e.preventDefault();


        if(screenWsize > 768){

            var selectBox=$(this).parents('.uni_box');
            var findImg=$(this).parents('.universe_wrap').children('.poster_wrap').find('img');
            

            if(selectBox.hasClass('hide')){
                info.find('.text').slideUp(200);
                info.removeClass('show').addClass('hide').removeClass('active');
                selectBox.removeClass('hide').addClass('show').addClass('active');
                selectBox.find('.text').slideDown(200);
            };
            
            if(selectBox.hasClass('link1')){
                findImg.attr('src','images/poster1.jpg');
            }else if(selectBox.hasClass('link2')){
                findImg.attr('src','images/poster2.jpg');
            }else if(selectBox.hasClass('link3')){
                findImg.attr('src','images/poster3.jpg');
            }else if(selectBox.hasClass('link4')){
                findImg.attr('src','images/poster4.jpg');
            };

        }


    });


    // var info=$('.uni_box');
    
    // $('.link1 .text').css('display','block')

    // $('.title a').click(function(e){
    //     e.preventDefault();
    //     var selectBox=$(this).parents('.uni_box');
    //     var findImg=$(this).parents('.universe_wrap').children('.poster_wrap').find('img');
        

    //     if(selectBox.hasClass('hide')){
    //         info.find('.text').slideUp(200);
    //         info.removeClass('show').addClass('hide').removeClass('active');
    //         selectBox.removeClass('hide').addClass('show').addClass('active');
    //         selectBox.find('.text').slideDown(200);
    //     };
        
    //     if(selectBox.hasClass('link1')){
    //         findImg.attr('src','images/poster1.jpg');
    //     }else if(selectBox.hasClass('link2')){
    //         findImg.attr('src','images/poster2.jpg');
    //     }else if(selectBox.hasClass('link3')){
    //         findImg.attr('src','images/poster3.jpg');
    //     }else if(selectBox.hasClass('link4')){
    //         findImg.attr('src','images/poster4.jpg');
    //     };

        
    // });


   
});