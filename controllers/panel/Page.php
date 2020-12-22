<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Page extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_page_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/page/page_list');
	}

	function page_list() {

		$this->load->library('pagination');

		$total = $this->panel_page_model->countPage();
		$per_page = 40;
		$data['getPage'] = $this->panel_page_model->getPage($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/page/page_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Page List';
		$this->load->view('panel/page/page_list', $data);
	}
	function delete_page($id) {
		$this->db->where('id', $id);
		$this->db->delete('page');

		$this->session->set_flashdata('SUCCESS', 'Page Deleted Successfully');
		redirect('panel/page/page_list');
	}

	function add_page() {
		if (!empty($_POST)) {
			$array = array(
				'slug' => $this->input->post('slug'),
				'title' => $this->input->post('title'),
				'meta_description' => $this->input->post('meta_description'),
				'description' => $this->input->post('description'),
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('page', $array);
			$this->session->set_flashdata('SUCCESS', 'Page Created Successfully');
			redirect('panel/page/page_list');

		}
		$data['heder_title'] = 'Add Page';
		$this->load->view('panel/page/add_page', $data);
	}

	function edit_page($id) {
		if (!empty($_POST)) {
			$array = array(
				'slug' => $this->input->post('slug'),
				'title' => $this->input->post('title'),
				'meta_description' => $this->input->post('meta_description'),
				'description' => $this->input->post('description'),

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('page', $array);

			$this->session->set_flashdata('SUCCESS', 'Page Updated Successfully');
			redirect('panel/page/page_list');
		}

		$page = $this->db->where('id', $id);
		$page = $this->db->get('page')->row();

		$data['page'] = $page;
		$data['heder_title'] = 'Edit Page';
		$this->load->view('panel/page/edit_page', $data);
	}

}
