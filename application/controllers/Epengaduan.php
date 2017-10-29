<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package Controller universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class Epengaduan extends CI_Controller {
	public function __construct( )
    {
        parent::__construct();
        if ( ! $this->session->userdata('user_login') ) :
            $this->template->alert(
                'Silahkan Login untuk mengakses Epengaduan.', 
                array('type' => 'danger','icon' => 'close'));
            redirect('login');
            return;
        endif;
        $this->load->library(array('form_validation','template','user_agent','upload'));
        $this->load->model('m_epengaduan');
        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $data = array(
            'title' => 'E-pengaduan - SIMKIS Simpangkatis District Information And Service Center - Kecamatan Simpangkatis - Kabupaten Bangka Tengah',
            'crumb' => 'E-pengaduan'  
            );
        $this->template->view('pengaduan/v_pengaduan', $data);
    }
    public function create()
    {
        $data = array(
            'title' => 'Buat Pengaduan - Epengaduan - SIMKIS Simpangkatis District Information And Service Center - Kecamatan Simpangkatis - Kabupaten Bangka Tengah',
            'crumb' => 'Buat Pengaduan'  
            );
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('pesan', 'Deskripi', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('lokasi', 'Alamat Lokasi','trim|required|min_length[10]');
        if ($this->form_validation->run() == FALSE)
        {
           $this->template->view('pengaduan/v_buat_pengaduan',$data);
        } 

        else
        { 
        
        $thn = date('Y');
        $bln = date('m');
        $create_tgl = date('Y-m-d H:i:s'); 
        $this->load->library('upload');
        $this->db->select('*');
        $query = $this->db->get_where('tb_users', array('ID' =>$this->session->userdata('akun_id')));
        $row = $query->row();
        $nmfile = "pengaduan_".date('YmdHis'); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/epengaduan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '40480'; //maksimum besar file 2M
        $config['max_width']  = '12880'; //lebar maksimum 1288 px
        $config['max_height']  = '7680'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
        $this->upload->initialize($config);
        
        if($_FILES['photo']['name'])
        {
            if ($this->upload->do_upload('photo'))
            {
                $gbr = $this->upload->data();
                $data = array(
                'ID_users' => $row->ID,
                'pesan' => $this->input->post('pesan'),      
                'photo' =>$gbr['file_name'],
                'email' => $row->email,
                'status_pesan' => 'no',
                'create_tgl' => $create_tgl,
                'judul' => $this->input->post('judul'),
                'alamat_lokasi'   => $this->input->post('lokasi'),               
                );
                $table = 'epengaduan';
                $this->m_epengaduan->get_insert($data,$table); 
                $query = $this->db->get_where('epengaduan', array('photo' => $gbr['file_name'] ));
                $rowp = $query->row();
                $data = array(
                'table' => 'epengaduan',
                'ID'=> $rowp->ID,    
                'ID_pengaduan' => 'PG-'.'0'.+($rowp->ID+100).'-'.$bln.'-'.$thn,
                );
                $this->m_epengaduan->up_pengaduan($data);
                $this->template->alert(
                'Pesan Anda telah terkirim.', 
                array('type' => 'success','icon' => 'check'));
                redirect('epengaduan/histori');
                return;
            }}else{
                $this->template->alert(
                'Pesan Anda Gagal dikirim, silahkan coba lagi !', 
                array('type' => 'danger','icon' => 'close'));
                redirect('epengaduan/create'); //jika gagal maka akan ditampilkan form upload
                return;
            }}}
    public function berhasil()
    {   
            $this->template->alert(
                'Pesan Anda telah terkirim !', 
                array('type' => 'success','icon' => 'check'));
            redirect('epengaduan/create');
            return;     
    }
    public function gagal()
    {
            $this->template->alert(
                'Pesan Anda Gagal dikirim, silahkan coba lagi !', 
                array('type' => 'danger','icon' => 'close'));
            redirect('epengaduan/create');
            return;     
    }

     public function histori()
    {
        $data = array(
            'title' => 'Riwayat Pengaduan- SIMKIS Simpangkatis District Information And Service Center - Kecamatan Simpangkatis - Kabupaten Bangka Tengah',
            'crumb' => 'Riwayat Pengaduan',
            'histori' => $this->m_epengaduan->get_histori(),   
            );

        $this->template->view('pengaduan/v_histori', $data);
    }

    public function ubah_status()
    {
        $data = array(
            'title' => 'Histori - SIMKIS Simpangkatis District Information And Service Center - Kecamatan Simpangkatis - Kabupaten Bangka Tengah',
            'crumb' => 'Histori Pengaduan',
            'histori' => $this->m_epengaduan->get_histori(),   
            );

        $this->template->view('pengaduan/v_histori_ubah', $data);
    }

      public function ubah_status_sementara($id)
    {
        $data = array(
                'table' => 'epengaduan',
                'ID'=> $id,    
                'status_pesan' => 'yes',
                'approve_tgl' => date('Y-m-d H:i:s'),
                );
                $up=$this->m_epengaduan->ubah_pengaduan($data);
                $query = $this->db->get_where('epengaduan', array('ID' => $id ));
                $rowa = $query->row();
                $pindah = array(
                    'kategori' => 'epengaduan', 
                    'ID_penilaian' => $rowa->ID_pengaduan, 
                    );
                    $table = 'epenilaian';
                    $this->m_epengaduan->insert_penilaian($pindah,$table); 
                redirect('epengaduan/histori'); 
    }

   public function detail($ID=0){
        if(!$ID)
          show_404();

        $data = array(
            'title' => 'Detail pengaduan - SIMKIS Simpangkatis District Information And Service Center - Kecamatan Simpangkatis - Kabupaten Bangka Tengah',
            'crumb' => 'Detail pengaduan',
            'detail_aduan' => $this->m_epengaduan->get_detail($ID), 
            );
        $this->template->view('pengaduan/v_pengaduan_detail', $data);
   }
   
   public function edit($ID=0){
        if(!$ID)
          show_404();
        error_reporting(0);
        $query = $this->db->get_where('epengaduan', array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id')));
        $rowcek = $query->row();
        if ($rowcek->status_pesan == 'no') {      
        $data = array(
            'title' => 'Edit pengaduan - SIMKIS Simpangkatis District Information And Service Center - Kecamatan Simpangkatis - Kabupaten Bangka Tengah',
            'crumb' => 'Edit pengaduan',
            'edit_pengaduan' => $this->m_epengaduan->get_detail($ID), 
            );
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('pesan', 'Deskripi', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('lokasi', 'Alamat Lokasi','trim|required|min_length[10]');
        if ($this->form_validation->run() == FALSE)
        {
           $this->template->view('pengaduan/v_edit_pengaduan',$data);
        }  else
        {
        $create_tgl = date('Y-m-d H:i:s'); 
        $this->load->library('upload');
        $nmfile = "pengaduan_".date('YmdHis'); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/epengaduan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '40480'; //maksimum besar file 2M
        $config['max_width']  = '12880'; //lebar maksimum 1288 px
        $config['max_height']  = '7680'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
        $this->upload->initialize($config);
        if($_FILES['photo']['name'])
        {
            if ($this->upload->do_upload('photo'))
            {
                $gbr = $this->upload->data();
                $data = array(
                'pesan' => $this->input->post('pesan'), 
                'alamat_lokasi'   => $this->input->post('lokasi'),       
                'photo' =>$gbr['file_name'],
                'create_tgl' => $create_tgl,
                'judul' => $this->input->post('judul'),
                'table' => 'epengaduan', 
                'ID' => $ID,                  
                );
            $query = $this->db->get_where('epengaduan', array('ID' => $ID ));
            $rowp = $query->row();
            @unlink('assets/img/epengaduan/'.$rowp->photo);     
            $this->m_epengaduan->update_pengaduan($data);
                $this->template->alert(
                'Pesan Berhasil Diupdate !', 
                array('type' => 'success','icon' => 'check'));
                redirect('epengaduan/detail/'.$ID); 
            }else{
            $this->template->alert(
                'Pesan Anda Gagal diupdate, silahkan coba lagi ! ', 
                array('type' => 'danger','icon' => 'close'));
                redirect('epengaduan/edit/'.$ID); //jika gagal maka akan ditampilkan form upload
            }}}
        } else {
           show_404();
        }} 

   public function hapus($ID = 0)   {
     if(!$ID)
          show_404();
    
         $array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
         $this->db->where($array);
         $query = $this->db->get('epengaduan');
         $row = $query->row();
         if ($row->ID == NULL) {
            $this->template->alert(
                'Pesan yang anda cari tidak ditemukan !', 
                array('type' => 'warning','icon' => 'close'));
                redirect('epengaduan/histori/'); 
         } else {
             
         if ($row->status_pesan == 'no') {
            $this->m_epengaduan->hapus($ID);
            $this->template->alert(
                'Pesan berhasil dihapus !', 
                array('type' => 'success','icon' => 'check'));
                redirect('epengaduan/histori/'); 
         } else {
            $this->template->alert(
                'Pesan Anda Tidak bisa dihapus, karena sudah terverifikasi !', 
                array('type' => 'danger','icon' => 'close'));
                redirect('epengaduan/histori/'); //jika gagal maka akan ditampilkan form upload
         }}    
   } 

    public function see($ID = 0)   {
     if(!$ID)
          show_404();
         $array = array('ID' => $ID , 'ID_users' => $this->session->userdata('akun_id'));
         $this->db->where($array);
         $query = $this->db->get('epengaduan');
         $row = $query->row();
          if ($row->status_pesan == 'read') {
            redirect('epengaduan/histori/'); 
          }
          else {
            $this->m_epengaduan->up_status_pengaduan($ID);
            redirect('epengaduan/detail/'.$ID); 
          }

  }

  public function panduan()
  {
            $data = array(
            'title' => 'Panduan Pengaduan - SIMKIS Simpangkatis District Information And Service Center - Kecamatan Simpangkatis - Kabupaten Bangka Tengah',
            'crumb' => 'Panduan Pengaduan',
            'panduan' => $this->m_epengaduan->get_panduan(), 
            );
           $this->template->view('pengaduan/panduan/panduan_v',$data);
      
  }

   public function read($slug = '')
  {
             if(!$slug)
                show_404();
             $array = array('slug' => $slug);
             $this->db->where($array);
             $query = $this->db->get('panduan_pengaduan');
             $data = array(
                'title' => 'Detail Panduan Pengaduan - SIMKIS Simpangkatis District Information And Service Center - Kecamatan Simpangkatis - Kabupaten Bangka Tengah',
                'crumb' => 'Detail Panduan Pengaduan',
                'panduan' => $this->m_epengaduan->get_panduan_read($slug), 
            );
             $this->template->view('pengaduan/panduan/panduan_read_v',$data);
      
  }


}//end

/* End of file Epengaduan.php */
/* Location: ./application/controllers/Epengaduan.php */