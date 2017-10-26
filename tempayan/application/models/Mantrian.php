<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantrian extends Sipaten_model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

	}

	public function _get()
	{
		
		$this->data = array(
			'date' => date('Y-m-d'),
			'time' => date('H:i:s'),
			'status' => 'no',

		);

		$this->db->insert('antrian', $this->data);

		$id = $this->db->insert_id();

		$this->get_id($id);

		$this->update_nomor($id);
		
		if($this->db->affected_rows())
		{
			$this->template->alert_no_close(
			'Silahkan Ambil Nomor Antrian Anda !', 
			array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert_no_close(
			'Silahkan coba lagi !', 
			array('type' => 'danger','icon' => 'check')
			);
		}
	}

	public function count()
	{
		return $this->db->get_where('antrian', array('date' => date('Y-m-d') ))->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('antrian', array('id' => $id));
	}

	public function update_nomor($id)
	{
		$nomor = count($this->count());

		$object = array(
			'nomor' => $nomor,
		);
		$this->db->update('antrian', $object, array('id' => $id));
	}

}

/* End of file Mantrian.php */
/* Location: ./application/models/Mantrian.php */