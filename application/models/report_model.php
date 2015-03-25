<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class  Report_model extends CI_Model
{
    function do_generate(){      

      $from = $this->input->post('from');
      $to = $this->input->post('to');

       $this->db->select('*');
       $this->db->from('quotation');
       $this->db->join('company', 'company.company_id = quotation.company_id');
       $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
       $this->db->where('quotation.remarks', 'reject');
       $this->db->where('quotation.date_of_quote >=',  $from);
       $this->db->where('quotation.date_of_quote <=',  $to);
       $this->db->order_by('quotation.date_of_quote','ASC');

       $query = $this->db->get();
       return $result = $query->result();

    }


   function show_search_rejected($from,$to){

       $this->db->select('*');
       $this->db->from('quotation');
       $this->db->join('company', 'company.company_id = quotation.company_id');
       $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
       $this->db->where('quotation.remarks', 'reject');
       $this->db->where('quotation.date_of_quote >=',  $from);
       $this->db->where('quotation.date_of_quote <=',  $to);
       $this->db->order_by('quotation.date_of_quote','ASC');

       $query = $this->db->get();
       return $result = $query->result();

   }

}
/* End of file report_model.php */
/* Location: ./application/models/report_model.php */

  

