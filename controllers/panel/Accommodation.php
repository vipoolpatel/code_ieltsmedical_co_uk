<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Accommodation extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}
		$this->load->model('front/front_common_model', '', TRUE);
		$this->load->model('panel/panel_booking_accommodation_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/booking_course/booking_course_list');
	}

	function accommodation_list() {

		$this->load->library('pagination');

		$total = $this->panel_booking_accommodation_model->countBookingaccommodation();
		$per_page = 100;
		$data['getBook'] = $this->panel_booking_accommodation_model->getBookingaccommodation($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/accommodation/list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);
		$data['course_date'] = $this->db->get('customer')->result();
		$data['heder_title'] = 'Accommodation Booking List';
		$this->load->view('panel/accommodation/list', $data);
	}

	public function add() {
		$customer = $this->db->order_by('username', 'asc');
		$customer = $this->db->get('customer')->result();
		$data['customer'] = $customer;

		$location = $this->db->order_by('location', 'asc');
		$location = $this->db->where('type', 'OSCE');
		$location = $this->db->get('location')->result();
		$data['location'] = $location;

		$data['heder_title'] = 'Create Accommodation Booking';
		$this->load->view('panel/accommodation/add', $data);
	}

	public function datecal() {
		if (!empty($this->input->post('check_in_date')) && !empty($this->input->post('check_out_date'))) {
			$check_in_date = strtotime($this->input->post('check_in_date'));
			$check_out_date = strtotime($this->input->post('check_out_date'));
			$datediff = $check_out_date - $check_in_date;
			$json['success'] = round($datediff / (60 * 60 * 24));
		} else {
			$json['success'] = '0';
		}
		echo json_encode($json);
	}

	public function submit() {

		if ($this->input->post('send_invoice')) {
			$payment = '0';
		} else {
			$payment = '0';
		}

		if (!empty($this->input->post('customer_id'))) {
			$customer = $this->db->where('id', $this->input->post('customer_id'));
			$customer = $this->db->get('customer')->row();
			$first_name = $customer->username;
			$last_name = $customer->lastname;
			$email = $customer->email;
		} else {
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
		}

		$reference_number = 'PL' . date('Ymdhis');

		$array = array(
			'reference_number' => $reference_number,
			'customer_id' => $this->input->post('customer_id'),
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'location_id' => $this->input->post('location_id'),
			'check_in_date' => date('Y-m-d', strtotime($this->input->post('check_in_date'))),
			'check_out_date' => date('Y-m-d', strtotime($this->input->post('check_out_date'))),
			'number_of_night' => $this->input->post('number_of_night'),
			'price' => $this->input->post('price'),
			'total' => $this->input->post('payabletotal'),
			'payment' => $payment,
			'is_admin' => '1',
			'created_date' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('accommodation_book', $array);
		$last_id = $this->db->insert_id();

		if (empty($this->input->post('customer_id'))) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'accommodation_book');
		}

		if ($this->input->post('send_invoice')) {

			$amount = $this->input->post('payabletotal');
			$source = '9407';
			$slug = $this->front_common_model->MakePayment($last_id, 'accommodation_book', $amount, $source);

			$data['link'] = $slug;
			$data['first_name'] = $first_name;
			$data['reference_number'] = $reference_number;

			$data['check_in_date'] = $this->input->post('check_in_date');
			$data['check_out_date'] = $this->input->post('check_out_date');

			$htmlMessage = $this->load->view('mail/accommodation_invoice', $data, true);

			$this->front_common_model->sendEmailCC($email, 'Accommodation Booking Invoice and Payment Link - IELTS Medical', $htmlMessage, 'success@ieltsmedical.co.uk');
		}
		$this->session->set_flashdata('SUCCESS', 'Booking Accommodation Successfully');
		redirect('panel/accommodation/accommodation_list');
	}

	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('accommodation_book');

		$this->session->set_flashdata('SUCCESS', 'Booking Accommodation Deleted Successfully');
		redirect('panel/accommodation/accommodation_list');
	}

	public function add_tracking($id) {
		$update1 = $this->db->where('id', $this->input->post('order_no'));
		$update1 = $this->db->set('tracking_no', $this->input->post('tracking_no'));
		$update1 = $this->db->update('accommodation_book');

		$this->session->set_flashdata('SUCCESS', "Address Successfully add!");
		redirect('panel/accommodation/accommodation_list');
	}

	function view_accommodation($id) {

		$data['upcomming'] = $this->panel_booking_accommodation_model->viewPrintAccommodation($id);

		$data['heder_title'] = 'View Accommodation';

		$this->load->view('panel/accommodation/view_accommodation', $data);
	}

	public function print_accommodation($id) {
		$this->load->library('dompdf_gen');

		$printcourse = $this->panel_booking_accommodation_model->viewPrintAccommodation($id);
		$room = ($printcourse->price == '44') ? 'Single room: &pound;44' : 'Shared room: &pound;27';
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
                Reference Number : ' . $printcourse->reference_number . '
            </td>
        </tr>

        <tr>
            <td valign="top">
                First Name : ' . $printcourse->first_name . '
            </td>
        </tr>
        <tr>
            <td valign="top">
               Last Name  : ' . $printcourse->last_name . '
            </td>
        </tr>
        <tr>
            <td valign="top">
              Email : ' . $printcourse->email . '
            </td>
        </tr>
          <tr>
            <td valign="top">
               Address : ' . $printcourse->tracking_no . '
            </td>
        </tr>

         <tr>
            <td valign="top">
                Accommodation Near : ' . $printcourse->location . ' ' . $printcourse->venue_name . '
            </td>
        </tr>


        <tr>
            <td valign="top">
                Check in Date : ' . date('d-m-Y', strtotime($printcourse->check_in_date)) . '
            </td>
        </tr>

         <tr>
            <td valign="top">
                Check out Date : ' . date('d-m-Y', strtotime($printcourse->check_out_date)) . '
            </td>
        </tr>

        <tr>
            <td valign="top">
                 Number of nights : ' . $printcourse->number_of_night . '
            </td>
        </tr>
     	<tr>
            <td valign="top">
                Room : ' . $room . '
            </td>
        </tr>



        <tr>
            <td valign="top">
                Total : ' . $printcourse->total . '
            </td>
        </tr>

        </table>';

		$pdfname = "Accommodation" . date('YmdHis') . '.pdf';
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$output = $this->dompdf->output();
		$this->dompdf->stream($pdfname);
		// file_put_contents('public/invoice/' . $pdfname . '', $output);
	}

}
