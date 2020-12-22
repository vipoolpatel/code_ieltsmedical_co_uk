<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Uploaddocument extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_upload_document_model', '', TRUE);
		$this->load->model('front/front_common_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/upload_document/upload_document_list');
	}

	function upload_document_list() {

		$this->load->library('pagination');

		$total = $this->panel_upload_document_model->countUploadDocument();
		$per_page = 40;
		$data['getUpload'] = $this->panel_upload_document_model->getUploadDocument($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/upload_document/upload_document_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Document Library List';
		$this->load->view('panel/upload_document/upload_document_list', $data);
	}
	function delete_upload_document($id) {
		$this->db->where('id', $id);
		$this->db->delete('upload_document');

		$this->session->set_flashdata('SUCCESS', 'Document Library Deleted Successfully');
		redirect('panel/uploaddocument/upload_document_list');
	}

	function add_upload_document() {
		if (!empty($_POST)) {
			if (!empty($_FILES["upload_file"]["name"])) {
				$upload_file = $_FILES["upload_file"]["name"];
				$array_name = explode(".", $upload_file);
				$ext = end($array_name);

				$upload_file = date('ymdhis') . '.' . $ext;
				$folder = "img/document/";
				move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder . $upload_file);
			} else {
				$upload_file = '';
			}

			$array = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'upload_file' => $upload_file,
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('upload_document', $array);
			$this->session->set_flashdata('SUCCESS', 'Document Library Created Successfully');
			redirect('panel/uploaddocument/upload_document_list');

		}
		$data['heder_title'] = 'Add Document Library';
		$this->load->view('panel/upload_document/add_upload_document', $data);
	}

	function edit_upload_document($id) {

		if (!empty($_POST)) {
			if (!empty($_FILES["upload_file"]["name"])) {
				$name = $_FILES["upload_file"]["name"];
				$array_name = explode(".", $name);
				$ext = end($array_name);
				$upload_file = date('ymdhis') . '.' . $ext;
				$folder = "img/document/";
				move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder . $upload_file);
				//  move_uploaded_file($_FILES["image_upload"]["tmp_name"], $folder . $_FILES["image_upload"]["name"]);
			} else {
				$upload_file = $this->input->post('old_imagename');
			}

			$array = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'upload_file' => $upload_file,

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('upload_document', $array);

			$this->session->set_flashdata('SUCCESS', 'Document Library Updated Successfully');
			redirect('panel/uploaddocument/upload_document_list');
		}

		$document = $this->db->where('id', $id);
		$document = $this->db->get('upload_document')->row();

		$data['document'] = $document;
		$data['heder_title'] = 'Edit Document Library';
		$this->load->view('panel/upload_document/edit_upload_document', $data);
	}

	function send_document() {

		if (!empty($_POST)) {

			$customer = $this->db->where('id', $this->input->post('customer_id'));
			$customer = $this->db->get('customer')->row();

			$upload_document_title = $this->db->where('id', $this->input->post('upload_document_id'));
			$upload_document_title = $this->db->get('upload_document')->row();

			$data['first_name'] = $customer->username;
			$data['upload_file'] = $upload_document_title->upload_file;
			$data['title'] = $upload_document_title->title;
			$data['description'] = $upload_document_title->description;

			$htmlMessage = $this->load->view('mail/send_document', $data, true);

			$this->front_common_model->sendEmail($customer->email, 'Your Document - IELTS Medical', $htmlMessage);

			$this->session->set_flashdata('SUCCESS', 'Document successfully sent.');

			redirect('panel/uploaddocument/send_document');
		}

		$customer_email = $this->db->order_by('username', 'asc');
		$customer_email = $this->db->get('customer')->result();
		$data['customer_email'] = $customer_email;

		$data['upload_document_title'] = $this->db->get('upload_document')->result();
		$data['heder_title'] = 'Send Document';
		$this->load->view('panel/upload_document/send_document', $data);
	}

}
