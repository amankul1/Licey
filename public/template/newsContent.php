<?php 


   class News{
      private $menu;
      private $subMenu;
      private $footer;
      private $newsTitles = array();
      private $news_list;
      function __construct($list){
         $this->news_list = $list;
         if(count($list) > 0){
            foreach($this->news_list as $v){
               array_push($this->newsTitles, $v->title);
            }
         }
      }

      function setHtmlBlocks($menu, $subMenu, $footer){
         $this->menu = $menu;
         $this->subMenu = $subMenu;
         $this->footer = $footer; 
         $this->subMenu->getMenuLinks($this->newsTitles);
      }

      function getContext(){
         ?> 
            <!DOCTYPE html>
          <script src="js/jquery-2.2.3.min.js"></script>
            <html lang="en">
            <head>
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" href="public/css/newsContent.css">
               <link rel="stylesheet" href="public/css/menu.css">
               <link rel="stylesheet" href="public/css/footer.css">
               <link rel="stylesheet" href="public/css/subMenu.css">
               <link rel="icon" href="public/image/icons/favicon.ico" type="image/x-icon"/>
               <link rel="shortcut icon" href="public/image/icons/favicon.ico" type="image/x-icon"/>
               <link rel="stylesheet" href="public/css/louder.css"/>
               <title>Licey</title>
            </head>
            <body>

            <div class="mask">
               <div class="banter-loader">
                  <div class="banter-loader__box"></div>
                  <div class="banter-loader__box"></div>
                  <div class="banter-loader__box"></div>
                  <div class="banter-loader__box"></div>
                  <div class="banter-loader__box"></div>
                  <div class="banter-loader__box"></div>
                  <div class="banter-loader__box"></div>
                  <div class="banter-loader__box"></div>
                  <div class="banter-loader__box"></div>
               </div>
            </div>

               <div class="newsHeader"> <?php $this->menu->getContext(); ?> </div>
               <div class="newsContent">
                  <div class="leftBlock"><?php $this->subMenu->getContext(); ?> </div>
                  <div class="rightBlock">
                     <div class="rightBlockTitle">
                         <span>Новости</span>
                     </div>
                     
                  <?php
                     forEach($this->news_list as $val){
                        ?>
                           <div class="card">
                              <div class="img-card"><img src="data:image/jpeg;base64,<?=$val->image?>" ></div>
                              <div class="container">
                                    <div class="containerTitle">
                                        <?php echo $val->title; ?>
                                    </div>
                                    <div class="containerText">
                                        <?php echo $val->text; ?>
                                    </div>
                              </div>
                           </div>
                        <?php
                     }
                  ?>

                  </div>   
               </div>
               <div class="newsFooter"><?php $this->footer->getContext(); ?></div>
               <script src="public/scripts/subMenu.js"></script>
               <script src="public/scripts/menu.js"></script>
               <script src="public/scripts/news.js"></script>

            </body>
            </html>
         <?php
      }

   }