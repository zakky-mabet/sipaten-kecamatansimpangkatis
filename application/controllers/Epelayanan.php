<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package Controller universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class Epelayanan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ( ! $this->session->userdata('user_login') ) :
			$this->template->alert(
                'Silahkan Login untuk mengakses Epelayanan.', 
                array('type' => 'danger','icon' => 'close'));
            redirect('login');

            return;
        endif;
		$this->load->library(array('form_validation','template','user_agent','upload'));
        $this->load->model(array('agama','m_elayanan' ));
        $this->load->helper(array('form', 'url'));
        error_reporting(0);
	}
	public function index()
	{
		$data = array(
			'title' => 'E-Pelayanan - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'E-Pelayanan',
			'perizinan' 	=>  $this->m_elayanan->perizinan(),
			'keterangan' 	=>  $this->m_elayanan->keterangan(),
			);
		$this->template->view('main/pelayanan/v_epelayanan', $data);
	}
	public function histori()
	{
		$data = array(
			'title' => 'Riwayat Pelayanan - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Riwayat Pelayanan',
			'histori' => $this->m_elayanan->get_histori(),
			);
		$this->template->view('main/pelayanan/v_histori_epelayanan', $data);
	}

	public function sktm($kode=48)
	{
		$data = array(
			'title' => 'Surat Keterangan Tidak Mampu - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Keterangan Tidak Mampu',
			'desa'  => $this->m_elayanan->desa(),
			'file'  => $this->m_elayanan->get_file($kode),
			'syarat_surat'  => $this->m_elayanan->syarat_surat(),
			);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
        $this->form_validation->set_rules('desa', 'Desa','trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap','trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir','trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan','trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat','trim|required');
        $this->form_validation->set_rules('no_surat_rek', 'Nomor Surat','trim|required');
        $this->form_validation->set_rules('tgl_surat_rek', 'Tanggal Surat','trim|required');
        $this->form_validation->set_rules('desa', 'Nama Desa','trim|required');
        $this->form_validation->set_rules('pejabat_lurah', 'Nama Pejabat Lurah / Kades','trim|required');
        $this->form_validation->set_rules('nip_pejabat_lurah', 'NIP','trim|required');
        $this->form_validation->set_rules('jabatan_pejabat_lurah', 'Jabatan','trim|required');

        $this->form_validation->set_rules('keperluan', 'Keperluan','trim|required');
        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_sktm', $data);
        } 

        else
        { 
         if (isset($_FILES['sktm_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sktm_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sktm/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 

	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sktm_1'))
		           { 
		           	$f1 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['sktm_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sktm_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sktm/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sktm_2'))
		           { 
		           	$f2 = $this->upload->data();
	        	 	}	
	        }
	         if (isset($_FILES['sktm_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sktm_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sktm/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sktm_3'))
		           { 
		           	$f3 = $this->upload->data();
	        	 	}	
	        }

		           	$json= array(
	        			
	        			'no_surat_rek'=> $this->input->post('no_surat_rek'),
				        'tgl_surat_rek'=> $this->input->post('tgl_surat_rek'),
				        'desa' => $this->input->post('desa'),
				        'pejabat_lurah'=> $this->input->post('pejabat_lurah'),
				        'nip_pejabat_lurah'=> $this->input->post('nip_pejabat_lurah'),
				        'jabatan_pejabat_lurah'=> $this->input->post('jabatan_pejabat_lurah'),
				        'pengikut' => 0,
				        'keperluan' => $this->input->post('keperluan'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        			'pekerjaan' => $this->input->post('pekerjaan'),  
	        			'alamat' => $this->input->post('alamat'),   
	        			
	        			
	        			);
	        		$berkas_json = array(
	        			'sktm_1' =>  $f1['file_name'],
	        			'sktm_2' =>  $f2['file_name'],
	        			'sktm_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'sktm_1' =>  base_url('assets/berkas/sktm/'.$f1['file_name']),
	        			'sktm_2' =>  base_url('assets/berkas/sktm/'.$f2['file_name']),
	        			'sktm_3' =>  base_url('assets/berkas/sktm/'.$f3['file_name']),
	        			);

		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 48,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-SKTM-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap' => $this->input->post('nama_lengkap'),
	        				'tmp_lahir' => $this->input->post('tmp_lahir'),
	        				'tgl_lahir' => $this->input->post('tgl_lahir'),
	        				'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        				'pekerjaan' => $this->input->post('pekerjaan'),  
	        				'alamat' => $this->input->post('alamat'),   
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                } else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap' => $this->input->post('nama_lengkap'),
	        				'tmp_lahir' => $this->input->post('tmp_lahir'),
	        				'tgl_lahir' => $this->input->post('tgl_lahir'),
	        				'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        				'pekerjaan' => $this->input->post('pekerjaan'),  
	        				'alamat' => $this->input->post('alamat'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }
		               
		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Keterangan Tidak Mampu anda berhasil dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}        	
        }
	}

	public function skkb()
	{
		$data = array(
			'title' => 'Surat Keterangan Kelakuan Baik - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Keterangan Kelakuan Baik',
			'desa'  => $this->m_elayanan->desa(),
			);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
        $this->form_validation->set_rules('desa', 'Desa','trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap','trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir','trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan','trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat','trim|required');
        $this->form_validation->set_rules('keperluan', 'Keperluan','trim|required');
        $this->form_validation->set_rules('no_surat', 'No surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_skkb', $data);
        } 

        else
        {
        	
        	if (isset($_FILES['skkb_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_skkb_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/skkb/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '100480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('skkb_1'))
		           { 
		           	$f1 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['skkb_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_skkb_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/skkb/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '100480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('skkb_2'))
		           { 
		           	$f2 = $this->upload->data();
	        	 	}	
	        }
	         if (isset($_FILES['skkb_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_skkb_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/skkb/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '100480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('skkb_3'))
		           { 
		           	$f3 = $this->upload->data();
	        	 	}	
	        }
		           		$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        			'pekerjaan' => $this->input->post('pekerjaan'),  
	        			'alamat' => $this->input->post('alamat'),   
	        			'keperluan' => $this->input->post('keperluan'),
	        			'no_surat'=>$this->input->post('no_surat'),
						'tanggal_surat'=>$this->input->post('tanggal_surat'),

						'no_surat_rek'=>$this->input->post('no_surat'),
						'tgl_surat_rek'=>$this->input->post('tanggal_surat'),

	        			);
	        		$berkas_json = array(
	        			'skkb_1' =>  $f1['file_name'],
	        			'skkb_2' =>  $f2['file_name'],
	        			'skkb_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'skkb_1' => base_url('assets/berkas/skkb/'.$f1['file_name']),
	        			'skkb_2' => base_url('assets/berkas/skkb/'.$f2['file_name']),
	        			'skkb_3' => base_url('assets/berkas/skkb/'.$f3['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 503,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-SKKB-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
		        			'pekerjaan' => $this->input->post('pekerjaan'), 
		        			'alamat' => $this->input->post('alamat'),    
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                } else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
		        			'pekerjaan' => $this->input->post('pekerjaan'),
		        			'alamat' => $this->input->post('alamat'),     
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Keterangan Kelakuan Baik anda berhasil dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}  
        } 
    }

    public function srku()
	{
		$data = array(
			'title' => 'Surat Rekomendasi Keterangan Usaha  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Rekomendasi Keterangan Usaha',
			'desa'  => $this->m_elayanan->desa(),
			'agama' => $this->agama->get_all_agama(),
			);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('desa', 'Desa','trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap','trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir','trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan','trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat Pemohon','trim|required');
        $this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha','trim|required');
        $this->form_validation->set_rules('usaha', 'Nama Usaha','trim|required');
        $this->form_validation->set_rules('pejabat_lurah', 'Nama Pejabat Lurah / Kades','trim|required');
        $this->form_validation->set_rules('nip_pejabat_lurah', 'NIP','trim|required');
        $this->form_validation->set_rules('jabatan_pejabat_lurah', 'Jabatan','trim|required');
        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_srku', $data);
        } 

        else
        {

        	if (isset($_FILES['srku_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srku_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srku/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srku_1'))
		           { 
		           	$f1 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srku_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srku_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srku/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '440480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srku_2'))
		           { 
		           	$f2 = $this->upload->data();
	        	 	}	
	        }
	         if (isset($_FILES['srku_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srku_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srku/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '440480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srku_3'))
		           { 
		           	$f3 = $this->upload->data();
	        	 	}	
	        }
		           		$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        			'agama' => $this->input->post('agama'),  
	        			'pekerjaan' => $this->input->post('pekerjaan'),  
	        			'alamat' => $this->input->post('alamat'),   
	        			'usaha' => $this->input->post('usaha'),
	        			'alamat_usaha' => $this->input->post('alamat_usaha'),

	        			'pejabat_lurah'=> $this->input->post('pejabat_lurah'),
        				'nip_pejabat_lurah'=> $this->input->post('nip_pejabat_lurah'),
        				'jabatan_pejabat_lurah'=> $this->input->post('jabatan_pejabat_lurah'),

						'nama_usaha'=> $this->input->post('usaha'),

	        			);
	        		$berkas_json = array(
	        			'srku_1' =>  $f1['file_name'],
	        			'srku_2' =>  $f2['file_name'],
	        			'srku_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'srku_1' =>  base_url('assets/berkas/srku/'. $f1['file_name']),
	        			'srku_2' =>  base_url('assets/berkas/srku/'. $f2['file_name']),
	        			'srku_3' =>  base_url('assets/berkas/srku/'. $f3['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 12,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-SRKU-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);
		                $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
		        			'agama' => $this->input->post('agama'),  
		        			'pekerjaan' => $this->input->post('pekerjaan'),  
		        			'alamat' => $this->input->post('alamat'),   
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }
		                 else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
		        			'agama' => $this->input->post('agama'),  
		        			'pekerjaan' => $this->input->post('pekerjaan'),  
		        			'alamat' => $this->input->post('alamat'),   
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Rekomendasi Keterangan Usaha anda berhasil dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}

        }
    }

    public function srig()
	{
		$data = array(
			'title' => 'Surat Rekomendasi Izin Gangguan  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Rekomendasi Izin Gangguan',
			'desa'  => $this->m_elayanan->desa(),
			'agama' => $this->agama->get_all_agama(),
			);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('desa', 'Desa','trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap','trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir','trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan','trim|required');
        $this->form_validation->set_rules('alamat_pemohon', 'Alamat Pemohon','trim|required');
        $this->form_validation->set_rules('nama_toko', 'Nama Perusahaan','trim|required');
        $this->form_validation->set_rules('alamat_usaha', 'Alamat Tempat Usaha','trim|required');
        $this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan','trim|required');
        $this->form_validation->set_rules('jenis_bangunan', 'Jenis Bangunan','trim|required');
        $this->form_validation->set_rules('lokasi_bangunan', 'Lokasi Bangunan','trim|required');
        $this->form_validation->set_rules('no_surat', ' Nomor Surat','trim|required');
        $this->form_validation->set_rules('tgl_surat', ' Tanggal Surat','trim|required');
        $this->form_validation->set_rules('nama_lurah', 'Nama Lurah/ Kades','trim|required');
        $this->form_validation->set_rules('jabatan_lurah', 'Jabatan Lurah/ Kades','trim|required');
 
        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_srig', $data);
        } 
        else
        {
        	if (isset($_FILES['srig_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_1'))
		           { 
		           	$f1 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '22880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_2'))
		           { 
		           	$f2 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '32880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_3'))
		           { 
		           	$f3 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_4'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_4_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '42880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_4'))
		           { 
		           	$f4 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_5'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_5_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '52880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_5'))
		           { 
		           	$f5 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_6'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_6_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '62880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_6'))
		           { 
		           	$f6 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_7'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_7_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '72880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_7'))
		           { 
		           	$f7 = $this->upload->data();
	        	 	}	
	        }

	       			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        			'agama' => $this->input->post('agama'),  
	        			'pekerjaan' => $this->input->post('pekerjaan'),  
	        			'alamat_pemohon' => $this->input->post('alamat_pemohon'),   
	        			'nama_toko' => $this->input->post('nama_toko'),
	        			'alamat_usaha' => $this->input->post('alamat_usaha'),  
	        			'jenis_kegiatan' => $this->input->post('jenis_kegiatan'), 
	        			'jenis_bangunan' => $this->input->post('jenis_bangunan'),  
	        			'lokasi_bangunan' => $this->input->post('lokasi_bangunan'),

	        			'no_surat'=> $this->input->post('no_surat'),
				        'tgl_surat'=> $this->input->post('tgl_surat'),
				        'nama_lurah'=> $this->input->post('nama_lurah'),
				        'jabatan_lurah'=> $this->input->post('jabatan_lurah'),

						'no_surat_rek' => $this->input->post('no_surat'),
						'tgl_surat_rek'=> $this->input->post('tgl_surat'),
						'ttd_desa' => $this->input->post('desa'),
						'jabatan_desa' => $this->input->post('jabatan_lurah'),
						'nama'=> $this->input->post('nama_toko'),
						'alamat' => $this->input->post('alamat_usaha'),  
						
	        			);
	        		$berkas_json = array(
	        			'srig_1' =>  $f1['file_name'],
	        			'srig_2' =>  $f2['file_name'],
	        			'srig_3' =>  $f3['file_name'],
	        			'srig_4' =>  $f4['file_name'],
	        			'srig_5' =>  $f5['file_name'],
	        			'srig_6' =>  $f6['file_name'],
	        			'srig_7' =>  $f7['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'srig_1' =>  base_url('assets/berkas/srig/'.$f1['file_name']),
	        			'srig_2' =>  base_url('assets/berkas/srig/'.$f2['file_name']),
	        			'srig_3' =>  base_url('assets/berkas/srig/'.$f3['file_name']),
	        			'srig_4' =>  base_url('assets/berkas/srig/'.$f4['file_name']),
	        			'srig_5' =>  base_url('assets/berkas/srig/'.$f5['file_name']),
	        			'srig_6' =>  base_url('assets/berkas/srig/'.$f6['file_name']),
	        			'srig_7' =>  base_url('assets/berkas/srig/'.$f7['file_name']),
	        			);

		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 11,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),

		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-SRIG-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
		        			'agama' => $this->input->post('agama'),  
		        			'pekerjaan' => $this->input->post('pekerjaan'),  
		        			'alamat' => $this->input->post('alamat_pemohon'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }
		                else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
		        			'agama' => $this->input->post('agama'),  
		        			'pekerjaan' => $this->input->post('pekerjaan'),  
		        			'alamat' => $this->input->post('alamat_pemohon'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }


		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Rekomendasi Izin Usaha anda berhasil dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}

        } //else
	}


	public function rpio()
	{
		$data = array(
			'title' => 'Surat Rekomendasi Perpanjangan Izin Operasional  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Rekomendasi Perpanjangan Izin Operasional',
			'desa'  => $this->m_elayanan->desa(),
			'agama' => $this->agama->get_all_agama(),
			);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('nama_lembaga', 'Nama Lembaga', 'trim|required');
        $this->form_validation->set_rules('nama_pengelola', 'Nama Pengelola','trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat','trim|required');
        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat','trim|required');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat','trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_srpio', $data);
        } 
        else
        {
        	if (isset($_FILES['rpio_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_1'))
		        { 
		           	$f1 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpio_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_2'))
		        { 
		           	$f2 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpio_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_3'))
		        { 
		           	$f3 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpio_4'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_4_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_4'))
		        { 
		           	$f4 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpio_5'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_5_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_5'))
		        { 
		           	$f5 = $this->upload->data();
	        	}
        	}

        			$json= array(
	        			'nama_lembaga' => $this->input->post('nama_lembaga'),
	        			'nama_pengelola' => $this->input->post('nama_pengelola'),
	        			'alamat' => $this->input->post('alamat'),
	        			'nomor_surat'=> $this->input->post('nomor_surat'),
        				'tanggal_surat'=> $this->input->post('tanggal_surat'),
						
						'no_surat_rek'=> $this->input->post('nomor_surat'),
						'tgl_surat_rek'=> $this->input->post('tanggal_surat'),
						'alamat_lembaga' => $this->input->post('alamat'),
						
	        			);
	        		$berkas_json = array(
	        			'rpio_1' =>  $f1['file_name'],
	        			'rpio_2' =>  $f2['file_name'],
	        			'rpio_3' =>  $f3['file_name'],
	        			'rpio_4' =>  $f4['file_name'],
	        			'rpio_5' =>  $f5['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'rpio_1' =>  base_url('assets/berkas/rpio/'.$f1['file_name']),
	        			'rpio_2' =>  base_url('assets/berkas/rpio/'.$f2['file_name']),
	        			'rpio_3' =>  base_url('assets/berkas/rpio/'.$f3['file_name']),
	        			'rpio_4' =>  base_url('assets/berkas/rpio/'.$f4['file_name']),
	        			'rpio_5' =>  base_url('assets/berkas/rpio/'.$f5['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 13,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-RPIO-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }


		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Rekomendasi Perpanjangan Izin Operasional anda berhasil dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}
	        } //else

	}

	public function rpik()
	{
		$data = array(
			'title' => 'Surat Rekomendasi Izin Keramaian  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Rekomendari Izin Keramaian',
			'desa'  => $this->m_elayanan->desa(),
			'hari'  => $this->m_elayanan->hari(),
			'agama' => $this->agama->get_all_agama(),
			);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
		$this->form_validation->set_rules('no_surat', 'No surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('alamat_pemohon', 'Alamat Pemohon', 'trim|required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');
		$this->form_validation->set_rules('hari', 'Hari Acara', 'trim|required');
		$this->form_validation->set_rules('tgl_acara', 'Tanggal Acara', 'trim|required');
		$this->form_validation->set_rules('mulai_pukul', 'Mulai Pukul', 'trim|required');
		$this->form_validation->set_rules('sampai_pukul', 'Sampai Pukul', 'trim|required');
		$this->form_validation->set_rules('tempat_acara', 'Tempat Acara', 'trim|required');
		$this->form_validation->set_rules('hiburan', 'Hiburan', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_rpik', $data);
        } 
        else
        {
        	if (isset($_FILES['rpik_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpik_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpik/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpik_1'))
		        { 
		           	$f1 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpik_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpik_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpik/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpik_2'))
		        { 
		           	$f2 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpik_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpik_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpik/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpik_3'))
		        { 
		           	$f3 = $this->upload->data();
	        	}
        	}
        			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'no_surat' => $this->input->post('no_surat'),
	        			'tanggal_surat' => $this->input->post('tanggal_surat'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),
	        			'agama' => $this->input->post('agama'),
	        			'pekerjaan' => $this->input->post('pekerjaan'),
	        			'alamat_pemohon' => $this->input->post('alamat_pemohon'),
	        			'keperluan' => $this->input->post('keperluan'),
	        			'hari' => $this->input->post('hari'),
	        			'tgl_acara' => $this->input->post('tgl_acara'),
	        			'mulai_pukul' => $this->input->post('mulai_pukul'),
	        			'sampai_pukul' => $this->input->post('sampai_pukul'),
	        			'tempat_acara' => $this->input->post('tempat_acara'),
	        			'hiburan' => $this->input->post('hiburan'),
	        			'no_surat_rek'=> $this->input->post('no_surat'),
						'tgl_surat_rek' => $this->input->post('tanggal_surat'),
						'tanggal' => $this->input->post('tgl_acara'),
						'waktu' => $this->input->post('mulai_pukul').' WIB s.d '.$this->input->post('sampai_pukul').' WIB',
						'tempat'=> $this->input->post('tempat_acara'),
	        			);
	        		$berkas_json = array(
	        			'rpik_1' =>  $f1['file_name'],
	        			'rpik_2' =>  $f2['file_name'],
	        			'rpik_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'rpik_1' =>  base_url('assets/berkas/rpik/'.$f1['file_name']),
	        			'rpik_2' =>  base_url('assets/berkas/rpik/'.$f2['file_name']),
	        			'rpik_3' =>  base_url('assets/berkas/rpik/'.$f3['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 8,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-RPIK-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);
		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),
		        			'agama' => $this->input->post('agama'),
		        			'pekerjaan' => $this->input->post('pekerjaan'),
		        			'alamat' => $this->input->post('alamat_pemohon'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }
		                else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),
		        			'agama' => $this->input->post('agama'),
		        			'pekerjaan' => $this->input->post('pekerjaan'),
		        			'alamat' => $this->input->post('alamat_pemohon'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Rekomendari Izin Keramaian anda berhasil dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}

        } //else
	}

	public function kdp()
	{
		$data = array(
			'title' => 'Surat Keterangan Domisili Perusahaan  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Keterangan Domisili Perusahaan',
			'desa'  => $this->m_elayanan->desa(),
			);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('desa', 'Desa ', 'trim|required');
		$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('desa_perusahaan', 'Desa Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_kdp', $data);
        } 
        else
        {
        	if (isset($_FILES['kdp_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_kdp_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/kdp/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('kdp_1'))
		        { 
		           	$f1 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['kdp_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_kdp_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/kdp/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('kdp_2'))
		        { 
		           	$f2 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['kdp_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_kdp_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/kdp/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('kdp_3'))
		        { 
		           	$f3 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['kdp_4'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_kdp_4_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/kdp/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('kdp_4'))
		        { 
		           	$f4 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['kdp_5'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_kdp_5_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/kdp/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('kdp_5'))
		        { 
		           	$f5 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['kdp_6'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_kdp_6_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/kdp/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('kdp_6'))
		        { 
		           	$f6 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['kdp_7'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_kdp_7_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/kdp/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('kdp_7'))
		        { 
		           	$f7 = $this->upload->data();
	        	}
        	}

        			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'no_surat' => $this->input->post('no_surat'),
	        			'tanggal_surat' => $this->input->post('tanggal_surat'),
	        			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
	        			'desa_perusahaan' => $this->input->post('desa_perusahaan'),
	        			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
						'no_surat_rek' => $this->input->post('no_surat'),
						'tgl_surat_rek' => $this->input->post('tanggal_surat'),
	        			);
	        		$berkas_json = array(
	        			'kdp_1' =>  $f1['file_name'],
	        			'kdp_2' =>  $f2['file_name'],
	        			'kdp_3' =>  $f3['file_name'],
	        			'kdp_4' =>  $f4['file_name'],
	        			'kdp_5' =>  $f5['file_name'],
	        			'kdp_6' =>  $f6['file_name'],
	        			'kdp_7' =>  $f7['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'kdp_1' =>   base_url('assets/berkas/kdp/'.$f1['file_name']) ,
	        			'kdp_2' =>   base_url('assets/berkas/kdp/'.$f2['file_name']) ,
	        			'kdp_3' =>   base_url('assets/berkas/kdp/'.$f3['file_name']) ,
	        			'kdp_4' =>   base_url('assets/berkas/kdp/'.$f4['file_name']) ,
	        			'kdp_5' =>   base_url('assets/berkas/kdp/'.$f5['file_name']) ,
	        			'kdp_6' =>   base_url('assets/berkas/kdp/'.$f6['file_name']) ,
	        			'kdp_7' =>   base_url('assets/berkas/kdp/'.$f7['file_name']) ,
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 2,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-KDP-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Keterangan Domisili Perusahaan Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}
        } // else
	}
	public function imk()
	{
		$data = array(
			'title' => 'Surat Izin Usaha Mikro Dan Kecil  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Izin Usaha Mikro Dan Kecil',
			'desa'  => $this->m_elayanan->desa(),
			);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'No Telepon / HP', 'trim|required|is_numeric|min_length[10]|max_length[12]|alpha_numeric_spaces');
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('bentuk_perusahaan', 'Bentuk Perusahaan', 'trim|required');
		$this->form_validation->set_rules('npwp_perusahaan', 'NPWP Perusahaan', 'trim|required');
		$this->form_validation->set_rules('kegiatan_usaha', 'Kegiatan Usaha', 'trim|required');
		$this->form_validation->set_rules('sarana_usaha', 'Sarana Usaha', 'trim|required');
		$this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha', 'trim|required');
		$this->form_validation->set_rules('modal_usaha', 'Jumlah Modal Usaha', 'trim|required');
		$this->form_validation->set_rules('nomor_pendaftaran', 'Nomor Pendaftaran Perusahaan', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_imk', $data);
        } 
        else
        {
        	if (isset($_FILES['imk_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_imk_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/imk/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('imk_1'))
		        { 
		           	$f1 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['imk_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_imk_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/imk/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('imk_2'))
		        { 
		           	$f2 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['imk_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_imk_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/imk/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('imk_3'))
		        { 
		           	$f3 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['imk_4'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_imk_4_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/imk/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('imk_4'))
		        { 
		           	$f4 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['imk_5'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_imk_5_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/imk/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('imk_5'))
		        { 
		           	$f5 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['imk_6'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_imk_6_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/imk/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('imk_6'))
		        { 
		           	$f6 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['imk_7'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_imk_7_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/imk/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('imk_7'))
		        { 
		           	$f7 = $this->upload->data();
	        	}
        	}

        			$json= array(
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'alamat' => $this->input->post('alamat'),
	        			'no_hp' => $this->input->post('no_hp'),
	        			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
	        			'bentuk_perusahaan' => $this->input->post('bentuk_perusahaan'),
	        			'npwp_perusahaan' => $this->input->post('npwp_perusahaan'),
	        			'kegiatan_usaha' => $this->input->post('kegiatan_usaha'),
	        			'sarana_usaha' => $this->input->post('sarana_usaha'),
	        			'alamat_usaha' => $this->input->post('alamat_usaha'),
	        			'modal_usaha' => $this->input->post('modal_usaha'),
	        			'nomor_pendaftaran' => $this->input->post('nomor_pendaftaran'),
					
						'npwp'=> $this->input->post('npwp_perusahaan'),
						'alamat_perusahaan'=> $this->input->post('alamat_usaha'),
						'jml_modal_usaha'=> $this->input->post('modal_usaha'),
						'no_pendaftaran' => $this->input->post('nomor_pendaftaran'),
	        			);
	        		$berkas_json = array(
	        			'imk_1' =>  $f1['file_name'],
	        			'imk_2' =>  $f2['file_name'],
	        			'imk_3' =>  $f3['file_name'],
	        			'imk_4' =>  $f4['file_name'],
	        			'imk_5' =>  $f5['file_name'],
	        			'imk_6' =>  $f6['file_name'],
	        			'imk_7' =>  $f7['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'imk_1' =>  base_url('assets/berkas/imk/'.$f1['file_name']),
	        			'imk_2' =>  base_url('assets/berkas/imk/'.$f2['file_name']),
	        			'imk_3' =>  base_url('assets/berkas/imk/'.$f3['file_name']),
	        			'imk_4' =>  base_url('assets/berkas/imk/'.$f4['file_name']),
	        			'imk_5' =>  base_url('assets/berkas/imk/'.$f5['file_name']),
	        			'imk_6' =>  base_url('assets/berkas/imk/'.$f6['file_name']),
	        			'imk_7' =>  base_url('assets/berkas/imk/'.$f7['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 10,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-IMK-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap' => $this->input->post('nama_lengkap'),
	        				'alamat' => $this->input->post('alamat'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }else{
		                	
		                	$data_penduduk = array(
			               'nama_lengkap' => $this->input->post('nama_lengkap'),
	        				'alamat' => $this->input->post('alamat'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Izin Usaha Mikro Dan Kecil Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}

        } //else
	}	

	public function sbl()
	{
		$data = array(
			'title' => 'Surat Keterangan Bersih Lingkungan Keluarga  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Keterangan Bersih Lingkungan Keluarga',
			'desa'  => $this->m_elayanan->desa(),
			);

		$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');

		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');



        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_sbl', $data);
        }
        else {
         	if (isset($_FILES['sbl_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sbl_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sbl/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sbl_1'))
		        { 
		           	$f1 = $this->upload->data();
	        	}
        	} 
        	if (isset($_FILES['sbl_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sbl_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sbl/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sbl_2'))
		        { 
		           	$f2 = $this->upload->data();
	        	}
        	} 
        	if (isset($_FILES['sbl_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sbl_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sbl/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sbl_3'))
		        { 
		           	$f3 = $this->upload->data();
	        	}
        	}

        			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nomor_surat' => $this->input->post('nomor_surat'),
	        			'tanggal_surat' => $this->input->post('tanggal_surat'),

	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),
	        			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
	        			'pekerjaan' => $this->input->post('pekerjaan'),
	        			'alamat' => $this->input->post('alamat'),
	        			'keperluan' => $this->input->post('keperluan'),

						'no_surat_ket'=> $this->input->post('nomor_surat'),
						'tgl_surat_ket'=> $this->input->post('tanggal_surat'),
						
	        			);
	        		$berkas_json = array(
	        			'sbl_1' =>  $f1['file_name'],
	        			'sbl_2' =>  $f2['file_name'],
	        			'sbl_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'sbl_1' =>  base_url('assets/berkas/sbl/'.$f1['file_name']),
	        			'sbl_2' =>  base_url('assets/berkas/sbl/'.$f2['file_name']),
	        			'sbl_3' =>  base_url('assets/berkas/sbl/'.$f3['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 5,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-SBL-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),
		        			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
		        			'pekerjaan' => $this->input->post('pekerjaan'),
		        			'alamat' => $this->input->post('alamat'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),
		        			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
		        			'pekerjaan' => $this->input->post('pekerjaan'),
		        			'alamat' => $this->input->post('alamat'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Keterangan Bersih Lingkungan Keluarga Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}
         } //else

    }

    public function skw()
	{
		$data = array(
			'title' => 'Surat Keterangan Waris  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Keterangan Waris',
			'desa'  => $this->m_elayanan->desa(),
			'hari'  => $this->m_elayanan->hari(),
			);
		$this->form_validation->set_rules('nik', 'NIK Pemohon', 'trim|required');
		//Surat Keterangan dari Kades / Lurah :
		$this->form_validation->set_rules('nama_kades', 'Nama Pejabat Lurah / Kades', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_numeric');
		$this->form_validation->set_rules('pangkat', 'Pangkat/Golongan ', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		//Surat Pernyataan Para Ahli Waris
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('diketahui', 'Diketahui', 'trim|required');
		$this->form_validation->set_rules('tanggal_diketahui', 'Tanggal diketahui', 'trim|required');
		//Akta Kematian
		$this->form_validation->set_rules('nomor_akta', 'Nomor Akta', 'trim|required');
		$this->form_validation->set_rules('ditandatangani', 'Ditandatangani', 'trim|required');
		$this->form_validation->set_rules('tanggal_kematian', 'Tanggal Kematian', 'trim|required');
		//Keterangan Kematian
		$this->form_validation->set_rules('nama_kematian', 'Nama', 'trim|required');
		$this->form_validation->set_rules('umur', 'Umur', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('hari', 'Hari', 'trim|required');
		$this->form_validation->set_rules('tanggal_keterangan_kematian', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('ditempat', 'Di/ Tempat', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_skw', $data);
        }else{
        	if (isset($_FILES['skw_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_skw_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/skw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('skw_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['skw_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_skw_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/skw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('skw_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['skw_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_skw_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/skw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('skw_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['skw_4'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_skw_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/skw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('skw_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        }
	        		$berkas_json = array(
	        			'skw_1' =>  $f1['file_name'],
	        			'skw_2' =>  $f2['file_name'],
	        			'skw_3' =>  $f3['file_name'],
	        			'skw_4' =>  $f4['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'skw_1' =>  base_url('assets/berkas/skw/'.$f1['file_name']), 
	        			'skw_2' =>  base_url('assets/berkas/skw/'.$f2['file_name']),
	        			'skw_3' =>  base_url('assets/berkas/skw/'.$f3['file_name']),
	        			'skw_4' =>  base_url('assets/berkas/skw/'.$f4['file_name']),
	        			); 
        			$json= array(
        				'pejabat_lurah' => $this->input->post('nama_kades'),
						'nip_pejabat_lurah'=> $this->input->post('nip'),
						'perangkat_desa' => $this->input->post('pangkat'),
						'jabatan_pejabat_lurah'=> $this->input->post('jabatan'),
						'tgl_surat_waris'=> $this->input->post('tanggal'),
						'diketahui_oleh'=> $this->input->post('diketahui'),
						'tgl_diketahui'=> $this->input->post('tanggal_diketahui'),
						'no_akta_kematian'=> $this->input->post('nomor_akta'),
						'akta_ttd'=> $this->input->post('ditandatangani'),
						'tgl_akta'=> $this->input->post('tanggal_kematian'),
						'nama'=> $this->input->post('nama_kematian'),
						'hari_mati'=> $this->input->post('hari'),
						'tgl_mati'=> $this->input->post('tanggal_keterangan_kematian'),
						'tmp_mati'=> $this->input->post('ditempat'),
        				//Surat Keterangan dari Kades / Lurah :
	        			'nama_kades' => $this->input->post('nama_kades'),
	        			'nip' => $this->input->post('nip'),
	        			'pangkat' => $this->input->post('pangkat'),
	        			'jabatan' => $this->input->post('jabatan'),
	        			//Surat Pernyataan Para Ahli Waris
						'tanggal'=> $this->input->post('tanggal'),
						'diketahui'=> $this->input->post('diketahui'),
						'tanggal_diketahui'=> $this->input->post('tanggal_diketahui'),
						//Akta Kematian
						'nomor_akta'=> $this->input->post('nomor_akta'),
						'ditandatangani'=> $this->input->post('ditandatangani'),
						'tanggal_kematian'=> $this->input->post('tanggal_kematian'),
						//Keterangan Kematian
						'nama_kematian'=> $this->input->post('nama_kematian'),
						'umur'=> $this->input->post('umur'),
						'alamat'=> $this->input->post('alamat'),
						'hari'=> $this->input->post('hari'),
						'tanggal_keterangan_kematian'=> $this->input->post('tanggal_keterangan_kematian'),
						'ditempat'=> $this->input->post('ditempat'),				 
	        			);
	        		
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 19,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-SKW-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Keterangan Waris Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}

        }//else


    }

    public function siup()
	{
		$data = array(
			'title' => 'Surat Rekomendasi Izin Usaha Perdagangan  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Rekomendasi Izin Usaha Perdagangan',
			'desa'  => $this->m_elayanan->desa(),
			);

		$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nomor Telepon/Hp', 'trim|required');

		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');
		$this->form_validation->set_rules('kedudukan', 'Kedudukan dalam Perusahaan', 'trim|required');
		$this->form_validation->set_rules('bentuk_perusahaan', 'Bentuk Perusahaan', 'trim|required');
		$this->form_validation->set_rules('bidang_usaha', 'Bidang Usaha', 'trim|required');
		$this->form_validation->set_rules('kegiatan_usaha', 'Kegiatan Usaha', 'trim|required');
		$this->form_validation->set_rules('jenis_barang_a', 'Jenis Barang Dagangan', 'trim|required');
		$this->form_validation->set_rules('jenis_barang_b', '', 'trim');
		$this->form_validation->set_rules('jenis_barang_c', '', 'trim');
		$this->form_validation->set_rules('modal_usaha', 'Modal Usaha', 'trim|required|is_numeric');
		$this->form_validation->set_rules('jumlah_tenaga_laki', '', 'trim');
		$this->form_validation->set_rules('jumlah_tenaga_perempuan', '', 'trim');

		$this->form_validation->set_rules('pendidikan_laki_sd', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_sltp', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_slta', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_d3', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_s1', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_s2', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_s3', '', 'trim');

		$this->form_validation->set_rules('pendidikan_perempuan_sd', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_sltp', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_slta', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_d3', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_s1', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_s2', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_s3', '', 'trim');

		$this->form_validation->set_rules('nama_pemilik_tanah', '', 'trim');
		$this->form_validation->set_rules('alamat_pemilik_tanah', '', 'trim');
		$this->form_validation->set_rules('jangka_waktu', '', 'trim');
		$this->form_validation->set_rules('mulai_tanggal', '', 'trim');
		$this->form_validation->set_rules('sampai_tanggal', '', 'trim');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_siup', $data);
        } else {
        	if (isset($_FILES['siup_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['siup_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['siup_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['siup_4'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['siup_5'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_5_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_5'))
		     	   	{ 
		      	  		$f5 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['siup_6'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_6_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_6'))
		     	   	{ 
		      	  		$f6 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['siup_7'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_7_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_7'))
		     	   	{ 
		      	  		$f7 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['siup_8'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_8_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_8'))
		     	   	{ 
		      	  		$f8 = $this->upload->data();
	       			}	
	        	}
	        		$berkas_json = array(
	        			'siup_1' =>  $f1['file_name'],
	        			'siup_2' =>  $f2['file_name'],
	        			'siup_3' =>  $f3['file_name'],
	        			'siup_4' =>  $f4['file_name'],
	        			'siup_5' =>  $f5['file_name'],
	        			'siup_6' =>  $f6['file_name'],
	        			'siup_7' =>  $f7['file_name'],
	        			'siup_8' =>  $f8['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'siup_1' =>  base_url('assets/berkas/siup/'.$f1['file_name']),
	        			'siup_2' =>  base_url('assets/berkas/siup/'.$f2['file_name']),
	        			'siup_3' =>  base_url('assets/berkas/siup/'.$f3['file_name']),
	        			'siup_4' =>  base_url('assets/berkas/siup/'.$f4['file_name']),
	        			'siup_5' =>  base_url('assets/berkas/siup/'.$f5['file_name']),
	        			'siup_6' =>  base_url('assets/berkas/siup/'.$f6['file_name']),
	        			'siup_7' =>  base_url('assets/berkas/siup/'.$f7['file_name']),
	        			'siup_8' =>  base_url('assets/berkas/siup/'.$f8['file_name']),
	        			);
        			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),
	        			'alamat' => $this->input->post('alamat'),
	        			'no_hp' => $this->input->post('no_hp'),
	        			// Mendirikan Bangunan :
	        			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
	        			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
	        			'kedudukan' => $this->input->post('kedudukan'),
	        			'bentuk_perusahaan' => $this->input->post('bentuk_perusahaan'),
	        			'bidang_usaha' => $this->input->post('bidang_usaha'),
	        			'kegiatan_usaha' => $this->input->post('kegiatan_usaha'),

	        			'jenis_barang_a' => $this->input->post('jenis_barang_a'),
	        			'jenis_barang_b' => $this->input->post('jenis_barang_b'),
	        			'jenis_barang_c' => $this->input->post('jenis_barang_c'),

	        			'modal_usaha' => $this->input->post('modal_usaha'),
	        			'jumlah_tenaga_laki' => $this->input->post('jumlah_tenaga_laki'),
	        			'jumlah_tenaga_perempuan' => $this->input->post('jumlah_tenaga_perempuan'),

	        			'pendidikan_laki_sd' => $this->input->post('pendidikan_laki_sd'),
	        			'pendidikan_laki_sltp' => $this->input->post('pendidikan_laki_sltp'),
	        			'pendidikan_laki_slta' => $this->input->post('pendidikan_laki_slta'),
	        			'pendidikan_laki_d3' => $this->input->post('pendidikan_laki_d3'),
	        			'pendidikan_laki_s1' => $this->input->post('pendidikan_laki_s1'),
	        			'pendidikan_laki_s2' => $this->input->post('pendidikan_laki_s2'),
	        			'pendidikan_laki_s3' => $this->input->post('pendidikan_laki_s3'),
	        			'pendidikan_perempuan_sd' => $this->input->post('pendidikan_perempuan_sd'),
	        			'pendidikan_perempuan_sltp' => $this->input->post('pendidikan_perempuan_sltp'),
	        			'pendidikan_perempuan_slta' => $this->input->post('pendidikan_perempuan_slta'),
	        			'pendidikan_perempuan_d3' => $this->input->post('pendidikan_perempuan_d3'),
	        			'pendidikan_perempuan_s1' => $this->input->post('pendidikan_perempuan_s1'),
	        			'pendidikan_perempuan_s2' => $this->input->post('pendidikan_perempuan_s2'),
	        			'pendidikan_perempuan_s3' => $this->input->post('pendidikan_perempuan_s3'),
	        			//Bagi mereka yang tempat usahanya bukan milik sendiri :
	        			'nama_pemilik_tanah' => $this->input->post('nama_pemilik_tanah'),
	        			'alamat_pemilik_tanah' => $this->input->post('alamat_pemilik_tanah'),
	        			'jangka_waktu' => $this->input->post('jangka_waktu'),
	        			'mulai_tanggal' => $this->input->post('mulai_tanggal'),
	        			'sampai_tanggal' => $this->input->post('sampai_tanggal'),
	        			// singkron
						'jenis_barang_dagang' => array(
						    'a'=> $this->input->post('jenis_barang_a'),
						    'b'=> $this->input->post('jenis_barang_b'),
						    'c'=> $this->input->post('jenis_barang_c'),
						 ),
						'jumlah_pekerja_laki'  => $this->input->post('jumlah_tenaga_laki'),
						'jumlah_pekerja_wanita' => $this->input->post('jumlah_tenaga_perempuan'),
						'pekerja_laki' => array(  
						    'sd' => $this->input->post('pendidikan_laki_sd'),
						    'sltp'=> $this->input->post('pendidikan_laki_sltp'),
						    'slta'=> $this->input->post('pendidikan_laki_slta'),
						    'd3'=> $this->input->post('pendidikan_laki_d3'),
						    's1' => $this->input->post('pendidikan_laki_s1'),
						    's2'=> $this->input->post('pendidikan_laki_s2'),
						    's3'=> $this->input->post('pendidikan_laki_s3'),
						  ),
						  'pekerja_wanita' => array(  
						    'sd' => $this->input->post('pendidikan_perempuan_sd'),
						    'sltp'=> $this->input->post('pendidikan_perempuan_sltp'),
						    'slta'=> $this->input->post('pendidikan_perempuan_slta'),
						    'd3'=> $this->input->post('pendidikan_perempuan_d3'),
						    's1' => $this->input->post('pendidikan_perempuan_s1'),
						    's2'=> $this->input->post('pendidikan_perempuan_s2'),
						    's3'=> $this->input->post('pendidikan_perempuan_s3'),
						  ),
						'alamat_pemilik'=> $this->input->post('alamat_pemilik_tanah'),
						'jangka_tahun'=> $this->input->post('jangka_waktu'),
						'jangka_mulai'=> $this->input->post('mulai_tanggal'),
						'jangka_akhir' => $this->input->post('sampai_tanggal'),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 7,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-SIUP-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),
		        			'alamat' => $this->input->post('alamat'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap' => $this->input->post('nama_lengkap'),
		        			'tmp_lahir' => $this->input->post('tmp_lahir'),
		        			'tgl_lahir' => $this->input->post('tgl_lahir'),
		        			'jns_kelamin' => $this->input->post('jns_kelamin'),
		        			'alamat' => $this->input->post('alamat'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }


		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Rekomendasi Izin Usaha Perdagangan Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}

        } //else

    }

    public function kts()
	{
		$data = array(
			'title' => 'Surat Keterangan Tinggal Sementara  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Keterangan Tinggal Sementara',
			'desa'  => $this->m_elayanan->desa(),
			'darah'  => $this->m_elayanan->darah(),
			);
		//Yang bertanda tangan di bawah ini, menerangkan bahwa :
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap Pemohon', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('nokk', 'Nomor Kartu Keluarga', 'trim|required|is_numeric');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('nomor_masuk', 'Nomor Masuk', 'trim|required');
		$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'trim|required');
		$this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'trim|required');
		$this->form_validation->set_rules('desa', 'Asal Desa', 'trim|required');
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		$this->form_validation->set_rules('alamat_pindah', 'Alamat Pindah', 'trim|required');
		//alamat Sekarang
		$this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required');
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		$this->form_validation->set_rules('darah', 'Golongan Darah', 'trim|required');
		//penanggung jawab
		$this->form_validation->set_rules('nik_penanggung', 'NIK Penanggung', 'trim|required');
		$this->form_validation->set_rules('nama_penanggung', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('alamat_penanggung', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('pekerjaan_penanggung', 'Pekerjaan Penanggung', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_kts', $data);
        }else{
        	if (isset($_FILES['kts_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kts_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kts/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kts_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kts_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kts_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kts/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kts_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kts_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kts_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kts/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kts_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['kts_4'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kts_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kts/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kts_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        }
	        	$berkas_json = array(
	        			'kts_1' =>  $f1['file_name'],
	        			'kts_2' =>  $f2['file_name'],
	        			'kts_3' =>  $f3['file_name'],
	        			'kts_4' =>  $f4['file_name'],
	        			); 
	        	$berkas_json_link = array(
	        			'kts_1' =>  base_url('assets/berkas/kts/'. $f1['file_name']),
	        			'kts_2' =>  base_url('assets/berkas/kts/'. $f2['file_name']),
	        			'kts_3' =>  base_url('assets/berkas/kts/'. $f3['file_name']),
	        			'kts_4' =>  base_url('assets/berkas/kts/'. $f4['file_name']),
	        			); 
        			$json= array(
	        			//Yang bertanda tangan di bawah ini, menerangkan bahwa :
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
						'nokk' => $this->input->post('nokk'),
						'tmp_lahir' => $this->input->post('tmp_lahir'),
						'tgl_lahir' => $this->input->post('tgl_lahir'),
						'jns_kelamin' => $this->input->post('jns_kelamin'),
						'status_perkawinan' => $this->input->post('status_perkawinan'),
						'nomor_masuk' => $this->input->post('nomor_masuk'),
						'tanggal_masuk' => $this->input->post('tanggal_masuk'),
						'desa' => $this->input->post('desa'),
						'alamat_asal' => $this->input->post('alamat_asal'),

						//alamat Sekarang
						'desa_kelurahan' => $this->input->post('desa_kelurahan'),
						'kecamatan' => $this->input->post('kecamatan'),
						'kabupaten' => $this->input->post('kabupaten'),
						'provinsi' => $this->input->post('provinsi'),
						'kode_pos' => $this->input->post('kode_pos'),
						'alasan_pindah' => $this->input->post('alasan_pindah'),
						'darah' => $this->input->post('darah'),
						//penanggung jawab
						'nik_penanggung' => $this->input->post('nik_penanggung'),
						'nama_penanggung' => $this->input->post('nama_penanggung'),
						'alamat_penanggung' => $this->input->post('alamat_penanggung'),
						'pekerjaan_penanggung' => $this->input->post('pekerjaan_penanggung'),

						'no_tanda_masuk'=> $this->input->post('nomor_masuk'),
						'tgl_tanda_masuk' => $this->input->post('tanggal_masuk'),
  					    'alamat_pindah' => $this->input->post('alamat_pindah'),
						'kd_pos_pindah' => $this->input->post('kode_pos'),
						'desa_pindah' => $this->input->post('desa_kelurahan'),
						'kecamatan_pindah' => $this->input->post('kecamatan'),
						'kabupaten_pindah'=> $this->input->post('kabupaten'),
						'provinsi_pindah'=> $this->input->post('provinsi'),
						'nama' => $this->input->post('nama_penanggung'),
						'alamat'=> $this->input->post('alamat_penanggung'),
						'pekerjaan'=> $this->input->post('pekerjaan_penanggung'),
						'pengikut'=> 0,

	        			);
	        		
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 3,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-KTS-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap' => $this->input->post('nama_lengkap'),
							'no_kk' => $this->input->post('nokk'),
							'tmp_lahir' => $this->input->post('tmp_lahir'),
							'tgl_lahir' => $this->input->post('tgl_lahir'),
							'jns_kelamin' => $this->input->post('jns_kelamin'),
							'status_kawin' => $this->input->post('status_perkawinan'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap' => $this->input->post('nama_lengkap'),
							'no_kk' => $this->input->post('nokk'),
							'tmp_lahir' => $this->input->post('tmp_lahir'),
							'tgl_lahir' => $this->input->post('tgl_lahir'),
							'jns_kelamin' => $this->input->post('jns_kelamin'),
							'status_kawin' => $this->input->post('status_perkawinan'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Keterangan Tinggal Sementara Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}

        }//else

    }

    public function imb()
	{
		$data = array(
			'title' => 'Surat Izin Mendirikan Bangunan  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Izin Mendirikan Bangunan',
			'desa'  => $this->m_elayanan->desa(),
		
			);
		// 9 kode surat
		$this->form_validation->set_rules('nik', 'NIK Pemohon', 'trim|required|is_numeric');
		$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'No Telepon/HP', 'trim|required|is_numeric');
		//Sedang / akan melakukan kegiatan Mendirikan Bangunan sebagai berikut :
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');
		$this->form_validation->set_rules('jenis_bangunan', 'Jenis Bangunan', 'trim|required');
		$this->form_validation->set_rules('lokasi_bangunan', 'Lokasi Bangunan', 'trim|required');
		$this->form_validation->set_rules('lt_1_1', 'Panjang bangunan lantai 1 <br>', 'trim|required');
		$this->form_validation->set_rules('lt_1_2', 'Lebar bangunan lantai 1 <br>', 'trim|required');
		$this->form_validation->set_rules('total_1', 'Luas bangunan lantai 1', 'trim|required');
		$this->form_validation->set_rules('gsb', 'Garis Sempadan Bangunan', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_imb', $data);
        } else
        {
        	if (isset($_FILES['imb_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['imb_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['imb_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_4'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_5'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_5_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_5'))
		     	   	{ 
		      	  		$f5 = $this->upload->data();
	       			}	
	        }
	       
	        if (isset($_FILES['imb_6'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_6_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_6'))
		     	   	{ 
		      	  		$f6 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_7'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_7_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_7'))
		     	   	{ 
		      	  		$f7 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_8'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_8_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_8'))
		     	   	{ 
		      	  		$f8 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_9'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_9_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_9'))
		     	   	{ 
		      	  		$f9 = $this->upload->data();
	       			}	
	        }
	         if (isset($_FILES['imb_10'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_10_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_10'))
		     	   	{ 
		      	  		$f10 = $this->upload->data();
	       			}	
	        }

	        		$berkas_json = array(
	        			'imb_1' =>  $f1['file_name'],
	        			'imb_2' =>  $f2['file_name'],
	        			'imb_3' =>  $f3['file_name'],
	        			'imb_4' =>  $f4['file_name'],
	        			'imb_5' =>  $f5['file_name'],
	        			'imb_6' =>  $f6['file_name'],
	        			'imb_7' =>  $f7['file_name'],
	        			'imb_8' =>  $f8['file_name'],
	        			'imb_9' =>  $f9['file_name'],
	        			'imb_10'=> $f10['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'imb_1' =>  base_url('assets/berkas/imb/'.$f1['file_name']),
	        			'imb_2' =>  base_url('assets/berkas/imb/'.$f2['file_name']),
	        			'imb_3' =>  base_url('assets/berkas/imb/'.$f3['file_name']),
	        			'imb_4' =>  base_url('assets/berkas/imb/'.$f4['file_name']),
	        			'imb_5' =>  base_url('assets/berkas/imb/'.$f5['file_name']),
	        			'imb_6' =>  base_url('assets/berkas/imb/'.$f6['file_name']),
	        			'imb_7' =>  base_url('assets/berkas/imb/'.$f7['file_name']),
	        			'imb_8' =>  base_url('assets/berkas/imb/'.$f8['file_name']),
	        			'imb_9' =>  base_url('assets/berkas/imb/'.$f9['file_name']),
	        			'imb_10'=>  base_url('assets/berkas/imb/'.$f10['file_name']),
	        			); 
        			$json= array(
	        			//Yang bertanda tangan di bawah ini, menerangkan bahwa :
						'desa'=> $this->input->post('desa'),
						'nama_lengkap'=> $this->input->post('nama_lengkap'),
						'tmp_lahir'=> $this->input->post('tmp_lahir'),
						'tgl_lahir'=> $this->input->post('tgl_lahir'),
						'jns_kelamin'=> $this->input->post('jns_kelamin'),
						'alamat'=> $this->input->post('alamat'),
						'no_hp'=> $this->input->post('no_hp'),
						//Sedang / akan melakukan kegiatan Mendirikan Bangunan sebagai berikut :
						'nama_perusahaan'=> $this->input->post('nama_perusahaan'),
						'alamat_perusahaan'=> $this->input->post('alamat_perusahaan'),
						'jenis_bangunan'=> $this->input->post('jenis_bangunan'),
						'lokasi_bangunan'=> $this->input->post('lokasi_bangunan'),
						'lt_1_1'=> $this->input->post('lt_1_1'),
						'lt_1_2'=> $this->input->post('lt_1_2'),
						'total_1'=> $this->input->post('total_1'),
						'lt_2_1'=> $this->input->post('lt_2_1'),
						'lt_2_2'=> $this->input->post('lt_2_2'),
						'total_2'=> $this->input->post('total_2'),
						'lt_3_1'=> $this->input->post('lt_3_1'),
						'lt_3_2'=> $this->input->post('lt_3_2'),
						'total_3'=> $this->input->post('total_3'),

						'gsb'=> $this->input->post('gsb'),
						//  Bagi mereka yang tempat usahanya bukan milik sendiri
						'nama_pemilik_tanah'=> $this->input->post('nama_pemilik_tanah'),
						'alamat_pemilik_tanah'=> $this->input->post('alamat_pemilik_tanah'),
						'jangka_waktu'=> $this->input->post('jangka_waktu'),
						'mulai_tanggal'=> $this->input->post('mulai_tanggal'),
						'sampai_tanggal'=> $this->input->post('sampai_tanggal'),

						'luas_bangunan' => array(  
						    [
						     $this->input->post('lt_1_1'),
						     $this->input->post('lt_1_2'),
						     $this->input->post('total_1')
						    ],
						    [
						     $this->input->post('lt_2_1'),
						     $this->input->post('lt_2_2'),
						     $this->input->post('total_2')
						    ],
						    [
						     $this->input->post('lt_3_1'),
						     $this->input->post('lt_3_2'),
						     $this->input->post('total_3')
						    ]
						   ),
						'alamat_pemilik'=> $this->input->post('alamat_pemilik_tanah'),
						'jangka_tahun'=> $this->input->post('jangka_waktu'),
						'jangka_mulai'=> $this->input->post('mulai_tanggal'),
						'jangka_akhir'=> $this->input->post('sampai_tanggal'),
	        			);
        			
	        		
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 9,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-IMB-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap'=> $this->input->post('nama_lengkap'),
							'tmp_lahir'=> $this->input->post('tmp_lahir'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'jns_kelamin'=> $this->input->post('jns_kelamin'),
							'alamat'=> $this->input->post('alamat'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap'=> $this->input->post('nama_lengkap'),
							'tmp_lahir'=> $this->input->post('tmp_lahir'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'jns_kelamin'=> $this->input->post('jns_kelamin'),
							'alamat'=> $this->input->post('alamat'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }



		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Izin Mendirikan Bangunan Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}
        }
    }

     public function sp3fat(){
		$data = array(
			'title' => ' Surat Pernyataan Pengakuan Penguasaan Fisik Atas Tanah  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => ' Surat Pernyataan Pengakuan Penguasaan Fisik Atas Tanah',
			'desa'  => $this->m_elayanan->desa(),
			'agama'  => $this->m_elayanan->agama(),
			);

		$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
		$this->form_validation->set_rules('no_surat_kuasa', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('tgl_surat_kuasa', 'Tanggal Surat', 'trim|required');
		$this->form_validation->set_rules('tgl_diketahui', 'Tanggal Diketahui', 'trim|required');

		$this->form_validation->set_rules('letak_tanah', 'Letak Tanah', 'trim|required');
		$this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'trim|required');

		$this->form_validation->set_rules('batas_utara_ket', 'Keterangan Batas Utara', 'trim|required');
		$this->form_validation->set_rules('batas_utara_val', 'Nilai Batas Utara', 'trim|required|is_numeric');
		$this->form_validation->set_rules('batas_timur_ket', 'Keterangan Batas Timur', 'trim|required');
		$this->form_validation->set_rules('batas_timur_val', 'Nilai Batas Timur', 'trim|required|is_numeric');
		$this->form_validation->set_rules('batas_selatan_ket', 'Keterangan Batas Selatan', 'trim|required');
		$this->form_validation->set_rules('batas_selatan_val', 'Nilai Batas Selatan', 'trim|required|is_numeric');
		$this->form_validation->set_rules('batas_barat_ket', 'Keterangan Batas Barat', 'trim|required');
		$this->form_validation->set_rules('batas_barat_val', 'Nilai Batas Barat', 'trim|required|is_numeric');

		$this->form_validation->set_rules('tahun_kuasa', 'Tahun Kuasa', 'trim|required|is_numeric');

		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_sp3fat', $data);
        }
        else {

        	if (isset($_FILES['sp3fat_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_sp3fat_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/sp3fat/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('sp3fat_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['sp3fat_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_sp3fat_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/sp3fat/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('sp3fat_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }
	       		 	$berkas_json = array(
	        			'sp3fat_1' =>  $f1['file_name'],
	        			'sp3fat_2' =>  $f2['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'sp3fat_1' =>  base_url('assets/berkas/sp3fat/'.$f1['file_name']) ,
	        			'sp3fat_2' =>  base_url('assets/berkas/sp3fat/'.$f2['file_name']) ,
	        			); 
        			$json= array(
	    			'desa'=> $this->input->post('desa'),
					'no_surat_kuasa'=> $this->input->post('no_surat_kuasa'),
					'tgl_surat_kuasa'=> $this->input->post('tgl_surat_kuasa'),
					'tgl_diketahui'=> $this->input->post('tgl_diketahui'),
					'letak_tanah'=> $this->input->post('letak_tanah'),
					'luas_tanah'=> $this->input->post('luas_tanah'),
					'batas_utara_ket'=> $this->input->post('batas_utara_ket'),
					'batas_utara_val'=> $this->input->post('batas_utara_val'),
					'batas_timur_ket'=> $this->input->post('batas_timur_ket'),
					'batas_timur_val'=> $this->input->post('batas_timur_val'),
					'batas_selatan_ket'=> $this->input->post('batas_selatan_ket'),
					'batas_selatan_val'=> $this->input->post('batas_selatan_val'),
					'batas_barat_ket'=> $this->input->post('batas_barat_ket'),
					'batas_barat_val'=> $this->input->post('batas_barat_val'),
					'tahun_kuasa'=> $this->input->post('tahun_kuasa'),
					'nik' => $this->input->post('nik'),
					'nama_lengkap'=> $this->input->post('nama_lengkap'),
					'tmp_lahir'=> $this->input->post('tmp_lahir'),
					'tgl_lahir'=> $this->input->post('tgl_lahir'),
					'jns_kelamin'=> $this->input->post('jns_kelamin'),
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'alamat'=> $this->input->post('alamat'),
					'agama'=> $this->input->post('agama'),
					  'bts_utara' => array(
					    'ket' => $this->input->post('batas_utara_ket'),
					    'nama'=> $this->input->post('batas_utara_val')
					  ),
					  'bts_timur'=> array(
					    'ket' => $this->input->post('batas_timur_ket'),
					    'nama'=> $this->input->post('batas_timur_val')
					  ),
					  'bts_selatan' => array(
					    'ket' => $this->input->post('batas_selatan_ket'),
					    'nama'=> $this->input->post('batas_selatan_val')
					  ),
					  'bts_barat' => array(
					    'ket' => $this->input->post('batas_barat_ket'),
					    'nama'=> $this->input->post('batas_barat_val')
					  )		
	        		);
	        		
        			$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 16,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-SP3FAT-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
					        'nama_lengkap'=> $this->input->post('nama_lengkap'),
							'tmp_lahir'=> $this->input->post('tmp_lahir'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'jns_kelamin'=> $this->input->post('jns_kelamin'),
							'pekerjaan'=> $this->input->post('pekerjaan'),
							'alamat'=> $this->input->post('alamat'),
							'agama'=> $this->input->post('agama'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap'=> $this->input->post('nama_lengkap'),
						'tmp_lahir'=> $this->input->post('tmp_lahir'),
						'tgl_lahir'=> $this->input->post('tgl_lahir'),
						'jns_kelamin'=> $this->input->post('jns_kelamin'),
						'pekerjaan'=> $this->input->post('pekerjaan'),
						'alamat'=> $this->input->post('alamat'),
						'agama'=> $this->input->post('agama'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }


		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Pernyataan Pengakuan Penguasaan Fisik Atas Tanah Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}
        } //else
        
    }


    public function sp4fat(){
		$data = array(
			'title' => ' Surat Pernyataan Pelepasan dan Penyerahan Penguasaan Fisik Atas Tanah  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => ' Surat Pernyataan Pelepasan dan Penyerahan Penguasaan Fisik Atas Tanah',
			'desa'  => $this->m_elayanan->desa(),
			'agama'  => $this->m_elayanan->agama(),
			);

		$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
		$this->form_validation->set_rules('no_surat_kuasa', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('tgl_surat_kuasa', 'Tanggal Surat', 'trim|required');
		$this->form_validation->set_rules('tgl_diketahui', 'Tanggal Diketahui', 'trim|required');

		$this->form_validation->set_rules('letak_tanah', 'Letak Tanah', 'trim|required');
		$this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'trim|required');

		$this->form_validation->set_rules('batas_utara_ket', 'Keterangan Batas Utara', 'trim|required');
		$this->form_validation->set_rules('batas_utara_val', 'Nilai Batas Utara', 'trim|required|is_numeric');
		$this->form_validation->set_rules('batas_timur_ket', 'Keterangan Batas Timur', 'trim|required');
		$this->form_validation->set_rules('batas_timur_val', 'Nilai Batas Timur', 'trim|required|is_numeric');
		$this->form_validation->set_rules('batas_selatan_ket', 'Keterangan Batas Selatan', 'trim|required');
		$this->form_validation->set_rules('batas_selatan_val', 'Nilai Batas Selatan', 'trim|required|is_numeric');
		$this->form_validation->set_rules('batas_barat_ket', 'Keterangan Batas Barat', 'trim|required');
		$this->form_validation->set_rules('batas_barat_val', 'Nilai Batas Barat', 'trim|required|is_numeric');

		$this->form_validation->set_rules('tahun_kuasa', 'Tahun Kuasa', 'trim|required|is_numeric');

		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_sp4fat', $data);
        }
        else {

        	if (isset($_FILES['sp4fat_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_sp4fat_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/sp4fat/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('sp4fat_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['sp4fat_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_sp4fat_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/sp4fat/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('sp4fat_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }
	       		 	$berkas_json = array(
	        			'sp4fat_1' =>  $f1['file_name'],
	        			'sp4fat_2' =>  $f2['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'sp4fat_1' =>  base_url('assets/berkas/sp4fat/'.$f1['file_name']) ,
	        			'sp4fat_2' =>  base_url('assets/berkas/sp4fat/'.$f2['file_name']) ,
	        			); 
        			$json= array(
	    			'desa'=> $this->input->post('desa'),
					'no_surat_kuasa'=> $this->input->post('no_surat_kuasa'),
					'tgl_surat_kuasa'=> $this->input->post('tgl_surat_kuasa'),
					'tgl_diketahui'=> $this->input->post('tgl_diketahui'),
					'letak_tanah'=> $this->input->post('letak_tanah'),
					'luas_tanah'=> $this->input->post('luas_tanah'),
					'batas_utara_ket'=> $this->input->post('batas_utara_ket'),
					'batas_utara_val'=> $this->input->post('batas_utara_val'),
					'batas_timur_ket'=> $this->input->post('batas_timur_ket'),
					'batas_timur_val'=> $this->input->post('batas_timur_val'),
					'batas_selatan_ket'=> $this->input->post('batas_selatan_ket'),
					'batas_selatan_val'=> $this->input->post('batas_selatan_val'),
					'batas_barat_ket'=> $this->input->post('batas_barat_ket'),
					'batas_barat_val'=> $this->input->post('batas_barat_val'),
					'tahun_kuasa'=> $this->input->post('tahun_kuasa'),
					'nik' => $this->input->post('nik'),
					'nama_lengkap'=> $this->input->post('nama_lengkap'),
					'tmp_lahir'=> $this->input->post('tmp_lahir'),
					'tgl_lahir'=> $this->input->post('tgl_lahir'),
					'jns_kelamin'=> $this->input->post('jns_kelamin'),
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'alamat'=> $this->input->post('alamat'),
					'agama'=> $this->input->post('agama'),
					  'bts_utara' => array(
					    'ket' => $this->input->post('batas_utara_ket'),
					    'nama'=> $this->input->post('batas_utara_val')
					  ),
					  'bts_timur'=> array(
					    'ket' => $this->input->post('batas_timur_ket'),
					    'nama'=> $this->input->post('batas_timur_val')
					  ),
					  'bts_selatan' => array(
					    'ket' => $this->input->post('batas_selatan_ket'),
					    'nama'=> $this->input->post('batas_selatan_val')
					  ),
					  'bts_barat' => array(
					    'ket' => $this->input->post('batas_barat_ket'),
					    'nama'=> $this->input->post('batas_barat_val')
					  )		
	        		);
	        		
        			$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 17,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-SP4FAT-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
					        'nama_lengkap'=> $this->input->post('nama_lengkap'),
							'tmp_lahir'=> $this->input->post('tmp_lahir'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'jns_kelamin'=> $this->input->post('jns_kelamin'),
							'pekerjaan'=> $this->input->post('pekerjaan'),
							'alamat'=> $this->input->post('alamat'),
							'agama'=> $this->input->post('agama'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap'=> $this->input->post('nama_lengkap'),
						'tmp_lahir'=> $this->input->post('tmp_lahir'),
						'tgl_lahir'=> $this->input->post('tgl_lahir'),
						'jns_kelamin'=> $this->input->post('jns_kelamin'),
						'pekerjaan'=> $this->input->post('pekerjaan'),
						'alamat'=> $this->input->post('alamat'),
						'agama'=> $this->input->post('agama'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Pernyataan Pengakuan Penguasaan Fisik Atas Tanah Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}
        } //else
        
    }

    public function kpj()
	{
		$data = array(
			'title' => 'Surat Keterangan Pindah Jiwa  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Keterangan Pindah Jiwa',
			'desa'  => $this->m_elayanan->desa(),
			'agama'  => $this->m_elayanan->agama(),
			);

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('shdk', 'Status Hubungan dalam Keluarga', 'trim|required');
		//keterangan pindah
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		
		// tujuan pindah
		$this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('pada_tanggal', 'Pada Tanggal', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_kpj', $data);
        }else{
        	if (isset($_FILES['kpj_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpj_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpj/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpj_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kpj_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpj_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpj/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpj_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kpj_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpj_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpj/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpj_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['kpj_4'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpj_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpj/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpj_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        	}
	        		$berkas_json = array(
	        			'kpj_1' =>  $f1['file_name'],
	        			'kpj_2' =>  $f2['file_name'],
	        			'kpj_3' =>  $f3['file_name'],
	        			'kpj_4' =>  $f4['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'kpj_1' =>  base_url('assets/berkas/kpj/'.$f1['file_name']) ,
	        			'kpj_2' =>  base_url('assets/berkas/kpj/'.$f2['file_name']) ,
	        			'kpj_3' =>  base_url('assets/berkas/kpj/'.$f3['file_name']) ,
	        			'kpj_4' =>  base_url('assets/berkas/kpj/'.$f4['file_name']) ,
	        			); 

        			$json= array(
	    			'nama_lengkap'=> $this->input->post('nama_lengkap'),
					'tmp_lahir'=> $this->input->post('tmp_lahir'),
					'tgl_lahir'=> $this->input->post('tgl_lahir'),
					'jns_kelamin'=> $this->input->post('jns_kelamin'),
					'kewarganegaraan'=> $this->input->post('kewarganegaraan'),
					'status_perkawinan'=> $this->input->post('status_perkawinan'),
					'agama'=> $this->input->post('agama'),
					'alamat'=> $this->input->post('alamat'),
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'shdk'=> $this->input->post('shdk'),
					//keterangan pindah
					'alasan_pindah'=> $this->input->post('alasan_pindah'),
					// tujuan pindah
					'desa_kelurahan'=> $this->input->post('desa_kelurahan'),
					'kecamatan'=> $this->input->post('kecamatan'),
					'kabupaten'=> $this->input->post('kabupaten'),
					'provinsi'=> $this->input->post('provinsi'),
					'pada_tanggal'=> $this->input->post('pada_tanggal'),

					'desa'=> $this->input->post('desa_kelurahan'),
					'tgl_pindah'=> $this->input->post('pada_tanggal'),
					'pengikut'=> 0,
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 1,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-KPJ-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap'=> $this->input->post('nama_lengkap'),
							'tmp_lahir'=> $this->input->post('tmp_lahir'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'jns_kelamin'=> $this->input->post('jns_kelamin'),
							'kewarganegaraan'=> $this->input->post('kewarganegaraan'),
							'status_kawin'=> $this->input->post('status_perkawinan'),
							'agama'=> $this->input->post('agama'),
							'alamat'=> $this->input->post('alamat'),
							'pekerjaan'=> $this->input->post('pekerjaan'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }
		                else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap'=> $this->input->post('nama_lengkap'),
							'tmp_lahir'=> $this->input->post('tmp_lahir'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'jns_kelamin'=> $this->input->post('jns_kelamin'),
							'kewarganegaraan'=> $this->input->post('kewarganegaraan'),
							'status_kawin'=> $this->input->post('status_perkawinan'),
							'agama'=> $this->input->post('agama'),
							'alamat'=> $this->input->post('alamat'),
							'pekerjaan'=> $this->input->post('pekerjaan'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }

		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Keterangan Pindah Jiwa Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}
        }//else
    }

     public function kpw()
	{
		$data = array(
			'title' => 'Surat Keterangan Pindah WNI  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Surat Keterangan Pindah WNI ',
			'desa'  => $this->m_elayanan->desa(),
			'agama'  => $this->m_elayanan->agama(),
			);

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('shdk', 'Status Hubungan dalam Keluarga', 'trim|required');
		//keterangan pindah
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		
		// tujuan pindah
		$this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');

		//singkron tambahan
		$this->form_validation->set_rules('alamat_pindah', 'Alamat Pindah', 'trim|required');
		$this->form_validation->set_rules('klasifikasi_pindah', 'Klasifikasi Pindah', 'trim|required');
		$this->form_validation->set_rules('jns_kepindahan', 'Jenis Kepindahan', 'trim|required');
		$this->form_validation->set_rules('status_kk_tdk_pindah', 'Status KK bagi yang tidak pindah', 'trim|required');
		$this->form_validation->set_rules('status_kk_pindah', 'Status KK bagi yang pindah', 'trim|required');


        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/v_kpw', $data);
        }else{
        	if (isset($_FILES['kpw_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpw_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpw_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kpw_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpw_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpw_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kpw_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpw_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpw_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	    
	        		$berkas_json = array(
	        			'kpw_1' =>  $f1['file_name'],
	        			'kpw_2' =>  $f2['file_name'],
	        			'kpw_3' =>  $f3['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'kpw_1' =>  base_url('assets/berkas/kpw/'.$f1['file_name']) ,
	        			'kpw_2' =>  base_url('assets/berkas/kpw/'.$f2['file_name']) ,
	        			'kpw_3' =>  base_url('assets/berkas/kpw/'.$f3['file_name']) ,
	        			); 

        			$json= array(
	    			'nama_lengkap'=> $this->input->post('nama_lengkap'),
					'tmp_lahir'=> $this->input->post('tmp_lahir'),
					'tgl_lahir'=> $this->input->post('tgl_lahir'),
					'jns_kelamin'=> $this->input->post('jns_kelamin'),
					'kewarganegaraan'=> $this->input->post('kewarganegaraan'),
					'status_perkawinan'=> $this->input->post('status_perkawinan'),
					'agama'=> $this->input->post('agama'),
					'alamat'=> $this->input->post('alamat'),
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'shdk'=> $this->input->post('shdk'),
					//keterangan pindah
					'alasan_pindah'=> $this->input->post('alasan_pindah'),
					// tujuan pindah
					'desa_kelurahan'=> $this->input->post('desa_kelurahan'),
					'kecamatan'=> $this->input->post('kecamatan'),
					'kabupaten'=> $this->input->post('kabupaten'),
					'provinsi'=> $this->input->post('provinsi'),

					'desa'=> $this->input->post('desa_kelurahan'),
					'alamat_pindah'=> $this->input->post('alamat_pindah'),
					'klasifikasi_pindah'=> $this->input->post('klasifikasi_pindah'),
					'jns_kepindahan'=> $this->input->post('jns_kepindahan'),
					'status_kk_tdk_pindah'=> $this->input->post('status_kk_tdk_pindah'),
					'status_kk_pindah'=> $this->input->post('status_kk_pindah'),
					'pengikut'=> 0,
					
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 4,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$table = 'surat';
		        	$return = $this->m_elayanan->insert_surat($data,$table);
		        	$thn = date('Y');
		       		$bln = date('m');
		        	$query = $this->db->get_where('surat', array('waktu_mulai' => $_session['waktu'] ));
		                $rowp = $query->row();
		                $data = array(
		                'table' => 'surat',
		                'ID'=> $rowp->ID,    
		               	'ID_pelayanan' => 'PL-KPW-'.'00'.+($rowp->ID).'-'.$bln.'-'.$thn,
		                );
		                $this->m_elayanan->up_surat($data);

		                 $query = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik') ));
		                $rowpen = $query->row();

		                if ($rowpen == 0) {
		                	$data_surat_penduduk = array(
			        		'nik' => $this->input->post('nik'),
			        		'nama_lengkap'=> $this->input->post('nama_lengkap'),
							'tmp_lahir'=> $this->input->post('tmp_lahir'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'jns_kelamin'=> $this->input->post('jns_kelamin'),
							'kewarganegaraan'=> $this->input->post('kewarganegaraan'),
							'status_kawin'=> $this->input->post('status_perkawinan'),
							'agama'=> $this->input->post('agama'),
							'alamat'=> $this->input->post('alamat'),
							'pekerjaan'=> $this->input->post('pekerjaan'),
			        		);
			        		$table_pen = 'penduduk';
			        		$this->m_elayanan->insert_surat($data_surat_penduduk,$table_pen);
		                }else{
		                	
		                	$data_penduduk = array(
			               	'nama_lengkap'=> $this->input->post('nama_lengkap'),
							'tmp_lahir'=> $this->input->post('tmp_lahir'),
							'tgl_lahir'=> $this->input->post('tgl_lahir'),
							'jns_kelamin'=> $this->input->post('jns_kelamin'),
							'kewarganegaraan'=> $this->input->post('kewarganegaraan'),
							'status_kawin'=> $this->input->post('status_perkawinan'),
							'agama'=> $this->input->post('agama'),
							'alamat'=> $this->input->post('alamat'),
							'pekerjaan'=> $this->input->post('pekerjaan'),
			                );
			                $nik = $this->input->post('nik');
			                $this->m_elayanan->ubah_penduduk($data_penduduk,$nik);
		                }
		                
		        	if ($return == TRUE) {
		        		$this->template->alert(
		                'Permohonan Surat Keterangan Pindah WNI Anda dikirim', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/histori');
		            return;
	        		}
        }//else
    }

   

	public function edit($ID=0)
	{
		if (!$ID) {
			show_404();	
		}
		error_reporting(0);
		$array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->join('kategori_surat', 'surat.kode_surat = kategori_surat.kode_surat_sistem', 'left');
		$this->db->where($array);
		$query = $this->db->get();
        $rowcek = $query->row();
        $this->load->library('upload');
        if ($rowcek->kode_surat == TRUE AND $rowcek->status == 'no') {
        	switch ($rowcek->kode_surat_sistem) {
			    case 10: //imk
			    		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
						$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
						$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
						$this->form_validation->set_rules('no_hp', 'No Telepon / HP', 'trim|required|is_numeric|min_length[10]|max_length[12]|alpha_numeric_spaces');
						$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
						$this->form_validation->set_rules('bentuk_perusahaan', 'Bentuk Perusahaan', 'trim|required');
						$this->form_validation->set_rules('npwp_perusahaan', 'NPWP Perusahaan', 'trim|required');
						$this->form_validation->set_rules('kegiatan_usaha', 'Kegiatan Usaha', 'trim|required');
						$this->form_validation->set_rules('sarana_usaha', 'Sarana Usaha', 'trim|required');
						$this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha', 'trim|required');
						$this->form_validation->set_rules('modal_usaha', 'Jumlah Modal Usaha', 'trim|required');
						$this->form_validation->set_rules('nomor_pendaftaran', 'Nomor Pendaftaran Perusahaan', 'trim|required');
				        $data = array(
				            'title' => 'Edit Surat Izin Usaha Mikro dan Kecil - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
				            'crumb' => 'Edit Surat Izin Usaha Mikro dan Kecil',
				            'syarat' => 'Surat Izin Usaha Mikro dan Kecil',
				            'edit'  => $this->m_elayanan->get_detail($ID),
							'file'  => $this->m_elayanan->get_file(10),
							'syarat_surat'  => $this->m_elayanan->syarat_surat(),
			            );
						if ($this->form_validation->run() == FALSE)
				        {
				          $this->template->view('main/pelayanan/edit/v_imk_edit',$data);
				        }
				        else{

				        		if (isset($_FILES['imk_1'])) 
					        {
					        	$create_tgl = date('Y-m-d H:i:s'); 
						        $this->load->library('upload');
						        $nmfile = 'syarat_imk_1_'.date('YmdHis'); 
						        $config['upload_path'] = './assets/berkas/imk/';
						        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
						        $config['max_size'] = '40480';
						        $config['max_width']  = '12880';
						        $config['max_height']  = '7680';
						        $config['file_name'] = $nmfile; 
					        	$this->upload->initialize($config);
					        	if ($this->upload->do_upload('imk_1'))
						        { 
						           	$f1 = $this->upload->data();
					        	}
				        	}
				        	if (isset($_FILES['imk_2'])) 
					        {
					        	$create_tgl = date('Y-m-d H:i:s'); 
						        $this->load->library('upload');
						        $nmfile = 'syarat_imk_2_'.date('YmdHis'); 
						        $config['upload_path'] = './assets/berkas/imk/';
						        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
						        $config['max_size'] = '40480';
						        $config['max_width']  = '12880';
						        $config['max_height']  = '7680';
						        $config['file_name'] = $nmfile; 
					        	$this->upload->initialize($config);
					        	if ($this->upload->do_upload('imk_2'))
						        { 
						           	$f2 = $this->upload->data();
					        	}
				        	}
				        	if (isset($_FILES['imk_3'])) 
					        {
					        	$create_tgl = date('Y-m-d H:i:s'); 
						        $this->load->library('upload');
						        $nmfile = 'syarat_imk_3_'.date('YmdHis'); 
						        $config['upload_path'] = './assets/berkas/imk/';
						        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
						        $config['max_size'] = '40480';
						        $config['max_width']  = '12880';
						        $config['max_height']  = '7680';
						        $config['file_name'] = $nmfile; 
					        	$this->upload->initialize($config);
					        	if ($this->upload->do_upload('imk_3'))
						        { 
						           	$f3 = $this->upload->data();
					        	}
				        	}
				        	if (isset($_FILES['imk_4'])) 
					        {
					        	$create_tgl = date('Y-m-d H:i:s'); 
						        $this->load->library('upload');
						        $nmfile = 'syarat_imk_4_'.date('YmdHis'); 
						        $config['upload_path'] = './assets/berkas/imk/';
						        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
						        $config['max_size'] = '40480';
						        $config['max_width']  = '12880';
						        $config['max_height']  = '7680';
						        $config['file_name'] = $nmfile; 
					        	$this->upload->initialize($config);
					        	if ($this->upload->do_upload('imk_4'))
						        { 
						           	$f4 = $this->upload->data();
					        	}
				        	}
				        	if (isset($_FILES['imk_5'])) 
					        {
					        	$create_tgl = date('Y-m-d H:i:s'); 
						        $this->load->library('upload');
						        $nmfile = 'syarat_imk_5_'.date('YmdHis'); 
						        $config['upload_path'] = './assets/berkas/imk/';
						        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
						        $config['max_size'] = '40480';
						        $config['max_width']  = '12880';
						        $config['max_height']  = '7680';
						        $config['file_name'] = $nmfile; 
					        	$this->upload->initialize($config);
					        	if ($this->upload->do_upload('imk_5'))
						        { 
						           	$f5 = $this->upload->data();
					        	}
				        	}
				        	if (isset($_FILES['imk_6'])) 
					        {
					        	$create_tgl = date('Y-m-d H:i:s'); 
						        $this->load->library('upload');
						        $nmfile = 'syarat_imk_6_'.date('YmdHis'); 
						        $config['upload_path'] = './assets/berkas/imk/';
						        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
						        $config['max_size'] = '40480';
						        $config['max_width']  = '12880';
						        $config['max_height']  = '7680';
						        $config['file_name'] = $nmfile; 
					        	$this->upload->initialize($config);
					        	if ($this->upload->do_upload('imk_6'))
						        { 
						           	$f6 = $this->upload->data();
					        	}
				        	}
				        	if (isset($_FILES['imk_7'])) 
					        {
					        	$create_tgl = date('Y-m-d H:i:s'); 
						        $this->load->library('upload');
						        $nmfile = 'syarat_imk_7_'.date('YmdHis'); 
						        $config['upload_path'] = './assets/berkas/imk/';
						        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
						        $config['max_size'] = '40480';
						        $config['max_width']  = '12880';
						        $config['max_height']  = '7680';
						        $config['file_name'] = $nmfile; 
					        	$this->upload->initialize($config);
					        	if ($this->upload->do_upload('imk_7'))
						        { 
						           	$f7 = $this->upload->data();
					        	}
				        	}
				       $json= array(
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'alamat' => $this->input->post('alamat'),
	        			'no_hp' => $this->input->post('no_hp'),
	        			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
	        			'bentuk_perusahaan' => $this->input->post('bentuk_perusahaan'),
	        			'npwp_perusahaan' => $this->input->post('npwp_perusahaan'),
	        			'kegiatan_usaha' => $this->input->post('kegiatan_usaha'),
	        			'sarana_usaha' => $this->input->post('sarana_usaha'),
	        			'alamat_usaha' => $this->input->post('alamat_usaha'),
	        			'modal_usaha' => $this->input->post('modal_usaha'),
	        			'nomor_pendaftaran' => $this->input->post('nomor_pendaftaran'),
					
						'npwp'=> $this->input->post('npwp_perusahaan'),
						'alamat_perusahaan'=> $this->input->post('alamat_usaha'),
						'jml_modal_usaha'=> $this->input->post('modal_usaha'),
						'no_pendaftaran' => $this->input->post('nomor_pendaftaran'),
	        			);
	        		$berkas_json = array(
	        			'imk_1' =>  $f1['file_name'],
	        			'imk_2' =>  $f2['file_name'],
	        			'imk_3' =>  $f3['file_name'],
	        			'imk_4' =>  $f4['file_name'],
	        			'imk_5' =>  $f5['file_name'],
	        			'imk_6' =>  $f6['file_name'],
	        			'imk_7' =>  $f7['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'imk_1' =>  base_url('assets/berkas/imk/'.$f1['file_name']),
	        			'imk_2' =>  base_url('assets/berkas/imk/'.$f2['file_name']),
	        			'imk_3' =>  base_url('assets/berkas/imk/'.$f3['file_name']),
	        			'imk_4' =>  base_url('assets/berkas/imk/'.$f4['file_name']),
	        			'imk_5' =>  base_url('assets/berkas/imk/'.$f5['file_name']),
	        			'imk_6' =>  base_url('assets/berkas/imk/'.$f6['file_name']),
	        			'imk_7' =>  base_url('assets/berkas/imk/'.$f7['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 10,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/imk/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
						}
				     } // else

			    break; // imk

			    case 48: // sktm
					 $data = array(
						'title' => 'Surat Keterangan Tidak Mampu - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
						'crumb' => 'Edit Surat Keterangan Tidak Mampu',
				        'syarat' => 'Surat Keterangan Tidak Mampu',
				        'edit'  => $this->m_elayanan->get_detail($ID),
						'file'  => $this->m_elayanan->get_file(48),
						'syarat_surat'  => $this->m_elayanan->syarat_surat(),
						'desa' => $this->m_elayanan->desa(),
						);
					$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
			        $this->form_validation->set_rules('desa', 'Desa','trim|required');
			        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap','trim|required');
			        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir','trim|required');
			        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
			        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin','trim|required');
			        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan','trim|required');
			        $this->form_validation->set_rules('alamat', 'Alamat','trim|required');
			        $this->form_validation->set_rules('no_surat_rek', 'Nomor Surat','trim|required');
			        $this->form_validation->set_rules('tgl_surat_rek', 'Tanggal Surat','trim|required');
			        $this->form_validation->set_rules('desa', 'Nama Desa','trim|required');
			        $this->form_validation->set_rules('pejabat_lurah', 'Nama Pejabat Lurah / Kades','trim|required');
			        $this->form_validation->set_rules('nip_pejabat_lurah', 'NIP','trim|required');
			        $this->form_validation->set_rules('jabatan_pejabat_lurah', 'Jabatan','trim|required');
			        if ($this->form_validation->run() == FALSE)
			        {
			          $this->template->view('main/pelayanan/edit/v_sktm_edit', $data);
			        } 
			        else {
			        	if (isset($_FILES['sktm_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sktm_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sktm/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 

	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sktm_1'))
		           { 
		           	$f1 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['sktm_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sktm_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sktm/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sktm_2'))
		           { 
		           	$f2 = $this->upload->data();
	        	 	}	
	        }
	         if (isset($_FILES['sktm_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sktm_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sktm/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sktm_3'))
		           { 
		           	$f3 = $this->upload->data();
	        	 	}	
	        }

		           	$json= array(
	        			'no_surat_rek'=> $this->input->post('no_surat_rek'),
				        'tgl_surat_rek'=> $this->input->post('tgl_surat_rek'),
				        'desa' => $this->input->post('desa'),
				        'pejabat_lurah'=> $this->input->post('pejabat_lurah'),
				        'nip_pejabat_lurah'=> $this->input->post('nip_pejabat_lurah'),
				        'jabatan_pejabat_lurah'=> $this->input->post('jabatan_pejabat_lurah'),
				        'pengikut' => 0,
				        'keperluan' => $this->input->post('keperluan'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        			'pekerjaan' => $this->input->post('pekerjaan'),  
	        			'alamat' => $this->input->post('alamat'), 
	        			);
	        		$berkas_json = array(
	        			'sktm_1' =>  $f1['file_name'],
	        			'sktm_2' =>  $f2['file_name'],
	        			'sktm_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'sktm_1' =>  base_url('assets/berkas/sktm/'.$f1['file_name']),
	        			'sktm_2' =>  base_url('assets/berkas/sktm/'.$f2['file_name']),
	        			'sktm_3' =>  base_url('assets/berkas/sktm/'.$f3['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 48,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/sktm/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
						} 
			        			
			        	}	//else	
			    break; // sktm

			    case 8: // rpik
			    	$data = array(
						'title' => 'Surat Rekomendasi Izin Keramaian  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
						'crumb' => 'Edit Surat Rekomendari Izin Keramaian',
						'syarat' => 'Surat Rekomendari Izin Keramaian',
						'desa'  => $this->m_elayanan->desa(),
						'hari'  => $this->m_elayanan->hari(),
						'agama' => $this->agama->get_all_agama(),
						'edit'  => $this->m_elayanan->get_detail($ID),
						);
					$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
					$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
					$this->form_validation->set_rules('no_surat', 'No surat', 'trim|required');
					$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
					$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
					$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
					$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
					$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
					$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
					$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
					$this->form_validation->set_rules('alamat_pemohon', 'Alamat Pemohon', 'trim|required');
					$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');
					$this->form_validation->set_rules('hari', 'Hari Acara', 'trim|required');
					$this->form_validation->set_rules('tgl_acara', 'Tanggal Acara', 'trim|required');
					$this->form_validation->set_rules('mulai_pukul', 'Mulai Pukul', 'trim|required');
					$this->form_validation->set_rules('sampai_pukul', 'Sampai Pukul', 'trim|required');
					$this->form_validation->set_rules('tempat_acara', 'Tempat Acara', 'trim|required');
					$this->form_validation->set_rules('hiburan', 'Hiburan', 'trim|required');

			        if ($this->form_validation->run() == FALSE)
			        {
			          $this->template->view('main/pelayanan/edit/v_rpik_edit', $data);
			        } else {
			        	if (isset($_FILES['rpik_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpik_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpik/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpik_1'))
		        { 
		           	$f1 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpik_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpik_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpik/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpik_2'))
		        { 
		           	$f2 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpik_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpik_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpik/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpik_3'))
		        { 
		           	$f3 = $this->upload->data();
	        	}
        	}
        			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'no_surat' => $this->input->post('no_surat'),
	        			'tanggal_surat' => $this->input->post('tanggal_surat'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),
	        			'agama' => $this->input->post('agama'),
	        			'pekerjaan' => $this->input->post('pekerjaan'),
	        			'alamat_pemohon' => $this->input->post('alamat_pemohon'),
	        			'keperluan' => $this->input->post('keperluan'),
	        			'hari' => $this->input->post('hari'),
	        			'tgl_acara' => $this->input->post('tgl_acara'),
	        			'mulai_pukul' => $this->input->post('mulai_pukul'),
	        			'sampai_pukul' => $this->input->post('sampai_pukul'),
	        			'tempat_acara' => $this->input->post('tempat_acara'),
	        			'hiburan' => $this->input->post('hiburan'),
	        			'no_surat_rek'=> $this->input->post('no_surat'),
						'tgl_surat_rek' => $this->input->post('tanggal_surat'),
						'tanggal' => $this->input->post('tgl_acara'),
						'waktu' => $this->input->post('mulai_pukul').' WIB s.d '.$this->input->post('sampai_pukul').' WIB',
						'tempat'=> $this->input->post('tempat_acara'),


	        			);
	        		$berkas_json = array(
	        			'rpik_1' =>  $f1['file_name'],
	        			'rpik_2' =>  $f2['file_name'],
	        			'rpik_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'rpik_1' =>  base_url('assets/berkas/rpik/'.$f1['file_name']),
	        			'rpik_2' =>  base_url('assets/berkas/rpik/'.$f2['file_name']),
	        			'rpik_3' =>  base_url('assets/berkas/rpik/'.$f3['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 8,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/rpik/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
						} 
			        }

			    break; // rpik

			    case 503: // skkb
			    		$data = array(
			'title' => 'Surat Keterangan Kelakuan Baik - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Edit Surat Keterangan Kelakuan Baik',
			'syarat' => 'Surat Keterangan Kelakuan Baik',
			'desa'  => $this->m_elayanan->desa(),
			'edit'  => $this->m_elayanan->get_detail($ID),
			);
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
        $this->form_validation->set_rules('desa', 'Desa','trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap','trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir','trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan','trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat','trim|required');
        $this->form_validation->set_rules('keperluan', 'Keperluan','trim|required');
        $this->form_validation->set_rules('no_surat', 'No surat', 'trim|required');
		$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/edit/v_skkb_edit', $data);
        } 

        else
        {
        	
        	if (isset($_FILES['skkb_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_skkb_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/skkb/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '100480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('skkb_1'))
		           { 
		           	$f1 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['skkb_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_skkb_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/skkb/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '100480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('skkb_2'))
		           { 
		           	$f2 = $this->upload->data();
	        	 	}	
	        }
	         if (isset($_FILES['skkb_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_skkb_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/skkb/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '100480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('skkb_3'))
		           { 
		           	$f3 = $this->upload->data();
	        	 	}	
	        }
		           		$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        			'pekerjaan' => $this->input->post('pekerjaan'),  
	        			'alamat' => $this->input->post('alamat'),   
	        			'keperluan' => $this->input->post('keperluan'),
	        			'no_surat'=>$this->input->post('no_surat'),
						'tanggal_surat'=>$this->input->post('tanggal_surat'),
						
						'no_surat_rek'=>$this->input->post('no_surat'),
						'tgl_surat_rek'=>$this->input->post('tanggal_surat'),

	        			);
	        		$berkas_json = array(
	        			'skkb_1' =>  $f1['file_name'],
	        			'skkb_2' =>  $f2['file_name'],
	        			'skkb_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'skkb_1' => base_url('assets/berkas/skkb/'.$f1['file_name']),
	        			'skkb_2' => base_url('assets/berkas/skkb/'.$f2['file_name']),
	        			'skkb_3' => base_url('assets/berkas/skkb/'.$f3['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 503,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/skkb/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
						} 
       				 } 
			    break; // skkb

			    case 19: // skw
			    	$data = array(
					'title' => 'Edit Surat Keterangan Waris  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
					'crumb' => 'Edit Surat Keterangan Waris',
					'syarat' => 'Surat Keterangan Waris',
					'desa'  => $this->m_elayanan->desa(),
					'hari'  => $this->m_elayanan->hari(),
					'edit'  => $this->m_elayanan->get_detail($ID),
					);
				$this->form_validation->set_rules('nik', 'NIK Pemohon', 'trim|required');
				//Surat Keterangan dari Kades / Lurah :
				$this->form_validation->set_rules('nama_kades', 'Nama Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_numeric');
				$this->form_validation->set_rules('pangkat', 'Pangkat/Golongan ', 'trim|required');
				$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
				//Surat Pernyataan Para Ahli Waris
				$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
				$this->form_validation->set_rules('diketahui', 'Diketahui', 'trim|required');
				$this->form_validation->set_rules('tanggal_diketahui', 'Tanggal diketahui', 'trim|required');
				//Akta Kematian
				$this->form_validation->set_rules('nomor_akta', 'Nomor Akta', 'trim|required');
				$this->form_validation->set_rules('ditandatangani', 'Ditandatangani', 'trim|required');
				$this->form_validation->set_rules('tanggal_kematian', 'Tanggal Kematian', 'trim|required');
				//Keterangan Kematian
				$this->form_validation->set_rules('nama_kematian', 'Nama', 'trim|required');
				$this->form_validation->set_rules('umur', 'Umur', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('hari', 'Hari', 'trim|required');
				$this->form_validation->set_rules('tanggal_keterangan_kematian', 'Tanggal', 'trim|required');
				$this->form_validation->set_rules('ditempat', 'Di/ Tempat', 'trim|required');

		        if ($this->form_validation->run() == FALSE)
		        {
		          $this->template->view('main/pelayanan/edit/v_skw_edit', $data);
		        }else{
		        	if (isset($_FILES['skw_1'])) 
			        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_skw_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/skw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('skw_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['skw_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_skw_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/skw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('skw_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['skw_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_skw_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/skw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('skw_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['skw_4'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_skw_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/skw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('skw_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        }
	        	$berkas_json = array(
	        			'skw_1' =>  $f1['file_name'],
	        			'skw_2' =>  $f2['file_name'],
	        			'skw_3' =>  $f3['file_name'],
	        			'skw_4' =>  $f4['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'skw_1' =>  base_url('assets/berkas/skw/'.$f1['file_name']), 
	        			'skw_2' =>  base_url('assets/berkas/skw/'.$f2['file_name']),
	        			'skw_3' =>  base_url('assets/berkas/skw/'.$f3['file_name']),
	        			'skw_4' =>  base_url('assets/berkas/skw/'.$f4['file_name']),
	        			); 
        			$json= array(
        				'pejabat_lurah' => $this->input->post('nama_kades'),
						'nip_pejabat_lurah'=> $this->input->post('nip'),
						'perangkat_desa' => $this->input->post('pangkat'),
						'jabatan_pejabat_lurah'=> $this->input->post('jabatan'),
						'tgl_surat_waris'=> $this->input->post('tanggal'),
						'diketahui_oleh'=> $this->input->post('diketahui'),
						'tgl_diketahui'=> $this->input->post('tanggal_diketahui'),
						'no_akta_kematian'=> $this->input->post('nomor_akta'),
						'akta_ttd'=> $this->input->post('ditandatangani'),
						'tgl_akta'=> $this->input->post('tanggal_kematian'),
						'nama'=> $this->input->post('nama_kematian'),
						'hari_mati'=> $this->input->post('hari'),
						'tgl_mati'=> $this->input->post('tanggal_keterangan_kematian'),
						'tmp_mati'=> $this->input->post('ditempat'),
        				//Surat Keterangan dari Kades / Lurah :
	        			'nama_kades' => $this->input->post('nama_kades'),
	        			'nip' => $this->input->post('nip'),
	        			'pangkat' => $this->input->post('pangkat'),
	        			'jabatan' => $this->input->post('jabatan'),
	        			//Surat Pernyataan Para Ahli Waris
						'tanggal'=> $this->input->post('tanggal'),
						'diketahui'=> $this->input->post('diketahui'),
						'tanggal_diketahui'=> $this->input->post('tanggal_diketahui'),
						//Akta Kematian
						'nomor_akta'=> $this->input->post('nomor_akta'),
						'ditandatangani'=> $this->input->post('ditandatangani'),
						'tanggal_kematian'=> $this->input->post('tanggal_kematian'),
						//Keterangan Kematian
						'nama_kematian'=> $this->input->post('nama_kematian'),
						'umur'=> $this->input->post('umur'),
						'alamat'=> $this->input->post('alamat'),
						'hari'=> $this->input->post('hari'),
						'tanggal_keterangan_kematian'=> $this->input->post('tanggal_keterangan_kematian'),
						'ditempat'=> $this->input->post('ditempat'),				 
	        			);
	        		
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 19,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/skw/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
						}
		        	

        		}//else
			    break; // skw

			    case 3: // kst
			    $data = array(
				'title' => ' Edit Surat Keterangan Tinggal Sementara  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
				'crumb' => 'Edit Surat Keterangan Tinggal Sementara',
				'syarat' => 'Surat Keterangan Tinggal Sementara',
				'desa'  => $this->m_elayanan->desa(),
				'darah'  => $this->m_elayanan->darah(),
				'edit'  => $this->m_elayanan->get_detail($ID),
				);
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap Pemohon', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('nokk', 'Nomor Kartu Keluarga', 'trim|required|is_numeric');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('nomor_masuk', 'Nomor Masuk', 'trim|required');
		$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'trim|required');
		$this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'trim|required');
		$this->form_validation->set_rules('desa', 'Asal Desa', 'trim|required');
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		$this->form_validation->set_rules('alamat_pindah', 'Alamat Pindah', 'trim|required');
		//alamat Sekarang
		$this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required');
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		$this->form_validation->set_rules('darah', 'Golongan Darah', 'trim|required');
		//penanggung jawab
		$this->form_validation->set_rules('nik_penanggung', 'NIK Penanggung', 'trim|required');
		$this->form_validation->set_rules('nama_penanggung', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('alamat_penanggung', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('pekerjaan_penanggung', 'Pekerjaan Penanggung', 'trim|required');
	        if ($this->form_validation->run() == FALSE)
	        {
	          $this->template->view('main/pelayanan/edit/v_kts_edit', $data);
	        }else{
        	if (isset($_FILES['kts_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kts_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kts/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kts_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kts_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kts_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kts/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kts_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kts_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kts_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kts/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kts_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['kts_4'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kts_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kts/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kts_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        }
	        	$berkas_json = array(
	        			'kts_1' =>  $f1['file_name'],
	        			'kts_2' =>  $f2['file_name'],
	        			'kts_3' =>  $f3['file_name'],
	        			'kts_4' =>  $f4['file_name'],
	        			); 
	        	$berkas_json_link = array(
	        			'kts_1' =>  base_url('assets/berkas/kts/'. $f1['file_name']),
	        			'kts_2' =>  base_url('assets/berkas/kts/'. $f2['file_name']),
	        			'kts_3' =>  base_url('assets/berkas/kts/'. $f3['file_name']),
	        			'kts_4' =>  base_url('assets/berkas/kts/'. $f4['file_name']),
	        			); 
        			$json= array(
	        			//Yang bertanda tangan di bawah ini, menerangkan bahwa :
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
						'nokk' => $this->input->post('nokk'),
						'tmp_lahir' => $this->input->post('tmp_lahir'),
						'tgl_lahir' => $this->input->post('tgl_lahir'),
						'jns_kelamin' => $this->input->post('jns_kelamin'),
						'status_perkawinan' => $this->input->post('status_perkawinan'),
						'nomor_masuk' => $this->input->post('nomor_masuk'),
						'tanggal_masuk' => $this->input->post('tanggal_masuk'),
						'desa' => $this->input->post('desa'),
						'alamat_asal' => $this->input->post('alamat_asal'),

						//alamat Sekarang
						'desa_kelurahan' => $this->input->post('desa_kelurahan'),
						'kecamatan' => $this->input->post('kecamatan'),
						'kabupaten' => $this->input->post('kabupaten'),
						'provinsi' => $this->input->post('provinsi'),
						'kode_pos' => $this->input->post('kode_pos'),
						'alasan_pindah' => $this->input->post('alasan_pindah'),
						'darah' => $this->input->post('darah'),
						//penanggung jawab
						'nik_penanggung' => $this->input->post('nik_penanggung'),
						'nama_penanggung' => $this->input->post('nama_penanggung'),
						'alamat_penanggung' => $this->input->post('alamat_penanggung'),
						'pekerjaan_penanggung' => $this->input->post('pekerjaan_penanggung'),

						'no_tanda_masuk'=> $this->input->post('nomor_masuk'),
						'tgl_tanda_masuk' => $this->input->post('tanggal_masuk'),
  					    'alamat_pindah' => $this->input->post('alamat_pindah'),
						'kd_pos_pindah' => $this->input->post('kode_pos'),
						'desa_pindah' => $this->input->post('desa_kelurahan'),
						'kecamatan_pindah' => $this->input->post('kecamatan'),
						'kabupaten_pindah'=> $this->input->post('kabupaten'),
						'provinsi_pindah'=> $this->input->post('provinsi'),
						'nama' => $this->input->post('nama_penanggung'),
						'alamat'=> $this->input->post('alamat_penanggung'),
						'pekerjaan'=> $this->input->post('pekerjaan_penanggung'),
						'pengikut'=> 0,

	        			);
	        		
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 3,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/kts/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
						}

        		}//else
			    break; // kst

			    case 2: // kdp
			    	$data = array(
						'title' => 'Edit Surat Keterangan Domisili Perusahaan  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
						'crumb' => 'Edit Surat Keterangan Domisili Perusahaan',
						'syarat' => 'Surat Keterangan Domisili Perusahaan',
						'desa'  => $this->m_elayanan->desa(),
						'edit'  => $this->m_elayanan->get_detail($ID),
						);
					$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
					$this->form_validation->set_rules('desa', 'Desa ', 'trim|required');
					$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
					$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
					$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
					$this->form_validation->set_rules('desa_perusahaan', 'Desa Perusahaan', 'trim|required');
					$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');

			        if ($this->form_validation->run() == FALSE)
			        {
			          $this->template->view('main/pelayanan/edit/v_kdp_edit', $data);
			        } 
			        else
			        {
		        	if (isset($_FILES['kdp_1'])) 
			        {
			        	$create_tgl = date('Y-m-d H:i:s'); 
				        $this->load->library('upload');
				        $nmfile = 'syarat_kdp_1_'.date('YmdHis'); 
				        $config['upload_path'] = './assets/berkas/kdp/';
				        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
				        $config['max_size'] = '40480';
				        $config['max_width']  = '12880';
				        $config['max_height']  = '7680';
				        $config['file_name'] = $nmfile; 
			        	$this->upload->initialize($config);
			        	if ($this->upload->do_upload('kdp_1'))
				        { 
				           	$f1 = $this->upload->data();
			        	}
		        	}
		        	if (isset($_FILES['kdp_2'])) 
			        {
			        	$create_tgl = date('Y-m-d H:i:s'); 
				        $this->load->library('upload');
				        $nmfile = 'syarat_kdp_2_'.date('YmdHis'); 
				        $config['upload_path'] = './assets/berkas/kdp/';
				        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
				        $config['max_size'] = '40480';
				        $config['max_width']  = '12880';
				        $config['max_height']  = '7680';
				        $config['file_name'] = $nmfile; 
			        	$this->upload->initialize($config);
			        	if ($this->upload->do_upload('kdp_2'))
				        { 
				           	$f2 = $this->upload->data();
			        	}
		        	}
		        	if (isset($_FILES['kdp_3'])) 
			        {
			        	$create_tgl = date('Y-m-d H:i:s'); 
				        $this->load->library('upload');
				        $nmfile = 'syarat_kdp_3_'.date('YmdHis'); 
				        $config['upload_path'] = './assets/berkas/kdp/';
				        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
				        $config['max_size'] = '40480';
				        $config['max_width']  = '12880';
				        $config['max_height']  = '7680';
				        $config['file_name'] = $nmfile; 
			        	$this->upload->initialize($config);
			        	if ($this->upload->do_upload('kdp_3'))
				        { 
				           	$f3 = $this->upload->data();
			        	}
		        	}
		        	if (isset($_FILES['kdp_4'])) 
			        {
			        	$create_tgl = date('Y-m-d H:i:s'); 
				        $this->load->library('upload');
				        $nmfile = 'syarat_kdp_4_'.date('YmdHis'); 
				        $config['upload_path'] = './assets/berkas/kdp/';
				        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
				        $config['max_size'] = '40480';
				        $config['max_width']  = '12880';
				        $config['max_height']  = '7680';
				        $config['file_name'] = $nmfile; 
			        	$this->upload->initialize($config);
			        	if ($this->upload->do_upload('kdp_4'))
				        { 
				           	$f4 = $this->upload->data();
			        	}
		        	}
		        	if (isset($_FILES['kdp_5'])) 
			        {
			        	$create_tgl = date('Y-m-d H:i:s'); 
				        $this->load->library('upload');
				        $nmfile = 'syarat_kdp_5_'.date('YmdHis'); 
				        $config['upload_path'] = './assets/berkas/kdp/';
				        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
				        $config['max_size'] = '40480';
				        $config['max_width']  = '12880';
				        $config['max_height']  = '7680';
				        $config['file_name'] = $nmfile; 
			        	$this->upload->initialize($config);
			        	if ($this->upload->do_upload('kdp_5'))
				        { 
				           	$f5 = $this->upload->data();
			        	}
		        	}
		        	if (isset($_FILES['kdp_6'])) 
			        {
			        	$create_tgl = date('Y-m-d H:i:s'); 
				        $this->load->library('upload');
				        $nmfile = 'syarat_kdp_6_'.date('YmdHis'); 
				        $config['upload_path'] = './assets/berkas/kdp/';
				        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
				        $config['max_size'] = '40480';
				        $config['max_width']  = '12880';
				        $config['max_height']  = '7680';
				        $config['file_name'] = $nmfile; 
			        	$this->upload->initialize($config);
			        	if ($this->upload->do_upload('kdp_6'))
				        { 
				           	$f6 = $this->upload->data();
			        	}
		        	}
		        	if (isset($_FILES['kdp_7'])) 
			        {
			        	$create_tgl = date('Y-m-d H:i:s'); 
				        $this->load->library('upload');
				        $nmfile = 'syarat_kdp_7_'.date('YmdHis'); 
				        $config['upload_path'] = './assets/berkas/kdp/';
				        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
				        $config['max_size'] = '40480';
				        $config['max_width']  = '12880';
				        $config['max_height']  = '7680';
				        $config['file_name'] = $nmfile; 
			        	$this->upload->initialize($config);
			        	if ($this->upload->do_upload('kdp_7'))
				        { 
				           	$f7 = $this->upload->data();
			        	}
		        	}

        			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'no_surat' => $this->input->post('no_surat'),
	        			'tanggal_surat' => $this->input->post('tanggal_surat'),
	        			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
	        			'desa_perusahaan' => $this->input->post('desa_perusahaan'),
	        			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
						'no_surat_rek' => $this->input->post('no_surat'),
						'tgl_surat_rek' => $this->input->post('tanggal_surat'),

	        			);
	        		$berkas_json = array(
	        			'kdp_1' =>  $f1['file_name'],
	        			'kdp_2' =>  $f2['file_name'],
	        			'kdp_3' =>  $f3['file_name'],
	        			'kdp_4' =>  $f4['file_name'],
	        			'kdp_5' =>  $f5['file_name'],
	        			'kdp_6' =>  $f6['file_name'],
	        			'kdp_7' =>  $f7['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'kdp_1' =>   base_url('assets/berkas/kdp/'.$f1['file_name']) ,
	        			'kdp_2' =>   base_url('assets/berkas/kdp/'.$f2['file_name']) ,
	        			'kdp_3' =>   base_url('assets/berkas/kdp/'.$f3['file_name']) ,
	        			'kdp_4' =>   base_url('assets/berkas/kdp/'.$f4['file_name']) ,
	        			'kdp_5' =>   base_url('assets/berkas/kdp/'.$f5['file_name']) ,
	        			'kdp_6' =>   base_url('assets/berkas/kdp/'.$f6['file_name']) ,
	        			'kdp_7' =>   base_url('assets/berkas/kdp/'.$f7['file_name']) ,
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 2,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/kdp/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
						}
        			} // else
			    break; // kdp
			    case 1: // kpj
			    	$data = array(
				'title' => 'Edit Surat Keterangan Pindah Jiwa  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
				'crumb' => 'Edit Surat Keterangan Pindah Jiwa',
				'syarat' => 'Surat Keterangan Pindah Jiwa',
				'desa'  => $this->m_elayanan->desa(),
				'agama'  => $this->m_elayanan->agama(),
				'edit'  => $this->m_elayanan->get_detail($ID),
				);
				$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
				$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
				$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
				$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
				$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
				$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
				$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
				$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
				$this->form_validation->set_rules('shdk', 'Status Hubungan dalam Keluarga', 'trim|required');
				//keterangan pindah
				$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
				// tujuan pindah
				$this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'trim|required');
				$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
				$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
				$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
				$this->form_validation->set_rules('pada_tanggal', 'Pada Tanggal', 'trim|required');

		        if ($this->form_validation->run() == FALSE)
		        {
		          $this->template->view('main/pelayanan/edit/v_kpj_edit', $data);
		        }else{
		        	if (isset($_FILES['kpj_1'])) 
			        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpj_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpj/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpj_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kpj_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpj_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpj/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpj_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kpj_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpj_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpj/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpj_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['kpj_4'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpj_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpj/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpj_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        	}
	        		$berkas_json = array(
	        			'kpj_1' =>  $f1['file_name'],
	        			'kpj_2' =>  $f2['file_name'],
	        			'kpj_3' =>  $f3['file_name'],
	        			'kpj_4' =>  $f4['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'kpj_1' =>  base_url('assets/berkas/kpj/'.$f1['file_name']) ,
	        			'kpj_2' =>  base_url('assets/berkas/kpj/'.$f2['file_name']) ,
	        			'kpj_3' =>  base_url('assets/berkas/kpj/'.$f3['file_name']) ,
	        			'kpj_4' =>  base_url('assets/berkas/kpj/'.$f4['file_name']) ,
	        			); 

        			$json= array(
	    			'nama_lengkap'=> $this->input->post('nama_lengkap'),
					'tmp_lahir'=> $this->input->post('tmp_lahir'),
					'tgl_lahir'=> $this->input->post('tgl_lahir'),
					'jns_kelamin'=> $this->input->post('jns_kelamin'),
					'kewarganegaraan'=> $this->input->post('kewarganegaraan'),
					'status_perkawinan'=> $this->input->post('status_perkawinan'),
					'agama'=> $this->input->post('agama'),
					'alamat'=> $this->input->post('alamat'),
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'shdk'=> $this->input->post('shdk'),
					//keterangan pindah
					'alasan_pindah'=> $this->input->post('alasan_pindah'),
					// tujuan pindah
					'desa_kelurahan'=> $this->input->post('desa_kelurahan'),
					'kecamatan'=> $this->input->post('kecamatan'),
					'kabupaten'=> $this->input->post('kabupaten'),
					'provinsi'=> $this->input->post('provinsi'),
					'pada_tanggal'=> $this->input->post('pada_tanggal'),

					'desa'=> $this->input->post('desa_kelurahan'),
					'tgl_pindah'=> $this->input->post('pada_tanggal'),
					'pengikut'=> 0,
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 1,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/kpj/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}
		        	
        		} // else
			    break; // kpj

			    case 12: // srku
			    	$data = array(
						'title' => 'Edit Surat Rekomendasi Keterangan Usaha  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
						'crumb' => 'Edit Surat Rekomendasi Keterangan Usaha',
						'syarat' => 'Surat Rekomendasi Keterangan Usaha',
						'desa'  => $this->m_elayanan->desa(),
						'agama' => $this->agama->get_all_agama(),
						'edit'  => $this->m_elayanan->get_detail($ID),
						);
					$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
					$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
			        $this->form_validation->set_rules('desa', 'Desa','trim|required');
			        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap','trim|required');
			        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir','trim|required');
			        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
			        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin','trim|required');
			        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan','trim|required');
			        $this->form_validation->set_rules('alamat', 'Alamat Pemohon','trim|required');
			        $this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha','trim|required');
			        $this->form_validation->set_rules('usaha', 'Nama Usaha','trim|required');
			        $this->form_validation->set_rules('pejabat_lurah', 'Nama Pejabat Lurah / Kades','trim|required');
        			$this->form_validation->set_rules('nip_pejabat_lurah', 'NIP','trim|required');
        			$this->form_validation->set_rules('jabatan_pejabat_lurah', 'Jabatan','trim|required');
			        if ($this->form_validation->run() == FALSE)
			        {
			          $this->template->view('main/pelayanan/edit/v_srku_edit', $data);
			        } 
			        else
			        {
			        	if (isset($_FILES['srku_1'])) 
				        {
				        	$create_tgl = date('Y-m-d H:i:s'); 
					        $this->load->library('upload');
					        $nmfile = 'syarat_srku_1_'.date('YmdHis'); 
					        $config['upload_path'] = './assets/berkas/srku/';
					        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
					        $config['max_size'] = '40480';
					        $config['max_width']  = '12880';
					        $config['max_height']  = '7680';
					        $config['file_name'] = $nmfile; 
				        
				        	$this->upload->initialize($config);
				        	if ($this->upload->do_upload('srku_1'))
					           { 
					           	$f1 = $this->upload->data();
				        	 	}	
				        }
				        if (isset($_FILES['srku_2'])) 
				        {
				        	$create_tgl = date('Y-m-d H:i:s'); 
					        $this->load->library('upload');
					        $nmfile = 'syarat_srku_2_'.date('YmdHis'); 
					        $config['upload_path'] = './assets/berkas/srku/';
					        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
					        $config['max_size'] = '440480';
					        $config['max_width']  = '12880';
					        $config['max_height']  = '7680';
					        $config['file_name'] = $nmfile; 
				        
				        	$this->upload->initialize($config);
				        	if ($this->upload->do_upload('srku_2'))
					           { 
					           	$f2 = $this->upload->data();
				        	 	}	
				        }
				         if (isset($_FILES['srku_3'])) 
				        {
				        	$create_tgl = date('Y-m-d H:i:s'); 
					        $this->load->library('upload');
					        $nmfile = 'syarat_srku_3_'.date('YmdHis'); 
					        $config['upload_path'] = './assets/berkas/srku/';
					        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
					        $config['max_size'] = '440480';
						        $config['max_width']  = '12880';
						        $config['max_height']  = '7680';
						        $config['file_name'] = $nmfile; 
					        
					        	$this->upload->initialize($config);
					        	if ($this->upload->do_upload('srku_3'))
						           { 
						           	$f3 = $this->upload->data();
					        	 	}	
					        }
		           		$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        			'agama' => $this->input->post('agama'),  
	        			'pekerjaan' => $this->input->post('pekerjaan'),  
	        			'alamat' => $this->input->post('alamat'),   
	        			'usaha' => $this->input->post('usaha'),
	        			'alamat_usaha' => $this->input->post('alamat_usaha'),
	        			'pejabat_lurah'=> $this->input->post('pejabat_lurah'),
        				'nip_pejabat_lurah'=> $this->input->post('nip_pejabat_lurah'),
        				'jabatan_pejabat_lurah'=> $this->input->post('jabatan_pejabat_lurah'),
						'nama_usaha'=> $this->input->post('usaha'),
	        			);
	        		$berkas_json = array(
	        			'srku_1' =>  $f1['file_name'],
	        			'srku_2' =>  $f2['file_name'],
	        			'srku_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'srku_1' =>  base_url('assets/berkas/srku/'. $f1['file_name']),
	        			'srku_2' =>  base_url('assets/berkas/srku/'. $f2['file_name']),
	        			'srku_3' =>  base_url('assets/berkas/srku/'. $f3['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 12,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/srku/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}
		        	
        			}	
			    break; // srku
			    
			    case 5: // sbl
					$data = array(
					'title' => 'Edit Surat Keterangan Bersih Lingkungan Keluarga  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
					'crumb' => 'Edit Surat Keterangan Bersih Lingkungan Keluarga',
					'syarat' => 'Surat Keterangan Bersih Lingkungan Keluarga',
					'desa'  => $this->m_elayanan->desa(),
					'edit'  => $this->m_elayanan->get_detail($ID),
					);

				$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
				$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');

				$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
				$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
				$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
				$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
				$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
				$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
				$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');

		        if ($this->form_validation->run() == FALSE)
		        {
		          $this->template->view('main/pelayanan/edit/v_sbl_edit', $data);
		        }
		        else {
		         	if (isset($_FILES['sbl_1'])) 
			        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sbl_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sbl/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sbl_1'))
		        { 
		           	$f1 = $this->upload->data();
	        	}
        	} 
        	if (isset($_FILES['sbl_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sbl_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sbl/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sbl_2'))
		        { 
		           	$f2 = $this->upload->data();
	        	}
        	} 
        	if (isset($_FILES['sbl_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_sbl_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/sbl/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('sbl_3'))
		        { 
		           	$f3 = $this->upload->data();
	        	}
        	}

        			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nomor_surat' => $this->input->post('nomor_surat'),
	        			'tanggal_surat' => $this->input->post('tanggal_surat'),

	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),
	        			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
	        			'pekerjaan' => $this->input->post('pekerjaan'),
	        			'alamat' => $this->input->post('alamat'),
	        			'keperluan' => $this->input->post('keperluan'),

						'no_surat_ket'=> $this->input->post('nomor_surat'),
						'tgl_surat_ket'=> $this->input->post('tanggal_surat'),
						
	        			);
	        		$berkas_json = array(
	        			'sbl_1' =>  $f1['file_name'],
	        			'sbl_2' =>  $f2['file_name'],
	        			'sbl_3' =>  $f3['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'sbl_1' =>  base_url('assets/berkas/sbl/'.$f1['file_name']),
	        			'sbl_2' =>  base_url('assets/berkas/sbl/'.$f2['file_name']),
	        			'sbl_3' =>  base_url('assets/berkas/sbl/'.$f3['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 5,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/sbl/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}
		        	
         		} //else	    					
			    break; // sbl

			    case 7 : // siup
			    	$data = array(
			'title' => 'Edit Surat Rekomendasi Izin Usaha Perdagangan  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Edit Surat Rekomendasi Izin Usaha Perdagangan',
			'syarat' => 'Surat Rekomendasi Izin Usaha Perdagangan',
			'desa'  => $this->m_elayanan->desa(),
			'edit'  => $this->m_elayanan->get_detail($ID),
			);

		$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Nomor Telepon/Hp', 'trim|required');

		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');
		$this->form_validation->set_rules('kedudukan', 'Kedudukan dalam Perusahaan', 'trim|required');
		$this->form_validation->set_rules('bentuk_perusahaan', 'Bentuk Perusahaan', 'trim|required');
		$this->form_validation->set_rules('bidang_usaha', 'Bidang Usaha', 'trim|required');
		$this->form_validation->set_rules('kegiatan_usaha', 'Kegiatan Usaha', 'trim|required');
		$this->form_validation->set_rules('jenis_barang_a', 'Jenis Barang Dagangan', 'trim|required');
		$this->form_validation->set_rules('jenis_barang_b', '', 'trim');
		$this->form_validation->set_rules('jenis_barang_c', '', 'trim');
		$this->form_validation->set_rules('modal_usaha', 'Modal Usaha', 'trim|required|is_numeric');
		$this->form_validation->set_rules('jumlah_tenaga_laki', '', 'trim');
		$this->form_validation->set_rules('jumlah_tenaga_perempuan', '', 'trim');

		$this->form_validation->set_rules('pendidikan_laki_sd', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_sltp', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_slta', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_d3', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_s1', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_s2', '', 'trim');
		$this->form_validation->set_rules('pendidikan_laki_s3', '', 'trim');

		$this->form_validation->set_rules('pendidikan_perempuan_sd', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_sltp', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_slta', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_d3', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_s1', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_s2', '', 'trim');
		$this->form_validation->set_rules('pendidikan_perempuan_s3', '', 'trim');

		$this->form_validation->set_rules('nama_pemilik_tanah', '', 'trim');
		$this->form_validation->set_rules('alamat_pemilik_tanah', '', 'trim');
		$this->form_validation->set_rules('jangka_waktu', '', 'trim');
		$this->form_validation->set_rules('mulai_tanggal', '', 'trim');
		$this->form_validation->set_rules('sampai_tanggal', '', 'trim');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/edit/v_siup_edit', $data);
        } else {
        	if (isset($_FILES['siup_1']) OR  empty($_FILES['siup_1']))
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['siup_2']) OR  empty($_FILES['siup_2']))
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['siup_3']) OR  empty($_FILES['siup_3']))
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['siup_4']) OR  empty($_FILES['siup_4']))
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['siup_5']) OR  empty($_FILES['siup_5'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_5_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_5'))
		     	   	{ 
		      	  		$f5 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['siup_6']) OR  empty($_FILES['siup_6']))
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_6_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_6'))
		     	   	{ 
		      	  		$f6 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['siup_7']) OR  empty($_FILES['siup_7']))  
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_7_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_7'))
		     	   	{ 
		      	  		$f7 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['siup_8']) OR  empty($_FILES['siup_8'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_siup_8_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/siup/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('siup_8'))
		     	   	{ 
		      	  		$f8 = $this->upload->data();
	       			}	
	        	}
	        		$berkas_json = array(
	        			'siup_1' =>  $f1['file_name'],
	        			'siup_2' =>  $f2['file_name'],
	        			'siup_3' =>  $f3['file_name'],
	        			'siup_4' =>  $f4['file_name'],
	        			'siup_5' =>  $f5['file_name'],
	        			'siup_6' =>  $f6['file_name'],
	        			'siup_7' =>  $f7['file_name'],
	        			'siup_8' =>  $f8['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'siup_1' =>  base_url('assets/berkas/siup/'.$f1['file_name']),
	        			'siup_2' =>  base_url('assets/berkas/siup/'.$f2['file_name']),
	        			'siup_3' =>  base_url('assets/berkas/siup/'.$f3['file_name']),
	        			'siup_4' =>  base_url('assets/berkas/siup/'.$f4['file_name']),
	        			'siup_5' =>  base_url('assets/berkas/siup/'.$f5['file_name']),
	        			'siup_6' =>  base_url('assets/berkas/siup/'.$f6['file_name']),
	        			'siup_7' =>  base_url('assets/berkas/siup/'.$f7['file_name']),
	        			'siup_8' =>  base_url('assets/berkas/siup/'.$f8['file_name']),
	        			);

        			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),
	        			'alamat' => $this->input->post('alamat'),
	        			'no_hp' => $this->input->post('no_hp'),
	        			// Mendirikan Bangunan :
	        			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
	        			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
	        			'kedudukan' => $this->input->post('kedudukan'),
	        			'bentuk_perusahaan' => $this->input->post('bentuk_perusahaan'),
	        			'bidang_usaha' => $this->input->post('bidang_usaha'),
	        			'kegiatan_usaha' => $this->input->post('kegiatan_usaha'),

	        			'jenis_barang_a' => $this->input->post('jenis_barang_a'),
	        			'jenis_barang_b' => $this->input->post('jenis_barang_b'),
	        			'jenis_barang_c' => $this->input->post('jenis_barang_c'),

	        			'modal_usaha' => $this->input->post('modal_usaha'),
	        			'jumlah_tenaga_laki' => $this->input->post('jumlah_tenaga_laki'),
	        			'jumlah_tenaga_perempuan' => $this->input->post('jumlah_tenaga_perempuan'),

	        			'pendidikan_laki_sd' => $this->input->post('pendidikan_laki_sd'),
	        			'pendidikan_laki_sltp' => $this->input->post('pendidikan_laki_sltp'),
	        			'pendidikan_laki_slta' => $this->input->post('pendidikan_laki_slta'),
	        			'pendidikan_laki_d3' => $this->input->post('pendidikan_laki_d3'),
	        			'pendidikan_laki_s1' => $this->input->post('pendidikan_laki_s1'),
	        			'pendidikan_laki_s2' => $this->input->post('pendidikan_laki_s2'),
	        			'pendidikan_laki_s3' => $this->input->post('pendidikan_laki_s3'),
	        			'pendidikan_perempuan_sd' => $this->input->post('pendidikan_perempuan_sd'),
	        			'pendidikan_perempuan_sltp' => $this->input->post('pendidikan_perempuan_sltp'),
	        			'pendidikan_perempuan_slta' => $this->input->post('pendidikan_perempuan_slta'),
	        			'pendidikan_perempuan_d3' => $this->input->post('pendidikan_perempuan_d3'),
	        			'pendidikan_perempuan_s1' => $this->input->post('pendidikan_perempuan_s1'),
	        			'pendidikan_perempuan_s2' => $this->input->post('pendidikan_perempuan_s2'),
	        			'pendidikan_perempuan_s3' => $this->input->post('pendidikan_perempuan_s3'),
	        			//Bagi mereka yang tempat usahanya bukan milik sendiri :
	        			'nama_pemilik_tanah' => $this->input->post('nama_pemilik_tanah'),
	        			'alamat_pemilik_tanah' => $this->input->post('alamat_pemilik_tanah'),
	        			'jangka_waktu' => $this->input->post('jangka_waktu'),
	        			'mulai_tanggal' => $this->input->post('mulai_tanggal'),
	        			'sampai_tanggal' => $this->input->post('sampai_tanggal'),
	        			// singkron
						'jenis_barang_dagang' => array(
						    'a'=> $this->input->post('jenis_barang_a'),
						    'b'=> $this->input->post('jenis_barang_b'),
						    'c'=> $this->input->post('jenis_barang_c'),
						 ),
						'jumlah_pekerja_laki'  => $this->input->post('jumlah_tenaga_laki'),
						'jumlah_pekerja_wanita' => $this->input->post('jumlah_tenaga_perempuan'),
						'pekerja_laki' => array(  
						    'sd' => $this->input->post('pendidikan_laki_sd'),
						    'sltp'=> $this->input->post('pendidikan_laki_sltp'),
						    'slta'=> $this->input->post('pendidikan_laki_slta'),
						    'd3'=> $this->input->post('pendidikan_laki_d3'),
						    's1' => $this->input->post('pendidikan_laki_s1'),
						    's2'=> $this->input->post('pendidikan_laki_s2'),
						    's3'=> $this->input->post('pendidikan_laki_s3'),
						  ),
						  'pekerja_wanita' => array(  
						    'sd' => $this->input->post('pendidikan_perempuan_sd'),
						    'sltp'=> $this->input->post('pendidikan_perempuan_sltp'),
						    'slta'=> $this->input->post('pendidikan_perempuan_slta'),
						    'd3'=> $this->input->post('pendidikan_perempuan_d3'),
						    's1' => $this->input->post('pendidikan_perempuan_s1'),
						    's2'=> $this->input->post('pendidikan_perempuan_s2'),
						    's3'=> $this->input->post('pendidikan_perempuan_s3'),
						  ),
						'alamat_pemilik'=> $this->input->post('alamat_pemilik_tanah'),
						'jangka_tahun'=> $this->input->post('jangka_waktu'),
						'jangka_mulai'=> $this->input->post('mulai_tanggal'),
						'jangka_akhir' => $this->input->post('sampai_tanggal'),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 7,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/siup/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}

        } //else
			    break; // siup
			case 9: // imb    
			    	$data = array(
			'title' => 'Edit Surat Izin Mendirikan Bangunan  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Edit Surat Izin Mendirikan Bangunan',
			'syarat' => 'Surat Izin Mendirikan Bangunan',
			'desa'  => $this->m_elayanan->desa(),
			'edit' => $this->m_elayanan->get_detail($ID),
			);
		// 9 kode surat
		$this->form_validation->set_rules('nik', 'NIK Pemohon', 'trim|required|is_numeric');
		$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'No Telepon/HP', 'trim|required|is_numeric');
		//Sedang / akan melakukan kegiatan Mendirikan Bangunan sebagai berikut :
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');
		$this->form_validation->set_rules('jenis_bangunan', 'Jenis Bangunan', 'trim|required');
		$this->form_validation->set_rules('lokasi_bangunan', 'Lokasi Bangunan', 'trim|required');
		$this->form_validation->set_rules('lt_1_1', 'Panjang bangunan lantai 1 <br>', 'trim|required');
		$this->form_validation->set_rules('lt_1_2', 'Lebar bangunan lantai 1 <br>', 'trim|required');
		$this->form_validation->set_rules('total_1', 'Luas bangunan lantai 1', 'trim|required');
		$this->form_validation->set_rules('gsb', 'Garis Sempadan Bangunan', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/edit/v_imb_edit', $data);
        } else
        {
        	if (isset($_FILES['imb_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['imb_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['imb_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_4'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_4_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_4'))
		     	   	{ 
		      	  		$f4 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_5'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_5_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_5'))
		     	   	{ 
		      	  		$f5 = $this->upload->data();
	       			}	
	        }
	       
	        if (isset($_FILES['imb_6'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_6_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_6'))
		     	   	{ 
		      	  		$f6 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_7'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_7_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_7'))
		     	   	{ 
		      	  		$f7 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_8'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_8_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_8'))
		     	   	{ 
		      	  		$f8 = $this->upload->data();
	       			}	
	        }
	        if (isset($_FILES['imb_9'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_9_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_9'))
		     	   	{ 
		      	  		$f9 = $this->upload->data();
	       			}	
	        }
	         if (isset($_FILES['imb_10'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_imb_10_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/imb/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('imb_10'))
		     	   	{ 
		      	  		$f10 = $this->upload->data();
	       			}	
	        }

	        		$berkas_json = array(
	        			'imb_1' =>  $f1['file_name'],
	        			'imb_2' =>  $f2['file_name'],
	        			'imb_3' =>  $f3['file_name'],
	        			'imb_4' =>  $f4['file_name'],
	        			'imb_5' =>  $f5['file_name'],
	        			'imb_6' =>  $f6['file_name'],
	        			'imb_7' =>  $f7['file_name'],
	        			'imb_8' =>  $f8['file_name'],
	        			'imb_9' =>  $f9['file_name'],
	        			'imb_10'=> $f10['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'imb_1' =>  base_url('assets/berkas/imb/'.$f1['file_name']),
	        			'imb_2' =>  base_url('assets/berkas/imb/'.$f2['file_name']),
	        			'imb_3' =>  base_url('assets/berkas/imb/'.$f3['file_name']),
	        			'imb_4' =>  base_url('assets/berkas/imb/'.$f4['file_name']),
	        			'imb_5' =>  base_url('assets/berkas/imb/'.$f5['file_name']),
	        			'imb_6' =>  base_url('assets/berkas/imb/'.$f6['file_name']),
	        			'imb_7' =>  base_url('assets/berkas/imb/'.$f7['file_name']),
	        			'imb_8' =>  base_url('assets/berkas/imb/'.$f8['file_name']),
	        			'imb_9' =>  base_url('assets/berkas/imb/'.$f9['file_name']),
	        			'imb_10'=>  base_url('assets/berkas/imb/'.$f10['file_name']),
	        			); 
        			$json= array(
	        			//Yang bertanda tangan di bawah ini, menerangkan bahwa :
						'desa'=> $this->input->post('desa'),
						'nama_lengkap'=> $this->input->post('nama_lengkap'),
						'tmp_lahir'=> $this->input->post('tmp_lahir'),
						'tgl_lahir'=> $this->input->post('tgl_lahir'),
						'jns_kelamin'=> $this->input->post('jns_kelamin'),
						'alamat'=> $this->input->post('alamat'),
						'no_hp'=> $this->input->post('no_hp'),
						//Sedang / akan melakukan kegiatan Mendirikan Bangunan sebagai berikut :
						'nama_perusahaan'=> $this->input->post('nama_perusahaan'),
						'alamat_perusahaan'=> $this->input->post('alamat_perusahaan'),
						'jenis_bangunan'=> $this->input->post('jenis_bangunan'),
						'lokasi_bangunan'=> $this->input->post('lokasi_bangunan'),
						'lt_1_1'=> $this->input->post('lt_1_1'),
						'lt_1_2'=> $this->input->post('lt_1_2'),
						'total_1'=> $this->input->post('total_1'),
						'lt_2_1'=> $this->input->post('lt_2_1'),
						'lt_2_2'=> $this->input->post('lt_2_2'),
						'total_2'=> $this->input->post('total_2'),
						'lt_3_1'=> $this->input->post('lt_3_1'),
						'lt_3_2'=> $this->input->post('lt_3_2'),
						'total_3'=> $this->input->post('total_3'),

						'gsb'=> $this->input->post('gsb'),
						//  Bagi mereka yang tempat usahanya bukan milik sendiri
						'nama_pemilik_tanah'=> $this->input->post('nama_pemilik_tanah'),
						'alamat_pemilik_tanah'=> $this->input->post('alamat_pemilik_tanah'),
						'jangka_waktu'=> $this->input->post('jangka_waktu'),
						'mulai_tanggal'=> $this->input->post('mulai_tanggal'),
						'sampai_tanggal'=> $this->input->post('sampai_tanggal'),

						'luas_bangunan' => array(  
						    [
						     $this->input->post('lt_1_1'),
						     $this->input->post('lt_1_2'),
						     $this->input->post('total_1')
						    ],
						    [
						     $this->input->post('lt_2_1'),
						     $this->input->post('lt_2_2'),
						     $this->input->post('total_2')
						    ],
						    [
						     $this->input->post('lt_3_1'),
						     $this->input->post('lt_3_2'),
						     $this->input->post('total_3')
						    ]
						   ),
						'alamat_pemilik'=> $this->input->post('alamat_pemilik_tanah'),
						'jangka_tahun'=> $this->input->post('jangka_waktu'),
						'jangka_mulai'=> $this->input->post('mulai_tanggal'),
						'jangka_akhir'=> $this->input->post('sampai_tanggal'),
	        			);
        			
	        		
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 9,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/imb/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}
		        	
        		}
			    
			    	
			    break; // imb
			    case 11: // srig
			    	$data = array(
			'title' => ' Edit Surat Rekomendasi Izin Gangguan  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Edit Surat Rekomendasi Izin Gangguan',
			'syarat' => 'Surat Rekomendasi Izin Gangguan',
			'desa'  => $this->m_elayanan->desa(),
			'agama' => $this->agama->get_all_agama(),
			'edit' => $this->m_elayanan->get_detail($ID),
			);

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('desa', 'Desa','trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap','trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir','trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan','trim|required');
        $this->form_validation->set_rules('alamat_pemohon', 'Alamat Pemohon','trim|required');
        $this->form_validation->set_rules('nama_toko', 'Nama Perusahaan','trim|required');
        $this->form_validation->set_rules('alamat_usaha', 'Alamat Tempat Usaha','trim|required');
        $this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan','trim|required');
        $this->form_validation->set_rules('jenis_bangunan', 'Jenis Bangunan','trim|required');
        $this->form_validation->set_rules('lokasi_bangunan', 'Lokasi Bangunan','trim|required');
        $this->form_validation->set_rules('no_surat', ' Nomor Surat','trim|required');
        $this->form_validation->set_rules('tgl_surat', ' Tanggal Surat','trim|required');
        $this->form_validation->set_rules('nama_lurah', 'Nama Lurah/ Kades','trim|required');
        $this->form_validation->set_rules('jabatan_lurah', 'Jabatan Lurah/ Kades','trim|required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/edit/v_srig_edit', $data);
        } 
        else
        {
        	if (isset($_FILES['srig_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_1'))
		           { 
		           	$f1 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '22880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_2'))
		           { 
		           	$f2 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '32880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_3'))
		           { 
		           	$f3 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_4'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_4_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '42880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_4'))
		           { 
		           	$f4 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_5'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_5_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '52880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_5'))
		           { 
		           	$f5 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_6'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_6_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '62880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_6'))
		           { 
		           	$f6 = $this->upload->data();
	        	 	}	
	        }
	        if (isset($_FILES['srig_7'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_srig_7_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/srig/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '72880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('srig_7'))
		           { 
		           	$f7 = $this->upload->data();
	        	 	}	
	        }

	       			$json= array(
	        			'desa' => $this->input->post('desa'),
	        			'nama_lengkap' => $this->input->post('nama_lengkap'),
	        			'tmp_lahir' => $this->input->post('tmp_lahir'),
	        			'tgl_lahir' => $this->input->post('tgl_lahir'),
	        			'jns_kelamin' => $this->input->post('jns_kelamin'),  
	        			'agama' => $this->input->post('agama'),  
	        			'pekerjaan' => $this->input->post('pekerjaan'),  
	        			'alamat_pemohon' => $this->input->post('alamat_pemohon'),   
	        			'nama_toko' => $this->input->post('nama_toko'),
	        			'alamat_usaha' => $this->input->post('alamat_usaha'),  
	        			'jenis_kegiatan' => $this->input->post('jenis_kegiatan'), 
	        			'jenis_bangunan' => $this->input->post('jenis_bangunan'),  
	        			'lokasi_bangunan' => $this->input->post('lokasi_bangunan'),

	        			'no_surat'=> $this->input->post('no_surat'),
				        'tgl_surat'=> $this->input->post('tgl_surat'),
				        'nama_lurah'=> $this->input->post('nama_lurah'),
				        'jabatan_lurah'=> $this->input->post('jabatan_lurah'),

						'no_surat_rek' => $this->input->post('no_surat'),
						'tgl_surat_rek'=> $this->input->post('tgl_surat'),
						'ttd_desa' => $this->input->post('desa'),
						'jabatan_desa' => $this->input->post('jabatan_lurah'),
						'nama'=> $this->input->post('nama_toko'),
						'alamat' => $this->input->post('alamat_usaha'),  
						
	        			);
	        		$berkas_json = array(
	        			'srig_1' =>  $f1['file_name'],
	        			'srig_2' =>  $f2['file_name'],
	        			'srig_3' =>  $f3['file_name'],
	        			'srig_4' =>  $f4['file_name'],
	        			'srig_5' =>  $f5['file_name'],
	        			'srig_6' =>  $f6['file_name'],
	        			'srig_7' =>  $f7['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'srig_1' =>  base_url('assets/berkas/srig/'.$f1['file_name']),
	        			'srig_2' =>  base_url('assets/berkas/srig/'.$f2['file_name']),
	        			'srig_3' =>  base_url('assets/berkas/srig/'.$f3['file_name']),
	        			'srig_4' =>  base_url('assets/berkas/srig/'.$f4['file_name']),
	        			'srig_5' =>  base_url('assets/berkas/srig/'.$f5['file_name']),
	        			'srig_6' =>  base_url('assets/berkas/srig/'.$f6['file_name']),
	        			'srig_7' =>  base_url('assets/berkas/srig/'.$f7['file_name']),
	        			);

		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 11,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),

		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/srig/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}

        		} //else	
			    break; // srig
			    case 13: // rpio
			    	$data = array(
			'title' => ' Edit Surat Rekomendasi Perpanjangan Izin Operasional  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Edit Surat Rekomendasi Perpanjangan Izin Operasional',
			'syarat' => 'Surat Rekomendasi Perpanjangan Izin Operasional',
			'desa'  => $this->m_elayanan->desa(),
			'agama' => $this->agama->get_all_agama(),
			'edit' => $this->m_elayanan->get_detail($ID),
			);
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
			$this->form_validation->set_rules('nama_lembaga', 'Nama Lembaga', 'trim|required');
	        $this->form_validation->set_rules('nama_pengelola', 'Nama Pengelola','trim|required');
	        $this->form_validation->set_rules('alamat', 'Alamat','trim|required');
	        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat','trim|required');
	        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat','trim|required');
	        if ($this->form_validation->run() == FALSE)
	        {
	          $this->template->view('main/pelayanan/edit/v_srpio_edit', $data);
	        } 
	        else
	        {
        	if (isset($_FILES['rpio_1'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_1_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_1'))
		        { 
		           	$f1 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpio_2'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_2_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_2'))
		        { 
		           	$f2 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpio_3'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_3_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_3'))
		        { 
		           	$f3 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpio_4'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_4_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_4'))
		        { 
		           	$f4 = $this->upload->data();
	        	}
        	}
        	if (isset($_FILES['rpio_5'])) 
	        {
	        	$create_tgl = date('Y-m-d H:i:s'); 
		        $this->load->library('upload');
		        $nmfile = 'syarat_rpio_5_'.date('YmdHis'); 
		        $config['upload_path'] = './assets/berkas/rpio/';
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		        $config['max_size'] = '40480';
		        $config['max_width']  = '12880';
		        $config['max_height']  = '7680';
		        $config['file_name'] = $nmfile; 
	        	$this->upload->initialize($config);
	        	if ($this->upload->do_upload('rpio_5'))
		        { 
		           	$f5 = $this->upload->data();
	        	}
        		}

        			$json= array(
	        			'nama_lembaga' => $this->input->post('nama_lembaga'),
	        			'nama_pengelola' => $this->input->post('nama_pengelola'),
	        			'alamat' => $this->input->post('alamat'),
	        			'nomor_surat'=> $this->input->post('nomor_surat'),
        				'tanggal_surat'=> $this->input->post('tanggal_surat'),
						
						'no_surat_rek'=> $this->input->post('nomor_surat'),
						'tgl_surat_rek'=> $this->input->post('tanggal_surat'),
						'alamat_lembaga' => $this->input->post('alamat'),
						
	        			);
	        		$berkas_json = array(
	        			'rpio_1' =>  $f1['file_name'],
	        			'rpio_2' =>  $f2['file_name'],
	        			'rpio_3' =>  $f3['file_name'],
	        			'rpio_4' =>  $f4['file_name'],
	        			'rpio_5' =>  $f5['file_name'],
	        			);
	        		$berkas_json_link = array(
	        			'rpio_1' =>  base_url('assets/berkas/rpio/'.$f1['file_name']),
	        			'rpio_2' =>  base_url('assets/berkas/rpio/'.$f2['file_name']),
	        			'rpio_3' =>  base_url('assets/berkas/rpio/'.$f3['file_name']),
	        			'rpio_4' =>  base_url('assets/berkas/rpio/'.$f4['file_name']),
	        			'rpio_5' =>  base_url('assets/berkas/rpio/'.$f5['file_name']),
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 13,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/rpio/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}
		        	
	        	} //else

			    break; // rpio

			    case 16: //sp3fat
			    	$data = array(

			'title' => 'Edit Surat Pernyataan Pengakuan Penguasaan Fisik Atas Tanah  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Edit Surat Pernyataan Pengakuan Penguasaan Fisik Atas Tanah',
			'syarat' => ' Surat Pernyataan Pengakuan Penguasaan Fisik Atas Tanah',
			'desa'  => $this->m_elayanan->desa(),
			'agama'  => $this->m_elayanan->agama(),
			'edit' => $this->m_elayanan->get_detail($ID),
			);
			$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
			$this->form_validation->set_rules('no_surat_kuasa', 'Nomor Surat', 'trim|required');
			$this->form_validation->set_rules('tgl_surat_kuasa', 'Tanggal Surat', 'trim|required');
			$this->form_validation->set_rules('tgl_diketahui', 'Tanggal Diketahui', 'trim|required');

			$this->form_validation->set_rules('letak_tanah', 'Letak Tanah', 'trim|required');
			$this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'trim|required');

			$this->form_validation->set_rules('batas_utara_ket', 'Keterangan Batas Utara', 'trim|required');
			$this->form_validation->set_rules('batas_utara_val', 'Nilai Batas Utara', 'trim|required|is_numeric');
			$this->form_validation->set_rules('batas_timur_ket', 'Keterangan Batas Timur', 'trim|required');
			$this->form_validation->set_rules('batas_timur_val', 'Nilai Batas Timur', 'trim|required|is_numeric');
			$this->form_validation->set_rules('batas_selatan_ket', 'Keterangan Batas Selatan', 'trim|required');
			$this->form_validation->set_rules('batas_selatan_val', 'Nilai Batas Selatan', 'trim|required|is_numeric');
			$this->form_validation->set_rules('batas_barat_ket', 'Keterangan Batas Barat', 'trim|required');
			$this->form_validation->set_rules('batas_barat_val', 'Nilai Batas Barat', 'trim|required|is_numeric');

			$this->form_validation->set_rules('tahun_kuasa', 'Tahun Kuasa', 'trim|required|is_numeric');

			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	        if ($this->form_validation->run() == FALSE)
	        {
	          $this->template->view('main/pelayanan/edit/v_sp3fat_edit', $data);
	        } 
	        else
	        {
        	if (isset($_FILES['sp3fat_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_sp3fat_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/sp3fat/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('sp3fat_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['sp3fat_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_sp3fat_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/sp3fat/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('sp3fat_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }
	       		 	$berkas_json = array(
	        			'sp3fat_1' =>  $f1['file_name'],
	        			'sp3fat_2' =>  $f2['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'sp3fat_1' =>  base_url('assets/berkas/sp3fat/'.$f1['file_name']) ,
	        			'sp3fat_2' =>  base_url('assets/berkas/sp3fat/'.$f2['file_name']) ,
	        			); 
        			$json= array(
	    			'desa'=> $this->input->post('desa'),
					'no_surat_kuasa'=> $this->input->post('no_surat_kuasa'),
					'tgl_surat_kuasa'=> $this->input->post('tgl_surat_kuasa'),
					'tgl_diketahui'=> $this->input->post('tgl_diketahui'),
					'letak_tanah'=> $this->input->post('letak_tanah'),
					'luas_tanah'=> $this->input->post('luas_tanah'),
					'batas_utara_ket'=> $this->input->post('batas_utara_ket'),
					'batas_utara_val'=> $this->input->post('batas_utara_val'),
					'batas_timur_ket'=> $this->input->post('batas_timur_ket'),
					'batas_timur_val'=> $this->input->post('batas_timur_val'),
					'batas_selatan_ket'=> $this->input->post('batas_selatan_ket'),
					'batas_selatan_val'=> $this->input->post('batas_selatan_val'),
					'batas_barat_ket'=> $this->input->post('batas_barat_ket'),
					'batas_barat_val'=> $this->input->post('batas_barat_val'),
					'tahun_kuasa'=> $this->input->post('tahun_kuasa'),
					'nik' => $this->input->post('nik'),
					'nama_lengkap'=> $this->input->post('nama_lengkap'),
					'tmp_lahir'=> $this->input->post('tmp_lahir'),
					'tgl_lahir'=> $this->input->post('tgl_lahir'),
					'jns_kelamin'=> $this->input->post('jns_kelamin'),
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'alamat'=> $this->input->post('alamat'),
					'agama'=> $this->input->post('agama'),
					  'bts_utara' => array(
					    'ket' => $this->input->post('batas_utara_ket'),
					    'nama'=> $this->input->post('batas_utara_val')
					  ),
					  'bts_timur'=> array(
					    'ket' => $this->input->post('batas_timur_ket'),
					    'nama'=> $this->input->post('batas_timur_val')
					  ),
					  'bts_selatan' => array(
					    'ket' => $this->input->post('batas_selatan_ket'),
					    'nama'=> $this->input->post('batas_selatan_val')
					  ),
					  'bts_barat' => array(
					    'ket' => $this->input->post('batas_barat_ket'),
					    'nama'=> $this->input->post('batas_barat_val')
					  )		
	        		);
	        		
        			$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 16,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/sp3fat/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}
				}
			    break;  //sp3fat

			    case 17: //sp4fat
			    	$data = array(

			'title' => 'Edit Surat Pernyataan Pelepasan dan Penyerahan Penguasaan Fisik Atas Tanah - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Edit Surat Pernyataan Pelepasan dan Penyerahan Penguasaan Fisik Atas Tanah',
			'syarat' => ' Surat Pernyataan Pelepasan dan Penyerahan Penguasaan Fisik Atas Tanah',
			'desa'  => $this->m_elayanan->desa(),
			'agama'  => $this->m_elayanan->agama(),
			'edit' => $this->m_elayanan->get_detail($ID),
			);
			$this->form_validation->set_rules('desa', 'Desa', 'trim|required');
			$this->form_validation->set_rules('no_surat_kuasa', 'Nomor Surat', 'trim|required');
			$this->form_validation->set_rules('tgl_surat_kuasa', 'Tanggal Surat', 'trim|required');
			$this->form_validation->set_rules('tgl_diketahui', 'Tanggal Diketahui', 'trim|required');

			$this->form_validation->set_rules('letak_tanah', 'Letak Tanah', 'trim|required');
			$this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'trim|required');

			$this->form_validation->set_rules('batas_utara_ket', 'Keterangan Batas Utara', 'trim|required');
			$this->form_validation->set_rules('batas_utara_val', 'Nilai Batas Utara', 'trim|required|is_numeric');
			$this->form_validation->set_rules('batas_timur_ket', 'Keterangan Batas Timur', 'trim|required');
			$this->form_validation->set_rules('batas_timur_val', 'Nilai Batas Timur', 'trim|required|is_numeric');
			$this->form_validation->set_rules('batas_selatan_ket', 'Keterangan Batas Selatan', 'trim|required');
			$this->form_validation->set_rules('batas_selatan_val', 'Nilai Batas Selatan', 'trim|required|is_numeric');
			$this->form_validation->set_rules('batas_barat_ket', 'Keterangan Batas Barat', 'trim|required');
			$this->form_validation->set_rules('batas_barat_val', 'Nilai Batas Barat', 'trim|required|is_numeric');

			$this->form_validation->set_rules('tahun_kuasa', 'Tahun Kuasa', 'trim|required|is_numeric');

			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	        if ($this->form_validation->run() == FALSE)
	        {
	          $this->template->view('main/pelayanan/edit/v_sp4fat_edit', $data);
	        } 
	        else
	        {
        	if (isset($_FILES['sp4fat_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_sp4fat_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/sp4fat/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('sp4fat_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['sp4fat_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_sp4fat_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/sp4fat/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('sp4fat_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }
	       		 	$berkas_json = array(
	        			'sp4fat_1' =>  $f1['file_name'],
	        			'sp4fat_2' =>  $f2['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'sp4fat_1' =>  base_url('assets/berkas/sp4fat/'.$f1['file_name']) ,
	        			'sp4fat_2' =>  base_url('assets/berkas/sp4fat/'.$f2['file_name']) ,
	        			); 
        			$json= array(
	    			'desa'=> $this->input->post('desa'),
					'no_surat_kuasa'=> $this->input->post('no_surat_kuasa'),
					'tgl_surat_kuasa'=> $this->input->post('tgl_surat_kuasa'),
					'tgl_diketahui'=> $this->input->post('tgl_diketahui'),
					'letak_tanah'=> $this->input->post('letak_tanah'),
					'luas_tanah'=> $this->input->post('luas_tanah'),
					'batas_utara_ket'=> $this->input->post('batas_utara_ket'),
					'batas_utara_val'=> $this->input->post('batas_utara_val'),
					'batas_timur_ket'=> $this->input->post('batas_timur_ket'),
					'batas_timur_val'=> $this->input->post('batas_timur_val'),
					'batas_selatan_ket'=> $this->input->post('batas_selatan_ket'),
					'batas_selatan_val'=> $this->input->post('batas_selatan_val'),
					'batas_barat_ket'=> $this->input->post('batas_barat_ket'),
					'batas_barat_val'=> $this->input->post('batas_barat_val'),
					'tahun_kuasa'=> $this->input->post('tahun_kuasa'),
					'nik' => $this->input->post('nik'),
					'nama_lengkap'=> $this->input->post('nama_lengkap'),
					'tmp_lahir'=> $this->input->post('tmp_lahir'),
					'tgl_lahir'=> $this->input->post('tgl_lahir'),
					'jns_kelamin'=> $this->input->post('jns_kelamin'),
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'alamat'=> $this->input->post('alamat'),
					'agama'=> $this->input->post('agama'),
					  'bts_utara' => array(
					    'ket' => $this->input->post('batas_utara_ket'),
					    'nama'=> $this->input->post('batas_utara_val')
					  ),
					  'bts_timur'=> array(
					    'ket' => $this->input->post('batas_timur_ket'),
					    'nama'=> $this->input->post('batas_timur_val')
					  ),
					  'bts_selatan' => array(
					    'ket' => $this->input->post('batas_selatan_ket'),
					    'nama'=> $this->input->post('batas_selatan_val')
					  ),
					  'bts_barat' => array(
					    'ket' => $this->input->post('batas_barat_ket'),
					    'nama'=> $this->input->post('batas_barat_val')
					  )		
	        		);
	        		
        			$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 17,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/sp4fat/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}
				}
			    break;  //sp4fat

			    case 4:
			    	$data = array(
			'title' => 'Edit Surat Keterangan Pindah WNI  - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
			'crumb' => 'Edit Surat Keterangan Pindah WNI ',
			'syarat' => 'Surat Keterangan Pindah WNI ',
			'desa'  => $this->m_elayanan->desa(),
			'agama'  => $this->m_elayanan->agama(),
			'edit' => $this->m_elayanan->get_detail($ID),
			);

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_numeric');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('shdk', 'Status Hubungan dalam Keluarga', 'trim|required');
		//keterangan pindah
		$this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'trim|required');
		// tujuan pindah
		$this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		//singkron tambahan
		$this->form_validation->set_rules('alamat_pindah', 'Alamat Pindah', 'trim|required');
		$this->form_validation->set_rules('klasifikasi_pindah', 'Klasifikasi Pindah', 'trim|required');
		$this->form_validation->set_rules('jns_kepindahan', 'Jenis Kepindahan', 'trim|required');
		$this->form_validation->set_rules('status_kk_tdk_pindah', 'Status KK bagi yang tidak pindah', 'trim|required');
		$this->form_validation->set_rules('status_kk_pindah', 'Status KK bagi yang pindah', 'trim|required');


        if ($this->form_validation->run() == FALSE)
        {
          $this->template->view('main/pelayanan/edit/v_kpw_edit', $data);
        }else{
        	if (isset($_FILES['kpw_1'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpw_1_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpw_1'))
		     	   	{ 
		      	  		$f1 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kpw_2'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpw_2_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpw_2'))
		     	   	{ 
		      	  		$f2 = $this->upload->data();
	       			}	
	        }	
	        if (isset($_FILES['kpw_3'])) 
	        {
	      		$create_tgl = date('Y-m-d H:i:s'); 
		     	$this->load->library('upload');
		     	$nmfile = 'syarat_kpw_3_'.date('YmdHis'); 
		     	$config['upload_path'] = './assets/berkas/kpw/';
		     	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; 
		     	$config['max_size'] = '40480';
		     	$config['max_width']  = '12880';
		     	$config['max_height']  = '7680';
		     	$config['file_name'] = $nmfile; 

	      		$this->upload->initialize($config);
	      		if ($this->upload->do_upload('kpw_3'))
		     	   	{ 
		      	  		$f3 = $this->upload->data();
	       			}	
	        }
	    
	        		$berkas_json = array(
	        			'kpw_1' =>  $f1['file_name'],
	        			'kpw_2' =>  $f2['file_name'],
	        			'kpw_3' =>  $f3['file_name'],
	        			); 
	        		$berkas_json_link = array(
	        			'kpw_1' =>  base_url('assets/berkas/kpw/'.$f1['file_name']) ,
	        			'kpw_2' =>  base_url('assets/berkas/kpw/'.$f2['file_name']) ,
	        			'kpw_3' =>  base_url('assets/berkas/kpw/'.$f3['file_name']) ,
	        			); 

        			$json= array(
	    			'nama_lengkap'=> $this->input->post('nama_lengkap'),
					'tmp_lahir'=> $this->input->post('tmp_lahir'),
					'tgl_lahir'=> $this->input->post('tgl_lahir'),
					'jns_kelamin'=> $this->input->post('jns_kelamin'),
					'kewarganegaraan'=> $this->input->post('kewarganegaraan'),
					'status_perkawinan'=> $this->input->post('status_perkawinan'),
					'agama'=> $this->input->post('agama'),
					'alamat'=> $this->input->post('alamat'),
					'pekerjaan'=> $this->input->post('pekerjaan'),
					'shdk'=> $this->input->post('shdk'),
					//keterangan pindah
					'alasan_pindah'=> $this->input->post('alasan_pindah'),
					// tujuan pindah
					'desa_kelurahan'=> $this->input->post('desa_kelurahan'),
					'kecamatan'=> $this->input->post('kecamatan'),
					'kabupaten'=> $this->input->post('kabupaten'),
					'provinsi'=> $this->input->post('provinsi'),

					'desa'=> $this->input->post('desa_kelurahan'),
					'alamat_pindah'=> $this->input->post('alamat_pindah'),
					'klasifikasi_pindah'=> $this->input->post('klasifikasi_pindah'),
					'jns_kepindahan'=> $this->input->post('jns_kepindahan'),
					'status_kk_tdk_pindah'=> $this->input->post('status_kk_tdk_pindah'),
					'status_kk_pindah'=> $this->input->post('status_kk_pindah'),
					'pengikut'=> 0,
					
	        			);
		        	$_session['waktu'] = date('Y-m-d H:i:s');
		        	$data = array(
		        		'nik' => $this->input->post('nik'),
		        		'isi_surat' => json_encode($json),
		        		'kode_surat' => 4,
		        		'ID_users' => $this->session->userdata('akun_id'),
		        		'waktu_mulai' => $_session['waktu'],
		        		'status' => 'no',
		        		'berkas_syarat' => json_encode($berkas_json),
		        		'berkas_syarat_link' => json_encode($berkas_json_link),
		        		);
		        	$query = $this->db->get_where('surat', array('ID' => $ID ));
            		$rowp = $query->row(); 
             		$d_berkas  = json_decode($rowp->berkas_syarat);
             		$number = 1; 
             		foreach ($d_berkas as $key) {
             			@unlink('assets/berkas/kpw/'.$key); 
             		}
             		$updata = $this->m_elayanan->ubah_surat($data,$ID);
             		if ($updata == TRUE) {
		        		$this->template->alert(
		                'Surat Berhasil Di Ubah !', 
		                array('type' => 'success','icon' => 'check'));
		           		redirect('epelayanan/detail/'.$ID);
		            return;
					}
        }//else	
			    break;

			    default:	
			        echo "<h1 style='font-size:5em; color:red;'> Ingat Tuhan Bro.</h1>";
			    break;
			}
        }
        elseif($rowcek->kode_surat == TRUE AND $rowcek->status == 'yes'){
        	$this->template->alert(
                'Maaf pelayanan anda telah terverifikasi, anda tidak bisa mengedit pelayanan surat ini !', 
                array('type' => 'warning','icon' => 'close'));
                redirect('epelayanan/histori/'); 
        }
         elseif($rowcek->ID_users == 0){
        	$this->template->alert(
                'Maaf, terjadi kesalahan !', 
                array('type' => 'warning','icon' => 'close'));
                redirect('epelayanan/histori/'); 
        }
        else {
        	show_404();
        }
	}

	public function detail($ID=0){
        if(!$ID)
          show_404();

        $data = array(
            'title' => 'Detail Permohonan Pelayanan - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
            'crumb' => 'Detail Permohonan',
            'detail_layanan' => $this->m_elayanan->get_detail($ID),
            );
        $this->template->view('main/pelayanan/v_detail', $data);
   }

   public function upload(){
   		$this->load->view('upload');
   }


    public function hapus($ID = 0)   {
     if(!$ID)
          show_404();
    
         $array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
         $this->db->where($array);
         $query = $this->db->get('surat');
         $row = $query->row();
         if ($row->ID == NULL) {
            $this->template->alert(
                'Pesan yang anda cari tidak ditemukan !', 
                array('type' => 'warning','icon' => 'close'));
                redirect('epelayanan/histori/');
         } else {
             
         if ($row->status == 'no') {
            $this->m_elayanan->hapus($ID);
            $this->template->alert(
                'Pesan berhasil dihapus !', 
                array('type' => 'success','icon' => 'check'));
            redirect('epelayanan/histori/'); //jika gagal maka akan ditampilkan 
         } else {
            $this->template->alert(
                'Pesan Anda Tidak bisa dihapus, karena sudah terverifikasi !', 
                array('type' => 'danger','icon' => 'close'));
                redirect('epelayanan/histori/'); //jika gagal maka akan ditampilkan 
         }}    
   }    

   public function see($ID = 0)   {
     if(!$ID)
          show_404();
         $array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
         $this->db->where($array);
         $query = $this->db->get('surat');
         $row = $query->row();
          if ($row->status_pesan == 'read') {
            redirect('epelayanan/histori/'); 
          }
          else {
            $this->m_elayanan->up_status_pengaduan($ID);
            redirect('epelayanan/histori/'); 
          }
  }

  public function panduan()
  {
            $data = array(
            'title' => 'Panduan Pelayanan - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
            'crumb' => 'Panduan Pelayanan',
            'panduan' => $this->m_elayanan->get_panduan(), 
            );
           $this->template->view('main/pelayanan/panduan/panduan_v',$data);
      
  }

   public function read($slug = '')
  {
             if(!$slug)
                show_404();
             $array = array('slug' => $slug);
             $this->db->where($array);
             $query = $this->db->get('panduan_pelayanan');
             $data = array(
                'title' => 'Detail Panduan Pelayanan - PAKISS Simpang Katis Informations And Services  - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
                'crumb' => 'Detail Panduan Pelayanan',
                'panduan' => $this->m_elayanan->get_panduan_read($slug), 
            );
             $this->template->view('main/pelayanan/panduan/panduan_read_v',$data);
      
  }


}

/* End of file Epelayanan.php */
/* Location: ./application/controllers/Epelayanan.php */