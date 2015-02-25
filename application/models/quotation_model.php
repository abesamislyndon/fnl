<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class quotation_model extends CI_Model
{

   function add_quotation($company_name, $address, $tel_num, $fax_num, $email, $date_in, $term_payment, 
      $validity_period, $job_description,$sub_description, $sn, $quantity, $uom, $unit_price, $amount,
      $sub_total, $gst_total, $grand_total, $user_id)
     {

      $cal_date   = $date_in;
      $format     = strtotime($cal_date);
      $mysql_date = date('Y-m-d H:i:s', $format); 

     $qry = $this->db->select('company_name')->from('company')->where('company_name', $company_name)->get();
     $qry1 = $this->db->select('company_id')->from('company')->get();

     $row = array(
      'company_name' => $company_name,
      'address' => $address, 
      'tel_num' => $tel_num, 
      'fax_num' => $fax_num, 
      'email' => $email, 
    
      );

    if ($qry->num_rows() == 0)
     {
        $this->db->insert('company', $row); 
        $company_id = $this->db->insert_id();

        $row2 = array(
          'company_id' =>$company_id, 
          'term_payment' =>$term_payment, 
          'validity_period' =>$validity_period, 
          'job_description' =>$job_description, 
          'date_of_quote' => $mysql_date,
          'status' => 1  
          
          );

         $this->db->insert('quotation', $row2);  
         $quotation_id = $this->db->insert_id();
         $row_count = count($sub_description);
        
         for ($i = 0; $i < $row_count; $i++)
            {
                $row4[$i] = array(
                    'company_id' => $company_id,
                     'quotation_id' => $quotation_id,
                     'sub_description' => $sub_description[$i],
                     'sn' => $sn[$i],
                     'quantity' => $quantity[$i],
                     'uom' => $uom[$i],
                     'unit_price' => $unit_price[$i],
                     'amount' => $amount[$i],
                );
           }
          $this->db->insert_batch('quotation_details', $row4);  

          $row5 = array(
          'quotation_id' =>$quotation_id, 
          'sub_total' =>$sub_total, 
          'gst_total' =>$gst_total, 
          'grand_total' =>$grand_total, 
          );

           $this->db->insert('quotation_quote_total', $row5);  

     }
     else
     {

         $this->db->select('*');
         $this->db->where('company_name', $company_name);
         $q = $this->db->get('company');
         $data = $q->result_array();
         $company_id = $data[0]['company_id'];

         $row3 = array(
          'company_id' =>$company_id, 
          'term_payment' =>$term_payment, 
          'validity_period' =>$validity_period, 
          'job_description' =>$job_description, 
             'date_of_quote' => $mysql_date,
          'status' => 1 
          );

          $this->db->insert('quotation', $row3);
          $quotation_id = $this->db->insert_id();
          $row_count = count($sub_description);
          for ($i = 0; $i < $row_count; $i++)
            {
                $row4[$i] = array(
                    'company_id' => $company_id,
                     'quotation_id' => $quotation_id,
                     'sub_description' => $sub_description[$i],
                     'sn' => $sn[$i],
                     'quantity' => $quantity[$i],
                     'uom' => $uom[$i],
                     'unit_price' => $unit_price[$i],
                     'amount' => $amount[$i],
                );
           }
           $this->db->insert_batch('quotation_details', $row4);  

           $row5 = array(
          'quotation_id' =>$quotation_id, 
          'sub_total' =>$sub_total, 
          'gst_total' =>$gst_total, 
          'grand_total' =>$grand_total, 
          );

           $this->db->insert('quotation_quote_total', $row5);  

      }
     
        
    if ($user_id == '1') 
      {
       $data = '<i class="fa fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;JOB WORK SUCCESSFUL SEND';
             $this->session->set_flashdata('msg', $data);
             redirect('quotation/form');
      }
      else
      {
        $data = '<i class="fa fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;JOB WORK SUCCESSFUL SEND';
             $this->session->set_flashdata('msg', $data);
             redirect('quotation/form_surveyor');
      }
 
    }

    function company_exist_check()
        {
        $company_name = $this->input->post('company_name');
        $this->db->select('*');
        $this->db->from('company');
        $this->db->like('company_name', $company_name);
        $query = $this->db->get();
        return $result = $query->result();
        }

        function do_get_company($keyword)
        {
        $this->db->select('*');
        $this->db->like('company_name', $keyword, 'after');
        $this->db->group_by('company_name');
        $query = $this->db->get('company');
        $result = array();
        foreach($query->result_array() as $row):
            $result[] = array(
                'label' => $row['company_name'],
                'address' => $row['address'],
                'tel_num' => $row['tel_num'],
                'fax_num' => $row['fax_num'],
                'email' => $row['email'],
                   );
        endforeach;
        return $result;
        }

    public function record_count() 
    {
        return $this->db->count_all("quotation");
    }


     function show_quotationlist($limit, $start)
     {

        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
        $this->db->where('status', 1);
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
       
     function show_quotation_individual($quotation_id)
     {  
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id);
        $this->db->group_by('quotation.quotation_id');
        $q = $this->db->get();
        $result = $q->result();
        return $result;
     }

     function show_subquotation_individual($quotation_id)
     {
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id);
        $q = $this->db->get();
        $result = $q->result();
        return $result;
  
     }

     function show_overall_total($quotation_id)
     {
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id');
       $this->db->where('quotation_quote_total.quotation_id', $quotation_id);
        $q = $this->db->get();
        $result = $q->result();
        return $result;
     }

