<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* Surat Model Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Msurat extends Sipaten_model 
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
		if($this->input->get('query') != '')
			$this->db->like('nama_kategori', $this->input->get('query'));

		if($type == 'result')
		{
			return $this->db->get('kategori_surat', $limit, $offset)->result();
		} else {
			return $this->db->get('kategori_surat')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('kategori_surat', array('id_surat' => $param))->row();
	}

	public function create_category()
	{
		$kategori_surat = array(
			'nama_kategori' => $this->input->post('nama_surat'), 
			'judul_surat' => $this->input->post('judul_surat'),
			'jenis' => $this->input->post('jenis'),
			'syarat' => implode(",", $this->input->post('syarat')),
			'durasi' => $this->input->post('durasi')
		);

		$this->db->insert('kategori_surat', $kategori_surat);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Jenis Surat ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function update_category($param = 0)
	{
		$kategori_surat = array(
			'kode_surat' => $this->input->post('kode_surat'),
		//	'slug' => $this->slug->create_slug($this->input->post('nama_surat')),
			'nama_kategori' => $this->input->post('nama_surat'), 
			'judul_surat' => $this->input->post('judul_surat'),
			'jenis' => $this->input->post('jenis'),
			'syarat' => implode(",", $this->input->post('syarat')),
			'durasi' => $this->input->post('durasi')
		);

		$this->db->update('kategori_surat', $kategori_surat, array('id_surat' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Jenis Surat berhasil diubah.', 
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
		$this->db->delete('kategori_surat', array('id_surat' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Jenis Surat berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	public function delete_multiple()
	{
		if(is_array($this->input->post('surat')))
		{
			foreach($this->input->post('surat') as $value)
				$this->db->delete('kategori_surat', array('id_surat' => $value));

			$this->template->alert(
				' Data Jenis Surat berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dipilih.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	/**
	 * Check Ketersediaan Kode Surat
	 *
	 * @param Integer (ID)
	 * @return string
	 **/
	public function kode_check($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('kategori_surat', array('kode_surat' => $this->input->post('kode_surat')))->num_rows();
		} else {
			return $this->db->query("SELECT kode_surat FROM kategori_surat WHERE kode_surat = '{$this->input->post('kode_surat')}' AND id_surat != {$param}")->num_rows();
		}
	}
}

/* End of file Msurat.php */
/* Location: ./application/models/Msurat.php */