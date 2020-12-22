<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_contactus_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countContactus() {
		$this->db->from('contact_us');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('last_name')) {
			$this->db->like('last_name', $this->input->get('last_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('email', $this->input->get('email'));
		}

		return $this->db->count_all_results();
		// Search Box End
	}

	function getContactus($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('contact_us');
		$this->db->limit($limit, $offset);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('last_name')) {
			$this->db->like('last_name', $this->input->get('last_name'));
		}

		if ($this->input->get('email')) {
			$this->db->like('email', $this->input->get('email'));
		}
		//Search Box End

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}