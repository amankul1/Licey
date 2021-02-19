<?php
require_once ('public/template/admin/index.php');

class AdminView{
    private $mainTemplate;

    function __construct(){
        $this->mainTemplate = new MainTemplate();
    }

    function getMainPage($cont){
        $this->mainTemplate->getPage($cont);
    }

    function getTeacherContent($data){
        $e = '</tbody></table> ';
        $teachersContent = '
            <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Имя</th>
                      <th scope="col">Положение</th>
                      <th scope="col">Урок</th>
                      <th scope="col">Кабинет</th>
                      <th scope="col">Телефон</th>
                      <th scope="col">Опыт</th>
                      <th scope="col">Фото</th>
                      <th scope="col">Изменить</th>
                    </tr>
                  </thead>
                  <tbody';

        if(count($data)!==0){
            $middle='';
            foreach ($data as $ob) {
                $middle='<tr></tr><th class = "teacher_th" scope="row">'.$ob->getId().'</th>'.
                    '<td class = "teacher_td" scope="row">'.$ob->getName().'</td>'.
                    '<td class = "teacher_td" scope="row">'.$ob->getPosition().'</td>'.
                    '<td class = "teacher_td" scope="row">'.$ob->getLesson().'</td>'.
                    '<td class = "teacher_td" scope="row">'.$ob->getClassroom().'</td>'.
                    '<td  class = "teacher_td" scope="row">'.$ob->getTelephon().'</td>'.
                    '<td class = "teacher_td" scope="row">'.$ob->getExperience().'</td>'.
                    '<td class = "teacher_td" scope="row"><img class="teacher_image" src="data:image/jpeg;base64, '.$ob->getImage().'" alt=""></td>'.
                    '<td class = "teacher_td" scope="row"> <a href="/licey/admin/teachers?teacher_id='.$ob->getId().'"><button class="btn btn-warning">Изменить</button></a></td>'.
                    '</tr>';
                $teachersContent = $teachersContent.$middle;
            }
            $teachersContent = $teachersContent.$e;
        }else{
            $teachersContent = 'Empty';
        }
        return $teachersContent;
    }

    function getTeacherDetailContent($data){

        $teacherContent = '
            <form class="teacherDetailForm" action="/licey/admin/teachers" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="hidden" name="type" value="teacherDetail">
                <input type="hidden" name="id" value="'.$data->getId().'">
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="'.$data->getName().'">
              </div>
              <div class="form-group">
                <label for="position">Положение</label>
                <input type="text" class="form-control" id="position" name="position" aria-describedby="emailHelp" value="'.$data->getPosition().'">
              </div>
              <div class="form-group">
                <label for="lesson">Урок</label>
                <input type="text" class="form-control" id="lesson" name="lesson" aria-describedby="emailHelp" value="'.$data->getLesson().'">       
              </div>
              <div class="form-group">
                <label for="classroom">Кабинет</label>
                <input type="text" class="form-control" id="classroom" name="classroom" aria-describedby="emailHelp" value="'.$data->getClassroom().'">
              </div>
              <div class="form-group">
                <label for="telephon">Телефон</label>
                <input type="telephon" class="form-control" id="telephon" name="telephon" aria-describedby="emailHelp" value="'.$data->getTelephon().'">
              </div>
              <div class="form-group">
                <label for="experience">Стаж</label>
                <input type="text" class="form-control" id="experience" name="experience" aria-describedby="emailHelp" value="'.$data->getExperience().'">
              </div>
              <div class="form-group">
                <label for="more_info">Дополнительно</label>
                <input type="text-aria" class="form-control" id="more_info" name="more_info" aria-describedby="emailHelp" value="'.$data->getMoreInfo().'">
              </div>
              <div class="form-group">
                <label for="image">Фото</label>
                <input type="hidden" name="oldImage" value="'.$data->getImage().'">
                <input type="file" class="form-control" name="newImage" id="image">
              </div>
              <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
        ';

        return $teacherContent;
    }

