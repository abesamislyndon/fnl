<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Search extends CI_Controller
{
   function __construct()
   {
     parent::__construct();
     $this->load->model('jobwork_model');
     $this->load->model('quotation_model');
   }
   
  public function quotation_search(){

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
            //$data['total1']        = $this->quotation_model->total1(2);
            $data['job_complete']        = $this->quotation_model->count_complete_jobwork();



            
            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar', $data);
            $this->load->view('pages/search_quotation', $data);
            $this->load->view('scaffolds/footer');
        } else {
            redirect('login', 'refresh');
        }
     }

       public function company_search(){

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
            //$data['total1']        = $this->quotation_model->total1(2);
            $data['job_complete']        = $this->quotation_model->count_complete_jobwork();



            
            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar', $data);
            $this->load->view('pages/search_company', $data);
            $this->load->view('scaffolds/footer');
        } else {
            redirect('login', 'refresh');
        }
     }


      public function sr_search(){

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
                //$data['total1']        = $this->quotation_model->total1(2);
                $data['job_complete']        = $this->quotation_model->count_complete_jobwork();
        
                $this->load->view('scaffolds/header');
                $this->load->view('scaffolds/sidebar', $data);
                $this->load->view('pages/search_sr', $data);
                $this->load->view('scaffolds/footer');
            } else {
                redirect('login', 'refresh');
            }
         }


      public function invoice_search(){

          if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
                
                $config                     = array();
                $config["base_url"]         = base_url() . 'search/invoice_search';
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
                $data["quotation_list"] = $this->quotation_model->show_invoice_list($config["per_page"], $page);
                $data["links"]          = $this->pagination->create_links();
                $data['count_quote']    = $this->quotation_model->count_pending_quote();
                $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
                $data['overdue']        = $this->quotation_model->count_overdue();
                $data['service_report']        = $this->quotation_model->count_service_report();
                //$data['total1']        = $this->quotation_model->total1(2);
                $data['job_complete']        = $this->quotation_model->count_complete_jobwork();
        
                $this->load->view('scaffolds/header');
                $this->load->view('scaffolds/sidebar', $data);
                $this->load->view('pages/search_invoice', $data);
                $this->load->view('scaffolds/footer');
            } else {
                redirect('login', 'refresh');
            }
         }




     public function get_result_quotation(){
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1'){

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


          
            $quotation_id = $this->input->get('name');
            $data['res'] = $this->quotation_model->fetch_search($quotation_id);

            $this->load->view('pages/result', $data);

         
          } else {
            redirect('login', 'refresh');
        }  
     }
   
     public function get_result_company(){
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1'){

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


          
            $company_name = $this->input->get('name');
            $data['res'] = $this->quotation_model->fetch_search_company($company_name);

            $this->load->view('pages/result_company', $data);

         
          } else {
            redirect('login', 'refresh');
        }  
     }


     public function get_result_sr(){
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1'){

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


          
            $service_report = $this->input->get('name');
            $data['res'] = $this->quotation_model->fetch_search_sr($service_report);

            $this->load->view('pages/result_sr', $data);

         
          } else {
            redirect('login', 'refresh');
        }  
     }


     public function get_result_invoice(){
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1'){

            $config                     = array();
            $config["base_url"]         = base_url() . 'search/get_result_invoice';
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
            $data["quotation_list"] = $this->quotation_model->show_invoice_details($config["per_page"], $page);
            $data["links"]          = $this->pagination->create_links();
          
            $service_report = $this->input->get('name');
            $data['res'] = $this->quotation_model->fetch_search_invoice($service_report);

            $this->load->view('pages/result_invoice', $data);

         
          } else {
            redirect('login', 'refresh');
        }  
     }



}

/* End of file jobwork.php */
/* Location: ./application/controllers/jobwork.php */