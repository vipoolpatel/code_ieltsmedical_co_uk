<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Document extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_document_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/document/document_list');
	}

	function document_list() {

		$this->load->library('pagination');

		$total = $this->panel_document_model->countDocument();
		$per_page = 40;
		$data['getDocument'] = $this->panel_document_model->getDocument($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/document/document_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);
       
		$data['heder_title'] = 'Document List';
		$this->load->view('panel/document/document_list', $data);
	}
	function delete_document($id) {
		$this->db->where('id', $id);
		$this->db->delete('document');

		$this->session->set_flashdata('SUCCESS', 'Document Deleted Successfully');
		redirect('panel/document/document_list');
	}


}
