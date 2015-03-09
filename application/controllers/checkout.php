<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Checkout extends CI_Controller
{
   function __construct()
   {
     parent::__construct();
     $this->load->model('jobwork_model');
     $this->load->model('quotation_model');
   }
   


  public function individual_details(){

        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $quotation_id                       = $this->uri->segment(3);
            $data['quotation_list_individual']  = $this->jobwork_model->checkout_individual($quotation_id);
            $data['sub_description_individual'] = $this->quotation_model->show_subquotation_individual($quotation_id);
           // $data['overall_total_details']      = $this->quotation_model->show_overall_total($quotation_id);
            $data['total1']      = $this->quotation_model->total1($quotation_id);
            $data['count_quote']                = $this->quotation_model->count_pending_quote();
            $data['count_jobwork']              = $this->quotation_model->count_pending_jobwork();
            $data['overdue']        = $this->quotation_model->count_overdue();
            $data['service_report']        = $this->quotation_model->count_service_report();
            $data['job_complete']        = $this->quotation_model->count_complete_jobwork();
            $data['quotation_individual'] = $this->quotation_model->show_quotation_individual_jobwork($quotation_id);
            
            $this->load->view('scaffolds/header2');
            $this->load->view('scaffolds/sidebar', $data);
            $this->load->view('pages/checkout_individual', $data);
            $this->load->view('scaffolds/footer');
        } else {
            redirect('login', 'refresh');
        }
        
    }



   
}

/* End of file jobwork.php */
/* Location: ./application/controllers/jobwork.php */