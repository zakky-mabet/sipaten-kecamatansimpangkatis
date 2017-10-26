<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpage_title {

    protected $ci;

    private $adminpage_title = array();

    public function __construct()
    {   
        $this->ci =& get_instance();

        $this->pagetitle_open     = '<h1>';
        $this->pagetitle_close    = '</h1>';
        $this->pagetitle_el_open  = '<small><i class="fa fa-angle-double-right"></i> ';
        $this->pagetitle_el_close = '</small>';
    }


    function push($title, $subtitle = '')
    {
        if (!$title) return;

        array_unshift($this->adminpage_title, array('title' => $title, 'subtitle' => $subtitle));
    }


    function show()
    {
        if ($this->adminpage_title)
        {
            $output = $this->pagetitle_open;

            foreach ($this->adminpage_title as $key => $value)
            {
                if (!empty($value['subtitle']))
                {
                    $subtitle = ' ' . $this->pagetitle_el_open .  $value['subtitle'] . $this->pagetitle_el_close;
                }
                else
                {
                    $subtitle = NULL;
                }

                $output.= $value['title'] . $subtitle;
            }

            return $output. $this->pagetitle_close ."\n";
        }

        return NULL;
    }

}
