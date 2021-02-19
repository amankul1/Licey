<?php

class AuthorizationController{
    public function __construct(){
    }

    function printPage(){
        require_once('public/template/authorization/index.php');

        getHtml();

    }
}