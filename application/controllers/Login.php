<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package Controller universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','template','user_agent',));
	}
	public function index()
	{
		$data = array(
			'title' => 'Login - KISS - Koba District Information And Service Center - Kabupaten Bangka Tengah',
		);
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_validate_captcha');

		$values = array(
			'word' => '', 
			'word_length' => 4, 
			'img_path' => 'assets/captcha/',   
			'img_url' => base_url() .'assets/captcha/',
			'font_path' => FCPATH . 'system/fonts/texb.ttf',
			'img_width' => '120',  
			'img_height' => 50,  
			'expiration' => 3600  
		);
		$data['captcha'] = create_captcha($values);
		
        if ($this->form_validation->run() == FALSE)
        {
		 	
		 	$this->session->set_userdata( 
		 	array('captcha' => $data['captcha'], 
		 		'image' => $data['captcha']['filename'] )
		 		 );

            $this->template->view('v_login', $data);
        } 
        else 
        {
        	$email = $this->input->post('email');
        	$password = $this->input->post('password');
        	// get data account
        	$account = $this->_get_account($email);
        	// authentifaction dengan password verify
        	if (password_verify($password, $account->password)) 
        	{
        		// set session data
        		$this->_set_account_login($account);

        	 $this->template->alert(
                'Anda berhasil Login, Silahkan Lengkapi data kependudukan anda pada menu Profil !', 
                array('type' => 'success','icon' => 'check')
            );
        	redirect(base_url(''),'refresh');
        	} else {
	        	// set error alert
			$this->template->alert(
                ' Email atau password anda salah.', 
                array('type' => 'danger','icon' => 'close'));
        	$this->template->view('v_login', $data);
        	}
        }
	}

	public function validate_captcha()
	{
	    if($this->input->post('captcha') != $this->session->userdata('captcha')['word'])
	    {
	        $this->form_validation->set_message('validate_captcha', 'Kode Captcha yang anda masukkan salah.');
	        return false;
	    } else {
	        return true;
	    }
	}

	public function deleteImage()
	{
        if(isset($this->session->userdata['image']))
        {
            $lastImage = FCPATH . "assets/captcha/" . $this->session->userdata['image'];

            if(file_exists($lastImage))
                unlink($lastImage);
        }
        return $this;
    }

	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	public function captcha_refresh()
	{
		 $values = array(
			'word' => '', 
			'word_length' => 4, 
			'img_path' => 'assets/captcha/',   
			'img_url' => base_url() .'assets/captcha/',
			'font_path' => FCPATH . 'system/fonts/texb.ttf',
			'img_width' => '120',  
			'img_height' => 50,  
			'expiration' => 3600  
		);

		$data = create_captcha($values);

		$this->session->set_userdata( array('captcha' => $data ) );

		echo $data['word'];
	}

	/**
	 * Take a data administrator account
	 *
	 * @param String (username)
	 * @access private
	 * @return Object
	 **/
	private function _get_account($param = 0)
	{
		// get query prepare statmennts
		$query = $this->db->query("
			SELECT ID, username, password, email, no_hp, photo FROM tb_users WHERE status='yes' AND email = ?", array($param));

		if($query->num_rows() == 1)
		{
			return $query->row();

		} else {
			// hilangkan error object
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
		$this->deleteImage();
        // set session data
        $account_session = array(
        	'user_login' => TRUE,
        	'akun_id' => $account->ID,
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
		redirect($this->input->get('from_url'));
	}
	
	//  public function has()
	// {
	// 	print_r(password_hash('zakkysaja',PASSWORD_DEFAULT));
	//  }
}

/* End of file Login.php */
