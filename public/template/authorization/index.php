<?php

function getHtml(){
    ?>
    <!DOCTYPE html>
    <!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
    <!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
    <!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
    <!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Авторизация</title>
        <link rel="stylesheet" href="public/css/authorization/style.css">
        <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    <body>

    <section class="container">
        <div class="login">
            <h1>Авторизация</h1>
            <form method="post" action="volidation">
                <p><input class="input_1" type="text" name="name" placeholder="Имя"></p>
                <p><input class="input_2" type="password" name="password" placeholder="Пороль"></p>
                <p class="remember_me">
                    <label>
                        <input class="chek" type="checkbox" name="remember_me"  id="remember_me">
                        Поля заполнены !
                    </label>
                </p>
                <br>
                <p class="submit"><input class="input_button" type="submit" name="commit" value="Вход"></p>
            </form>
        </div>

    </section>

    <script type="text/javascript">

        let val_1 = document.querySelector('.input_1');
        let val_2 = document.querySelector('.input_2');
        let chek = document.querySelector('.chek');
        let val_button = document.querySelector('.input_button');

        document.addEventListener('DOMContentLoaded', ()=>{
            val_1.value = "";
            chek.checked = "";
        })

        let b = new Map([
            ['bool_1', false],
            ['bool_2', false]
        ])

        let count_1;
        val_1.addEventListener('blur', ()=>{
            count_1 = val_1.value.length;
            if(count_1 < 3){
                b.set('bool_1', false);
                val_1.style = "border-color: red;";
            }else{
                b.set('bool_1', true);
                val_1.style = "border-color: #c4c4c4 #d1d1d1 #d4d4d4;";
            }
        })
        val_1.addEventListener('focus', ()=>{
            chek.checked = "";
        })

        let count_2;
        val_2.addEventListener('blur', ()=>{
            count_2 = val_2.value.length;
            if(count_2 < 3){
                b.set('bool_2', false);
                val_2.style = "border-color: red;";
            }else{
                b.set('bool_2', true);
                val_2.style = "border-color: #c4c4c4 #d1d1d1 #d4d4d4;";
            }
        })
        val_2.addEventListener('focus', ()=>{
            chek.checked = "";
        })

        val_button.addEventListener('mouseover', ()=>{
            if(b.get("bool_1") && b.get("bool_2") && chek.checked){
                val_button.disabled = false;
                val_button.style = 'cursor: pointer;'
            }else{
                val_button.disabled = true;
                val_button.style = 'cursor: no-drop;'
            }
        })



    </script>
    </body>
    </html>
    <?php
}

