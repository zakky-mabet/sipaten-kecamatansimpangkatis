<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Permission Module pada fiel role
 * Table user_role
 *
 * @param String (module name)
 * @param String (action module)
 * @return Boleaan
 **/
class Permission
{
	protected $ci;

	public $user_role;

	public $role = array();

	public function __construct()
	{
        $this->ci =& get_instance();

        $this->ci->load->model('option');

        if($this->ci->session->has_userdata('authentifaction') == TRUE)
	        $this->user_role = $this->ci->session->userdata('account')->role_id;

        if($this->user_role)
        	$this->role = json_decode($this->ci->option->get_role( $this->user_role )->role);
	}

	public function is_true($module = '', $action = '')
	{
		return in_array($action, $this->role->$module);
	}

	/**
	 * Check Pemission pada module surat
	 *
	 * @return Boolean
	 **/
	public function is_admin()
	{
		if( $this->ci->session->userdata('account')->role_id == 1 )
			return true;
	}

	/**
	 * Check Pemission pada module surat
	 *
	 * @return Boolean
	 **/
	public function is_verified()
	{
		if( $this->ci->session->userdata('account')->role_id == 2 )
			return true;
	}

	/**
	 * Check Pemission Bahwa Staff Pelayanan
	 *
	 * @return Boolean
	 **/
	public function is_service()
	{
		if( $this->ci->session->userdata('account')->role_id != 2 OR $this->ci->session->userdata('account')->role_id != 1)
			return true;
	}	

	/**
	 * Cek Multple Module
	 *
	 * @param Array (Module Name)
	 * @return Boolean
	 **/
	public function is_groups($modules = FALSE)
	{
		if( is_array($modules) )
		{
			foreach ($modules as $key => $value) 
			{
				if( $this->is_true($value, 'on') == FALSE ) 
				{
					break;
				} else {
					return TRUE;
				}
			}
		} 
	}

	/**
	 * Check File Print Tersedia apa gak
	 *
	 * @param String (slug file)
	 * @return Boolean
	 **/
	public function print_file($slug = '')
	{
		return file_exists(APPPATH."/views/surat-keluar/print/".$slug.".php");
	}
}

/* End of file Permission.php */
/* Location: ./application/libraries/Permission.php */
