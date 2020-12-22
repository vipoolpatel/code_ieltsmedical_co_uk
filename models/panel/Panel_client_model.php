<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_client_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countClient() {
		$this->db->from('customer');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('customer.id', $this->input->get('id'));
		}
		if ($this->input->get('phone')) {
			$this->db->like('customer.phone', $this->input->get('phone'));
		}
		if ($this->input->get('tags_status')) {
			$this->db->like('customer.tags_status', $this->input->get('tags_status'));
		}
		if ($this->input->get('username')) {
			$this->db->like('customer.username', $this->input->get('username'));
		}
		if ($this->input->get('email')) {
			$this->db->like('customer.email', $this->input->get('email'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('customer.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('customer.created_date <=', $this->input->get('end_date'));
		}
		if ($this->input->get('profession')) {
			$this->db->like('profession', $this->input->get('profession'));
		}
		// Search Box End
		return $this->db->count_all_results();
	}

	function getClient($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('customer');

		$this->db->limit($limit, $offset);

		// Search Box Start

		if ($this->input->get('id')) {
			$this->db->where('customer.id', $this->input->get('id'));
		}
		if ($this->input->get('phone')) {
			$this->db->like('customer.phone', $this->input->get('phone'));
		}
		if ($this->input->get('tags_status')) {
			$this->db->like('customer.tags_status', $this->input->get('tags_status'));
		}
		if ($this->input->get('username')) {
			$this->db->like('customer.username', $this->input->get('username'));
		}
		if ($this->input->get('email')) {
			$this->db->like('customer.email', $this->input->get('email'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('customer.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('customer.created_date <=', $this->input->get('end_date'));
		}
		if ($this->input->get('profession')) {
			$this->db->like('profession', $this->input->get('profession'));
		}

		// Search Box End

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}