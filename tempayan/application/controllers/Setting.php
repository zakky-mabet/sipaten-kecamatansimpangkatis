<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Seeting Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Setting extends Sipaten 
{
	public $myaccount;

	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Pengaturan', "setting");

		$this->myaccount = $this->session->userdata('ID');

		$this->load->library(array('upload'));
	}

	public function index()
	{
		$this->breadcrumbs->unshift(2, 'Pengaturan Sistem', "setting");
		$this->page_title->push('Pengaturan', 'Pengaturan Sistem');

		$this->data = array(
			'title' => "Pengaturan Sistem", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view('setting/sistem-setting', $this->data);
	}

	/**
	 * Update Set tb_option
	 *
	 * @return string
	 **/
	public function set_identitas()
	{
		if(is_array($this->input->post('option')))
		{
			foreach($this->input->post('option') as $key => $value)
			{
				$this->option->update($key, $value);
			}

			if($this->db->affected_rows())
			{
				$this->template->alert(
					' Perubahan disimpan.', 
					array('type' => 'success','icon' => 'check')
				);
			} else {
				$this->template->alert(
					' Tidak ada data yang diubah.', 
					array('type' => 'warning','icon' => 'warning')
				);
			}
		}

		redirect('setting');
	}

	public function logo()
	{
		$this->breadcrumbs->unshift(2, 'Pengaturan Logo', "setting");
		$this->page_title->push('Pengaturan', 'Pengaturan Logo');

		$this->data = array(
			'title' => "Pengaturan Logo", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view('setting/logo-setting', $this->data);
	}

	/**
	 * Update Set tb_option (Logo Komponen)
	 *
	 * @return string
	 **/
	public function set_logo()
	{
		$config['upload_path'] = './public/image/logo';
		$config['max_size']	= '110240';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = FALSE;
		
		$this->upload->initialize($config);
		
		if ( $_FILES == FALSE ) 
		{
			$this->template->alert(
				$this->upload->display_errors(), 
				array('type' => 'danger','title' => 'Gagal!', 'icon' => 'warning')
			);
		} else {
			$result_array = array(); 

			foreach($_FILES as $key => $value)
			{
				switch ($key) 
				{
					case 'logo_sistem':
						if($this->upload->do_upload($key) != FALSE)
						{
							@unlink("public/image/logo/{$this->option->get('logo_sistem')}");

							$this->option->update('logo_sistem', $this->upload->file_name);
						}
						break;
					case 'logo_login':
						if($this->upload->do_upload($key) != FALSE)
						{
							@unlink("public/image/logo/{$this->option->get('logo_login')}");

							$this->option->update('logo_login', $this->upload->file_name);
						}
						break;
					case 'logo':
						if($this->upload->do_upload($key) != FALSE)
						{
							@unlink("public/image/logo/{$this->option->get('logo')}");

							$this->option->update('logo', $this->upload->file_name);
						}
						break;
						case 'small_logo':
						if($this->upload->do_upload($key) != FALSE)
						{
							@unlink("public/image/logo/{$this->option->get('small_logo')}");

							$this->option->update('small_logo', $this->upload->file_name);
						}
						break;
					default:
						# code...
						break;
				}
			}

			redirect('setting/logo');
		}
	}


}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */