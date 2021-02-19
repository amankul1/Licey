<?php 


   class ForParentsAndStudents{
      private $menu;
      private $subMenu;
      private $footer;
      private $forParent = ["Родителям", "Ученикам"];
      private $for_students_list = ['rapisanie.jpg', 'grafik_dezhurstva_uchitelei.jpg', 'olimpiada19.jpg'];
      private $titles_list = ['Расписание уроков на 1 четверть', 'График дежурства учителей', 'Олимпиада 2019'];
      function __construct(){
      }

      function setHtmlBlocks($menu, $subMenu, $footer){
         $this->menu = $menu;
         $this->subMenu = $subMenu;
         $this->footer = $footer; 
         $this->subMenu->getMenuLinks($this->forParent);
      }

      function getContext(){
         ?>
            <!DOCTYPE html>
            <html lang="en">
            <head> 
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" href="public/css/forParentsAndStudents.css">
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

               <div class="parentsHeader"> <?php $this->menu->getContext(); ?> </div>
               <div class="parentsContent">
                  <div class="leftBlock"><?php $this->subMenu->getContext(); ?> </div>
                  <div class="rightBlock">
                     <div class="forParrents">
                        <div class="forParentTitle"><span>Родителям</span></div>
                        <div class="forPerantsPost">
                           <div class="postName">
                              <span>Условия приема</span>
                           </div>
                           <div class="postText">
                              <p>Пройти собеседование (устно)</p>
                              <p>Заполнить заявление о приеме в лицей</p>
                              <p>Заключить договор на учебный год</p>
                              <p>Произвести оплату не менее 50% стоимости контракта</p>
                              <p>При себе иметь паспорт (родитель).</p> 
                           </div>
                        </div>
                        <div class="forPerantsPost">
                           <div class="postName">
                              <span>Список документов необходимых для  поступления (собираются после заключения контракта):</span>
                           </div>
                           <div class="postText">
                              <p>Личное дело</p>
                              <p>Копия свидетельства о рождении (ученика)</p>
                              <p>Копия паспорта (если есть)</p>
                              <p>Копия паспортов родителей</p>
                              <p>Копия свидетельства о 9-ти летнем образовании (для поступающих в 10-11 классы)</p> 
                              <p>Справка форма 086 (медосмотр)</p>
                              <p>Справка с наркодиспансера</p>
                              <p>Фото 3х4 -6 шт.</p>
                           </div>
                        </div>
                        <div class="forPerantsPost">
                           <div class="postName">
                              <span>Форма одежды учащегося в лицее</span>
                           </div>
                           <div class="postText">
                              <p>МАЛЬЧИКИ – костюм темный цвет, белая (синяя) рубашка, туфли черные, стрижка для школьника.</p>
                              <p>ДЕВУШКИ — черная юбка или классические темные брюки, кофта, блузка белая (синяя) , туфли на низком каблуке, иметь аккуратную прическу.</p>
                              <p>На урок физической культуры иметь при себе спортивный костюм, кроссовки (кеды).</p>
                              <p>На торжественные общелицейские мероприятия, учащиеся приходят в парадной форме.</p> 
                           </div>
                        </div>
                        <div class="forPerantsPost">
                           <div class="postName">
                              <span>ПОЛОЖЕНИЕ на дополнительные образовательные услуги в лицее КГТУ им.И. Раззакова</span>
                           </div>
                           <div class="postText">
                              <p>Лицей КГТУ осуществляет дополнительные образовательные услуги в соответствии с законом “Об образовании” (гл. 1 ст. 1, гл.7 ст. 51) и устава лицея.</p>
                              <p>В дополнительные образовательные услуги с обучающимся включаются индивидуальное или групповая подготовка для поступления в ВУЗы республики по предметам, определенным индивидуальным контрактом. Перечень дисциплин соответствует вступительным экзаменам в ВУЗ.</p>
                              <p>Обучающимися могут быть как граждане Кыргызской республики, так и иностранные граждане, имеющие не законченное среднее образование, а так же выпускники школ.</p>
                              <p>Плата за обучение устанавливается в соответствии с УСТАВОМ лицея КГТУ и утверждается в порядке определенным соответствующими с законами Кыргызской республики ( для граждан КР, для граждан СНГ и для дальнего зарубежья).</p> 
                              <p>Прием иностранных граждан осуществляется только при наличии визы на “учебу”. По окончании выдается сертификат свидетельствующий о прохождении обучения с выставлением оценок на основании итоговой аттестации и в соответствии с требованиями, предъявляемыми к поступающим в ВУЗЫ.</p>
                              <p>Программы для обучения утверждаются педагогическим советом лицея КГТУ и рассчитаны на 3,6,9 месяцев.</p>
                              <p>Начало занятий по мере набора, комплектования групп, включающих до 20 человек, а с иностранными гражданами не более 5-6 человек.</p>
                              <p>Учащиеся обязаны соблюдать правила внутреннего распорядка учебного заведения, не допускать порч имущества лицея. В случае порчи возместить материальный ущерб по полной стоимости по ценам на день возмещения ущерба.</p>
                              <p>Дополнительные образовательные услуги осуществляются силами учителей лицея и преподавателями соответствующих кафедр на условиях почасовой оплаты.</p>
                           </div>
                        </div>
                        <div class="forPerantsPost">
                           <div class="postName">
                              <span>Зачисление происходит после:</span>
                           </div>
                           <div class="postText">
                              <p>— подачи заявления</p>
                              <p>— заключение договора</p>
                              <p>— внесение платы за обучение</p>
                           </div>
                        </div>
                        <div class="forPerantsPost">
                           <div class="postName">
                              <span>Ответственный за подготовительные курсы в лицее КГТУ им.И.Pаззакова        </span>
                           </div>
                           <div class="postText">
                              <p>Абдираимова М.А</p>
                           </div>
                        </div>
                        <div class="forPerantsPost">
                           <img src="public/image/forParents.jpg" alt="">
                        </div>
                     </div>
                     <div class="forParrents">
                        <div class="forParentTitle"><span>Ученикам</span></div>
                        <?php for($i=0; $i<count($this->titles_list); $i++) {?>
                           <div class="forStudentsPost">
                                 <a href=<?php echo "public/files/for_students/".$this->for_students_list[$i];?>>
                                    <div class="studentPostName">
                                       <?php 
                                          if(strripos($this->for_students_list[$i], '.pdf')){
                                             ?><img src='public/image/files/pdf.png' alt=''><?php        
                                          }else{
                                             ?><img src='public/image/files/jpg.png' alt=''><?php
                                          }
                                       ?>
                                    </div>
                                 </a>
                                 <div class="studentPostText">
                                    <p> <?=$this->titles_list[$i]?> </p>
                                 </div>
                                 <div class="studentDownload">
                                    <a href=<?php echo "./public/files/for_students/".$this->for_students_list[$i];?> download>Скачать</a>
                                 </div>
                           </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
               <div class="parentsFooter"><?php $this->footer->getContext(); ?></div>
               <script src="public/scripts/subMenu.js"></script>
               <script src="public/scripts/menu.js"></script>
               <script src="public/scripts/forparents.js"></script>
            </body>
            </html>
         <?php
      }

   }