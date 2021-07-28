$(document).ready(function(){

    window.onload = function(){
        var swiper = new Swiper('.swiper-container', {
                    pagination: '.swiper-pagination',
                    paginationType: 'progress',
                    slidesPerView: 'auto',
                    paginationClickable: true,
                    spaceBetween: 0,
                    freeMode: true,
                    nextButton: '.next',
                    prevButton: '.back'
        });
    };


});