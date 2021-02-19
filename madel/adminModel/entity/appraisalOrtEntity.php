<?php


class AppraisalOrtEntity{
    private $id;
    private $name;
    private $class;
    private $kyrgyz_lan;
    private $russian_lan;
    private $english;
    private $chemistry;
    private $physics;
    private $history;
    private $math;
    private $mainPoint;

    function __construct(){}

    //-------------getters----------------
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getClass(){
        return $this->class;
    }
    public function getKyrgyzLan(){
        return $this->kyrgyz_lan;
    }
    public function getRussianLan(){
        return $this->russian_lan;
    }
    public function getEnglish(){
        return $this->english;
    }
    public function getChemistry(){
        return $this->chemistry;
    }
    public function getPhisics(){
        return $this->physics;
    }
    public function getHistory(){
        return $this->history;
    }
    public function getMath(){
        return $this->math;
    }
    public function getMainPoint(){
        return $this->mainPoint;
    }

    //-------------setters----------------
    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setClass($class){
        $this->class = $class;
    }
    public function setKyrgyzLan($kyrgyz_lan){
        $this->kyrgyz_lan = $kyrgyz_lan;
    }
    public function setRussianLan($russian_lan){
        $this->russian_lan = $russian_lan;
    }
    public function setEnglish($english){
        $this->english = $english;
    }
    public function setChemistry($chemistry){
        $this->chemistry = $chemistry;
    }
    public function setPhisics($phisics){
        $this->physics = $phisics;
    }
    public function setHistory($history){
        $this->history = $history;
    }
    public function setMainPoint($mainPoint){
        $this->mainPoint = $mainPoint;
    }

}