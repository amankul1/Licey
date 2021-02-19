<?php

    class MainTemplate{
        function __construct(){}

        function  getPage($content){
            ?>
            <!doctype html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport"
                      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
                <title>Admin panel</title>

                <style type="text/css">
                    *{
                        padding: 0;
                        left: 0;
                        right: 0;
                        top: 0;
                        box-sizing: border-box;
                        margin: 0;
                    }
                    body{
                        position: relative;
                    }
                    .mainWrapper{
                        position: relative;
                        width: 100vw;
                        height: 100vh;
                        background-color: red;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: flex-start;
                    }
                    .mainRightBlockWrapper{
                        width: 18%;
                        height: 100%;
                        background-color: skyblue;
                        display:flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        align-items: flex-start;
                    }
                    .titleWrapper{
                        width: 100%;
                        height: 15%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .titleWrapper a{
                        text-decoration: none;
                        color: black;
                    }
                    .titleWrapper h2{
                        font-size: 27px;
                    }
                    .menuWrapper{
                        width: 100%;
                        height: 55%;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center
                    }
                    .menu{
                        width: 80%;
                        height: 40px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .menu a{
                        text-decoration: none;
                        font-style: normal;
                        color: rgba(0,0,0,0.5);
                        font-size: 18px;
                        font-weight: bold;
                        transition: 1s;
                    }

                    .menu a:hover{
                        color: rgba(0,0,0,0.9);
                    }

                    .menuIcons{
                        width: 25px;
                        height: 25px;
                        margin-right: 5px;
                    }
                    .mainLeftBlockWrapper{
                        position: relative;
                        width: 82%;
                        height: 100%;
                        background-color: white;
                        overflow-y: scroll;
                        overflow-x: hidden;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        flex-wrap: wrap;
                        padding: 50px 20px 50px 20px;
                    }

                /*    -----------Teacher----------------------*/
                    .table th{
                        font-size: 16px;
                    }
                    .table td{
                        font-size: 14px;
                    }
                    .teacher_image{
                        width: 50px;
                    }
                    .teacherDetailForm{
                        width: 80%;
                        padding: 50px 0 50px 0;
                    }
                    .teacherDetailForm .form-group{
                        padding: 10px 0 10px 0;
                    }
                    .pupilForm{
                        width: 60%;
                    }
                    .addWrapper{
                        position: absolute;
                        margin: 20px 0 0 65vw;
                        opacity: 0.7;
                    }
                    .addWrapper:hover{
                        opacity: 1;
                    }

                /*----------------------------------Add pupil size for adding new pupils to db---------------*/
                    .pupilForm{
                        width: 60%;
                    }
                    .pupilForm input{
                        width: 100%;
                    }
                    .getPupilSize{
                        position: absolute;
                        width: 50%;
                        margin: auto;
                        height: 50px;
                        border-bottom: 1px solid rgba(0,0,0,0.5);
                        display: flex;
                        justify-content: space-around;
                        align-items: flex-end;
                        padding-bottom: 5px ;
                        background-color: #cfcfcf;
                    }
                    .getPupilSize input{
                        width: 100px;
                        height: 35px;
                    }
                    .getPupilSize button{
                        height: 35px;
                        display: flex;
                        align-items: center;
                    }
                /*    -----------------------modal window-----------------------*/
                    .messageModalWindow{
                        position: absolute;
                        padding: 20px 10px 20px 10px;
                        min-height: 60px;
                        width: 500px;
                        margin: auto;
                        margin-top: 50px;
                        z-index: 5;
                        background-color: rgba(0,255,0,0.6);
                        border-radius: 5px;
                        transition: 1s;
                        color: white;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        transform-origin: top;
                        transform: scaleY(0);
                    }
                    .messageModalWindow{
                        position: absolute;
                        padding: 20px 10px 20px 10px;
                        min-height: 60px;
                        width: 500px;
                        margin: auto;
                        margin-top: 50px;
                        background-color: rgba(0,255,0,0.6);
                        z-index: 5;
                        border-radius: 5px;
                        transition: 1s;
                        color: white;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        transform-origin: top;
                        transform: scaleY(0);
                    }
                    .err{
                        background-color: rgba(255,0,0,0.6);
                     }
                    .appraisalListClasses{
                        width: 60%;
                    }
                    /*---------------------------Appraisal table----------------------*/
                    .appraisalTable th{
                        font-size: 12px;
                    }
                    .appraisalTable td{
                        font-size: 12px;
                    }

                    .appraisalTablePupilName{
                        position: absolute;
                        width: 280px;
                        height: 40px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-bottom: 1px solid #191919;
                        margin: auto;
                        margin-top: 10px;
                        color: chocolate;
                        font-weight: bold;
                        font-size: 16px;
                    }
                    .apprasalAddingForm{
                        width: 60%;
                    }
                    .err{
                        position: absolute;
                        transform: scale(0);
                    }

                    .backPage{
                        position: absolute;
                        margin: 15px 0 0 20px;
                        width: 100px;
                    }

                </style>
            </head>
            <body>
                <div class="mainWrapper">
                    <div class="mainRightBlockWrapper">
                        <div class="titleWrapper">
                            <a href="/licey/admin"><h2><a href="/licey/admin">Admin Panel</h2></a>
                        </div>
                        <div class="menuWrapper">
                            <div class="menu">
                                <a href="/licey/admin/teachers" class = 'menuLinks'>
                                    <img class="menuIcons" src="https://img.icons8.com/ios/50/000000/floating-guru.png" alt="photo">
                                    <span>Учителя</span>
                                </a>
                            </div>
                            <div class="menu">
                                <a href="/licey/admin/pupils" class = 'menuLinks'>
                                    <img class="menuIcons" src="https://img.icons8.com/ios/50/000000/students.png" alt="photo">
                                    <span>Ученики</span>
                                </a>
                            </div>
                            <div class="menu">
                                <a href="/licey/admin/news" class = 'menuLinks'>
                                    <img class="menuIcons" src="https://img.icons8.com/doodle/48/000000/news.png" alt="photo">
                                    <span>Новости</span>
                                </a>
                            </div>
                            <div class="menu">
                                <a href="/licey/admin/gallery" class = 'menuLinks'>
                                    <img class="menuIcons" src="https://img.icons8.com/wired/64/000000/gallery.png" alt="photo">
                                    <span>Галерея</span>
                                </a>
                            </div>
                            <div class="menu">
                                <a href="/licey/admin/appraisal" class = 'menuLinks'>
                                    <img class="menuIcons" src="https://img.icons8.com/wired/64/000000/add-to-favorites.png" alt="photo">
                                    <span>Оценки</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mainLeftBlockWrapper">
                        <?php

                            if(isset($_SESSION['isError'])){
                                ?>

                                <div class="messageModalWindow err">
                                    <?php
                                    if(isset($_SESSION['modalMessage'])){
                                        ?><span class="m"> <?=$_SESSION['modalMessage']?> </span><?php
                                    }else{ ?>
                                        <span class="m"></span>
                                        <?php
                                    }
                                    unset($_SESSION['modalMessage']);
                                    unset($_SESSION['isError']);
                                    ?>
                                </div>

                                <?php
                            }else{
                                ?>

                                <div class="messageModalWindow">
                                    <?php
                                    if(isset($_SESSION['modalMessage'])){
                                        ?><span class="m"> <?=$_SESSION['modalMessage']?> </span><?php
                                    }else{ ?>
                                        <span class="m"></span>
                                        <?php
                                    }
                                    unset($_SESSION['modalMessage']);
                                    unset($_SESSION['isError']);
                                    ?>
                                </div>

                                <?php
                            }

                        ?>
                        <?= $content ?> <br>
                    </div>
                </div>

            <script type="text/javascript">
                let menuLinks = document.querySelectorAll('.menu a');
                let list = ['teachers', 'pupils', 'news', 'gallery', 'appraisal'];
                window.addEventListener('load', ()=>{
                    let urlList = location.href.split('/');
                    let url = urlList[urlList.length-1];
                    for(let i=0; i<menuLinks.length; i++){
                        if(list[i]===url){
                            menuLinks[i].style = 'color: rgba(0,0,0,1);';
                        }
                    }
                })

                //---------------------------Modal window----------------------
                let win = document.querySelector('.messageModalWindow');
                let message = document.querySelector('.m');
                let len = message.innerHTML;

                document.addEventListener('DOMContentLoaded', ()=>{
                    if(len.length === 0){
                        win.style = 'transform: scaleY(0);';
                    }else{
                        win.style = 'transform: scaleY(1);';
                        setTimeout(()=>{
                            win.style = 'transform: scaleY(0);';
                        }, 10000)
                    }
                })

            </script>
            </body>
            </html>
            <?php
        }
    }