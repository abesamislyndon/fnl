<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class VerifyLogin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user', 'login', TRUE);
    }
    
    // *************************** Default Login Page Controller ***************************************************************   
    
    function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('pages/login');
        } 
        else 
        {         
            if($this->session->userdata['logged_in']['role_code'] == '1')
              {
                   redirect(base_url('dashboard'), 'refresh');
              }
           if($this->session->userdata['logged_in']['role_code'] == '2')
              {
                redirect(base_url('jobwork/form_surveyor'), 'refresh');
              }  
      
          }
        
    }
    
    // *************************** Chaeck and Verufy User Aunthentication in Database *******************************
    
    function check_database($password)
    {
        $this->load->model('user');
        $username = $this->input->post('username'); 
        $result   = $this->login->login($username,$password);
        
        if ($result) 
        {
            $sess_array = array();
            foreach ($result as $row) 
            {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'role_code'=>$row->role_code
            
                );
  
               $this->session->set_userdata('logged_in', $sess_array);
    
            }
            return TRUE;
        } 
        else 
        {
            
            $this->form_validation->set_message('check_database', 'Invalid username or password <i class="fa fa-exclamation-circle"></i>');
            return FALSE;
        }
    }
}

/* End of file verifylogin.php */
/* Location: ./application/controllers/verifylogin.php */
