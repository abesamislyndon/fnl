<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();


class Create_pdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("jobwork_model");
        $this->load->model("quotation_model");
        $this->load->model("report_model");
        
    }
    
    // *************************** CREATE PDF Controller ***************************************************************
    
    public function print_pending_quotation()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id                    = $this->uri->segment(3);
            $data['quote_details'] = $this->quotation_model->show_quotation_individual($id);
            $data['sub_desc']      = $this->quotation_model->show_subquotation_individual($id);
            $data['total']         = $this->quotation_model->show_overall_total($id);
            $this->load->view('pages/pending_pdf_quotation', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    public function print_joborder()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id                    = $this->uri->segment(3);
            $data['quote_details'] = $this->quotation_model->show_quotation_individual_jobwork($id);
            $data['sub_desc']      = $this->quotation_model->show_subquotation_individual($id);
            $data['total']         = $this->quotation_model->show_overall_total($id);
            $this->load->view('pages/jobwork_pdf_details', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function service_report()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id                    = $this->uri->segment(3);
            $data['quote_details'] = $this->jobwork_model->show_service_report($id);
            $data['sub_desc']      = $this->quotation_model->show_subquotation_individual($id);
            $data['total']         = $this->quotation_model->show_overall_total($id);
            $this->load->view('pages/sr_pdf_details', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function invoice_details()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id                    = $this->uri->segment(3);
            $data['quote_details'] = $this->quotation_model->show_invoice_details($id);
            $data['sub_desc']      = $this->quotation_model->show_subquotation_individual($id);
            $data['total']         = $this->quotation_model->show_overall_total($id);
            $this->load->view('pages/invoice_details', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
      
    public function search_report_rejected()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            
            $from = $this->uri->segment(3);
            $to   = $this->uri->segment(4);
            
            $data['from'] = $from;
            $data['to']   = $to;
            
            $data['result'] = $this->report_model->show_search_rejected($from, $to);
            $this->load->view('pages/report_search_rejected', $data);
        }
        
        else {
            redirect('login', 'refresh');
        }
    }
    
    public function search_report_complete()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            
            $from = $this->uri->segment(3);
            $to   = $this->uri->segment(4);
            
            $data['from'] = $from;
            $data['to']   = $to;
            
            $data['result'] = $this->report_model->show_search_complete($from, $to);
            $this->load->view('pages/report_search_complete', $data);
        }
        
        else {
            redirect('login', 'refresh');
        }
    }
    
}
/* End of file create_pdf.php */
/* Location: ./application/controllers/create_pdf.php */