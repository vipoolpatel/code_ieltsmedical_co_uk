<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_document_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countDocument() {
		$this->db->from('document');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('firstname')) {
			$this->db->like('document.firstname', $this->input->get('firstname'));
		}
		if ($this->input->get('lastname')) {
			$this->db->like('document.lastname', $this->input->get('lastname'));
		}
		if ($this->input->get('email')) {
			$this->db->like('document.email', $this->input->get('email'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('created_date <=', $this->input->get('end_date'));
		}

		return $this->db->count_all_results();
		// Search Box End
	}

	function getDocument($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('document');

		$this->db->limit($limit, $offset);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('firstname')) {
			$this->db->like('document.firstname', $this->input->get('firstname'));
		}
		if ($this->input->get('lastname')) {
			$this->db->like('document.lastname', $this->input->get('lastname'));
		}
		if ($this->input->get('email')) {
			$this->db->like('document.email', $this->input->get('email'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('created_date <=', $this->input->get('end_date'));
		}

		//Search Box End

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}