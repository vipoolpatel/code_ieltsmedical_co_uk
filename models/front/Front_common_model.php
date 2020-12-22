<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Front_common_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function getCustomerData($id) {
		$this->db->where('id', $id);
		$this->db->from('customer');
		$query = $this->db->get();
		return $query->row();
	}

	function getSlug($slug) {
		$this->db->where('slug', $slug);
		$this->db->from('page');
		$query = $this->db->get();
		return $query->row();
	}

	function MakePayment($last_id, $table_name, $fee, $Source) {
		//$request = 'https://demo.vivapayments.com/api/orders'; // demo environment URL
		$request = 'https://www.vivapayments.com/api/orders'; // production environment URL

		$MerchantId = 'c47c3ac6-6142-4082-a84d-f040b6e3c967';
		$APIKey = 'Y_bB)y';

		//$MerchantId = '3062440e-8bf7-4445-a4f8-7f1d0ce41409';
		//$APIKey = 'pass123';

		$Amount = $fee * 100;
		$AllowRecurring = 'false';
		$postargs = 'Amount=' . urlencode($Amount) . '&AllowRecurring=' . $AllowRecurring . '&SourceCode=' . $Source . '&PaymentTimeOut=86400';
		$session = curl_init($request);

		curl_setopt($session, CURLOPT_POST, true);
		curl_setopt($session, CURLOPT_POSTFIELDS, $postargs);
		curl_setopt($session, CURLOPT_HEADER, true);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($session, CURLOPT_USERPWD, $MerchantId . ':' . $APIKey);
		curl_setopt($session, CURLOPT_SSL_CIPHER_LIST, 'TLSv1');

		$response = curl_exec($session);

		$header_len = curl_getinfo($session, CURLINFO_HEADER_SIZE);
		$resHeader = substr($response, 0, $header_len);
		$resBody = substr($response, $header_len);
		curl_close($session);
		try {
			if (is_object(json_decode($resBody))) {
				$resultObj = json_decode($resBody);
			} else {
				preg_match('#^HTTP/1.(?:0|1) [\d]{3} (.*)$#m', $resHeader, $match);
				throw new Exception("API Call failed! The error was: " . trim($match[1]));
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		if ($resultObj->ErrorCode == 0) {
			$orderId = $resultObj->OrderCode;

			$array_payment = array(
				'order_id' => $orderId,
			);

			$this->db->where('id', $last_id);
			$this->db->update($table_name, $array_payment);

			return 'https://www.vivapayments.com/web/newtransaction.aspx?ref=' . $orderId;
			//header('Location: http://demo.vivapayments.com/web/newtransaction.aspx?ref=' . $orderId);
		} else {
			echo 'The following error occured: ' . $resultObj->ErrorText;
		}
	}

	function countBlog() {
		$this->db->where('user_status', '1');
		$this->db->from('blog');
		return $this->db->count_all_results();
		// Search Box End
	}
	function getBlog($limit = NULL, $offset = NULL) {
		$this->db->select('*');
		$this->db->from('blog');
		$this->db->where('user_status', '1');
		$this->db->limit($limit, $offset);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_center_course_dates($customer_id) {
		$this->db->select('	centre_course_date_book.*,customer.username,centre_course_dates.course,location.location');
		$this->db->from('centre_course_date_book');

		$this->db->join('customer', 'customer.id = centre_course_date_book.customer_id');
		$this->db->join('centre_course_dates', 'centre_course_dates.id = centre_course_date_book.centre_course_id');
		$this->db->join('location', 'location.id = centre_course_date_book.location_id', 'left');
		$this->db->where('centre_course_date_book.customer_id', $customer_id);
		$this->db->where('centre_course_date_book.payment', '1');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_Center_course_dates_view($id, $customer_id) {
		$this->db->select('centre_course_date_book.*,customer.username,centre_course_dates.course,location.location');
		$this->db->from('centre_course_date_book');

		$this->db->join('customer', 'customer.id = centre_course_date_book.customer_id');
		$this->db->join('centre_course_dates', 'centre_course_dates.id = centre_course_date_book.centre_course_id');
		$this->db->join('location', 'location.id = centre_course_date_book.location_id', 'left');
		$this->db->where('centre_course_date_book.id', $id);
		$this->db->where('centre_course_date_book.customer_id', $customer_id);
		$query = $this->db->get();
		return $query->row();
	}

	function get_book_order($customer_id) {
		$this->db->select('book_order.*,customer.username');
		$this->db->from('book_order');
		$this->db->join('customer', 'customer.id = book_order.customer_id');
		$this->db->where('book_order.customer_id', $customer_id);
		$this->db->where('book_order.payment', '1');
		$this->db->order_by('book_order.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function fetch_live_course_exam() {

		$query = $this->db->get('live_course_exam');
		return $query->result();
	}

	function fetch_live_course_exam_session($id) {
		$this->db->where('live_course_exam_id', $id);

		$query = $this->db->get('live_course_exam_session');
		$output = '<option data-val="0" value="">Select Package</option>';

		foreach ($query->result() as $row) {
			$output .= '<option data-val="' . $row->price . '" value="' . $row->id . '">' . $row->flex_name . ' - &pound;' . $row->price . '</option>';
		}
		return $output;
	}

	public function CreateClient($first_name, $last_name, $email, $last_id, $column_name, $table) {
		$checkcustomer = $this->db->where('email', $email);
		$checkcustomer = $this->db->get('customer')->row();
		if (!empty($checkcustomer->id)) {
			$update = $this->db->set($column_name, $checkcustomer->id);
			$update = $this->db->where('id', $last_id);
			$update = $this->db->update($table);
		} else {
			$password = date('His');
			$createClient = array(
				'username' => $first_name,
				'lastname' => $last_name,
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('customer', $createClient);
			$customer_id = $this->db->insert_id();

			$data['username'] = $first_name;
			$data['lastname'] = $last_name;
			$data['email'] = $email;
			$data['password'] = $password;

			$htmlMessagecustomer = $this->load->view('mail/customer_create', $data, true);

			$this->sendEmail($email, 'New Account @ IELTS Medical', $htmlMessagecustomer);

			$update = $this->db->set($column_name, $customer_id);
			$update = $this->db->where('id', $last_id);
			$update = $this->db->update($table);
		}

		$this->SubscribeMailchimp($email);
	}

	public function SubscribeMailchimp($email) {
		// MailChimp API credentials

		// 72bc1961db8eee448fe1e075e508da61-us12

		// $apiKey = '0f9fff0b2f7aedc68c0c5bf6301dcc57-us20';
		// $listID = '6220b07163';

		$apiKey = '72bc1961db8eee448fe1e075e508da61-us12';
		$listID = '4eb4c360ac';

		// MailChimp API URL
		$memberID = md5(strtolower($email));
		$dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
		$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;

		// member information
		$json = json_encode([
			'email_address' => $email,
			'status' => 'subscribed',
			'merge_fields' => [
				'FNAME' => '',
				'LNAME' => '',
			],
		]);

		// send a HTTP POST request with curl
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
	}

	public function sendEmail($to, $subject, $htmlMessage) {
		$this->load->library('email');
		$this->load->helper('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('hello@ieltsmedical.co.uk', 'IELTS Medical');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($htmlMessage);
		@$this->email->send();
	}

	public function sendEmailCC($to, $subject, $htmlMessage, $cc = '') {
		$this->load->library('email');
		$this->load->helper('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('hello@ieltsmedical.co.uk', 'IELTS Medical');
		$this->email->to($to);
		if (!empty($cc)) {
			$this->email->cc($cc);
		}
		$this->email->subject($subject);
		$this->email->message($htmlMessage);
		@$this->email->send();
	}

	public function sendEmailAttachment($to, $subject, $htmlMessage, $pdf_name = '') {
		$this->load->library('email');
		$this->load->helper('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('hello@ieltsmedical.co.uk', 'IELTS Medical');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($htmlMessage);
		if (!empty($pdf_name)) {
			$this->email->attach($pdf_name);
		}
		@$this->email->send();
	}

	function get_course_order($id, $customer_id) {
		$this->db->select('course_book.*,customer.username');
		$this->db->from('course_book');
		$this->db->join('customer', 'customer.id = course_book.customer_id');
		$this->db->where('course_book.id', $id);
		$this->db->where('course_book.customer_id', $customer_id);
		$query = $this->db->get();
		return $query->row();
	}

	function get_course_view($id, $customer_id) {

		$this->db->select('course_book.*,customer.username,course.course_name,courier.courier_name,courier.courier_website');
		$this->db->from('course_book');
		$this->db->join('customer', 'customer.id = course_book.customer_id', 'left');
		$this->db->join('courier', 'courier.id = course_book.courier_id', 'left');
		$this->db->join('course', 'course.id = course_book.course_id', 'left');
		$this->db->where('course_book.id', $id);
		// $this->db->where('course_book.customer_id', $customer_id);
		$query = $this->db->get();
		return $query->row();

	}

}
