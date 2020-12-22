<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Apps extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_apps_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/apps/apps_list');
	}

	function apps_list() {

		$this->load->library('pagination');

		$total = $this->panel_apps_model->countApps();
		$per_page = 40;
		$data['getApps'] = $this->panel_apps_model->getApps($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/apps/apps_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Apps List';
		$this->load->view('panel/apps/apps_list', $data);
	}
	function delete_apps($id) {
		$this->db->where('id', $id);
		$this->db->delete('apps');

		$this->session->set_flashdata('SUCCESS', 'Apps Deleted Successfully');
		redirect('panel/apps/apps_list');
	}

	function add_apps() {
		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$photo_image = $_FILES["photo_image"]["name"];
				$array_name = explode(".", $photo_image);
				$ext = end($array_name);

				$photo_image = date('ymdhis') . '.' . $ext;
				$folder = "img/app/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
			} else {
				$photo_image = '';
			}

			$array = array(
				'app_store' => $this->input->post('app_store'),
				'google_play' => $this->input->post('google_play'),
				'user_status' => $this->input->post('user_status'),
				'photo_image' => $photo_image,
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('apps', $array);
			$this->session->set_flashdata('SUCCESS', 'Apps Created Successfully');
			redirect('panel/apps/apps_list');

		}
		$data['heder_title'] = 'Add Apps';
		$this->load->view('panel/apps/add_apps', $data);
	}

	function edit_apps($id) {

		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$name = $_FILES["photo_image"]["name"];
				$array_name = explode(".", $name);
				$ext = end($array_name);
				$photo_image = date('ymdhis') . '.' . $ext;
				$folder = "img/app/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
				//  move_uploaded_file($_FILES["image_upload"]["tmp_name"], $folder . $_FILES["image_upload"]["name"]);
			} else {
				$photo_image = $this->input->post('old_imagename');
			}

			$array = array(
				'app_store' => $this->input->post('app_store'),
				'google_play' => $this->input->post('google_play'),
				'user_status' => $this->input->post('user_status'),
				'photo_image' => $photo_image,

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('apps', $array);

			$this->session->set_flashdata('SUCCESS', 'Apps Updated Successfully');
			redirect('panel/apps/apps_list');
		}

		$apps = $this->db->where('id', $id);
		$apps = $this->db->get('apps')->row();

		$data['apps'] = $apps;
		$data['heder_title'] = 'Edit Apps';
		$this->load->view('panel/apps/edit_apps', $data);
	}

}
