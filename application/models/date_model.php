<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class  Date_model extends CI_Model
{

  function reject_jan($date){

        $from = $date.'-01-01';
        $to =   $date.'-01-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
        $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
  
  }

  function reject_feb($date){

        $from = $date.'-02-01';
        $to =   $date.'-02-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
        $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  }

  function reject_march($date){

        $from = $date.'-03-01';
        $to =   $date.'-03-31';

        $this->db->select('date_of_reject, COUNT(date_of_reject) as total');
        $this->db->where('remarks','reject' );
        $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  }

  function reject_april($date){

        $from = $date.'-04-01';
        $to =   $date.'-04-30';

        $this->db->select('date_of_reject, COUNT(date_of_reject) as total');
        $this->db->where('remarks','reject' );
        $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function reject_may($date){

        $from = $date.'-05-01';
        $to =   $date.'-05-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
           $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  }

  function reject_jun($date){

        $from = $date.'-06-01';
        $to =   $date.'-06-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
           $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function reject_july($date){

        $from = $date.'-07-01';
        $to =   $date.'-07-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
     $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
  
  }

  function reject_aug($date){

        $from = $date.'-08-01';
        $to =   $date.'-08-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
         $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function reject_sept($date){

        $from = $date.'-09-01';
        $to =   $date.'-09-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
         $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function reject_oct($date){

        $from = $date.'-10-01';
        $to =   $date.'-10-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
           $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function reject_nov($date){

        $from = $date.'-11-01';
        $to =   $date.'-11-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
        $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function reject_dec($date){

        $from = $date.'-12-01';
        $to =   $date.'-12-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','reject' );
        $this->db->where('quotation.date_of_reject >=',  $from);
        $this->db->where('quotation.date_of_reject <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }


/*   for approved  report chart  */

    function aprov_jan($date){

        $from = $date.'-01-01';
        $to =   $date.'-01-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function aprov_feb($date){

        $from = $date.'-02-01';
        $to =   $date.'-02-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function aprov_march($date){

        $from = $date.'-03-01';
        $to =   $date.'-03-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function aprov_april($date){

        $from = $date.'-04-01';
        $to =   $date.'-04-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function aprov_may($date){

        $from = $date.'-05-01';
        $to =   $date.'-05-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  
  }

  function aprov_jun($date){

        $from = $date.'-06-01';
        $to =   $date.'-06-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
  
  }

  function aprov_july($date){

        $from = $date.'-07-01';
        $to =   $date.'-07-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  }

  function aprov_aug($date){

        $from = $date.'-08-01';
        $to =   $date.'-08-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  }

  function aprov_sept($date){

        $from = $date.'-09-01';
        $to =   $date.'-09-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
  
  }

  function aprov_oct($date){

        $from = $date.'-10-01';
        $to =   $date.'-10-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
  
  }

  function aprov_nov($date){

        $from = $date.'-11-01';
        $to =   $date.'-11-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();

  }

  function aprov_dec($date){

        $from = $date.'-12-01';
        $to =   $date.'-12-31';

        $this->db->select('status, COUNT(status) as total');
        $this->db->where('remarks','approved' );
        $this->db->where('quotation.date_of_approved >=',  $from);
        $this->db->where('quotation.date_of_approved <=',  $to);
        $this->db->from('quotation');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
  
  }


}
/* End of file quotation_model.php */
/* Location: ./application/models/quotation_model.php */ 