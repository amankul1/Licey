<?php

class SubGallery{

    function getContent($list, $type){

        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>sub gallery </title>
                <style type="text/css">
                    *{
                        margin: 0;
                        padding: 0;
                        left: 0;
                        box-sizing: border-box;
                    }
                    body{
                        position: relative;
                    }
                    .galleryType {
                        width: 100%;
                        height: 10vh;
                        background-color: white;
                        color: aqua;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        padding: 0 10vw 0 10vw;
                        border-bottom: 1px solid paleturquoise;
                    }
                    .galleryType a{
                        position: relative;
                        text-decoration: none;
                        color: aqua;
                        font-size: 16px;
                        font-weight: bold;
                    }
                    .galleryWrapper{
                        width: 100vw;
                        display: flex;
                        flex-wrap: wrap;
                        align-items: flex-start;
                        justify-content: space-between;
                        padding: 0 10vw 0 10vw;
                        background-image: url("https://lh3.googleusercontent.com/proxy/68NS3GMsJnurIgU5z3iBRUXT8ntef38_ELOdpcz2a9tblghYt4VPPk9oXu3G4tshvpWJim32ZuAEIbwwHJxjJ-8xeqTfF7Y8VCsgw-T04g");
                        background-repeat: repeat-y;
                        background-size: cover;
                        min-height: 90vh;
                    }
                    .imageWrapper{
                        width: 320px;
                        height: 350px;
                        overflow: hidden;
                        background-color: rgba(0,0,0,0.3);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        padding: 5px;
                        margin: 20px 0 10px 0;
                    }
                    .image{
                        position: center;
                        max-height: 340px;
                        max-width: 310px;
                    }
                    .activ{
                        margin:0;
                        padding: 0;
                        width: 100vw;
                        height: 100vh;
                        position: fixed;
                        z-index: 100;
                        background-color: rgba(0, 0, 0, 0.9);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .activ_1{
                        height: 100vh;
                        width: auto;
                        height: auto;
                    }
                    .activ_2{
                        position: absolute;
                        z-index: 0;
                    }
                </style>

            </head>
             <body>
                <div class="galleryType">
                    <span> <a href="galery"> < Back</a> </span>
                    <span> <h2><?=$type?></h2></span>
                </div>
                 <div class="galleryWrapper">
                     <?php
                     if($list){
                         for($j=0; $j<count($list); $j++){
                             ?>
                             <div class="imageWrapper">
                                 <img class="image" src="data:image/jpeg;base64,<?=$list[$j]->image?>" >
                             </div>
                             <?php
                         }
                     }
                     ?>
                 </div>
                 <script type="text/javascript">
                     (()=>{
                         let image_frames = document.querySelectorAll('.imageWrapper');
                         let images = document.querySelectorAll('.image');
                         let header = document.querySelector('.galleryType');


                        let b = true;
                         for (let i = 0; i < image_frames.length; i++) {
                             image_frames[i].addEventListener("click", ()=>{
                                 image_frames[i].classList.toggle('activ');
                                 images[i].classList.toggle('activ_1');
                                 header.classList.toggle('activ_2');
                                 if(b){
                                     alert('Что бы закрыть картинку нажми на него!');
                                     b=false;
                                 }
                             });

                         }

                     })();
                 </script>
             </body>
            </html>

        <?php
    }
}