    function getPupilContent($data){

        if(count($data)===0){
            return '
                <div class="getPupilSize">
                    <label for="vod">Сколько учеников вы хотите добавить ?</label>
                    <input type="number" id="vod" min="1" max="30" class=" form-control-number formsSize"> 
                    <button class="btn btn-success addPupilsSizeBut">Добавить</button>
                </div>
                
                <script type="text/javascript">
                    let sizeBut = document.querySelector(".addPupilsSizeBut");
                    let formsSize = document.querySelector(".formsSize"); 
                    
                    sizeBut.addEventListener("click", ()=>{
                        let paz = "/licey/admin/pupils?temp=addNewPupilsForms&size="+formsSize.value;
                        location.href = paz;
                    })
                </script>
            ';
        }

        $e = '</tbody></table> 

        <script type="text/javascript">
            let sizeBut = document.querySelector(".addPupilsSizeBut");
            let formsSize = document.querySelector(".formsSize"); 
            
            sizeBut.addEventListener("click", ()=>{
                let paz = "/licey/admin/pupils?temp=addNewPupilsForms&size="+formsSize.value;
                location.href = paz;
            })
        </script>
        
        ';
        $pupilsContent = '
            <div class="getPupilSize">
                <label for="vod">Сколько учеников вы хотите добавить ?</label>
                <input type="number" id="vod" min="1" max="30" class=" form-control-number formsSize"> 
                <button class="btn btn-success addPupilsSizeBut">Добавить</button>
            </div>
            <table class="table ">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Имя</th>
                      <th scope="col">Класс</th>
                      <th scope="col">Удалить</th>
                      <th scope="col">Изменить</th>
                    </tr>
                  </thead>
                  <tbody';

        if(count($data)!==0){
            $middle='';
            $i=1;
            foreach ($data as $ob) {
                $middle='<tr></tr><th  scope="row">'.$i.'</th>'.
                    '<td  scope="row">'.$ob->getName().'</td>'.
                    '<td  scope="row">'.$ob->getClass().'</td>'.
                    '<td  scope="row"> <a href="/licey/admin/pupils?temp=pupilDelete&id='.$ob->getId().'"><button class="btn btn-danger">Удалить</button></a></td>'.
                    '<td  scope="row"> <a href="/licey/admin/pupils?temp=updateDetail&id='.$ob->getId().'"><button class="btn btn-warning">Изменить</button></a></td>'.
                    '</tr>';
                $pupilsContent = $pupilsContent.$middle;
                $i++;
            }
            $pupilsContent = $pupilsContent.$e;
        }else{
            $pupilsContent = 'Empty';
        }
        return $pupilsContent;
    }

    public function getPupilsDetailUpdate($data){
        $pupilsContent = '
            <form class="pupilForm" action="/licey/admin/pupils" method="POST">
              <div class="form-group">
                <label for="name">Имя</label><br>
                <input type="hidden" name="type" value="pupilUpdate">
                <input type="hidden" name="id" value="'.$data->getId().'">
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="'.$data->getName().'">
              </div>
               <br>
              <div class="form-group">
                <label for="name">Класс</label><br>
                <select name = "class">
                    <option value="'.$data->getClass().'">'.$data->getClass().'</option>
                    <option value="9-A">9-класс "А"</option>
                    <option value="9-Б">9-класс "Б"</option>
                    <option value="9-В">9-класс "В"</option>
                    <option value="10-A">10-класс "А"</option>
                    <option value="10-Б">10-класс "Б"</option>
                    <option value="10-В">10-класс "В"</option>
                    <option value="10-Г">10-класс "Г"</option>
                    <option value="11-A">11-класс "А"</option>
                    <option value="11-Б">11-класс "Б"</option>
                    <option value="11-В">11-класс "В"</option>    
                    <option value="11-Г">11-класс "Г"</option>
                </select>
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
        ';

        return $pupilsContent;
    }

