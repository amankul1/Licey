<?php
require_once ('adminView.php');
require_once ('madel/adminModel/teacherModel.php');

class TeacherController{
    private $view;
    private $teacherModel;
    public function __construct(){
        $this->teacherModel = new TeachersModel();
        $this->view = new AdminView();
    }

    function printPage($temp){
        if($temp===''){
            $data = $this->teacherModel->getAllTeachersList();
            $this->view->getMainPage($this->view->getTeacherContent($data));
        }else if($temp==='teacherDetail'){
            if($_FILES['newImage']['size'] > 0){
                $image = addslashes(file_get_contents($_FILES['newImage']['tmp_name']));
            }else{
                $image = addslashes(base64_decode($_POST['oldImage']));
            }
            if(isset($_POST)){
                $this->teacherModel->setTeacher($_POST, $image);
            }
        }else{
            $data = $this->teacherModel->getTeacherById($temp);
            $this->view->getMainPage($this->view->getTeacherDetailContent($data));
        }
    }
}