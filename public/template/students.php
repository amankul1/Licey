<?php

   class Students{
      private $students_list=[];
      function __construct($list){
         $this->students_list = $list;
      }

      function getContext(){
         ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" href="./public/css/students.css">
               <title>Students</title>
            </head>
            <body>
                <div class="wrapper">
                  <a id = "back" href="parents">
                      <div class="backBut">
                          < Назад
                      </div>
                  </a>
                  <div class="search">
                     <input class="inputText" type="text" placeholder="Введите имя студента">
                     <button class="searchButton">Найти</button>
                  </div>
                  <table>
                     <tr>
                        <th>№</th>
                        <th>Имя/Фамилия</th>
                        <th>Профиль</th>
                     </tr>
                     <?php
                        for ($i=0; $i < count($this->students_list); $i++) { 
                           ?>
                              <tr class="row">
                                 <td><?=$i+1?></td>
                                 <td class="studentName"><?=$this->students_list[$i]['name'];?></td>
                                  <td class="profileButton"><button>Оценки</button></td>
                                 <span class="student_id" style="display:none;"><?=$this->students_list[$i]['id'];?></span>
                              </tr>
                           <?php
                        }
                     ?>
                  </table>
                </div>

                <script type="text/javascript">
                     window.onload = function(){

                        let search = document.querySelector(".searchButton");
                        let priceBut =document.querySelectorAll(".profileButton");
                        let student_id = document.querySelectorAll('.student_id');
                        let student_name = document.querySelectorAll('.studentName');

                        search.addEventListener("click", ()=>{
                           let row = document.querySelectorAll(".row");
                           let students = document.querySelectorAll(".studentName");
                           let inputText = document.querySelector('.inputText');
                           let name = inputText.value;
                           name = name.trim();

                           for(let i=0; i<students.length; i++){
                              if(students[i].innerHTML.indexOf(name) === 0){
                                 row[i].style = "position: relative;transform: scale(1);";
                              }else{
                                 row[i].style = "position: absolute; transform: scale(0);";
                               }
                           }
                        })
                        
                        for(let i= 0; i<priceBut.length; i++) {
                           priceBut[i].addEventListener("click", ()=>{
                               $str = "profile?id="+student_id[i].innerHTML+"&name="+student_name[i].innerHTML;
                              location.href = $str;
                           });
                        }

                     }
                </script>
            </body>
            </html>
         <?php
      }

   }

?>
