<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_book_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countBook() {
		$this->db->from('book');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('name')) {
			$this->db->like('name', $this->input->get('name'));
		}
		if ($this->input->get('url')) {
			$this->db->like('url', $this->input->get('url'));
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

	function getBook($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('book');
		$this->db->limit($limit, $offset);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('name')) {
			$this->db->like('name', $this->input->get('name'));
		}

		if ($this->input->get('url')) {
			$this->db->like('url', $this->input->get('url'));
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

	function countBookorder($status) {

		$this->db->from('book_order');

		if ($this->input->get('id')) {
			$this->db->where('book_order.id', $this->input->get('id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('book_order.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('book_order.email', $this->input->get('email'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('book_order.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('book_order.created_date <=', $this->input->get('end_date'));
		}

		$this->db->where('status', $status);
		$this->db->where('book_order.is_admin', 1);
		return $this->db->count_all_results();
	}

	function getBookorder($limit = NULL, $offset = NULL, $status) {
		$this->db->select('book_order.*,customer.username,courier.courier_name');
		$this->db->from('book_order');
		$this->db->join('customer', 'customer.id = book_order.customer_id', 'left');
		$this->db->join('courier', 'courier.id = book_order.courier_id', 'left');
		$this->db->where('book_order.status', $status);
		$this->db->where('book_order.is_admin', 1);
		$this->db->order_by('book_order.id', 'desc');
		$this->db->limit($limit, $offset);

		if ($this->input->get('id')) {
			$this->db->where('book_order.id', $this->input->get('id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('book_order.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('book_order.email', $this->input->get('email'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('book_order.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('book_order.created_date <=', $this->input->get('end_date'));
		}

		$query = $this->db->get();
		return $query->result();

	}

	function countLicenseKeyOrder() {

		$this->db->from('book_license_order');

		if ($this->input->get('id')) {
			$this->db->where('book_license_order.id', $this->input->get('id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('book_license_order.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('book_license_order.email', $this->input->get('email'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('book_license_order.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('book_license_order.created_date <=', $this->input->get('end_date'));
		}

		$this->db->where('book_license_order.is_admin', 1);
		return $this->db->count_all_results();
	}

	function getLicenseKeyOrder($limit = NULL, $offset = NULL) {
		$this->db->select('book_license_order.*,customer.username,courier.courier_name,book.license_key');
		$this->db->from('book_license_order');
		$this->db->join('customer', 'customer.id = book_license_order.customer_id', 'left');
		$this->db->join('courier', 'courier.id = book_license_order.courier_id', 'left');
		$this->db->join('book', 'book.id = book_license_order.license_key_id');

		$this->db->where('book_license_order.is_admin', 1);
		$this->db->order_by('book_license_order.id', 'desc');
		$this->db->limit($limit, $offset);

		if ($this->input->get('id')) {
			$this->db->where('book_license_order.id', $this->input->get('id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('book_license_order.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('book_license_order.email', $this->input->get('email'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('book_license_order.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('book_license_order.created_date <=', $this->input->get('end_date'));
		}

		$query = $this->db->get();
		return $query->result();

	}

	public function getSalesRecord($todate = '', $fromdate = '', $is_today = '') {
		$this->db->select('sum(total) as totalAmount, count(id) as totalCourse');
		$this->db->from('book_order');
		$this->db->where('book_order.payment', 1);
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
		$this->db->select('sum(total) as totalAmount, count(id) as totalCourse');
		$this->db->from('book_order');
		$this->db->where('book_order.payment', 1);
		$result = $this->db->get()->row();
		return $result;

	}

	function countLicenceKey($id) {
		$this->db->select('book_licence_key.*,book.name');
		$this->db->from('book_licence_key');
		$this->db->join('book', 'book.id = book_licence_key.book_id', 'left');
		$this->db->where('book_licence_key.book_id', $id);
		return $this->db->count_all_results();
		// Search Box End
	}

	function getLicenceKey($id, $limit = NULL, $offset = NULL) {
		$this->db->select('book_licence_key.*,book.name');
		$this->db->from('book_licence_key');
		$this->db->join('book', 'book.id = book_licence_key.book_id', 'left');
		$this->db->where('book_licence_key.book_id', $id);
		$this->db->limit($limit, $offset);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}
