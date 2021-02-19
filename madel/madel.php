<?php
   require_once("madel/routes.php");

   class Teacher{
      public $id;
      public $name;
      public $position;
      public $lesson;
      public $staj;
      public $tel;
      public $classroom;   
      public $more_info;
      public $image;

      function __construct($i,$n,$p,$l,$s,$t,$c,$m,$im){
         $this->id = $i;
         $this->name = $n;
         $this->position = $p;
         $this->lesson = $l;
         $this->staj = $s;
         $this->tel = $t;
         $this->classroom = $c;
         $this->more_info = $m;
         $this->image = base64_encode($im);
      }

   }

   class Licey_news{
      public $id;
      public $title;
      public $text;
      public $image;

      function __construct($id, $title, $text, $image){
         $this->id = $id;
         $this->title = $title;
         $this->text = $text;
         $this->image = base64_encode($image);
      }
   }

   class Image{
      public $id;
      public $type;
      public $image;

      function __construct($id, $type, $image){
         $this->id = $id;
         $this->type = $type;
         $this->image = base64_encode($image);
      }
   }

   class Madel{
      private $arr;
      private $routes;
      private $mysqli;
      public $galeryTitles = ['1-Сентябрь', 'Научно творческая конференция', "День учителя", "Суботники", "Детский дом", "Новый год", "23-февраль", "8-марта", "Профориентация", 'Нооруз', "День победы", "Последний званок", "Выпускной вечер"];
      function __construct(){
         $this->routes = new Routes();
         $this->arr = array();
      }

      function putConectionDb(){
         try {
            $this->mysqli = new mysqli($this->routes->getUrl(), $this->routes->getName(), $this->routes->getPassword(), $this->routes->getBdName());
         } catch (Exception $e) {
               echo $e->getMessage();
               die();
         }
      }

      function getMainContentNews(){ 
         $this->putConectionDb();
         $res = $this->mysqli->query("SELECT * FROM news LIMIT 3");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               $temp = new Licey_news($row['id'],$row['title'],$row['text'],$row['image']);
               array_push($this->arr, $temp);
             }
         }
         return $this->arr;
         $this->mysqli->close();
      } 

      function getMainContentGalery(){ 
         $this->putConectionDb();
         foreach (['Научно творческая конференция', "День учителя", "Суботники"] as $v) {
            $res = $this->mysqli->query("SELECT * FROM `gallery` WHERE `type` = '$v' LIMIT 3");
            if($res->num_rows > 0){
               while($row = $res->fetch_assoc()) {
                  $temp = new Image($row['id'],$row['type'],$row['image']);
                  array_push($this->arr, $temp);
               }
            }
         }
         return $this->arr;
         $this->mysqli->close();
      } 

      function getNews(){ 
         $this->putConectionDb();
         $res = $this->mysqli->query("SELECT * FROM news");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               $temp = new Licey_news($row['id'],$row['title'],$row['text'],$row['image']);
               array_push($this->arr, $temp);
             }
         }
         return $this->arr;
         $this->mysqli->close();
      } 

      function getGallery(){
         $this->putConectionDb();
         foreach ($this->galeryTitles as $v) {
            $res = $this->mysqli->query("SELECT * FROM `gallery` WHERE `type` = '$v' LIMIT 3");
            if($res->num_rows > 0){
               while($row = $res->fetch_assoc()) {
                  $temp = new Image($row['id'],$row['type'],$row['image']);
                  array_push($this->arr, $temp);
               }
            }
         }
         return $this->arr;
         $this->mysqli->close();
      }

      function getGalleryByType($type){
          $this->putConectionDb();
          if($type != ""){
              $key = array_search($type, $this->galeryTitles);
              unset($this->galeryTitles[$key]);
              $res = $this->mysqli->query("SELECT * FROM gallery WHERE `type` = '$type'");
              if($res->num_rows > 0){
                  while($row = $res->fetch_assoc()) {
                      $temp = new Image($row['id'],$row['type'],$row['image']);
                      array_push($this->arr, $temp);
                  }
              }
          }
          return $this->arr;
          $this->mysqli->close();
      }

      function getTeachers(){
         $this->putConectionDb();
         $res = $this->mysqli->query("SELECT * FROM teachers");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               $temp = new Teacher($row['id'],$row['name'],$row['position'],$row['lesson'],$row['experience'],$row['telephon'],$row['classroom'],$row['more_info'],$row['image']);
               array_push($this->arr, $temp);
             }
         }
         return $this->arr;
         $this->mysqli->close();
      } 

      function getStudentList(){
         $studentList = [];
         $this->putConectionDb();
         $res = $this->mysqli->query("SELECT * FROM students");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($studentList, $row);
             }
         }
         return $studentList;
         $this->mysqli->close();
      } 

      function getStudentInfo($s_id, $s_name){
         $list = [];
         $this->putConectionDb();
         $res = $this->mysqli->query("SELECT *   FROM zeroattestationresults  WHERE `name1` ='$s_name' and class1 = (SELECT class FROM students WHERE `name` = '$s_name')");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($list, $row);
             }
         }else{
            array_push($list, []);
         }
         $res = $this->mysqli->query("SELECT *   FROM quarter_1  WHERE `name1` = ='$s_name' and class1 = (SELECT class FROM students WHERE `name` = '$s_name')");

         if($res){
             if( $res->num_rows > 0){
                 while($row = $res->fetch_assoc()) {
                     array_push($list, $row);
                 }
             }else{
                 array_push($list, []);
             }
         }

         $res = $this->mysqli->query("SELECT *   FROM quarter_2   WHERE name1 = '$s_name' and class1 = (SELECT class FROM students WHERE `name` = '$s_name')");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($list, $row);
             }
         }else{
            array_push($list, []);
         }
         $res = $this->mysqli->query("SELECT *   FROM srs  WHERE name1 = '$s_name' and class1 = (SELECT class FROM students WHERE `name` = '$s_name')");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($list, $row);
             }
         }else{
            array_push($list, []);
         }
         $res = $this->mysqli->query("SELECT *   FROM quarter_3  WHERE name1 = '$s_name' and class1 = (SELECT class FROM students WHERE `name` = '$s_name')");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($list, $row);
             }
         }else{
            array_push($list, []);
         }
         $res = $this->mysqli->query("SELECT *   FROM quarter_4  WHERE name1 = '$s_name' and class1 = (SELECT class FROM students WHERE `name` = '$s_name')");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($list, $row);
             }
         }else{
            array_push($list, []);
         }
         $res = $this->mysqli->query("SELECT *   FROM year_point  WHERE name1 = '$s_name' and class1 = (SELECT class FROM students WHERE `name` = '$s_name')");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($list, $row);
             }
         }else{
            array_push($list, []);
         }
         return $list;
         $this->mysqli->close();
      }

      function getStudentOrtInfo( $s_name){
         $list = [];
         $this->putConectionDb();
         $res = $this->mysqli->query("SELECT *   FROM main_ort  WHERE `name1`='$s_name' and class1 = (SELECT class FROM students WHERE `name`='$s_name')");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($list, $row);
             }
         }else{
            array_push($list, []);
         }
         $res = $this->mysqli->query("SELECT *   FROM ort_1  WHERE `name1`='$s_name' and class1 = (SELECT class FROM students WHERE `name`='$s_name')");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($list, $row);
             }
         }else{
            array_push($list, []);
         }
         $res = $this->mysqli->query("SELECT *   FROM ort_2  WHERE `name1`='$s_name' and class1 = (SELECT class FROM students WHERE `name`='$s_name')");
         if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
               array_push($list, $row);
             }
         }else{
            array_push($list, []);
         }
         return $list;
         $this->mysqli->close();
      }

   }
   
?>