<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Jobwork extends CI_Controller
{
   function __construct()
   {
     parent::__construct();
     $this->load->model('jobwork_model');
     $this->load->model('quotation_model');
   }
   
   public function get_company()
   {
      $keyword = $_GET['term'];
      $data = $this->jobwork_model->do_get_company($keyword);
      echo json_encode($data);
      flush();

   }

   public function jobwork_list()
   {
   if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {

        $config = array();
        $config["base_url"] = base_url().'jobwork/jobwork_list';
        $config["total_rows"] = $this->jobwork_model->record_count();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = "<ul class='pagination'>";
    		$config['full_tag_close'] ="</ul>";
    		$config['num_tag_open'] = '<li>';
    		$config['num_tag_close'] = '</li>';
    		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    		$config['next_tag_open'] = "<li>";
    		$config['next_tagl_close'] = "</li>";
    		$config['prev_tag_open'] = "<li>";
    		$config['prev_tagl_close'] = "</li>";
    		$config['first_tag_open'] = "<li>";
    		$config['first_tagl_close'] = "</li>";
    		$config['last_tag_open'] = "<li>";
    		$config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["jobwork_list"] = $this->jobwork_model->show_jobwork_list($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['count_quote'] = $this->quotation_model->count_pending_quote();
        $data['count_jobwork'] = $this->quotation_model->count_pending_jobwork();
        $data['overdue'] = $this->quotation_model->count_overdue();
        $data['service_report']        = $this->quotation_model->count_service_report();
        $data['job_complete']        = $this->quotation_model->count_complete_jobwork();

	     $this->load->view('scaffolds/header');
	     $this->load->view('scaffolds/sidebar',$data);
		   $this->load->view('pages/jobwork_list', $data);
		   $this->load->view('scaffolds/footer');
     }
     else
		 {
			redirect('login', 'refresh');
		 }	
	 
   }

    public function individual_details_with_jobwork()
    {
      if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        { 
           $quotation_id = $this->uri->segment(3);
           $data['quotation_list_individual'] = $this->quotation_model->show_quotation_individual_jobwork($quotation_id);
           $data['sub_description_individual'] = $this->quotation_model->show_subquotation_individual($quotation_id);
           $data['overall_total_details'] = $this->quotation_model->show_overall_total($quotation_id);

           

           $this->load->view('scaffolds/header');
	         $this->load->view('scaffolds/sidebar');
		       $this->load->view('pages/jobwork_individual', $data);
	         $this->load->view('scaffolds/footer');
       }
       else 
        {
           redirect('login', 'refresh');
        }

    }


   public function jobwork_complete_success()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
        
            $data['count_quote']    = $this->quotation_model->count_pending_quote();
            $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
            $data['overdue']        = $this->quotation_model->count_overdue();
            $data['service_report'] = $this->quotation_model->count_service_report();
            $data['job_complete']   = $this->quotation_model->count_complete_jobwork();

            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar', $data);
            $this->load->view('pages/success_jobwork_complete');
            $this->load->view('scaffolds/footer');
        } else {
            redirect('login', 'refresh');
        }
        
    }

    public function individual_details_approved()
    {
      if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        { 
           $quotation_id = $this->uri->segment(3);
           $data['quotation_list_individual'] = $this->quotation_model->show_quotation_individual($quotation_id);
           $data['sub_description_individual'] = $this->quotation_model->show_subquotation_individual($quotation_id);
           $data['overall_total_details'] = $this->quotation_model->show_overall_total($quotation_id);

           $this->load->view('scaffolds/header');
	         $this->load->view('scaffolds/sidebar');
		       $this->load->view('pages/quotationlist_individual_approved', $data);
	         $this->load->view('scaffolds/footer');
       }
       else 
        {
           redirect('login', 'refresh');
        }

    }

    public function process_quotation_quotation()
    {
 		if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
  		 {

  		 	$quotation_id = $this->input->post('quotation_id');

  		 	if($this->input->post('update'))
  		 	{
  		 		$this->quotation_model->update_quotation_quotation($quotation_id);
  		 	}
  		   if($this->input->post('approved'))
  		 	{
  		 		$this->quotation_model->approved_quotation_quotation($quotation_id);
  		 	}

         }
        else 
        {
           redirect('login', 'refresh');
        }

    }

}

/* End of file jobwork.php */
/* Location: ./application/controllers/jobwork.php */