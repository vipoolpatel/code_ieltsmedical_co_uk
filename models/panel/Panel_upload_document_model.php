<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_upload_document_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countUploadDocument() {
		$this->db->from('upload_document');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('title')) {
			$this->db->like('title', $this->input->get('title'));
		}
		if ($this->input->get('description')) {
			$this->db->like('description', $this->input->get('description'));
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

	function getUploadDocument($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('upload_document');
		$this->db->limit($limit, $offset);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('title')) {
			$this->db->like('title', $this->input->get('title'));
		}

		if ($this->input->get('description')) {
			$this->db->like('description', $this->input->get('description'));
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