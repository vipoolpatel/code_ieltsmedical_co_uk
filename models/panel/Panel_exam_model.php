<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_exam_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countExam() {
		$this->db->from('exam_book');

		$this->db->join('location', 'location.id = exam_book.location_id', 'left');
		$this->db->join('customer', 'customer.id = exam_book.customer_id', 'left');

		return $this->db->count_all_results();
		// Search Box End
	}

	function getExam($limit = NULL, $offset = NULL) {
		$this->db->select('exam_book.*,location.location,customer.username');
		$this->db->from('exam_book');
		$this->db->join('location', 'location.id = exam_book.location_id', 'left');
		$this->db->join('customer', 'customer.id = exam_book.customer_id', 'left');

		$this->db->limit($limit, $offset);
	//	$this->db->where('exam_book.payment', 1);
$this->db->where('exam_book.is_admin', 1);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}



		function view_exam_list($id) {

		$this->db->select('exam_book.*,location.location,customer.username');
		$this->db->from('exam_book');
		$this->db->join('location', 'location.id = exam_book.location_id', 'left');
		$this->db->join('customer', 'customer.id = exam_book.customer_id', 'left');

		$this->db->where('exam_book.id', $id);

		$query = $this->db->get();
		return $query->row();
	}

}