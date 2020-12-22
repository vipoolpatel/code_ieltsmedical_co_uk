
<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_booking_accommodation_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countBookingaccommodation() {
		$this->db->from('accommodation_book');
		$this->db->join('location', 'location.id = accommodation_book.location_id');
		$this->db->where('accommodation_book.is_admin', 1);
		if ($this->input->get('id')) {
			$this->db->where('accommodation_book.id', $this->input->get('id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('accommodation_book.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('accommodation_book.email', $this->input->get('email'));
		}
		return $this->db->count_all_results();

	}

	function getBookingaccommodation($limit = NULL, $offset = NULL) {
		$this->db->select('accommodation_book.*,location.location,location.venue_name');
		$this->db->from('accommodation_book');
		$this->db->join('location', 'location.id = accommodation_book.location_id');
		if ($this->input->get('id')) {
			$this->db->where('accommodation_book.id', $this->input->get('id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('accommodation_book.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('accommodation_book.email', $this->input->get('email'));
		}
		$this->db->where('accommodation_book.is_admin', 1);
		$this->db->order_by('id', 'desc');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	function viewPrintAccommodation($id) {

		$this->db->select('accommodation_book.*,customer.username,location.location,location.venue_name');
		$this->db->from('accommodation_book');

		$this->db->join('customer', 'customer.id = accommodation_book.customer_id', 'left');

		$this->db->join('location', 'location.id = accommodation_book.location_id', 'left');

		$this->db->where('accommodation_book.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

}
