<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_centercoursedates_model extends CI_Model {
	public $where_au;
	public $where_au_second;
	function __construct() {

		$this->where_au = "(start_date >= '" . date('Y-m-d') . "'  OR end_date = '0000-00-00')";
		$this->where_au_second = "(end_date >= '" . date('Y-m-d') . "'  OR end_date = '0000-00-00')";
		// $this->where_au = "start_date >= '" . date('Y-m-d') . "'";
		parent::__construct();
	}

	function countCentercoursedates() {

		$this->db->from('centre_course_dates');
		if (!empty($this->input->get('ctype')) && $this->input->get('ctype') == 'Exam') {
			$type = 'Exam';
		} else {
			$type = 'Course';
		}

		if ($type == 'Course') {
			$this->db->where('start_date >', date('Y-m-d'));
		} else {
			$this->db->where($this->where_au_second);
		}
		$this->db->where('location_type', $type);
		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('course')) {
			$this->db->like('course', $this->input->get('course'));
		}
		if ($this->input->get('type')) {
			$this->db->like('type', $this->input->get('type'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('start_date >=', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('end_date <=', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}

		return $this->db->count_all_results();
		// Search Box End
	}

	function getCentercoursedates($limit = NULL, $offset = NULL) {

		$this->db->select('centre_course_dates.*');
		$this->db->from('centre_course_dates');

		if (!empty($this->input->get('ctype')) && $this->input->get('ctype') == 'Exam') {
			$type = 'Exam';
		} else {
			$type = 'Course';
		}

		if ($type == 'Course') {
			$this->db->where('start_date >', date('Y-m-d'));
		} else {
			$this->db->where($this->where_au_second);
		}
		$this->db->where('location_type', $type);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('course')) {
			$this->db->like('course', $this->input->get('course'));
		}
		if ($this->input->get('type')) {
			$this->db->like('type', $this->input->get('type'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('start_date >=', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('end_date <=', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}
		//Search Box End

		$this->db->order_by("start_date", "asc");
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	function getCentercoursedatesresult() {
		$this->db->select('centre_course_dates.*');
		$this->db->from('centre_course_dates');

		if (!empty($this->input->get('ctype')) && $this->input->get('ctype') == 'Exam') {
			$type = 'Exam';
		} else {
			$type = 'Course';
		}

		if ($type == 'Course') {
			$this->db->where('start_date >', date('Y-m-d'));
		} else {
			$this->db->where($this->where_au_second);
		}
		$this->db->where('location_type', $type);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('course')) {
			$this->db->like('course', $this->input->get('course'));
		}
		if ($this->input->get('type')) {
			$this->db->like('type', $this->input->get('type'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('start_date >=', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('end_date <=', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}
		//Search Box End

		$this->db->order_by("start_date", "asc");
		$query = $this->db->get();
		return $query->result();
	}

	public function getCourseDate() {
// and location_type = 'Exam'

		if (!empty($this->input->get('type')) && $this->input->get('type') == 'Exam') {
			$type = 'Exam';
		} else {
			$type = 'Course';
		}
		$getDate = $this->db->select("*");
		$getDate = $this->db->from("centre_course_dates");
		$getDate = $this->db->where('location_type', $type);
		if ($type == 'Course') {
			$start_date = date('Y-m-d', strtotime(' + 2 days'));
			$getDate = $this->db->where('start_date >', $start_date);
			$getDate = $this->db->order_by("start_date", "asc");
		} else {
			$getDate = $this->db->where($this->where_au_second);
			$getDate = $this->db->order_by("end_date", "asc");
		}
		if (!empty($this->input->get('course'))) {
			$getDate = $this->db->like('course', $this->input->get('course'));
		}
		if (!empty($this->input->get('fee'))) {
			$getDate = $this->db->like('fee', $this->input->get('fee'));
		}

		if ($this->input->get('start_date')) {
			$getDate = $this->db->where('centre_course_dates.start_date', date('Y-m-d', strtotime($this->input->get('start_date'))));
		}
		if ($this->input->get('end_date')) {
			$getDate = $this->db->where('centre_course_dates.end_date', date('Y-m-d', strtotime($this->input->get('end_date'))));
		}

		$getDate = $this->db->get()->result();
		return $getDate;
	}

	function countCentercoursedatesbooked() {

		$this->db->from('centre_course_date_book');
		$this->db->join('centre_course_dates', 'centre_course_dates.id = centre_course_date_book.centre_course_id', 'left');
		$this->db->join('location', 'location.id = centre_course_date_book.location_id', 'left');
		$this->db->join('exam_type', 'exam_type.id = centre_course_date_book.exam_type_id', 'left');
		$this->db->where('centre_course_date_book.payment', 1);

		// Center Course Dates Booked Search Start
		if ($this->input->get('id')) {
			$this->db->where('centre_course_date_book.id', $this->input->get('id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('last_name')) {
			$this->db->like('last_name', $this->input->get('last_name'));
		}
		if ($this->input->get('ctype')) {
			$this->db->like('centre_course_dates.location_type', $this->input->get('ctype'));
		}

		if ($this->input->get('centre_course_id')) {
			$this->db->like('centre_course_date_book.centre_course_id', $this->input->get('centre_course_id'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('centre_course_date_book.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('centre_course_date_book.created_date <=', $this->input->get('end_date'));
		}
		// Center Course Dates Booked Search End

		return $this->db->count_all_results();
		// Search Box End
	}

	function getCentercoursedatesbooked($limit = NULL, $offset = NULL) {

		$this->db->select('centre_course_date_book.*,centre_course_dates.course,centre_course_dates.venue,location.location,centre_course_dates.start_date,centre_course_dates.end_date,centre_course_dates.location_type,exam_type.exam_type_name');
		$this->db->from('centre_course_date_book');
		$this->db->join('centre_course_dates', 'centre_course_dates.id = centre_course_date_book.centre_course_id', 'left');

		$this->db->join('exam_type', 'exam_type.id = centre_course_date_book.exam_type_id', 'left');

		$this->db->join('location', 'location.id = centre_course_date_book.location_id', 'left');
		//	$getDate = $this->db->where($this->where_au);
		$this->db->limit($limit, $offset);
		// Center Course Dates Booked Search Start
		if ($this->input->get('id')) {
			$this->db->where('centre_course_date_book.id', $this->input->get('id'));
		}
		if ($this->input->get('ctype')) {
			$this->db->like('centre_course_dates.location_type', $this->input->get('ctype'));
		}

		if ($this->input->get('first_name')) {
			$this->db->like('first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('last_name')) {
			$this->db->like('last_name', $this->input->get('last_name'));
		}
		if ($this->input->get('centre_course_id')) {
			$this->db->like('centre_course_date_book.centre_course_id', $this->input->get('centre_course_id'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('centre_course_date_book.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('centre_course_date_book.created_date <=', $this->input->get('end_date'));
		}
		// Center Course Dates Booked Search End
		$this->db->where('centre_course_date_book.payment', 1);

		$this->db->order_by("centre_course_date_book.id", "desc");

		$query = $this->db->get();
		return $query->result();
	}

}