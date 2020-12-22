<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Centercoursedates extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_centercoursedates_model', '', TRUE);
		require_once APPPATH . 'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/centercoursedates/centercoursedates_list');
	}

	function centercoursedates_list() {

		$this->load->library('pagination');

		$total = $this->panel_centercoursedates_model->countCentercoursedates();
		$per_page = 40;
		$data['getCentercoursedates'] = $this->panel_centercoursedates_model->getCentercoursedates($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/centercoursedates/centercoursedates_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Center Course Dates List';
		$this->load->view('panel/centercoursedates/centercoursedates_list', $data);
	}
	function delete_centercoursedates($id) {
		$this->db->where('id', $id);
		$this->db->delete('centre_course_dates');

		$this->session->set_flashdata('SUCCESS', 'Center Course Dates Deleted Successfully');
		redirect('panel/centercoursedates/centercoursedates_list');
	}

	function add_centercoursedates() {
		if (!empty($_POST)) {
			$end_date = '0000-00-00';
			if ($this->input->post('end_date')) {
				$end_date = date('Y-m-d', strtotime($this->input->post('end_date')));
			}
			$result_date = '0000-00-00';
			if ($this->input->post('result_date')) {
				$result_date = date('Y-m-d', strtotime($this->input->post('result_date')));
			}
			$array = array(
				'course' => $this->input->post('course'),
				'description' => $this->input->post('description'),
				'start_date' => date('Y-m-d', strtotime($this->input->post('start_date'))),
				'end_date' => $end_date,
				'result_date' => $result_date,

				'time' => $this->input->post('time'),
				'venue' => $this->input->post('venue'),
				'fee' => $this->input->post('fee'),
				'type' => $this->input->post('type'),
				'location_type' => $this->input->post('location_type'),
				'mock_test' => !empty($this->input->post('mock_test')) ? 'Yes' : '',

				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('centre_course_dates', $array);
			$this->session->set_flashdata('SUCCESS', 'Center Course Dates Created Successfully');
			redirect('panel/centercoursedates/centercoursedates_list');

		}

		$data['course_get'] = $this->db->get('course_main')->result();

		$data['heder_title'] = 'Add Center Course Dates';
		$this->load->view('panel/centercoursedates/add_centercoursedates', $data);
	}

	function edit_centercoursedates($id) {
		if (!empty($_POST)) {

			$end_date = '0000-00-00';
			if ($this->input->post('end_date')) {
				$end_date = date('Y-m-d', strtotime($this->input->post('end_date')));
			}

			$result_date = '0000-00-00';
			if ($this->input->post('result_date')) {
				$result_date = date('Y-m-d', strtotime($this->input->post('result_date')));
			}

			$array = array(
				'course' => $this->input->post('course'),
				'description' => $this->input->post('description'),
				'start_date' => date('Y-m-d', strtotime($this->input->post('start_date'))),
				'end_date' => $end_date,
				'result_date' => $result_date,
				'time' => $this->input->post('time'),
				'venue' => $this->input->post('venue'),
				'fee' => $this->input->post('fee'),
				'location_type' => $this->input->post('location_type'),
				'type' => $this->input->post('type'),
				'mock_test' => !empty($this->input->post('mock_test')) ? 'Yes' : '',

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('centre_course_dates', $array);

			$this->session->set_flashdata('SUCCESS', 'Center Course Dates Updated Successfully');
			redirect('panel/centercoursedates/centercoursedates_list');
		}

		$page = $this->db->where('id', $id);
		$page = $this->db->get('centre_course_dates')->row();

		$data['course_get'] = $this->db->get('course_main')->result();

		$data['page'] = $page;
		$data['heder_title'] = 'Edit Center Course Dates';
		$this->load->view('panel/centercoursedates/edit_centercoursedates', $data);
	}

	public function add_centre_course_upload_excel() {
		//$this->load->library('form_validation');

		if (isset($_FILES['result_file'])) {

			$newfile = 'public/quiz/';
			$picturename = date('YmdHis') . $_FILES['result_file']['name'];
			move_uploaded_file($_FILES['result_file']['tmp_name'], $newfile . $picturename);

			$file_type = PHPExcel_IOFactory::identify($newfile . $picturename);

			$objReader = PHPExcel_IOFactory::createReader($file_type);
			$objPHPExcel = $objReader->load($newfile . $picturename);
			$sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

			$i = 1;
			foreach ($sheet_data as $value) {

				if (!empty($value['A']) && !empty($value['H']) && !empty($value['G'])) {
					if ($i != '1') {
						$end_date = '0000-00-00';
						if ($value['C']) {
							$end_date = str_replace('/', '-', $value['C']);
							$end_date = date('Y-m-d', strtotime($end_date));
						}

						$start_date = '0000-00-00';
						if ($value['B']) {
							$start_date = str_replace('/', '-', $value['B']);
							$start_date = date('Y-m-d', strtotime($start_date));
						}

						$result_date = '0000-00-00';
						if ($value['I']) {
							$result_date = str_replace('/', '-', $value['I']);
							$result_date = date('Y-m-d', strtotime($result_date));
						}

						$array = array(
							'course' => $value['A'],
							'start_date' => $start_date,
							'end_date' => $end_date,
							'result_date' => $result_date,
							'time' => $value['D'],
							'venue' => $value['E'],
							'fee' => $value['F'],
							'description' => !empty($value['J']) ? $value['J'] : '',
							'location_type' => !empty($value['H']) ? $value['H'] : '',
							'type' => !empty($value['G']) ? $value['G'] : '',
							'created_date' => date('Y-m-d H:i:s'),
						);

						$this->db->insert('centre_course_dates', $array);
					}
					$i++;
				}
			}

			$this->session->set_flashdata('SUCCESS', 'Center Course Dates Updated Successfully');
			redirect('panel/centercoursedates/centercoursedates_list');
		}

		$data['heder_title'] = 'Upload Excel Center Course Dates';
		$this->load->view('panel/centercoursedates/add_centre_course_upload_excel', $data);
	}

	function list_centre_course_dates_booked() {

		$this->load->library('pagination');

		$total = $this->panel_centercoursedates_model->countCentercoursedatesbooked();
		$per_page = 40;
		$data['getRecord'] = $this->panel_centercoursedates_model->getCentercoursedatesbooked($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/centercoursedates/list_centre_course_dates_booked';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);
		//$data['getRecord'] = $this->db->get('centre_course_date_book')->result();
		$data['course_date'] = $this->db->get('centre_course_dates')->result();
		$data['heder_title'] = 'Center Course Dates Booked';
		$this->load->view('panel/centercoursedates/list_centre_course_dates_booked', $data);
	}

	function delete_list_centre_course_dates_booked($id) {
		$this->db->where('id', $id);
		$this->db->delete('centre_course_date_book');

		$this->session->set_flashdata('SUCCESS', 'Center Course Dates Booked Deleted Successfully');
		redirect('panel/centercoursedates/list_centre_course_dates_booked');
	}

	public function add_center_course_order() {

		if (!empty($_POST)) {
			$array = array(
				// 'customer_id' => $this->customer_id,
				'customer_id' => $this->input->post('customer_id'),
				'centre_course_id' => $this->input->post('centre_course_id'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'final_total' => $this->input->post('final_total'),
				'company_code' => $this->input->post('company_code'),
				'company_price' => $this->input->post('company_price'),
				'company_type' => $this->input->post('company_type'),
				'exam_before' => $this->input->post('exam_before'),
				'exam_upcoming' => !empty($this->input->post('exam_upcoming')) ? $this->input->post('exam_upcoming') : 'No',
				'exam_date' => !empty($this->input->post('exam_date')) ? $this->input->post('exam_date') : '',
				'accommodation_need' => $this->input->post('accommodation_need'),
				'number_of_nights' => !empty($this->input->post('number_of_nights')) ? $this->input->post('number_of_nights') : '',

				'candidate_number' => !empty($this->input->post('candidate_number')) ? $this->input->post('candidate_number') : '',
				'location_id' => !empty($this->input->post('location_id')) ? $this->input->post('location_id') : '',
				'nmc_id_number' => !empty($this->input->post('nmc_id_number')) ? $this->input->post('nmc_id_number') : '',
				'dob' => !empty($this->input->post('dob')) ? $this->input->post('dob') : '',
				'country_of_study' => !empty($this->input->post('country_of_study')) ? $this->input->post('country_of_study') : '',
				'nationality' => !empty($this->input->post('nationality')) ? $this->input->post('nationality') : '',
				'created_date' => date('Y-m-d H:i:s'),
				'payment' => '1',
			);

			$this->db->insert('centre_course_date_book', $array);
			// $last_id = $this->db->insert_id();

		}

		$location_get = $this->db->get('location')->result();
		$centre_course_get = $this->db->get('centre_course_dates')->result();
		$customer_get = $this->db->get('customer')->result();
		$data['customer_get'] = $customer_get;
		$data['centre_course_get'] = $centre_course_get;
		$data['location_get'] = $location_get;

		$data['heder_title'] = 'Add Center Course Order';
		$this->load->view('panel/centercoursedates/add_center_course_order', $data);
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
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Venue');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Fee');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Type');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Location Type');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Result date');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Description');

		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($style_header);

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);

		$row = 2;

		$custDtaData = $this->panel_centercoursedates_model->getCentercoursedatesresult();

		foreach ($custDtaData as $value) {

			$start_date = '';
			if ($value->start_date != '0000-00-00') {
				$start_date = date('d-m-Y', strtotime($value->start_date));
			}

			$end_date = '';
			if ($value->end_date != '0000-00-00') {
				$end_date = date('d-m-Y', strtotime($value->end_date));
			}

			$result_date = '';
			if ($value->result_date != '0000-00-00') {
				$result_date = date('d-m-Y', strtotime($value->result_date));
			}

			$objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $value->course);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $start_date);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $end_date);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $value->time);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $value->venue);
			$objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $value->fee);
			$objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $value->type);
			$objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $value->location_type);
			$objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $result_date);
			$objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $value->description);

			$row++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Centre_course_dates.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');

	}

	public function joining_instruction_booking($id) {

		$booking_list = $this->db->select('centre_course_date_book.*,centre_course_dates.course,centre_course_dates.start_date,centre_course_dates.end_date,centre_course_dates.time');
		$booking_list = $this->db->from('centre_course_date_book');
		$booking_list = $this->db->join('centre_course_dates', 'centre_course_dates.id = centre_course_date_book.centre_course_id', 'left');
		$booking_list = $this->db->where('centre_course_date_book.payment', 1);
		$booking_list = $this->db->where('centre_course_date_book.id', $id);
		$booking_list = $this->db->get()->row();
		$data['upcomming'] = $booking_list;

		$data['location'] = $this->db->get('location')->result();

		$data['heder_title'] = 'Joining Instruction Booking';
		$this->load->view('panel/centercoursedates/joining_instruction_booking', $data);
	}

	public function booking_generate_pdf() {
		$this->load->library('dompdf_gen');

		$checkvalid = $this->db->where('id', $this->input->post('id'));
		$checkvalid = $this->db->get('centre_course_date_book')->row();

		$booking_list = $this->db->select('centre_course_date_book.*,centre_course_dates.course,centre_course_dates.start_date,centre_course_dates.end_date,centre_course_dates.time');
		$booking_list = $this->db->from('centre_course_date_book');
		$booking_list = $this->db->join('centre_course_dates', 'centre_course_dates.id = centre_course_date_book.centre_course_id');
		$booking_list = $this->db->where('centre_course_date_book.id', $this->input->post('id'));
		$booking_list = $this->db->get()->row();

		$pdfname = 'joining_instruction_' . date('YmdHis') . ".pdf";
		$html = '';
		$html .= '<html>
                <meta name="viewport" content="width=device-width, initial-scale=1">
            <head>
                <title>Instruction</title>
        <style>
            table {
              display: table; border-collapse: collapse;
            }
            .pricedetail tr td
            {
                font-family:arial;
                font-size: 16px;
                padding: 10px;

            }
            .pricedetail tr th
            {
                font-family:arial;
                font-size: 16px;
                padding: 10px;
            }
            .font-size-set{
                font-size: 24px !important;
                color: blue;
            }
        </style>
            </head>
            <body>
        <table>
            <tr>
                <td><img style="width: 50%;" src="' . base_url() . 'img/logo.png" ></td>
            </tr>
        </table>
        <br />
        <table class="pricedetail">
            <tr>
                <td><b>24/7 Customer Service Line: 0203 637 6722</b></td>
            </tr>
            <tr>
                <td>Dear <b>' . $booking_list->first_name . ',</b></td>
            </tr>
            <tr>
                <td>We look forward to assisting you with your preparation for the ' . $booking_list->course . ' examination. Please make note of these important dates:</td>
            </tr>
        </table>
        <br />

        <table border="1" width="100%" cellspadding="0" class="pricedetail">
            <tr>
                <th>Event</th>
                <th>Date</th>
                <th>Time</th>
                <th>Venue</th>

            </tr>';
		if (!empty($this->input->post('checkbox_1'))) {
			$html .= '<tr>
                <td>' . $this->input->post('event_name_1') . '</td>
                <td>' . $this->input->post('date_1') . '</td>
                <td>' . $this->input->post('time_1') . '</td>
                <td>' . $this->input->post('address_1') . '</td>
            </tr>';
		}
		if (!empty($this->input->post('checkbox_2'))) {
			$html .= '<tr>
                <td>' . $this->input->post('event_name_2') . '</td>
                <td>' . $this->input->post('date_2') . '</td>
                <td>' . $this->input->post('time_2') . '</td>
                <td>' . $this->input->post('address_2') . '</td>
            </tr>';
		}
		if (!empty($this->input->post('checkbox_3'))) {
			$html .= '<tr>
                <td>' . $this->input->post('event_name_3') . '</td>
                <td>' . $this->input->post('date_3') . '</td>
                <td>' . $this->input->post('time_3') . '</td>
                <td>' . $this->input->post('address_3') . '</td>
            </tr>';
		}
		if (!empty($this->input->post('checkbox_4'))) {
			$html .= '<tr>
                <td>' . $this->input->post('event_name_4') . '</td>
                <td>' . $this->input->post('date_4') . '</td>
                <td>' . $this->input->post('time_4') . '</td>
                <td>' . $this->input->post('address_4') . '</td>
            </tr>';
		}
		if (!empty($this->input->post('checkbox_5'))) {
			$html .= '<tr>
                <td>' . $this->input->post('event_name_5') . '</td>
                <td>' . $this->input->post('date_5') . '</td>
                <td>' . $this->input->post('time_5') . '</td>
                <td>' . $this->input->post('address_5') . '</td>
            </tr>';
		}

		$html .= '
        </table>

        <br />
        <br />
        <table class="pricedetail">
            <tr>
                <td class="font-size-set">Venues</td>
            </tr>
            <tr>
                <td>';
		if (!empty($this->input->post('checkbox_1'))) {
			$html .= '<p><b>' . $this->input->post('address_1') . ':</b> ' . $this->input->post('location_1') . '</p>';
		}
		if (!empty($this->input->post('checkbox_2'))) {
			$html .= '<p><b>' . $this->input->post('address_2') . ':</b> ' . $this->input->post('location_2') . '</p>';
		}
		if (!empty($this->input->post('checkbox_3'))) {
			$html .= '<p><b>' . $this->input->post('address_3') . ':</b> ' . $this->input->post('location_3') . '</p>';
		}
		if (!empty($this->input->post('checkbox_4'))) {
			$html .= '<p><b>' . $this->input->post('address_4') . ':</b> ' . $this->input->post('location_4') . '</p>';
		}
		if (!empty($this->input->post('checkbox_5'))) {
			$html .= '<p><b>' . $this->input->post('address_5') . ':</b> ' . $this->input->post('location_5') . '</p>';
		}

		$html .= '</td>
            </tr>

            <tr>
                <td class="font-size-set">Parking</td>
            </tr>
            <tr>
                <td>Please contact IM Marylebone to make advance arrangements for parking.</td>
            </tr>
            <tr>
                <td class="font-size-set">Key Contacts</td>
            </tr>
            <tr>
                <td>Director - <b>Nonny [Mobile - 07989012474]</b></td>
            </tr>
            <tr>
                <td class="font-size-set">Useful links</td>
            </tr>
            <tr>
                <td>You will have received personalised invitations to our purpose built portal: learn.ieltsmedical.org</td>
            </tr>
            <tr>
                <td>Should you require anything prior to your event date, please do not hesitate to contact us.</td>
            </tr>
            <tr>
                <td>We look forward to meeting you.</td>
            </tr>
            <tr>
                <td><b>Your team @ IELTS Medical.</b></td>
            </tr>
        </table>

            </body>
        </html>';

		$this->dompdf->set_paper("a4", "portrait");
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$output = $this->dompdf->output();
		file_put_contents('public/booking_pdf/' . $pdfname . '', $output);

		$this->db->set('pdf_name', $pdfname);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('centre_course_date_book');

		$this->session->set_flashdata('message_string', "PDF created successfully!");

		redirect('panel/centercoursedates/list_centre_course_dates_booked');

	}

}
