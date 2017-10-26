<?php

/**
 * API Penduduk
 *
 * @author Vicky Nitinegoro
 **/

require APPPATH . '/libraries/REST_Controller.php';

class Penduduk extends REST_Controller {

    function __construct($config = 'rest') 
    {
        parent::__construct($config);
        $this->load->library('slug');
    }

    // show data Penduduk
    function index_get() 
    {
        $nik = $this->get('nik');

        if ($nik == FALSE) 
        {
            $penduduk = $this->db->get('penduduk')->result();
        } else {
           // $this->db->where('nik', $nik);
            $penduduk = $this->db->get_where('penduduk', array('nik' => $nik))->row();
        }
    
        $this->response($penduduk, 200);
    }

    public function pdesa_get()
    {
        $penduduk = $this->db->get_where('penduduk', array('nik' => $this->get('nik')))->row('desa');

        $desa = $this->db->get_where('desa', array('slug' => $this->slug->create_slug($penduduk)))->row('slug');

        $this->response($desa, 200);
    }

}
