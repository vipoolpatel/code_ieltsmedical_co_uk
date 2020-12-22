<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_location_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countLocation() {
		$this->db->from('location');

		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('name')) {
			$this->db->like('location', $this->input->get('name'));
		}
		if ($this->input->get('venue_name')) {
			$this->db->like('venue_name', $this->input->get('venue_name'));
		}
		if ($this->input->get('type')) {
			$this->db->like('type', $this->input->get('type'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('created_date <=', $this->input->get('end_date'));
		}

		return $this->db->count_all_results();
	}

	function getLocation($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('location');

		$this->db->limit($limit, $offset);

		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('name')) {
			$this->db->like('location', $this->input->get('name'));
		}
		if ($this->input->get('venue_name')) {
			$this->db->like('venue_name', $this->input->get('venue_name'));
		}
		if ($this->input->get('type')) {
			$this->db->like('type', $this->input->get('type'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('created_date <=', $this->input->get('end_date'));
		}

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}