<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Quotation extends CI_Controller
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
	      $this->load->view('scaffolds/header');
	      $this->load->view('scaffolds/sidebar');
		    $this->load->view('pages/dashboard');
		    $this->load->view('scaffolds/footer');
     }else
		 {
			redirect('login', 'refresh');
	  	}	
	  }

    public function form()
    {
    if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {
       $data['count_quote'] = $this->quotation_model->count_pending_quote();
       $data['count_jobwork'] = $this->quotation_model->count_pending_jobwork();

	     $this->load->view('scaffolds/header');
	     $this->load->view('scaffolds/sidebar', $data);
		   $this->load->view('pages/form');
		   $this->load->view('scaffolds/footer');
     }
     else
		{
			redirect('login', 'refresh');
		}	
	 
    }

    public function form_surveyor()
    {
    if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '2')
     {
	    $this->load->view('scaffolds/header');
		$this->load->view('pages/form_surveyor');
		$this->load->view('scaffolds/footer');
     }
     else
		{
			redirect('login', 'refresh');
		}	
	 
    }

    public function do_add_quotation()
    {
    if($this->session->userdata('logged_in'))
     {
	    $company_name = $this->input->post('company_name');
	    $address = $this->input->post('address');
	    $tel_num = $this->input->post('tel_num');
	    $fax_num = $this->input->post('fax_num');
	    $email = $this->input->post('email');
	    $date_in = $this->input->post('quotation_date_in');
	    $term_payment = $this->input->post('term_payment');
	    $validity_period = $this->input->post('validity_period');
	    $job_description = $this->input->post('job_description');
	    $sub_description = $this->input->post('sub_description');
	    $sn = $this->input->post('sn');
	    $quantity = $this->input->post('quantity');
	    $uom = $this->input->post('uom');
	    $unit_price = $this->input->post('unit_price');
	    $amount = $this->input->post('amount');
	    $sub_total = $this->input->post('sub_total');
	    $gst_total = $this->input->post('gst_total');
	    $grand_total = $this->input->post('grand_total');
      $user_id = $this->session->userdata['logged_in']['role_code'];

	    if($this->input->post('submit'))
	    {
	    	$this->quotation_model->add_quotation($company_name, 
        $address, $tel_num, $fax_num, $email, $date_in, 
        $term_payment, $validity_period, $job_description, 
        $sub_description, $sn, $quantity, $uom, $unit_price, $amount,
        $sub_total, $gst_total, $grand_total, $user_id);
	    }
	 }
     else
		{
			redirect('login', 'refresh');
		}	
	 
    }

   public function get_company()
   {
      $keyword = $_GET['term'];
      $data = $this->quotation_model->do_get_company($keyword);
      echo json_encode($data);
      flush();

   }


   public function quotationlist()
   {
   if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {

        $config = array();
        $config["base_url"] = base_url().'quotation/quotationlist';
        $config["total_rows"] = $this->quotation_model->record_count();
        $config["per_page"] = 12;
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
        $data["quotation_list"] = $this->quotation_model->show_quotationlist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['count_quote'] = $this->quotation_model->count_pending_quote();
        $data['count_jobwork'] = $this->quotation_model->count_pending_jobwork();

	      $this->load->view('scaffolds/header');
	      $this->load->view('scaffolds/sidebar', $data);
		    $this->load->view('pages/quotationlist', $data);
		    $this->load->view('scaffolds/footer');
     }
     else
		{
			redirect('login', 'refresh');
		}	
	 
    }

    public function individual_details()
    {
      if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        { 
           $quotation_id = $this->uri->segment(3);
           $data['quotation_list_individual'] = $this->quotation_model->show_quotation_individual($quotation_id);
           $data['sub_description_individual'] = $this->quotation_model->show_subquotation_individual($quotation_id);
           $data['overall_total_details'] = $this->quotation_model->show_overall_total($quotation_id);
       $data['count_quote'] = $this->quotation_model->count_pending_quote();
        $data['count_jobwork'] = $this->quotation_model->count_pending_jobwork();

           $this->load->view('scaffolds/header');
	       $this->load->view('scaffolds/sidebar', $data);
		   $this->load->view('pages/quotationlist_individual', $data);
	       $this->load->view('scaffolds/footer');
       }
       else 
        {
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
           $data['count_quote'] = $this->quotation_model->count_pending_quote();
           $data['count_jobwork'] = $this->quotation_model->count_pending_jobwork();

           $this->load->view('scaffolds/header');
	         $this->load->view('scaffolds/sidebar', $data);
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
        if($this->input->post('add_desc'))
        {
          $this->quotation_model->add_quotation_desc($quotation_id);
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

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */