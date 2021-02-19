<?php 


   class SubMenu{
      private $menuLinks = [];
      function __construct(){
      }

      function getMenuLinks($arr){
         $this->menuLinks = $arr;
      }

      function getContext(){
         ?>
               <div class="sub_menu">
                  <ul>
                     <?php
                        foreach ($this->menuLinks as $value) {
                           echo "<li > $value </li>";
                        }
                     ?>
                  </ul>
               </div>
         <?php  
      }

   }