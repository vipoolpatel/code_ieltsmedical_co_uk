<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Panel_company_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	        
        function countCompany() 
        {
            $this->db->from('company_code');

            // Search Box Start
        if ($this->input->get('id')) {
            $this->db->where('company_code.id', $this->input->get('id'));
        }
        if ($this->input->get('company_code')) {
            $this->db->like('company_code.company_code', $this->input->get('company_code'));
        }
        if ($this->input->get('company_price')) {
            $this->db->like('company_code.company_price', $this->input->get('company_price'));
        }
        if ($this->input->get('start_date')) {
            $this->db->where('company_code.created_date >=', $this->input->get('start_date'));
        }
        if ($this->input->get('end_date')) {
            $this->db->where('company_code.created_date <=', $this->input->get('end_date'));
        }
         // Search Box End
            return $this->db->count_all_results ();
	}
        
        function getCompany($limit = NULL, $offset = NULL)
        {
            $this->db->select('*');
            $this->db->from('company_code');
            
            $this->db->limit ( $limit, $offset );

            // Search Box Start
        if ($this->input->get('id')) {
            $this->db->where('company_code.id', $this->input->get('id'));
        }
        if ($this->input->get('company_code')) {
            $this->db->like('company_code.company_code', $this->input->get('company_code'));
        }
        if ($this->input->get('company_price')) {
            $this->db->like('company_code.company_price', $this->input->get('company_price'));
        }
        if ($this->input->get('start_date')) {
            $this->db->where('company_code.created_date >=', $this->input->get('start_date'));
        }
        if ($this->input->get('end_date')) {
            $this->db->where('company_code.created_date <=', $this->input->get('end_date'));
        }
         // Search Box End
                  
            $this->db->order_by('id','desc');
            $query = $this->db->get ();
            return $query->result ();
	}
        
}