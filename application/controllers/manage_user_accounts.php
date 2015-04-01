<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Manage_user_accounts extends CI_Controller {
   function __construct()
    {
        parent::__construct();
        $this->load->model('quotation_model');
        $this->load->model('user');  
      
    }
    
/* *************************** Notification Controller ************************* */


 
    public function add_user()
    {
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1'){  

            $data['count_quote']   = $this->quotation_model->count_pending_quote();
            $data['count_jobwork'] = $this->quotation_model->count_pending_jobwork();
            $data['overdue']        = $this->quotation_model->count_overdue();
            $data['service_report']        = $this->quotation_model->count_service_report();
            $data['job_complete']        = $this->quotation_model->count_complete_jobwork();

            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar', $data);
            $this->load->view('pages/add_new_user');
            $this->load->view('scaffolds/footer');
       }
      else{
         redirect('login', 'refresh');
        }

    }


    public function do_add_user()
    {
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {
          $full_name = $this->input->post('full_name');
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $password1 = $this->input->post('password1');
          $role_code = $this->input->post('role_code');
    
        if ($this->input->post('submit')) 
        {
          $this->user->do_add_user_model($full_name, $username, $password, $password1, $role_code);
        }  
       }
      else
      {
        redirect('login', 'refresh');
      } 
    }




     public function user_account_list()
    {
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {  
        $this->load->model('user');
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['result_list'] = $this->user->user_all_list();
      
         if ($this->session->userdata['logged_in']['role_code'] == '1') 
          {
            $this->load->view('scaffolds/header', $data);
            $this->load->view('pages/user_account_list', $data);
            $this->load->view('scaffolds/footer', $data);
          }
          else
          {
            $this->load->view('scaffolds/header_normal', $data);
            $this->load->view('pages/user_account_list', $data);
            $this->load->view('scaffolds/footer', $data);
          }

       }
        else
        {
         redirect('login', 'refresh');
       }

    }

    public function update_user()
    {
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {  
         $this->load->model('user');
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $id = $this->input->get('id');
         $data['result_list'] = $this->user->user_update_individual($id);

      
         if ($this->session->userdata['logged_in']['role_code'] == '1') 
          {
            $this->load->view('scaffolds/header', $data);
            $this->load->view('pages/update_user', $data);
            $this->load->view('scaffolds/footer', $data);
          }
          else
          {
            $this->load->view('scaffolds/header_normal', $data);
            $this->load->view('pages/update_user', $data);
            $this->load->view('scaffolds/footer', $data);
          }

       }
        else
        {
         redirect('login', 'refresh');
       }

    }
    public function update_user_pwd()
    {
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {  
       
         $this->load->model('user');
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $id = $this->input->get('id');
         $data['result_list'] = $this->user->user_update_individual($id);

      
         if ($this->session->userdata['logged_in']['role_code'] == '1') 
          {
            $this->load->view('scaffolds/header', $data);
            $this->load->view('pages/update_pwd', $data);
            $this->load->view('scaffolds/footer', $data);
          }
          else
          {
            $this->load->view('scaffolds/header_normal', $data);
            $this->load->view('pages/update_pwd', $data);
            $this->load->view('scaffolds/footer', $data);
          }

       }
        else
        {
         redirect('login', 'refresh');
       }

    }

  public function do_update_user_pwd()
    {
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {  
         $this->load->model('user');
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];

         $id = $this->input->post('id');
         $password = $this->input->post('password');
         $new_password = $this->input->post('new_password');
         $confirm_password = $this->input->post('confirm_password');
        
        if ($this->input->post('submit')) 
        {
          $this->user->do_user_update_pwd($id ,$password, $new_password, $confirm_password);
        }
      } 
        else
        {
         redirect('login', 'refresh');
       }

    }


    public function update_user_details()
    {
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {  
         $this->load->model('user');
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];

         $id = $this->input->post('id');
         $full_name = $this->input->post('full_name');
         $tel_no = $this->input->post('tel_no');
         $password = $this->input->post('password');
         $username = $this->input->post('username');
         $role_code = $this->input->post('role_code');
        
        if ($this->input->post('submit')) 
        {
         $this->user->do_user_update_individual($id , $full_name, $tel_no, $username, $password, $role_code);
        }
       } 
        else
        {
         redirect('login', 'refresh');
       }

    }

    public function add_user_account()
    {  
        $this->load->model('user');  
        if ($this->input->post('submit')) 
        {
          $this->user->do_add_user_process();
        }  
        
         redirect('manage_user_accounts/add_user');  
    }

    public function del_user()
    {   
        $id = $this->input->post('id');
        $this->load->model('user');  
      

        $delete =  $this->user->do_user_del($id);
        if($delete)
         {
           echo "Success";
         }
         else
        {
          echo "Error";
        }
    }

  }