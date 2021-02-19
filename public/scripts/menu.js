
 let mask = document.querySelector(".mask");

 window.addEventListener("load", ()=>{
    mask.classList.add("hide");
    setTimeout(() => {
       mask.remove();
    }, 500);
 })

   function menu(now){
      let links = document.querySelectorAll(".menuLinks");
      let menu = document.querySelector(".menu");
      let l=[];
   
       links.forEach(element => {
          l.push(element);
       });
       l.shift();
       l.pop();

       switch (now) {
          case "":
            l[0].style = "opacity: 1; border-bottom: 1.5px solid rgba(255, 251, 251, 0.5);";
            break;
         case "aboutus":
            l[1].style = "opacity: 1; border-bottom: 1.5px solid rgba(255, 251, 251, 0.5);";
            break;
         case "news":
            l[2].style = "opacity: 1; border-bottom: 1.5px solid rgba(255, 251, 251, 0.5);";
            break;
         case "galery":
            l[3].style = "opacity: 1; border-bottom: 1.5px solid rgba(255, 251, 251, 0.5);";
            break;
         case "parents":
            l[4].style = "opacity: 1; border-bottom: 1.5px solid rgba(255, 251, 251, 0.5);";
            break;
         case "methods":
            l[5].style = "opacity: 1; border-bottom: 1.5px solid rgba(255, 251, 251, 0.5);";
            break;
          default:
             break;
       }
   
      return (
         ()=>{
            document.addEventListener("scroll", ()=>{
               let topHeight = document.documentElement.scrollTop;
               if(topHeight > 30){
                  menu.style = "position:fixed; z-index:6; width: 100vw;";
                  
               }else{
                  menu.style = "position: relative;";
               }
            })
         }
      )
   }

   let path = location.href.split('/');

   let m = menu(path[path.length-1]);


   if(path[path.length-1] === '' || path[path.length-1] === 'main'){
      m();
   }

   let pagesLocation=()=>{
      let menuItems = document.querySelectorAll(".menuLinks");
      let menuList = ["main", "aboutus", "news", "galery", "parents", "appraisal"];
      a=[];
      menuItems.forEach(e=>{
         a.push(e);
      });
      a.shift();
      a.pop();

      menuItems[menuItems.length-1].onclick = ()=>{
         let allHeight = document.body.offsetHeight;
         let w = window.innerHeight;
         window.scrollTo({
            top: allHeight-w,
            left: 0,
            behavior: 'smooth'
          });
      }
     
      for(let i=0; i<a.length; i++){
         a[i].addEventListener('click', ()=>{
            location.href = `${menuList[i]}`;
         })
      }
      
   }
   
   pagesLocation();



   var wrapperMenu = document.querySelector('.wrapper-menu');
   let low_menu = document.querySelector(".intoMenu");

   wrapperMenu.addEventListener('click', function(){
      let b = wrapperMenu.classList.toggle('open');
      if(b){
         low_menu.style = "transform: scaleY(1) ;opacity: 1;";
      }else{
         low_menu.style = "transform: scaleY(0); opacity: 0;";
      }
   })
