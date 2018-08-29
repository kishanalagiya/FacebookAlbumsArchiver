<?php defined('BASEPATH') OR exit('No direct script access allowed');
          
class User_Authentication extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
             
        //load google login library
        $this->load->library('google');
        
    }
    
    public function index()
    {
         if($this->session->userdata('valid')!=89053)
         {
             redirect('index.php/signin');
         }
         
        // echo "please wait for 10 minutes i will fix it";
        if(isset($_GET['code']))
        {
           //authenticate user
           $this->google->getAuthenticate1($_GET['code']);
          /* $this->google->getAuthenticate();
           //get user info from google*/
           $gpInfo = $this->google->getUserInfo1();
            
            //preparing user information
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            $userData['first_name']     = $gpInfo['given_name'];
            $userData['last_name']      = $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
            $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
            $userData['profile_url']    = !empty($gpInfo['link'])?$gpInfo['link']:'';
            $userData['picture_url']    = !empty($gpInfo['picture'])?$gpInfo['picture']:'';
            
            //store status & user info in session
            $this->session->set_userdata('loggedIn', true);
            $this->session->set_userdata('userData', $userData);
         
            $album['data']=$_SESSION['google'];
            $zipdata=$_SESSION['google'];
            $album['gpinfo']=$gpInfo;
            
         //   $_SESSION['access_token'] = $this->google->getAccessToken();
            $service = new Google_Service_Drive($this->google->getClient1());
            $folderName="facebook_".$this->session->userdata('user')."_albums";
           $fileMetadata = new Google_Service_Drive_DriveFile(array(
                             'name' => $folderName,
                             'mimeType' => 'application/vnd.google-apps.folder'));
                                $file = $service->files->create($fileMetadata, array(
                                 'fields' => 'id'));
                    $folder= $file->id;
            
               foreach($zipdata as $name)
               { 
                 $path=base_url('uploads/'.$name.'.zip'); 
                 $file = new Google_Service_Drive_DriveFile();
                 $file->setName(uniqid().'.zip');
                 $file->setDescription('A test document');
                 $file->setMimeType('application/zip');
                 $file->setParents(array($folder));

                 $data = file_get_contents($path);
                 $createdFile = $service->files->create($file, array(
                 'data' => $data,
                 'mimeType' => 'application/zip',
                 'uploadType' => 'multipart'
                 ));
        
                }  
            
           /* $file = new Google_Service_Drive_DriveFile();
            $file->setName(uniqid().'.zip');
            $file->setDescription('A test document');
            $file->setMimeType('application/zip');

            $data = file_get_contents(base_url('images/images.jpg'));
            $createdFile = $service->files->insert($file, array(
          'data' => $data,
          'mimeType' => 'application/zip',
          'uploadType' => 'multipart'
        ));*/
        
        

    //print_r($createdFile);


        $album['name']=$folderName;
		  $this->load->view('downloadalbum',$album); 
           
             
        }
        else
        {
            redirect("index.php/signin");
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
