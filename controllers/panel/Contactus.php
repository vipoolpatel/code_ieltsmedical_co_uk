<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Contactus extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_contactus_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/contactus/contact_us_list');
	}

	function contact_us_list() {

		$this->load->library('pagination');

		$total = $this->panel_contactus_model->countContactus();
		$per_page = 40;
		$data['getContactus'] = $this->panel_contactus_model->getContactus($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/contactus/contact_us_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Contact Us List';
		$this->load->view('panel/contactus/contact_us_list', $data);
	}
	function delete_contactus($id) {
		$this->db->where('id', $id);
		$this->db->delete('contact_us');

		$this->session->set_flashdata('SUCCESS', 'Contact Us Deleted Successfully');
		redirect('panel/contactus/contact_us_list');
	}

}
