<?php

class TeachersEntity{

    private $id;
    private $name;
    private $position;
    private $lesson;
    private $classroom;
    private $telephon;
    private $experience;
    private $moreInfo;
    private $image;

    function __construct(){}

    //------------------------------getters
    function  getId(){
        return $this->id;
    }
    function  getName(){
        return $this->name;
    }
    function  getPosition(){
        return $this->position;
    }
    function  getLesson(){
        return $this->lesson;
    }
    function  getClassroom(){
        return $this->classroom;
    }
    function  getTelephon(){
        return $this->telephon;
    }
    function  getExperience(){
        return $this->experience;
    }
    function  getMoreInfo(){
        return $this->moreInfo;
    }
    function  getImage(){
        return $this->image;
    }

    //----------------------------setters---------------------

    function setId($id){
        $this->id = $id;
    }
    function setName($name){
        $this->name = $name;
    }
        function setPosition($position){
        $this->position = $position;
    }
    function setLesson($lesson){
        $this->lesson = $lesson;
    }
    function setClassroom($classroom){
        $this->classroom = $classroom;
    }
    function setTelephon($tel){
        $this->telephon = $tel;
    }
    function setExperience($ex){
        $this->experience = $ex;
    }
    function setMoreInfo($m_i){
        $this->moreInfo = $m_i;
    }
    function setImage($image){
        $this->image = base64_encode($image);
    }

}