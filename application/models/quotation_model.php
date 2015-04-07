<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class quotation_model extends CI_Model
{
    
    function add_quotation($company_name, $address, $tel_num, $fax_num, $email, $date_in, $term_payment, $validity_period, $job_description, $sub_description, $sn, $quantity, $uom, $unit_price, $amount, $sub_total, $gst_total, $grand_total, $user_id, $sales_exe)
    {
        
        $cal_date   = $date_in;
        $format     = strtotime($cal_date);
        $mysql_date = date('Y-m-d H:i:s', $format);
        
        $qry  = $this->db->select('company_name')->from('company')->where('company_name', $company_name)->get();
        $qry1 = $this->db->select('company_id')->from('company')->get();
        
        $row = array(
            'company_name' => $company_name,
            'address' => $address,
            'tel_num' => $tel_num,
            'fax_num' => $fax_num,
            'email' => $email
            
        );
        
        if ($qry->num_rows() == 0) {
            $this->db->insert('company', $row);
            $company_id = $this->db->insert_id();
            
            $row2 = array(
                'company_id' => $company_id,
                'term_payment' => $term_payment,
                'validity_period' => $validity_period,
                'job_description' => $job_description,
                'date_of_quote' => $mysql_date,
                'status' => 1,
                'sales_exe' => $sales_exe 
            );
            
            $this->db->insert('quotation', $row2);
            $quotation_id = $this->db->insert_id();
            $row_count    = count($sub_description);
            
            for ($i = 0; $i < $row_count; $i++) {
                $row4[$i] = array(
                    'company_id' => $company_id,
                    'quotation_id' => $quotation_id,
                    'sub_description' => $sub_description[$i],
                    'sn' => $sn[$i],
                    'quantity' => $quantity[$i],
                    'uom' => $uom[$i],
                    'unit_price' => $unit_price[$i],
                    'amount' => $amount[$i],
                    'sales_exe' => $sales_exe
                );
            }

            $this->db->insert_batch('quotation_details', $row4);
            
            $row5 = array(
                'quotation_id' => $quotation_id,
                'sub_total' => $sub_total,
                'gst_total' => $gst_total,
                'grand_total' => $grand_total
            );
            
            $this->db->insert('quotation_quote_total', $row5);
            
        } else {
            
            $this->db->select('*');
            $this->db->where('company_name', $company_name);
            $q          = $this->db->get('company');
            $data       = $q->result_array();
            $company_id = $data[0]['company_id'];
            
            $row3 = array(
                'company_id' => $company_id,
                'term_payment' => $term_payment,
                'validity_period' => $validity_period,
                'job_description' => $job_description,
                'date_of_quote' => $mysql_date,
                'status' => 1,
                'sales_exe' => $sales_exe
            );
            
            $this->db->insert('quotation', $row3);
            $quotation_id = $this->db->insert_id();
            $row_count    = count($sub_description);
            for ($i = 0; $i < $row_count; $i++) {
                $row4[$i] = array(
                    'company_id' => $company_id,
                    'quotation_id' => $quotation_id,
                    'sub_description' => $sub_description[$i],
                    'sn' => $sn[$i],
                    'quantity' => $quantity[$i],
                    'uom' => $uom[$i],
                    'unit_price' => $unit_price[$i],
                    'amount' => $amount[$i],
                    'sales_exe' => $sales_exe
                );
            }
            $this->db->insert_batch('quotation_details', $row4);
            
            $row5 = array(
                'quotation_id' => $quotation_id,
                'sub_total' => $sub_total,
                'gst_total' => $gst_total,
                'grand_total' => $grand_total
            );
            
            $this->db->insert('quotation_quote_total', $row5);
            
        }
        
        
        if ($user_id == '1') {
            $data = '<i class="fa fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;JOB WORK SUCCESSFULLY SEND';
            $this->session->set_flashdata('msg', $data);
            redirect('quotation/form_success_admin');
        } else {
            $data = '<i class="fa fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;JOB WORK SUCCESSFULLY SEND';
            $this->session->set_flashdata('msg', $data);
            redirect('quotation/form_success');
        }
        
    }

    function check_double_entry(){
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->insert_id();
        $query = $this->db->get();
        return $result = $query->result();
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
        $query  = $this->db->get('company');
        $result = array();
        foreach ($query->result_array() as $row):
            $result[] = array(
                'label' => $row['company_name'],
                'address' => $row['address'],
                'tel_num' => $row['tel_num'],
                'fax_num' => $row['fax_num'],
                'email' => $row['email']
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
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->where('status', 1);
        $this->db->group_by('quotation.quotation_id');
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

    function show_invoice_list($limit, $start)
    {
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
        $this->db->join('service_report', 'service_report.quotation_id = quotation.quotation_id ');
        $this->db->where('service_report.remarks','checkout with invoice');
        $this->db->group_by('quotation.quotation_id');
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
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
    }

    function show_invoice_details($quotation_id)
    {
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->join('invoice', 'invoice.quotation_id = quotation.quotation_id');
        $this->db->join('service_report', 'service_report.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id);
        $this->db->group_by('quotation.quotation_id');
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
    }

    function show_quotation_individual_jobwork($quotation_id)
    {
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->join('jobwork', 'jobwork.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id);
        $this->db->group_by('quotation.quotation_id');
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
    }

    function show_jobwork_with_sales_exe($quotation_id)
    {
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->join('jobwork', 'jobwork.quotation_id = quotation.quotation_id');
        $this->db->join('job_complete', 'job_complete.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id);
        $this->db->group_by('quotation.quotation_id');
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
    }

    function total($quotation_id)
    {
        $this->db->select('SUM(amount) as total', FALSE);
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->join('jobwork', 'jobwork.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id);
        $this->db->group_by('quotation.quotation_id');
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
    }

    function total1($quotation_id)
    {
        $this->db->select('SUM(amount) as total', FALSE);
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id);
        $this->db->group_by('quotation.quotation_id');
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
    }
    
    function show_subquotation_individual($quotation_id){

        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id);
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
        
    }
        function show_sales_individual($quotation_id){

        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id)->group_by('quotation.quotation_id');
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
        
    }
    
    function show_overall_total($quotation_id){

        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_quote_total.quotation_id', $quotation_id);
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
    }
    
    /*---  update submitted quotation for quotation -----*/
    function update_quotation_quotation($quotation_id, $date_in){
        
        $quotation_details_id = $this->input->post('quotation_details_id');
        $company_name         = $this->input->post('company_name');
        $address              = $this->input->post('address');
        $tel_num              = $this->input->post('tel_num');
        $fax_num              = $this->input->post('fax_num');
        $email                = $this->input->post('email');
          
        $term_payment    = $this->input->post('term_payment');
        $validity_period = $this->input->post('validity_period');
        $job_description = $this->input->post('job_description');
        
        $sub_description = $this->input->post('sub_description');
        $sn              = $this->input->post('sn');
        $quantity        = $this->input->post('quantity');
        $uom             = $this->input->post('uom');
        $unit_price      = $this->input->post('unit_price');
        $amount          = $this->input->post('amount');
        
        $sub_total   = $this->input->post('sub_total');
        $gst_total   = $this->input->post('gst_total');
        $grand_total = $this->input->post('grand_total');
        
        $row_count = count($sub_description);
        
        for ($i = 0; $i < $row_count; $i++) {
            $q = $this->db->select('quotation_details_id')->from('quotation_details')->where('quotation_details_id', $quotation_details_id[$i])->get();
            
            $row = array(
                'sn' => $sn[$i],
                'sub_description' => $sub_description[$i],
                'quantity' => $quantity[$i],
                'uom' => $uom[$i],
                'unit_price' => $unit_price[$i],
                'amount' => $amount[$i]
            );
             
            if ($q->num_rows() > 0) {
                $this->db->from('quotation_details');
                $this->db->join('quotation_quote_total', 'quotation_details.quotation_id = quotation_quote_total.quotation_id');
                $this->db->join('quotation', 'quotation.quotation_id = quotation_details.quotation_id');
                $this->db->where('quotation_details_id', $quotation_details_id[$i]);
                $this->db->update('quotation_details', $row);
            }
        
         $row2 = array(
            'sub_total' => $sub_total,
            'gst_total' => $gst_total,
            'grand_total' => $grand_total);

         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('quotation_quote_total', $row2);
         
         
         $cal_date   = $date_in;
         $format     = strtotime($cal_date);
         $mysql_date = date('Y-m-d H:i:s', $format);

         $row3 = array(
            'job_description' =>  $job_description,
            'validity_period' => $validity_period,
            'date_of_quote'=>$mysql_date,
            'term_payment' =>$term_payment
            );
         
         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('quotation', $row3);
         
            
        }
  
        $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
        redirect('quotation/individual_details/' . $quotation_id);
    }

    /*---  update submitted quotation for quotation -----*/
    function update_jobwork($quotation_id, $date_in, $sales_exe){
        
        $quotation_details_id = $this->input->post('quotation_details_id');
        $company_name         = $this->input->post('company_name');
        $address              = $this->input->post('address');
        $tel_num              = $this->input->post('tel_num');
        $fax_num              = $this->input->post('fax_num');
        $email                = $this->input->post('email');
    
        $term_payment    = $this->input->post('term_payment');
        $validity_period = $this->input->post('validity_period');
        $job_description = $this->input->post('job_description');
        
        $sub_description = $this->input->post('sub_description');
        $sn              = $this->input->post('sn');
        $quantity        = $this->input->post('quantity');
        $uom             = $this->input->post('uom');
        $unit_price      = $this->input->post('unit_price');
        $amount          = $this->input->post('amount');
        
        $sub_total   = $this->input->post('sub_total');
        $gst_total   = $this->input->post('gst_total');
        $grand_total = $this->input->post('grand_total');
        
        $row_count = count($sub_description);
        
        for ($i = 0; $i < $row_count; $i++) {
            $q = $this->db->select('quotation_details_id')->from('quotation_details')->where('quotation_details_id', $quotation_details_id[$i])->get();
            
            $row = array(
                'sn' => $sn[$i],
                'sub_description' => $sub_description[$i],
                'quantity' => $quantity[$i],
                'uom' => $uom[$i],
                'unit_price' => $unit_price[$i],
                'amount' => $amount[$i]
            );
    
            if ($q->num_rows() > 0) {
                $this->db->from('quotation_details');
                $this->db->join('quotation_quote_total', 'quotation_details.quotation_id = quotation_quote_total.quotation_id');
                $this->db->join('quotation', 'quotation.quotation_id = quotation_details.quotation_id');
                $this->db->where('quotation_details_id', $quotation_details_id[$i]);
                $this->db->update('quotation_details', $row);
            }
        
         $row2 = array(
            'sub_total' => $sub_total,
            'gst_total' => $gst_total,
            'grand_total' => $grand_total);

         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('quotation_quote_total', $row2);
         
         $cal_date   = $date_in;
         $format     = strtotime($cal_date);
         $mysql_date = date('Y-m-d H:i:s', $format);

         $row3 = array(
            'job_description' =>  $job_description,
            'validity_period' => $validity_period,
            'date_of_quote'=>$mysql_date,
            'term_payment' =>$term_payment
            );
         
         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('quotation', $row3);

         $row4 = array(
            'sales_exe' =>  $sales_exe,
            );
         
         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('job_complete', $row4);
         
        }
  
      $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
      redirect('quotation/individual_details_with_jobwork/' . $quotation_id);
    }
     

function update_jobwork_checkout($quotation_id, $date_in, $sales_exe){
        
        $quotation_details_id = $this->input->post('quotation_details_id');
        $company_name         = $this->input->post('company_name');
        $address              = $this->input->post('address');
        $tel_num              = $this->input->post('tel_num');
        $fax_num              = $this->input->post('fax_num');
        $email                = $this->input->post('email');
    
        $term_payment    = $this->input->post('term_payment');
        $validity_period = $this->input->post('validity_period');
        $job_description = $this->input->post('job_description');
        
        $sub_description = $this->input->post('sub_description');
        $sn              = $this->input->post('sn');
        $quantity        = $this->input->post('quantity');
        $uom             = $this->input->post('uom');
        $unit_price      = $this->input->post('unit_price');
        $amount          = $this->input->post('amount');
        
        $sub_total   = $this->input->post('sub_total');
        $gst_total   = $this->input->post('gst_total');
        $grand_total = $this->input->post('grand_total');
   
        $row_count = count($sub_description);


        
        for ($i = 0; $i < $row_count; $i++) {
            $q = $this->db->select('quotation_details_id')->from('quotation_details')->where('quotation_details_id', $quotation_details_id[$i])->get();
            
            $row = array(
                'sn' => $sn[$i],
                'sub_description' => $sub_description[$i],
                'quantity' => $quantity[$i],
                'uom' => $uom[$i],
                'unit_price' => $unit_price[$i],
                'amount' => $amount[$i]
            );
    
            if ($q->num_rows() > 0) {
                $this->db->from('quotation_details');
                $this->db->join('quotation_quote_total', 'quotation_details.quotation_id = quotation_quote_total.quotation_id');
                $this->db->join('quotation', 'quotation.quotation_id = quotation_details.quotation_id');
                $this->db->where('quotation_details_id', $quotation_details_id[$i]);
                $this->db->update('quotation_details', $row);
            }
        
         $row2 = array(
            'sub_total' => $sub_total,
            'gst_total' => $gst_total,
            'grand_total' => $grand_total);

         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('quotation_quote_total', $row2);
         
         $cal_date   = $date_in;
         $format     = strtotime($cal_date);
         $mysql_date = date('Y-m-d H:i:s', $format);

         $row3 = array(
            'job_description' =>  $job_description,
            'validity_period' => $validity_period,
            'date_of_quote'=>$mysql_date,
            'term_payment' =>$term_payment
            );
         
         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('quotation', $row3);

         $row4 = array(
            'sales_exe' =>  $sales_exe,
            );
         
         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('job_complete', $row4);
         
        }
  
  
      $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
      redirect('quotation/individual_details_with_jobwork/' . $quotation_id);
    }


function update_jobwork_checkout1($quotation_id, $date_in, $sales_exe){
        
        $quotation_details_id = $this->input->post('quotation_details_id');
        $company_name         = $this->input->post('company_name');
        $address              = $this->input->post('address');
        $tel_num              = $this->input->post('tel_num');
        $fax_num              = $this->input->post('fax_num');
        $email                = $this->input->post('email');
    
        $term_payment    = $this->input->post('term_payment');
        $validity_period = $this->input->post('validity_period');
        $job_description = $this->input->post('job_description');
        
        $sub_description = $this->input->post('sub_description');
        $sn              = $this->input->post('sn');
        $quantity        = $this->input->post('quantity');
        $uom             = $this->input->post('uom');
        $unit_price      = $this->input->post('unit_price');
        $amount          = $this->input->post('amount');
        
        $sub_total   = $this->input->post('sub_total');
        $gst_total   = $this->input->post('gst_total');
        $grand_total = $this->input->post('grand_total');
   
        $row_count = count($sub_description);


        
        for ($i = 0; $i < $row_count; $i++) {
            $q = $this->db->select('quotation_details_id')->from('quotation_details')->where('quotation_details_id', $quotation_details_id[$i])->get();
            
            $row = array(
                'sn' => $sn[$i],
                'sub_description' => $sub_description[$i],
                'quantity' => $quantity[$i],
                'uom' => $uom[$i],
                'unit_price' => $unit_price[$i],
                'amount' => $amount[$i]
            );
    
            if ($q->num_rows() > 0) {
                $this->db->from('quotation_details');
                $this->db->join('quotation_quote_total', 'quotation_details.quotation_id = quotation_quote_total.quotation_id');
                $this->db->join('quotation', 'quotation.quotation_id = quotation_details.quotation_id');
                $this->db->where('quotation_details_id', $quotation_details_id[$i]);
                $this->db->update('quotation_details', $row);
            }
        
         $row2 = array(
            'sub_total' => $sub_total,
            'gst_total' => $gst_total,
            'grand_total' => $grand_total);

         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('quotation_quote_total', $row2);
         
         $cal_date   = $date_in;
         $format     = strtotime($cal_date);
         $mysql_date = date('Y-m-d H:i:s', $format);

         $row3 = array(
            'job_description' =>  $job_description,
            'validity_period' => $validity_period,
            'date_of_quote'=>$mysql_date,
            'term_payment' =>$term_payment
            );
         
         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('quotation', $row3);

         $row4 = array(
            'sales_exe' =>  $sales_exe,
            );
         
         $this->db->where('quotation_id', $quotation_id);
         $this->db->update('job_complete', $row4);
         
        }
  
  
      $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
      redirect('checkout/individual_details/' . $quotation_id);
    }


    function add_quotation_desc($quotation_id){
        
        $quotation_details_id = $this->input->post('quotation_details_id');
        $company_name         = $this->input->post('company_name');
        $address              = $this->input->post('address');
        $tel_num              = $this->input->post('tel_num');
        $fax_num              = $this->input->post('fax_num');
        $email                = $this->input->post('email');
        $date_in              = $this->input->post('date_in');
        $count                = $this->input->post('count');
        
        $term_payment    = $this->input->post('term_payment');
        $validity_period = $this->input->post('validity_period');
        $job_description = $this->input->post('job_description');
        
        $sub_description = $this->input->post('sub_description');
        $sn              = $this->input->post('sn');
        $quantity        = $this->input->post('quantity');
        $uom             = $this->input->post('uom');
        $unit_price      = $this->input->post('unit_price');
        $amount          = $this->input->post('amount');
        
        $sub_description = $this->input->post('sub_description1');
        $sn              = $this->input->post('sn1');
        $quantity        = $this->input->post('quantity1');
        $uom             = $this->input->post('uom1');
        $unit_price      = $this->input->post('unit_price1');
        $amount          = $this->input->post('amount1');
        
        $sub_total   = $this->input->post('sub_total');
        $gst_total   = $this->input->post('gst_total');
        $grand_total = $this->input->post('grand_total');
            
        
        $row_count = count($sub_description);

        
        for ($i = 0; $i < $row_count; $i++) {
            $q    = $this->db->select('quotation_details_id')->from('quotation_details')->where('quotation_details_id', $quotation_details_id[$i])->get();
            $row1 = array(
                'quotation_id' => $quotation_id,
                'sn' => $sn[$i],
                'sub_description' => $sub_description[$i],
                'quantity' => $quantity[$i],
                'unit_price' => $unit_price[$i],
                'uom' => $uom[$i],   
                'amount' => $amount[$i]
            );
            
            $this->db->where('quotation_id', $quotation_id);
            $this->db->insert('quotation_details', $row1);

        }
        
        $row5 = array(
            'quotation_id' => $quotation_id,
            'sub_total' => $sub_total,
            'gst_total' => $gst_total,
            'grand_total' => $grand_total
        );
        
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation_quote_total', $row5);


              
        $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
        redirect('quotation/individual_details_with_jobwork/' . $quotation_id);
    }



    function add_quotation_desc1($quotation_id){
        
        $quotation_details_id = $this->input->post('quotation_details_id');
        $company_name         = $this->input->post('company_name');
        $address              = $this->input->post('address');
        $tel_num              = $this->input->post('tel_num');
        $fax_num              = $this->input->post('fax_num');
        $email                = $this->input->post('email');
        $date_in              = $this->input->post('date_in');
        $count                = $this->input->post('count');
        
        $term_payment    = $this->input->post('term_payment');
        $validity_period = $this->input->post('validity_period');
        $job_description = $this->input->post('job_description');
        
        $sub_description = $this->input->post('sub_description');
        $sn              = $this->input->post('sn');
        $quantity        = $this->input->post('quantity');
        $uom             = $this->input->post('uom');
        $unit_price      = $this->input->post('unit_price');
        $amount          = $this->input->post('amount');
        
        $sub_description = $this->input->post('sub_description1');
        $sn              = $this->input->post('sn1');
        $quantity        = $this->input->post('quantity1');
        $uom             = $this->input->post('uom1');
        $unit_price      = $this->input->post('unit_price1');
        $amount          = $this->input->post('amount1');
        
        $sub_total   = $this->input->post('sub_total');
        $gst_total   = $this->input->post('gst_total');
        $grand_total = $this->input->post('grand_total');
            
        
        $row_count = count($sub_description);

        
        for ($i = 0; $i < $row_count; $i++) {
            $q    = $this->db->select('quotation_details_id')->from('quotation_details')->where('quotation_details_id', $quotation_details_id[$i])->get();
            $row1 = array(
                'quotation_id' => $quotation_id,
                'sn' => $sn[$i],
                'sub_description' => $sub_description[$i],
                'quantity' => $quantity[$i],
                'unit_price' => $unit_price[$i],
                'uom' => $uom[$i],   
                'amount' => $amount[$i]
            );
            
            $this->db->where('quotation_id', $quotation_id);
            $this->db->insert('quotation_details', $row1);

        }
        
        $row5 = array(
            'quotation_id' => $quotation_id,
            'sub_total' => $sub_total,
            'gst_total' => $gst_total,
            'grand_total' => $grand_total
        );
        
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation_quote_total', $row5);


              
        $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
        redirect('quotation/individual_details/' . $quotation_id);
    }



    
    
    function del_sub_desc($quotation_sub_id, $quotation_id){

        $this->db->where('quotation_details_id', $quotation_sub_id);
        $this->db->delete('quotation_details');
        
        $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
        redirect('quotation/individual_details/' . $quotation_id);
        
    }

     function del_sub_desc_jobwork($quotation_sub_id, $quotation_id){

        $this->db->where('quotation_details_id', $quotation_sub_id);
        $this->db->delete('quotation_details');
        
        $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
        redirect('quotation/individual_details_with_jobwork/' . $quotation_id);
        
    }

    function approved_quotation($quotation_id){

        $remarks = 'approved';

        $row = array(
            'status' => 2,
            'remarks'=>$remarks,
            'date_of_approved'=>date('Y-m-d H:i:s')
        );
        
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation', $row);
 
        $row1 = array(
            'quotation_id' => $quotation_id
        );
        $this->db->insert('jobwork', $row1);
        
        $this->session->set_flashdata('msg', 'quotation SUCCESFULLY APPROVED FOR QUOTATION');
        redirect('quotation/quotation_approved_success');
        
    }

    function reject_quotation($quotation_id, $jobwork_id){    

        
        $sales_exe = "none";
        $remarks = 'reject';
      
        $row = array(
            'status' => 4,
            'remarks'=>$remarks,
            'date_of_reject'=>date('Y-m-d H:i:s')
        );
        
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation', $row);


        $row1 = array(
            'quotation_id' => $quotation_id,
            'jobwork_id' => 0,
            'sales_exe' => $sales_exe,   
            'remarks'=> $remarks,
           // 'sr_date' => $sr_date
        );
        $this->db->insert('service_report', $row1);

        $this->session->set_flashdata('msg', 'quotation SUCCESFULLY APPROVED FOR QUOTATION');
        redirect('quotation/quotation_reject_success' );
        
    }

        function checkout_jobwork($quotation_id, $jobwork_id, $status){    

        $row = array(
            'status' => 5
        );
        
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation', $row);
 
        $row1 = array(
            'quotation_id' => $quotation_id,
            'jobwork_id' => $jobwork_id
        );
        $this->db->insert('service_report', $row1);


        $row2 = array(
            'quotation_id' => $quotation_id,
            'jobwork_id' => $jobwork_id,
        );
        $this->db->insert('invoice', $row2);

        if ($status == '3') {
             $this->session->set_flashdata('msg', 'quotation SUCCESFULLY APPROVED FOR QUOTATION');
             redirect('checkout/check_out_invoice/' . $quotation_id);
        }else{
             $this->session->set_flashdata('msg', 'quotation SUCCESFULLY APPROVED FOR QUOTATION');
            redirect('checkout/check_out_reject/'. $quotation_id);
      }
    
    }
       function checkout_jobwork_update($quotation_id, $jobwork_id){    

        $row = array(
            'status' => 5
        );
        
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation', $row);
 
        $row1 = array(
            'quotation_id' => $quotation_id,
            'jobwork_id' => $jobwork_id
        );
        $this->db->insert('service_report', $row1);

            $row2 = array(
            'quotation_id' => $quotation_id,
            'jobwork_id' => $jobwork_id
        );
        $this->db->insert('invoice', $row2);

        $this->session->set_flashdata('msg', 'quotation SUCCESFULLY APPROVED FOR QUOTATION');
        redirect('quotation/individual_details_approved/' . $quotation_id);
        
    }

    function jobwork_complete($quotation_id, $jobwork_id, $sales_exe){    
        $row = array(
            'status' => 3
        );
        
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation', $row);

       $row2 = array(
            'quotation_id' => $quotation_id,
            'jobwork_id' => $jobwork_id,
            'sales_exe' => $sales_exe,
            'sr_date'=>date('Y-m-d H:i:s'),
        );


        $row1 = array(
            'quotation_id' => $quotation_id,
            'jobwork_id' => $jobwork_id,
            'sales_exe' => $sales_exe,
            'sr_date'=>date('Y-m-d H:i:s'),
            'remarks'=>'checkout with invoice'    
        );
        $this->db->insert('job_complete', $row2);
        $this->db->insert('service_report', $row1);

        $this->session->set_flashdata('msg', 'quotation SUCCESFULLY APPROVED FOR QUOTATION');
        redirect('jobwork/jobwork_complete_success');
        
    }
    
    function count_pending_quote(){
        
        $this->db->select('status, COUNT(status) as total');
        $this->db->where('status', 1);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
        
    }

    function update_count(){
        
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

    function count_complete_jobwork(){

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('status', 3);
        $this->db->or_where('status', 4);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
        
    }

    function count_overdue(){

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('status', 1);
        $this->db->where("date_of_quote < DATE_SUB(NOW() ,INTERVAL 7 DAY )", NULL, FALSE);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
    }

    function count_service_report(){

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('status', 3);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
    }

    function show_overdue_quotation_list($limit, $start){
        
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
        $this->db->where('status', 1);
        $this->db->where("date_of_quote < DATE_SUB(NOW() ,INTERVAL 7 DAY )", NULL, FALSE);
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
        

    function show_service_report_list($limit, $start){
    
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
      //  $this->db->join('jobwork', 'jobwork.quotation_id = quotation.quotation_id ');
        $this->db->join('service_report', 'service_report.quotation_id = quotation.quotation_id');
        $this->db->where('quotation.status', 3);
        $this->db->or_where('quotation.status', 4);
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

/*
   ----------------------- search functions ------------------------------
*/

    function fetch_search($quotation_id){
    
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->like('quotation.quotation_id', $quotation_id)->group_by('quotation.quotation_id');
        $query = $this->db->get();
        return $result = $query->result();
   } 


    function fetch_search_company($company_name){
    
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->like('company.company_name', $company_name)->group_by('quotation.quotation_id');
        $this->db->where('status', 5);
        $query = $this->db->get();
        return $result = $query->result();
   } 

   function fetch_search_sr($service_report){
    
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->join('service_report', 'service_report.quotation_id = quotation.quotation_id');
        $this->db->like('service_report.service_report_id', $service_report)->group_by('service_report.quotation_id');
        $this->db->where('status', 5);
        $query = $this->db->get();
        return $result = $query->result();
   } 

   function fetch_search_invoice($service_report){
    
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->join('service_report', 'service_report.quotation_id = quotation.quotation_id');
        $this->db->where('service_report.remarks','checkout with invoice');
        $this->db->like('service_report.service_report_id', $service_report)->group_by('service_report.quotation_id');
        $this->db->where('status', 5);
        $query = $this->db->get();
        return $result = $query->result();
   } 








}
/* End of file quotation_model.php */
/* Location: ./application/models/quotation_model.php */
