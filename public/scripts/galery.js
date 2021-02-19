(()=>{
   let block = document.querySelectorAll(".rightBlockPosts");
   let links = document.getElementsByTagName('li');
   for(let i=0; i<links.length; i++){
      links[i].addEventListener("click", ()=>{
         let h = block[i].offsetTop;
         window.scrollTo({
            top: h,
            left: 0,
            behavior: 'smooth'
          });
      })
   }
})();

(()=>{
   let image_frames = document.querySelectorAll('.postImages');
   let images = document.querySelectorAll('.image');

   let b = true;
   for (let i = 0; i < image_frames.length; i++) {
      image_frames[i].addEventListener("click", ()=>{
         image_frames[i].classList.toggle('activ');
         images[i].classList.toggle('activ_1');
         if(b){
            alert('Что бы закрыть картинку нажми на него!');
            b=false;
         }
      });
      
   }

})();