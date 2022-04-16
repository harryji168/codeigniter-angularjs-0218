<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_twig extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->library('twig');
	    
		$data["title"] = "This site is powered by twig & Codeigniter";
		$data["project_title"]="A Boostrap,Twig ,Codeigniter Project";
		$data["infomation"] = "Twig with Boostrap ,Codeigniter Configuration";
	    
		$data["main_content"] = "Lorem ipsum dolor sit amet, tritani dissentiunt ne est, an commune maluisset consequat sed. Cu sit odio voluptua, quidam evertitur nam no. Usu ne assum feugait scriptorem. Qui luptatum instructior in. Alterum interpretaris at pro, nibh etiam mucius an est. Sed fugit augue constituam ne .";

		## IMPORTANT contents above can be from database.

		$data['base_url']=$this->config->item('base_url'); 
		$this->twig->display('test.html', $data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */