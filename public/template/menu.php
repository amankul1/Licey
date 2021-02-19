<?php 


   class Menu{
      function __construct(){
      }

      function getContext(){
         ?>
            <div class="menu">
               <div class="adapting_menu">
                  <div class="burger">
                     <img src="public/image/logo.png" width="50px" alt="logo">
                  </div>
                  <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                  </div>
               </div>
               <div class="intoMenu">
                  <div class="menuLinks">
                     <img src="public/image/logo.png" width="70px" height="50px" alt="logo">
                  </div>
                  <div class="menuLinks">Главная</div>
                  <div class="menuLinks">О нас</div>
                  <div class="menuLinks">Новости</div>
                  <div class="menuLinks">Галерея</div>
                  <div class="menuLinks">Родителям/Ученикам</div>
                   <div class="menuLinks">Оценки</div>
                  <div class="menuLinks">Контакты</div>
               </div>
            </div>
         <?php 
      }

   }