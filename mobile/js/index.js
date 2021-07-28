$(document).ready(function(){

    // visual 호출코드
    $(window).load(function(){
        $('.flexslider').flexslider({
          animation: "slide"
        });
    });

    //facility tab
    var cnt=3;
    $('.contlist').hide();
    $('.contlist').eq(0).show();
    $('.tab1').css('background','#3e4c97').css('color','#fff');

    $('.tab').click(function(e){
        e.preventDefault();
        var ind=$(this).index('.tab');
        $('.contlist').hide();
        $('.contlist:eq('+ind+')').show();
        $('.tab').css('background','#eee').css('color','#333');
        $(this).css('background','#3e4c97').css('color','#fff');
    });

    //top_btn
    $('#footerArea .top_btn').click(function(){
        $("html,body").animate({"scrollTop": 0}, 1700)
    })

    // Initialize Swiper
    var swiper = new Swiper('.swiper-container', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
    });



});