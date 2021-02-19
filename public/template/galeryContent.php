 <?php 

   class GaleryContent{
      private $menu;
      private $subMenu;
      private $footer;
      private $galeryTitles = ["1-Сентябрь", "Научно творческая конференция", "День учителя", "Суботники", "Детский дом", "Новый год", "23-февраль", "8-марта", "Профориентация", "Нооруз", "День победы", "Последний званок", "Выпускной вечер"];
      private $gallery_list;

      function __construct($list){
         $this->gallery_list = $list;
      }

      function setHtmlBlocks($menu, $subMenu, $footer){
         $this->menu = $menu;
         $this->subMenu = $subMenu;
         $this->footer = $footer;
         $this->subMenu->getMenuLinks($this->galeryTitles);
      }

      function getContext(){
         ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" href="public/css/galeryContent.css">
               <link rel="stylesheet" href="public/css/menu.css">
               <link rel="stylesheet" href="public/css/footer.css">
               <link rel="stylesheet" href="public/css/subMenu.css">
               <link rel="icon" href="public/image/icons/favicon.ico" type="image/x-icon"/>
               <link rel="shortcut icon" href="public/image/icons/favicon.ico" type="image/x-icon"/>
               <link rel="stylesheet" href="public/css/louder.css"/>
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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

               <div class="galeryHeader"> <?php $this->menu->getContext(); ?> </div>
               <div class="galeryContent">
                  <div class="leftBlock"><?php $this->subMenu->getContext(); ?> </div>
                  <div class="rightBlock">
                     <div class="galeryTitle"><span>Галерея лицея при КГТУ им. И Раззакова</span></div>
                     
                     <?php for($i=0; $i<count($this->galeryTitles); $i++){?>
                        <div class="rightBlockPosts">
                           <div class="postTitle"><?=$this->galeryTitles[$i]?></div>
                           <?php 
                              for($j=0; $j<count($this->gallery_list); $j++){ 
                                 if($this->galeryTitles[$i] == $this->gallery_list[$j]->type){
                                    ?><div class="postImages">
                                       <img class="image" src="data:image/jpeg;base64,<?=$this->gallery_list[$j]->image?>" >
                                    </div><?php
                                 }
                              }
                           ?>
                           <a href="subGallery?type=<?=$this->galeryTitles[$i]?>">Посмотреть больше</a>
                        </div>
                     <?php } ?>

                  </div>
               </div>
               <div class="galeryFooter"><?php $this->footer->getContext(); ?></div>
               <script src="public/scripts/subMenu.js"></script>
               <script src="public/scripts/menu.js"></script>
               <script src="public/scripts/galery.js"></script>
            </body>
            </html>
         <?php
      } 

   }