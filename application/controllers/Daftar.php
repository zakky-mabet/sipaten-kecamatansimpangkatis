<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package Controller universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class Daftar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','template','user_agent'));
		$this->load->model('m_epengaduan');

	}
	public function index()
	{
	
		$data = array(
			'title' => 'Daftar - KISS - Koba District Information And Service Center - Kabupaten Bangka Tengah',
			'crumb' => 'Daftar'  
			);
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
        $email=$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');	
        $this->form_validation->set_rules('buat_sandi', 'Sandi', 'trim|required');
        $this->form_validation->set_rules('konfirmasi_sandi', 'Konfirmasi Sandi', 'trim|required|matches[buat_sandi]');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('ponsel', 'Ponsel','trim|required|is_numeric|min_length[10]|max_length[12]|alpha_numeric_spaces');
        if ($this->form_validation->run() == FALSE)
        {
           $this->template->view('v_daftar',$data);
        } 
        else
        {
        	$this->m_epengaduan->add();
        }

	}
	public function gagal()
	{
		 	$this->template->alert(
                'Email Anda sudah terdaftar.', 
                array('type' => 'danger','icon' => 'close')
            );
            redirect('daftar');
            return;		
	}

	public function verifikasi()
	{
		$data = array(
			'title' => 'Verifikasi Akun - KISS - Koba District Information And Service Center - Kabupaten Bangka Tengah',
			'crumb' => 'Verifikasi Akun'  
			);
	
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');	;
        $this->form_validation->set_rules('code', 'Code', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->template->view('v_daftar_verifikasi',$data);
        } 
        else
        {	
           $this->db->select('*');
	       $query = $this->db->get_where('tb_users', array('email' => $this->input->post('email'), 'kode_verifikasi' => $this->input->post('code')));
	       $row_v = $query->row();
	       echo $query->num_rows();
	       if($query->num_rows() == 1 ){
		        $array = array('email' => $this->input->post('email') );
		        $this->db->where($array);
		        $this->db->update('tb_users', 
		            array(
		                'status' => 'yes',
		                'kode_verifikasi' => 'terverifikasi'.date('Y-m-d H:i:s'),
		                ));
		        $this->template->alert(
                'Email anda telah terverifikasi, silahkan login !', 
                array('type' => 'success','icon' => 'check'));
                redirect('login');
                return; 
	       } else {
	       		$this->template->alert(
                'Maaf, Email atau Kode yang anda masukan salah !', 
                array('type' => 'danger','icon' => 'close'));
                redirect('daftar/verifikasi');
                return; 
	       }
        }	
	}

	public function mail($value='')
	{
		$this->load->view('emails/format_email');
	}
	public function mail2($value='')
	{
		$this->load->view('emails/format_email_2');
	}
}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */