<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Coursemain extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_course_main_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/course_main/course_main_list');
	}

	function course_main_list() {

		$this->load->library('pagination');

		$total = $this->panel_course_main_model->countCourseMain();
		$per_page = 40;
		$data['getCourse'] = $this->panel_course_main_model->getCourseMain($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/course_main/course_main_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Course Main List';
		$this->load->view('panel/course_main/course_main_list', $data);
	}
	function delete_course_main($id) {
		$this->db->where('id', $id);
		$this->db->delete('course_main');

		$this->session->set_flashdata('SUCCESS', 'Course Main Deleted Successfully');
		redirect('panel/coursemain/course_main_list');
	}

	function add_course_main() {
		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$photo_image = $_FILES["photo_image"]["name"];
				$array_name = explode(".", $photo_image);
				$ext = end($array_name);

				$photo_image = date('ymdhis') . '.' . $ext;
				$folder = "img/coursemain/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
			} else {
				$photo_image = '';
			}

			$array = array(
				'course_main' => $this->input->post('course_main'),
				'main_title' => $this->input->post('main_title'),
				'url' => $this->input->post('url'),
				'sub_title' => $this->input->post('sub_title'),
				'sub_title_description' => $this->input->post('sub_title_description'),
				'testimonials' => $this->input->post('testimonials'),
				'work' => $this->input->post('work'),
				'photo_image' => $photo_image,
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('course_main', $array);
			$this->session->set_flashdata('SUCCESS', 'Course Main Created Successfully');
			redirect('panel/coursemain/course_main_list');

		}
		$data['heder_title'] = 'Add Course Main';
		$this->load->view('panel/course_main/add_course_main', $data);
	}

	function edit_course_main($id) {

		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$name = $_FILES["photo_image"]["name"];

				$array_name = explode(".", $name);
				$ext = end($array_name);

				$photo_image = date('ymdhis') . '.' . $ext;

				$folder = "img/coursemain/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
				//  move_uploaded_file($_FILES["image_upload"]["tmp_name"], $folder . $_FILES["image_upload"]["name"]);
			} else {
				$photo_image = $this->input->post('old_imagename');
			}
			$array = array(
				'course_main' => $this->input->post('course_main'),
				'main_title' => $this->input->post('main_title'),
				'url' => $this->input->post('url'),
				'sub_title' => $this->input->post('sub_title'),
				'sub_title_description' => $this->input->post('sub_title_description'),
				'testimonials' => $this->input->post('testimonials'),
				'work' => $this->input->post('work'),
				'photo_image' => $photo_image,

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('course_main', $array);

			$this->session->set_flashdata('SUCCESS', 'Course Main Updated Successfully');
			redirect('panel/coursemain/course_main_list');
		}

		$apps = $this->db->where('id', $id);
		$apps = $this->db->get('course_main')->row();

		$data['apps'] = $apps;
		$data['heder_title'] = 'Edit Course Main';
		$this->load->view('panel/course_main/edit_course_main', $data);
	}

}
