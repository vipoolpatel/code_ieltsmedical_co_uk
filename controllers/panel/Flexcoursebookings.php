<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Flexcoursebookings extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}
		$this->load->model('front/front_common_model', '', TRUE);
		$this->load->model('panel/panel_flex_course_bookings_model', '', TRUE);

		require_once APPPATH . 'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/flex_course_bookings/flex_course_bookings_list');
	}

	function flex_course_bookings_list() {

		$this->load->library('pagination');

		$total = $this->panel_flex_course_bookings_model->countFlexCourse();
		$per_page = 40;
		$data['getFlex'] = $this->panel_flex_course_bookings_model->getFlexCourseBookings($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/flexcoursebookings/flex_course_bookings_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['courier'] = $this->db->get('courier')->result();

		$data['heder_title'] = 'Flex Course Bookings List';
		$this->load->view('panel/flex_course_bookings/flex_course_bookings_list', $data);
	}

	function add_flex_course_bookings() {

		$course_get = $this->db->get('flex_course')->result();
		$data['course_get'] = $course_get;

		$setting = $this->db->where('id', '1');
		$setting = $this->db->get('setting')->row();
		$data['setting'] = $setting;

		$customer = $this->db->order_by('username', 'asc');
		$customer = $this->db->get('customer')->result();
		$data['customer'] = $customer;

		$data['heder_title'] = 'Add Flex Course Bookings';
		$this->load->view('panel/flex_course_bookings/add_flex_course_bookings', $data);
	}
	public function booking_courses_session() {
		if ($this->input->post('id')) {
			echo $this->panel_flex_course_bookings_model->fetch_booking_course_session($this->input->post('id'));

		}
	}

	public function booking_courses_skill() {
		if ($this->input->post('id')) {
			echo $this->panel_flex_course_bookings_model->fetch_booking_course_skill($this->input->post('id'));
		}
	}
	public function flex_course_submit() {

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

		$reference_number = 'PL' . date('Ymdhis');

		$array = array(
			'reference_number' => $reference_number,
			'customer_id' => $this->input->post('customer_id'),
			'flex_course_id' => $this->input->post('flex_course_id'),
			'flex_course_session_id' => $this->input->post('flex_course_session_id'),
			'flex_course_skill_id' => $this->input->post('flex_course_skill_id'),
			'first_name' => $first_name,
			'last_name' => $last_name,
			'phone' => $phone,
			'email' => $email,
			'address_capture' => $this->input->post('address_capture'),
			
			'avail_notify' => !empty($this->input->post('avail_notify')) ? $this->input->post('avail_notify') : 'No',
			'availability_date_time' => !empty($this->input->post('availability_date_time')) ? $this->input->post('availability_date_time') : '',
			'final_total' => !empty($this->input->post('final_total')) ? $this->input->post('final_total') : '',
			'registration_fee' => $this->input->post('registration_fee'),
			'created_date' => date('Y-m-d H:i:s'),
			'is_admin' => '1',

		);

		$this->db->insert('flex_course_booking', $array);
		$last_id = $this->db->insert_id();

		if (empty($this->input->post('customer_id'))) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'flex_course_booking');
		}

		if ($this->input->post('send_invoice')) {

			$printcourse = $this->panel_flex_course_bookings_model->viewFlexBooking($last_id);

			$amount = $this->input->post('final_total');
			$source = '8940';
			$slug = $this->front_common_model->MakePayment($last_id, 'flex_course_booking', $amount, $source);
			$data['record'] = $printcourse;
			$data['link'] = $slug;

			$htmlMessage = $this->load->view('mail/flex_course_invoice', $data, true);

			$this->front_common_model->sendEmail($email, 'Flex Course Booking Invoice and Payment Link - IELTS Medical', $htmlMessage);
		}

		$this->session->set_flashdata('SUCCESS', 'Flex Course Booking Successfully');
		redirect('panel/flexcoursebookings/flex_course_bookings_list');
	}

	function view_flex_course_bookings($id) {

		$data['upcomming'] = $this->panel_flex_course_bookings_model->viewFlexBooking($id);

		$data['heder_title'] = 'View Flex Course Bookings';

		$this->load->view('panel/flex_course_bookings/view_flex_course_bookings', $data);
	}

	function delete_flex_course_bookings($id) {

		$this->db->where('id', $id);
		$this->db->delete('flex_course_booking');

		$this->session->set_flashdata('SUCCESS', 'Flex Course Bookings Deleted Successfully');

		redirect('panel/flexcoursebookings/flex_course_bookings_list');
	}

	public function add_tracking() {

		$update1 = $this->db->where('id', $this->input->post('order_no'));
		$update1 = $this->db->set('tracking_no', $this->input->post('tracking_no'));
		$update1 = $this->db->set('courier_id', $this->input->post('courier_id'));
		$update1 = $this->db->update('flex_course_booking');

		$flex_course_booking = $this->db->select('flex_course_booking.*,courier.courier_name,courier.courier_website');
		$flex_course_booking = $this->db->from('flex_course_booking');
		$flex_course_booking = $this->db->join('courier', 'courier.id = flex_course_booking.courier_id', 'left');
		$flex_course_booking = $this->db->where('flex_course_booking.id', $this->input->post('order_no'));
		$flex_course_booking = $this->db->get()->row();

		$data['flex_course_booking'] = $flex_course_booking;

		$htmlMessage = $this->load->view('mail/flex_course_booking_tracking_courier', $data, true);
		$this->front_common_model->sendEmail($flex_course_booking->email, 'Order dispatched', $htmlMessage);

		$this->session->set_flashdata('SUCCESS', "Courier & Tracking Successfully add!");
		redirect('panel/flexcoursebookings/flex_course_bookings_list');
	}

	public function printcourse($id) {
		$this->load->library('dompdf_gen');

		$printcourse = $this->panel_flex_course_bookings_model->viewFlexBooking($id);

		$html_sting = '';
		$html = '';
		$html .= '<style>
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
                Flex Course  : ' . $printcourse->flexname . '
            </td>
        </tr>
        <tr>
            <td valign="top">
                Flex Session : ' . $printcourse->flex_name . '
            </td>
        </tr>';
		if (!empty($printcourse->skill_name)) {
			$html .= '<tr>
            <td valign="top">
                Flex Skill : ' . $printcourse->skill_name . '
            </td>
        </tr>';
		}

		$html .= ' <tr>
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

        </table>';

		$pdfname = "Invoice" . date('YmdHis') . '.pdf';
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$output = $this->dompdf->output();
		$this->dompdf->stream($pdfname);
		// file_put_contents('public/invoice/' . $pdfname . '', $output);
	}

}