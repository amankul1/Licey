<?php

class GalleryEntity{
    private $id;
    private $type;
    private $image;

    public function __construct(){}

    //-------------getters-----------------

    function getId(){
        return $this->id;
    }
    function getType(){
        return $this->type;
    }
    function getImage(){
        return $this->image;
    }
    //--------------setters----------

    function setId($id){
        $this->id = $id;
    }
    function setType($type){
        $this->type = $type;
    }
    function setImage($image){
        $this->image = base64_encode($image);
    }

}