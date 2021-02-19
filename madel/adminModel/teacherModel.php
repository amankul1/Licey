<?php
require_once ('mainAdminModel.php');
require_once ('entity/teachersEntity.php');

class TeachersModel extends  MainAdminModel{
    private $mysqli;
    private $teachersList = [];
    private $teachersEntity;
    public function __construct(){}

    public function getConnection(){
        $this->mysqli = parent::connectionDB();
    }

    public function getAllTeachersList(){
        $this->getConnection();
        $res = $this->mysqli->query("SELECT * FROM teachers ORDER BY `id`");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->teachersEntity = new TeachersEntity();
                $this->teachersEntity->setId($row['id']);
                $this->teachersEntity->setName($row['name']);
                $this->teachersEntity->setPosition($row['position']);
                $this->teachersEntity->setLesson($row['lesson']);
                $this->teachersEntity->setClassroom($row['classroom']);
                $this->teachersEntity->setTelephon($row['telephon']);
                $this->teachersEntity->setExperience($row['experience']);
                $this->teachersEntity->setMoreInfo($row['more_info']);
                $this->teachersEntity->setImage($row['image']);
                array_push($this->teachersList, $this->teachersEntity);
            }
        }
        return $this->teachersList;
        $this->mysqli->close();
    }


    public function getTeacherById($temp){
        $this->getConnection();
        $id = htmlspecialchars($temp);
        $res = $this->mysqli->query("SELECT * FROM teachers WHERE `id`='$id' ORDER BY `id`");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->teachersEntity = new TeachersEntity();
                $this->teachersEntity->setId($row['id']);
                $this->teachersEntity->setName($row['name']);
                $this->teachersEntity->setPosition($row['position']);
                $this->teachersEntity->setLesson($row['lesson']);
                $this->teachersEntity->setClassroom($row['classroom']);
                $this->teachersEntity->setTelephon($row['telephon']);
                $this->teachersEntity->setExperience($row['experience']);
                $this->teachersEntity->setMoreInfo($row['more_info']);
                $this->teachersEntity->setImage($row['image']);
            }
        }
        return $this->teachersEntity;
        $this->mysqli->close();
    }
    public function setTeacher($post, $image){
        $id = htmlspecialchars($post['id']);
        $name = htmlspecialchars($post['name']);
        $position = htmlspecialchars($post['position']);
        $lesson = htmlspecialchars($post['lesson']);
        $classroom = htmlspecialchars($post['classroom']);
        $telephon = htmlspecialchars($post['telephon']);
        $experience = htmlspecialchars($post['experience']);
        $more_info = htmlspecialchars($post['more_info']);

        $this->getConnection();

        if( $this->mysqli->query("UPDATE  `teachers` SET 
                     `name`='$name',
                     `position`='$position',
                     `lesson`='$lesson',
                     `classroom`='$classroom',
                     `telephon`='$telephon',
                     `experience`='$experience',
                     `more_info`='$more_info',
                     `image`='$image' WHERE `id`='$id'")
        ){
            $_SESSION['modalMessage']="Данные успешно изменены !";
            header('Location: /licey/admin/teachers');
        }else{
            echo 'Error';
            die();
        }
        $this->mysqli->close();
    }

}