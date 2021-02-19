<?php
require_once ('adminView.php');
require_once ('madel/adminModel/newsModel.php');

class NewsController{
    private $view;
    private $newsModel;
    function __construct(){
        $this->view = new AdminView();
        $this->newsModel = new NewsModel();
    }

    function getPage($temp){
        switch ($temp){
            case '':
                $data = $this->newsModel->getAllNewsList();
                $this->view->getMainPage($this->view->getNewsContent($data));
                break;
            case 'addNewsForm':
                $this->view->getMainPage($this->view->addNewsFormContent());
                break;
            case 'addNewNews':
                if(isset($_POST) && isset($_FILES)){
                    $post = $_POST;
                    $file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                }else{
                    die('Error');
                }
                $this->newsModel->addNewNews($post, $file);
                break;
            case 'newsDelete':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                }else{
                    die('Error');
                }
                $this->newsModel->newsDelete($id);
                break;
        }
    }
}
