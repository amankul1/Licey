<?php

require_once ('mainAdminModel.php');
require_once ('entity/pupilsEntity.php');

class PupilsModel extends  MainAdminModel{
    private $mysqli;
    private $pupilsList = [];
    private $pupilsEntity;

    public function __construct(){}

    public function getConnection(){
        $this->mysqli = parent::connectionDB();
    }

    public function getAllPupilList(){
        $this->getConnection();
        $res = $this->mysqli->query("SELECT * FROM students ORDER BY `class` DESC");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->pupilsEntity = new PupilsEntity();
                $this->pupilsEntity->setId($row['id']);
                $this->pupilsEntity->setName($row['name']);
                $this->pupilsEntity->setClass($row['class']);
                array_push($this->pupilsList, $this->pupilsEntity);
            }
        }
        return $this->pupilsList;
        $this->mysqli->close();
    }

    public function getPupilById($id){
        $this->getConnection();
        $id = htmlspecialchars($id);
        $res = $this->mysqli->query("SELECT * FROM students WHERE `id`='$id'");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->pupilsEntity = new PupilsEntity();
                $this->pupilsEntity->setId($row['id']);
                $this->pupilsEntity->setName($row['name']);
                $this->pupilsEntity->setClass($row['class']);
            }
        }
        return $this->pupilsEntity;
        $this->mysqli->close();
    }

    public function  pupilUpdate($post){
        if(isset($post)){
            $id = htmlspecialchars($post['id']);
            $name = htmlspecialchars($post['name']);
            $class = htmlspecialchars($post['class']);
        }else{
            die('errror');
        }
        $this->getConnection();
        if( $this->mysqli->query(" UPDATE students SET `name` = '$name', `class`='$class' WHERE `id`='$id' ")
        ){
            $_SESSION['modalMessage']="Данные успешно изменены !";
            header('Location: /licey/admin/pupils');
        }else{
            die('error');
        }
        $this->mysqli->close();
    }

    public function  pupilDelete($id){
        $this->getConnection();
        if( $this->mysqli->query(" DELETE FROM students  WHERE `id`='$id' ")
        ){
            $_SESSION['modalMessage']="Данные успешно удалены !";
            header('Location: /licey/admin/pupils');
        }else{
            die('error');
        }
        $this->mysqli->close();
    }

    public function addPupils($post){
        $this->getConnection();
        $errorNames = '';
        for($i=0; $i<count($post['name']); $i++){
            $name = $post['name'][$i];
            $class = $post['class'][$i];
            if($this->mysqli->query("INSERT INTO `students` (`name`, `class`) VALUES ('$name', '$class');")){

            }else{
                $errorNames.=$name;
                $errorNames.='; ';
                $isErr = true;
            }
            if(isset($isErr)){
                $errorNames .= "эти имена есть в базе !";
                $_SESSION['modalMessage']=$errorNames;
                $_SESSION['isError']=$isErr;
            }else{
                $_SESSION['modalMessage']="Данные успешно добавлены !";
            }
            header("Location: /licey/admin/pupils");
        }

        $this->mysqli->close();
        die();
    }

}