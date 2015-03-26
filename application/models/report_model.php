<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class  Report_model extends CI_Model
{
    function do_generate_reject(){      

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

  function do_generate_complete(){      

      $from = $this->input->post('from');
      $to = $this->input->post('to');

       $this->db->select('*');
       $this->db->from('quotation');
       $this->db->join('company', 'company.company_id = quotation.company_id');
       $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
       $this->db->where('quotation.remarks', 'approved');
       $this->db->where('quotation.date_of_quote >=',  $from);
       $this->db->where('quotation.date_of_quote <=',  $to);
       $this->db->order_by('quotation.date_of_quote','ASC');

       $query = $this->db->get();
       return $result = $query->result();

    }


  function do_generate_invoice(){      

      $from = $this->input->post('from');
      $to = $this->input->post('to');

       $this->db->select('*');
       $this->db->from('quotation');
       $this->db->join('company', 'company.company_id = quotation.company_id');
       $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
       $this->db->join('service_report', 'service_report.quotation_id = quotation.quotation_id ');
       $this->db->where('service_report.remarks','checkout with invoice');
       $this->db->where('service_report.sr_date >=',  $from);
       $this->db->where('service_report.sr_date <=',  $to);
       $this->db->order_by('service_report.service_report_id','ASC');

       $query = $this->db->get();
       return $result = $query->result();

    }

   function show_search_rejected($from,$to){

       $this->db->select('*');
       $this->db->from('quotation');
       $this->db->join('company', 'company.company_id = quotation.company_id');
       $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
       $this->db->where('quotation.remarks', 'reject')->group_by('quotation.quotation_id');
       $this->db->where('quotation.date_of_quote >=',  $from);
       $this->db->where('quotation.date_of_quote <=',  $to);
       $this->db->order_by('quotation.date_of_quote','ASC');

       $query = $this->db->get();
       return $result = $query->result();

   }


   function show_search_complete($from,$to){

       $this->db->select('*');
       $this->db->from('quotation');
       $this->db->join('company', 'company.company_id = quotation.company_id');
       $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
       $this->db->where('quotation.remarks', 'approved');
       $this->db->where('quotation.date_of_quote >=',  $from);
       $this->db->where('quotation.date_of_quote <=',  $to);
       $this->db->order_by('quotation.date_of_quote','ASC');

       $query = $this->db->get();
       return $result = $query->result();

   }



}
/* End of file report_model.php */
/* Location: ./application/models/report_model.php */

  

