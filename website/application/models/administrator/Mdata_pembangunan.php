<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mdata_pembangunan extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('user') != '')
			$this->db->where('uploaded', $this->input->get('user'));

		if($this->input->get('status') != '')
			$this->db->where('status', $this->input->get('status'));

		if($this->input->get('lokasi') != '')
			$this->db->where('lokasi', $this->input->get('lokasi'));

		if($this->input->get('tahun') != '')
			$this->db->where('tahun', $this->input->get('tahun'));

		if($this->input->get('query') != '')
			$this->db->like('nama_kegiatan', $this->input->get('query'))
					 ->or_like('lokasi', $this->input->get('query'))
					 ->or_like('penanggung_jawab', $this->input->get('query'))
					 ->or_like('pola_pelaksanaan', $this->input->get('query'))
					 ->or_like('sumber', $this->input->get('query'))
					 ->or_like('tahun', $this->input->get('query'));

		$this->db->order_by('id', 'desc');

		if($type == 'result')
		{
			return $this->db->get('data_pembangunan', $limit, $offset)->result();
		} else {
			return $this->db->get('data_pembangunan')->num_rows();
		}
	}

	public function create(){

	if ($this->session->userdata('account_admin')->hak_akses == 'khusus_pembangunan') {
			$akses = 'show';
		}
		else {
			$akses = 'hide';
		}


	$data = array(
	    'nama_kegiatan'=> $this->input->post('nama_kegiatan'),
	    'lokasi'=> $this->input->post('lokasi'),
	    'sasaran'=> $this->input->post('sasaran'),
	    'volume'=> $this->input->post('volume'),
	    'dana'=> $this->input->post('dana'),
	    'sumber'=> $this->input->post('sumber'),
	    'tahun'=> $this->input->post('tahun'),
	    'pola_pelaksanaan'=> $this->input->post('pola_pelaksanaan'),
	    'penanggung_jawab'=> $this->input->post('penanggung_jawab'),
		'uploaded' => $this->session->userdata('account_admin')->username,
		'dates' => date('Y-m-d H:i:s'),
		'status' => $akses,

		);

	$this->db->insert('data_pembangunan', $data);

	if($this->db->affected_rows()){

		$this->template->alert(
			' Data Pembangunan ditambahkan.', 
			array('type' => 'success',
				'icon' => 'check')
			);
	} 
	else {
		$this->template->alert(' 
			Gagal menyimpan data.', 
			array('type' => 'warning',
			'icon' => 'times'));
		}
	}

	public function get($param = 0)
	{

		$this->db->where('id', $param);

		return $this->db->get('data_pembangunan')->row();
	}

	public function update($param = 0)
	{
		if ($this->session->userdata('account_admin')->hak_akses == 'khusus_pembangunan') {
			$akses = 'show';
		}
		else {
			$akses = 'hide';
		}



		$data = array(
		'nama_kegiatan'=> $this->input->post('nama_kegiatan'),
	    'lokasi'=> $this->input->post('lokasi'),
	    'sasaran'=> $this->input->post('sasaran'),
	    'volume'=> $this->input->post('volume'),
	    'dana'=> $this->input->post('dana'),
	    'sumber'=> $this->input->post('sumber'),
	    'tahun'=> $this->input->post('tahun'),
	    'pola_pelaksanaan'=> $this->input->post('pola_pelaksanaan'),
	    'penanggung_jawab'=> $this->input->post('penanggung_jawab'),
		'uploaded' => $this->session->userdata('account_admin')->username,
		'dates' => date('Y-m-d H:i:s'),
		'status' => $akses,
		);
		
		$this->db->update('data_pembangunan', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Pembangunan berhasil diubah.', 
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
		
		$this->db->delete('data_pembangunan', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Pembangunan berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dihapus.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function multiple_delete()
	{
		if( is_array($this->input->post('data')) )
		{
			foreach ($this->input->post('data') as $key => $value)


				$this->db->delete('data_pembangunan', array('id' => $value));

			if($this->db->affected_rows())
			{
				$this->template->alert(
					' Data Pembangunan berhasil dihapus.', 
					array('type' => 'success','icon' => 'check')
				);
			} else {
				$this->template->alert(
					' Tidak ada data yang dihapus.', 
					array('type' => 'warning','icon' => 'warning')
				);
			}
		}
	}

	
	public function get_admin()
	{

		return $this->db->get('tb_administrator')->result();
	}

	public function status($param = 0)
	{	
	
		if( self::get($param)->status == 'hide')
		{
			$data = array(
				'status' => 'show',
				'uploaded' => $this->session->userdata('account_admin')->username,
				'dates' => date('Y-m-d H:i:s'),

			);
			$this->db->update('data_pembangunan', $data, array('id' => $param));
		}
		else {
			$data = array(
				'status' => 'hide',
				'uploaded' => $this->session->userdata('account_admin')->username,
				'dates' => date('Y-m-d H:i:s'),

			);
			$this->db->update('data_pembangunan', $data, array('id' => $param));
		}

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Status berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Tidak ada data yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

}

/* End of file Mpenduduk.php */
/* Location: ./application/models/admin/Mpenduduk.php */