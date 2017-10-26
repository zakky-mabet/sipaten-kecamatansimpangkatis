<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maccount extends Sipaten_model 
{
	public $user;

	public function __construct()
	{
		parent::__construct();

		$this->user = $this->session->userdata('ID');

		$this->load->library(array('upload'));
	}

	public function get()
	{
		return $this->db->get_where('users', array('user_id' => $this->user))->row();
	}
	
	public function change_password()
	{
		$get = $this->get();

		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_foto')) 
		{

			$this->template->alert(
				$this->upload->display_errors('<span>','</span>'), 
				array('type' => 'success','icon' => 'check')
			);

			$gambar = $get->photo;
			
		} else {

			if($get->photo != '')
				unlink("public/image/{$get->photo}");

			$gambar = $this->upload->file_name;
		}

		$data = array(
			'nip' => $this->input->post('nip'),
			'name' => $this->input->post('name'),  
			'address' => $this->input->post('alamat'),
			'phone' => $this->input->post('phone'),
			'photo' => $gambar,
			'email' => $this->input->post('email')
		);

		if($this->input->post('new_pass') != '')
			$data['password'] = password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT);

		$this->db->update('users', $data, array('user_id' => $this->user));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Perubahan tersimpan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal melakukan perubahan.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}


   	public function getUserInfo($id)  
   	{  
     	$q = $this->db->get_where('users', array('user_id' => $id), 1);   

     	if($this->db->affected_rows() > 0)
     	{  
       		$row = $q->row();  
       		return $row;  
     	} else {  
       		error_log('no user found getUserInfo('.$id.')');  
       		return false;  
     	}  
   	}  
   
  	public function getUserInfoByEmail($email)
  	{  
     	$q = $this->db->get_where('users', array('email' => $email), 1);  

     	if($this->db->affected_rows() > 0)
     	{  
       		$row = $q->row(); 

       		return $row;  
     	}  
   	}  
   
   	public function insertToken($user_id)  
   	{    
     	$token = substr(sha1(rand()), 0, 30);   
     	$date = date('Y-m-d');  
       
     	$string = array(  
         	'token'=> $token,  
         	'user_id'=> $user_id,  
         	'created'=>$date  
       	);  
     	$query = $this->db->insert_string('tokens',$string);  

     	$this->db->query($query);  

     	return $token . $user_id;  
   	}  
   
   	public function isTokenValid($token)  
   	{  
     	$tkn = substr($token,0,30);  
     	$uid = substr($token,30);     
       
     	$q = $this->db->get_where('tokens', array(  
       'tokens.token' => $tkn,   
       'tokens.user_id' => $uid), 1);               
           
     	if($this->db->affected_rows() > 0)
     	{  
	       	$row = $q->row();         
	         
	       	$created = $row->created;  
	       	$createdTS = strtotime($created);  
	       	$today = date('Y-m-d');   
	       	$todayTS = strtotime($today);  
	         
	       	if($createdTS != $todayTS)
	       		return false;    
	       	
	       	$user_info = $this->getUserInfo($row->user_id);  
	       	
	       	return $user_info;  
         
     	} else {  
       		return false;  
     	}  
       
   	}   
   
   	public function updatePassword($post)  
   	{    
     	$this->db->where('user_id', $post['user_id']);  
     	$this->db->update('users', array('password' => $post['password']));      
     	return true;  
   	} 
}

/* End of file Maccount.php */
/* Location: ./application/models/Maccount.php */