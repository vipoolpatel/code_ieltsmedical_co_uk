<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_admin_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countTutor() {
		$this->db->from('user_accounts');
		return $this->db->count_all_results();
		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('user_id', $this->input->get('id'));
		}
		if ($this->input->get('name')) {
			$this->db->like('account_name', $this->input->get('name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('email', $this->input->get('email'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('registered >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('registered <=', $this->input->get('end_date'));
		}
		 if($this->input->get('user_status'))
            {
                 $user_status = $this->input->get('user_status');
                if($this->input->get('user_status') == 2)
                {
                    $user_status = 0;
                }
                $this->db->like( 'user_status', $user_status );
            }
		// Search Box End
	}

	function getTutor($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('user_accounts');
		$this->db->limit($limit, $offset);
		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('user_id', $this->input->get('id'));
		}
		if ($this->input->get('name')) {
			$this->db->like('account_name', $this->input->get('name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('email', $this->input->get('email'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('registered >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('registered <=', $this->input->get('end_date'));
		}
		if($this->input->get('user_status'))
            {
                 $user_status = $this->input->get('user_status');
                if($this->input->get('user_status') == 2)
                {
                    $user_status = 0;
                }
                $this->db->like( 'user_accounts.user_status', $user_status );
            }
		// Search Box End
		$this->db->order_by('user_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}