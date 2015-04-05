<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class  Description_model extends CI_Model
{
    function add_description($sn, $sub_description){
        $row = array(
          'sn'=>$sn,
          'sub_description'=>strip_tags($sub_description)
          );

          $this->db->insert('description', $row);
          $this->session->set_flashdata('msg', 'description succesfully added');
          redirect('description');
    }

    function do_get_description($keyword){
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

    function show_description_list($limit, $start){
        $this->db->select('*');
        $this->db->from('description');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count()
    {
        return $this->db->count_all("quotation");
    }
      

    function do_desc_del($id){
      
      $this->db->where('sn_id', $id);
      $this->db->delete('description');

      $this->session->set_flashdata('msg', 'SUCCESSFULLY DELETE');
      redirect('description/description_list');
    }   


  function show_description($id){

      $this->db->select('*');
      $this->db->from('description');
      $this->db->where('sn', $id);
      $query = $this->db->get();
      return $result = $query->result();
  }



    function do_update_desc($id){

       $id = $this->input->post('sn');
       $sub_description = strip_tags($this->input->post('sub_description'));
      
       $data = array(
       'sub_description'=>$sub_description,
      );

      $this->db->where('sn', $id);
      $this->db->update('description', $data);
      $this->session->set_flashdata('msg', 'SUCCESFULLY UPDATED USER');
      redirect('description/update_description_individual/'. $id);
    }  


}
/* End of file category_model.php */
/* Location: ./application/models/crud_model.php */

  

