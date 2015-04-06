<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Notify extends CI_Controller
{
   function __construct()
   {
     parent::__construct();
     $this->load->model('jobwork_model');
     $this->load->model('quotation_model');
   }
   


  public function create(){

        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
         
           $data['result'] =  $this->quotation_model->realtime();
            var_dump($data);

        } else {
            redirect('login', 'refresh');
        }
        
    }



   
}

/* End of file jobwork.php */
/* Location: ./application/controllers/jobwork.php */