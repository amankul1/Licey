<?php

class PupilsEntity{
    private $id;
    private $name;
    private $class;

    //-------------getters----------------
    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
    function getClass(){
        return $this->class;
    }

    //----------------setters----------------
    function setId($id){
        return $this->id = $id;
    }
    function setName($name){
        return $this->name = $name;
    }
    function setClass($class){
        $this->class = $class;
    }
}