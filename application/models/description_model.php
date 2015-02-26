<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class  description_model extends CI_Model
{

    function add_description($sn, $sub_description){
        
        $row = array(

          'sn'=>$sn,
          'sub_description'=>$sub_description
          );

          $this->db->insert('description', $row);

        
          $this->session->set_flashdata('msg', 'description succesfully added');
         redirect('description');


    }


    function do_get_description($keyword)
        {
        $this->db->select('*');
        $this->db->like('sn', $keyword, 'after');
        $this->db->group_by('sn');
        $query = $this->db->get('description');
        $result = array();
        foreach($query->result_array() as $row):
            $result[] = array(
                'label' => $row['sn'],
                'sub_description' => $row['sub_description'],
                   );
        endforeach;
        return $result;
        }

}
/* End of file category_model.php */
/* Location: ./application/models/crud_model.php */

  

