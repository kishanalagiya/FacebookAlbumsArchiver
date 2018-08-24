<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Signin extends CI_Controller 
{

	public function index()
	{
		 
      	$this->load->library('facebook');
      	$this->load->library('google');
      	$data['user'] = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email');
			if (!isset($user['error']))
			{
				$data['user'] = $user;
			}
			
			$fields = "id,name,description,link,cover_photo,count";
			$facebook_page_id = "me";
			
			//Session for fb_access_token
			$access_token = $_SESSION['fb_access_token'];
			
			$graph_album_link = "https://graph.facebook.com/v3.1/{$facebook_page_id}/albums?fields={$fields}&access_token={$access_token}";
			$jsonData = file_get_contents($graph_album_link);
			$fbAlbumObj = json_decode($jsonData, true, 512, JSON_BIGINT_AS_STRING);
 
            
			// Facebook albums content
			$data['fbAlbumData'] = $fbAlbumObj['data'];
			$data['glogin']=$this->google->loginURL();

		    //$this->load->view('album',$data);
		    $this->load->view('show',$data);
			 
        }
		else
		{
		     $this->load->view('signin');
		    
		}
    
	}
}
?>