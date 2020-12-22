<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Calendarbook extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_calendar_book_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/calendarbook/calendar_book_list');
	}

	function calendar_book_list() {

		$this->load->library('pagination');

		$total = $this->panel_calendar_book_model->countCalendarBook();
		$per_page = 40;
		$data['getCalendarBook'] = $this->panel_calendar_book_model->getCalendarBook($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/calendarbook/calendar_book_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
	        $this->pagination->initialize($config);

		$data['heder_title'] = 'Calendar Book List';
		$this->load->view('panel/calendarbook/calendar_book_list', $data);
	}
	function delete_calendar_book($id) {
		$this->db->where('id', $id);
		$this->db->delete('calendar_booking');

		$this->session->set_flashdata('SUCCESS', 'Calendar Book Deleted Successfully');
		redirect('panel/calendarbook/calendar_book_list');
	}

	// function add_calendar_book() {
	// 	if (!empty($_POST)) {
			
	// 		$array = array(
	// 			'calendar_id' => $this->input->post('calendar_id'),
	// 			'first_name' => $this->input->post('first_name'),
	// 			'last_name' => $this->input->post('last_name'),
	// 			'email' => $this->input->post('email'),
	// 			'phone_number' => $this->input->post('phone_number'),
	// 			'book_date' => $this->input->post('book_date'),
	// 			'book_time' => $this->input->post('book_time'),
	// 			'address' => $this->input->post('address'),
	// 			'notes' => $this->input->post('notes'),
	// 			'created_at' => date('Y-m-d H:i:s'),
	// 		);

	// 		$this->db->insert('calendar_booking', $array);
	// 		$this->session->set_flashdata('SUCCESS', 'Calendar Booking Created Successfully');
	// 		redirect('panel/calendarbook/calendar_book_list');

	// 	}

	// 	$calender_get = $this->db->get('calender')->result();
	// 	$data['calender_get'] = $calender_get;


	// 	$data['heder_title'] = 'Add Calendar Book';
	// 	$this->load->view('panel/calendarbook/add_calendar_book', $data);
	// }

	// function edit_calendar_book($id) {

	// 	if (!empty($_POST)) {
			
	// 		$array = array(
	// 			'calendar_id' => $this->input->post('calendar_id'),
	// 			'first_name' => $this->input->post('first_name'),
	// 			'last_name' => $this->input->post('last_name'),
	// 			'email' => $this->input->post('email'),
	// 			'phone_number' => $this->input->post('phone_number'),
	// 			'book_date' => $this->input->post('book_date'),
	// 			'book_time' => $this->input->post('book_time'),
	// 			'address' => $this->input->post('address'),
	// 			'notes' => $this->input->post('notes'),

	// 		);

	// 		$this->db->where('id', $this->input->post('id'));
	// 		$this->db->update('calendar_booking', $array);

	// 		$this->session->set_flashdata('SUCCESS', 'Calendar Book Updated Successfully');
	// 		redirect('panel/calendarbook/calendar_book_list');
	// 	}

	// 	$calendar_booking_edit = $this->db->where('id', $id);
	// 	$calendar_booking_edit = $this->db->get('calendar_booking')->row();

	// 	$data['calendar_booking_edit'] = $calendar_booking_edit;
	// 	$data['heder_title'] = 'Edit Calendar Book';
	// 	$this->load->view('panel/calendarbook/calendar_book_list', $data);
	// }

}
