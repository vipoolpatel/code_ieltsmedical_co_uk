<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_live_course_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countLiveCourse() {
		$this->db->from('live_courses');

		$this->db->join('customer', 'customer.id = live_courses.customer_id', 'left');
		$this->db->join('live_course_exam', 'live_course_exam.id = live_courses.name');
		$this->db->join('live_course_exam_session', 'live_course_exam_session.id = live_courses.flex_name');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('live_courses.id', $this->input->get('id'));
		}
		if ($this->input->get('customer_id')) {
			$this->db->where('live_courses.customer_id', $this->input->get('customer_id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('live_courses.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('last_name')) {
			$this->db->like('live_courses.last_name', $this->input->get('last_name'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('live_courses.created_date >=', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('live_courses.created_date <=', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}

		$this->db->where('live_courses.payment', 1);
// Search Box End

		return $this->db->count_all_results();

	}

	function getLiveCourse($limit = NULL, $offset = NULL) {
		$this->db->select('live_courses.*,customer.username,live_course_exam.name,live_course_exam_session.flex_name,live_course_exam_session.price');

		$this->db->from('live_courses');

		$this->db->join('customer', 'customer.id = live_courses.customer_id', 'left');
		$this->db->join('live_course_exam', 'live_course_exam.id = live_courses.name');
		$this->db->join('live_course_exam_session', 'live_course_exam_session.id = live_courses.flex_name');
		$this->db->limit($limit, $offset);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('live_courses.id', $this->input->get('id'));
		}
		if ($this->input->get('customer_id')) {
			$this->db->where('live_courses.customer_id', $this->input->get('customer_id'));
		}

		if ($this->input->get('first_name')) {
			$this->db->like('live_courses.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('last_name')) {
			$this->db->like('live_courses.last_name', $this->input->get('last_name'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('live_courses.created_date >=', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('live_courses.created_date <=', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}

		// Search Box End
		$this->db->where('live_courses.payment', 1);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

}
