<?php

require_once ('mainAdminModel.php');
require_once ('madel/adminModel/entity/newsEntity.php');

class  NewsModel extends MainAdminModel{
    private $mysqli;
    private $newsList = [];
    private $newsEntity;

    public function __construct(){}

    public function getConnection(){
        $this->mysqli = parent::connectionDB();
    }

    public function getAllNewsList(){
        $this->getConnection();
        $res = $this->mysqli->query("SELECT * FROM news ORDER BY `id`");
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $this->newsEntity = new NewsEntity();
                $this->newsEntity->setId($row['id']);
                $this->newsEntity->setTitle($row['title']);
                $this->newsEntity->setText($row['text']);
                $this->newsEntity->setImage($row['image']);
                array_push($this->newsList, $this->newsEntity);
            }
        }
        return $this->newsList;
        $this->mysqli->close();
    }

    public function newsDelete($id){
        $this->getConnection();

        if($this->mysqli->query("DELETE FROM news WHERE `id`='$id';")){
            $_SESSION['modalMessage']="Данные успешно удалены !";
            header('Location: /licey/admin/news');
        }else{
            die('Error');
        }
        return $this->newsList;
        $this->mysqli->close();
    }

    public function addNewNews($post, $image){
        $this->getConnection();
        if(!empty($post)){
            $title = $post['title'];
            $text = $post['text'];
            if($this->mysqli->query("INSERT INTO `news` (`title`, `text`, `image`) VALUES ('$title', '$text', '$image');")){
                $_SESSION['modalMessage']="Данные успешно добавлены !";
                header("Location: /licey/admin/news");
            }else{
                die('Error');
            }
        }
        $this->mysqli->close();
    }


}