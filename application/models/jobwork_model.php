<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
class jobwork_model extends CI_Model
{
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
    
    
    function show_jobwork_list($limit, $start)
    {
        
        $this->db->from('quotation');
        $this->db->join('company', 'company.company_id = quotation.company_id');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id ');
        $this->db->join('jobwork', 'jobwork.quotation_id = quotation.quotation_id ');
        $this->db->where('status', 2);
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
    
    function show_subquotation_individual($quotation_id)
    {
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('quotation_details', 'quotation_details.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_details.quotation_id', $quotation_id);
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
        
    }
    
    function show_overall_total($quotation_id)
    {
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->join('quotation_quote_total', 'quotation_quote_total.quotation_id = quotation.quotation_id');
        $this->db->where('quotation_quote_total.quotation_id', $quotation_id);
        $q      = $this->db->get();
        $result = $q->result();
        return $result;
    }
    
    /*------------------------  update submitted quotation for quotation ----------------*/
    function update_quotation_quotation($quotation_id)
    {
        
        $quotation_details_id = $this->input->post('quotation_details_id');
        $company_name         = $this->input->post('company_name');
        $address              = $this->input->post('address');
        $tel_num              = $this->input->post('tel_num');
        $fax_num              = $this->input->post('fax_num');
        $email                = $this->input->post('email');
        $date_in              = $this->input->post('date_in');
        
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
            
            $row1 = array(
                'quotation_id' => $quotation_id,
                'sn' => $sn[$i],
                'sub_description' => $sub_description[$i],
                'quantity' => $quantity[$i],
                'uom' => $uom[$i],
                'unit_price' => $unit_price[$i],
                'amount' => $amount[$i]
            );
            
            if ($q->num_rows() > 0) {
                $this->db->where('quotation_details_id', $quotation_details_id[$i]);
                $this->db->update('quotation_details', $row);
            } else {
                $this->db->insert('quotation_details', $row1);
            }
            
        }
        
        
        $this->session->set_flashdata('msg', 'JOB WORK SUCCESFULLY UPDATED');
        redirect('quotation/individual_details/' . $quotation_id);
    }
    
    function approved_quotation_quotation($quotation_id)
    {
        
        $row = array(
            'status' => 2
        );
        
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation', $row);
        
        $this->session->set_flashdata('msg', 'quotation SUCCESFULLY APPROVED FOR QUOTATION');
        redirect('quotation/individual_details_approved/' . $quotation_id);
        
    }
    
}
/* End of file jobwork_model.php */
/* Location: ./application/models/jobwork_model.php */

