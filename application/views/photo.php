<!DOCTYPE html>
<html>
    <head>
        <title>Slid-show</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
         <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-3.3.7/css/bootstrap.min.css'); ?>"/>
        <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-3.2.1.min.js'); ?>">
        </script>   
        <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
        <script src="<?php echo base_url('css/bootstrap-3.3.7/js/bootstrap.min.js'); ?>"></script>
           
        <style>
            .mySlides {display:none;}
        </style>
    </head>

    <body>
        

        
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <div id="navbar" class="collapse navbar-collapse ">
                    <ul class="nav navbar-nav">              
                        <li class="active"><a href="<?php echo site_url('index.php/Signin'); ?>">Home</a></li>
                        <li><a href="Facebook.php">Facebok Profile</a></li>
                        <li><a href="ArchivedImages.php">Archived Albums</a></li>
                        <li><a href="<?php echo site_url('index.php/info/logout'); ?>">Logout</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        
        <div class="w3-content w3-section" style="max-width:auto; ">
            <?php foreach($fbPhotoData as $data) { ?>
            <img class="mySlides" src="<?php echo $data; ?>" style="width:100%;height:620px">
         <?php } ?>
        </div>

        <script>
        var myIndex = 0;
        carousel();

        function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if(myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 2000); // Change image every 2 seconds
        }
        </script>

    </body>
</html>
