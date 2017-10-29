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
			'status' => 'menunggu',
		);

		$this->db->insert('antrian', $this->data);

		$id = $this->db->insert_id();

		$this->get_id($id);

		$this->update_nomor($id);
		
		if($this->db->affected_rows())
		{
			$this->template->alert_no_close(
			'Terimakasih, Silahkan Ambil Nomor Antrian Anda !', 
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

	// admin

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('nomor', $this->input->get('query'));

		if($this->input->get('start') != '')
			$this->db->where('date >= ', $this->input->get('start'));

		if($this->input->get('end') != '')
			$this->db->where('date <= ', $this->input->get('end'));

		if($this->input->get('status') != 'menunggu')
			$this->db->like('status', $this->input->get('status'));

		$this->db->order_by('id', 'desc');

		if($type == 'result')
		{
			return $this->db->get('antrian', $limit, $offset)->result();
		} else {
			return $this->db->get('antrian')->num_rows();
		}
	} 

	public function get_today($limit = 20, $offset = 0, $type = 'result')
	{
		
		$this->db->order_by('nomor', 'asc');

		$this->db->where('status', 'menunggu');

		$this->db->where('date', date('Y-m-d'));

		if($type == 'result')
		{
			return $this->db->get('antrian', $limit, $offset)->result();
		} else {
			return $this->db->get('antrian')->num_rows();
		}
	} 

	

}

/* End of file Mantrian.php */
/* Location: ./application/models/Mantrian.php */