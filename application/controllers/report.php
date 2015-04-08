<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Report extends CI_Controller
{
   function __construct()
   {
     parent::__construct();
     $this->load->model('jobwork_model');
     $this->load->model('quotation_model');
     $this->load->model('report_model');
   }

  public function generate_report_reject(){

       if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {

             $from = $this->input->post('from');
             $to = $this->input->post('to');

              $this->session->set_userdata('date_from', $from);
              $ses_date_from = $this->session->userdata('date_from');
              $data['date_from'] = $ses_date_from;

              $this->session->set_userdata('date_to', $to);
              $ses_date_to = $this->session->userdata('date_to');
              $data['date_to'] = $ses_date_to;
        
              $data['count_quote']    = $this->quotation_model->count_pending_quote();
              $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
              $data['overdue']        = $this->quotation_model->count_overdue();
              $data['service_report']        = $this->quotation_model->count_service_report();
              $data['job_complete']        = $this->quotation_model->count_complete_jobwork();

              $data['result'] = $this->report_model->do_generate_reject();
                                      
             $this->load->view('scaffolds/header');
             $this->load->view('scaffolds/sidebar', $data);
             $this->load->view('pages/report_quotation_rejected', $data);
             $this->load->view('scaffolds/footer');
        
         
         } else {
            redirect('login', 'refresh');
        }
     }


    public function generate_report_complete(){

       if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {

             $from = $this->input->post('from');
             $to = $this->input->post('to');


              $this->session->set_userdata('date_from', $from);
              $ses_date_from = $this->session->userdata('date_from');
              $data['date_from'] = $ses_date_from;

              $this->session->set_userdata('date_to', $to);
              $ses_date_to = $this->session->userdata('date_to');
              $data['date_to'] = $ses_date_to;
        

             $data['count_quote']    = $this->quotation_model->count_pending_quote();
             $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
             $data['overdue']        = $this->quotation_model->count_overdue();
             $data['service_report']        = $this->quotation_model->count_service_report();
             $data['job_complete']        = $this->quotation_model->count_complete_jobwork();

             $data['result'] = $this->report_model->do_generate_complete();

                                      
             $this->load->view('scaffolds/header');
             $this->load->view('scaffolds/sidebar', $data);
             $this->load->view('pages/report_quotation_completed', $data);
             $this->load->view('scaffolds/footer');
        
         
         } else {
            redirect('login', 'refresh');
        }
     }


    public function generate_report_invoice(){

       if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {

             $from = $this->input->post('from');
             $to = $this->input->post('to');


              $this->session->set_userdata('date_from', $from);
              $ses_date_from = $this->session->userdata('date_from');
              $data['date_from'] = $ses_date_from;

              $this->session->set_userdata('date_to', $to);
              $ses_date_to = $this->session->userdata('date_to');
              $data['date_to'] = $ses_date_to;
        

             $data['count_quote']    = $this->quotation_model->count_pending_quote();
             $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
             $data['overdue']        = $this->quotation_model->count_overdue();
             $data['service_report']        = $this->quotation_model->count_service_report();
             $data['job_complete']        = $this->quotation_model->count_complete_jobwork();

             $data['result'] = $this->report_model->do_generate_invoice();

                                      
             $this->load->view('scaffolds/header');
             $this->load->view('scaffolds/sidebar', $data);
             $this->load->view('pages/report_invoice', $data);
             $this->load->view('scaffolds/footer');
        
         
         } else {
            redirect('login', 'refresh');
        }
     }
     
}

/* End of file jobwork.php */
/* Location: ./application/controllers/jobwork.php */