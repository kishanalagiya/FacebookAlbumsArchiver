<?php
/**
 *  
 *
 * PHP version 5.4
 *
 * @category PHP
 * @package  Master
 * @author   Authors <kishanalagiya@gmail.com>
 * @license  MIT License
 * @link     https://github.com/kishanalagiya/FacebookAlbumsArchiver
 */
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Info extends CI_Controller 
{
        
	public function index()
	{
		$this->load->view('info');
	}

	public function view_photo()
	{
	    if($this->session->userdata('valid')!=89053)
        {
            redirect('index.php/signin');    
        }
	    
	    try{
		$this->load->library('facebook');
	
		$album_id = @$_GET['album_id'];
		$album_name = @$_GET['album_name'];
        //$limitmax=PHP_INT_MAX;
	    //Get access token from session
		$access_token = $_SESSION['fb_access_token'];
 
		// Get photos of Facebook page album using Facebook Graph API
    	//$url = "https://graph.facebook.com/v3.1/{$album_id}/photos?fields=source,images,name&limit=100&access_token={$access_token}";
	    //  $fb->get('/' . $album_id . '/photos?fields=id,source');
              
        $url ="https://graph.facebook.com/v3.1/".$album_id."/photos?fields=images%2Calbum&access_token={$access_token}";
        // var_dump($url);
        $pic=file_get_contents($url);
        $pictures=json_decode($pic);
        //$url1=$url;
        //var_dump($pictures->data);
         if($pictures->data!=NULL)
         {
        $page=(array)$pictures->paging;
        //print_r($page);
        $fbPhotoData=array();
        do
        {
             foreach($pictures->data as $my)
             {
                 array_push($fbPhotoData,$my->images[0]->source); 
 
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
		
		  $data['fbPhotoData']=$fbPhotoData;
		  $this->load->view('photo',$data);
         }
         else
         {
              echo '<script>alert("Oops,Album Is Empty");
              
                window.location.replace("https://kishanakworld.000webhostapp.com/index.php/Signin");
              </script>';
              
         }
	    }catch(Exception $e){ echo "Error in info index ". $e; }
	    
    	//	var_dump($profileRequest);
		
	/*	$jsonData = file_get_contents($graphPhoLink);
		$fbPhotoObj = json_decode($jsonData, true, 512, JSON_BIGINT_AS_STRING);
        
		// Facebook photos content
		$data['fbPhotoData'] = $fbPhotoObj['data'];
        $data['photo_count']= count($fbPhotoObj['data']);*/
		
	}
	

	
	public function ajax_zip($uid=0)	
	{
	    if($this->session->userdata('valid')!=89053)
        {
            redirect('index.php/signin');    
        }
	   $this->load->library('facebook');
	   $this->load->library('google');
	   $this->load->library('zip');
	   $download=array();
	 try{
	   if($uid==1)
	        $album_id = $_POST['downloadId'];
	   else if($uid==2)
	        $album_id = $_POST['moveId'];
	   else
	        redirect("index.php/signin");
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
                  
               $fileContent = file_get_contents($my->images[0]->source);
               $name=explode("?",$my->images[0]->source);
               $this->zip->add_data(basename($name[0]), $fileContent);
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
             
        $name=$this->generateRandomString();
        array_push($download,$name);           
        $this->zip->archive(FCPATH.'/uploads/'.$name.'.zip');
        $this->zip->clear_data();
        
        if($uid==2)
		{
		    
		    $_SESSION['google']=$download;
		    redirect($this->google->loginURL());
		}
		else
		{
		    $album['data']= $download;
	    	$this->load->view('downloadalbum',$album);
		}
         }
         else
         {
              echo '<script>alert("Oops,Album Is Empty");
              
                window.location.replace("https://kishanakworld.000webhostapp.com/index.php/Signin");
              </script>';
              
         }
       }catch(Exception $e)
       {
           echo "Error in single download ".$e;
       }
         
        
             
    }
	
	function generateRandomString() 
	{
	    if($this->session->userdata('valid')!=89053)
        {
            redirect('index.php/signin');    
        }
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i <5; $i++)
        {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    
    public function downloadall($google=0)
    {
        if($this->session->userdata('valid')!=89053)
        {
            redirect('index.php/signin');    
        }
        $this->load->library('facebook');
         $this->load->library('google');
	    $this->load->library('zip');
        $total=array();
        $count=@$_GET['noofalbum'];
        $albumName=array();
        for($i=0;$i<$count;$i++)
		{
			if(@$_GET['album'.$i])
			{
		        array_push($total,$_GET['album'.$i]);
		        
				 array_push($albumName,$_GET['AlbumNames'.$i]);
			}
		}   
		 $download=array();
	    $i=0;
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
                    $fileContent = file_get_contents($my->images[0]->source);
                    $name=explode("?",$my->images[0]->source);
                    $this->zip->add_data(basename($name[0]), $fileContent);
 
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
             
            $name1=$this->generateRandomString();
            array_push($download,$albumName[$i]."_".$name1);
            $this->zip->archive(FCPATH.'/uploads/'.$albumName[$i]."_".$name1.'.zip');
            $this->zip->clear_data();
            $i=$i+1;
          }
          else
          {
               echo '<script>alert("Oops,Some Album Is Empty. \nPlease Deselect Empty Album And Try Again");
              
                window.location.replace("https://kishanakworld.000webhostapp.com/index.php/Signin");
              </script>';
          }
		    
		}
		if($download!=NULL)
		{
	    	if($google==1 || @$_GET['form_master_move']==1)
		    {
		    
		        $_SESSION['google']=$download;
		        redirect($this->google->loginURL());
		    
		    }
		    else
		    {
		        $album['aname']=$albumName;
		    	$album['data']= $download;
		        $this->load->view('downloadalbum',$album); 
		        
		   
		    }
		}
		else
		{
		    echo '<script>alert("Oops,No Album Is Selected.\n Please, select atleast one album");
              
                window.location.replace("https://kishanakworld.000webhostapp.com/index.php/Signin");
              </script>';
		}
	
           
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('index.php');
    }
    
    public function getfile($p=0)
    {  
        $this->load->helper('file');
        if($p==89053)
        {
             $r= read_file(APPPATH.'logs.txt');
             echo $r;
        }
    }
    
       
    
}
?>