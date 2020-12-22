<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Exam extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_exam_model', '', TRUE);

		$this->load->model('front/front_common_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/exam/exam_list');
	}

	function exam_list() {

		$this->load->library('pagination');

		$total = $this->panel_exam_model->countExam();
		$per_page = 40;
		$data['getExam'] = $this->panel_exam_model->getExam($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/exam/exam_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Exam Booking List';
		$this->load->view('panel/exam/exam_list', $data);
	}

	function add_exam() {
		if (!empty($_POST)) {
			$phone = $this->input->post('phone');

			if (!empty($this->input->post('customer_id'))) {
				$customer = $this->db->where('id', $this->input->post('customer_id'));
				$customer = $this->db->get('customer')->row();
				$first_name = $customer->username;
				$last_name = $customer->lastname;
				$email = $customer->email;
				$phone = $customer->phone;
			} else {
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$email = $this->input->post('email');
			}

			if (!empty($this->input->post('phone'))) {
				$phone = $this->input->post('phone');
			}

			if ($this->input->post('exam_type') == '299') {
				$exam_type = 'OET';
			} else {
				$exam_type = 'OSCE';
			}

			$reference_number = 'PL' . date('Ymdhis');
			$array = array(
				'customer_id' => $this->input->post('customer_id'),
				'exam_type' => $exam_type,
				'reference_number' => $reference_number,
				'exam_date' => date('Y-m-d', strtotime($this->input->post('exam_date'))),
				'customer_id' => $this->input->post('customer_id'),
				'candidate_number' => $this->input->post('candidate_number'),
				'nmc_id_number' => $this->input->post('nmc_id_number'),
				'dob' => $this->input->post('dob'),
				'country_of_study' => $this->input->post('country_of_study'),
				'nationality' => $this->input->post('nationality'),
				'location_id' => $this->input->post('location_id'),
				'first_name' => $first_name,
				'last_name' => $last_name,
				'phone' => $phone,
				'email' => $email,
				'exam_before' => $this->input->post('exam_before'),
				'exam_upcoming' => $this->input->post('exam_upcoming'),
				'upcoming_exam_date' => $this->input->post('upcoming_exam_date'),
				'accommodation_need' => $this->input->post('accommodation_need'),
				'number_of_nights' => $this->input->post('number_of_nights'),
				'total_accomodation' => $this->input->post('total_accomodation'),
				'final_total' => $this->input->post('final_total'),
				'is_admin' => '1',
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('exam_book', $array);
			$last_id = $this->db->insert_id();

			if (empty($this->input->post('customer_id'))) {
				$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'exam_book');
			}

			if ($this->input->post('send_invoice')) {

				$amount = $this->input->post('final_total');
				$source = '3484';
				$slug = $this->front_common_model->MakePayment($last_id, 'exam_book', $amount, $source);

				$data['link'] = $slug;
				$data['first_name'] = $first_name;
				$data['reference_number'] = $reference_number;

				$htmlMessage = $this->load->view('mail/exam_book_invoice', $data, true);

				$this->front_common_model->sendEmail($email, 'Exam Booking Invoice and Payment Link - IELTS Medical', $htmlMessage);
			}

			$this->session->set_flashdata('SUCCESS', 'Exam Booking Created Successfully');
			redirect('panel/exam/exam_list');

		}

		$course_datlocation = $this->db->where('type', 'OET');
		$course_datlocation = $this->db->order_by('location', 'asc');
		$course_datlocation = $this->db->get('location')->result();
		$data['course_datlocation'] = $course_datlocation;

		$customer = $this->db->order_by('username', 'asc');
		$customer = $this->db->get('customer')->result();
		$data['customer'] = $customer;

		$data['heder_title'] = 'Create Exam Booking';
		$this->load->view('panel/exam/add_exam', $data);
	}

	function delete_exam($id) {
		$this->db->where('id', $id);
		$this->db->delete('exam_book');

		$this->session->set_flashdata('SUCCESS', 'Exam Booking Deleted Successfully');
		redirect('panel/exam/exam_list');
	}

	function getlocation() {
		$course_datlocation = $this->db->where('type', $this->input->post('type'));
		$course_datlocation = $this->db->order_by('location', 'asc');
		$course_datlocation = $this->db->get('location')->result();

		$html = '';
		$html .= '<option value="">Select Preferred test location</option>';
		foreach ($course_datlocation as $key => $row) {
			$html .= '<option value="' . $row->id . '">' . $row->location . ' - ' . $row->venue_name . '</option>';
		}

		$json['success'] = $html;

		echo json_encode($json);

	}

	function view_exam($id) {

		$data['upcomming'] = $this->panel_exam_model->view_exam_list($id);

		$data['heder_title'] = 'View Exam Booking';
		$this->load->view('panel/exam/view_exam', $data);
	}

	public function add_tracking($id) {
		$update1 = $this->db->where('id', $this->input->post('order_no'));
		$update1 = $this->db->set('tracking_no', $this->input->post('tracking_no'));
		$update1 = $this->db->update('exam_book');

		$this->session->set_flashdata('SUCCESS', "Exam Booking Successfully add!");
		redirect('panel/exam/exam_list');
	}

}
