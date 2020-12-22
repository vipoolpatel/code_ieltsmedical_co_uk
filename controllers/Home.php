<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $customer_id;
	function __construct() {
		parent::__construct();
		$this->load->model('front/front_common_model', '', TRUE);
		$this->customer_id = !empty($this->session->userdata('customer_login_id')) ? $this->session->userdata('customer_login_id') : '';
	}

	public function redirect() {
		redirect(base_url());
	}

	public function index() {
		$getSlug = $this->front_common_model->getSlug('home');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

		//$vid = $this->db->where('id',1);
		$getCalender = $this->db->order_by('id', 'asc');
		$getCalender = $this->db->get('calender')->result();

		$getBlog = $this->db->order_by('id', 'desc');
		$getBlog = $this->db->limit('2');
		$getBlog = $this->db->get('blog')->result();

		$data['getBlog'] = $getBlog;

		$data['getCalender'] = $getCalender;

		$this->load->view('index', $data);
	}

	public function request_free_consultation() {
		if ($this->input->post('current_captcha') == $this->input->post('captcha')) {
			$array = array(
				'customer_id' => $this->customer_id,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('request_free_consultation', $array);
			$last_id = $this->db->insert_id();

			$htmlMessage = '<p>
    	    	Hi Admin
    	    	<br />
    	    	Request Free Consultation Notification</p>';

			$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'Request Free Consultation Notification - IELTS Medical', $htmlMessage);

			if (empty($this->customer_id)) {
				$this->front_common_model->CreateClient($this->input->post('name'), '', $this->input->post('email'), $last_id, 'customer_id', 'request_free_consultation');
			}

			$this->session->set_flashdata('SUCCESS', 'Thank you! Your request successfully sent!');
			redirect(base_url());
		} else {

			$this->session->set_flashdata('ERROR', 'Captcha does not match.');
			redirect(base_url());

		}
	}

	public function email_subscribe() {

		$count = $this->db->where('email', $this->input->post('email'));
		$count = $this->db->get('email_subscribe')->num_rows();
		if ($count == '0') {
			$array = array(
				'email' => $this->input->post('email'),
				'created_date' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('email_subscribe', $array);
		}
		$this->session->set_flashdata('SUCCESS', 'Thank you! Your email successfully subscribe!');
		redirect(base_url());
	}

	public function contact_us() {
		if ($this->input->post('current_captcha') == $this->input->post('captcha')) {
			$array = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'message' => $this->input->post('message'),
				'created_date' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('contact_us', $array);
			$this->session->set_flashdata('SUCCESS', 'Thank you! Your message successfully sent!');

		} else {
			$this->session->set_flashdata('ERROR', 'Captcha does not match.');
		}
		redirect(base_url('contact-form'));
	}

	// start centre_course_success

	public function centre_course_date_book() {
		$array = array(
			'customer_id' => $this->customer_id,
			'centre_course_id' => $this->input->post('id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'final_total' => $this->input->post('final_total'),
			'company_code' => $this->input->post('company_code'),
			'company_price' => $this->input->post('company_price'),
			'company_type' => $this->input->post('company_type'),
			'exam_before' => !empty($this->input->post('exam_before')) ? $this->input->post('exam_before') : 'No',
			'exam_type_id' => !empty($this->input->post('exam_type_id')) ? $this->input->post('exam_type_id') : '',
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
		);

		$this->db->insert('centre_course_date_book', $array);
		$last_id = $this->db->insert_id();

		if (empty($this->customer_id)) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'centre_course_date_book');
		}

		$amount = $this->input->post('final_total');

		$source = '7196';
		$slug = $this->front_common_model->MakePayment($last_id, 'centre_course_date_book', $amount, $source);
		header('Location: ' . $slug);
	}

	public function centre_course_success() {
		if ($this->input->get('t') && $this->input->get('s')) {
			$getrecord = $this->db->select('centre_course_date_book.*,centre_course_dates.course,centre_course_dates.start_date,centre_course_dates.end_date');
			$getrecord = $this->db->from('centre_course_date_book');
			$getrecord = $this->db->join('centre_course_dates', 'centre_course_dates.id = centre_course_date_book.centre_course_id');
			$getrecord = $this->db->where('centre_course_date_book.order_id', $this->input->get('s'));
			$getrecord = $this->db->get()->row();

			if ($getrecord) {

				$this->db->set('payment', '1');
				$this->db->where('order_id', $this->input->get('s'));
				$this->db->update('centre_course_date_book');

				$data['getrecord'] = $getrecord;

				$htmlMessagecustomer = $this->load->view('invoice/centre_course_success', $data, true);

				$this->front_common_model->sendEmail($getrecord->email, 'We thought you should know - IELTS Medical', $htmlMessagecustomer);

				$htmlMessage = '<p>
				   	Hi Admin
				   	<br />
				   	Payment received from : ' . $getrecord->first_name . '
				<br />
				What they have paid for:  ' . $getrecord->course . '
				<br />
				<a href="' . base_url() . 'panel/centercoursedates/list_centre_course_dates_booked">Login Link</a>
					    	</p>';

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'Course and Exam Dates Booking Notification - IELTS Medical', $htmlMessage);

				$this->session->set_flashdata('SUCCESS', "Thank you - that's all done!");
				redirect('centre-course-dates');
			} else {
				$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
				redirect('centre-course-dates');
			}
		} else {
			$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
			redirect('centre-course-dates');
		}
	}

	public function centre_course_error() {
		$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
		redirect('centre-course-dates');
	}

	// end centre_course_success

	// start live_courses

	public function live_courses() {
		if (!empty($_POST)) {
			$registration_fee = 0;
			$setting = $this->db->where('id', '1');
			$setting = $this->db->get('setting')->row();
			if (!empty($setting->live_courses_on_off)) {
				$registration_fee = $setting->live_courses_price;
			}

			$getPrice = $this->db->where('id', $this->input->post('flex_name'));
			$getPrice = $this->db->get('live_course_exam_session')->row();

			$total = $getPrice->price + $registration_fee;

			$array = array(
				'customer_id' => $this->customer_id,
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'name' => $this->input->post('name'),
				'avail_notify' => $this->input->post('avail_notify'),
				'flex_name' => $this->input->post('flex_name'),
				'availability_date_time' => !empty($this->input->post('availability_date_time')) ? $this->input->post('availability_date_time') : '',
				'final_total' => $getPrice->price,
				'registration_fee' => $registration_fee,
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('live_courses', $array);
			$last_id = $this->db->insert_id();

			if (empty($this->customer_id)) {
				$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'live_courses');
			}

			$source = '8362';
			$slug = $this->front_common_model->MakePayment($last_id, 'live_courses', $total, $source);
			header('Location: ' . $slug);

		}

		$this->load->view('front/live_courses/live_courses');
	}

	public function live_course_success() {
		if ($this->input->get('t') && $this->input->get('s')) {
			$getrecord = $this->db->select('live_courses.*,live_course_exam.name');
			$getrecord = $this->db->from('live_courses');
			$getrecord = $this->db->join('live_course_exam', 'live_course_exam.id = live_courses.flex_name');
			$getrecord = $this->db->where('live_courses.order_id', $this->input->get('s'));
			$getrecord = $this->db->get()->row();

			if ($getrecord) {
				$this->db->set('payment', '1');
				$this->db->where('order_id', $this->input->get('s'));
				$this->db->update('live_courses');

				$data['getrecord'] = $getrecord;
				$data['final_total'] = $getrecord->final_total + $getrecord->registration_fee;

				$htmlMessagecustomer = $this->load->view('invoice/live_course_success', $data, true);

				$this->front_common_model->sendEmail($getrecord->email, 'We thought you should know - IELTS Medical', $htmlMessagecustomer);

				$htmlMessage = '<p>
				   	Hi Admin
				   	<br />
				   	Payment received from : ' . $getrecord->first_name . '
				<br />
				What they have paid for:  ' . $getrecord->name . '
				<br />
				<a href="' . base_url() . 'panel/livecourse/live_course_booking_list">Login Link</a>
					    	</p>';

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'Live Course Booking Notification - IELTS Medical', $htmlMessage);

				$this->session->set_flashdata('SUCCESS', 'Thank you! Your Live Course Booking Successfully');
				redirect('services-category/online-live-courses');
			} else {
				$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
				redirect('services-category/online-live-courses');
			}
		} else {
			$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
			redirect('services-category/online-live-courses');
		}
	}

	public function live_course_error() {
		$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
		redirect('services-category/live-courses');
	}

	public function live_courses_session() {
		if ($this->input->post('id')) {
			echo $this->front_common_model->fetch_live_course_exam_session($this->input->post('id'));
		}
	}

	//end  live_courses

	public function book_license_key() {
		$reference_number = 'PL' . date('Ymdhis');
		$international_delivery = '';

		$getitem = $this->db->select('book.*');
		$getitem = $this->db->from('book');
		$getitem = $this->db->where("book.id", $this->input->post('license_key_id'));
		$getitem = $this->db->get()->row();

		$total = $getitem->price;
		if ($this->input->post('country') != 'United Kingdom') {
			$international_delivery = '9.95';
			$total = $total + 9.95;
		}

		$array = array(
			'reference_number' => $reference_number,
			'customer_id' => $this->customer_id,
			'license_key_id' => $this->input->post('license_key_id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'country' => $this->input->post('country'),
			'message' => $this->input->post('message'),
			'zip_code' => $this->input->post('zip_code'),
			'phone' => $this->input->post('phone'),
			'total' => $getitem->price,
			'international_delivery' => $international_delivery,
			'created_date' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('book_license_order', $array);
		$last_id = $this->db->insert_id();

		if (empty($this->customer_id)) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'book_license_order');
		}

		$source = '6629';
		$slug = $this->front_common_model->MakePayment($last_id, 'book_license_order', $total, $source);
		header('Location: ' . $slug);

	}

	public function license_key_success() {
		if ($this->input->get('t') && $this->input->get('s')) {
			$getrecord = $this->db->select('*');
			$getrecord = $this->db->from('book_license_order');
			$getrecord = $this->db->where('order_id', $this->input->get('s'));
			$getrecord = $this->db->get()->row();

			if ($getrecord) {
				$getlicense = $this->db->select('book_licence_key.*');
				$getlicense = $this->db->from('book_licence_key');
				$getlicense = $this->db->where('status', '0');
				$getlicense = $this->db->where("book_id", $getrecord->license_key_id);
				$getlicense = $this->db->get()->row();

				$licence_key_name = !empty($getlicense->licence_key_name) ? $getlicense->licence_key_name : '';

				$this->db->set('payment', '1');
				$this->db->set('is_admin', '1');
				$this->db->set('license_key_name', $licence_key_name);
				$this->db->where('order_id', $this->input->get('s'));
				$this->db->update('book_license_order');

				$getitem = $this->db->select('book.*');
				$getitem = $this->db->from('book');
				$getitem = $this->db->where("book.id", $getrecord->license_key_id);
				$getitem = $this->db->get()->row();

				$update = $this->db->set('status', '1');
				$update = $this->db->where("id", $getlicense->id);
				$update = $this->db->update('book_licence_key');

				$htmlMessage = '<p>
    	    	Hi Admin
    	    	<br />
    	    	New Order IELTS Medical Licence Key Notification
				<br />
				Licence Key orders from ieltsmedical.co.uk
				<br />
				<a href="' . base_url() . 'panel/book/license_key_order">link</a>
    	    	</p>';

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'New Order IELTS Medical Licence Key Notification', $htmlMessage);
				$data['firstname'] = $getrecord->first_name;
				$data['license_key'] = $licence_key_name;

				$htmlMessagecustomer = $this->load->view('mail/license_key_success', $data, true);

				$this->front_common_model->sendEmail($getrecord->email, 'New Licence Key Order IELTS Medical', $htmlMessagecustomer);

				$this->session->set_flashdata('SUCCESS', "Thank you - that's all done!");

				redirect(base_url());
			} else {
				$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
			redirect(base_url());
		}
	}

	public function license_key_error() {
		$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
		redirect(base_url());
	}

	// book work

	public function addtocart() {
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => 'book',
			'price' => $this->input->post('price'),
			'image' => 'images',
			'qty' => '1',
		);
		$this->cart->insert($insert_data);
		redirect('cart');
	}

	public function removecart($rowid) {
		$data = array(
			'rowid' => $rowid,
			'qty' => 0,
		);
		$this->cart->update($data);
		redirect('cart');
	}

	function update_cart() {
		$cart_info = $_POST['cart'];
		foreach ($cart_info as $id => $cart) {
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];

			$data = array(
				'rowid' => $rowid,
				'price' => $price,
				'amount' => $amount,
				'qty' => $qty,
			);

			$this->cart->update($data);
		}
		redirect('cart');
	}

	public function checkout() {
		$reference_number = 'PL' . date('Ymdhis');
		$international_delivery = '';
		$total = $this->cart->total();
		if ($this->input->post('country') != 'United Kingdom') {
			$international_delivery = '14.95';
			$total = $total + 14.95;
		}

		$array = array(
			'reference_number' => $reference_number,
			'customer_id' => $this->customer_id,
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'country' => $this->input->post('country'),
			'message' => $this->input->post('message'),
			'zip_code' => $this->input->post('zip_code'),
			'phone' => $this->input->post('phone'),
			'total' => $this->cart->total(),
			'international_delivery' => $international_delivery,
			'created_date' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('book_order', $array);
		$last_id = $this->db->insert_id();

		if (empty($this->customer_id)) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'book_order');
		}

		foreach ($this->cart->contents() as $item) {
			$array_item = array(
				'order_id' => $last_id,
				'book_id' => $item['id'],
				'price' => $item['price'],
				'qty' => $item['qty'],
				'subtotal' => $item['subtotal'],
				'created_date' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('book_order_item', $array_item);
		}

		$source = '3972';
		$slug = $this->front_common_model->MakePayment($last_id, 'book_order', $total, $source);
		header('Location: ' . $slug);

	}

	public function book_success() {
		if ($this->input->get('t') && $this->input->get('s')) {
			$getrecord = $this->db->select('*');
			$getrecord = $this->db->from('book_order');
			$getrecord = $this->db->where('order_id', $this->input->get('s'));
			$getrecord = $this->db->get()->row();

			if ($getrecord) {
				$this->db->set('payment', '1');
				$this->db->set('is_admin', '1');
				$this->db->set('status', '1');
				$this->db->where('order_id', $this->input->get('s'));
				$this->db->update('book_order');

				$getitem = $this->db->select('book_order_item.*,book.name');
				$getitem = $this->db->from('book_order_item');
				$getitem = $this->db->join('book', 'book.id = book_order_item.book_id');
				$getitem = $this->db->where("book_order_item.order_id", $getrecord->id);
				$getitem = $this->db->order_by("book_order_item.id", "asc");
				$getitem = $this->db->get()->result();
				$data['getitem'] = $getitem;
				$data['firstname'] = $getrecord->first_name;

				$htmlMessage = $this->load->view('mail/book_success_admin', $data, true);

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'New Order IELTS Medical Book Notification', $htmlMessage);

				$htmlMessagecustomer = $this->load->view('mail/book_success_customer', $data, true);

				$this->front_common_model->sendEmail($getrecord->email, 'New Order IELTS Medical', $htmlMessagecustomer);

				$this->session->set_flashdata('SUCCESS', "Thank you - that's all done!");
				$this->cart->destroy();
				redirect('cart');
			} else {
				$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
				redirect('cart');
			}
		} else {
			$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
			redirect('cart');
		}
	}

	public function book_error() {
		$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
		redirect('cart');
	}

	public function course_submit() {

		$reference_number = 'PL' . date('Ymdhis');

		$array = array(
			'reference_number' => $reference_number,
			'customer_id' => $this->customer_id,
			'course_id' => $this->input->post('course_id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
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
		);

		$this->db->insert('course_book', $array);
		$last_id = $this->db->insert_id();

		if (empty($this->customer_id)) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'course_book');
		}

		$amount = $this->input->post('final_total');

		$source = '6009';
		$slug = $this->front_common_model->MakePayment($last_id, 'course_book', $amount, $source);
		header('Location: ' . $slug);

	}

	public function course_flex_submit() {

		$registration_fee = 0;
		$setting = $this->db->where('id', '1');
		$setting = $this->db->get('setting')->row();
		if (!empty($setting->flex_courses_on_off)) {
			$registration_fee = $setting->flex_courses_price;
		}

		$getPrice = $this->db->where('id', $this->input->post('flex_course_session_id'));
		$getPrice = $this->db->get('flex_course_session')->row();

		$total = $getPrice->price + $registration_fee;

		$reference_number = 'PL' . date('Ymdhis');
		$array = array(
			'reference_number' => $reference_number,
			'customer_id' => $this->customer_id,
			'flex_course_id' => $this->input->post('flex_course_id'),
			'flex_course_session_id' => $this->input->post('flex_course_session_id'),
			'flex_course_skill_id' => !empty($this->input->post('flex_course_skill_id')) ? $this->input->post('flex_course_skill_id') : '',
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'address_capture' => $this->input->post('address_capture'),
			'avail_notify' => !empty($this->input->post('avail_notify')) ? $this->input->post('avail_notify') : 'No',
			'availability_date_time' => !empty($this->input->post('availability_date_time')) ? $this->input->post('availability_date_time') : '',

			'final_total' => $total,
			'registration_fee' => $registration_fee,
			'created_date' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('flex_course_booking', $array);
		$last_id = $this->db->insert_id();

		if (empty($this->customer_id)) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'flex_course_booking');
		}

		$amount = $total;

		$source = '8940';
		$slug = $this->front_common_model->MakePayment($last_id, 'flex_course_booking', $amount, $source);
		header('Location: ' . $slug);

	}

	public function flex_course_success() {
		if ($this->input->get('t') && $this->input->get('s')) {
			$getrecord = $this->db->select('flex_course_booking.*,flex_course.name');
			$getrecord = $this->db->from('flex_course_booking');
			$getrecord = $this->db->join('flex_course', 'flex_course.id = flex_course_booking.flex_course_id');
			$getrecord = $this->db->where('flex_course_booking.order_id', $this->input->get('s'));
			$getrecord = $this->db->get()->row();

			if ($getrecord) {
				$this->db->set('payment', '1');
				$this->db->set('is_admin', '1');
				$this->db->where('order_id', $this->input->get('s'));
				$this->db->update('flex_course_booking');

				$data['getrecord'] = $getrecord;

				$htmlMessagecustomer = $this->load->view('invoice/flex_course_success', $data, true);

				$this->front_common_model->sendEmail($getrecord->email, 'We thought you should know - IELTS Medical', $htmlMessagecustomer);

				$htmlMessage = '<p>
						 	Hi Admin
				   	<br />
				   	Payment received from : ' . $getrecord->first_name . '
				<br />
				What they have paid for: ' . $getrecord->name . '
				<br />
				<a href="' . base_url() . 'panel/flexcoursebookings/flex_course_bookings_list">Login Link</a>
					    	</p>';

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'New Flex Course Booking Notification - IELTS Medical', $htmlMessage);

				$this->session->set_flashdata('SUCCESS', "Thank you - that's all done!");
				redirect(base_url());
			} else {
				$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
			redirect(base_url());
		}
	}

	public function flex_course_error() {
		$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
		redirect(base_url());
	}

	public function course_success() {
		if ($this->input->get('t') && $this->input->get('s')) {
			$getrecord = $this->db->select('course_book.*,course.course_name,course.start_date,course.end_date');
			$getrecord = $this->db->from('course_book');
			$getrecord = $this->db->join('course', 'course.id = course_book.course_id');
			$getrecord = $this->db->where('course_book.order_id', $this->input->get('s'));
			$getrecord = $this->db->get()->row();

			if ($getrecord) {
				$this->db->set('payment', '1');
				$this->db->set('is_admin', '1');
				$this->db->where('order_id', $this->input->get('s'));
				$this->db->update('course_book');
				$data['getrecord'] = $getrecord;

				$htmlMessagecustomer = $this->load->view('invoice/course_success', $data, true);

				$this->front_common_model->sendEmail($getrecord->email, 'We thought you should know - IELTS Medical', $htmlMessagecustomer);

				$htmlMessage = '<p>
						 	Hi Admin
				   	<br />
				   	Payment received from : ' . $getrecord->first_name . '
				<br />
				What they have paid for: ' . $getrecord->course_name . '
				<br />
				<a href="' . base_url() . 'panel/bookingcourse/booking_course_list">Login Link</a>
					    	</p>';

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'New Course Booking Notification - IELTS Medical', $htmlMessage);

				$this->session->set_flashdata('SUCCESS', "Thank you - that's all done!");
				redirect(base_url());
			} else {
				$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
			redirect(base_url());
		}
	}

	public function course_error() {
		$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
		redirect(base_url());
	}

	public function getDiscount() {
		$this->db->where('company_code', strtoupper($this->input->post('discount')));
		$company_code = $this->db->get('company_code')->row();
		if (!empty($company_code)) {
			$json['company_price'] = $company_code->company_price;
			$json['company_type'] = $company_code->type;
		} else {
			$json['company_price'] = '';
			$json['company_type'] = '';

		}
		echo json_encode($json);
	}

	public function document() {

		if (!empty($_POST)) {
			if ($this->input->post('current_captcha') == $this->input->post('captcha')) {

				if (!empty($_FILES["photo_image"]["name"])) {
					$photo_image = $_FILES["photo_image"]["name"];
					$array_name = explode(".", $photo_image);
					$ext = end($array_name);

					$photo_image = date('ymdhis') . '.' . $ext;
					$folder = "img/document/";
					move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
				} else {
					$photo_image = '';
				}

				$array = array(
					'customer_id' => $this->customer_id,
					'photo_image' => $photo_image,
					'document' => $this->input->post('document'),
					'message' => $this->input->post('message'),
					'email' => $this->input->post('email'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'phone' => $this->input->post('phone'),
					'created_date' => date('Y-m-d H:i:s'),
				);

				$this->db->insert('document', $array);
				$last_id = $this->db->insert_id();

				$htmlMessage = '<p>
    	    	Hi Admin
    	    	<br />
    	    	New Document Notification</p>';

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'New Document Notification - IELTS Medical', $htmlMessage);

				if (empty($this->customer_id)) {
					$this->front_common_model->CreateClient($this->input->post('firstname'), $this->input->post('lastname'), $this->input->post('email'), $last_id, 'customer_id', 'document');
				}

				$this->session->set_flashdata('SUCCESS', 'Document Created Successfully');
				redirect(base_url());
			} else {
				$this->session->set_flashdata('ERROR', 'Captcha does not match.');
				redirect(base_url());
			}

		}

	}

	public function submit_calendar() {

		if (!empty($_POST)) {
			if ($this->input->post('current_captcha') == $this->input->post('captcha')) {
				$array = array(
					'customer_id' => $this->customer_id,
					'calendar_id' => $this->input->post('calendar_id'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'phone_number' => $this->input->post('phone_number'),
					'book_date' => $this->input->post('book_date'),
					'book_time' => $this->input->post('book_time'),
					'address' => $this->input->post('address'),
					'notes' => $this->input->post('notes'),
					'created_at' => date('Y-m-d H:i:s'),
				);

				$this->db->insert('calendar_booking', $array);

				$last_id = $this->db->insert_id();

				if (empty($this->customer_id)) {
					$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'calendar_booking');
				}

				$htmlMessage = '<p>
    	    	Hi Admin
    	    	<br />
    	    	Popup Booking Notification</p>';

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'New Popup Booking - IELTS Medical', $htmlMessage);

				$this->session->set_flashdata('SUCCESS', "Thank you - that's all done!");
				redirect(base_url());
			} else {
				$this->session->set_flashdata('ERROR', 'Captcha does not match.');
				redirect(base_url());
			}

		}

	}

	public function getDiscountCompany() {
		$this->db->where('company_code', strtoupper($this->input->post('discount')));
		$company_code = $this->db->get('company_code')->row();
		if (!empty($company_code)) {
			$json['company_price'] = $company_code->company_price;
			$json['company_type'] = $company_code->type;
		} else {
			$json['company_price'] = '';
			$json['company_type'] = '';

		}
		echo json_encode($json);
	}

	public function accommodation_success() {
		if ($this->input->get('t') && $this->input->get('s')) {
			$getrecord = $this->db->select('*');
			$getrecord = $this->db->from('accommodation_book');
			$getrecord = $this->db->where('order_id', $this->input->get('s'));
			$getrecord = $this->db->get()->row();

			if ($getrecord) {
				$this->db->set('payment', '1');
				$this->db->where('order_id', $this->input->get('s'));
				$this->db->update('accommodation_book');

				$data['getrecord'] = $getrecord;

				$htmlMessagecustomer = $this->load->view('invoice/accommodation_success', $data, true);

				$this->front_common_model->sendEmailCC($getrecord->email, 'We thought you should know - IELTS Medical', $htmlMessagecustomer, 'success@ieltsmedical.co.uk');

				$check_in_date = date('d-m-Y', strtotime($getrecord->check_in_date));
				$check_out_date = date('d-m-Y', strtotime($getrecord->check_out_date));

				$htmlMessage = '<p>
				   	Hi Admin
				   	<br />
				   	We thought you should know:
				   	<br />
				   	Payment received from : ' . $getrecord->first_name . '
				<br />
				Your Accommodation booking is: ' . $check_in_date . ' to ' . $check_out_date . '
				<br />
				<a href="' . base_url() . 'panel/accommodation/accommodation_list">link</a>
					    	</p>';

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'Accommodation Booking Notification - IELTS Medical', $htmlMessage);

				$this->session->set_flashdata('SUCCESS', "Thank you - that's all done!");
				redirect(base_url());
			} else {
				$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
			redirect(base_url());
		}
	}

	public function accommodation_error() {
		$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
		redirect(base_url());
	}

	public function exam_booking_success() {
		if ($this->input->get('t') && $this->input->get('s')) {
			$getrecord = $this->db->select('*');
			$getrecord = $this->db->from('exam_book');
			$getrecord = $this->db->where('order_id', $this->input->get('s'));
			$getrecord = $this->db->get()->row();

			if ($getrecord) {
				$this->db->set('payment', '1');
				$this->db->where('order_id', $this->input->get('s'));
				$this->db->update('exam_book');

				$data['getrecord'] = $getrecord;

				$htmlMessagecustomer = $this->load->view('invoice/exam_booking_success', $data, true);

				$this->front_common_model->sendEmail($getrecord->email, 'We thought you should know - IELTS Medical', $htmlMessagecustomer);

				$htmlMessage = '<p>
			    	Hi Admin
			    	<br />
			    	Payment received from : ' . $getrecord->first_name . '
				<br />
				What they have paid for: ' . $getrecord->exam_type . '
				<br />
				<a href="' . base_url() . 'panel/exam/exam_list">link</a>
					    	</p>';

				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'Exam Booking Notification - IELTS Medical', $htmlMessage);

				$this->session->set_flashdata('SUCCESS', "Thank you - that's all done!");
				redirect(base_url());
			} else {
				$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
			redirect(base_url());
		}
	}

	public function exam_booking_error() {
		$this->session->set_flashdata('ERROR', "There has been an error. Your card has not been charged. Please try again or contact success@ieltsmedical.co.uk or phone 02036376722.");
		redirect(base_url());
	}

}

?>
