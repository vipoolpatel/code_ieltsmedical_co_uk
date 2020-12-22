<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Location extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_location_model', '', TRUE);
		require_once APPPATH . 'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/page/location_list');
	}

	function location_list() {

		$this->load->library('pagination');

		$total = $this->panel_location_model->countLocation();
		$per_page = 100;
		$data['getLocation'] = $this->panel_location_model->getLocation($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/location/location_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Location List';
		$this->load->view('panel/location/location_list', $data);
	}

	public function add_location() {
		if (!empty($_POST)) {
			$array = array(
				'location' => $this->input->post('location_office'),
				'type' => $this->input->post('type'),
				'venue_name' => $this->input->post('venue_name'),
				'created_date' => date('Y-m-d'),
			);

			$this->db->insert('location', $array);
			$this->session->set_flashdata('SUCCESS', 'Location Created Successfully');
			redirect('panel/location/location_list');

		}
		$data['heder_title'] = 'Add Location';
		$this->load->view('panel/location/add_location', $data);
	}

	public function edit_location($id) {
		if (!empty($_POST)) {
			$array = array(
				'location' => $this->input->post('location_office'),
				'venue_name' => $this->input->post('venue_name'),
				'type' => $this->input->post('type'),
			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('location', $array);

			$this->session->set_flashdata('SUCCESS', 'Location Updated Successfully');
			redirect('panel/location/location_list');
		}

		$get = $this->db->where('id', $id);
		$get = $this->db->get('location')->row();
		$data['edit_company_location'] = $get;
		$data['heder_title'] = 'Edit Location';
		$this->load->view('panel/location/edit_location', $data);
	}

	public function upload_location() {

		$newfile = 'file/location/';
		$picturename = date('YmdHis') . $_FILES['result_file']['name'];
		move_uploaded_file($_FILES['result_file']['tmp_name'], $newfile . $picturename);

		$file_type = PHPExcel_IOFactory::identify($newfile . $picturename);

		$objReader = PHPExcel_IOFactory::createReader($file_type);
		$objPHPExcel = $objReader->load($newfile . $picturename);
		$sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

		$i = 1;
		foreach ($sheet_data as $value) {

			if (!empty($value['A'])) {
				if ($i != '1') {

					$array = array(
						'location' => $value['A'],
						'type' => $this->input->post('type'),
						'venue_name' => !empty($value['B']) ? $value['B'] : '',
						'created_date' => date('Y-m-d'),
					);
					$this->db->insert('location', $array);
				}
				$i++;
			}
		}

		$this->session->set_flashdata('SUCCESS', 'Location Updated Successfully');
		redirect('panel/location/location_list');

	}

	function delete_location($id) {

		$this->db->where('id', $id);
		$this->db->delete('location');

		$this->session->set_flashdata('SUCCESS', 'Location Deleted Successfully');
		redirect('panel/location/location_list');
	}

}
