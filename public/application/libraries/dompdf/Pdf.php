<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter PDF Library
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			ADIL KHAN AJAD
 * @license			MIT License
 *
 */

require_once(dirname(__FILE__) . '/autoload.inc.php');
use Dompdf\Dompdf;

class Pdf
{
	public function create($html,$filename,$Attachment = true)
    {   
        
	    $dompdf = new Dompdf(array('enable_remote' => true));
	    $dompdf->loadHtml($html);
	    $dompdf->render();
	    $dompdf->stream($filename.'.pdf',array("Attachment" => $Attachment));
  }
  
}