<?php
   include_once("view.php");
   require_once("madel/madel.php");

   class Controller{
      private $view;
      private $madel;
      function __construct(){
         $this->view = new View();
         $this->madel = new Madel();
      }

      function printPage($url, $get_list){
         switch ($url) {
            case '':
               $this->view->getMainContent($this->madel->getMainContentNews(), $this->madel->getMainContentGalery());
               break;
            case 'main':
               $this->view->getMainContent($this->madel->getMainContentNews(), $this->madel->getMainContentGalery());
               break;
            case 'aboutus':
               $this->view->getAboutUsContent($this->madel->getTeachers());
               break;
            case 'news':
               $this->view->getNewsContent($this->madel->getNews());
               break;
            case 'parents':
               $this->view->getForParentsContent();
               break;
            case 'galery':
               $this->view->getGaleryContent($this->madel->getGallery());
               break;
             case 'subGallery':
                $type = '';
                if(isset($get_list['type'])){
                    $type = $get_list['type'];
                }
                $this->view->getSubGalleryContent($this->madel->getGalleryByType($type), $type);
                break;
            case 'profile':
                $id = null;
                if(isset($get_list['id'])){
                    $id=$get_list['id'];
                }
                $name = '';
                if(isset($get_list['name'])){
                    $name=$get_list['name'];
                }
               $this->view->getProfile($this->madel->getStudentInfo($id, $name),$this->madel->getStudentOrtInfo($name), $name);
               break;
            case 'new-info':
               $this->view->getNewInfo();
               break;
            case 'appraisal':
                $this->view->getStudentsList($this->madel->getStudentList());
               break;
            default:
               echo "Not";
               break;
         }
      }
      
   };