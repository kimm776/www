// 스크롤 js
$(document).ready(function() {


    $('.wp1').waypoint(function() {    //스크롤링시 효과가 발생할 요소의 클래스나 아이디명.
      $('.wp1').addClass('animated fadeInLeft');
    }, {
      offset: '100%'            //스크롤과의 거리
    });
    $('.wp2').waypoint(function() {
      $('.wp2').addClass('animated fadeInRight');
    }, {
      offset: '110%'
    });        
    $('.wp3').waypoint(function() {
      $('.wp3').addClass('animated fadeInRight');
    }, {
      offset: '100%'
    });
    $('.wp4').waypoint(function() {
      $('.wp4').addClass('animated fadeInDown');
    }, {
      offset: '90%'
    });
    $('.wp5').waypoint(function() {
      $('.wp5').addClass('animated fadeInRight');
    }, {
      offset: '120%'
    });
    $('.wp6').waypoint(function() {
        $('.wp6').addClass('animated fadeInLeft');
      }, {
        offset: '120%'
    });
    $('.wp7').waypoint(function() {
        $('.wp7').addClass('animated fadeInRight');
      }, {
        offset: '130%'
    });
    $('.wp8').waypoint(function() {
        $('.wp8').addClass('animated fadeInUp');
      }, {
        offset: '120%'
    });
    $('.wp9').waypoint(function() {
        $('.wp9').addClass('animated fadeInUp');
      }, {
        offset: '130%'
    });
    $('.wp10').waypoint(function() {
        $('.wp10').addClass('animated fadeInUp');
      }, {
        offset: '130%'
    });
});