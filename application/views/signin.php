<!DOCTYPE html>
<html>
    <head>
<title>Login Archive Facebook albums</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-3.3.7/css/bootstrap.min.css'); ?>" >
<link href="<?php echo base_url('css/bootstrap-3.3.7/css/creative.min.css'); ?>" rel="stylesheet" >
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'/>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('images/favicon.ico'); ?>" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
     function myFunction()
     {
         
         
         alert("welcome to Album archiver, please click on facebook login button");
        // alert("if you redirect to same page after login click, please click again on login");
        // alert("may be currently facebook can't give us access token sit will give only my photos..");
     }
</script>
 
</head>
 
<body id="page-top" onload="myFunction()">


    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
               
                 <a style="color:#FFA500" class="navbar-brand page-scroll" href="<?php echo site_url('index.php/info'); ?>">About Developer</a> 
                 <a class="navbar-brand page-scroll" href="mailto:kishanaalagiya109@gmail.com"> mail To : <b style="color:#FFA500">kishanaalagiya109@gmail.com</b> for add as tester request.</a>
            </div>
        </div>
    </nav>

    <header style="background-image:url(<?php echo base_url('images/header.jpg'); ?>) ">
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Archive Facebook albums</h1>  
                <hr>
                <p><h3>Login to archive your facebook photo albums 
                    to your local drive or your google drive.</h3></p>
                <a href="<?php echo $this->facebook->login_url(); ?>">
                     <img src="<?php echo base_url('images/fb.png'); ?>" width="30%" height="auto"></a> 
                </a>
                <br/><br/><br/> 
                <h4><bold style="color:#FFA500;">Developed By : Keesan V. Aalagiya</bold></h4>
            </div>
        </div>
        
    </header>
    </body>
   
</html>
