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
        
        <link href="<?php echo base_url('css/bootstrap-3.3.7/css/font.css'); ?>" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
       
      
      <script>
      
       function popup()
		{
			document.getElementById("popup").style.display="block";
		}
		function popupclose()
		{
			document.getElementById("popup").style.display="none";
		}
        
         function popup1()
		{
			document.getElementById("popup1").style.display="block";
		}
		function popupclose1()
		{
			document.getElementById("popup1").style.display="none";
		}
 
</script>
   <style>
   #popup
   {
	   	display:none;
   }
   
    #popup1
   {
	   	display:none;
   }
    
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
            span:hover{
	border-color:#63C;
	cursor:pointer;
	transform:scale(1.1);
   transition:all 1s;
   z-index:0;
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
            <div id="popup" style="background:rgba(0,0,0,0.5);height:100%;width:100%;position:fixed;z-index:9999;">
                 
                <button onClick="popupclose()" style="background:none;border:2px solid;border-color:white;padding:10px;float:right;color:white;margin-right:20px;margin-top:10px;">X</button>
                 <span id="FilePath1"></span>
                 
                 </div>
                 
             <div id="popup1" style="background:url('<?php echo base_url('images/back.jpeg');  ?> ');background-repeat:no-repeat;background-size:cover;height:100%;width:100%;position:fixed;z-index:9999;">
                 <div  style="background:rgba(0,0,0,0.7);height:100%;width:100%;position:fixed;z-index:10000;">
                  <div id="FilePath2" style="padding-top:20px"> </div>
               
                 
               </div>             
              </div>
                      
                 
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
        
    

  
        
         <div id="gif" style="position: fixed;top: 0;left: 0;width: 100%; height:100%;display: none; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat" > </div>

          <form name="form_master_download" id="form_master_download" method="GET">
        <div class="container"><br/><br/><br/><br/>
          
            <div class="well" style="padding: 15px 0 0px 0;">
                <div  style="margin-left: 20px;color:blue"><h3>&nbsp<img src="<?php echo @$user['picture']['data']['url']; ?>" alt="profile pic" height="40px" width="40px" />&nbsp&nbsp<?php if(isset($user['name'])) echo '<b style="color:black">'.@$user['name'] . '\'s albums</b>'; ?>&nbsp&nbsp&nbsp&nbsp<font color="orange"></font><?php if(@$_GET['a']) echo "Your Album is uploded.  "; ?></font><span id="FilePath"></span></h3>  </div>  
                <div>
                    <div class="row" style="margin: 0px 10px 0px 10px;">
                        <?php
                        $albumInd=0;$noofalbum=0;
                        foreach($fbAlbumData as $data)
                        {
                            //$array[$albumInd] = $key['picture']['url'];
                             $id = isset($data['id'])?$data['id']:'';
                             $name = isset($data['name'])?$data['name']:'';
                             $description = isset($data['description'])?$data['description']:'';
                             $link = isset($data['link'])?$data['link']:'';
                             $cover_photo_id = isset($data['cover_photo']['id'])?$data['cover_photo']['id']:'';
                             $count = isset($data['count'])?$data['count']:'';
                             $access_token = $_SESSION['fb_access_token'];
                             
                              $count = isset($data['count'])?$data['count']:'';
                            $photoCount = ($count > 1)?$count. ' Photos':$count. ' Photo';
                             
                             $noofalbum= $noofalbum + 1;
                                                 
                             
                             
                        ?>
                        
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb" style="border:1px;">
                                 <div class="bg-info" style="height: 30px;padding-top:4px;margin-bottom:3px;background-color:#CCC;color:#006">
                                
                                     <div class="col-xs-12">
                                               <b><span   name="<?php echo $id; ?>" id="<?php echo $id; ?>" onclick="test1(this);" value="<?php echo $name; ?>"  >View In LightBox </span></b>
                                     
                                         
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "<b>".$photoCount."</b>" ; ?>
                                     
                                        </div>
                                     
                                     
                                     </div>
                              
                                  
                                    
                                 <span class="thumbnail" name="<?php echo $id; ?>" id="<?php echo $id; ?>" onclick="test1(this);" style="padding: 0px 0px 0px 0px;   " value="">
                                    <img src="<?php echo "https://graph.facebook.com/v3.1/{$cover_photo_id}/picture?access_token={$access_token}"; ?>" class="img-thumbnail" alt="Cinque Terre" style="object-fit: cover;height:260px;width:100%" />
                                    
                                    </span>
                                     
                                    
                                   <div class="bg-info" style="height: 30px;padding-top: 2px;margin-top:-17px;margin-bottom:20px;background-color:#CCC;color:#006">
                                       
                                        <div class="col-xs-1" style="padding-top: 3px"  >
                                            <input type="checkbox" class="checkbox-inline checkbox" style="cursor:pointer" name="album<?php echo $albumInd; ?>" id="album<?php echo $albumInd; ?>"  value="<?php echo $id; ?>"  />
                                        </div>
 
                                        <div class="col-xs-7">
                                        <?php if($albumInd==0) { ?>
                                       <form id="non" name="non"></form>
                                       <?php } ?>
                                        <form method="post" action="<?php echo base_url('index.php/info/view_photo/'.@$id); ?>" name="form_down <?php echo $albumInd; ?>" id="form_down<?php echo $albumInd; ?>" >
                                                <b> <input class="col-xs-12" type="submit" name="form<?php echo $albumInd; ?>" id="<?php echo $id; ?>" value="<?php echo $name; ?>" style="background: transparent;border: none;margin-top: 3px;" title="<?php echo $name; ?>"/> </b>
                                          </form>
                                        </div>
                                        
                                        <div class="col-xs-1" style="padding-top: 3px;">
                                            <form method="post" name="form_download<?php echo $albumInd; ?>" id="form_download<?php echo $albumInd; ?>" >
                                                <input type="hidden" name="downloadId<?php echo $albumInd;  ?>" id="downloadId<?php echo $albumInd;  ?>" value="<?php echo $id; ?>"/>
                                                <input type="hidden" name="DAlbumName<?php echo $albumInd;  ?>" id="DAlbumName<?php echo $albumInd;  ?>" value="<?php echo $name; ?>"/>
                                                <button type="submit" name="form_download<?php echo $albumInd; ?>" id="form_download<?php echo $albumInd; ?>" value="" style="background: transparent;border: none;margin-top: 3px;" title=""><i class='glyphicon glyphicon-download-alt'></i></button>
                                          </form>
                                        </div>
                                        
                                        <div class="col-xs-1" style="padding-top: 1px;">
                                           <form method="post" name="form_move<?php echo $albumInd; ?>" id="form_move<?php echo $albumInd; ?>" action="<?php echo  site_url('index.php/info/ajax_zip/2'); ?>" > 
                                                <input type="hidden" name="moveId" value="<?php echo $id; ?>"/>
                                                <input type="hidden" name="AlbumName" value="<?php echo $name; ?>"/>
                                                <button type="submit" name="form_move<?php echo $albumInd; ?>" value="" style="background: transparent;border: none;margin-top: 3px;" title=""><img src="../images/GoogleDrive.ico" height="20px" width="20px"></img> </button> 
                                            </form>
                                        </div>
                                        
                                        <input type="hidden" name="albumsDownloadId<?php echo $albumInd; ?>" id="albumsDownloadId<?php echo $albumInd; ?>" value="<?php echo $id; ?>"/>
                                        <input type="hidden" name="AlbumNames<?php echo $albumInd; ?>" id="AlbumNames<?php echo $albumInd; ?>" value="<?php echo $name; ?>"/>  
                                     
                                    </div>
                                    
                                   
                                                               
                            </div>
                                             
                            
                         
                         
                        <script>
                            
                                
                                 $(document).ready(function () {
                                    $('#form_download<?php echo $albumInd; ?>').submit(function () {
                                        
                                        var downloadId = $("#downloadId<?php echo $albumInd; ?>").val();
                                        var DAlbumName=$("#DAlbumName<?php echo $albumInd; ?>").val();
                                        alert(DAlbumName + " album is downloading.... \n take seat it may take few miniutes");
                                         document.getElementById("gif").style = "position: fixed;top: 0;left: 0;width: 100%; height:100%;display: block; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat";
                                        $("#FilePath").html("Preparing zip file of your facebook album to download..........").addClass('alert');
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php echo  site_url('index.php/info/ajax_zip/1'); ?>',
                                            data: {'downloadId' :downloadId,'DAlbumName' : DAlbumName },
                                            success: function (data) { 
                                                document.getElementById("gif").style = "position: fixed;top: 0;left: 0;width: 100%; height:100%;display: none; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat";
                                                  $("#FilePath1").html(data).addClass('alert');
                                                   $("#FilePath").html("").addClass('alert');
                                                  popup();
                                               
                                            }
                                        });
                                        return false;
                                    });
                                });
                               
                            /*     $(document).ready(function () {
                                    $('#form_move<?php echo $albumInd; ?>').submit(function () {
                                        
                                        var moveId = $("#moveId<?php echo $albumInd; ?>").val();
                                        var MAlbumName=$("#MAlbumName<?php echo $albumInd; ?>").val();
                                        alert(MAlbumName + " album is downloading.... ");
                                         document.getElementById("gif").style = "position: fixed;top: 0;left: 0;width: 100%; height:100%;display: block; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat";
                                        $("#FilePath").html("Album is Being uploading to Your Drive..........").addClass('alert');
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php echo  site_url('index.php/info/ajax_zip/2'); ?>',  
                                            data: {'moveId' :moveId,'MAlbumName' : MAlbumName },
                                            success: function (data) {
                                                document.getElementById("gif").style = "position: fixed;top: 0;left: 0;width: 100%; height:100%;display: none; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat";
                                                $("#FilePath").html(data).addClass('alert');
                                            }
                                        });
                                        return false;
                                    });
                                });*/
                               
                                
                                
                      </script>
                      
                      
                      
                      
                      
                           <?php
                            $albumInd = $albumInd + 1;
                        }
                        ?>
                    </div>
                </div>
                
                <h4 style="color:red">&nbsp;&nbsp; If you want to Download/Move all album then first checked SelectAll and click on below button.</h4>
                <div class="bg-info" style="min-height:45px;background-color:#DADADA">
                    
                    <div class=" col-lg-2 col-sm-3 col-lg-offset-1 col-sm-offset-1 col-xs-4" style="margin-top: 12px;">
                        <input type="checkbox" class="checkbox-inline col-lg-2 col-sm-2 col-xs-2" id="select_all"/> <div class="col-lg-9 col-sm-10 col-xs-10"><b>Select All</b></div>
                    </div>
                    
                   
                        <input type="hidden" name="noofalbum" id="noofalbum" value="<?php echo $noofalbum; ?>"/>
                        
                        <button type="submit" class="btn btn-info col-lg-2 col-sm-2 col-lg-offset-1 col-sm-offset-1" id="form_master_download" name="form_master_download"  style="margin-top: 5px;background-color:#666666" value="2" ><i class="glyphicon glyphicon-download-alt" ></i> Download Selected / All</button>
                    
                        <button type="submit" class="btn btn-info col-lg-2 col-sm-2 col-lg-offset-1 col-sm-offset-1" id="form_master_move1" name="form_master_move1" style="margin-top: 5px;background-color:#666666" value="1" onClick="setval(this);"> <img src="../images/GoogleDrive.ico" height="20px" width="20px"></img>&nbsp; Move Selected / All</button> 
                    </form>
                    
                </div>
                
                <div id="backblack" style="display: none; position: absolute; top:0px;left:0px;z-index: 1980;height:100%;width:100%;background: black;opacity: 0.7;"></div>
                <div id="summary" style="display: none; position: absolute; top:0px;left:0px;z-index: 1990;height:100%;width:100%;">
                    <div class="col-lg-1 col-lg-offset-11 col-sm-1 col-sm-offset-11 col-xs-2 col-xs-offset-10"> 
                        <a href="#" id="close" class="right" style="color: white;"><i class="glyphicon glyphicon-remove-sign"></i></a>
                    </div>
                </div>
            </div>
            
        

        </div>     
        <script>
            
            
             var s="";
             function setval(element)
             {
                 s=element.value;
                 
             }
            
            
            
             function test1(element)
             {
                  
                  document.getElementById("gif").style = "position: fixed;top: 0;left: 0;width: 100%; height:100%;display: block; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat";
                 
                 var album_id=element.id;
                 var name=element.value;
                $.ajax({
                    type: 'GET',
                    url: '<?php echo  site_url('index.php/Signin/photo/'); ?>'+ album_id,
                    data: {'name' :name},
                    success: function (data) {
                    document.getElementById("gif").style = "position: fixed;top: 0;left: 0;width: 100%; height:100%;display: none; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat";
                    $("#FilePath2").html(data).addClass('alert');
                    $("#FilePath").html("").addClass('alert');
                    popup1();
                
                  }
                });
                return false;
               
             }
            
              $("#select_all").change(function () {
                    var status = this.checked;
                                              
                    $('.checkbox').each(function () {
                        this.checked = status;
                    });
                        
                     
                            
                            
                });
                
                $('.checkbox').change(function () {
                    
                                        
                    if (this.checked == false) {
                        $("#select_all")[0].checked = false;
                    }
                    if ($('.checkbox:checked').length == $('.checkbox').length) {
                        $("#select_all")[0].checked = true;
                    }
                });
                
                
                  $(document).ready(function () {
                    $('#form_master_download').submit(function () {
                        
                    if(s!=1) 
                    {
                        $("#FilePath").html("Preparing zip file of your facebook albums to download..........").addClass('alert');
                        alert("Your Album is downloading....");
                        alert("It will may take a time it's depends upone your albums photos and internet speed");
                        document.getElementById("gif").style = "position: fixed;top: 0;left: 0;width: 100%; height:100%;display: block; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat";
                        $.ajax({
                            type: 'GET',
                            url:"https://kishanakworld.000webhostapp.com/index.php/info/downloadall" ,
                            data:$('#form_master_download').serialize(),
                            success: function (data) {
                                document.getElementById("gif").style = "position: fixed;top: 0;left: 0;width: 100%; height:100%;display: none; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat";
                                 $("#FilePath1").html(data).addClass('alert');
                                                   $("#FilePath").html("").addClass('alert');
                                                  popup();
                            }
                        });
                        return false;
                     }
                     else
                     {
                          alert("Your Album is Uploading....");
                          alert("Close the tab in case of taking long time.And Check Your Drive Album Is being Uploading."); 
                      
                            document.getElementById("gif").style = "position: fixed;top: 0;left: 0;width: 100%; height:100%;display: block; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat";
                            mydata=$('#form_master_download').serialize();
                            window.location = 'https://kishanakworld.000webhostapp.com/index.php/info/downloadall/1?'+mydata;
                            return false;
                            
                          
                        
                     }
                    });
                  });
            
        </script>
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
            <a style="color:white" href="#"><i class="fa fa-facebook-official fa-2x"></i></a>
            <a style="color:white" href="#"><i class="fa fa-pinterest-p fa-2x"></i></a> 
            <a style="color:white" href="#"><i class="fa fa-twitter fa-2x"></i></a>
            <a style="color:white" href="#"><i class="fa fa-flickr fa-2x"></i></a> 
            <a style="color:white" href="#"><i class="fa fa-linkedin fa-2x"></i></a>

            <p class="h6" style="color:white">
                Powered by kishanwolrd.com
                <a href="https://kishanakworld.000webhost.com " target="_blank"></a>
            </p>
        </div>
    </footer>
</body> 

</html>
