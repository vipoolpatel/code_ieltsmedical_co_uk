<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_knowledge_base_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countKnowledgeBase() {
		$this->db->from('knowledge_base');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('question')) {
			$this->db->like('knowledge_base.question', $this->input->get('question'));
		}
		if ($this->input->get('answer')) {
			$this->db->like('knowledge_base.answer', $this->input->get('answer'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('knowledge_base.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('knowledge_base.created_date <=', $this->input->get('end_date'));
		}

		// Search Box End
		return $this->db->count_all_results();
	}

	function getKnowledgeBase($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('knowledge_base');
		
		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('question')) {
			$this->db->like('knowledge_base.question', $this->input->get('question'));
		}
		if ($this->input->get('answer')) {
			$this->db->like('knowledge_base.answer', $this->input->get('answer'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('knowledge_base.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('knowledge_base.created_date <=', $this->input->get('end_date'));
		}
		
		//Search Box End
        $this->db->limit($limit, $offset);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}