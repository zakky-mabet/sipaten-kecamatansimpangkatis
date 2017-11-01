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
		//$this->load->view('vprint', $this->data);
	
		$your_printer_name = "POS-58";
		$p=printer_open($your_printer_name);
		printer_start_doc($p,"Testpage");
		printer_start_page($p);
	
		$pen = printer_create_pen(PRINTER_PEN_DOT, 1, "000000");
		$font = printer_create_font("Draft Condensed",20,7, PRINTER_FW_ULTRALIGHT, false, false, false, 0);
	
		printer_select_pen($p, $pen);
		printer_select_font($p, $font);					 
		 
		printer_draw_text($p,"Nomor Antrian Pelayanan",102,0);
		printer_draw_text($p,"Kecamatan Simpang Katis",100,20);
		printer_draw_text($p,"Date :".date('d/m/Y'),0,60);
		printer_draw_text($p,"Time :".date('h:i A'),260,60);
		printer_draw_line($p, 0,90, 500, 90);

		printer_delete_font($font);

		$font = printer_create_font("Verdana", 160, 72, 600, false, false, false, 0);   
		printer_select_font($p, $font);	    
		printer_draw_text($p,$this->mantrian->get_print($id)->nomor,93,104);
		printer_delete_font($font);

		$font = printer_create_font("Draft Condensed",20,7, PRINTER_FW_ULTRALIGHT, false, false, false, 0);     
		printer_select_font($p, $font);	     
		printer_draw_text($p,"Mohon Menunggu Panggilan, pastikan Anda dilayani",3,260);
		printer_draw_text($p,"dengan baik oleh petugas kami. Terima Kasih !",15,280);

	 
		printer_delete_font($font);
		printer_delete_pen($pen);
		printer_end_page($p);
		printer_end_doc($p);
		printer_close($p);


		redirect(base_url('queue'));
	}
	
}

