<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modelforall extends CI_Model
{
	 public function __construct()
    {
        parent::__construct();
    }
	public function insert()
	{
	   //$qry=array('admin_name'=>$admin_name,'email'=>$email,'mobile'=>$mobile,'password'=>$password);
       //$this->db->insert('admin',$qry);
	}		
	
	public function getalbum()
	{
	        $this->load->library('facebook');
	        $fields = "id,name,description,link,cover_photo,count";
			$facebook_page_id = "me";
			$access_token = $_SESSION['fb_access_token'];
			$graph_album_link = "https://graph.facebook.com/v3.1/{$facebook_page_id}/albums?fields={$fields}&access_token={$access_token}";
			$jsonData = file_get_contents($graph_album_link);
			$fbAlbumObj = json_decode($jsonData, true, 512, JSON_BIGINT_AS_STRING);
			return $fbAlbumObj;
	}
	
 
	public function select_record($id)
	{
		/*$this->db->where('admin_id',$id);
		$qry=$this->db->get('admin');
		$res=$qry->row_array();
		return $res;*/	
	}
	
	 	
	
}
	
?>	