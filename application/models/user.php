<?php
Class User extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
     
    function login($username, $password) 
    {   
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
         
        $query = $this->db->get();
        if($query->num_rows() == 1) 
        { 
         
            return $query->result(); 
        } 
        else 
        {
            return false; 
        }
    }
    
    function salesman()
        {
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where('role_code', '3');
          $query = $this->db->get();
          return $query->result();
        }

    function user_all_list()
    {
          $this->db->select('*');
          $this->db->from('users')->order_by('role_code');
          $query = $this->db->get();
          return $query->result();
    }
     function user_update_individual($id)
    {
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where('id', $id);
          $query = $this->db->get();
          return $query->result();
    }

    function do_user_update_individual($id, $full_name, $tel_no, $username, $password, $role_code)
   {

        $data = array(
         'full_name'=>$full_name,
         'tel_no'=>$tel_no,
         'username'=>$username,
         //'password'=>md5($password),
         'role_code'=>$role_code
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('msg', 'SUCCESFULLY ADDED USER');
        redirect('manage_user_accounts/update_user?id='. $id);
    }

   function do_user_update_pwd($id,  $password, $new_password, $confirm_password)
   {

        $query=$this->db->query("select * from users where id=".$id); 

        foreach ($query->result() as $value) 
        {
         
         $db_password = $value->password;
         $db_id = $value->id;

         }      
           if ((md5($password) == $db_password) && ($new_password == $confirm_password ) ) 
           {       
           
             $data = array(
            'password'=>md5($new_password), 
              );
    
             $this->db->where('id', $id);
             $this->db->update('users', $data);
             $this->session->set_flashdata('msg', 'SUCCESFULLY UPDATED PASSWORD USER');
             redirect('manage_user_accounts/update_user_pwd?id='. $id);
           }
           else
           {
              $this->session->set_flashdata('msg', 'DID NOT MATCH NEW PASSSWORD OR OLD PASSWORD PROBLEM');
              redirect('manage_user_accounts/update_user_pwd?id='. $id);
           }
    }


    function do_add_user_model($full_name, $username, $password, $password1, $role_code)
    {
        $full_name = $this->input->post('full_name');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password1 = $this->input->post('password1');
        $role_code = $this->input->post('role_code');
 
        $data = array(
         'full_name'=>$full_name,
         'username'=>$username,
         'password'=>md5($password),
         'role_code'=>$role_code
        );
      if($password == $password1)
      {
       $qry = $this->db->select('username')->from('users')->where('username', $username)->get();

       if ($qry->num_rows == 0) 
       {
        $this->db->insert('users', $data);
        $this->session->set_flashdata('msg', 'SUCCESFULLY ADDED USER');
         redirect('manageUser/add_user');
      
       }
       else
       {
          $this->session->set_flashdata('msg', 'username already exist');
       }
      }else
      {
        $this->session->set_flashdata('msg', 'Password does not Match');
                 redirect('manageUser/add_user');
      } 
    }
     

     
    
    function do_user_del($id)
    {
    
      $this->db->where('id', $id);
      $this->db->delete('users');

      $this->session->set_flashdata('msg', 'SUCCESSFULLY DELETE');
      redirect('manage_user_accounts/user_account_list');
    }     

  
}

/* End of file user.php */
/* Location: ./application/models/user.php */