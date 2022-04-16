<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
		//$this->twig->display('index.twig');
	}
	/**
    * Get view PDF File
    *
    * @return Response
   */
  	public function view_as_pdf(){
		$this->load->library('dompdf/pdf');
		$filename = "pdf-".date('Y_m_d_H_i_s');
		$this->data['data'] = '';
		$html = $this->load->view('welcome_message',$this->data,true);
		$is_download = false;
		$this->pdf->create($html, $filename,$is_download);
	}
	/**
	* Get Download PDF File
	*
	* @return Response
	*/
	public function download_as_pdf(){
		$this->load->library('dompdf/pdf');
		$filename = "pdf-".date('Y_m_d_H_i_s');
		$this->data['data'] = '';
		$html = $this->load->view('welcome_message',$this->data,true);

		$is_download = true;
		$this->pdf->create($html, $filename,$is_download);
	}
}
