	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Mdata_pembangunan extends CI_Model {
		public function __construct()
		{
			parent::__construct();

		}

		public function get_all($limit = 20, $offset = 0, $type = 'result')
		{	
			if($this->input->get('lokasi') != '')
				$this->db->where('lokasi', $this->input->get('lokasi'));

			if($this->input->get('tahun') != '')
				$this->db->where('tahun', $this->input->get('tahun'));	

			if($this->input->get('query') != '')
				$this->db->like('nama_kegiatan', $this->input->get('query'))
						 ->or_like('lokasi', $this->input->get('query'))
						 ->or_like('sasaran', $this->input->get('query'))
						 ->or_like('sumber', $this->input->get('query'))  
						 ->or_like('pola_pelaksanaan', $this->input->get('query'))
						 ->or_like('tahun', $this->input->get('query'))
						 ->or_like('penanggung_jawab', $this->input->get('query'));  

				$this->db->order_by('id', 'DESC');

				$this->db->where('status', 'show');

			if($type == 'result')
			{
				return $this->db->get('data_pembangunan', $limit, $offset)->result();
			} else {
				return $this->db->get('data_pembangunan')->num_rows();
			}
		}





		
	}