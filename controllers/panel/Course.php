<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Course extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_course_model', '', TRUE);
		require_once APPPATH . 'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/page/course_list');
	}

	function course_list() {

		$this->load->library('pagination');

		$total = $this->panel_course_model->countCourse();
		$per_page = 100;
		$data['getCourse'] = $this->panel_course_model->getCourse($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/course/course_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['course_date'] = $this->db->get('course_main')->result();
		$data['heder_title'] = 'Course List';
		$this->load->view('panel/course/course_list', $data);
	}

	function edit_course($id) {
		if (!empty($_POST)) {
			if ($this->input->post('end_date')) {
				$end_date = date('Y-m-d', strtotime($this->input->post('end_date')));
			} else {
				$end_date = '0000-00-00';
			}
			$array = array(
				'course_main_id' => $this->input->post('course_main_id'),
				'course_name' => $this->input->post('course_name'),
				// 'day' => $this->input->post('day'),
				// 'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'time' => $this->input->post('time'),
				'start_date' => date('Y-m-d', strtotime($this->input->post('start_date'))),
				'end_date' => $end_date,
				// 'extra' => $this->input->post('extra'),
				// 'extra2' => $this->input->post('extra2'),
				// 'description2' => $this->input->post('description2'),
			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('course', $array);

			$this->session->set_flashdata('SUCCESS', 'Course Updated Successfully');
			redirect('panel/course/course_list');
		}

		$apps = $this->db->where('id', $id);
		$apps = $this->db->get('course')->row();

		$data['course_date'] = $this->db->get('course_main')->result();

		$data['apps'] = $apps;
		$data['heder_title'] = 'Edit Course';
		$this->load->view('panel/course/edit_course', $data);
	}

	function add_course() {
		if (!empty($_POST)) {

			if ($this->input->post('end_date')) {
				$end_date = date('Y-m-d', strtotime($this->input->post('end_date')));
			} else {
				$end_date = '0000-00-00';
			}

			$array = array(
				'course_main_id' => $this->input->post('course_main_id'),
				'course_name' => $this->input->post('course_name'),
				'time' => $this->input->post('time'),

				// 'day' => $this->input->post('day'),
				// 'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'start_date' => date('Y-m-d', strtotime($this->input->post('start_date'))),
				'end_date' => $end_date,
				// 'extra' => $this->input->post('extra'),
				// 'extra2' => $this->input->post('extra2'),
				// 'description2' => $this->input->post('description2'),
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('course', $array);
			$this->session->set_flashdata('SUCCESS', 'Course Created Successfully');
			redirect('panel/course/course_list');

		}

		$data['course_date'] = $this->db->get('course_main')->result();

		$data['heder_title'] = 'Add Course';
		$this->load->view('panel/course/add_course', $data);
	}

	function delete_course($id) {

		$this->db->where('id', $id);
		$this->db->delete('course');

		$this->session->set_flashdata('SUCCESS', 'Course Deleted Successfully');
		redirect('panel/course/course_list');
	}

	function view_course($id) {

		$this->db->select('course.*,course_main.course_main');
		$this->db->from('course');
		$this->db->join('course_main', 'course_main.id = course.course_main_id', 'left');
		$this->db->where('course.id', $id);

		$data['upcomming'] = $this->db->get()->row();

		$data['heder_title'] = 'View Course';
		$this->load->view('panel/course/view_course', $data);
	}

	function export_excel() {

		require_once './application/third_party/PHPExcel.php';
		require_once './application/third_party/PHPExcel/IOFactory.php';

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		$default_border = array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('rgb' => '000000'),
		);

		$acc_default_border = array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('rgb' => 'c7c7c7'),
		);
		$outlet_style_header = array(
			'font' => array(
				'color' => array('rgb' => '000000'),
				'size' => 10,
				'name' => 'Arial',
				'bold' => true,
			),
		);
		$top_header_style = array(
			'borders' => array(
				'bottom' => $default_border,
				'left' => $default_border,
				'top' => $default_border,
				'right' => $default_border,
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'ffff03'),
			),
			'font' => array(
				'color' => array('rgb' => '000000'),
				'size' => 15,
				'name' => 'Arial',
				'bold' => true,
			),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
		);
		$style_header = array(
			'borders' => array(
				'bottom' => $default_border,
				'left' => $default_border,
				'top' => $default_border,
				'right' => $default_border,
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'ffff03'),
			),
			'font' => array(
				'color' => array('rgb' => '000000'),
				'size' => 12,
				'name' => 'Arial',
				'bold' => true,
			),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
			),
		);
		$account_value_style_header = array(
			'borders' => array(
				'bottom' => $default_border,
				'left' => $default_border,
				'top' => $default_border,
				'right' => $default_border,
			),
			'font' => array(
				'color' => array('rgb' => '000000'),
				'size' => 12,
				'name' => 'Arial',
			),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
			),
		);
		$text_align_style = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			),
			'borders' => array(
				'bottom' => $default_border,
				'left' => $default_border,
				'top' => $default_border,
				'right' => $default_border,
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'ffff03'),
			),
			'font' => array(
				'color' => array('rgb' => '000000'),
				'size' => 12,
				'name' => 'Arial',
				'bold' => true,
			),
		);

		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Course Name');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Start Date');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'End Date');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Time');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Price');

		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($style_header);

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(65);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);

		$row = 2;

		$custDtaData = $this->panel_course_model->getExcelDownload();

		foreach ($custDtaData as $value) {

			$start_date = '';
			if ($value->start_date != '0000-00-00') {
				$start_date = date('d-m-Y', strtotime($value->start_date));
			}

			$end_date = '';
			if ($value->end_date != '0000-00-00') {
				$end_date = date('d-m-Y', strtotime($value->end_date));
			}
			$created_date = '';
			if ($value->created_date != '0000-00-00 00:00:00') {
				$created_date = date('d-m-Y h:i A', strtotime($value->created_date));
			}

			$objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $value->course_name);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $start_date);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $end_date);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $value->time);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $value->price);
			$row++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Course.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');

	}

}
