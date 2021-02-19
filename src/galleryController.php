<?php
require_once ('adminView.php');
require_once ('madel/adminModel/galleryModel.php');

class GalleryController{
    private $view;
    private $galleryModel;
    function __construct(){
        $this->galleryModel = new GalleryModel();
        $this->view = new AdminView();
    }

    function getPage($temp){
        switch ($temp){
            case '':
                $data = $this->galleryModel->getAllGalleryList();
                $this->view->getMainPage($this->view->getGalleryContent($data));
                break;
            case 'addNewPhotoForms':
                if(isset($_GET['size'])){
                    $s = $_GET['size'];
                }else{
                    $s=0;
                    die('Error');
                }
                $this->view->getMainPage($this->view->galleryForms($s));
                break;
            case 'addGalleryPhoto':
                if(isset($_POST) && isset($_FILES)){
                    $post = $_POST;
                    $file = $_FILES;
                }else{
                    die();
                }
                $this->galleryModel->addNewImageToGallery($post,$file);
                break;
            case 'deleteImage':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }else{
                    die();
                }
                $this->galleryModel->deleteImageById($id);
                break;
        }
    }
}
