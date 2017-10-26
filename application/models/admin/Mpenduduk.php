<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenduduk extends CI_Model 
{

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('village') != '')
			$this->db->where('desa', $this->input->get('village'));

		if($this->input->get('gender') != '')
			$this->db->where('jns_kelamin', $this->input->get('gender'));

		if($this->input->get('query') != '')
			$this->db->like('nik', $this->input->get('query'))
					 ->or_like('nama_lengkap', $this->input->get('query'));

		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');

		if($type == 'result')
		{
			return $this->db->get('penduduk', $limit, $offset)->result();
		} else {
			return $this->db->get('penduduk')->num_rows();
		}
	}

	public function get($param = 0)
	{
		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');

		$this->db->where('penduduk.ID', $param);

		return $this->db->get('penduduk')->row();
	}

	public function detail($param = 0)
	{
	
		$this->db->join('tb_users', 'penduduk.ID_users = tb_users.ID', 'left');

		$this->db->where('penduduk.ID_users', $param);

		return $this->db->get('penduduk')->row();
	}

	public function update($param = 0)
	{
		$people = array(
			'nik' => $this->input->post('nik'),
			'no_kk' => $this->input->post('kk'),
			'status_kk' => $this->input->post('status_kk'),
			'nama_lengkap' => $this->input->post('name'),
			'tmp_lahir' => $this->input->post('tmp_lahir'),
			'tgl_lahir' => $this->input->post('birts'),
			'jns_kelamin' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat'),
			'rt' => $this->input->post('rt'),
			'rw' => $this->input->post('rw'),
			'desa' => $this->input->post('desa'),
			'kecamatan' => '',
			'agama' => $this->input->post('agama'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
			'status_kawin' => $this->input->post('status_kawin'),
			'gol_darah' => $this->input->post('gol_darah')
		);

		$this->db->update('penduduk', $people, array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Penduduk berhasil diubah.', 
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
		$this->db->delete('penduduk', array('ID_users' => $param));
		$this->db->delete('tb_users', array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Penduduk berhasil dihapus.', 
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
		if( is_array($this->input->post('penduduk')) )
		{
			foreach ($this->input->post('penduduk') as $key => $value) 
				$this->db->delete('penduduk', array('ID_users' => $value));
				$this->db->delete('tb_users', array('ID' => $value));

			if($this->db->affected_rows())
			{
				$this->template->alert(
					' Data Penduduk berhasil dihapus.', 
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

	/**
	 * Check Ketersediaan NIK
	 *
	 * @param Integer (user_id)
	 * @return string
	 **/
	public function nik_check($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('penduduk', array('nik' => $this->input->post('nik')))->num_rows();
		} else {
			return $this->db->query("SELECT nik FROM penduduk WHERE nik IN({$this->input->post('nik')}) AND ID != {$param}")->num_rows();
		}
	}
}

/* End of file Mpenduduk.php */
/* Location: ./application/models/admin/Mpenduduk.php */