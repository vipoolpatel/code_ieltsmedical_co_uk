<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_course_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countCourse() {
		$this->db->from('course');

		$this->db->join('course_main', 'course_main.id = course.course_main_id', 'left');

		if ($this->input->get('id')) {
			$this->db->where('course.id', $this->input->get('id'));
		}
		if ($this->input->get('name')) {
			$this->db->like('course.course_name', $this->input->get('name'));
		}

		$this->db->where('start_date >=', date('Y-m-d'));

		if ($this->input->get('start_date')) {
			$this->db->where('start_date >=', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('end_date <=', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}
		if ($this->input->get('course_main_id')) {
			$this->db->like('course.course_main_id', $this->input->get('course_main_id'));
		}

		return $this->db->count_all_results();

	}

	function getCourse($limit = NULL, $offset = NULL) {
		$this->db->select('course.*,course_main.course_main');
		$this->db->from('course');
		$this->db->join('course_main', 'course_main.id = course.course_main_id', 'left');

		$this->db->where('start_date >=', date('Y-m-d'));
		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('course.id', $this->input->get('id'));
		}
		if ($this->input->get('name')) {
			$this->db->like('course.course_name', $this->input->get('name'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('course.start_date >=', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('course.end_date <=', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}

		if ($this->input->get('course_main_id')) {
			$this->db->like('course.course_main_id', $this->input->get('course_main_id'));
		}

		$this->db->order_by('id', 'asc');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	function getExcelDownload() {
		$this->db->select('course.*,course_main.course_main');
		$this->db->from('course');
		$this->db->join('course_main', 'course_main.id = course.course_main_id', 'left');

		$this->db->where('start_date >=', date('Y-m-d'));
		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('course.id', $this->input->get('id'));
		}
		if ($this->input->get('name')) {
			$this->db->like('course.course_name', $this->input->get('name'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('course.start_date >=', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('course.end_date <=', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}

		if ($this->input->get('course_main_id')) {
			$this->db->like('course.course_main_id', $this->input->get('course_main_id'));
		}

		$this->db->order_by('start_date', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

}
