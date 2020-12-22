<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Client extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_client_model', '', TRUE);
		$this->load->model('front/front_common_model', '', TRUE);
		require_once APPPATH . 'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/page/client_list');
	}

	function send_email() {
		if (!empty($_POST)) {

			$email_template = $this->db->where('id', $this->input->post('id'));
			$email_template = $this->db->get('email_template')->row();

			$client = $this->db->where('tags_status', $this->input->post('tags_status'));
			$client = $this->db->get('customer')->result();
			$htmlMessage = $email_template->html;

			foreach ($client as $value) {
				$this->front_common_model->sendEmail($value->email, $email_template->subject, $htmlMessage);
			}

			$this->session->set_flashdata('SUCCESS', 'Email Sent Successfully');
			redirect('panel/client/client_list');

		}

		$email_template = $this->db->order_by('subject', 'asc');
		$email_template = $this->db->get('email_template')->result();
		$data['email_template'] = $email_template;

		$customer = $this->db->order_by('tags_status', 'asc');
		$customer = $this->db->group_by('tags_status');
		$customer = $this->db->where('tags_status !=', '');
		$customer = $this->db->get('customer')->result();
		$data['client'] = $customer;

		$data['heder_title'] = 'Send Email';
		$this->load->view('panel/client/send_email', $data);
	}

	function email_template() {

		$email_template = $this->db->order_by('id', 'desc');
		$email_template = $this->db->get('email_template')->result();

		$data['email_template'] = $email_template;

		$data['heder_title'] = 'Email Template List';
		$this->load->view('panel/client/email_template_list', $data);
	}

	function add_new_email_template() {
		if (!empty($_POST)) {
			$array = array(
				'subject' => $this->input->post('subject'),
				'html' => $this->input->post('html'),
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('email_template', $array);

			$this->session->set_flashdata('SUCCESS', 'Email Template Created Successfully');
			redirect('panel/client/email_template');

		}

		$data['heder_title'] = 'Add New Email Template';
		$this->load->view('panel/client/add_new_email_template', $data);
	}

	function edit_email_template($id) {
		if (!empty($_POST)) {
			$array = array(
				'subject' => $this->input->post('subject'),
				'html' => $this->input->post('html'),
				'created_date' => date('Y-m-d H:i:s'),
			);
			$this->db->where('id', $id);
			$this->db->update('email_template', $array);

			$this->session->set_flashdata('SUCCESS', 'Email Template Updated Successfully');
			redirect('panel/client/email_template');

		}

		$email_template = $this->db->where('id', $id);
		$email_template = $this->db->get('email_template')->row();
		$data['email_template'] = $email_template;

		$data['heder_title'] = 'Edit Email Template';
		$this->load->view('panel/client/edit_email_template', $data);
	}

	function view_email_template($id) {
		$email_template = $this->db->where('id', $id);
		$email_template = $this->db->get('email_template')->row();
		$data['email_template'] = $email_template;
		$this->load->view('panel/client/view_email_template', $data);
	}

	function delete_email_template($id) {
		$this->db->where('id', $id);
		$this->db->delete('email_template');

		$this->session->set_flashdata('SUCCESS', 'Email Template Deleted Successfully');
		redirect('panel/client/email_template');
	}

	function client_list() {

		$this->load->library('pagination');

		$total = $this->panel_client_model->countClient();
		$per_page = 40;
		$data['getClient'] = $this->panel_client_model->getClient($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/client/client_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Client List';
		$this->load->view('panel/client/client_list', $data);
	}

	function upload_excel() {
		if (isset($_FILES['result_file'])) {
			ini_set('memory_limit', '20000M');
			ini_set('max_execution_time', 600); //600 seconds = 10 minutes

			$newfile = 'public/client/';
			$picturename = date('YmdHis') . $_FILES['result_file']['name'];
			move_uploaded_file($_FILES['result_file']['tmp_name'], $newfile . $picturename);

			$file_type = PHPExcel_IOFactory::identify($newfile . $picturename);

			$objReader = PHPExcel_IOFactory::createReader($file_type);
			$objPHPExcel = $objReader->load($newfile . $picturename);
			$sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

			$i = 1;
			foreach ($sheet_data as $value) {

				if (!empty($value['A']) && !empty($value['C'])) {
					if ($i != '1') {
						$check = $this->db->where('email', $value['C']);
						$check = $this->db->get('customer')->num_rows();
						if ($check == '0') {

							$password = password_hash('123456', PASSWORD_DEFAULT);
							$array = array(
								'username' => !empty($value['A']) ? $value['A'] : '',
								'lastname' => !empty($value['B']) ? $value['B'] : '',
								'email' => !empty($value['C']) ? $value['C'] : '',
								'address' => !empty($value['D']) ? $value['D'] : '',
								'tags_status' => !empty($value['E']) ? $value['E'] : '',
								'phone' => !empty($value['F']) ? $value['F'] : '',
								'password' => $password,
								'created_date' => date('Y-m-d H:i:s'),
							);

							$this->db->insert('customer', $array);

						}
					}
					$i++;
				}
			}

			$this->session->set_flashdata('SUCCESS', 'Client Created Successfully');
			redirect('panel/client/client_list');
		}

		$data['heder_title'] = 'Upload Excel';
		$this->load->view('panel/client/upload_excel', $data);
	}

	function add_client() {
		if (!empty($_POST)) {
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[customer.email]');
			if ($this->form_validation->run() == TRUE) {

				$newpasdsword = date('His');
				$password = password_hash($newpasdsword, PASSWORD_DEFAULT);
				$array = array(
					'username' => $this->input->post('username'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'tags_status' => $this->input->post('tags_status'),
					'phone' => $this->input->post('phone'),
						'profession' => $this->input->post('profession'),
							'note' => $this->input->post('note'),
					'password' => $password,
					'created_date' => date('Y-m-d H:i:s'),
				);

				$this->db->insert('customer', $array);

				$data['username'] = $this->input->post('username');
				$data['lastname'] = $this->input->post('lastname');
				$data['email'] = $this->input->post('email');
				$data['password'] = $password;

				$htmlMessage = $this->load->view('mail/customer_create', $data, true);

				$this->front_common_model->sendEmail($this->input->post('email'), 'New Account @ IELTS Medical', $htmlMessage);

				// click send
				if (!empty($this->input->post('phone'))) {
					require_once APPPATH . 'third_party/vendor/autoload.php';

					$config = ClickSend\Configuration::getDefaultConfiguration()
						->setUsername('ieltsmedical')
						->setPassword('284913AE-666F-E09F-A3AF-6F7CA1565763');
					$apiInstance = new ClickSend\Api\SMSApi(new GuzzleHttp\Client(), $config);
					$msg = new \ClickSend\Model\SmsMessage();
					$msg->setBody("IELTS Medical guides doctors, nurses and other healthcare practitioners to UK registration and their first job role. It's a pleasure to meet you! Make sure to store our phone number: +442036376722 and our Whatsapp too: 07598311788.");

					$msg->setTo("+44" . $this->input->post('phone') . "");
					$msg->setSource("php-sdk");

					$sms_messages = new \ClickSend\Model\SmsMessageCollection();
					$sms_messages->setMessages([$msg]);

					try {
						$result = $apiInstance->smsSendPost($sms_messages);
					} catch (Exception $e) {

					}
				}

				// end click send

				$this->session->set_flashdata('SUCCESS', 'Client Created Successfully');
				redirect('panel/client/client_list');
			}
		}
		$data['heder_title'] = 'Add Client';
		$this->load->view('panel/client/add_client', $data);
	}

	function edit_client($id) {
		if (!empty($_POST)) {
			if (!empty($this->input->post('password'))) {
				$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				$array_p = array(
					'password' => $password,
				);

				$update_p = $this->db->where('id', $this->input->post('id'));
				$update_p = $this->db->update('customer', $array_p);
			}

			$array = array(
				'username' => $this->input->post('username'),
				'lastname' => $this->input->post('lastname'),
				'address' => $this->input->post('address'),
				'tags_status' => $this->input->post('tags_status'),
				'phone' => $this->input->post('phone'),
				'profession' => $this->input->post('profession'),
							'note' => $this->input->post('note'),

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('customer', $array);

			$this->session->set_flashdata('SUCCESS', 'Client Updated Successfully');
			redirect('panel/client/client_list');
		}

		$tutor = $this->db->where('id', $id);
		$tutor = $this->db->get('customer')->row();

		$data['tutor'] = $tutor;
		$data['heder_title'] = 'Edit Client';
		$this->load->view('panel/client/edit_client', $data);
	}

	function delete_client($id) {
		$this->db->where('id', $id);
		$this->db->delete('customer');

		$this->session->set_flashdata('SUCCESS', 'Client Deleted Successfully');
		redirect('panel/client/client_list');
	}

}
?>