/*--- 
  update submitted quotation for quotation
*/
     function update_quotation_quotation($quotation_id){

      $quotation_details_id = $this->input->post('quotation_details_id');
      $company_name = $this->input->post('company_name');
      $address = $this->input->post('address');
      $tel_num = $this->input->post('tel_num');
      $fax_num = $this->input->post('fax_num');
      $email = $this->input->post('email');
      $date_in = $this->input->post('date_in');

      $term_payment = $this->input->post('term_payment');
      $validity_period = $this->input->post('validity_period');
      $job_description = $this->input->post('job_description');

      $sub_description = $this->input->post('sub_description');
      $sn = $this->input->post('sn');
      $quantity = $this->input->post('quantity');
      $uom = $this->input->post('uom');
      $unit_price = $this->input->post('unit_price');
      $amount = $this->input->post('amount');

      $sub_total = $this->input->post('sub_total');
      $gst_total = $this->input->post('gst_total');
      $grand_total = $this->input->post('grand_total');

      $row_count = count($sub_description);

       for($i=0; $i < $row_count; $i++)
       {
         $q = $this->db->select('quotation_details_id')->from('quotation_details')->where('quotation_details_id', $quotation_details_id[$i])->get();
         

           $row = array(
            'sn'=>$sn[$i],
            'sub_description'=>$sub_description[$i],
            'quantity'=>$quantity[$i],
            'uom'=>$uom[$i],
            'unit_price'=>$unit_price[$i],
            'amount'=>$amount[$i]
          );

          $row2 = array(
            'sub_total'=>$sub_total,
            'gst_total'=>$gst_total,
            'grand_total'=>$grand_total,
          );


          if ($q->num_rows() > 0) 
              {
                $this->db->from('quotation_details');
                $this->db->join('quotation_quote_total', 'quotation_details.quotation_id = quotation_quote_total.quotation_id');
                $this->db->where('quotation_details_id', $quotation_details_id[$i]);
                $this->db->update('quotation_details', $row);
                $this->db->update('quotation_quote_total', $row2);  
              }
          
        }
    
        
        $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
        redirect('quotation/individual_details/' . $quotation_id);
     }


     function add_quotation_desc($quotation_id){

      $quotation_details_id = $this->input->post('quotation_details_id');
      $company_name = $this->input->post('company_name');
      $address = $this->input->post('address');
      $tel_num = $this->input->post('tel_num');
      $fax_num = $this->input->post('fax_num');
      $email = $this->input->post('email');
      $date_in = $this->input->post('date_in');
      $count = $this->input->post('count');

      $term_payment = $this->input->post('term_payment');
      $validity_period = $this->input->post('validity_period');
      $job_description = $this->input->post('job_description');

      $sub_description = $this->input->post('sub_description');
      $sn = $this->input->post('sn');
      $quantity = $this->input->post('quantity');
      $uom = $this->input->post('uom');
      $unit_price = $this->input->post('unit_price');
      $amount = $this->input->post('amount');

      $sub_total = $this->input->post('sub_total');
      $gst_total = $this->input->post('gst_total');
      $grand_total = $this->input->post('grand_total');


      $row_count = count($sub_description);

       for($i=0; $i < $row_count; $i++)
       {
        $q = $this->db->select('quotation_details_id')->from('quotation_details')->where('quotation_details_id', $quotation_details_id[$i])->get();
             $row1 = array(
                'quotation_id'=>$quotation_id,
                'sn'=>$sn[$i],
                'sub_description'=>$sub_description[$i],
                'quantity'=>$quantity[$i],
                'uom'=>$uom[$i],
                'unit_price'=>$unit_price[$i],
                'amount'=>$amount[$i]
              );
        
            if($q->num_rows() == 0 ) 
             {
                $this->db->where('quotation_id', $quotation_id);
                $this->db->insert('quotation_details', $row1);
             } 
          
        }
    
        
        $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
        redirect('quotation/individual_details/' . $quotation_id);
     }


     function del_sub_desc($quotation_sub_id, $quotation_id){
      
        $this->db->select('*');
        $this->db->from('quotation_details');
        $this->db->where('quotation_details_id', $quotation_sub_id);
        $this->db->delete('quotation_details');

        $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
        redirect('quotation/individual_details/' . $quotation_id);

     }


     function approved_quotation_quotation($quotation_id){

        $row = array(
          'status'=> 2,
          );

        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation', $row);

        $this->session->set_flashdata('msg', 'quotation SUCCESFULLY APPROVED FOR QUOTATION');
        redirect('quotation/individual_details_approved/' . $quotation_id);

     }

     function count_pending_quote(){
    
        $this->db->select('status, COUNT(status) as total');
        $this->db->where('status', 1);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

     }

      function count_pending_jobwork(){
    
        $this->db->select('status, COUNT(status) as total');
        $this->db->where('status', 2);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

     }

    }
/* End of file category_model.php */
/* Location: ./application/models/crud_model.php */
  