    function getNewsContent($data){

        if(count($data)===0){
            return '
                <div class="addWrapper">
                    <a href="/licey/admin/news?temp=addNewsForm"> <button class="btn btn-success">Добавить новости</button> </a>            
                </div>
            ';
        }

        $e = '</tbody></table> ';
        $newsContent = '
            <div class="addWrapper">
                <a href="/licey/admin/news?temp=addNewsForm"> <button class="btn btn-success">Добавить новости</button> </a>            
            </div>
            <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Тема</th>
                      <th scope="col">Текст</th>
                      <th scope="col">Фото</th> 
                      <th scope="col">Удалить</th>
                    </tr>
                  </thead>
                  <tbody';

        if(count($data)!==0){
            $middle='';
            $i=1;
            foreach ($data as $ob) {
                $middle='<tr></tr><th  scope="row">'.$i++.'</th>'.
                    '<td  scope="row">'.$ob->getTitle().'</td>'.
                    '<td  scope="row">'.$ob->getText().'</td>'.
                    '<td scope="row"><img class="teacher_image" src="data:image/jpeg;base64, '.$ob->getImage().'" alt=""></td>'.
                    '<td  scope="row"><a href="/licey/admin/news?temp=newsDelete&id='.$ob->getId().'"><button class="btn btn-danger">Удалить</button></a></td>'.
                    '</tr>';
                $newsContent = $newsContent.$middle;
            }
            $newsContent = $newsContent.$e;
        }else{
            $newsContent = 'Empty';
        }
        return $newsContent;
    }

    function getGalleryContent($data){

        $e = '</tbody></table> 
            <script type="text/javascript">
                let sizeBut = document.querySelector(".addPupilsSizeBut");
                let formsSize = document.querySelector(".formsSize"); 
                
                sizeBut.addEventListener("click", ()=>{
                    let paz = "/licey/admin/gallery?temp=addNewPhotoForms&size="+formsSize.value;
                    location.href = paz;
                })
            </script>
        ';
        $galleryContent = '
            <div class="getPupilSize">
                <label for="vod">Сколько картинок вы хотите добавить ?</label>
                <input type="number" id="vod" min="1" max="30" class=" form-control-number formsSize"> 
                <button class="btn btn-success addPupilsSizeBut">Добавить</button>
            </div>
            <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Тип</th>
                      <th scope="col">Фото</th>
                      <th scope="col">Удалить</th>
                    </tr>
                  </thead>
                  <tbody';

        if(count($data)!==0){
            $middle='';
            $i=1;
            foreach ($data as $ob) {
                $middle='<tr></tr><th  scope="row">'.$i.'</th>'.
                    '<td  scope="row">'.$ob->getType().'</td>'.
                    '<td scope="row"><img class="teacher_image" src="data:image/jpeg;base64, '.$ob->getImage().'" alt=""></td>'.
                    '<td  scope="row"><a href="/licey/admin/gallery?temp=deleteImage&id='.$ob->getId().'"><button class="btn btn-danger">Удалить</button></a></td>'.
                    '</tr>';
                $galleryContent = $galleryContent.$middle;
                $i++;
            }
            $galleryContent = $galleryContent.$e;
        }else{
            $galleryContent = '
                    <div class="getPupilSize">
                        <label for="vod">Сколько картинок вы хотите добавить ?</label>
                        <input type="number" id="vod" min="1" max="30" class=" form-control-number formsSize"> 
                        <button class="btn btn-success addPupilsSizeBut">Добавить</button>
                    </div>
                    Empty
                    <script type="text/javascript">
                        let sizeBut = document.querySelector(".addPupilsSizeBut");
                        let formsSize = document.querySelector(".formsSize"); 
                        
                        sizeBut.addEventListener("click", ()=>{
                            let paz = "/licey/admin/gallery?temp=addNewPhotoForms&size="+formsSize.value;
                            location.href = paz;
                        })
                    </script>
            ';
        }
        return $galleryContent;
    }

    function getAppraisalContent($data){
        $htmlContent='';
        $up = '
            <div class="list-group appraisalListClasses">
              <li class="list-group-item list-group-item-action active">Классы</li>
        ';
        $middle='';

        if(count($data)!=0){
            foreach ($data as $ob){
                $middle = $middle.'<a href="/licey/admin/appraisal?temp=someClass&detail='.$ob->getName().'" class="list-group-item list-group-item-action list-group-item-secondary">'.$ob->getFullName().'</a>';
            }
        }
        $htmlContent .= $up;
        $htmlContent.=$middle;
        $htmlContent.='</div>';
        return $htmlContent;
    }

    //----------------------------------------------Add pupil contents-----------------------------

    function addNewPupilsForm($s, $data){

        $classSelect='';

        foreach ($data as $ob){
            $classSelect .= '<option value="'.$ob->getName().'">'.$ob->getFullName().'</option>';
        }

        if($s == ''){
            $s = 1;
        }
        $middle = '';
        $pupilsContent = '
            <form class="pupilForm" action="/licey/admin/pupils" method="POST">
              <div class="form-group">
                <input type="hidden" name="type" value="addNewPupils">
              </div>  ';
        $end = '
              <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        ';

        for($i=0; $i<$s; $i++){
            $middle.='
                <div>№ '.($i+1).'</div>               
                <div class="form-group">
                <input type="text" class="form-control" id="name" name="name[]" aria-describedby="emailHelp" placeholder="Имя Фамилия">
                
                <label for="name">Класс:</label>
                <select name = "class[]">
                '.$classSelect.'
                </select>
              </div> <br>';

        }
        $pupilsContent .= $middle;
        $pupilsContent.=$end;

        return $pupilsContent;
    }
    //---------------------------------------------Add news content--------------------------------
    function addNewsFormContent(){
        $pageContent ='
            <form class="form-control pupilForm" action="/licey/admin/news" method="post" enctype="multipart/form-data">
                <div class="form-control">
                    <lable for="title">Тема</lable>
                    <input type="text" id="title" name="title">
                    <input type="hidden" name="type" value="addNewNews">
                </div><br>
                <div class="form-control">
                    <lable for="text">Text</lable>
                    <textarea cols="60" rows="10" id="text" name="text"></textarea>
                </div><br>
                <div class="form-control">
                    <lable for="file">Картинка</lable>
                    <input type="file" id="file" name="file">
                </div><br>
                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        ';
        return $pageContent;
    }
    //---------------------------------------------Add gallery content--------------------------------
    function galleryForms($s){
        if($s==''){
            $s=1;
        }
        $pageContent = '
            
            <form class="pupilForm" action="/licey/admin/gallery" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="hidden" name="type" value="addGalleryPhoto">
              </div>  ';

        $middle = '';
        $end ='
              <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        ';
        for($i=0; $i<$s; $i++){
            $middle.='
                <div>№ '.($i+1).'</div>               
                <div class="form-group">
                <input type="file" class="form-control" name="imageFile[]">
                
                <label for="name">Тип:</label>
                <select name = "imageType[]">
                    <option value="1-Сентябрь">1-Сентябрь</option>
                    <option value="Научно творческая конференция">Научно творческая конференция</option>
                    <option value="День учителя">День учителя</option>
                    <option value="Суботники">Суботники</option>
                    <option value="Детский дом">Детский дом</option>
                    <option value="Новый год">Новый год</option>
                    <option value="23-февраль">23-февраль</option>
                    <option value="8-марта">8-марта</option>
                    <option value="Профориентация">Профориентация</option>
                    <option value="Нооруз">Нооруз</option>
                    <option value="День победы">День победы</option>
                    <option value="Последний званок">Последний званок</option>
                    <option value="Выпускной вечер">Выпускной вечер</option>
                </select>
              </div> <br>';
        }
        $pageContent .= $middle;
        $pageContent.=$end;
        return $pageContent;
    }

    //--------------------------------------------Appraisal get classes-----------------------------
    function getClassPupils($data, $cl){
        if(count($data)===0){
            return ' 
            <div class="backPage"><a href="/licey/admin/appraisal"><button class="btn btn-primary">< Назад</button></a></div>
            Учеников еще не добавили !
            ';
        }
        $htmlContent='
            <div class="backPage"><a href="/licey/admin/appraisal"><button class="btn btn-primary">< Назад</button></a></div>
        ';
        $up = '
            <div class="list-group appraisalListClasses">
              <li class="list-group-item list-group-item-action active">'.$data[0]->getClass().'</li>
        ';
        $middle='';

        if(count($data)!=0){
            foreach ($data as $ob){
                $middle = $middle.'<a href="/licey/admin/appraisal?temp=somePupil&detail='.$ob->getName().'&cl='.$cl.'" class="list-group-item list-group-item-action list-group-item-secondary">'.$ob->getName()." / ".$ob->getClass().'</a>';
            }
        }
        $htmlContent .= $up;
        $htmlContent.=$middle;
        $htmlContent.='</div>';
        return $htmlContent;
    }

