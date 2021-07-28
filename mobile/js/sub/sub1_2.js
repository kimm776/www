$(document).ready(function() {
    var swiper_tab = new Swiper('.swiper_tab', {
        autoHeight: true,
        speed : 500
    });

    swiper_tab.on('slideChange', function () {
        $(".slide_tabs .active").removeClass('active');
        $(".slide_tabs a").eq(swiper_tab.activeIndex).addClass('active');
    });
    
    $(".slide_tabs a").on('touchstart mousedown', function(e) {
        e.preventDefault();
        $(".slide_tabs .active").removeClass('active');
        
        $(this).addClass('active');

        //swiper.swipeTo($(this).index());					
        swiper_tab.slideTo($(this).index());
    });
    
    $(".slide_tabs a").click(function(e) {
    
        e.preventDefault();
    
    });
});