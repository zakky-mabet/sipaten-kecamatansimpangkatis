<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		if ($this->input->post('nik') == '' AND $this->input->post('password') == ''  ) 
		{ 
			$this->response = array(
				'success' => 0,
				'msessage' => "NIP dan Password harus diisi!"
			);
		} else {
        	$nik = $this->input->post('nik');
        	$password = $this->input->post('password');

        	/* get data account */
        	$account = $this->_get_account($nik);

        	if($account == TRUE) 
        	{
	        	/* authentifaction dengan password verify */
	        	if (password_verify($password, $account['password'])) 
	        	{
	                $this->db->update(
	                	'users', array(
	                		'login_status' => 1,
	                		'firebase_token' => $this->input->post('token')
	                	), 
	                	array('user_id' => $account['user_id'])
	                );

	        		$this->response =  array_merge(
	        			array(
	        				'success' => 1, 
	        				'message' => "Selamat datang ".$account['name'],
	        				'nik' => $account['nip'],
	        				'channel' => 'channel-'.$account['nip']
	        			), $account);
	        	} else {
	        		$this->response =  array(
	        			'success' => 0,
	        			'message' => "Kombinasi NIP dan Password tidak cocok!"
	        		);
	        	}
        	} else {
	        	$this->response =  array(
	        		'success' => 0,
	        		'message' => "Maaf! NIP anda tidak terdaftar."
	        	);
        	}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($this->response));
	}

	/**
	 * Take a data  accounts
	 *
	 * @param String (nik)
	 * @access private
	 * @return Object
	 **/
	private function _get_account($param = 0)
	{
		$query = $this->db->get_where('users', array('nip' => $param, 'active' => 1));

		if($query->num_rows() == 1)
		{
			return $query->row_array();
		} else {
			return (Object) array('password' => '');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Api/Login.php */