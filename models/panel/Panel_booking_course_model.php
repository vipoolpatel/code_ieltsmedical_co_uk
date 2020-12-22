<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_booking_course_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countBookingCourse() {
		$this->db->from('course_book');

		$this->db->join('customer', 'customer.id = course_book.customer_id', 'left');
		$this->db->join('course', 'course.id = course_book.course_id');
		$this->db->where('course_book.is_admin', 1);
		if ($this->input->get('id')) {
			$this->db->where('course_book.id', $this->input->get('id'));
		}
		// if ($this->input->get('customer_id')) {
		// 	$this->db->like('course_book.customer_id', $this->input->get('customer_id'));
		// }
		if ($this->input->get('course_name')) {
			$this->db->like('course.course_name', $this->input->get('course_name'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('course_book.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('course_book.email', $this->input->get('email'));
		}

		// if ($this->input->get('exam_date')) {
		// 	$this->db->where('course_book.exam_date', date('Y-m-d', strtotime($this->input->get('exam_date'))));
		// }

		return $this->db->count_all_results();

	}

	function getBookingCourse($limit = NULL, $offset = NULL) {
		$this->db->select('course_book.*,customer.username,course.course_name,courier.courier_name,course.start_date,course.end_date');
		$this->db->from('course_book');
		$this->db->join('courier', 'courier.id = course_book.courier_id', 'left');
		$this->db->join('customer', 'customer.id = course_book.customer_id', 'left');
		$this->db->join('course', 'course.id = course_book.course_id');
		$this->db->limit($limit, $offset);
		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('course_book.id', $this->input->get('id'));
		}
		// if ($this->input->get('customer_id')) {
		// 	$this->db->like('course_book.customer_id', $this->input->get('customer_id'));
		// }
		if ($this->input->get('course_name')) {
			$this->db->like('course.course_name', $this->input->get('course_name'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('course_book.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('course_book.email', $this->input->get('email'));
		}
		// if ($this->input->get('exam_date')) {
		// 	$this->db->where('course_book.exam_date', date('Y-m-d', strtotime($this->input->get('exam_date'))));
		// }

		// Search Box End
		$this->db->where('course_book.is_admin', 1);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function fetch_booking_course() {

		$query = $this->db->get('course_main');
		return $query->result();
	}

	function fetch_booking_course_session($id) {
		$this->db->where('course_main_id', $id);
		$this->db->where('start_date >=', date('Y-m-d'));
		$query = $this->db->get('course');
		$output = '<option value="">Select Course *</option>';

		foreach ($query->result() as $row) {
			$output .= '<option data-val="' . $row->price . '" value="' . $row->id . '">' . $row->course_name . '(' . date('d-m-y', strtotime($row->start_date)) . ' - ' . date('d-m-Y', strtotime($row->end_date)) . ')' . '</option>';
		}

		return $output;
	}

	public function getSalesRecord($todate = '', $fromdate = '', $is_today = '') {
		$this->db->select('sum(final_total) as totalAmount, count(id) as totalCourse');
		$this->db->from('course_book');
		$this->db->where('course_book.payment', 1);
		if (!empty($is_today)) {
			$this->db->where('DATE_FORMAT(created_date,"%Y-%m-%d") >=', $todate);
		} else {
			if (!empty($todate)) {
				$this->db->where('DATE_FORMAT(created_date,"%Y-%m-%d") >=', $todate);
			}
		}
		if (!empty($fromdate)) {
			$this->db->where('DATE_FORMAT(created_date,"%Y-%m-%d") <=', $fromdate);
		}
		$result = $this->db->get()->row();
		return $result;

	}

	public function getSalesRecordTotal() {
		$this->db->select('sum(final_total) as totalAmount, count(id) as totalCourse');
		$this->db->from('course_book');
		$this->db->where('course_book.payment', 1);
		$result = $this->db->get()->row();
		return $result;

	}

}
