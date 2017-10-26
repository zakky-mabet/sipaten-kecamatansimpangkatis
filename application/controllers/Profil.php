<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package Controller universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class Profil extends CI_Controller {
	public function __construct( )
    {
        parent::__construct();
        if ( ! $this->session->userdata('user_login') ) :
            $this->template->alert(
                'Silahkan Login Gan ! ', 
                array('type' => 'danger','icon' => 'close'));
            redirect('login');
            return;
        endif;
        $this->load->model('makun');
        $this->load->model('m_elayanan');
        $this->load->model('agama');
        $this->load->library(array('form_validation','template','user_agent','upload'));
        $this->load->helper(array('form', 'url'));
    }
	public function index()
	{
		$data = array(
            'title' => 'Profil - KISS - Koba District Information And Service Center - Kabupaten Bangka Tengah',
            'crumb' => 'Profil Pengguna',
            'profil' => $this->makun->get_profil(), 
            'agama' => $this->agama->get_all_agama(),
            'darah' => $this->m_elayanan->darah(),   
            );
        $this->template->view('main/v_profil', $data);
	}
	public function ganti_avatar($param=0)
	{	
	
		$create_tgl = date('Y-m-d H:i:s'); 
        $this->load->library('upload');
        $nmfile = 'user'.date('YmdHis'); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/img-user/'; //path folder
        $tipe =$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '40480'; //maksimum besar file 2M
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['photo']['name'])
        {
            if ($this->upload->do_upload('photo'))
            {
                $gbr = $this->upload->data();
                $data = array(  
                'photo' =>$gbr['file_name'],
                'table' => 'tb_users', 
                'ID' => $this->session->userdata('akun_id'),                  
                );
            $query = $this->db->get_where('tb_users', array('ID' => $this->session->userdata('akun_id') ));
            $rowp = $query->row();
            @unlink('assets/img/img-user/'.$rowp->photo);     
            $this->makun->update_avatar($data);
            $this->template->alert(
                'Profil telah diubah !', 
                array('type' => 'success','icon' => 'check'));
                redirect('profil');
                return; 
            }else{
                $this->template->alert(
                'Profil gagal diubah !', 
                array('type' => 'danger','icon' => 'close'));
                redirect('profil'); 
                return; 
            }
        }
        else {
             $this->template->alert(
                'Harap pilih profil !', 
                array('type' => 'danger','icon' => 'close'));
                redirect('profil');
                return; 
        }}

	public function update_akun($param=0)
	{	
		$data = array(
            'title' => 'Profil - KISS - Koba District Information And Service Center - Kabupaten Bangka Tengah',
            'crumb' => 'Profil Pengguna',
            'profil' => $this->makun->get_profil(),  
            'agama' => $this->agama->get_all_agama(),  
            );
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
        $email=$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');	
        if ($this->form_validation->run() == FALSE)
        {
           $this->template->view('main/v_profil', $data);

        } 
        else
        {	
        	$up_akun = array(
        		'username' => $this->input->post('username'), 
        		'email' => $this->input->post('email'),
        		'table' => 'tb_users', 
        		'ID' => $this->session->userdata('akun_id'),  
        		);
        	$this->makun->update_akun($up_akun);
        	$this->template->alert(
				' Data akun anda telah diubah !', 
				array('type' => 'success','icon' => 'check')
			);
            redirect('profil');
            return; 
        }
	}
	public function update_kependudukan()
	{	
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'trim|required|is_numeric');
        $this->form_validation->set_rules('shdk', 'Status KK', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT', 'trim|is_numeric');
		$this->form_validation->set_rules('rw', 'RW', 'trim|is_numeric');
		$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraans', 'trim|required');
		$this->form_validation->set_rules('status_kawin', 'Status Kawin', 'trim|required');
		$this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
        	$data = array(
            'title' => 'Profil - Sipaten Kecamatan Koba - Kabupaten Bangka Tengah',
            'crumb' => 'Profil Pengguna',
            'profil' => $this->makun->get_profil(),  
            'agama' => $this->agama->get_all_agama(),  
            );
           $this->template->view('main/v_profil', $data);
        } else {
        	
		$create_tgl = date('Y-m-d H:i:s'); 
        $this->load->library('upload');
        $nmfile = 'penduduk'.date('YmdHis'); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/img-ktp/'; //path folder
        $tipe =$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '40480'; //maksimum besar file 2M
        $config['max_width']  = '12880'; //lebar maksimum 1288 px
        $config['max_height']  = '7680'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        if($_FILES['photo_ktp']['name'])
        {
            if ($this->upload->do_upload('photo_ktp'))
            {
                $gbr = $this->upload->data();
                $data = array(
                'nik'  => $this->input->post('nik'),
                'no_kk'  => $this->input->post('no_kk'),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'tmp_lahir'  => $this->input->post('tmp_lahir'),
                'tgl_lahir'  => $this->input->post('tgl_lahir'),
                'jns_kelamin'  => $this->input->post('jns_kelamin'),
                'alamat'  => $this->input->post('alamat'),
                'rt'  => $this->input->post('rt'),
                'rw'  => $this->input->post('rw'),
                'desa'  => $this->input->post('desa'),
                'kecamatan'  => $this->input->post('kecamatan'),
                'agama'  => $this->input->post('agama'),
                'pekerjaan'  => $this->input->post('pekerjaan'),
                'kewarganegaraan'  => $this->input->post('kewarganegaraan'),
                'status_kawin'  => $this->input->post('status_kawin'),
                'gol_darah'  => $this->input->post('gol_darah'),
                'photo' =>$gbr['file_name'],
                'table' => 'penduduk', 
                'ID_users' => $this->session->userdata('akun_id'),
                'status_kk'  => $this->input->post('shdk'),
                );
         	$query = $this->db->get_where('penduduk', array('ID_users' => $this->session->userdata('akun_id')));
            $rowpenduduk = $query->row();
            @unlink('assets/img/img-ktp/'.$rowpenduduk->photo_ktp);     
            $this->makun->update_kependudukan($data);
            $this->template->alert(
                'Data Kependudukan telah diubah !', 
                array('type' => 'success','icon' => 'check'));
                redirect('profil');
                return; 
            }else{
            $this->template->alert(
                'Data Kependudukan gagal di ubah !', 
                array('type' => 'danger','icon' => 'close'));
                redirect('profil'); 
                return; 
            }
        }
        elseif (!$_FILES['photo_ktp']['name']) {
        	$data = array(
                'nik'  => $this->input->post('nik'),
                'no_kk'  => $this->input->post('no_kk'),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'tmp_lahir'  => $this->input->post('tmp_lahir'),
                'tgl_lahir'  => $this->input->post('tgl_lahir'),
                'jns_kelamin'  => $this->input->post('jns_kelamin'),
                'alamat'  => $this->input->post('alamat'),
                'rt'  => $this->input->post('rt'),
                'rw'  => $this->input->post('rw'),
                'desa'  => $this->input->post('desa'),
                'kecamatan'  => $this->input->post('kecamatan'),
                'agama'  => $this->input->post('agama'),
                'pekerjaan'  => $this->input->post('pekerjaan'),
                'kewarganegaraan'  => $this->input->post('kewarganegaraan'),
                'status_kawin'  => $this->input->post('status_kawin'),
                'gol_darah'  => $this->input->post('gol_darah'),
                'table' => 'penduduk', 
                'ID_users' => $this->session->userdata('akun_id'),
                'status_kk'  => $this->input->post('shdk'),                  
                );
        	 $this->makun->update_kependudukan_no_photo($data);
              $this->template->alert(
                'Data Kependudukan telah diubah !', 
                array('type' => 'success','icon' => 'check'));
                redirect('profil');
                return; 
        }else{
            $this->template->alert(
                'Data Kependudukan gagal di ubah !', 
                array('type' => 'danger','icon' => 'close'));
                redirect('profil'); //jika gagal maka akan ditampilkan form upload
                return; 
            }
      }
	}	
	public function update_password() {
		$data = array(
            'title' => 'Profil - KISS - Koba District Information And Service Center - Kabupaten Bangka Tengah',
            'crumb' => 'Profil Pengguna',
            'profil' => $this->makun->get_profil(), 
            'agama' => $this->agama->get_all_agama(),   
            );
        $this->form_validation->set_rules('sandi_lama', 'Sandi Lama', 'trim|required');
        $this->form_validation->set_rules('sandi_baru', 'Sandi Baru', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('ulangi_sandi_baru', 'Ulangi Sandi Baru', 'trim|required|min_length[6]|matches[sandi_baru]');
       
        if ($this->form_validation->run() == FALSE)
        {
            $this->template->view('main/v_profil', $data);
        } 
        else {
        	$query = $this->db->get_where('tb_users', array('ID' => $this->session->userdata('akun_id')));
            $row_user = $query->row();
            $password = $this->input->post('sandi_lama');
            $passbaru = password_hash($this->input->post('sandi_baru'),PASSWORD_DEFAULT);
            if (password_verify($password,$row_user->password)) {
            	$datapassword = array(
            		'password' => $passbaru,
            		'table' => 'tb_users', 
                	'ID' => $this->session->userdata('akun_id'),
            		);
           	$this->makun->update_password($datapassword);
            $this->template->alert(
                'Sandi anda telah di ubah !', 
                array('type' => 'success','icon' => 'check'));
                redirect('profil');
                return; 
            }
            else {
            $this->template->alert(
                'Sandi lama anda salah, silahkan coba lagi !', 
                array('type' => 'danger','icon' => 'close'));
                redirect('profil');
                return; 
            }
        }
	}
}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */