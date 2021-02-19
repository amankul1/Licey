<?php

class Profile{
   private $exam_names = ['Нулевая от-я', '1 чертверть', '2 четверть', 'Срс', '3 четверть', '4 четверть', 'Год. оценка'];
   private $ort_list = ['1-проб. ОРТ','2-проб. ОРТ','ОРТ'];
   private $exam = [];
   private $ort = [];
   function __construct(){
      
   }

   function showPerformence($ob1, $ob2){
      $this->exam = $ob1;
      $this->ort = $ob2;
      ?>
         <div class="title">Оценки экзаменов</div>
         <table >
            <tr>
               <th>Экзамены</th>
               <th>Кыр-т</th>
               <th>Кыр-ад</th>
               <th>Русc-я</th>
               <th>Лит-а</th>
               <th>Eng</th>
               <th>Химия</th>
               <th>Физика</th>
               <th>История</th>
               <th>ОИВТ</th>
               <th>Геом-я</th>
               <th>Алгебра</th>
               <th>ДПМ</th>
               <th>Чер-я</th>
               <th>Псих-я</th>
               <th>Экон-а</th>
               <th>Гоегр-я</th>
               <th>Астр-я</th>
            </tr>

            <?php
               for ($i=0; $i < count($this->exam); $i++){ 
                  if($this->exam[$i]){
                     
                     ?>
                     <tr>
                        <td><?=$this->exam_names[$i]?></td>
                        <td><?=$this->exam[$i]['kyrgyz_lan']?></td>
                        <td><?=$this->exam[$i]['kyrgyz_lit']?></td>
                        <td><?=$this->exam[$i]['russian_lan']?></td>
                        <td><?=$this->exam[$i]['russian_lit']?></td>
                        <td><?=$this->exam[$i]['english']?></td>
                        <td><?=$this->exam[$i]['chemistry']?></td>
                        <td><?=$this->exam[$i]['physics']?></td>
                        <td><?=$this->exam[$i]['history']?></td>
                        <td><?=$this->exam[$i]['computer_science']?></td>
                        <td><?=$this->exam[$i]['geometry']?></td>
                        <td><?=$this->exam[$i]['algebra']?></td>
                        <td><?=$this->exam[$i]['dpm']?></td>
                        <td><?=$this->exam[$i]['drawing']?></td>
                        <td><?=$this->exam[$i]['human_society']?></td>
                        <td><?=$this->exam[$i]['economy']?></td>
                        <td><?=$this->exam[$i]['geography']?></td>
                        <td><?=$this->exam[$i]['astronomy']?></td>
                     </tr>
                  <?php
                  }
               }
            ?>

         </table>
         <div class="title">Баллы ОРТ</div>
         <table>
            <tr>
               <th>Экзамены</th>
               <th>Кыр-т</th>  
               <th>Русc-я</th>
               <th>Eng</th>
               <th>Химия</th>
               <th>Физика</th>
               <th>История</th>
               <th>Матем-а</th>
               <th>Общий бал</th>
            </tr>

            <?php
               for ($i=0; $i < count($this->ort); $i++){ 
                  if($this->ort[$i]){
                     
                     ?>
                     <tr>
                        <td><?=$this->ort_list[$i]?></td>
                        <td><?=$this->ort[$i]['kyrgyz_lan']?></td>
                        <td><?=$this->ort[$i]['russian_lan']?></td>
                        <td><?=$this->ort[$i]['english']?></td>
                        <td><?=$this->ort[$i]['chemistry']?></td>
                        <td><?=$this->ort[$i]['physics']?></td>
                        <td><?=$this->ort[$i]['history']?></td>
                        <td><?=$this->ort[$i]['math']?></td>
                        <td><?=$this->ort[$i]['main_point']?></td>
                     </tr>
                  <?php
                  }
               }
            ?>

         </table>
      <?php
   }

   function getInfo(){

   }
   
   function getContext($student, $ort, $s_name){
      ?>
         <!DOCTYPE html>
         <html lang="en">
         <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Личный кабинет ученика</title>
            <link rel="stylesheet" href="public/css/profile.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"
         </head>
         <body>
            <?php
               if($student){
                  ?>
                     <div class="leftBlock">
                         <div class="back"> < Назад </div>
                        <div class="studentLessons">
                           <div class="aboutStudent"><img src="public/image/student/male.png" alt=""></div>
                           <div class="aboutStudent"><?= $s_name ?></div>
                        </div>
                     </div>
                     <div class="rightBlock">

                        <?php
                           $this->showPerformence($student, $ort);
                        ?>
                     </div>
                  <?php
               }else{
                  echo "Вы еще не здавали ни одного экзамена (";
               }
            ?>
         <script type="text/javascript">
             let back = document.querySelector('.back');
             back.addEventListener('click', ()=>{
                 location.href = 'appraisal';
             })
         </script>
         </body>
         </html>
      <?php
   }
}

?>
