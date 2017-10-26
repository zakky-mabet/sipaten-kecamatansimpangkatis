<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model 
{	
	public $account;

	public function __construct()
	{
		parent::__construct();
		
		$this->account = $this->session->userdata('account_admin')->ID;
	}

	public function my_account()
	{
		return $this->db->get_where('tb_administrator', array('ID' => $this->account ))->row();
	}
}

/* End of file Muser.php */
/* Location: ./application/models/admin/Muser.php */