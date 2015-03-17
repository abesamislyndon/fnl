<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();


class Create_pdf extends CI_Controller 
{
     function __construct()
     {
       parent::__construct();
       $this->load->model("jobwork_model");
       $this->load->model("quotation_model");

     }

// *************************** CREATE PDF Controller ***************************************************************

public function print_pending_quotation()
{
    if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {
         $id = $this->uri->segment(3);
         $data['quote_details'] = $this->quotation_model->show_quotation_individual($id);
         $data['sub_desc'] = $this->quotation_model->show_subquotation_individual($id);
         $data['total'] = $this->quotation_model->show_overall_total($id);
         $this->load->view('pages/pending_pdf_quotation', $data);
        }
   else 
        {
           redirect('login', 'refresh');
        }
}
public function print_joborder()
{
    if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {
         $id = $this->uri->segment(3);
         $data['quote_details'] = $this->quotation_model->show_quotation_individual_jobwork($id);
         $data['sub_desc'] = $this->quotation_model->show_subquotation_individual($id);
         $data['total'] = $this->quotation_model->show_overall_total($id);
         $this->load->view('pages/jobwork_pdf_details', $data);
        }
   else 
        {
           redirect('login', 'refresh');
        }
}

public function service_report()
{
    if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {
        $id = $this->uri->segment(3);
         $data['quote_details'] = $this->jobwork_model->show_service_report($id);
         $data['sub_desc'] = $this->quotation_model->show_subquotation_individual($id);
         $data['total'] = $this->quotation_model->show_overall_total($id);
         $this->load->view('pages/sr_pdf_details', $data);
        }
   else 
        {
           redirect('login', 'refresh');
        }
}
  
}
/* End of file create_pdf.php */
/* Location: ./application/controllers/create_pdf.php */