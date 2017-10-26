<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcreate_surat extends Sipaten_model 
{
	public $user;

	public function __construct()
	{
		parent::__construct();
		
		$this->user = $this->session->userdata('ID');
	}

	/**
	 * Menampilkan Syarat Penerbitan SUrat
	 *
	 * @param Integer (join)
	 **/
	public function get_syarat($param = 0)
	{
		if($param != FALSE) 
			return $this->db->query("SELECT id_syarat, nama_syarat FROM syarat_surat WHERE id_syarat IN({$param})")->result();
	}
	
	/**
	 * Saving History Data
	 *
	 * @return String 
	 **/
	public function save_history()
	{
		if(is_array($this->input->post('syarat')))
		{
			foreach( $this->input->post('syarat') as $key => $value)
			{
				if($this->log_surat_check_syarat($this->input->post('nik'), $this->input->post('kategori-surat'), $value) == TRUE)
					continue;

				$log_surat = array(
					'nik' => $this->input->post('nik'),
					'tanggal' => date('Y-m-d'),
					'kategori' => $this->input->post('kategori-surat'),
					'syarat' => $value,
					'nomor_surat' => 0,
					'status' => 'pending'
				);

				$this->db->insert('log_surat', $log_surat);
			}

			if($this->db->affected_rows())
			{
				$this->template->alert(
					' Data tersimpan pada histori.', 
					array('type' => 'success','icon' => 'check')
				);
			} else {
				$this->template->alert(
					' Gagal menyimpan data.', 
					array('type' => 'warning','icon' => 'warning')
				);
			}
		} else {

		}
	}

	/**
	 * Menghapus Syarat Pengajuan Surat
	 * Menjadi log_surat 
	 *
	 * @return string
	 **/
	public function delete_history($param = '', $category = 0)
	{
		$this->db->delete(
			'log_surat', 
			array('nik' => $param, 'kategori' => $category, 'nomor_surat' => 0)
		); 

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data histori terhapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} 
	}

	public function delete_syarat($param = 0)
	{
		$this->db->delete(
			'log_surat', 
			array(
				'nik' => $this->input->post('nik'), 
				'kategori' => $this->input->post('kategori-surat'), 
				'syarat' => $param, 
				'nomor_surat' => 0
			)
		); 
	}

	/**
	 * Cek Log surat 
	 *
	 * @param String (NIK)
	 * @param Integer (kategori_surat)
	 * @param Integer (syarat)
	 **/
	public function log_surat_check_syarat($nik = '', $kategori = 0, $syarat = 0)
	{
		return $this->db->get_where(
			'log_surat', 
			array('nik' => $nik, 'kategori' => $kategori, 'syarat' => $syarat, 'nomor_surat' => 0)
		)->num_rows(); 
	}

	/**
	 * Cek Semua Persyaratan yang telah terpenuhi
	 *
	 * @param String (NIK)
	 * @param Integer (kategori_surat)
	 * @return Bolean
	 **/
	public function valid_requirement_check($nik = '', $category = 0)
	{
		$surat = $this->surat_category($category, 'non perizinan');

		$log_surat = $this->db->get_where(
			'log_surat', 
			array('nik' => $nik, 'kategori' => $category, 'nomor_surat' => 0)
		)->num_rows();

		if($log_surat == count($this->get_syarat($surat->syarat)))
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * Create Surat Pending
	 *
	 * @param String (NIK)
	 * @param Integer (kategori_surat)
	 * @var string
	 **/
	public function create_surat($nik = '', $category = 0)
	{
		$check_surat = $this->db->get_where(
			'surat', 
			array('nik' => $nik, 'kategori' => $category, 'status' => 'entry')
		)->num_rows(); 

		if($check_surat == FALSE)
		{
			$surat = array(
				'nomor_surat' => '',
				'nik' => $nik,
				'kategori' => $category,
				'tanggal' => date('Y-m-d'),
				'isi_surat' => '',
				'pegawai' => 0,
				'pemeriksa' => 0,
				'user' => $this->user,
				'waktu_mulai' => date('Y-m-d H:i:s'),
				'waktu_selesai' => '',
				'status' => 'entry'
			);

			$this->db->insert('surat', $surat);
		}
	}

	/**
	 * Update Surat Pending
	 *
	 * @param String (NIK)
	 * @param Integer (kategori_surat)
	 * @var string
	 **/
	public function update_surat($nik = '', $category = 0)
	{
		$check_surat = $this->db->get_where(
			'surat', 
			array('nik' => $nik, 'kategori' => $category, 'status' => 'entry')
		)->row(); 

		$isianSurat = json_decode(json_encode($this->input->post('isi')));

		/* JIKA TERDAPAT PENGIKUT */
		if( property_exists($isianSurat, 'pengikut') )
		{
			if( is_array($isianSurat->pengikut) )
			{
				foreach( $isianSurat->pengikut as $key => $value )
				{
					$this->db->insert('pengikut', 
						array(
							'surat' => $check_surat->ID,
							'param' => $this->get_slug_surat($category),
							'nik' => $value->nik
					));
				}
			}
		}

		$surat = array(
			'nomor_surat' => $this->input->post('nomor_surat'),
			'isi_surat' => json_encode($this->input->post('isi')),
			'pegawai' => $this->input->post('ttd_pejabat'),
			'pemeriksa' => $this->input->post('pemeriksa'),
			'user' => $this->user,
			'status' => 'pending'
		);

		$this->db->update('surat', $surat, array(
			'nik' => $nik,
			'kategori' => $category,
			'status' => 'entry'
		));

		$this->db->update(
			'log_surat', 
			array('nomor_surat' => $check_surat->ID),
			array('nik' => $nik, 'kategori' => $category, 'nomor_surat' => 0)
		);

		/* INSERT NOTIFICATIONS */
		$this->db->insert('notifications', array(
			'surat' => $check_surat->ID,
			'sender' => $this->user,
			'receiver' => $this->input->post('pemeriksa'),
			'status' => 0
		));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Surat pengajuan berhasil dibuat.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

}

/* End of file Msurat_keterangan.php */
/* Location: ./application/models/Msurat_keterangan.php */