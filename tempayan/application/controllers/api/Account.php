<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller 
{
	public $response;

	public function index()
	{
		// get query prepare statmennts
		$query = $this->db->query("SELECT * FROM users WHERE nip = ?", array($this->input->post('nip')));

		if($query->num_rows() == 1)
		{
			$account = $query->row_array();

        	// authentifaction dengan password verify
        	if (password_verify($this->input->post('passOld'), $account['password'])) 
        	{
        		if( $this->input->post('passNew') != '')
        		{
        			$object = array(
        				'email' => $this->input->post('email'),
        				'name' => $this->input->post('name'),
        				'password' => password_hash($this->input->post('passNew'), PASSWORD_DEFAULT)
        			);
        		} else {
        			$object = array(
        				'email' => $this->input->post('email'),
        				'name' => $this->input->post('name')
        			);
        		}
        		
        		// To do update
        		$this->db->update('users', $object,  array(
        			'nip' => $account['nip']
        		));

        		$this->response = array(
        			'success' => 1, 
        			'message' => "Data berhasil diubah.",
        			'email' => $account['email'],
        			'name' => $account['name'],
        			'nip' => $account['nip']
        		);
        	} else {
        		$this->response = array(
        			'success' => 0,
        			'message' => "Password lama anda tidak cocok!"
        		);
        	}
		} else {
			$this->response = array(
				'success' => 0,
				'message' => "NIP tidak terdaftar!"
			);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($this->response));
	}

}

/* End of file Account.php */
/* Location: ./application/controllers/Api/Account.php */