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
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            
            $data['count_quote']    = $this->quotation_model->count_pending_quote();
            $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
            $data['overdue']        = $this->quotation_model->count_overdue();
            $data['service_report'] = $this->quotation_model->count_service_report();
            $data['job_complete']   = $this->quotation_model->count_complete_jobwork();
            
            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar', $data);
            $this->load->view('pages/add_description');
            $this->load->view('scaffolds/footer');
            
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function do_add_description()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            
            
            if ($this->input->post('submit_desc')) {
                
                $sn              = $this->input->post('sn');
                $sub_description = $this->input->post('sub_description');
                
                $this->description_model->add_description($sn, $sub_description);
                
            }
            
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function get_description()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1' or $this->session->userdata['logged_in']['role_code'] == '2') {
            $keyword = $_GET['term'];
            $data    = $this->description_model->do_get_description($keyword);
            echo json_encode($data);
            flush();
            
        } else {
            redirect('login', 'refresh');

        }
        
    }


    public function  check_sn()
   {
            $this->load->library('form_validation');

            $serviceNum =  $this->input->post('name');
            $result     =  $this->description_model->check_sn_details($serviceNum);
            if($result)
            {
            echo "false"; 
            }
            else
            {
            echo "true";
            }      
   }
    
    public function description_list()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            
            $config                     = array();
            $config["base_url"]         = base_url() . 'description/description_list';
            $config["total_rows"]       = $this->description_model->record_count();
            $config["per_page"]         = 15;
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
            $data["desc_list"]      = $this->description_model->show_description_list($config["per_page"], $page);
            $data["links"]          = $this->pagination->create_links();
            $data['count_quote']    = $this->quotation_model->count_pending_quote();
            $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
            $data['overdue']        = $this->quotation_model->count_overdue();
            $data['service_report'] = $this->quotation_model->count_service_report();
            $data['job_complete']   = $this->quotation_model->count_complete_jobwork();
            
            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar', $data);
            $this->load->view('pages/description_list', $data);
            $this->load->view('scaffolds/footer');
        } else {
            redirect('login', 'refresh');

        }
        
    }
    


    

    public function del_desc()
    {
        $id     = $this->uri->segment(3);
        $delete = $this->description_model->do_desc_del($id);
    }
    
  
  public function update_description_individual(){

    $id     = $this->uri->segment(3);
    $data['count_quote']    = $this->quotation_model->count_pending_quote();
    $data['count_jobwork']  = $this->quotation_model->count_pending_jobwork();
    $data['overdue']        = $this->quotation_model->count_overdue();
    $data['service_report'] = $this->quotation_model->count_service_report();
    $data['job_complete']   = $this->quotation_model->count_complete_jobwork();
    $data['desc_list'] = $this->description_model->show_description($id);
    
    $this->load->view('scaffolds/header');
    $this->load->view('scaffolds/sidebar', $data);
    $this->load->view('pages/update_description');
    $this->load->view('scaffolds/footer');



  }  





 
 public function do_update_description()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            
            
            if ($this->input->post('submit_desc')) {
                
                $sub_description = $this->input->post('sub_description');
                
                $this->description_model->do_update_desc($sub_description);
                
            }
            
        } else {
            redirect('login', 'refresh');
        }
    } 



}

/* End of file description.php */
/* Location: ./application/controllers/description.php */
