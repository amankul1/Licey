(()=>{
   let block = document.querySelectorAll(".rightBlockPost");
   let links = document.getElementsByTagName('li');
   for(let i=0; i<links.length; i++){
      links[i].addEventListener("click", ()=>{
         let h = block[i].offsetTop;
         window.scrollTo({
            top: h+100,
            left: 0,
            behavior: 'smooth'
          });
      })
   }
})();