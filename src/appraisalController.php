<?php
require_once ('adminView.php');
require_once ('madel/adminModel/appraisalModel.php');

class AppraisalController{
    private $view;
    private $appraisalModel;
    function __construct(){
        $this->view = new AdminView();
        $this->appraisalModel = new AppraisalModel();
    }

    function getPage($temp){
        switch ($temp){
            case '':
                $data = $this->appraisalModel->getClasses();
                $this->view->getMainPage($this->view->getAppraisalContent($data));
                break;
            case 'someClass':
                if(isset($_GET['detail'])){
                    $cl=$_GET['detail'];
                }else{
                    die('Error');
                }
                $data = $this->appraisalModel->getStudentsByClass($cl);
                $this->view->getMainPage($this->view->getClassPupils($data, $cl));
                break;
            case 'somePupil':
                if(isset($_GET['detail'])){
                    $name = $_GET['detail'];
                    $cl = $_GET['cl'];
                }else{
                    die();
                }
                $examData = $this->appraisalModel->getExemPupilAppraisal($name);
                $this->view->getMainPage($this->view->showPupilAppraisal($examData, $name, $cl));
                break;
            case 'appraisalForm':
                if(isset($_GET['pupil_name'])){
                    $pupil_Name = $_GET['pupil_name'];
                }else{
                    die();
                }
                $userData = $this->appraisalModel->getPupilByName($pupil_Name);
                $examNames = $this->appraisalModel->getExamNames();
                $this->view->getMainPage($this->view->appraisalForm($userData,$examNames));
                break;
            case 'deleteSomeExamAppraisal':
                if(isset($_GET)){
                    $pupilName = $_GET['name'];
                    $examName = $_GET['examName'];
                    $cl=$_GET['cl'];
                }else{
                    die("Error");
                }

                $this->appraisalModel->deleteAppraisal($pupilName, $examName, $cl);
                break;
            case 'updateSomeExamAppraisalForm':
                if(isset($_GET)){
                    $pupilName = $_GET['name'];
                    $examName = $_GET['examName'];
                }else{
                    die("Error");
                }
                $exam_data = $this->appraisalModel->getSomeExamName($examName);

                $data = $this->appraisalModel->getPupilAppraisalForUpdateForm($exam_data['name'], $pupilName);

                $this->view->getMainPage($this->view->appraisalUpdateForm($pupilName, $data, $exam_data));
                break;
            case 'updateSomeExamAppraisal':
                if(isset($_POST)){
                    $post = $_POST;
                }else{
                    die("Error");
                }
                $this->appraisalModel->updateAppraisal($post);
                break;
            case 'appraisalAdding':
                if(isset($_POST)){
                    $post = $_POST;
                }else{
                    die("Error");
                }
                $this->appraisalModel->addAppraisal($post);
                break;
        }
    }
}
