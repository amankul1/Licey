(()=>{
   let block = document.querySelectorAll(".card");
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

// (()=>{
//    let card = document.querySelectorAll(".card");
//    card.forEach(el=>{
//       el.addEventListener("click", ()=>{
//          location.href = "http://licey/new-info";
//       })
//    })
// })();