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
   
  public function reject_quotation(){

      if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            
            $config                     = array();
            $config["base_url"]         = base_url() . 'quotation/quotationlist';
            $config["total_rows"]       = $this->quotation_model->record_count();
            $config["per_page"]         = 12;
            $config["uri_segment"]      = 3;
            $config['full_tag_open']    = "<ul class='pagination'>";
            $config['full_tag_close']   = "</ul>";
            $config['num_tag_open']     = '<li>';
            $config['num_tag_close']    = '</li>';
            $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open']    = "<li>";
            $config['next_tagl_close']  = "</li>";
            $config['prev_tag_open']    = "<li>";
            $config['prev_tagl_close']  = "</li>";
            $config['first_tag_open']   = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open']    = "<li>";
            $config['last_tagl_close']  = "</li>";

            $this->pagination->initialize($config);
            $page                   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["quotation_list"] = $this->quotation_model->show_quotationlist($config["per_page"], $page);
            $data["links"]          = $this->pagination->create_links();
            $data['count_quote']    = $this->quotation_model->count_pending_quote();
            $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
            $data['overdue']        = $this->quotation_model->count_overdue();
            $data['service_report']        = $this->quotation_model->count_service_report();
            $data['job_complete']        = $this->quotation_model->count_complete_jobwork();



            
            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar', $data);
            $this->load->view('pages/report_quotation_rejected', $data);
            $this->load->view('scaffolds/footer');
        } else {
            redirect('login', 'refresh');
        }
     }

       public function generate_report(){

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

             $data['result'] = $this->report_model->do_generate();

                                      
             $this->load->view('scaffolds/header');
             $this->load->view('scaffolds/sidebar', $data);
             $this->load->view('pages/report_quotation_rejected', $data);
             $this->load->view('scaffolds/footer');
        
         
         } else {
            redirect('login', 'refresh');
        }
     }


     
}

/* End of file jobwork.php */
/* Location: ./application/controllers/jobwork.php */