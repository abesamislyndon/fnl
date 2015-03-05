<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Dashboard extends CI_Controller
{
	 function __construct()
   {
     parent::__construct();
     $this->load->model('quotation_model');
   }
   
	public function index()
	{	
	 if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {
     	$data['count_quote'] = $this->quotation_model->count_pending_quote();
        $data['count_jobwork'] = $this->quotation_model->count_pending_jobwork();
        $data['overdue'] = $this->quotation_model->count_overdue();
        $data['service_report']        = $this->quotation_model->count_service_report();
	    
	    $this->load->view('scaffolds/header');
	    $this->load->view('scaffolds/sidebar',$data);
		$this->load->view('pages/dashboard',$data);
		$this->load->view('scaffolds/footer');
     }else
		{
			redirect('login', 'refresh');
		}	
	 
   }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */