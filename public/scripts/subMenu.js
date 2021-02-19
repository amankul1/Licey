$(function(){
   $("li").hover(function(){
     $(this).animate({width:"100%"},"medium"); 
   },
   function(){
      $(this).animate({width:"90%"},"slow"); 
   });
 });


