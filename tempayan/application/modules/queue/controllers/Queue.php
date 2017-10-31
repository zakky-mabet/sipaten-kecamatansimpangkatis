<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Customer Queue
 * 
 * @author Muhamad Zakky <muhamadzakky45@gmail.com | CV. TEITRAMEGA>
 **/

class Queue extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		$this->data = array('title' => "Customer Queue");	

		$this->load->helper('url');

		$null = array();

		$this->load->model('mantrian');
	}

	public function index()
	{
		$this->load->view('vqueue', $this->data);
	}

	public function get()
	{
		$this->mantrian->_get();

		redirect("queue");
	}

	public function get_print($id)
	{
		if (!$id) {
			redirect('404');
		}
		$this->data = array(
			'title' => "Print Customer Queue",
			'print' => $this->mantrian->get_print($id),
		);	

		;
		/* contoh text */  
		$text = 'Eh, ini adalah testing aplikasi cetak teks langsung ke printer dengan PHP lhoo....';     
		/* tulis dan buka koneksi ke printer */    
		$printer = printer_open("POS-58");  
		/* write the text to the print job */  
		  
		/* close the connection */ 
		printer_close($printer);

		//redirect(base_url('queue'));
	}

	public function up($id)
	{
		$this->data = array(
			'title' => "Print Customer Queue",
			'print' => $this->mantrian->get_print($id),
		);
		$printer = printer_open("POS-58");  	
		printer_write($printer, $this->load->view('vprint', $this->data)); 
		printer_close($printer);
	}
	
}

