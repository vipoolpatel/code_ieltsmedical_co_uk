<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public $customer_id;
	function __construct() {
		parent::__construct();
		$this->load->model('front/front_common_model', '', TRUE);
		if (!$this->session->userdata('customer_logged_in')) {
			redirect('my-account');
			exit();
		}
		$this->customer_id = $this->session->userdata('customer_login_id');
	}

	public function index() {
		$data['getuser'] = $this->front_common_model->getCustomerData($this->customer_id);
		$getSlug = $this->front_common_model->getSlug('dashboard');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

		$this->load->view('user/dashboard', $data);

	}
	public function book_order() {
		$data['getRecord'] = $this->front_common_model->get_book_order($this->customer_id);

		$getSlug = $this->front_common_model->getSlug('book-order');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

		$this->load->view('user/book_order', $data);

	}

	public function view_book_order() {
		$id = base64_decode($this->input->get('id'));

		$getRecord = $this->db->select('book_order.*,customer.username');
		$getRecord = $this->db->from('book_order');
		$getRecord = $this->db->join('customer', 'customer.id = book_order.customer_id');
		$getRecord = $this->db->where('book_order.customer_id', $this->customer_id);
		$getRecord = $this->db->where('book_order.id', $id);
		$getRecord = $this->db->where('payment', '1');
		$getRecord = $this->db->get()->row();
		$data['getRecord'] = $getRecord;

		$getitem = $this->db->select('book_order_item.*,book.name');
		$getitem = $this->db->from('book_order_item');
		$getitem = $this->db->join('book', 'book.id = book_order_item.book_id', 'left');
		$getitem = $this->db->where("book_order_item.order_id", $getRecord->id);
		$getitem = $this->db->order_by("book_order_item.id", "asc");
		$getitem = $this->db->get()->result();
		$data['getitem'] = $getitem;

		$this->load->view('user/view_book_order', $data);

	}

	public function center_course_dates() {
		$data['upComming'] = $this->front_common_model->get_center_course_dates($this->customer_id);
		$getSlug = $this->front_common_model->getSlug('center-course-dates');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('user/center_course_dates', $data);
	}

	public function view_center_course_dates() {
		$id = base64_decode($this->input->get('id'));

		$data['upComming'] = $this->front_common_model->get_Center_course_dates_view($id, $this->customer_id);

		$this->load->view('user/view_center_course_dates', $data);

	}

	public function profile() {

		if (!empty($_POST)) {
			$update_data = array(
				'username' => $this->input->post('first_name'),
				'lastname' => $this->input->post('last_name'),
			);

			$update = $this->db->where('id', $this->customer_id);
			$update = $this->db->update('customer', $update_data);

			print_r($this->db->last_query());

			if (!empty($this->input->post('password'))) {
				$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				$array_p = array(
					'password' => $password,
				);

				$update_p = $this->db->where('id', $this->customer_id);
				$update_p = $this->db->update('customer', $array_p);
			}

			$this->session->set_flashdata('SUCCESS', 'Profile successfully updated');

		}

		$data['getuser'] = $this->front_common_model->getCustomerData($this->customer_id);

		$getSlug = $this->front_common_model->getSlug('profile');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('user/profile', $data);

	}

	public function course() {
		$getRecord = $this->db->order_by('id', 'desc');
		$getRecord = $this->db->where('customer_id', $this->customer_id);
		$getRecord = $this->db->get('course_book')->result();
		$data['getRecord'] = $getRecord;

		$getSlug = $this->front_common_model->getSlug('course-order');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

		$this->load->view('user/course', $data);

	}

	public function view_course() {
		$id = base64_decode($this->input->get('id'));

		$data['upComming'] = $this->front_common_model->get_course_view($id, $this->customer_id);

		$this->load->view('user/view_course', $data);

	}

}
