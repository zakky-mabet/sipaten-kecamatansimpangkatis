<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnotification extends Sipaten_model 
{
	public $user;

	public function __construct()
	{
		parent::__construct();
		
		$this->user = $this->db->get_where('pegawai', array('nip' => $this->session->userdata('account')->nip))->row('ID');
	}
	
	public function get()
	{
		$this->db->select('notifications.*, kategori_surat.judul_surat, users.photo, users.name');

		$this->db->join('surat', 'notifications.surat = surat.ID', 'left');

		$this->db->join('users', 'surat.user = users.user_id', 'left');

		$this->db->join('kategori_surat', 'surat.kategori = kategori_surat.id_surat', 'left');

		$this->db->where('notifications.status', 0);

		return $this->db->get_where('notifications', array('notifications.receiver' => $this->user))->result();
	}
}

/* End of file mnotification.php */
/* Location: ./application/models/mnotification.php */