<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package model universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class M_epengaduan extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
		date_default_timezone_set("Asia/Bangkok");
	}
	public function add()
	{
		$this->db->select('*');
    	$query = $this->db->get_where('tb_users', array('email' => strtolower($this->input->post('email'))));
    	if($query->num_rows() == 0)
		{
			$user = array(
			'username' 	=> strtolower($this->input->post('username')), 
			'password' 	=> password_hash($this->input->post('buat_sandi'), PASSWORD_DEFAULT),
			'email' 	=> strtolower($this->input->post('email')),  
			'status' 	=> 'no',
			'no_hp' 	=> $this->input->post('ponsel'), 
            'kode_verifikasi' => date('his'),
            'tgl_daftar' => date('Y-m-d H:i:s'),
			); 
		$q = $this->db->insert('tb_users', $user);
		if ($q  == TRUE) {
			$this->db->select('*');
    		$get_id = $this->db->get_where('tb_users', array('email' =>$this->input->post('email')))->row('ID');
    	$penduduk = array(
			'nama_lengkap' 	=> strtolower($this->input->post('nama_lengkap')), 
			'tgl_lahir' 	=> $this->input->post('tgl_lahir'),
			'jns_kelamin' 	=> strtolower($this->input->post('jns_kelamin')),
			'ID_users' 	=> $get_id,
			'status_kunci' => 'no',
			); 	
    	$qpenduduk = $this->db->insert('penduduk', $penduduk);
    	if ($qpenduduk  == TRUE) {
    		
            $subjek = 'Verifikasi Email - KISS - Sistem Informasi Pelayanan Kecamatan Koba';
            $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'ssl://srv32.niagahoster.com', // host server EX. ssl//: blah blah
              'smtp_port' => 465,
              'smtp_user' => 'kiss@kecamatankoba.net', //isi dengan user akun
              'smtp_pass' => 'IM3ulaes_kiss', //isi dengan password 
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('kiss@kecamatankoba.net'); //user akun mail
            $this->email->to($this->input->post('email')); //email tujuan. Isikan dengan emailmu!
            $this->email->subject($subjek);
            $this->db->select('*');
            $query = $this->db->get_where('tb_users', array('email' => $this->input->post('email')));
            $row_data = $query->row();
            $data = array(
             'nama_lengkap_anda' => $this->input->post('nama_lengkap'),
             'email_anda' => $this->input->post('email'),
             'kode' => $row_data->kode_verifikasi,
             'pass' => $this->input->post('password'),
                 );
            $pesan = $this->load->view('emails/format_email_2.php',$data,TRUE);
            $this->email->message($pesan); 
            if($this->email->send() == TRUE)
            {
            $this->session->set_flashdata("pesan", 
            "<div class='alert alert-success alert-dismissible animated fadein' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fa fa-icon'></i>Terima kasih sudah mendaftar, kami sudah mengirim kode verifikasi ke email anda, silahkan periksa email anda !</div>"
            );
            redirect('daftar/verifikasi');
            return; 
            }
    		  }		
		  }
	}
		else {
			redirect('daftar/gagal');
		}	
	}
    function get_insert($data,$table){
       $this->db->insert($table, $data);
       return TRUE;
    }
    function get_histori(){
    	$id = $this->session->userdata('akun_id');
     	$query = $this->db->query("SELECT * FROM epengaduan WHERE ID_users='$id' ORDER BY ID DESC");
		return $query->result();
    }
    public function up_pengaduan($data) {
     extract($data); 
        $this->db->where('ID', $ID);
        $this->db->update($table, array('ID_pengaduan' => $ID_pengaduan));
        return;
	}

	public function update_pengaduan($data) {
     extract($data); 
   	$array = array('ID' => $ID , 'status_pesan' => 'no');
	$this->db->where($array);
    $this->db->update($table, 
    	array(
    		'pesan' => $pesan,
    		'photo' => $photo,
    		'create_tgl' => $create_tgl,
    		'judul' => $judul,
            'alamat_lokasi' => $alamat_lokasi,
    		));
    return;
	}

	public function ubah_pengaduan($data) {
    extract($data); 
    $this->db->where('ID', $ID);
    $this->db->update($table, array('status_pesan' => $status_pesan));
    return;
	}
	function insert_penilaian($pindah,$table){
       $this->db->insert($table, $pindah);
       return TRUE;
    }
    function get_detail($ID) {
    	$array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
		$this->db->where($array);
		$equipid = $this->db->get('epengaduan');
		return $equipid->result();
    }

    function hapus($ID){

     $array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
	 $this->db->where($array);
     $query = $this->db->get('epengaduan');
     $row = $query->row();
     @unlink('assets/img/epengaduan/'.$row->photo);
     $this->db->delete('epengaduan', array('ID' => $ID, 'ID_users' => $this->session->userdata('akun_id')));
		}
    public function up_status_pengaduan($ID) {
    $array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
    $this->db->where($array);
    $this->db->update('epengaduan', 
        array(
            'status_pesan' => 'read',
            ));
    return;
    }
     function get_panduan(){
      $query = $this->db->query("SELECT * FROM panduan_pengaduan");
      return $query->result();
    }

    function get_panduan_read($slug) {
      $array = array('slug' => $slug);
      $this->db->where($array);
      $equipid = $this->db->get('panduan_pengaduan');
      return $equipid->result();
    }
    function  count_by_date($date) {
      $sub = substr($date, 0,10);    
      $query = $this->db->select('epengaduan.create_tgl');
      $query = $this->db->like('epengaduan.create_tgl', $date );
      return $this->db->get('epengaduan')->num_rows(); 
     } 
}

/* End of file Epengaduan.php */
/* Location: ./application/models/Epengaduan.php */