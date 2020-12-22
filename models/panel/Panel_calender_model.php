<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Panel_calender_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	        
    function countCalender() 
        {
            $this->db->from('calender');

            // Search Box Start
        if ($this->input->get('id')) {
            $this->db->where('calender.id', $this->input->get('id'));
        }
        if ($this->input->get('main_title')) {
            $this->db->like('calender.main_title', $this->input->get('main_title'));
        }
        if ($this->input->get('sub_title')) {
            $this->db->like('calender.sub_title', $this->input->get('sub_title'));
        }
        if ($this->input->get('start_date')) {
            $this->db->where('calender.created_date >=', $this->input->get('start_date'));
        }
        if ($this->input->get('end_date')) {
            $this->db->where('calender.created_date <=', $this->input->get('end_date'));
        }
         // Search Box End
            return $this->db->count_all_results ();
	}
        
    function getCalender($limit = NULL, $offset = NULL)
        {
            $this->db->select('*');
            $this->db->from('calender');
            
            $this->db->limit ( $limit, $offset );

            // Search Box Start

        if ($this->input->get('id')) {
           $this->db->where('calender.id', $this->input->get('id'));
        }
        if ($this->input->get('main_title')) {
            $this->db->like('calender.main_title', $this->input->get('main_title'));
        }
        if ($this->input->get('sub_title')) {
            $this->db->like('calender.sub_title', $this->input->get('sub_title'));
        }
        if ($this->input->get('start_date')) {
            $this->db->where('calender.created_date >=', $this->input->get('start_date'));
        }
        if ($this->input->get('end_date')) {
            $this->db->where('calender.created_date <=', $this->input->get('end_date'));
        }
     
         // Search Box End
                  
            $this->db->order_by('id','desc');
            $query = $this->db->get ();
            return $query->result ();
	}
        
}