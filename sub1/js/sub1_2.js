//탭
$(document).ready(function(){
      var cnt=3;   
      $(".tabs .contlist").hide(); 
      $('.tabs .contlist:eq(0)').show(); 
      $('.tab1').addClass('current');
      
      $('.tabs .tab').click(function(e){  
  
          e.preventDefault();
  
          var ind=$(this).index('.tabs .tab'); 
  
          $(".tabs .contlist").hide(); 
          $(".tabs .contlist:eq("+ind+")").show();
          $('.tab').removeClass('current'); 
          $(this).addClass('current');

      });                                         
      
});