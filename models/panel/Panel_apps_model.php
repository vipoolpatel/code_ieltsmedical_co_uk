<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_apps_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countApps() {
		$this->db->from('apps');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('app_store')) {
			$this->db->like('app_store', $this->input->get('app_store'));
		}
		if ($this->input->get('google_play')) {
			$this->db->like('google_play', $this->input->get('google_play'));
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

	function getApps($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('apps');
		$this->db->limit($limit, $offset);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('app_store')) {
			$this->db->like('app_store', $this->input->get('app_store'));
		}

		if ($this->input->get('google_play')) {
			$this->db->like('google_play', $this->input->get('google_play'));
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