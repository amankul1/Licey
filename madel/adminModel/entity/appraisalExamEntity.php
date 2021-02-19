<?php

class AppraisalExamEntity{
    private $id;
    private $name;
    private $class;
    private $kyrgyz_lan;
    private $kyrgyz_lit;
    private $russian_lan;
    private $russian_lit;
    private $english;
    private $chemistry;
    private $physics;
    private $history;
    private $computer_science;
    private $geometry;
    private $algebra;
    private $dpm;
    private $drawing;
    private $human_society;
    private $economy;
    private $geography;
    private $astronomy;
    private $examName;

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
    public function getKyrgyzLit(){
        return $this->kyrgyz_lit;
    }
    public function getRussianLan(){
        return $this->russian_lan;
    }
    public function getRussianLit(){
        return $this->russian_lit;
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
    public function getComputerSience(){
        return $this->computer_science;
    }
    public function getGeometry(){
        return $this->geometry;
    }
    public function getAlgebra(){
        return $this->algebra;
    }
    public function getDpm(){
        return $this->dpm;
    }
    public function getDrawing(){
        return $this->drawing;
    }
    public function getHumanSociety(){
        return $this->human_society;
    }
    public function getEconomy(){
        return $this->economy;
    }
    public function getGeography(){
        return $this->geography;
    }
    public function getAstronomy(){
        return $this->astronomy;
    }
    public function getExamName(){
        return $this->examName;
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
    public function setKyrgyzLit($kyrgyz_lit){
        $this->kyrgyz_lit = $kyrgyz_lit;
    }
    public function setRussianLan($russian_lan){
        $this->russian_lan = $russian_lan;
    }
    public function setRussianLit($russian_lit){
        $this->russian_lit = $russian_lit;
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
    public function setComputerSience($computerSience){
        $this->computer_science = $computerSience;
    }
    public function setGeometry($geometry){
        $this->geometry = $geometry;
    }
    public function setAlgebra($algebra){
        $this->algebra = $algebra;
    }
    public function setDpm($dpm){
        $this->dpm = $dpm;
    }
    public function setDrawing($drawing){
        $this->drawing = $drawing;
    }
    public function setHumanSociety($humanSociety){
        $this->human_society = $humanSociety;
    }
    public function setEconomy($economy){
        $this->economy = $economy;
    }
    public function setGeography($geography){
        $this->geography = $geography;
    }
    public function setAstronomy($astronomy){
        $this->astronomy = $astronomy;
    }
    public function setExamName($examName){
        $this->examName = $examName;
    }
}
