<?php defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
  
 
class User_Authentication extends CI_Controller
{ 
    function __construct()
    {
        parent::__construct();
             
        //load google login library
        $this->load->library('google');
        $this->load->library('facebook');
        $this->load->library('session');
        
    }
    
    public function index()
    {
         echo '<script>alert("it may take long time, take a seat and rest...");</script>';
         redirect('index.php/User_authentication/index1?code='.$_GET['code']);
        
    }
    
    public function index1()
    {
         if($this->session->userdata('valid')!=89053)
         {
              
             redirect('index.php/signin?a=1');
         }
         
        try{ 
        // echo "please wait for 10 minutes i will fix it";
       
        if(isset($_GET['code']))
        {
           //authenticate user
           $this->google->getAuthenticate1($_GET['code']);
           // $this->google->getAuthenticate();
           //get user info from google*/
           /*$gpInfo = $this->google->getUserInfo1();
            
            //preparing user information
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            $userData['first_name']     = $gpInfo['given_name'];
            $userData['last_name']      = $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
            $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
            $userData['profile_url']    = !empty($gpInfo['link'])?$gpInfo['link']:'';
            $userData['picture_url']    = !empty($gpInfo['picture'])?$gpInfo['picture']:'';*/
            
            //store status & user info in session
            $this->session->set_userdata('loggedIn', true);
           
           // $this->session->set_userdata('userData', $userData);
         
             
            $album['data']=@$_SESSION['google'];
            $zipdata=@$_SESSION['plist'];
            //$album['gpinfo']=$gpInfo;
            
            $this->session->set_userdata('access_token',$this->google->getAccessToken1());
            $service = new Google_Service_Drive($this->google->getClient1());
            $folderName="facebook_".$this->session->userdata('user')."_albums";
           $fileMetadata = new Google_Service_Drive_DriveFile(array(
                             'name' => $folderName,
                             'mimeType' => 'application/vnd.google-apps.folder'));
                                $file = $service->files->create($fileMetadata, array(
                                 'fields' => 'id'));
                    $folder= $file->id;
                    
                  
            if($zipdata != NULL)
            {
                 $this->google->getAuthenticate1($_GET['code']);
                  $service = new Google_Service_Drive($this->google->getClient1());
                         $folderName= $this->session->userdata('aname');
                         
                            $fileMetadata = new Google_Service_Drive_DriveFile(array(
                             'name' => $folderName,
                             'mimeType' => 'application/vnd.google-apps.folder',
                             'parents' => array($folder)
                             ));
                             
                                $file = $service->files->create($fileMetadata, array(
                                 'fields' => 'id'));
                        $fid=$file->id;
                
               header( "refresh:16;url=https://kishanakworld.000webhostapp.com/index.php" );
               foreach($zipdata as $name)
               { 
                   
                 $name1=explode("?",$name);
                  
                 $file = new Google_Service_Drive_DriveFile();
                 $file->setName(basename($name1[0]));
                 $file->setDescription('A test document');
                 $file->setMimeType('image/jpeg');
                 $file->setParents(array($fid));

                 $data = file_get_contents($name);
                 $createdFile = $service->files->create($file, array(
                 'data' => $data,
                 'mimeType' => 'image/jpeg',
                 'uploadType' => 'multipart'
                 ));
                   
                   
                   
                }  
            
                
		        $this->session->unset_userdata('plist');
		        $this->session->unset_userdata('aname');
		          $name="facebook_".$this->session->userdata('user')."_albums";
	           echo '<script> alert("Your Album wil Save Into Your Google Drive.\n Google Drive Folder Name : '.@$name.'  "); 
	           window.location="https://kishanakworld.000webhostapp.com/index.php/Signin?a=1";
	           
	           </script> ';
		          
           
            }
            else
            {
                $this->google->getAuthenticate1($_GET['code']);
                $total= $_SESSION['album_id'];
                $albumName=$_SESSION['folder'];
                $folderid=array();
                 header( "refresh:16;url=https://kishanakworld.000webhostapp.com/index.php" );
                foreach($albumName as $id)
	        	{
	        	    
	        	         $service = new Google_Service_Drive($this->google->getClient1());
                         $folderName=$id;
                         
                            $fileMetadata = new Google_Service_Drive_DriveFile(array(
                             'name' => $folderName,
                             'mimeType' => 'application/vnd.google-apps.folder',
                             'parents' => array($folder)
                             ));
                             
                                $file = $service->files->create($fileMetadata, array(
                                 'fields' => 'id'));
                                 array_push($folderid,$file->id);
	        	     
	        	}
	            $i=0;
	            $this->session->unset_userdata('album_id');
	        	 $this->session->unset_userdata('folder');
                foreach($total as $id)
	        	{
		     
		             $album_id = $id;
	                 $access_token = $_SESSION['fb_access_token'];
                      $url ="https://graph.facebook.com/v3.1/".$album_id."/photos?fields=images%2Calbum&access_token={$access_token}";
                      $pic=file_get_contents($url);
                      $pictures=json_decode($pic);
            
                     if($pictures->data!=NULL)
                     {
                        $page=(array)$pictures->paging;
                        do
                         {
                             foreach($pictures->data as $my)
                             { 
                                $name=explode("?",$my->images[0]->source);
                                $file = new Google_Service_Drive_DriveFile();
                                $file->setName(basename($name[0]));
                                $file->setMimeType('image/jpeg');
                                $file->setParents(array($folderid[$i]));
                                $data = file_get_contents($my->images[0]->source);
                                $createdFile = $service->files->create($file, array(
                                 'data' => $data,
                                 'mimeType' => 'image/jpeg',
                                 'uploadType' => 'multipart'
                                 ));
        
                                  
                             }
                            if(array_key_exists("next",$page))
                             {
                                    $url=$page["next"];
                                    $pic=file_get_contents($url);
                                    $pictures=json_decode($pic);
                                    $page=(array)$pictures->paging;
                             }
                             else
                             {
                                     $url='none';       
                              }
        
                         }while($url!='none');    
             
                
                    }
                    $i=$i+1;
    
	        	}
	        	 
	        	  
	              $name="facebook_".$this->session->userdata('user')."_albums";
	           echo '<script> alert("Your Album wil Save Into Your Google Drive.\n Google Drive Folder Name : '.@$name.'  ");
	           
	             window.location="https://kishanakworld.000webhostapp.com/index.php/Signin?a=1";
	            </script> ';
		        
		        
                
            }
        }
        else
        {
            redirect("index.php/signin");
        }
    }catch(Exception $e)
    {
         echo '<script> alert("Your Album wil Save Into Your Google Drive.");
	           
	             window.location="https://kishanakworld.000webhostapp.com/index.php/Signin";
	            </script> ';
    }
         
     
    }
    
   /* public function profile()
    {
        //redirect to login page if user not logged in
        if(!$this->session->userdata('loggedIn'))
        {
            redirect('googleshow',$data);
        }
        
        //get user info from session
        $data['userData'] = $this->session->userdata('userData');
        
        //load user profile view
        $this->load->view('user_authentication/profile',$data);
    }*/
    
  
    
}


?>
