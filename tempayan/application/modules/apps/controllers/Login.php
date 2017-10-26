<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->data = array(
			'title' => "Login" 
		);

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
        	$this->set_login();
        }

		$this->load->view('applogin', $this->data);
	}

	private function set_login()
	{
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $account = $this->_get_account($nik);

        if (password_verify($password, $account->password)) 
        {
               $this->db->update('users', array('login_status' => 1), array('user_id' => $account->user_id));

        	$this->_set_account_login($account);

        	if( $this->input->get('from_url') != '')
        	{
        		redirect( $this->input->get('from_url') );
        	} else {
        		redirect('apps/main');
        	}
        } else {

			$this->template->alert(
				'Nik dan password tidak valid.', 
				array('type' => 'danger','icon' => 'times')
			);
        	$this->load->view('login-form', $data);
        }
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
			return $query->row();
		} else {
			return (Object) array('password' => '');
		}
	}

	/**
	 * Create Login Session
	 *
	 * @param String
	 * @access private
	 * @return void 
	 **/
	private function _set_account_login($account)
	{
        $account_session = array(
        	'android_login' => TRUE,
        	'ID' => $account->user_id,
        	'account' => $account
        );	
        $this->session->set_userdata( $account_session );
	}

	/**
	 * Sign Out session Destroy
	 *
	 * @return Void (destroy session)
	 **/
	public function signout()
	{
		$this->session->sess_destroy();

		redirect("apps/login?from_url={$this->input->get('from_url')}");
	}
}

/* End of file Login.php */
/* Location: ./application/modules/apps/controllers/Login.php */