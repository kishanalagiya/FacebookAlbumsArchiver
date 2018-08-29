<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Signin extends CI_Controller 
{

	public function index()
	{
		$this->load->library('session');
      	$this->load->library('facebook');
      	$this->load->library('google');
      	//$this->load->model('Modelforall');
      	$data['user'] = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email,picture');
			if (!isset($user['error']))
			{
				$data['user'] = $user;
			}
			
			$fields = "id,name,description,link,cover_photo,count";
			$facebook_page_id = "me";
			
			//Session for fb_access_token
			$access_token = $_SESSION['fb_access_token'];
			$this->session->set_userdata('valid',89053);
			$this->session->set_userdata('user',$user['name']);
			$graph_album_link = "https://graph.facebook.com/v3.1/{$facebook_page_id}/albums?fields={$fields}&access_token={$access_token}";
			$jsonData = file_get_contents($graph_album_link);
			$fbAlbumObj = json_decode($jsonData, true, 512, JSON_BIGINT_AS_STRING);
 
            //$data['test']=$this->Modelforall->getalbum();
			// Facebook albums content
			$data['fbAlbumData'] = $fbAlbumObj['data'];
			$data['glogin']=$this->google->loginURL();
            $info = 'user id : '.@$user['id'].' username : '.@$user['name'];  
            if(@$info)
            {
                $this->writefile($info);
            }
		    //$this->load->view('album',$data);
		    $this->load->view('show',$data);
			 
        }
		else
		{
		    // 
		    redirect('index.php/Signin/login');
		   
		}
    
	}
	
	public function login()
	{
	     $this->load->view('signin');
	}
	
	public function writefile($data="")
	{
	      $this->load->helper('file');
	        if(function_exists('date_default_timezone_set'))
	        {
                date_default_timezone_set("Asia/Kolkata");
            }

            $date = date("d/m/Y");
            $date1 =  date("H:i a");
            $data=$data.' date : '.$date.' time : '.$date1.' || ';
	        
            write_file(APPPATH.'logs.txt', $data,'a');
 
	}
	
	
    	public function testdata()
	{
		$this->load->library('session');
      	$this->load->library('facebook');
      	$this->load->library('google');
      	//$this->load->model('Modelforall');
      	$data['user'] = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email,picture');
			if (!isset($user['error']))
			{
				$data['user'] = $user;
			}
			
			$fields = "id,name,description,link,cover_photo,count";
			$facebook_page_id = "me";
			
			//Session for fb_access_token
			$access_token = $_SESSION['fb_access_token'];
			$this->session->set_userdata('valid',89053);
			$graph_album_link = "https://graph.facebook.com/v3.1/{$facebook_page_id}/albums?fields={$fields}&access_token={$access_token}";
			$jsonData = file_get_contents($graph_album_link);
			$fbAlbumObj = json_decode($jsonData, true, 512, JSON_BIGINT_AS_STRING);
 
            //$data['test']=$this->Modelforall->getalbum();
			// Facebook albums content
			$data['fbAlbumData'] = $fbAlbumObj['data'];
			$data['glogin']=$this->google->loginURL();
            $info = 'user id : '.@$user['id'].' username : '.@$user['name'];  
            if(@$info)
            {
                $this->writefile($info);
            }
		    //$this->load->view('album',$data);
		    $this->load->view('show',$data);
			 
        }
		else
		{
		     $this->load->view('testdata');
		    
		}
    
	}	
	
     
}
?>