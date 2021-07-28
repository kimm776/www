$(document).ready(function(){

    //more
    var cnt=1;   
    $(".m_cont").eq(2).hide();  
    
    $('.tabs .tab1').click(function(e){  

        e.preventDefault();

        $(".m_cont").eq(2).show(); 
        $(".tabs .tab1").hide();  
    });                                         
    
});