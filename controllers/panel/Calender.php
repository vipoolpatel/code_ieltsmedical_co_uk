<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Calender extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_calender_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/page/calender_list');
	}

	function calender_list() {

		$this->load->library('pagination');

		$total = $this->panel_calender_model->countCalender();
		$per_page = 40;
		$data['getCalender'] = $this->panel_calender_model->getCalender($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/calender/calender_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Calendar List';
		$this->load->view('panel/calender/calender_list', $data);
	}

	public function add_calender() {
		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$photo_image = $_FILES["photo_image"]["name"];
				$array_name = explode(".", $photo_image);
				$ext = end($array_name);

				$photo_image = date('ymdhis') . '.' . $ext;
				$folder = "img/calender/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
			} else {
				$photo_image = '';
			}

				$array = array(
					'main_title' => $this->input->post('main_title'),
					'sub_title' => $this->input->post('sub_title'),
					'time' => $this->input->post('time'),
					'description' => $this->input->post('description'),
					'photo_image' => $photo_image,
					'created_date' => date('Y-m-d'),
				);

				$this->db->insert('calender', $array);
				$this->session->set_flashdata('SUCCESS', 'Calendar Created Successfully');
				redirect('panel/calender/calender_list');
			
		}
		$data['heder_title'] = 'Add Calendar';
		$this->load->view('panel/calender/add_calender', $data);
	}

	public function edit_calender($id) {
		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$name = $_FILES["photo_image"]["name"];
				$array_name = explode(".", $name);
				$ext = end($array_name);
				$photo_image = date('ymdhis') . '.' . $ext;
				$folder = "img/calender/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
				//  move_uploaded_file($_FILES["image_upload"]["tmp_name"], $folder . $_FILES["image_upload"]["name"]);
			} else {
				$photo_image = $this->input->post('old_imagename');
			}
			$array = array(
				'main_title' => $this->input->post('main_title'),
				'sub_title' => $this->input->post('sub_title'),
				'time' => $this->input->post('time'),
				'photo_image' => $photo_image,
				'description' => $this->input->post('description'),
			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('calender', $array);

			$this->session->set_flashdata('SUCCESS', 'Calendar Updated Successfully');
			redirect('panel/calender/calender_list');
		}

		$get = $this->db->where('id', $id);
		$get = $this->db->get('calender')->row();

		$data['edit_calender_record'] = $get;
		$data['heder_title'] = 'Edit Calendar';
		$this->load->view('panel/calender/edit_calender', $data);
	}

	function delete_calender($id) {

		$this->db->where('id', $id);
		$this->db->delete('calender');

		$this->session->set_flashdata('SUCCESS', 'Calendar Deleted Successfully');
		redirect('panel/calender/calender_list');
	}

}
