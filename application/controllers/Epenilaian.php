<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 *
 * @package Controller universe
 * @author Teitra Mega Team <teitramega@gmail.com>
 **/
class Epenilaian extends CI_Controller {

	public function __construct( )
    {
        parent::__construct();
        if ( ! $this->session->userdata('user_login') ) :
            $this->template->alert(
                'Silahkan Login untuk mengakses Epenilaian.', 
                array('type' => 'danger','icon' => 'close')
            );
            redirect('login');
            return;
        endif;
        $this->load->library(array('form_validation','template','user_agent','upload'));
        $this->load->model('m_epengaduan');
        $this->load->model('m_epenilaian');
        $this->load->helper(array('form', 'url'));

    }
    public function index()
    {

        $data = array(
            'title' => 'E-Penilaian - PAKISS - Simpang Katis Informations And Services - Kabupaten Bangka Tengah',
            'crumb' => 'Epenilaian'  
            );
        $this->template->view('main/penilaian/v_penilaian_home', $data);
    }

    public function nilai($param=0)
    {
        error_reporting(0);
        if(!$param)
          show_404();
        $query = $this->db->get_where('epenilaian', array('ID_users' => $this->session->userdata('akun_id'), 'ID_penilaian' => $param));
        $rowcek = $query->row();
        if ($rowcek->status_nilai == 'yes') {
             $this->template->alert(
                'Maaf, Anda telah memberikan penilaian sebelumnya !', 
                array('type' => 'success','icon' => 'check')
            );
            if ($rowcek->kategori == 'epelayanan') {
                redirect('epenilaian/pelayanan');
                return;
             }
            else {
                redirect('epenilaian/pengaduan');
                return;
            }
        }
        else {
            
        $data = array(
            'title' => 'Beri Penilaian - PAKISS - Simpang Katis Informations And Services - Kabupaten Bangka Tengah',
            'crumb' => 'Beri Penilaian' ,
            'nilai' => $this->m_epenilaian->get_nilai($param), 
            );
        $this->template->view('main/penilaian/v_penilaian_nilai', $data);
    }}
    public function pengaduan()
    {
        $data = array(
            'title' => 'Penilaian Pengaduan - PAKISS - Simpang Katis Informations And Services - Kabupaten Bangka Tengah',
            'crumb' => 'Penilaian Pengaduan',
            'penilaian_pengaduan' => $this->m_epenilaian->get_all(),  
            );
        $this->template->view('main/penilaian/v_penilaian_pengaduan', $data);
    }
     public function pelayanan()
    {
        $data = array(
            'title' => 'Penilaian Pelayanan - PAKISS - Simpang Katis Informations And Services - Kabupaten Bangka Tengah',
            'crumb' => 'Penilaian Pelayanan',
            'penilaian_pengaduan' => $this->m_epenilaian->get_all_layanan(),  
            );
        $this->template->view('main/penilaian/v_penilaian_pelayanan', $data);
    }
    public function post_nilai($param = 0)
    {
        if(!$param)
          show_404();
      if (!$this->input->post('penilaian')) {
           $this->template->alert(
                'Hey, What are you doing !', 
                array('type' => 'danger','icon' => 'close')
            );

          redirect('epenilaian/pengaduan');
          return;
      }
      else{
        $query = $this->db->get_where('epenilaian', array('ID_users' => $this->session->userdata('akun_id'), 'ID_penilaian' => $param));
        $rowcek = $query->row();
        if ($query->num_rows() == 0) {
            $this->template->alert(
                'Maaf, ID Penilaian ini tidak di temukan !', 
                array('type' => 'danger','icon' => 'close')
            );
            redirect('epenilaian/pengaduan');
            return;
        }
        elseif ($query->num_rows() == 1 AND $rowcek->status_nilai == 'yes' ){
            $this->template->alert(
                'pengaduan ini telah di beri penilaian sebelumnya', 
                array('type' => 'success','icon' => 'check')
            );
            redirect('epenilaian/pengaduan');
            return;
         }
        elseif ($query->num_rows() == 1 AND $rowcek->status_nilai == 'no' ) {
             $data = array(
                'penilaian' => $this->input->post('penilaian'),
                'ID_users' => $this->session->userdata('akun_id'),
                'table' => 'epenilaian',
                'ID_penilaian' => $param,
                'post_tgl' => date('Y-m-d H:i:s'),
                );
              $this->m_epenilaian->up_nilai($data);
              $this->template->alert(
                'Terima kasih atas penilaian anda !', 
                array('type' => 'success','icon' => 'check')
            );
            if ($rowcek->kategori == 'epelayanan') {
                redirect('epenilaian/pelayanan');
                return;
             }
            else {
                redirect('epenilaian/pengaduan');
                return;
            }
         }
         else {
            $this->template->alert(
                'What are you doing !', 
                array('type' => 'danger','icon' => 'close')
            );
          redirect('epenilaian/pengaduan');
          return;
         }
    }}

    public function panduan()
  {
            $data = array(
            'title' => 'Panduan Penilaian - PAKISS Simpang Katis Informations And Services - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
            'crumb' => 'Panduan Penilaian',
            'panduan' => $this->m_epenilaian->get_panduan(), 
            );
           $this->template->view('main/penilaian/panduan/panduan_v',$data);
      
  }

   public function read($slug = '')
  {
             if(!$slug)
                show_404();
             $array = array('slug' => $slug);
             $this->db->where($array);
             $query = $this->db->get('panduan_pengaduan');
             $data = array(
                'title' => 'Detail Panduan Penilaian - PAKISS Simpang Katis Informations And Services - Kecamatan Simpang Katis - Kabupaten Bangka Tengah',
                'crumb' => 'Detail Panduan Penilaian',
                'panduan' => $this->m_epenilaian->get_panduan_read($slug), 
            );
             $this->template->view('main/penilaian/panduan/panduan_read_v',$data);
      
  }
}
/* End of file Epenilaian.php */
/* Location: ./application/controllers/Epenilaian.php */