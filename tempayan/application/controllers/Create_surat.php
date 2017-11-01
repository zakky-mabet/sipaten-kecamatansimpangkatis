<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_surat extends Sipaten 
{
	public $now_date;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Surat Keterangan', "create_surat/index/{$this->uri->segment(3)}");

		$this->load->model('mcreate_surat', 'create_surat');

		$this->load->library(array('cart','firebase_push'));

		$this->now_date = date('Y-m-d');

		if($this->uri->segment(2) == FALSE)
			show_404();

		$this->load->js(base_url('public/app/tour/create-surat.js'));
	}

	public function index($param = 0)
	{
		if($this->create_surat->surat_category($param, 'non perizinan') == FALSE)
			show_404();

		$this->load->js(base_url("public/app/requirment_surat.js"));

		$surat = $this->create_surat->surat_category($param, 'non perizinan');

		$this->page_title->push('Surat', $surat->nama_kategori);

		$this->breadcrumbs->unshift(2, $surat->nama_kategori, "create_surat/index/{$param}");

		$this->data = array(
			'title' => $surat->nama_kategori, 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pegawai' => $this->create_surat->pegawai(),
			'syarat' => $this->create_surat->get_syarat($surat->syarat),
			'get' => $surat,
			'pemeriksa' => $this->create_surat->pemeriksa(),
		);

		$this->template->view('create-surat/insert-requerment', $this->data);
	}

	/**
	 * Menghapus Log Syarat Pengajuan Surat
	 * Menjadi log_surat 
	 *
	 * @return string
	 **/
	public function delete_history($param = '', $category = 0)
	{
		$this->create_surat->delete_history($param, $category);

		redirect("create_surat/index/{$category}");
	}

	/**
	 * Menghapus Syarat pada checkbox Pengajuan Surat 
	 *
	 * @param Integer (id_syarat)
	 * @return string
	 **/
	public function delete_syarat($param = 0)
	{
		$this->create_surat->delete_syarat($param);
	}	

	/**
	 * Check Log Surat 
	 * Apakah sudah pernah buat sebelumnya
	 *
	 * @param Integer (nik) penduduk
	 * @return string
	 **/
	public function insert_log_surat()
	{
		if(is_array($this->input->post('syarat')))
		{
			foreach($this->input->post('syarat') as $key => $value)
			{
				if($this->create_surat->log_surat_check_syarat($this->input->post('nik'), $this->input->post('kategori-surat'), $value))
				{
					continue;
				} else {
					$log_surat = array(
						'nik' => $this->input->post('nik'),
						'tanggal' => date('Y-m-d'),
						'kategori' => $this->input->post('kategori-surat'),
						'syarat' => $value,
						'nomor_surat' => 0
					);

					$this->db->insert('log_surat', $log_surat);
				}
			}

			if($this->create_surat->valid_requirement_check($this->input->post('nik'), $this->input->post('kategori-surat')) )
			{
				$this->data = array(
					'status' => true
				);
			} else {
				$this->data = array(
					'status' => false
				);
			}

			$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
		}
	}

	public function create($param = 0, $ID = 0)
	{
		if($this->create_surat->surat_category($param) == FALSE)
			show_404();

		$this->load->js(base_url("public/app/isi_surat.js"));

		$penduduk = $this->create_surat->get_penduduk($ID);

		/* Apabila syarat kosong */
		if( $this->create_surat->valid_requirement_check($penduduk->nik, $param) == FALSE)
			show_404();

		$this->create_surat->create_surat($penduduk->nik, $param);

		$surat = $this->create_surat->surat_category($param);

		$this->page_title->push('Surat Keterangan', $surat->nama_kategori);

		$this->breadcrumbs->unshift(2, $surat->nama_kategori, "create_surat/create/{$param}");

		/* Get Validation Rules from parent controller */
		parent::get_surat_validation($surat->slug);

		if($this->form_validation->run() == TRUE)
		{
			$IDSuratBaru = $this->create_surat->update_surat($penduduk->nik, $param);

			parent::create_surat_notification(base_url('surat_keluar'), $this->input->post('pemeriksa'));

			/* KIRIM Notifikasi ke android */
			$this->firebase_push->setTitle("Pengajuan Surat Baru!")
								->setMessage("Anda memiliki 1 dokumen dari ".$this->session->userdata('account')->name." untuk diperiksa.")
								->setID($IDSuratBaru)
								->setTo($this->option->get_firebase_token($this->input->post('pemeriksa')))
								->send();

			$this->cart->destroy();
			
			$this->db->join('pegawai', 'users.nip = pegawai.nip');
			$pm = $this->db->get_where('users', array('pegawai.ID' => $this->input->post('pemeriksa')))->row();
			
            $this->load->library('email');
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';

            $this->email->initialize($config);
                   
            $this->email->from('kiss@kecamatankoba.net', 'Tempayan');
            $this->email->to($pm->email);
            $this->email->subject('[TEMPAYAN] Pengajuan Surat Baru');
            $this->email->message( 
                $this->template->mail_surat(array(
                    'nama' => $pm->name 
                    )
                )
            );
                   
            $this->email->send(); 

			redirect("create_surat/index/{$param}");
		} 

		$this->data = array(
			'title' => $surat->nama_kategori, 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pegawai' => $this->create_surat->pegawai(),
			'syarat' => $this->create_surat->get_syarat($surat->syarat),
			'penduduk' => $penduduk,
			'surat' => $surat,
			'pemeriksa' => $this->create_surat->pemeriksa(),
		);

		$this->template->view("create-surat/form/{$surat->slug}", $this->data);
	}


	/**
	 * Insert To Session Data Pengikut
	 *
	 * @param Integer (ID) key from penduduk
	 * @return Booalean
	 **/
	public function add_pengikut()
	{
		$data = array(
			'qty'     => 1,
			'price' => 10,
			'id'      => $this->input->post('id'),
			'name'    => $this->input->post('nama'),
			'jns_kelamin' => $this->input->post('jns_kelamin'),
			'tmp_tgl_lahir' => $this->input->post('tmp_tgl_lahir'),
			'nik' => $this->input->post('nik'), 
			'status' => $this->input->post('status')
		);
		
		$this->cart->insert($data);
	}

	/**
	 * Remove Data Pengikut
	 *
	 * @param String (key) cart item
	 * @return string
	 **/
	public function remove_pengikut($param = '')
	{
		$this->cart->remove($param);
	}

	/**
	 * Get Cart Data Pengikut
	 *
	 * @var string
	 **/
	public function get_pengikut()
	{
		$pengikut = array('data' => array());

		if($this->cart->contents() != FALSE)
		{
			$key_index = 0;
			foreach($this->cart->contents() as $key => $value)
			{
				$pengikut['data'][] = array(
					"<a data-id='{$key}' class='text-red show-pengikut' data-toggle='tooltip' data-placement='top' title='Hapus'><i class='fa fa-trash-o'></i></a><input type='hidden' name='isi[pengikut][{$key_index}][id]' value='{$value['id']}'><input type='hidden' name='isi[pengikut][{$key_index}][status_hubungan]' value='{$value['status']}'>",
					$value['nik'],
					$value['name'],
					$value['jns_kelamin'],
					$value['tmp_tgl_lahir'],
					strtoupper($value['status'])
				);

				$key_index++;
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($pengikut, JSON_PRETTY_PRINT));
	}
}

/* End of file Creat_surat.php */
/* Location: ./application/controllers/Creat_surat.php */