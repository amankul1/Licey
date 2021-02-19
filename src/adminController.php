<?php
require_once ('adminView.php');

class AdminController{
    private $adminView;
    private $content;

    function __construct(){
        $this->adminView = new AdminView();
    }

    function printPage(){
        $this->content = '<h1> Welcome to admin panel </h1>';

        $this->adminView->getMainPage($this->content);
    }
}