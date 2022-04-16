<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use mikehaertl\wkhtmlto\Pdf; 
class Owner_pet extends CI_Controller {
	function __construct()
    {
		parent::__construct();

        $this->load->database();
        $this->load->model("OwnerModel", "owner");
	}	
 
	public function index()
	{

		$this->load->library('twig');
		// $this->load->library('dompdf/pdf');
		// $filename = "pdf-".date('Y_m_d_H_i_s');

		//default value
		$data["owner_name"]="";
		$data["pet_type_name"] = "";


	    if(isset($_GET['id'])){
			$id = (int) $_GET['id'];
			//echo 	$_GET['id'];
			//$this->db->where("id", $id);
			$data1 = $this->owner->lists();

		//	echo $data1[0]->id;
		//	echo sizeof($data1);
			for($i=0;$i<sizeof($data1);$i++){
			    //echo $data1[$i]->id.'<br>';
				if($data1[$i]->id==$id){
					$data["owner_name"]= $data1[$i]->owner_name;	
					$data["pet_type_name"] = $data1[$i]->pet_type_name;	
					break;

				}		
			} 
		} 		
	    
		
		## IMPORTANT contents above can be from database.

		$data['base_url']=$this->config->item('base_url'); 
		$this->twig->display('owner_pet.html', $data);

		// $html=$this->twig->display('owner_pet.html', $data,true);
		// $is_download = false;
		// $this->pdf->create($html, $filename,$is_download);
		
	}

	/**
    * Get view PDF File
    *
    * @return Response
   */
  	public function pdf(){ 

		if(isset($_GET['id'])){
			$id = (int) $_GET['id']; 
			$data1 = $this->owner->lists(); 
			for($i=0;$i<sizeof($data1);$i++){ 
				if($data1[$i]->id==$id){
					$owner_name= $data1[$i]->owner_name;	 
					break;
				}		
			} 
		} 		
		$filename=str_replace(' ','_',$owner_name."-".date('Y_m_d H:i:s').'.pdf'); 
		$path = realpath('public').'/';
		 

		$pdf = new Pdf;
		$pdf->addPage('http://localhost/index.php/Owner_Pet?id='.$_GET['id']);
		$pdf->saveAs($path.$filename);		
		$pdf->send($filename);
 
	}

	/**
    * Get view PDF File
    *
    * @return Response
   */
	public function view_as_pdf(){
		$this->load->library('dompdf/pdf');

		if(isset($_GET['id'])){
			$id = (int) $_GET['id']; 
			$data1 = $this->owner->lists(); 
			for($i=0;$i<sizeof($data1);$i++){ 
				if($data1[$i]->id==$id){
					$owner_name= $data1[$i]->owner_name;	 
					break;
				}		
			} 
		} 		

		$filename = $owner_name."-".date('Y_m_d H:i:s');
		$this->data['data'] = '';
		//$html = $this->load->view('welcome_message',$this->data,true);
		$html = file_get_contents("http://localhost/index.php/Owner_Pet?id=".$_GET['id']);

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
		if(isset($_GET['id'])){
			$id = (int) $_GET['id']; 
			$data1 = $this->owner->lists(); 
			for($i=0;$i<sizeof($data1);$i++){ 
				if($data1[$i]->id==$id){
					$owner_name= $data1[$i]->owner_name;	 
					break;
				}		
			} 
		} 		

		$filename = $owner_name."-".date('Y_m_d H:i:s');
		$this->data['data'] = '';
		//$html = $this->load->view('welcome_message',$this->data,true);
		$html = file_get_contents("http://localhost/index.php/Owner_Pet?id=".$_GET['id']);
		$is_download = true;
		$this->pdf->create($html, $filename,$is_download);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */