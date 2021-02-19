<?php 
   require_once("public/template/text.php");

   class AboutUs{
      private $menu;
      private $subMenu;
      private $footer;
      private $text;
      private $subLinks = ["История лицея","Сотрудники лицея", "Документы лицея", "Образовательная деятельность", "Методическая служба ", "Kомпетентностный подход", "Обучения английского языка","Kарта урока" ];
      private $documents = ["Устав лицея КГТУ им.И.Раззакова", "Свидетельство о Гос.регистрации", "Прейскурант цен на 2019-20 уч.год", "Сертификат по аккредитации", "Приложение к сертификату"];
      private $edition = ["Учебный план на 2020-21 учебный год","Учебный план на 2019-20 учебный год", "Профилактика правонарушений","План работы учебно-методического совета","План воспитательной работы", "Профориентация", "Матрица годового планирования на 2020-21 уч.год", "План организационно-воспитательных мероприятий на 2020-21 уч.год"];
      private $document_links = ['ustav.pdf','gos_registration.jpg','price.jpg', 'akkreditacija_sertifikat.jpg', 'prilajenie_akkreditatsy.jpg'];
      private $edition_links = ['uchebnyi_plan_20_21.pdf',
                                 'uchebnyi_plan_19_20.pdf', 
                                 'plan_po_profilaktike_pravonarushenii.jpg', 
                                 'uchebniy_plan_m_soveta.jpg',
                                 'plan_vospitatelnoi_raboty.jpg',
                                 'proforientacija.jpg',
                                 'matrix_year_plan_20_21.pdf',
                                 'plan_vospitaniy_20_21.pdf'];
   
      function __construct(){
      }

      function setHtmlBlocks($menu, $subMenu, $footer){
         $this->menu = $menu;
         $this->subMenu = $subMenu;
         $this->footer = $footer; 
         $this->subMenu->getMenuLinks($this->subLinks);
         $this->text = new Text();
      }

      function getContext($teachers_list){
         ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" href="public/css/aboutUsContent.css">
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

               <div class="aboutHeader"> <?php $this->menu->getContext(); ?> </div>
               <div class="aboutContent">
                  <div class="leftBlock"><?php $this->subMenu->getContext(); ?> </div>
                  <div class="rightBlock">
                     <div class="rightBlockPost">
                        <div class="aboutUsPostTitle">История лицея КГТУ им.И.Раззакова </div>
                        <div class="aboutUsPostText"><?php echo $this->text->getHistory(); ?></div>
                        <div class="aboutUsPostImage">
                           <img src="public/image/aboutUs/aboutUs_1.jpg" alt="">
                           <img src="public/image/aboutUs/aboutUs_2.jpg" alt="">
                        </div>
                        <div class="video_about_licey">

                            <iframe width="560" height="315" src="https://www.youtube.com/embed/VoSWmDAXzO8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                     </div>
                     <div class="rightBlockPost">
                        <div class="aboutUsPostTitle">Сотрудники лицея </div>
                        <div class="employees">
                           <?php 
                              foreach($teachers_list as $list){
                           ?>
                              <div class="teacherBlock">
                                 <div class="theacherPhoto">
                                    <img src="data:image/jpeg;base64, <?=$list->image?>" alt="">
                                 </div>
                                 <div class="teacherDescription">
                                    <div class="description">
                                       <div class="descriptionName">
                                          <span>
                                             Имя/Фамилия:
                                          </span>
                                       </div>
                                       <div class="descriptionText">
                                          <p> 
                                             <?php echo$list->name;?>
                                          </p>
                                       </div>
                                    </div> 
                                    <div class="description">
                                       <div class="descriptionName">
                                          <span>
                                             Общие сведения:
                                          </span>
                                       </div>
                                       <div class="descriptionText">
                                          <p> Положение: <?php echo $list->position;?> </p>
                                          <p> Предмет: <?=$list->lesson;?> </p>
                                          <p> Стаж: <?php echo $list->staj;?> </p>
                                          <p> Кабинет: <?php echo$list->classroom;?> </p>
                                          <p> Телефон: <?php echo$list->tel;?> </p>
                                       </div>
                                    </div>
                                    <div class="description">
                                       <div class="descriptionName">
                                          <span>Дополнительная информация:</span>
                                       </div>
                                       <div class="descriptionText">
                                          <p><?php echo $list->more_info;?></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <?php
                              }
                           ?>
                        </div>
                     </div>
                     <div class="rightBlockPost">
                        <div class="aboutUsPostTitle">Документы лицея КГТУ им.И.Раззакова </div>
                        <?php
                           for ($i=0; $i < count($this->document_links); $i++) { 
                              ?>
                                 <div class="aboutUsPostDocuments">
                                    <div class="aboutUsPostDocumentImage">
                                       <a href=<?php echo "public/files/Documents/".$this->document_links[$i]?>>
                                       <?php 
                                          if(strripos($this->document_links[$i], '.pdf')){
                                             ?><img src='public/image/files/pdf.png' alt=''><?php        
                                          }else{
                                             ?><img src='public/image/files/jpg.png' alt=''><?php
                                          }
                                       ?>
                                       </a>
                                    </div>
                                    <div class="aboutUsPostDocumentLink">
                                       <?php echo $this->documents[$i]; ?>
                                    </div>
                                    <div class="downloadLink">
                                       <a href=<?php echo "public/files/Documents/".$this->document_links[$i]?> download>Скачать</a>
                                    </div>
                                 </div> 
                              <?php
                           }
                        ?>                 
                     </div>
                     <div class="rightBlockPost">
                        <div class="aboutUsPostTitle">Образовательная деятельность  </div>  
                        <?php
                           for ($i=0; $i < count($this->edition_links); $i++) { 
                              ?>
                                 <div class="aboutUsPostDocuments">
                                    <div class="aboutUsPostDocumentImage">
                                    <a href=<?php echo "public/files/Edition/".$this->edition_links[$i]?>>
                                       <?php 
                                          if(strripos($this->edition_links[$i], '.pdf')){
                                             ?><img src='public/image/files/pdf.png' alt=''><?php        
                                          }else{
                                             ?><img src='public/image/files/jpg.png' alt=''><?php
                                          }
                                       
                                       ?>
                                    </a>
                                    </div>
                                    <div class="aboutUsPostDocumentLink">
                                       <?php echo $this->edition[$i]; ?>
                                    </div>
                                    <div class="downloadLink">
                                       <a href=<?php echo "public/files/Documents/".$this->edition_links[$i]?> download>Скачать</a>
                                    </div>
                                 </div> 
                              <?php
                           }
                        ?> 
                     </div>
                     
                        <div class="rightBlockPost">
                           <span>Методическая служба </span><br>  

                           <p><br><br>
                           Руководство этой многогранной работой осуществляет Методический Совет школы.
                           <br> <br>
                           Методический совет:
                           <br> <br>
                           · Реализует задачи методической работы на конкретный учебный год
                           <br> <br>
                           · Направляет работу методических объединений
                           <br> <br>
                           · Готовит и проводит внутришкольные семинары, взаимные посещения, педагогические чтения
                           <br> <br>
                           · Обобщает и внедряет передовой педагогический опыт, организует наставничество
                           <br> <br>
                           · Анализирует итоги контрольных заданий, определяет пути устранения пробелов в знаниях
                           <br> <br>
                           · Организует и проводит психолого-педагогические семинары, деловые игры.
                           <br> <br>
                           Основные направления деятельности методического совета:
                           <br> <br>
                           · Анализ результатов образовательной деятельности по предметам.
                           <br> <br>
                           · Обсуждение рукописей учебно-методических пособий и дидактических материалов по предмету.
                           <br> <br>
                           · Подготовка и обсуждение докладов по вопросам методики преподавания учебных предметов, повышения квалификации и квалификационного разряда учителей.
                           <br> <br>
                           · Обсуждение и утверждение календарно-тематических планов.
                           <br> <br>
                           · Обсуждение методики проведения отдельных видов учебных занятий и содержания дидактических материалов к ним.
                           <br> <br>
                           · Рассмотрение вопросов организации, руководства и контроля исследовательской работой учащихся.
                           <br> <br>
                           · Организация и проведение педагогических экспериментов по поиску и внедрению новых информационных технологий обучения.
                           <br> <br>
                           · Совершенствование учебно-методической базы кабинетов.
                           <br> <br>
                           · Взаимные посещения занятий как внутри МО, так и между учителями различных МО с целью обмена опытом и совершенствования методики преподавания учебных предметов.
                           <br> <br>
                           · Изучение работы МО других учебных заведений и обмен опытом этой рабты.
                           <br> <br>
                           · Выбор и организация работы наставников с молодыми специалистами и малоопытными учителями.
                           <br> <br>
                           · Разработка положений о проведении конкурсов, олимпиад, соревнований по предметам.
                           <br> <br>
                           Методический Совет имеет право:
                           <br> <br>
                           · готовить предложения и рекомендовать учителей для повышения квалификационного разряда;
                           <br> <br>
                           · вносить предложения об улучшении учебного процесса в школе;
                           <br> <br>
                           · ставить вопрос о публикации материалов о передовом педагогическом опыте, накопленном в МО;
                           <br> <br>
                           · ставить вопрос перед администрацией школы о поощрении сотрудников школы за активное участие в опытно-поисковой , экспериментальной, научно-методической и проектно-исследовательской деятельности;
                           <br> <br>
                           · рекомендовать учителям различные формы повышения квалификации;
                           <br> <br>
                           · выдвигать учителей для участия в различных конкурсах

                           <br> <br><br> <br>

                           Цель методической службы:
                           <br> <br>
                           Координация методической работы всех подструктур, оказание практической помощи, осуществления управления и контроля их деятельности.
                           <br> <br>
                           Развитие педагогического мастерства и творчества, совершенствование содержания образования на основе стандартных требований и законодательств об образовании в РК.
                           <br> <br>
                           Определение содержания, видов и форм повышения уровня профессионализма и квалификации учителей, их непрерывное образование
                           <br> <br>
                           Задачи
                           <br> <br>
                           — Обеспечить качественный уровень подготовки школьников, достижение ими обязательного уровня в важнейших приоритетных умениях, в соответствии с требованиями ГОСО РК.
                           <br> <br>
                           — Совершенствование учебных планов и программ.
                           <br> <br>
                           — Создание условий для работы по профильному обучению и системы мониторинга. — Изучение и дальнейшее внедрение новых педагогических технологий.
                           <br> <br>
                           — Совершенствовать формы мониторинга за состоянием преподавания учебных дисциплин с целью повышения качества образования. Создать систему педагогического мониторинга.
                           <br> <br>
                           — Выявление, обобщение и распространение положительного педагогического опыта, творчески работающих учителей.
                           <br> <br>
                           — Внедрение в учебный процесс программного обеспечения автоматизированных систем обучения , систем информационного обеспечения занятий, информационно- библиотечных систем. Разработка программного обеспечения для проведения учебных занятий и внедрение их в учебный процесс.
                           <br> <br>
                           — Сосредоточение основных усилий МО на создании базы знаний у учащихся выпускных классов для успешной сдачи ОРТ и поступления в ВУЗы по избранной специальности.
                           </p>
                        </div>
                        <div class="rightBlockPost">
                           <span>Kомпетентностный подход</span>
                         
                           <iframe src="//www.slideshare.net/slideshow/embed_code/key/pFmkWcnAMENmPB" frameborder="0"scrolling="no" style="border:1px solid #CCC; border-width:1px; margin:40px 0 5px 0; width: 90%; height: 500px;" allowfullscreen> </iframe> 
                        </div>
                        <div class="rightBlockPost">
                           <span>Использование технологии проблемного обучения на уроках английского языка</span>
                           <iframe src="//www.slideshare.net/slideshow/embed_code/key/nQ0KLTCj8G6A8w" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin: 40px 0 5px 0; height: 500px; width: 90%;" allowfullscreen> </iframe>
                        </div>
                        <div class="rightBlockPost">
                           <span>Техническая карта урока</span>
                           <iframe src="//www.slideshare.net/slideshow/embed_code/key/36GIkEcNfhQkiZ" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin: 40px 0 5px 0; height: 500px; width: 90%;" allowfullscreen> </iframe><p>
                        </div>
                           
                  </div>
               </div>
               <div class="aboutFooter"><?php $this->footer->getContext(); ?></div>

               <script src="public/scripts/subMenu.js"></script>
               <script src="public/scripts/menu.js"></script>
               <script src="public/scripts/aboutUs.js"></script>
            </body>
            </html>
         <?php
      }

   }