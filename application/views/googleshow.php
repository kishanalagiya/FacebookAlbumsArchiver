<html>
    <head>
        <meta charset="UTF-8">
        <title>Facebok Album Archiver</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?php echo base_url('libs/SliderTheme/responsiveslides.min.js'); ?>"></script>
         <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-3.2.1.min.js'); ?>">
        </script>  
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-3.3.7/css/bootstrap.min.css'); ?>"/>
        
        <script type="text/javascript" src="<?php echo base_url('css/js/1.js'); ?>" async></script>
        <script src="<?php echo base_url('css/bootstrap-3.3.7/js/bootstrap.min.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('libs/SliderTheme/responsiveslides.css'); ?>">
        <link rel="stylesheet" href=" <?php echo base_url('libs/SliderTheme/themes.css'); ?>"> 
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('images/favicon.ico'); ?>" /> 
       <script type="text/javascript" src="<?php echo base_url('libs/SliderTheme/responsiveslides.min.js'); ?>" ></script>
        <link href="<?php echo base_url('css/bootstrap-3.3.7/css/font.css'); ?>" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <style>
            div.horizontal {
                display: flex;
                justify-content: center;
            }

            div.vertical {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            .frame {
                white-space: nowrap;
                text-align: center; margin: 1em 0;
            }

            .helper {
                display: inline-block;
                height: 100%;
                vertical-align: middle;
            }

        </style>
        <script>
            $(function () {
                $("#slider3").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: true,
                    speed: 600,
                    namespace: "large-btns"
                });

            });
            $(document).ready(function () {
                $('#close').click(function () {
                    document.getElementById("summary").style = 'display:none;\n\
                    position: absolute; top:0px;left:0px;z-index: 1999;\n\
                    height:100%;width:100%;';
                    document.getElementById("backblack").style = 'display:none;\n\
                    position: absolute; top:0px;left:0px;z-index: 1980;\n\
                    height:100%;width:100%;background: black;opacity: 0.7;';
                });
            });
        </script>

    </head>
    <body>
         
             <div class="col-lg-12"><div class="rslides_container"> 
              
                 <ul class="rslides" id="slider3" style="display:table;"> 
            
            <?php  foreach(@$fbPhotoData as $data) { ?>
            <li style="height:100%;"><div class="horizontal frame"><div class="vertical helper"><img class="img-responsive" src="<?php echo $data; ?>" style="max-height: 570px;width:auto;"  alt="" /></div> <button onClick="popupclose1()" style="margin-right:5px;background-color:#009;border:2px solid;border-color:white ;color:#CF3 ;height:30px">X</button></div></li>
            <?php } ?>
            </ul></div> 
             
    </body>
</html>

               
        
    </body>
</html>
