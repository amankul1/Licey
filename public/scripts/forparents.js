(()=>{
   let block = document.querySelectorAll(".forParrents");
   let links = document.getElementsByTagName('li');
   for(let i=0; i<links.length; i++){
      links[i].addEventListener("click", ()=>{
         let h = block[i].offsetTop;
         console.log(block[i]);
         window.scrollTo({
            top: h,
            left: 0,
            behavior: 'smooth'
          });
      })
   }
})();