    function showPupilAppraisal($data, $name, $cl){
        if(count($data)===0){
            return '
                <div class="addWrapper">
                    <a href="/licey/admin/appraisal?temp=appraisalForm&pupil_name='.$name.'"> <button class="btn btn-success">Поставить оценки</button> </a>            
                </div>
                <div class="backPage"><a href="/licey/admin/appraisal?temp=someClass&detail='.$cl.'"><button class="btn btn-primary">< Назад</button></a></div>
                <div class="appraisalTablePupilName">'.$name.'</div>
                <div>У этого ученика нет оценок на базе!</div>
            ';
        }
        $htmlContent = '
            <div class="addWrapper">
                <a href="/licey/admin/appraisal?temp=appraisalForm&pupil_name='.$name.'"> <button class="btn btn-success">Поставить оценки</button> </a>            
            </div>
            <div class="backPage"><a href="/licey/admin/appraisal?temp=someClass&detail='.$cl.'"><button class="btn btn-primary">< Назад</button></a></div>
            <div class="appraisalTablePupilName">'.$name.'</div>
            <table class="table appraisalTable">
              <thead class="thead-inverse">
                <tr>
                  <th>Экзмены</th>
                  <th>Кыр.я</th>
                  <th>Кыр.а</th>
                  <th>Рус.я</th>
                  <th>Рус.л</th>
                  <th>Анг.я</th>
                  <th>Хим</th>
                  <th>Физ</th>
                  <th>Ист</th>
                  <th>ОИВТ</th>
                  <th>Геом</th>
                  <th>Алг</th>
                  <th>ДПМ</th>
                  <th>Чер</th>
                  <th>Псих</th>
                  <th>Эканом</th>
                  <th>Геогр</th>
                  <th>Астр</th>
                  <th>Изменить</th>
                  <th>Удалить</th>    
                </tr>
              </thead>
              <tbody>
        ';
        $end  = '</tbody>
            </table>
        ';
        $middle='';
        foreach ($data as $ob){
            $middle .= '<tr>              
                  <td>'.$ob->getExamName().'</td>
                  <td>'.$ob->getKyrgyzLan().'</td>
                  <td>'.$ob->getKyrgyzLit().'</td>
                  <td>'.$ob->getRussianLan().'</td>
                  <td>'.$ob->getRussianLit().'</td>
                  <td>'.$ob->getEnglish().'</td>
                  <td>'.$ob->getChemistry().'</td>
                  <td>'.$ob->getPhisics().'</td>
                  <td>'.$ob->getHistory().'</td>
                  <td>'.$ob->getComputerSience().'</td>
                  <td>'.$ob->getGeometry().'</td>
                  <td>'.$ob->getAlgebra().'</td>
                  <td>'.$ob->getDpm().'</td>
                  <td>'.$ob->getDrawing().'</td>
                  <td>'.$ob->getHumanSociety().'</td>
                  <td>'.$ob->getEconomy().'</td>
                  <td>'.$ob->getGeography().'</td>
                  <td>'.$ob->getAstronomy().'</td>
                  <td><a href="/licey/admin/appraisal?temp=updateSomeExamAppraisalForm&name='.$ob->getName().'&examName='.$ob->getExamName().'"><button class="btn btn-warning">Изм</button></a></td>
                  <td><a href="/licey/admin/appraisal?temp=deleteSomeExamAppraisal&name='.$ob->getName().'&examName='.$ob->getExamName().'&cl='.$cl.'"><button class="btn btn-danger">Уд</button></a></td>
                
                </tr>';
        }

        $htmlContent.=$middle;
        $htmlContent.=$end;

        return $htmlContent;
    }
    //--------------------------------------------Appraisal form----------------------------------
    function appraisalForm($userData, $examNames){
        $examNamesSelector='';
        foreach ($examNames as $ob){
            $examNamesSelector.='<option value="'.$ob->getName().'">'.$ob->getFullName().'</option>';
        }

        $examLessonsName = ['k_lan','k_lit','r_lan', 'r_lit','eng', 'chem', 'phis','his', 'com_s','geom','alg','dpm', 'draw', 'hum_s', 'economy', 'geog', 'astr'];
        $examLessonsFullName = ['Кыргыз-тили','Кыргыз-адабияты','Русский язык', 'Литература','English', 'Химия',
            'Физика','История', 'Информатика (ОИВТ)','Геометрия','Алгебра','ДПМ', 'Черчения', 'Психология', 'Эканомика', 'География', 'Астрономия'];
        $examAppraisalInput='';
        $i=0;
        foreach ($examLessonsName as $val) {
            $examAppraisalInput .= '
                <div class="form-group form-control">
                <label for="exampleFormControlSelect1">'.$examLessonsFullName[$i++].'</label>
                <select class="form-control" id="exampleFormControlSelect1" name="'.$val.'">
                  <option value="0">0</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div><br>
            ';
        }

        $htmlContent = '
            <form class="form-control apprasalAddingForm" action="/licey/admin/appraisal" method="post">
                <input type="hidden" name="type" value="appraisalAdding">
              <div class="form-group form-control">
                <label >Имя Фамилия</label>
                <input class="form-control" type="hidden" name="pupilName" value="'.$userData->getName().'"> 
                <input class="form-control"  value="'.$userData->getName().'" disabled>              
              </div><br>
              <div class="form-group form-control">
                <label >Класс</label>
                <input class="form-control" type="hidden" name="pupilClass" value="'.$userData->getClass().'">  
                <input class="form-control" value="'.$userData->getClass().'" disabled>              
              </div><br>
              <div class="form-group form-control">
                <label for="exampleFormControlSelect1">Выберите экзамен</label>
                <select class="form-control" id="exampleFormControlSelect1" name="examName">
                  '.$examNamesSelector.'
                </select>
              </div><br>
              '.$examAppraisalInput.'
              <div class="form-group form-control">
                <button type="submit" class="btn btn-success">Добавить</button>
              </div>
            </form>
        ';

        return $htmlContent;
    }

