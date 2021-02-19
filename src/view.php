<?php
   require_once("public/template/header.php");
   require_once("public/template/mainContent.php");
   require_once("public/template/menu.php");
   require_once("public/template/subManu.php");
   require_once("public/template/aboutUsContent.php");
   require_once("public/template/footer.php");
   require_once("public/template/forParentsAndStudents.php");
   require_once("public/template/galeryContent.php");
   require_once("public/template/newsContent.php");
   require_once("public/template/profile.php");
   require_once("public/template/students.php");
   require_once("public/template/newsInfo.php");
   require_once("public/template/subGallery.php");

   class View{
      private $menu;
      private $subMenu;
      private $aboutUs;
      private $news;
      private $galery;
      private $forParrents;
      private $footer;
      private $header;
      private $mainContent;
      private $profile;
      private $students;
      private $newInfo;
      private $subGallery;

      function __construct(){
         
      }

      function getMainContent($list1, $list2){
         $this->menu = new Menu();
         $this->header = new Header();
         $this->mainContent = new MainContent();
         $this->footer = new Footer();
         $this->header->setMenu($this->menu);
         $this->mainContent->setHtmlBlocks($this->header,$this->footer);
         $this->mainContent->getContext($list1, $list2);
      }

      function getAboutUsContent($list){
         $this->aboutUs = new AboutUs();
         $this->menu = new Menu();
         $this->subMenu = new SubMenu();
         $this->footer = new Footer();
         $this->aboutUs->setHtmlBlocks($this->menu, $this->subMenu, $this->footer);
         $this->aboutUs->getContext($list);
      }

      function getNewsContent($list){
         $this->news = new News($list);
         $this->menu = new Menu();
         $this->subMenu = new SubMenu();
         $this->footer = new Footer();
         $this->news->setHtmlBlocks($this->menu, $this->subMenu, $this->footer);
         $this->news->getContext();
      }

      function getGaleryContent($list){
         $this->galery = new GaleryContent($list);
         $this->menu = new Menu();
         $this->subMenu = new SubMenu();
         $this->footer = new Footer();
         $this->galery->setHtmlBlocks($this->menu, $this->subMenu, $this->footer);
         $this->galery->getContext();
      }

      function getForParentsContent(){
         $this->forParrents = new ForParentsAndStudents();
         $this->menu = new Menu();
         $this->subMenu = new SubMenu();
         $this->footer = new Footer();
         $this->forParrents->setHtmlBlocks($this->menu, $this->subMenu, $this->footer);
         $this->forParrents->getContext();
      }

      function getProfile($ob1, $ob2, $name){
         $this->profile = new Profile();
         $this->profile->getContext($ob1, $ob2, $name);
      }

      function getStudentsList($list1){
         $this->students = new Students($list1);
         $this->students->getContext();
      }

      function getNewInfo (){
         $this->newInfo = new NewInfo();
         $this->newInfo->getContext();
      }

      function getSubGalleryContent($list, $type){
          $this->subGallery = new SubGallery();
          $this->subGallery->getContent($list, $type);
      }
      
   }