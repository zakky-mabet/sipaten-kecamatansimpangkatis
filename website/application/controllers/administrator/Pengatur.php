<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengatur extends CI_Controller{
    public $myaccount;
    public function __construct()
    {
        parent::__construct();
         if ( ! $this->session->userdata('admin_login') ) :
            $this->administratortemplate->alert(
                'Silahkan Login !', 
                array('type' => 'danger','icon' => 'close')
            );
            redirect('administrator/login');
            return;
        endif;

        $this->breadcrumbs->unshift(1, 'Pengaturan', "setting");

        $this->load->library(array('upload')); 

    }
    public function index()
    {
        $this->adminbreadcrumbs->unshift(2, 'Pengaturan Sistem', "setting");
        $this->adminpage_title->push('Pengaturan', 'Pengaturan Sistem');
        $this->data = array(
            'title' => "Pengaturan Sistem",
            'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
            'adminpage_title' => $this->adminpage_title->show()
            );
        $this->administratortemplate->view('administrator/pengatur/v_pengatur', $this->data);}



        public function set_identitas()
        {
            if(is_array(
                $this->input->post('setting'))){
                foreach($this->input->post('setting') as $key => $value){
                $this->setting->update($key, $value);
            }
            if($this->db->affected_rows()){
              
            } else {
              
                $this->administratortemplate->alert(' Perubahan disimpan.',array('type' => 'success','icon' => 'check'));
            }
        }
        redirect(base_url().'administrator/pengatur/');
    }

        public function logo(){
            $this->adminbreadcrumbs->unshift(2, 'Pengaturan Logo', "logo");
            $this->adminpage_title->push('Pengaturan', 'Pengaturan Logo');
            $this->data = array(
                'title' => "Pengaturan Logo",
                'adminbreadcrumb' => $this->adminbreadcrumbs->show(),
                'adminpage_title' => $this->adminpage_title->show()
                );
            $this->administratortemplate->view('administrator/pengatur/v_pengatur_logo', $this->data);

        }/** * Update Set tb_option (Logo Komponen) * * @return string **/

        public function set_logo()
        {
            $config['upload_path'] = './assets/images/';
            $config['max_size']= '110240';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite'] = FALSE;
            $this->upload->initialize($config);
            
            if ( $_FILES == FALSE ){
                $this->template->alert($this->upload->display_errors(),
                    array('type' => 'danger','title' => 'Gagal!', 'icon' => 'warning'));
            } else {
                $result_array = array();
                foreach($_FILES as $key => $value){
                    switch ($key){
                        case 'logo-favicon':
                        if($this->upload->do_upload($key) != FALSE){
                            @unlink("assets/images/{$this->setting->get('logo-favicon')}");
                            $this->setting->update('logo-favicon', $this->upload->file_name);
                        }
                        break;
                        
                        case 'logo-header':
                        if($this->upload->do_upload($key) != FALSE){
                            @unlink("assets/images/{$this->setting->get('logo-header')}");
                        $this->setting->update('logo-header', $this->upload->file_name);
                        }
                        break;

                         case 'logo-footer':
                        if($this->upload->do_upload($key) != FALSE){
                            @unlink("assets/images/{$this->setting->get('logo-footer')}");
                        $this->setting->update('logo-footer', $this->upload->file_name);
                        }
                        break;
                    
                    }
                    break;
                }
            }
            redirect('administrator/pengatur/logo');
        }
        
    }

    //* End of file Setting.php *//* Location: ./application/controllers/Setting.php */
