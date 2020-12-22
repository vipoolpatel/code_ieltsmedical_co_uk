<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_course_date_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countCoursedate() {
		$this->db->from('course_date');
 
		$this->db->join('course_main','course_main.id = course_date.course_main_id', 'left');
		$this->db->join('course','course.id = course_date.course_id', 'left');
		$this->db->join('location','location.id = course_date.location_id', 'left');


		if ($this->input->get('id')) {
			$this->db->where('course_date.id', $this->input->get('id'));
		}
		if ($this->input->get('course_main_id')) {
			$this->db->like('course_date.course_main_id', $this->input->get('course_main_id'));
		}
		if ($this->input->get('course_id')) {
			$this->db->like('course_date.course_id', $this->input->get('course_id'));
		}
		if ($this->input->get('location_id')) {
			$this->db->like('course_date.location_id', $this->input->get('location_id'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('course_date.start_date', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('course_date.end_date', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}

		return $this->db->count_all_results();

	}

	function getCoursedate($limit = NULL, $offset = NULL) {
		$this->db->select('course_date.*,course_main.course_main,course.course_name,location.location');
		$this->db->from('course_date');
		//$this->db->join('course_main','course_main.id = course.course_main_id', 'left');
		$this->db->join('course_main','course_main.id = course_date.course_main_id', 'left');
		$this->db->join('course','course.id = course_date.course_id', 'left');
		$this->db->join('location','location.id = course_date.location_id', 'left');

		$this->db->limit($limit, $offset);
		

		if ($this->input->get('id')) {
			$this->db->where('course_date.id', $this->input->get('id'));
		}
		if ($this->input->get('course_main_id')) {
			$this->db->like('course_date.course_main_id', $this->input->get('course_main_id'));
		}
		if ($this->input->get('course_id')) {
			$this->db->like('course_date.course_id', $this->input->get('course_id'));
		}
		
		if ($this->input->get('location_id')) {
			$this->db->like('course_date.location_id', $this->input->get('location_id'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('course_date.start_date', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('course_date.end_date', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}


		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}
