<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Dashboard extends CI_Controller
{
	 function __construct()
   {
     parent::__construct();
     $this->load->model('quotation_model');
     $this->load->model('date_model');
   }
   
	public function index()
	{	
	 if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {
        $date =  date("Y"); 
     
     	$data['count_quote']    = $this->quotation_model->count_pending_quote();
        $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
        $data['overdue']        = $this->quotation_model->count_overdue();
        $data['service_report'] = $this->quotation_model->count_service_report();
        $data['job_complete']   = $this->quotation_model->count_complete_jobwork();

        $data['jan_reject']     = $this->date_model->reject_jan($date);
        $data['feb_reject']     = $this->date_model->reject_feb($date);
        $data['march_reject']   = $this->date_model->reject_march($date);
        $data['april_reject']   = $this->date_model->reject_april($date);
        $data['may_reject']     = $this->date_model->reject_may($date);
        $data['jun_reject']     = $this->date_model->reject_jun($date);
        $data['july_reject']    = $this->date_model->reject_july($date);
        $data['aug_reject']     = $this->date_model->reject_aug($date);
        $data['sept_reject']    = $this->date_model->reject_sept($date);
        $data['oct_reject']     = $this->date_model->reject_oct($date);
        $data['nov_reject']     = $this->date_model->reject_nov($date);
        $data['dec_reject']     = $this->date_model->reject_dec($date);

        $data['jan_aprov']      = $this->date_model->aprov_jan($date);
        $data['feb_aprov']      = $this->date_model->aprov_feb($date);
        $data['march_aprov']    = $this->date_model->aprov_march($date);
        $data['april_aprov']    = $this->date_model->aprov_april($date);
        $data['may_aprov']      = $this->date_model->aprov_may($date);
        $data['jun_aprov']      = $this->date_model->aprov_jun($date);
        $data['july_aprov']     = $this->date_model->aprov_july($date);
        $data['aug_aprov']      = $this->date_model->aprov_aug($date);
        $data['sept_aprov']     = $this->date_model->aprov_sept($date);
        $data['oct_aprov']      = $this->date_model->aprov_oct($date);
        $data['nov_aprov']      = $this->date_model->aprov_nov($date);
        $data['dec_aprov']      = $this->date_model->aprov_dec($date);

	    $this->load->view('scaffolds/header');
	    $this->load->view('scaffolds/sidebar',$data);
		$this->load->view('pages/dashboard',$data);
		$this->load->view('scaffolds/footer_dashboard');
        
     }else
		{
			redirect('login', 'refresh');
		}	
	 
   }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */