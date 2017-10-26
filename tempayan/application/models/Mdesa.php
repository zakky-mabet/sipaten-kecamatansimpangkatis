<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* Desa Model Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Mdesa extends Sipaten_model 
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
			$this->db->like('nama_desa', $this->input->get('query'));

		if($type == 'result')
		{
			return $this->db->get('desa', $limit, $offset)->result();
		} else {
			return $this->db->get('desa')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('desa', array('id_desa' => $param))->row();
	}

	public function create()
	{
		$desa = array(
			'nama_desa' => $this->input->post('desa'),
			'slug' => $this->slug->create_slug($this->input->post('desa')),
			'kepala_desa' => $this->input->post('kepala_desa') 
		);

		$this->db->insert('desa', $desa);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data desa ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function update($param = 0)
	{
		$desa = array(
			'nama_desa' => $this->input->post('desa'),
			'slug' => $this->slug->create_slug($this->input->post('desa')),
			'kepala_desa' => $this->input->post('kepala_desa') 
		);

		$this->db->update('desa', $desa, array('id_desa' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data desa berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete($param = 0)
	{
		$this->db->delete('desa', array('id_desa' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data desa berhasil dihapus.', 
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
		if(is_array($this->input->post('desa')))
		{
			foreach($this->input->post('desa') as $value)
				$this->db->delete('desa', array('id_desa' => $value));

			$this->template->alert(
				' Data desa berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dipilih.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	public function update_multiple()
	{
		if(is_array($this->input->post('ID')))
		{
			foreach($this->input->post('ID') as $key => $value)
			{
				$desa = array(
					'nama_desa' => $this->input->post('desa')[$key],
					'slug' => $this->slug->create_slug($this->input->post('desa')[$key]),
					'kepala_desa' => $this->input->post('kepala_desa')[$key] 
				);

				$this->db->update('desa', $desa, array('id_desa' => $value));
			}

			$this->template->alert(
				' Data desa berhasil diubah.', 
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
	 * Check Ketersediaan Slug
	 *
	 * @param Integer (slug)
	 * @return string
	 **/
	public function slug_check($param = 0)
	{
		$string = $this->slug->create_slug($this->input->post('desa'));

		if($param == FALSE)
		{
			return $this->db->get_where('desa', array('slug' => $string ))->num_rows();
		} else {
			return $this->db->where('slug', $string)
							->where('id_desa !=', $param)
							->get('desa')->num_rows();
		}
	}
}

/* End of file Mdesa.php */
/* Location: ./application/models/Mdesa.php */