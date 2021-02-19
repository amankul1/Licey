<?php

require_once ('mainAdminModel.php');
require_once ('madel/adminModel/entity/galleryEntity.php');

class  GalleryModel extends MainAdminModel{
    private $mysqli;
    private $galleryList = [];
    private $galleryEntity;

    public function __construct(){}

    public function getConnection(){
        $this->mysqli = parent::connectionDB();
    }

    public function getAllGalleryList(){
        $this->getConnection();
        $res = $this->mysqli->query("SELECT * FROM gallery ORDER BY `type`");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->galleryEntity = new GalleryEntity();
                $this->galleryEntity->setId($row['id']);
                $this->galleryEntity->setType($row['type']);
                $this->galleryEntity->setImage($row['image']);
                array_push($this->galleryList, $this->galleryEntity);
            }
        }
        return $this->galleryList;
        $this->mysqli->close();
    }

    public function addNewImageToGallery($post, $files){
        $this->getConnection();
        $imageFiles = [];
        foreach ($files as $val){
            foreach ($val['tmp_name'] as $item) {
                array_push($imageFiles, addslashes(file_get_contents($item)));
            }
        }

        for($i=0; $i<count($post['imageType']); $i++){
            $t = $post['imageType'][$i];
            $f = $imageFiles[$i];

            if($this->mysqli->query("INSERT INTO gallery (`type`, `image`) VALUES ('$t', '$f');")){
                $_SESSION['modalMessage']="Данные успешно добавлены !";
            }else{
                die("Error while adding photo !");
            }
        }
        header("Location: /licey/admin/gallery");
        $this->mysqli->close();
    }

    public function deleteImageById($id){
        $this->getConnection();
        if($this->mysqli->query("DELETE FROM gallery WHERE `id`='$id';")){
            $_SESSION['modalMessage']="Данные успешно удалены !";
            header("Location: /licey/admin/gallery");
        }else{
            die("Error");
        }
        $this->mysqli->close();
    }
}