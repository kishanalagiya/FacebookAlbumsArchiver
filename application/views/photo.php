<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8">
  <title>Lightbox Gallery</title>
  <link rel="stylesheet" href="<?php echo base_url('css/lightbox.min.css'); ?> ">
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-3.3.7/css/bootstrap.min.css'); ?>"/>
        <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-3.2.1.min.js'); ?>">
        </script>   
       
        <script src="<?php echo base_url('css/bootstrap-3.3.7/js/bootstrap.min.js'); ?>"></script>
      
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('images/favicon.ico'); ?>" /> 
         
  <script src="<?php echo base_url('css/lightbox-plus-jquery.min.js'); ?>"></script>
           <script>
    lightbox.option({
      
      'disableScrolling':true,
      'wrapAround': true
    })
</script>
  
 

  <style>
      
 
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
                        <li><a href="https://www.facebook.com/profile.php" target="_blank">Facebook Profile</a></li>
                       <!-- <li><a href="#">Archived Albums</a></li> -->
                        <li><a href="<?php echo site_url('index.php/info/logout'); ?>">Logout</a></li>
                        
                        
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        
    
     
    <br/><br/><br/> 
     <div class="container">
          <div class="well" >
              <h3 style="margin-top:-10px;">LightBox Gallery </h3>
               
              
         <div class="row">
         
        <?php $i=1; foreach(@$fbPhotoData as $data) { ?>
        <div class="col-md-3" style="margin-bottom:10px;">
       <a class="example-image-link" href="<?php echo $data; ?>" data-lightbox="example-set" data-title="Click anywhere outside the image or Press X to close This Window."> 
       <img src="<?php echo $data; ?>" class="img-thumbnail" alt="Cinque Terre" style="height:250px;width:100%">  </a>
         </div> 
         <?php } ?>
         
         </div>
         </div>
    </div>
 

 <footer class="footer p-t-1" style="background-color:black">
        <div class="container">
            <div class="pull-right">
                <nav class="navbar" style="background:transparent; color:white;">
                    <nav class="nav navbar-nav pull-xs-left"><br/>
                          <a class="nav-item nav-link" href="#"><h4 style="color:white">Developed By : Keesan Aalagiya</h4></a>
                    </nav>
                </nav>
            </div>
 <br/>
            

            <p class="h6" style="color:white">
                Powered by kishanwolrd.com
                <a href="https://kishanakworld.000webhost.com " target="_blank"></a>
            </p>
        </div>
    </footer>
</body> 

</html>
