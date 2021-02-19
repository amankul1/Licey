<?php
   class Header{
      private $menu;
      function __construct(){
      }

      function setMenu($menu){
         $this->menu = $menu;
      }
      
      function getContext(){ 
         ?>
               <div class="header">
                  <div class="headerSlider">
                     <div class="headerSliderBlocks slid1">
                        <div class="headerText">
                           <span>
                              Лицей при КГТУ им. И.Раззакова!
                           </span>
                        </div>
                     </div>
                     <div class="headerSliderBlocks slid2">
                        <div class="headerText">
                           <span>
                              Лицей при КГТУ им. И.Раззакова!
                           </span>
                        </div>
                     </div>
                     <div class="headerSliderBlocks slid3">
                        <div class="headerText">
                           <span>
                              Лицей при КГТУ им. И. Раззакова!
                           </span>
                        </div>
                     </div>
                     <div class="headerSliderBlocks slid4">
                        <div class="headerText">
                           <span>
                              Лицей при КГТУ им. И.Раззакова!
                           </span>
                        </div>
                     </div>
                     <div class="headerSliderBlocks slid5">
                        <div class="headerText">
                           <span>
                              Лицей при КГТУ им. И.Раззакоа!
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="headerMenu"><?php $this->menu->getContext()  ?></div> 
               </div>
         <?php  
      }


   }

