<?php
   class Routes{
      private $url;
      private $name;
      private $password;
      private $bd_name;

      function __construct(){
         $this->url = "localhost";
         $this->name = "root";
         $this->password = "";
         $this->bd_name = "admin_base";
      }

      function getUrl(){
         return $this->url;
      }
      function getName(){
         return $this->name;
      }
      function getPassword(){
         return $this->password;
      }
      function getBdName(){
         return $this->bd_name;
      }

      
   }