<?php

/**
 * API Surat
 *
 * @author Vicky Nitinegoro
 **/

require APPPATH . '/libraries/REST_Controller.php';

class Surat extends REST_Controller 
{

    function __construct($config = 'rest') 
    {
        parent::__construct($config);
    }

    // show data Surat
    public function index_get() 
    {
        $surat = array();

        if( $this->get('status') )
            $this->db->where('status', $this->get('status') );

        if ($this->get('ID') == '') 
        {
            foreach( $this->db->get('surat')->result() as $row )
                $surat[] = array(
                    'ID_pelayanan' => $row->ID_pelayanan, 
                    'penduduk' => $this->db->get_where('penduduk', array('nik' => $row->nik))->row(),
                    'berkas' => json_decode($row->berkas_syarat),
                    'isi' => json_decode( $row->isi_surat ),
                    'berkas_syarat_link' => json_decode( $row->berkas_syarat_link ),
                    'status' => $row->status,
                    'waktu' => array(
                        'mulai' => $row->waktu_mulai,
                        'selesai' => $row->waktu_selesai
                    )
            );
        } else {
            $this->db->join('kategori_surat', 'surat.kode_surat = kategori_surat.kode_surat_sistem', 'right');

            $this->db->where('ID_pelayanan', $this->get('ID'));
            
            $row = $this->db->get('surat')->row();
            
            if( $row != FALSE )
                $surat[] = array(
                    'ID_pelayanan' => $row->ID_pelayanan, 
                    'penduduk' => $this->db->get_where('penduduk', array('nik' => $row->nik))->row(),
                    'berkas' => json_decode($row->berkas_syarat_link),
                    'isi' => json_decode( $row->isi_surat ),
                    'dokumen' => $row->judul_surat,
                    'syarat' => self::get_syarat($row->syarat),
                    'berkas_syarat_link' => json_decode( $row->berkas_syarat_link ),
                    'slug' => $row->slug,
                    'status' => $row->status,
                    'waktu' => array(
                        'mulai' => $row->waktu_mulai,
                        'selesai' => $row->waktu_selesai
                    )
                );
        }

        $this->response($surat, 200);
    }

    /**
     * Tampilkan data
     *
     * @var string
     **/
    public function data_get()
    {
        $this->db->select('surat.ID, ID_pelayanan, surat.nik, kategori_surat.slug, kode_surat, status, kategori_surat.judul_surat, waktu_mulai');

        $this->db->where_not_in('status', 'entry');

        if($this->get('start') != '')
            $this->db->where('waktu_mulai >= ', $this->get('start'));

        if($this->input->get('end') != '')
            $this->db->where('waktu_mulai <= ', $this->get('end'));


        if($this->get('query') != '')
            $this->db->like('surat.nomor_surat', $this->get('query'))
                     ->or_like('surat.nik', $this->get('query'));

        $this->db->join('kategori_surat', 'surat.kode_surat = kategori_surat.kode_surat_sistem', 'left');

        $this->db->order_by('surat.ID', 'desc');

        if($this->get('type') == NULL OR $this->get('type') != 'num')
        {
            $this->response($this->db->get('surat', $this->get('limit'), $this->get('offset'))->result(), 200);
        } else {
            $this->response(
            array('status' => 'success', 'num' => $this->db->get('surat')->num_rows() )
            , 200);
        }
    }

    /**
     * Menampilkan Syarat Penerbitan SUrat
     *
     * @param Integer (join)
     **/
    public function get_syarat($param = 0)
    {
        if($param != FALSE) 
            return $this->db->query("SELECT id_syarat, nama_syarat FROM syarat_surat WHERE id_syarat IN({$param})")->result();
    }

    public function index_put()
    {
        $data = array(
            'waktu_selesai' => $this->put('waktu_selesai'),
        );

        $this->db->where('ID_pelayanan', $this->put('ID'));

        $update = $this->db->update('surat', $data);

        if ($update) 
        {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}

