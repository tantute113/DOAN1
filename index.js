$(document).ready(function(){

    $(window).scroll(function()
    {
    
    if(scrollY>20)
    {
      
    $('.menu').addClass("stiky") ;
    }
    else
    {
        $('.menu').removeClass("stiky")
    }
    }) 
});
