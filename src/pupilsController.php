<?php
require_once ('adminView.php');
require_once ('madel/adminModel/pupilsModel.php');
require_once ('madel/adminModel/appraisalModel.php');

class PupilsController{
    private $view;
    private $pupilsModel;
    private $appraisalModel;
    function __construct(){
        $this->view = new AdminView();
        $this->pupilsModel = new PupilsModel();
    }

    function getPage($temp){
        switch ($temp){
            case 'updateDetail':
                if($_GET['id']){
                    $id = $_GET['id'];
                }else{
                    die('Id не пришел!');
                }
                $data = $this->pupilsModel->getPupilByID($id);
                $this->view->getMainPage($this->view->getPupilsDetailUpdate($data));
                break;
            case 'pupilUpdate':
                if($_POST){
                    $post = $_POST;
                }else{
                    die('Информация не пришла!');
                }
                $this->pupilsModel->pupilUpdate($post);
                break;
            case 'pupilDelete':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                }else{
                    die('id не пришел');
                }
                $this->pupilsModel->pupilDelete($id);
                break;
            case 'addNewPupilsForms':
                if(isset($_GET['size'])){
                    $s = $_GET['size'];
                }else{
                    $s=0;
                    die('Error');
                }
                $this->appraisalModel = new AppraisalModel();
                $data = $this->appraisalModel->getClasses();
                $this->view->getMainPage($this->view->addNewPupilsForm($s, $data));
                break;
            case 'addNewPupils':
                if(isset($_POST)){
                    $post=$_POST;
                }else{
                    die();
                }
                $this->pupilsModel->addPupils($post);
                break;
            case '':
                $data = $this->pupilsModel->getAllPupilList();
                $this->view->getMainPage($this->view->getPupilContent($data));
                break;
        }
    }
}