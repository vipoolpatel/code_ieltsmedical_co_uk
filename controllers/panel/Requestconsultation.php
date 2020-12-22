<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Requestconsultation extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_request_consultation_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/requestconsultation/request_consultation_list');
	}

	function request_consultation_list() {

		$this->load->library('pagination');

		$total = $this->panel_request_consultation_model->countRequestconsultation();
		$per_page = 40;
		$data['getRequestconsultation'] = $this->panel_request_consultation_model->getRequestconsultation($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/requestconsultation/request_consultation_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Request Consultation List';
		$this->load->view('panel/requestconsultation/request_consultation_list', $data);
	}
	function delete_request_consultation($id) {
		$this->db->where('id', $id);
		$this->db->delete('request_free_consultation');

		$this->session->set_flashdata('SUCCESS', 'Request Consultation Deleted Successfully');
		redirect('panel/requestconsultation/request_consultation_list');
	}

}
