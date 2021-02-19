<?php

require_once ('mainAdminModel.php');
require_once ('madel/adminModel/entity/appraisalExamEntity.php');
require_once ('madel/adminModel/entity/appraisalOrtEntity.php');
require_once ('madel/adminModel/entity/classesEntity.php');
require_once ('madel/adminModel/entity/pupilsEntity.php');
require_once ('madel/adminModel/entity/examEntity.php');
require_once ('madel/adminModel/entity/ortEntity.php');


class  AppraisalModel extends MainAdminModel{
    private $mysqli;
    private $list = [];
    private $appraisalExamEntity;
    private $appraisalOrtEntity;
    private $classes;
    private $pupilsEntity;
    private $examEntity;
    private $ortEntity;

    public function __construct(){}

    public function getConnection(){
        $this->mysqli = parent::connectionDB();
    }

    public function getClasses(){
        $this->getConnection();
        $res = $this->mysqli->query("SELECT * FROM `classes` ORDER BY `id`");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->classes = new Classes();
                $this->classes->setId($row['id']);
                $this->classes->setName($row['name']);
                $this->classes->setFullName($row['fullName']);
                array_push($this->list, $this->classes);
            }
        }
        return $this->list;
        $this->mysqli->close();
    }

    public function getStudentsByClass($cl){
        $this->getConnection();

        $res = $this->mysqli->query("SELECT * FROM `students` WHERE `class`='$cl' ORDER BY `name`;");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->pupilsEntity = new PupilsEntity();
                $this->pupilsEntity->setId($row['id']);
                $this->pupilsEntity->setName($row['name']);
                $this->pupilsEntity->setClass($row['class']);
                array_push($this->list, $this->pupilsEntity);
            }
        }
        return $this->list;

        $this->mysqli->close();
    }

    public function getPupilByName($name){
        $this->getConnection();

        $res = $this->mysqli->query("SELECT * FROM `students` WHERE `name`='$name';");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->pupilsEntity = new PupilsEntity();
                $this->pupilsEntity->setId($row['id']);
                $this->pupilsEntity->setName($row['name']);
                $this->pupilsEntity->setClass($row['class']);
                break;
            }
        }
        return $this->pupilsEntity;

        $this->mysqli->close();
    }
    //----------------------------------get appraisal---------------------------------
    public function getExemPupilAppraisal($name){
        $this->getConnection();
        $examList = $this->getExamNames();
        foreach ($examList as $ob){
            $examName = $ob->getName();
            $res = $this->mysqli->query("SELECT * FROM `$examName` WHERE `name1`='$name';");
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    $this->appraisalExamEntity = new AppraisalExamEntity();
                    $this->appraisalExamEntity->setId($row['id']);
                    $this->appraisalExamEntity->setName($row['name1']);
                    $this->appraisalExamEntity->setClass($row['class1']);
                    $this->appraisalExamEntity->setKyrgyzLan($row['kyrgyz_lan']);
                    $this->appraisalExamEntity->setKyrgyzLit($row['kyrgyz_lit']);
                    $this->appraisalExamEntity->setRussianLan($row['russian_lan']);
                    $this->appraisalExamEntity->setRussianLit($row['russian_lit']);
                    $this->appraisalExamEntity->setEnglish($row['english']);
                    $this->appraisalExamEntity->setChemistry($row['chemistry']);
                    $this->appraisalExamEntity->setPhisics($row['physics']);
                    $this->appraisalExamEntity->setHistory($row['history']);
                    $this->appraisalExamEntity->setComputerSience($row['computer_science']);
                    $this->appraisalExamEntity->setGeometry($row['geometry']);
                    $this->appraisalExamEntity->setAlgebra($row['algebra']);
                    $this->appraisalExamEntity->setDpm($row['dpm']);
                    $this->appraisalExamEntity->setDrawing($row['drawing']);
                    $this->appraisalExamEntity->setHumanSociety($row['human_society']);
                    $this->appraisalExamEntity->setEconomy($row['economy']);
                    $this->appraisalExamEntity->setGeography($row['geography']);
                    $this->appraisalExamEntity->setAstronomy($row['astronomy']);
                    $this->appraisalExamEntity->setExamName($ob->getFullName());
                    break;
                }
                array_push($this->list, $this->appraisalExamEntity);
            }
        }
        return $this->list;
        $this->mysqli->close();
    }


    public function getOrtPupilAppraisal($name){
        $this->getConnection();
        $examList = $this->getExamNames();

        return '';
    }

    //----------------------------------add appraisal-----------------------------------
    public function addAppraisal($post){
        $this->getConnection();
        $pupilName = $post['pupilName'];
        $pupilClass = $post['pupilClass'];
        $examName = $post['examName'];
        $k_lan = $post['k_lan'];
        $k_lit = $post['k_lit'];
        $r_lan = $post['r_lan'];
        $r_lit = $post['r_lit'];
        $eng = $post['eng'];
        $chem = $post['chem'];
        $phis = $post['phis'];
        $his = $post['his'];
        $com_s = $post['com_s'];
        $geom = $post['geom'];
        $alg = $post['alg'];
        $dpm = $post['dpm'];
        $draw = $post['draw'];
        $hum_s = $post['hum_s'];
        $economy = $post['economy'];
        $geog = $post['geog'];
        $astr = $post['astr'];

        if($this->mysqli->query("INSERT INTO `$examName` (`name1`, `class1`, `kyrgyz_lan`, `kyrgyz_lit`, `russian_lan`, `russian_lit`, `english`, `chemistry`, `physics`, `history`, `computer_science`, `geometry`, `algebra`, `dpm`, `drawing`, `human_society`, `economy`, `geography`, `astronomy`) VALUES ('$pupilName', '$pupilClass', '$k_lan', '$k_lit', '$r_lan', '$r_lit', '$eng', '$chem', '$phis', '$his', '$com_s', '$geom', '$alg', '$dpm', '$draw', '$hum_s', '$economy', '$geog', '$astr');")){

        }else{
            $isErr = true;
        }
        if(isset($isErr)){
            $message = $pupilName." - у этого ученика есть оценки по этому экзамену в базе !";
            $_SESSION['modalMessage']=$message;
            $_SESSION['isError']=$isErr;
        }else{
            $_SESSION['modalMessage']="Данные успешно добавлены !";
        }
        header('Location: /licey/admin/appraisal?temp=somePupil&detail='.$pupilName.'&cl='.$pupilClass);
        $this->mysqli->close();
    }

    //----------------------------------delete appraisal-----------------------------------
    public function deleteAppraisal($name, $examName, $cl){
        $this->getConnection();
        $res=$this->mysqli->query("SELECT * FROM `exam_names` WHERE `fullName`='$examName';");

        if($res->num_rows>0){
            $row=$res->fetch_assoc();
            if(isset($row)){
                $e_name = $row['name'];
            }else{
                die();
            }
        }else{
            die();
        }

        if($this->mysqli->query("DELETE FROM `$e_name` WHERE `name1`='$name';")){
            $_SESSION['modalMessage']="Данные успешно удалены !";
            header('Location: /licey/admin/appraisal?temp=somePupil&detail='.$name.'&cl='.$cl);
        }else{
            die("Error");
        }

        $this->mysqli->close();
    }

    //----------------------------------update appraisal------------------------------
    public function updateAppraisal($post){
        $this->getConnection();
        $pupilName = $post['pupilName'];
        $pupilClass = $post['pupilClass'];
        $examName = $post['exam_name'];
        $k_lan = $post['k_lan'];
        $k_lit = $post['k_lit'];
        $r_lan = $post['r_lan'];
        $r_lit = $post['r_lit'];
        $eng = $post['eng'];
        $chem = $post['chem'];
        $phis = $post['phis'];
        $his = $post['his'];
        $com_s = $post['com_s'];
        $geom = $post['geom'];
        $alg = $post['alg'];
        $dpm = $post['dpm'];
        $draw = $post['draw'];
        $hum_s = $post['hum_s'];
        $economy = $post['economy'];
        $geog = $post['geog'];
        $astr = $post['astr'];

        if($this->mysqli->query("UPDATE `$examName`  SET   
                    `kyrgyz_lan`='$k_lan',
                    `kyrgyz_lit`='$k_lit',
                    `russian_lan`='$r_lan',
                    `russian_lit`='$r_lit',
                    `english`='$eng',
                    `chemistry`= '$chem',
                    `physics`='$phis',
                    `history`='$his',
                    `computer_science`='$com_s',
                    `geometry`='$geom',
                    `algebra`='$alg',
                    `dpm`='$dpm',
                    `drawing`='$draw',
                    `human_society`='$hum_s',
                    `economy`='$economy',
                    `geography`='$geog',
                    `astronomy`='$astr'
                    WHERE `name1`='$pupilName';")){
        }else{
            $isErr = true;
        }
        if(isset($isErr)){
            $pupilName .= " - у этого ученика есть оценки по этому экзамену в базе !";
            $_SESSION['modalMessage']=$pupilName;
            $_SESSION['isError']=$isErr;
        }else{
            $_SESSION['modalMessage']="Данные успешно добавлены !";
        }
        header('Location: /licey/admin/appraisal?temp=somePupil&detail='.$pupilName.'&cl='.$pupilClass);

        $this->mysqli->close();
    }
//-------------------------------------------get exam names-------------------------------
    public function getExamNames(){
        $examList=[];
        $res = $this->mysqli->query("SELECT * FROM `exam_names`;");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->examEntity = new ExamEntity();
                $this->examEntity->setId($row['id']);
                $this->examEntity->setName($row['name']);
                $this->examEntity->setFullName($row['fullName']);
                array_push($examList, $this->examEntity);
            }
        }
        return $examList;
    }

    public function getOrtNames(){
        $ortList=[];
        $res = $this->mysqli->query("SELECT * FROM `students` WHERE `class`='$cl' ORDER BY `name`;");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->ortEntity = new OrtEntity();
                $this->ortEntity->setId($row['id']);
                $this->ortEntity->setName($row['name']);
                $this->ortEntity->setFullName($row['fullName']);
                array_push($ortList, $this->pupilsEntity);
            }
        }
        return $ortList;
    }

    public function getSomeExamName($e_name){
        $this->getConnection();

        $res=$this->mysqli->query("SELECT * FROM `exam_names` WHERE `fullName`='$e_name';");
        if($res->num_rows>0){
            $row = $res->fetch_assoc();
        }else{
            die('Hi');
        }

        return $row;

        $this->mysqli->close();
    }

    public function getPupilAppraisalForUpdateForm($exam_name, $pupilName){
        $this->getConnection();

        $res = $this->mysqli->query("SELECT * FROM `$exam_name` WHERE `name1`='$pupilName';");

        if($res->num_rows>0){
            $row = $res->fetch_assoc();
        }else{
            die('E');
        }
        return $row;
        $this->mysqli->close();
    }

}





