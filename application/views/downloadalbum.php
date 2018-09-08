 
                 
        <br/><br/><br/>
          
        <div class="w3-content w3-section" style="max-width:auto;margin-left:80px;  ">
            
             
                      
              <?php 
              
              if(@$aname)
              {
                  
                  $i=0; foreach(@$data as $name) { 
                $path=base_url('uploads/'.$name.'.zip'); ?>
                <div style="width:300px;height:80;float:left;margin-left:15px;margin-bottom:10px;">
                <a href="<?php echo $path; ?>" download="<?php echo $path; ?>"> <img src="<?php echo base_url('images/images.jpg'); ?>" width="140px" height="60px"/> <?php if(@$aname) echo '<b style="color:FFA500">'.@$aname[$i].'</b>';   ?>  </a><br/>
                </div>
              <?php  $i=$i+1;
                } 
                
                  
              }
              else
              {
              $i=0; foreach(@$data as $name) { 
                $path=base_url('uploads/'.$name.'.zip'); ?>
                <div style="width:300px;height:80;float:left;margin-left:15px;margin-bottom:10px;">
                <a href="<?php echo $path; ?>" download="<?php echo $path; ?>"> <img src="<?php echo base_url('images/images.jpg'); ?>" width="140px" height="60px"/> <?php if(@$album_name) echo '<b style="color:FFA500">'.@$album_name.'</b>';   ?>  </a><br/>
                </div>
              <?php  $i=$i+1;
                } 
              
              }
              echo '<br style=" clear: both;" />';
              echo '<center><h4 style="color:yellow"> <b><i><u>Download Your Album From Above Link.</u></i></b> </h4></center>';
            ?>
            
        </div>
 