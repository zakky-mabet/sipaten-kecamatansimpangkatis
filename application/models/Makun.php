<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package model universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class Makun extends CI_Model {
	public $akun;
	public function __construct()
	{
		parent::__construct();
		$this->akun = $this->session->userdata('akun_id');
	}
	public function getAll($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('penduduk', 'tb_users.ID = penduduk.id_users', 'left');
		$this->db->where('tb_users.ID', $param);
		return $this->db->get();
		
	}
	public function get_profil()
	{
		$akunprofil = $this->session->userdata('akun_id');
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('penduduk', 'tb_users.ID = penduduk.ID_users');
		$this->db->where('tb_users.ID', $akunprofil);
		$query = $this->db->get()->result();
		return $query;
	}

	public function update_avatar($data) {
     extract($data); 
   	$array = array('ID' => $ID);
	$this->db->where($array);
    $this->db->update($table, 
    	array(
    		'photo' => $photo,
    		));
    return;
	}
	public function update_akun($up_akun) {
     extract($up_akun); 
   	$array = array('ID' => $ID);
	$this->db->where($array);
    $this->db->update($table, 
    	array(
    		'username' => $username,
    		'email' =>	$email,
     		));
    return;
	}
	public function update_kependudukan($data) {
    extract($data); 
   	$array = array('ID_users' => $ID_users);
	$this->db->where($array);
    $this->db->update($table, 
    	array(
    	'nik'  => $nik,
        'no_kk'  => $no_kk,
        'status_kk' => $status_kk,
        'nama_lengkap'  => $nama_lengkap,
        'tmp_lahir'  => $tmp_lahir,
        'tgl_lahir'  => $tgl_lahir,
        'jns_kelamin'  => $jns_kelamin,
        'alamat'  => $alamat,
        'rt'  => $rt,
        'rw'  => $rw,
        'desa'  => $desa,
        'kecamatan'  => $kecamatan,
        'agama'  => $agama,
        'pekerjaan'  => $pekerjaan,
        'kewarganegaraan'  => $kewarganegaraan,
        'status_kawin'  => $status_kawin,
        'gol_darah'  => $gol_darah,
        'photo_ktp' => $photo
    		));
    return;
	}

	public function update_kependudukan_no_photo($data) {
     extract($data); 
   	$array = array('ID_users' => $ID_users);
	$this->db->where($array);
    $this->db->update($table, 
    	array(
    			'nik'  => $nik,
                'no_kk'  => $no_kk,
                'nama_lengkap'  => $nama_lengkap,
                'tmp_lahir'  => $tmp_lahir,
                'tgl_lahir'  => $tgl_lahir,
                'jns_kelamin'  => $jns_kelamin,
                'alamat'  => $alamat,
                'rt'  => $rt,
                'rw'  => $rw,
                'desa'  => $desa,
                'kecamatan'  => $kecamatan,
                'agama'  => $agama,
                'pekerjaan'  => $pekerjaan,
                'kewarganegaraan'  => $kewarganegaraan,
                'status_kawin'  => $status_kawin,
                'gol_darah'  => $gol_darah,
                'status_kk' => $status_kk,
    		));
    return;
	}

	public function update_password($datapassword) {
    extract($datapassword); 
   	$array = array('ID' => $ID);
	$this->db->where($array);
    $this->db->update($table, 
    	array(
    			'password'  => $password,
    		));
    return;
	}
	
}

/* End of file Makun.php */
/* Location: ./application/models/Makun.php */