    //---------------------------------------------Appraisal update form--------------------------
    function appraisalUpdateForm($pupilName, $data, $examData){
        $d=[];
        $i=0;
        foreach ($data as $kay=>$value){
            if($i>1){
                array_push($d, $value);
            }
            $i++;
        }

        $examLessonsName = ['k_lan','k_lit','r_lan', 'r_lit','eng', 'chem', 'phis','his', 'com_s','geom','alg','dpm', 'draw', 'hum_s', 'economy', 'geog', 'astr'];
        $examLessonsFullName = ['Кыргыз-тили','Кыргыз-адабияты','Русский язык', 'Литература','English', 'Химия',
            'Физика','История', 'Информатика (ОИВТ)','Геометрия','Алгебра','ДПМ', 'Черчения', 'Психология', 'Эканомика', 'География', 'Астрономия'];
        $examAppraisalInput='';
        $i=0;
        foreach ($examLessonsName as $val) {
            $examAppraisalInput .= '
                <div class="form-group form-control">
                <label for="exampleFormControlSelect1">'.$examLessonsFullName[$i++].'</label>
                <select class="form-control" id="exampleFormControlSelect1" name="'.$val.'">
                  <option value="'.$d[$i].'">'.$d[$i].'</option>
                  <option value="0">0</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div><br>
            ';
        }

        $htmlContent = '
            <form class="form-control apprasalAddingForm" action="/licey/admin/appraisal" method="post">
                <input type="hidden" name="type" value="updateSomeExamAppraisal">
              <div class="form-group form-control">
                <label >Имя Фамилия</label>
                <input class="form-control" type="hidden" name="pupilName" value="'.$pupilName.'"> 
                <input class="form-control"  value="'.$pupilName.'" disabled>              
              </div><br>
              <div class="form-group form-control">
                <label >Класс</label>
                <input class="form-control" type="hidden" name="pupilClass" value="'.$data['name1'].'">  
                <input class="form-control" value="'.$data['name1'].'" disabled>              
              </div><br>
              <div class="form-group form-control">
                <label for="exampleFormControlSelect1">Выберите экзамен</label>
                <input class="form-control" type="hidden" name="exam_name" value="'.$examData['name'].'">  
                <input class="form-control" value="'.$examData['fullName'].'" disabled> 
                 
              </div><br>
              '.$examAppraisalInput.'
              <div class="form-group form-control">
                <button type="submit" class="btn btn-success">Изменить</button>
              </div>
            </form>
        ';

        return $htmlContent;
    }
}

