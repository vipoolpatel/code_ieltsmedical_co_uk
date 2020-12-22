<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_flex_course_bookings_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countFlexCourse() {
		$this->db->select('flex_course_booking.*,customer.username,flex_course.name as flexname,flex_course_session.flex_name,courier.courier_name,flex_course_skill.skill_name');
		$this->db->from('flex_course_booking');

		$this->db->join('customer', 'customer.id = flex_course_booking.customer_id', 'left');

		$this->db->join('flex_course', 'flex_course.id = flex_course_booking.flex_course_id', 'left');

		$this->db->join('flex_course_session', 'flex_course_session.id = flex_course_booking.flex_course_session_id', 'left');
		$this->db->join('flex_course_skill', 'flex_course_skill.id = flex_course_booking.flex_course_skill_id', 'left');

		$this->db->join('courier', 'courier.id = flex_course_booking.courier_id', 'left');

		if ($this->input->get('id')) {
			$this->db->where('flex_course_booking.id', $this->input->get('id'));
		}

		if ($this->input->get('first_name')) {
			$this->db->like('flex_course_booking.first_name', $this->input->get('first_name'));
		}

		if ($this->input->get('last_name')) {
			$this->db->like('flex_course_booking.last_name', $this->input->get('last_name'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('flex_course_booking.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('flex_course_booking.created_date <=', $this->input->get('end_date'));
		}
		$this->db->where('flex_course_booking.is_admin', '1');
		return $this->db->count_all_results();

	}

	function getFlexCourseBookings($limit = NULL, $offset = NULL) {
		$this->db->select('flex_course_booking.*,customer.username,flex_course.name as flexname,flex_course_session.flex_name,courier.courier_name,flex_course_skill.skill_name');
		$this->db->from('flex_course_booking');

		$this->db->join('customer', 'customer.id = flex_course_booking.customer_id', 'left');

		$this->db->join('flex_course', 'flex_course.id = flex_course_booking.flex_course_id', 'left');

		$this->db->join('flex_course_session', 'flex_course_session.id = flex_course_booking.flex_course_session_id', 'left');
		$this->db->join('courier', 'courier.id = flex_course_booking.courier_id', 'left');
		$this->db->join('flex_course_skill', 'flex_course_skill.id = flex_course_booking.flex_course_skill_id', 'left');

		$this->db->limit($limit, $offset);

		if ($this->input->get('id')) {
			$this->db->where('flex_course_booking.id', $this->input->get('id'));
		}

		if ($this->input->get('first_name')) {
			$this->db->like('flex_course_booking.first_name', $this->input->get('first_name'));
		}

		if ($this->input->get('last_name')) {
			$this->db->like('flex_course_booking.last_name', $this->input->get('last_name'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('flex_course_booking.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('flex_course_booking.created_date <=', $this->input->get('end_date'));
		}
		$this->db->where('flex_course_booking.is_admin', '1');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function fetch_booking_course_session($id) {
		$this->db->where('flex_course_id', $id);

		$query = $this->db->get('flex_course_session');
		$output = '<option value="">Select Session *</option>';

		foreach ($query->result() as $row) {
			$output .= '<option data-val="' . $row->price . '" value="' . $row->id . '">' . $row->flex_name . ' (' . $row->price . ')</option>';
		}

		return $output;
	}

	function fetch_booking_course_skill($id) {
		$this->db->where('flex_course_id', $id);

		$query = $this->db->get('flex_course_skill');
		$output = '<option value="">Select Skill </option>';

		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->id . '">' . $row->skill_name . ' </option>';
		}

		return $output;
	}

	function viewFlexBooking($id) {

		$this->db->select('flex_course_booking.*,customer.username,flex_course.name as flexname,flex_course_session.flex_name,courier.courier_name,courier.courier_website,flex_course_skill.skill_name');
		$this->db->from('flex_course_booking');

		$this->db->join('customer', 'customer.id = flex_course_booking.customer_id', 'left');

		$this->db->join('flex_course', 'flex_course.id = flex_course_booking.flex_course_id', 'left');

		$this->db->join('flex_course_session', 'flex_course_session.id = flex_course_booking.flex_course_session_id', 'left');
		$this->db->join('flex_course_skill', 'flex_course_skill.id = flex_course_booking.flex_course_skill_id', 'left');

		$this->db->join('courier', 'courier.id = flex_course_booking.courier_id', 'left');

		$this->db->where('flex_course_booking.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

}
