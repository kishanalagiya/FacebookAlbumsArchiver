<html>
    <head>
        <meta charset="UTF-8">
        <title>Facebok Album Archiver</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-3.3.7/css/bootstrap.min.css'); ?>"/>
        <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-3.2.1.min.js'); ?>">
        </script>   
        <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
        <script src="<?php echo base_url('css/bootstrap-3.3.7/js/bootstrap.min.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('libs/SliderTheme/responsiveslides.css'); ?>">
        <link rel="stylesheet" href=" <?php echo base_url('libs/SliderTheme/themes.css'); ?>">
        <script src="<?php echo base_url('libs/SliderTheme/responsiveslides.min.js'); ?>"></script>
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
        <div ID="gif" style="position: fixed;top: 0;left: 0;width: 100%; height:100%;display: none; z-index:1999;background: url('./../images/loading_1.gif') 50% 50% no-repeat" > </div>
   <form name="form_master_download" id="form_master_download" action="<?php echo site_url('index.php/info/downloadall'); ?>">
        <div class="container"><br/><br/><br/><br/>
            <span id="FilePath"></span>
            <div class="well " style="padding: 15px 0 0px 0;">
                <div  style="margin-left: 20px;"><?php echo $user['name'] . '\'s albums'; ?></div> <br/>
                <div>
                    <div class="row" style="margin: 0px 10px 0px 10px;">
                        <?php
                        $albumInd=0;$noofalbum=0;
                        foreach ($fbAlbumData as $data)
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
                                 <div class="bg-info" style="height: 30px;padding-top:4px;margin-bottom:3px;">
                                
                                     <div class="col-xs-6">
                                             <?php echo "<b> <a href='{$link}' target='_blank'>View on FB</a></b>"; ?>
                                     
                                        </div>
                                        <div class="col-xs-6">
                                             <?php echo "<b>".$photoCount."</b>" ; ?>
                                     
                                        </div>
                                     
                                     
                                     </div>
                              
                                <a class="thumbnail" style="padding: 0px 0px 0px 0px;" href="<?php echo site_url('index.php/info/view_photo?album_id='.$id.'&album_name='.$name); ?>">
                                    
                                    <div class="img-responsive" style="height:148px;background-size:cover;overflow:auto; background:url(<?php echo "https://graph.facebook.com/v3.1/{$cover_photo_id}/picture?access_token={$access_token}"; ?> )" center no-repeat>
                                    </div> 
                                    </a>
                                    
                                   <div class="bg-info" style="height: 30px;padding-top: 2px;margin-top:-17px;margin-bottom:20px">
                                       
                                        <div class="col-xs-1" style="padding-top: 3px;">
                                            <input type="checkbox" class="checkbox-inline checkbox" name="album<?php echo $albumInd; ?>" id="album<?php echo $albumInd; ?>"  value="<?php echo $id; ?>" />
                                        </div>
                                        
                                        <div class="col-xs-7">
                                            <form method="post" name="form<?php echo $albumInd; ?>" id="form<?php echo $albumInd; ?>">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                               <b> <input class="col-xs-12" type="submit" name="form<?php echo $albumInd; ?>" value="<?php echo $name; ?>" style="background: transparent;border: none;margin-top: 3px;" title="<?php echo $name; ?>"/></b>
                                            </form>
                                        </div>
                                        
                                        <div class="col-xs-1" style="padding-top: 3px;">
                                            <form method="post" name="form_download<?php echo $albumInd; ?>" id="form_download<?php echo $albumInd; ?>" action="<?php echo  site_url('index.php/info/ajax_zip/1'); ?>">
                                                <input type="hidden" name="downloadId" id="downloadId" value="<?php echo $id; ?>"/>
                                                <button type="submit" name="form_download<?php echo $albumInd; ?>" value="" style="background: transparent;border: none;margin-top: 3px;" title=""><i class='glyphicon glyphicon-download-alt'></i></button>
                                            </form>
                                        </div>
                                        
                                        <div class="col-xs-1" style="padding-top: 1px;">
                                            <form method="post" name="form_move<?php echo $albumInd; ?>" id="form_move<?php echo $albumInd; ?>">
                                                <input type="hidden" name="moveId" value="<?php echo $id; ?>"/>
                                                <input type="hidden" name="AlbumName" value="<?php echo $name; ?>"/>
                                               <a href="<?php echo $this->google->loginURL(); ?>" <button class="" type="submit" name="form_move<?php echo $albumInd; ?>" value="" style="background: transparent;border: none;margin-top: 3px;" title=""><img src="../images/GoogleDrive.ico" height="20px" width="20px"></img> </button></a>
                                            </form>
                                        </div>
                                        
                                        <input type="hidden" name="albumsDownloadId<?php echo $albumInd; ?>" id="albumsDownloadId<?php echo $albumInd; ?>" value="<?php echo $id; ?>"/>
                                        <input type="hidden" name="AlbumNames<?php echo $albumInd; ?>" id="AlbumNames<?php echo $albumInd; ?>" value="<?php echo $name; ?>"/>
                                    
                                    </div>
                                    
                                   
                                                               
                            </div>
                                             
                            
                            <?php
                            $albumInd = $albumInd + 1;
                        }
                        ?>
                    </div>
                </div>
                <div class="bg-info" style="min-height:45px;">
                    
                    <div class=" col-lg-2 col-sm-3 col-lg-offset-1 col-sm-offset-1 col-xs-4" style="margin-top: 12px;">
                        <input type="checkbox" class="checkbox-inline col-lg-2 col-sm-2 col-xs-2" id="select_all"/> <div class="col-lg-9 col-sm-10 col-xs-10">Select All</div>
                    </div>
                    
                   
                        <input type="hidden" name="noofalbum" id="noofalbum" value="<?php echo $noofalbum; ?>"/>
                        <button type="submit" class="btn btn-info col-lg-2 col-sm-2 col-lg-offset-1 col-sm-offset-1" name="form_master_download" style="margin-top: 5px;"><i class="glyphicon glyphicon-download-alt"></i> Download</button>
                    
                        <button class="btn btn-info col-lg-2 col-sm-2 col-lg-offset-1 col-sm-offset-1" name="form_master_move" style="margin-top: 5px;"><img src="../images/GoogleDrive.ico" height="20px" width="20px"></img>&nbsp; Move</button>
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
        
  
    </body>
</html>

