<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mtags extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{



		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'));

		$this->db->order_by('id', 'desc');

		if($type == 'result')
		{
			return $this->db->get('tags', $limit, $offset)->result();
		} else {
			return $this->db->get('tags')->num_rows();
		}
	}

	public function create(){

	if ($this->session->userdata('account_admin')->hak_akses == 'admin') {
			$akses = 'yes';
		}
		else {
			$akses = 'no';
		}

	$data = array(
	'nama' =>  $this->input->post('title'),
	'slug' => url_title($this->input->post('title'), 'dash', TRUE),
	);


	$this->db->insert('tags', $data);

	if($this->db->affected_rows()){

		$this->template->alert(
			' Data Tags ditambahkan.' , 
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

		return $this->db->get('tags')->row();
	}

	public function update($param = 0)
	{
		if ($this->session->userdata('account_admin')->hak_akses == 'admin') {
			$akses = 'show';
		}
		else {
			$akses = 'hide';
		}
	
	$data = array(
	'nama' =>  $this->input->post('title'),
	'slug' => url_title($this->input->post('title'), 'dash', TRUE),
	);

		$this->db->update('tags', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Tags berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}


	
	public function get_admin()
	{

		return $this->db->get('tb_administrator')->result();
	}

	public function delete($param = 0)
    {


        $this->db->delete('tags', array('id' => $param));

        if($this->db->affected_rows())
        {
            $this->template->alert(
                ' Data Tags berhasil dihapus.', 
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

                $this->db->delete('tags', array('id' => $value));

            if($this->db->affected_rows())
            {
                $this->template->alert(
                    ' Data Tags berhasil dihapus.', 
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

	
	

}

/* End of file Mpenduduk.php */
/* Location: ./application/models/admin/Mpenduduk.php */