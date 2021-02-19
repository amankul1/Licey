
function header(){
   let slids = document.querySelectorAll(".headerSliderBlocks");

   function moveSlid(slide, bool){
         setTimeout(() => {
            slide.style = `transform: translateX(0%);`; 
         }, 5000);
         setTimeout(() => {
            if(bool){
               slide.style = `transform: translateX(-100%);`; 
            }else{
               slide.style = `transform: translateX(100%);`; 
            }
         }, 10000);
   }

   return ( ()=>{
      let bool = false;
      let i = 4;
      setInterval(() => {
         
         moveSlid(slids[i], bool);

         if(i===0){
            i=5;
            bool=!bool;
         }
         i--;
      }, 5000);   
   } );

}
let h = header();
h();