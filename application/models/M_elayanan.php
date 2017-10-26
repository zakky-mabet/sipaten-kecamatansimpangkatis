<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package model universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class M_elayanan extends CI_Model {

	public function perizinan()
	{
		$query = $this->db->query("SELECT * FROM tb_elayanan WHERE status='yes' AND kategori_layanan='perizinan' ORDER BY id ASC");
		return $query->result();
	}

	public function keterangan()
	{
		$query = $this->db->query("SELECT * FROM tb_elayanan WHERE status='yes' AND 
			kategori_layanan='keterangan' ORDER BY id ASC");
		return $query->result();
	}

	public function desa()
	{
		$query = $this->db->query("SELECT * FROM desa");
		return $query->result();
	}

	public function darah()
	{
		$query = $this->db->query("SELECT * FROM golongan_darah");
		return $query->result();
	}

	public function agama()
	{
		$query = $this->db->query("SELECT * FROM master_agama");
		return $query->result();
	}

	public function hari()
	{
		$query = $this->db->query("SELECT * FROM hari");
		return $query->result();
	}

	public function syarat_surat()
	{	
		$query = $this->db->query("SELECT * FROM syarat_surat ");
		return $query->result();
	}

	public function insert_surat($data,$table)
	{
		$this->db->insert($table, $data);
       	return TRUE;
	}

	public function up_surat($data) {
     	extract($data); 
    	$this->db->where('ID', $ID);
    	$this->db->update($table, array('ID_pelayanan' => $ID_pelayanan));
    	return;
	}

	function get_histori(){
    	$id = $this->session->userdata('akun_id');
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->join('kategori_surat', 'surat.kode_surat = kategori_surat.kode_surat_sistem', 'left');
		$this->db->where('ID_users', $id);
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		return $query->result();
    }

       function get_detail($ID) {
    	$array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->join('kategori_surat', 'surat.kode_surat = kategori_surat.kode_surat_sistem', 'left');
		$this->db->where($array);
		$query = $this->db->get();
		return $query->result();
    }

    function get_file($kode){
    	$array = array('kode_surat_sistem' => $kode );
		$this->db->select('syarat');
		$this->db->from('kategori_surat');
		$this->db->where($array);
		$query = $this->db->get();
		return $query->result();
    }

    public function ubah_surat($data,$ID) {
	    $this->db->where('ID', $ID);
	   	$this->db->update('surat', $data );
	   	return TRUE;
	}

	 function hapus($ID){

     $array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
	 $this->db->where($array);
     $query = $this->db->get('surat');
     $row = $query->row();
     switch ($row->kode_surat) {
			    case 48: //sktm
			    	$folder = 'sktm';
			    break;
			     case 8: //rpik
			    	$folder = 'rpik';
			    break;
			    case 503: //skkb
			    	$folder = 'skkb';
			    break;
			    case 19: //skw
			    	$folder = 'skw';
			    break;
			    case 3: //kts
			    	$folder = 'kts';
			    break;
			    case 2: //kdp
			    	$folder = 'kdp';
			    break;
			    case 1: //kpj
			    	$folder = 'kpj';
			    break;
			    case 12: //srku
			    	$folder = 'srku';
			    break;
			    case 5: //sbl
			    	$folder = 'sbl';
			    break;
			    case 10: //imk
			    	$folder = 'imk';
			    break;
			    case 7: //siup
			    	$folder = 'siup';
			    break;
			    case 9: //imb
			    	$folder = 'imb';
			    break;
			    case 11: //srig
			    	$folder = 'srig';
			    break;
			    case 13: //rpio
			    	$folder = 'rpio';
			    break;
			    case 16: //sp3fat
			    	$folder = 'sp3fat';
			    break;
			    case 17: //sp4fat
			    	$folder = 'sp4fat';
			    break;
			    case 4: //kpw
			    	$folder = 'kpw';
			    break;
			    default:	
			        redirect('epelayanan/histori/');
			    break;
			    }
				$d_berkas  = json_decode($row->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/'.$folder.'/'.$key); 
             		}	
     			$this->db->delete('surat', array('ID' => $ID, 'ID_users' => $this->session->userdata('akun_id')));
     			return TRUE;
		}

	public function up_status_pengaduan($ID) {
    $array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
    $this->db->where($array);
    $this->db->update('surat', 
        array(
            'status' => 'read',
            ));
    return;
    }

   function get_panduan(){
      $query = $this->db->query("SELECT * FROM panduan_pelayanan");
      return $query->result();
    }

    function get_panduan_read($slug) {
      $array = array('slug' => $slug);
      $this->db->where($array);
      $equipid = $this->db->get('panduan_pelayanan');
      return $equipid->result();
    } 


    public function insert_surat_penduduk($data,$table)
	{
		$this->db->insert($table, $data);
       	return TRUE;
	}

	 public function ubah_penduduk($data_penduduk,$nik) {
	    $this->db->where('nik', $nik);
	   	$this->db->update('penduduk', $data_penduduk );
	   	return TRUE;
	}


}

/* End of file M_elayanan.php */
/* Location: ./application/models/M_elayanan.php */