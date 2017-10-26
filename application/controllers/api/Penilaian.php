<?php

/**
 * API Penilaian
 *
 * @author Vicky Nitinegoro
 **/

require APPPATH . '/libraries/REST_Controller.php';

class Penilaian extends REST_Controller {

    function __construct($config = 'rest') 
    {
        parent::__construct($config);
    }

    // show data Penduduk
    function index_get() 
    {
        if ($this->get('ID') == '') 
        {
            $penilaian = $this->db->get('epenilaian')->result();
        } else {
            $this->db->where('ID_penilaian', $this->get('ID'));
            $penilaian = $this->db->get('epenilaian')->result();
        }

        $this->response($penilaian, 200);
    }

    public function index_put()
    {
        $data = array(
            'penilaian' => $this->put('penilaian'),
            'kategori' => 'epelayanan' 
        );

        $this->db->where('ID_penilaian', $this->put('ID'));

        $update = $this->db->update('epenilaian', $data);

        if ($update) 
        {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}   
