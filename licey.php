<?php
    session_start();
        $adm = 'admin';
        $adminPass = 'admin123';

        if(isset($_SESSION['isAdmin'])&&isset($_SESSION['expire'])){
            if($_SESSION['isAdmin']===true){
                $now = time();
                if($_SESSION['expire']<$now){
                    session_destroy();
                }
            }
        }


   require_once("./src/controller.php");
   require_once('./src/authorizationController.php');
   require_once('./src/adminController.php');
    require_once('./src/teachersController.php');
    require_once('./src/pupilsController.php');
    require_once('./src/newsController.php');
    require_once('./src/galleryController.php');
    require_once('./src/appraisalController.php');

   $controller = new Controller();
   $authorization = new AuthorizationController();


   $url = '';
    $len = 0;
   if(isset($_REQUEST['url'])){
      $url =  $_REQUEST["url"];
      $list = explode('/', $url);
      $len = count($list);
   }


   $get_list=['type'=>''];

   if(isset($_GET)){
      $get_list = $_GET;
   }


   if($url === 'authorization'){
       $authorization->printPage();
   }else if($url === 'volidation'){
       if(isset($_SESSION) && isset($_POST)){
           $name = '';
           $pass = '';
           if(isset($_POST['name']) && isset($_POST['password'])){
               $name = $_POST['name'];
               $pass = $_POST['password'];
           }
           if($adm == $name && $adminPass == $pass){
               $_SESSION['isAdmin'] = true;
               $_SESSION['expire'] = time()+(8*60*60);
               header('Location: /licey/admin');
           }else{
               header('Location: /licey/authorization');
           }
       }
   }else if($len >=2 || $url === 'admin'){
       if(isset($_SESSION['isAdmin'])){
           if($_SESSION['isAdmin'] !== true){
               header('Location: /licey/authorization');
           }
       }else{
           header('Location: /licey/authorization');
       }

       $adminController = new AdminController();

       switch ($url){
           case 'admin':
               $adminController->printPage();
               break;
           case 'admin/teachers':
               $temp = '';
               if(isset($_GET['teacher_id'])){
                   $temp = $_GET['teacher_id'];
               }else if(isset($_POST['type'])){
                   if($_POST['type']==='teacherDetail'){
                       $temp = $_POST['type'];
                   }
               }
               $teacherController = new TeacherController();
                $teacherController->printPage($temp);
               break;
           case 'admin/pupils':
               $temp = '';
               if(isset($_GET['temp'])){
                   $temp = $_GET['temp'];
               }else if(isset($_POST['type'])){
                   $temp = $_POST['type'];
               }
               $pupilController = new PupilsController();
               $pupilController->getPage($temp);
               break;
           case 'admin/news':
               $temp = '';
               if(isset($_GET['temp'])){
                   $temp = $_GET['temp'];
               }else if(isset($_POST['type'])){
                   $temp = $_POST['type'];
               }
               $newsController = new NewsController();
                $newsController->getPage($temp);
               break;
           case 'admin/gallery':
               $temp = '';
               if(isset($_GET['temp'])){
                   $temp = $_GET['temp'];
               }else if(isset($_POST['type'])){
                   $temp = $_POST['type'];
               }
                $galleryController = new GalleryController();
                $galleryController->getPage($temp);
               break;
           case 'admin/appraisal':
               $temp = '';
               if(isset($_GET['temp'])){
                   $temp = $_GET['temp'];
               }else if(isset($_POST['type'])){
                   $temp = $_POST['type'];
               }
                $appraisalController = new AppraisalController();
                $appraisalController->getPage($temp);
               break;
           default:  echo "end"; break;
       }
   }else{
       $controller->printPage($url, $get_list);
   }

