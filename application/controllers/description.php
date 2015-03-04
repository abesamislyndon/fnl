<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Description extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('quotation_model');
        $this->load->model('description_model');
    }
    
    // *************************** Default Login Page Controller ***************************************************************   
    
    public function index()
    {   
     if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {
           
        $data['count_quote'] = $this->quotation_model->count_pending_quote();
        $data['count_jobwork'] = $this->quotation_model->count_pending_jobwork();
        
        $this->load->view('scaffolds/header');
        $this->load->view('scaffolds/sidebar',$data);
        $this->load->view('pages/add_description');
        $this->load->view('scaffolds/footer');
    
     }else
         {
            redirect('login', 'refresh');
        }   
     }


    public function  do_add_description()
    {   
     if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {
           
    
        if ($this->input->post('submit_desc')) {
            
            $sn = $this->input->post('sn');
            $sub_description = $this->input->post('sub_description');

            $this->description_model->add_description($sn, $sub_description);


        }
        
    
     }else{
            redirect('login', 'refresh');
        }   
     }

    public function  get_description()
    {   
     if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {    
        $keyword = $_GET['term'];
        $data = $this->description_model->do_get_description($keyword);
        echo json_encode($data);
        flush();

      } else{
            redirect('login', 'refresh');
        }

   }        
     







  }  

/* End of file verifylogin.php */
/* Location: ./application/controllers/verifylogin.php */
