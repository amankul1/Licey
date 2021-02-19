<?php

class Classes{
    private $id;
    private $name;
    private $fullName;
    function __construct(){}

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getFullName(){
        return $this->fullName;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setFullName($fullName){
        $this->fullName = $fullName;
    }

}