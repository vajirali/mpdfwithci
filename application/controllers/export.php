<?php  
    if (!defined('BASEPATH'))exit('No direct script access allowed');

    class Export extends CI_Controller {

        public function __construct() {
            parent::__construct();
			$this->load->model('site');
        }
		
        public function index(){
            $data['title'] = 'Create Excel | TechArise';
            $data['result'] = $this->site->getProduct();  
            $this->load->view('index', $data);
        }
		
		public function generatePdfFile() {
			$this->load->library('m_pdf');
			$data['getInfo'] = $this->site->getProduct();
			$htmlContent = $this->load->view('generatepdffile', $data, TRUE);       
			$this->m_pdf->pdf->WriteHTML($htmlContent);
            $createPDFFile = time().'.pdf';
            $this->m_pdf->pdf->Output($createPDFFile, 'D'); // 'D' for download, 'F' for save in root folder
         }

        
    }
?>