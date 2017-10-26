<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mrole extends Sipaten_model 
{

	public function create()
	{
		$role = array(
			'role_name' => $this->input->post('name'),
			'role_description' => $this->input->post('description'),
			'role' => json_encode($this->input->post('role') )
		);

		$this->db->insert('users_role', $role);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Hak Akses Pengguna ditambahkan.', 
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
		$role = array(
			'role_name' => $this->input->post('name'),
			'role_description' => $this->input->post('description'),
			'role' => json_encode($this->input->post('role') )
		);

		$this->db->update('users_role', $role, array('role_id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Hak Akses Pengguna diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada perubahan.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete($param = 0)
	{
		$this->db->delete('users_role', array('role_id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Hak Akses Pengguna dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	/**
	 * Get data role (Convert to Array)
	 *
	 * @return string
	 **/
	public function role_check($json, $module_name = '')
	{
		$data = json_decode($json);

		foreach($data as $key => $value)
		{
			switch ($module_name) 
			{
				case $key:
					if(is_array($value) == FALSE)
						continue;
					return $value;
					break;
			}
		}
	}
}

/* End of file Mrole.php */
/* Location: ./application/models/Mrole.php */