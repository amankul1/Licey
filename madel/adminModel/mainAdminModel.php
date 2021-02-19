<?php

abstract class  MainAdminModel{
    private $dbData = ['url'=>'localhost','userName'=>'root', 'password'=>'', 'dbName'=>'admin_base' ];
    private $mysqli;

    public function __construct(){}

    protected function connectionDB(){
        $this->mysqli = new mysqli($this->dbData['url'], $this->dbData['userName'],$this->dbData['password'],$this->dbData['dbName']);
        if($this->mysqli->connect_errno){
            die($this->mysqli->connect_errno);
        }
        return $this->mysqli;
    }

}