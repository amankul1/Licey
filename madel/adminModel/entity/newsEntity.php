<?php

class NewsEntity{
    private $id;
    private $title;
    private $text;
    private $image;

    function __construct(){}

    //-------------getters---------------

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getText(){
        return $this->text;
    }
    public function getImage(){
        return $this->image;
    }
    //------------setters----------------

    public function setId($id){
        $this->id = $id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setText($text){
        $this->text = $text;
    }
    public function setImage($image){
        $this->image = base64_encode($image);
    }
}