<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Bookingcourse extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}
		$this->load->model('front/front_common_model', '', TRUE);
		$this->load->model('panel/panel_booking_course_model', '', TRUE);

		require_once APPPATH . 'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/booking_course/booking_course_list');
	}

	function booking_course_list() {

		$data['today'] = $this->panel_booking_course_model->getSalesRecord(date('Y-m-d'), '', '1');

		$data['weekly'] = $this->panel_booking_course_model->getSalesRecord(date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week')));

		$data['monthly'] = $this->panel_booking_course_model->getSalesRecord(date('Y-m-01', strtotime('this month')), date('Y-m-t', strtotime('this month')));

		$data['yearly'] = $this->panel_booking_course_model->getSalesRecord(date('Y-01-01', strtotime('this year')), date('Y-m-t', strtotime('this year')));

		$data['total_sales'] = $this->panel_booking_course_model->getSalesRecordTotal();

		$this->load->library('pagination');

		$total = $this->panel_booking_course_model->countBookingCourse();
		$per_page = 100;
		$data['getBookCourse'] = $this->panel_booking_course_model->getBookingCourse($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/booking_course/booking_course_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['course_date'] = $this->db->get('customer')->result();

		$data['courier'] = $this->db->get('courier')->result();

		$data['heder_title'] = 'Booking Course List';
		$this->load->view('panel/booking_course/booking_course_list', $data);
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

		$objPHPExcel->getActiveSheet()->setCellValue('A1', '#');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Daily Sales Total');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Weekly Sales Total');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Monthly Sales Total');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Yearly Sales Total');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Total');

		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($style_header);

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);

		$row = 2;

		$today = $this->panel_booking_course_model->getSalesRecord(date('Y-m-d'), '', '1');

		$weekly = $this->panel_booking_course_model->getSalesRecord(date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week')));

		$monthly = $this->panel_booking_course_model->getSalesRecord(date('Y-m-01', strtotime('this month')), date('Y-m-t', strtotime('this month')));

		$yearly = $this->panel_booking_course_model->getSalesRecord(date('Y-01-01', strtotime('this year')), date('Y-m-t', strtotime('this year')));

		$total_sales = $this->panel_booking_course_model->getSalesRecordTotal();

		$objPHPExcel->getActiveSheet()->setCellValue('A' . $row, 'Courses Sold Total');
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $today->totalCourse);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $weekly->totalCourse);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $monthly->totalCourse);
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $yearly->totalCourse);
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $total_sales->totalCourse);

		$row = 3;
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $row, 'Amount (£)');
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, !empty($today->totalAmount) ? number_format($today->totalAmount, 2) : '');
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $row, !empty($weekly->totalAmount) ? number_format($weekly->totalAmount, 2) : '');
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $row, !empty($monthly->totalAmount) ? number_format($monthly->totalAmount, 2) : '');
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, !empty($yearly->totalAmount) ? number_format($yearly->totalAmount, 2) : '');
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $row, !empty($total_sales->totalAmount) ? number_format($total_sales->totalAmount, 2) : '');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="report.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');

	}

	function delete_booking_course($id) {
		$this->db->where('id', $id);
		$this->db->delete('course_book');

		$this->session->set_flashdata('SUCCESS', 'Booking Course Deleted Successfully');
		redirect('panel/bookingcourse/booking_course_list');
	}

	function view_booking_course($id) {

		$this->db->select('course_book.*,customer.username,course.course_name,course.start_date,course.end_date');
		$this->db->from('course_book');
		$this->db->join('customer', 'customer.id = course_book.customer_id', 'left');
		$this->db->join('course', 'course.id = course_book.course_id', 'left');
		$this->db->where('course_book.id', $id);

		$data['upcomming'] = $this->db->get()->row();

		$data['heder_title'] = 'View Booking Course';
		$this->load->view('panel/booking_course/view_booking_course', $data);
	}

	public function booking_courses_session() {
		if ($this->input->post('id')) {
			echo $this->panel_booking_course_model->fetch_booking_course_session($this->input->post('id'));

		}
	}

	public function add_booking_course() {

		//$course_main = $this->db->where('id', $id);
		$course_main = $this->db->get('course_main')->row();
		if (!empty($course_main)) {

			$course_get = $this->db->get('course_main')->result();
			$course = $this->db->where('start_date >=', date('Y-m-d'));
			//$course = $this->db->where('course_main_id', $row->id);
			//$course = $this->db->where('course_main_id', $id);

			$course = $this->db->order_by('start_date');
			$course = $this->db->get('course')->result();
			$data['course'] = $course;
			$data['course_get'] = $course_get;
			$data['course_main'] = $course_main;

		}

		$customer = $this->db->order_by('username', 'asc');
		$customer = $this->db->get('customer')->result();
		$data['customer'] = $customer;

		$data['heder_title'] = 'Create Course Booking';
		$this->load->view('panel/booking_course/add_booking_course', $data);
	}

	public function course_submit() {

		if (!empty($this->input->post('customer_id'))) {
			$customer = $this->db->where('id', $this->input->post('customer_id'));
			$customer = $this->db->get('customer')->row();
			$first_name = $customer->username;
			$last_name = $customer->lastname;
			$email = $customer->email;
			$phone = $customer->phone;
		} else {
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');

		}
		if ($this->input->post('phone')) {
			$phone = $this->input->post('phone');
		}

		if ($this->input->post('send_invoice')) {
			$payment = '0';
		} else {
			$payment = '0';
		}

		$reference_number = 'PL' . date('Ymdhis');

		$array = array(
			'reference_number' => $reference_number,
			'customer_id' => $this->input->post('customer_id'),
			'course_id' => $this->input->post('course_id'),
			'first_name' => $first_name,
			'last_name' => $last_name,
			'phone' => $phone,
			'email' => $email,
			'upcoming_exam' => !empty($this->input->post('upcoming_exam')) ? $this->input->post('upcoming_exam') : 'No',
			'exam_date' => !empty($this->input->post('exam_date')) ? $this->input->post('exam_date') : '',
			'osce_exam_before' => !empty($this->input->post('osce_exam_before')) ? $this->input->post('osce_exam_before') : 'No',
			'accomodation' => $this->input->post('accomodation'),
			'accomodation_qty' => $this->input->post('accomodation_qty'),
			'total_accomodation' => $this->input->post('total_accomodation'),
			'private_accomodation' => $this->input->post('private_accomodation'),
			'private_accomodation_qty' => $this->input->post('private_accomodation_qty'),
			'total_private_accomodation' => $this->input->post('total_private_accomodation'),
			'meals' => $this->input->post('meals'),
			'meals_qty' => $this->input->post('meals_qty'),
			'total_meals' => $this->input->post('total_meals'),
			'company_code' => $this->input->post('company_code'),
			'final_total' => $this->input->post('final_total'),
			'total_vat' => $this->input->post('total_vat'),
			'price' => $this->input->post('price'),
			'company_price' => $this->input->post('company_price'),
			'company_type' => $this->input->post('company_type'),
			'created_date' => date('Y-m-d H:i:s'),
			'payment' => $payment,
			'is_admin' => '1',
		);

		$this->db->insert('course_book', $array);
		$last_id = $this->db->insert_id();
		if (empty($this->input->post('customer_id'))) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'course_book');
		}

		if ($this->input->post('send_invoice')) {

			$amount = $this->input->post('final_total');
			$source = '6009';
			$slug = $this->front_common_model->MakePayment($last_id, 'course_book', $amount, $source);

			$getcourse = $this->db->where('id', $this->input->post('course_id'));
			$getcourse = $this->db->get('course')->row();

			$course_main = $this->db->where('id', $getcourse->course_main_id);
			$course_main = $this->db->get('course_main')->row();

			$data['link'] = $slug;
			$data['first_name'] = $first_name;
			$data['course_name'] = $getcourse->course_name;
			$data['sub_title_description'] = $course_main->sub_title_description;
			$data['reference_number'] = $reference_number;

			$data['start_date'] = date('d-m-Y', strtotime($getcourse->start_date));
			$data['end_date'] = date('d-m-Y', strtotime($getcourse->end_date));
			$data['time'] = $getcourse->time;

			$htmlMessage = $this->load->view('mail/course_invoice', $data, true);

			$this->front_common_model->sendEmail($email, 'Course Booking Invoice and Payment Link - IELTS Medical', $htmlMessage);
		}
		$this->session->set_flashdata('SUCCESS', 'Booking Course Successfully');
		redirect('panel/bookingcourse/booking_course_list');
	}

	public function add_tracking() {

		$update1 = $this->db->where('id', $this->input->post('order_no'));
		$update1 = $this->db->set('tracking_no', $this->input->post('tracking_no'));
		$update1 = $this->db->set('courier_id', $this->input->post('courier_id'));
		$update1 = $this->db->update('course_book');

		$course_book = $this->db->select('course_book.*,courier.courier_name,courier.courier_website');
		$course_book = $this->db->from('course_book');
		$course_book = $this->db->join('courier', 'courier.id = course_book.courier_id', 'left');
		$course_book = $this->db->where('course_book.id', $this->input->post('order_no'));
		$course_book = $this->db->get()->row();

		$data['course_book'] = $course_book;

		$htmlMessage = $this->load->view('mail/bookingcourse_tracking_courier', $data, true);
		$this->front_common_model->sendEmail($course_book->email, 'Order dispatched', $htmlMessage);

		$this->session->set_flashdata('SUCCESS', "Courier & Tracking Successfully add!");
		redirect('panel/bookingcourse/booking_course_list');
	}

	public function printcourse($id) {
		$this->load->library('dompdf_gen');
		$this->db->select('course_book.*,customer.username,course.course_name,course.start_date,course.end_date,courier.courier_name,courier.courier_website');
		$this->db->from('course_book');
		$this->db->join('courier', 'courier.id = course_book.courier_id', 'left');
		$this->db->join('customer', 'customer.id = course_book.customer_id', 'left');
		$this->db->join('course', 'course.id = course_book.course_id', 'left');
		$this->db->where('course_book.id', $id);
		$printcourse = $this->db->get()->row();

		$start_date = '-';
		if ($printcourse->start_date != '0000-00-00') {
			$start_date = date('d-m-Y', strtotime($printcourse->start_date));
		}

		$end_date = '-';
		if ($printcourse->end_date != '0000-00-00') {
			$end_date = date('d-m-Y', strtotime($printcourse->end_date));
		}

		$html_sting = '';
		$html = '<style>
		table {
			display: table; border-collapse: collapse;
		}
		.pricedetail tr td
		{
			font-family:Verdana;
			padding:8px;

		}
		.pricedetail tr th
		{
			font-family:Verdana;
			padding:8px;
		}
		</style>
		<table border="0" width="100%" class="pricedetail" style="margin-top: 5px;">
		<tr>
			<td valign="top">
			<p><img src="' . base_url() . 'file/img/logo1.png"></p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				Courier : ' . $printcourse->courier_name . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Website : ' . $printcourse->courier_website . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Tracking No : ' . $printcourse->tracking_no . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Course Name : ' . $printcourse->course_name . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				First Name : ' . $printcourse->first_name . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Last Name : ' . $printcourse->last_name . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Phone : ' . $printcourse->phone . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Email : ' . $printcourse->email . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Course Start Date : ' . $start_date . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Course End Date : ' . $end_date . '
			</td>
		</tr>
		</table>';

		$pdfname = "Invoice" . date('YmdHis') . '.pdf';
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$output = $this->dompdf->output();
		$this->dompdf->stream($pdfname);
		// file_put_contents('public/invoice/' . $pdfname . '', $output);
	}

}
