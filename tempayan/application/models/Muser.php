<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends Sipaten_model 
{
	public $user;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->user = $this->session->userdata('ID');
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('nip', $this->input->get('query'))
					 ->or_like('name', $this->input->get('query'));

		$this->db->join('users_role', 'users.role_id = users_role.role_id', 'left');

		if($type == 'result')
		{
			return $this->db->get('users', $limit, $offset)->result();
		} else {
			return $this->db->get('users')->num_rows();
		}
	}

	public function create()
	{
		$user = array(
			'nip' => $this->input->post('nip'),
			'name' => $this->input->post('name'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'address' => '',
			'phone' => '',
			'photo' => '',
			'active' => 1,
			'email' => $this->input->post('email'),
			'role_id' => $this->input->post('role'),
			'login_status' => 0
		);

		$this->db->insert('users', $user);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Pengguna ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('users', array('user_id' => $param))->row();
	}

	/**
	 * Update User
	 *
	 * @param Integer
	 * @return string
	 **/
	public function update($param = 0)
	{
		$user = array(
			'nip' => $this->input->post('nip'),
			'name' => $this->input->post('name'),
			'active' => $this->input->post('status'),
			'role_id' => $this->input->post('role') 
		);

		$this->db->update('users', $user, array('user_id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Pengguna ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	/**
	 * Delete User
	 *
	 * @param Integer
	 * @return string
	 **/
	public function delete($param = 0)
	{
		$this->db->delete('users', array('user_id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Pengguna dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dihapus.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	/**
	 * Delete Multiple User
	 *
	 * @param Integer (Array)
	 * @return string
	 **/
	public function delete_multiple()
	{
		if(is_array($this->input->post('users')))
		{
			foreach($this->input->post('users') as $value)
				$this->db->delete('users', array('user_id' => $value));

			$this->template->alert(
				' Pengguna dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dipilih.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	/**
	 * Check Ketersediaan nip
	 *
	 * @param Integer (user_id)
	 * @return string
	 **/
	public function nip_check($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('users', array('nip' => $this->input->post('nip')))->num_rows();
		} else {
			return $this->db->query("SELECT nip FROM users WHERE nip IN({$this->input->post('nip')}) AND user_id != {$param}")->num_rows();
		}
	}

}

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */