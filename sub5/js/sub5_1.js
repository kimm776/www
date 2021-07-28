//갤러리
$(document).ready(function(){

    $('.gallery li a:eq(0)').find('img').css('border-color', '#ea5206');
    $('.gallery li a:eq(1)').find('img').css('opacity', .4);
    $('.gallery li a:eq(2)').find('img').css('opacity', .4);


    $('.gallery li a:eq(0)').click(function(e){
        e.preventDefault();

        $('.gallery li a:eq(0)').find('img').css('opacity', 1);
        $('.gallery li a:eq(1)').find('img').css('opacity', .4);
        $('.gallery li a:eq(2)').find('img').css('opacity', .4);
    });

    $('.gallery li a:eq(1)').click(function(e){
        e.preventDefault();

        $('.gallery li a:eq(0)').find('img').css('opacity', .4);
        $('.gallery li a:eq(1)').find('img').css('opacity', 1);
        $('.gallery li a:eq(2)').find('img').css('opacity', .4);
    });

    $('.gallery li a:eq(2)').click(function(e){
        e.preventDefault();

        $('.gallery li a:eq(0)').find('img').css('opacity', .4);
        $('.gallery li a:eq(1)').find('img').css('opacity', .4);
        $('.gallery li a:eq(2)').find('img').css('opacity', 1);
    });


    $('.gallery li a').click(function(e){
        e.preventDefault();

        var ind=$(this).index('.gallery li a');

        $('.big').attr('src','./images/content1/big'+(ind+1)+'.jpg');
        $('.big').hide().fadeIn('1500');
        
        $('.gallery ul img').css('border-color', '#fff');
        $(this).find('img').css('border-color', '#ea5206');
    });

});