<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memployee extends Sipaten_model 
{
	public $user;
	
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('slug'));
		
		$this->user = $this->session->userdata('ID');
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('gender') != '')
			$this->db->where('jns_kelamin', $this->input->get('gender'));

		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'))
					 ->or_like('nip', $this->input->get('query'));

		if($type == 'result')
		{
			return $this->db->get('pegawai', $limit, $offset)->result();
		} else {
			return $this->db->get('pegawai')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('pegawai', array('ID' => $param))->row();
	}

	public function create()
	{
		$pegawai = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('name'),
			'jabatan' => $this->input->post('jabatan'),
			'pangkat' => $this->input->post('pangkat'),
			'jns_kelamin' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon')
		);

		$this->db->insert('pegawai', $pegawai);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Pegawai ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	public function update($param = 0)
	{
		$pegawai = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('name'),
			'jabatan' => $this->input->post('jabatan'),
			'pangkat' => $this->input->post('pangkat'),
			'jns_kelamin' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon')
		);

		$this->db->update('pegawai', $pegawai, array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Pegawai diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}	
	}

	public function delete($param = 0)
	{
		$this->db->delete('pegawai',  array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Pegawai dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete_multiple()
	{
		if(is_array($this->input->post('pegawai')))
		{
			foreach($this->input->post('pegawai') as $value)
				$this->db->delete('pegawai', array('ID' => $value));

			$this->template->alert(
				' Data pegawai berhasil dihapus.', 
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
	 * @param Integer (ID)
	 * @return string
	 **/
	public function nip_check($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('pegawai', array('nip' => $this->input->post('nip')))->num_rows();
		} else {
			return $this->db->query("SELECT nip FROM pegawai WHERE nip IN({$this->input->post('nip')}) AND ID != {$param}")->num_rows();
		}
	}

	/**
	 * Get Role Name in role
	 *
	 * @param Integer (nip)
	 * @return String
	 **/
	public function get_akses_name($param = 0)
	{
		return $this->db->query("SELECT users_role.role_name FROM users_role RIGHT JOIN users ON users.role_id = users_role.role_id WHERE users.nip = '{$param}'")->row('role_name');
	}

	/**
	 * Create or Update role
	 *
	 * @return string
	 **/
	public function set_akses_employee()
	{
		$pegawai = self::get($this->input->post('pegawai'));

		if( self::check_akses_employee( $pegawai->nip) )
		{
			$this->db->update('users', 
				array('role_id' => $this->input->post('akses')), 
				array('nip' => $pegawai->nip)
			);

			$this->template->alert(
				' Akses pengguna berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Data pegawai yang dipilih belum mempunyai akun login, mohon buat terlebih dahulu', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	/**
	 * undocumented class variable
	 *
	 * @param Integer (nip)
	 * @return string
	 **/
	public function check_akses_employee($nip = 0)
	{
		return $this->db->get_where('users', array('nip' => $nip))->num_rows();
	}
}

/* End of file Memployee.php */
/* Location: ./application/models/Memployee.php */