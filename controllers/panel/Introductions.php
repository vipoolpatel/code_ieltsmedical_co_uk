<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Introductions extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}
		$this->load->model('front/front_common_model', '', TRUE);
		$this->load->model('panel/panel_introductions_model', '', TRUE);
		require_once APPPATH . 'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/page/introductions_list');
	}

	function introductions_list() {
		$trust_get = $this->db->order_by('name_of_trust', 'asc');
		$trust_get = $this->db->get('trust')->result();
		$data['trust_get'] = $trust_get;

		$data['Interest'] = $this->panel_introductions_model->getStatusIntroductions('1');
		$data['Introduced'] = $this->panel_introductions_model->getStatusIntroductions('2');
		$data['Hired'] = $this->panel_introductions_model->getStatusIntroductions('3');
		$data['Reject'] = $this->panel_introductions_model->getStatusIntroductions('4');
		$data['introductions_status_get'] = $this->db->get('introductions_status')->result();
		$this->load->library('pagination');

		$total = $this->panel_introductions_model->countIntroductions();
		$per_page = 100;
		$data['getIntroductions'] = $this->panel_introductions_model->getIntroductions($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/introductions/introductions_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Introductions List';
		$this->load->view('panel/introductions/introductions_list', $data);
	}

	function view_introductions($id) {
		$this->load->library('pagination');
		$data['getIntroductions'] = $this->panel_introductions_model->view_introductions($id);
		$data['more_jobs'] = $this->get_job_introduction($id);

		$data['heder_title'] = 'View Introductions';
		$this->load->view('panel/introductions/view_introductions', $data);
	}

	function add_introductions() {
		if (!empty($_POST)) {

			$user_accounts = $this->db->where('user_id', $this->session->userdata('user_id'));
			$user_accounts = $this->db->get('user_accounts')->row();
			$admin_emaiil = $user_accounts->email;

			$introductions_status = $this->db->where('id', $this->input->post('status_id'));
			$introductions_status = $this->db->get('introductions_status')->row();
			$status_name = $introductions_status->status_name;

			$introductions_profession_stage = $this->db->where('id', $this->input->post('profession_stage_id'));
			$introductions_profession_stage = $this->db->get('introductions_profession_stage')->row();
			$profession_stage_name = $introductions_profession_stage->profession_stage_name;

			$introductions_profession = $this->db->where('id', $this->input->post('profession_id'));
			$introductions_profession = $this->db->get('introductions_profession')->row();
			$profession_name = $introductions_profession->profession_name;

			$country = $this->db->where('id', $this->input->post('country_id'));
			$country = $this->db->get('country')->row();
			$country_name = $country->country_name;

			$trust = $this->db->where('id', $this->input->post('trust_id'));
			$trust = $this->db->get('trust')->row();
			$trust_email = $trust->email;
			$name_of_trust = $trust->name_of_trust;

			$array = array(
				'admin_id' => $this->session->userdata('user_id'),
				'customer_id' => $this->input->post('customer_id'),
				'first_name' => $this->input->post('first_name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'url' => $this->input->post('url'),
				'trust_id' => $this->input->post('trust_id'),
				'status_id' => $this->input->post('status_id'),
				'gender' => $this->input->post('gender'),
				'current_location' => $this->input->post('current_location'),
				'subject' => $this->input->post('subject'),
				'profession_id' => $this->input->post('profession_id'),
				'profession_stage_id' => $this->input->post('profession_stage_id'),
				'country_id' => $this->input->post('country_id'),
				'role1_job_title' => $this->input->post('role1_job_title'),
				'role1_start_date' => $this->input->post('role1_start_date'),
				'role1_end_date' => $this->input->post('role1_end_date'),
				'role1_description' => $this->input->post('role1_description'),
				'role2_job_title' => $this->input->post('role2_job_title'),
				'role2_start_date' => $this->input->post('role2_start_date'),
				'role2_end_date' => $this->input->post('role2_end_date'),
				'role2_description' => $this->input->post('role2_description'),

				'role1_name_of_employer' => $this->input->post('role1_name_of_employer'),
				'role2_name_of_employer' => $this->input->post('role2_name_of_employer'),
				'role3_name_of_employer' => $this->input->post('role3_name_of_employer'),

				'role3_job_title' => $this->input->post('role3_job_title'),
				'role3_start_date' => $this->input->post('role3_start_date'),
				'role3_end_date' => $this->input->post('role3_end_date'),
				'role3_description' => $this->input->post('role2_description'),

				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('introductions', $array);
			$last_id = $this->db->insert_id();

			if (!empty($this->input->post('jobs'))) {
				foreach ($this->input->post('jobs') as $job_value) {
					if (!empty($job_value['job_title'])) {

						$job_array = array(
							'introduction_id' => $last_id,
							'job_title' => $job_value['job_title'],
							'name_of_employer' => !empty($job_value['name_of_employer']) ? $job_value['name_of_employer'] : '',
							'start_date' => !empty($job_value['start_date']) ? $job_value['start_date'] : '',
							'end_date' => !empty($job_value['end_date']) ? $job_value['end_date'] : '',
							'description' => !empty($job_value['description']) ? $job_value['description'] : '',
						);

						$this->db->insert('introductions_job', $job_array);
					}
				}
			}

			$pdf_name = $this->printintroductions($last_id, 1);

			$data['more_jobs'] = $this->get_job_introduction($last_id);

			$data['role1_job_title'] = $this->input->post('role1_job_title');
			$data['role1_start_date'] = $this->input->post('role1_start_date');
			$data['role1_end_date'] = $this->input->post('role1_end_date');
			$data['role1_description'] = $this->input->post('role1_description');

			$data['role2_job_title'] = $this->input->post('role2_job_title');
			$data['role2_start_date'] = $this->input->post('role2_start_date');
			$data['role2_end_date'] = $this->input->post('role2_end_date');
			$data['role2_description'] = $this->input->post('role2_description');

			$data['role3_job_title'] = $this->input->post('role3_job_title');
			$data['role3_start_date'] = $this->input->post('role3_start_date');
			$data['role3_end_date'] = $this->input->post('role3_end_date');
			$data['role3_description'] = $this->input->post('role3_description');

			$data['role1_name_of_employer'] = $this->input->post('role1_name_of_employer');
			$data['role2_name_of_employer'] = $this->input->post('role2_name_of_employer');
			$data['role3_name_of_employer'] = $this->input->post('role3_name_of_employer');

			if (empty($this->input->post('customer_id'))) {
				$this->front_common_model->CreateClient($this->input->post('first_name'), '', $this->input->post('email'), $last_id, 'customer_id', 'introductions');
			}

			if ($this->input->post('status_id') == '1') {
				$subject = $status_name . ' expressed by ' . $this->input->post('first_name');
				$data['article'] = $this->input->post('first_name') . ' has expressed interest in working for ' . $this->input->post('first_name');
				$article_trust = '';
				$article_trust .= $this->input->post('first_name') . ' has expressed interest in working for ' . $name_of_trust;

				$article_trust .= "
					<p>" . $this->input->post('gender') . " profile is below.</p>
					<p>Please let us know if you are interested in progressing with this healthcare professional's application. If we have not heard back from you within 5 working days, we shall presume that you are not interested in this application.</p>";

				$data['article_trust'] = $article_trust;

			} else if ($this->input->post('status_id') == '2') {
				$subject = 'Introduction made between ' . $this->input->post('first_name') . ' and ' . $name_of_trust . ' ' . $this->input->post('current_location');
				$data['article'] = $this->input->post('first_name') . ' has been introduced to ' . $name_of_trust;
			} else if ($this->input->post('status_id') == '3') {
				$subject = $this->input->post('first_name') . ' has been hired by ' . $name_of_trust . ' ' . $this->input->post('current_location');
				$data['article'] = $this->input->post('first_name') . ' has been hired by ' . $name_of_trust;
			} else {
				$subject = "We're sorry it didn't work out";
				$data['article'] = "We thought you should know that " . $name_of_trust . " has decided not to proceed.
				<br />
				We're sorry it didn't work out. We'd like to have a chat with you about your next steps. Please let us know when would be a convenient time.";
			}

			$data['show_footer'] = true;

			$htmlMessage = $this->load->view('mail/introductions', $data, true);
			$htmlMessage_trust = $this->load->view('mail/introductions_trust', $data, true);

			$subject_admin = '' . $profession_name . ' ' . $this->input->post('first_name') . ' trained in ' . $country_name . ' and ' . $profession_stage_name . ' - would like to work for ' . $name_of_trust . '';

			$this->front_common_model->sendEmailAttachment($trust_email, $subject_admin, $htmlMessage_trust, $pdf_name);
			$this->front_common_model->sendEmailAttachment($admin_emaiil, $subject_admin, $htmlMessage_trust, $pdf_name);

			if (!empty($this->input->post('email_candidate'))) {
				if ($this->input->post('status_id') != '1') {
					$this->front_common_model->sendEmailAttachment($this->input->post('email'), $subject, $htmlMessage, $pdf_name);
				}
			}
			$this->session->set_flashdata('SUCCESS', 'Introductions successfully created.');
			redirect('panel/introductions/introductions_list');

		}

		$data['country_list'] = $this->db->get('country')->result();
		$data['introductions_profession'] = $this->db->get('introductions_profession')->result();

		$data['customer_get'] = $this->db->get('customer')->result();
		$data['trust_get'] = $this->db->get('trust')->result();
		$data['introductions_status_get'] = $this->db->get('introductions_status')->result();
		$data['user_accounts_get'] = $this->db->get('user_accounts')->result();

		$data['heder_title'] = 'Add Introductions';
		$this->load->view('panel/introductions/add_introductions', $data);
	}

	function get_job_introduction($id) {
		$this->db->where('introduction_id', $id);
		return $this->db->get('introductions_job')->result();
	}

	function edit_introductions($id) {
		if (!empty($_POST)) {
			$user_accounts = $this->db->where('user_id', $this->session->userdata('user_id'));
			$user_accounts = $this->db->get('user_accounts')->row();
			$admin_emaiil = $user_accounts->email;

			$introductions_status = $this->db->where('id', $this->input->post('status_id'));
			$introductions_status = $this->db->get('introductions_status')->row();
			$status_name = $introductions_status->status_name;

			$introductions_profession_stage = $this->db->where('id', $this->input->post('profession_stage_id'));
			$introductions_profession_stage = $this->db->get('introductions_profession_stage')->row();
			$profession_stage_name = $introductions_profession_stage->profession_stage_name;

			$introductions_profession = $this->db->where('id', $this->input->post('profession_id'));
			$introductions_profession = $this->db->get('introductions_profession')->row();
			$profession_name = $introductions_profession->profession_name;

			$country = $this->db->where('id', $this->input->post('country_id'));
			$country = $this->db->get('country')->row();
			$country_name = $country->country_name;

			$trust = $this->db->where('id', $this->input->post('trust_id'));
			$trust = $this->db->get('trust')->row();
			$trust_email = $trust->email;
			$name_of_trust = $trust->name_of_trust;

			$array = array(
				'customer_id' => $this->input->post('customer_id'),
				'first_name' => $this->input->post('first_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'gender' => $this->input->post('gender'),
				'url' => $this->input->post('url'),
				'current_location' => $this->input->post('current_location'),
				'subject' => $this->input->post('subject'),
				'profession_id' => $this->input->post('profession_id'),
				'profession_stage_id' => $this->input->post('profession_stage_id'),
				'country_id' => $this->input->post('country_id'),
				'role1_job_title' => $this->input->post('role1_job_title'),
				'role1_start_date' => $this->input->post('role1_start_date'),
				'role1_end_date' => $this->input->post('role1_end_date'),
				'role1_description' => $this->input->post('role1_description'),
				'role2_job_title' => $this->input->post('role2_job_title'),
				'role2_start_date' => $this->input->post('role2_start_date'),
				'role2_end_date' => $this->input->post('role2_end_date'),
				'role2_description' => $this->input->post('role2_description'),

				'role1_name_of_employer' => $this->input->post('role1_name_of_employer'),
				'role2_name_of_employer' => $this->input->post('role2_name_of_employer'),
				'role3_name_of_employer' => $this->input->post('role3_name_of_employer'),

				'role3_job_title' => $this->input->post('role3_job_title'),
				'role3_start_date' => $this->input->post('role3_start_date'),
				'role3_end_date' => $this->input->post('role3_end_date'),
				'role3_description' => $this->input->post('role2_description'),
				'trust_id' => $this->input->post('trust_id'),
				'status_id' => $this->input->post('status_id'),
			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('introductions', $array);

			if (!empty($this->input->post('jobs'))) {

				$delete_job = $this->db->where('introduction_id', $this->input->post('id'));
				$delete_job = $this->db->delete('introductions_job');

				foreach ($this->input->post('jobs') as $job_value) {
					if (!empty($job_value['job_title'])) {

						$job_array = array(
							'introduction_id' => $this->input->post('id'),
							'job_title' => $job_value['job_title'],
							'name_of_employer' => !empty($job_value['name_of_employer']) ? $job_value['name_of_employer'] : '',
							'start_date' => !empty($job_value['start_date']) ? $job_value['start_date'] : '',
							'end_date' => !empty($job_value['end_date']) ? $job_value['end_date'] : '',
							'description' => !empty($job_value['description']) ? $job_value['description'] : '',
						);

						$this->db->insert('introductions_job', $job_array);
					}
				}
			}

			$pdf_name = $this->printintroductions($this->input->post('id'), 1);

			$data['more_jobs'] = $this->get_job_introduction($this->input->post('id'));

			if ($this->input->post('old_status_id') != $this->input->post('status_id')) {

				$data['role1_job_title'] = $this->input->post('role1_job_title');
				$data['role1_start_date'] = $this->input->post('role1_start_date');
				$data['role1_end_date'] = $this->input->post('role1_end_date');
				$data['role1_description'] = $this->input->post('role1_description');

				$data['role2_job_title'] = $this->input->post('role2_job_title');
				$data['role2_start_date'] = $this->input->post('role2_start_date');
				$data['role2_end_date'] = $this->input->post('role2_end_date');
				$data['role2_description'] = $this->input->post('role2_description');

				$data['role3_job_title'] = $this->input->post('role3_job_title');
				$data['role3_start_date'] = $this->input->post('role3_start_date');
				$data['role3_end_date'] = $this->input->post('role3_end_date');
				$data['role3_description'] = $this->input->post('role3_description');

				$data['role1_name_of_employer'] = $this->input->post('role1_name_of_employer');
				$data['role2_name_of_employer'] = $this->input->post('role2_name_of_employer');
				$data['role3_name_of_employer'] = $this->input->post('role3_name_of_employer');

				$data['show_footer'] = true;

				if ($this->input->post('status_id') == '1') {
					$subject = $status_name . ' expressed by ' . $this->input->post('first_name');
					$data['article'] = $this->input->post('first_name') . ' has expressed interest in working for ' . $this->input->post('first_name');
					$article_trust = '';
					$article_trust .= $this->input->post('first_name') . ' has expressed interest in working for ' . $name_of_trust;

					$article_trust .= "
					<p>" . $this->input->post('gender') . " profile is below.</p>
					<p>Please let us know if you are interested in progressing with this healthcare professional's application. If we have not heard back from you within 5 working days, we shall presume that you are not interested in this application.</p>";

					$data['article_trust'] = $article_trust;

				} else if ($this->input->post('status_id') == '2') {
					$subject = 'Introduction made between ' . $this->input->post('first_name') . ' and ' . $name_of_trust . ' ' . $this->input->post('current_location');
					$data['article'] = $this->input->post('first_name') . ' has been introduced to ' . $name_of_trust;
				} else if ($this->input->post('status_id') == '3') {
					$subject = $this->input->post('first_name') . ' has been hired by ' . $name_of_trust . ' ' . $this->input->post('current_location');
					$data['article'] = $this->input->post('first_name') . ' has been hired by ' . $name_of_trust;
				} else {
					$subject = "We're sorry it didn't work out";
					$data['article'] = "We thought you should know that " . $name_of_trust . " has decided not to proceed.
				<br />
				We're sorry it didn't work out. We'd like to have a chat with you about your next steps. Please let us know when would be a convenient time.";
				}

				$htmlMessage = $this->load->view('mail/introductions', $data, true);
				$htmlMessage_trust = $this->load->view('mail/introductions_trust', $data, true);

				$subject_admin = '' . $profession_name . ' ' . $this->input->post('first_name') . ' trained in ' . $country_name . ' and ' . $profession_stage_name . ' - would like to work for ' . $name_of_trust . '';

				if ($this->input->post('status_id') != '4') {
					$this->front_common_model->sendEmailAttachment($trust_email, $subject_admin, $htmlMessage_trust, $pdf_name);

				}

				$this->front_common_model->sendEmailAttachment($admin_emaiil, $subject_admin, $htmlMessage_trust, $pdf_name);

				if (!empty($this->input->post('email_candidate'))) {
					if ($this->input->post('status_id') != '1') {
						$this->front_common_model->sendEmailAttachment($this->input->post('email'), $subject, $htmlMessage, $pdf_name);
					}
				}

			}

			$this->session->set_flashdata('SUCCESS', 'Introductions successfully updated.');
			redirect('panel/introductions/introductions_list');
		}

		$apps = $this->db->where('id', $id);
		$apps = $this->db->get('introductions')->row();

		$data['country_list'] = $this->db->get('country')->result();
		$data['introductions_profession'] = $this->db->get('introductions_profession')->result();

		$introductions_profession_stage = $this->db->where('profession_id', $apps->profession_id);
		$introductions_profession_stage = $this->db->get('introductions_profession_stage')->result();
		$data['introductions_profession_stage'] = $introductions_profession_stage;

		$data['customer_get'] = $this->db->get('customer')->result();
		$data['trust_get'] = $this->db->get('trust')->result();
		$data['introductions_status_get'] = $this->db->get('introductions_status')->result();
		$data['user_accounts_get'] = $this->db->get('user_accounts')->result();

		$data['more_jobs'] = $this->get_job_introduction($id);

		$data['apps'] = $apps;
		$data['heder_title'] = 'Edit Introductions';
		$this->load->view('panel/introductions/edit_introductions', $data);
	}

	function delete_introductions($id) {
		$this->db->where('id', $id);
		$this->db->delete('introductions');

		$delete_job = $this->db->where('introduction_id', $id);
		$delete_job = $this->db->delete('introductions_job');

		$this->session->set_flashdata('SUCCESS', 'Introductions successfully deleted.');
		redirect('panel/introductions/introductions_list');
	}

	function trust_list() {

		$this->load->library('pagination');

		$total = $this->panel_introductions_model->countTrust();
		$per_page = 100;
		$data['getTrust'] = $this->panel_introductions_model->getTrust($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/introductions/trust_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Trust List';
		$this->load->view('panel/introductions/trust_list', $data);
	}
	function add_trust() {
		if (!empty($_POST)) {

			$array = array(
				'name_of_trust' => $this->input->post('name_of_trust'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'type' => $this->input->post('type'),
				'phone' => $this->input->post('phone'),

				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('trust', $array);
			$this->session->set_flashdata('SUCCESS', 'Trust Created Successfully');
			redirect('panel/introductions/trust_list');
		}

		$data['heder_title'] = 'Add Trust';
		$this->load->view('panel/introductions/add_trust', $data);
	}

	function edit_trust($id) {
		if (!empty($_POST)) {

			$array = array(
				'name_of_trust' => $this->input->post('name_of_trust'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'type' => $this->input->post('type'),
				'phone' => $this->input->post('phone'),

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('trust', $array);

			$this->session->set_flashdata('SUCCESS', 'Trust Updated Successfully');
			redirect('panel/introductions/trust_list');
		}

		$apps = $this->db->where('id', $id);
		$apps = $this->db->get('trust')->row();

		$data['apps'] = $apps;
		$data['heder_title'] = 'Edit Trust';
		$this->load->view('panel/introductions/edit_trust', $data);
	}

	function delete_trust($id) {
		$this->db->where('id', $id);
		$this->db->delete('trust');

		$this->session->set_flashdata('SUCCESS', 'Trust Deleted Successfully');
		redirect('panel/introductions/trust_list');
	}

	function get_stage_profession() {
		$profession_id = $this->input->post('profession_id');
		$stage = $this->db->where('profession_id', $profession_id);
		$stage = $this->db->get('introductions_profession_stage')->result();

		$html = '';
		$html .= '<option value="">Select Stage</option>';
		foreach ($stage as $value) {
			$html .= '<option value="' . $value->id . '">' . $value->profession_stage_name . '</option>';
		}
		$json['success'] = $html;
		echo json_encode($json);

	}

	function copy_introductions() {
		$id = $this->input->post('id');
		$introductions = $this->db->where('id', $id);
		$introductions = $this->db->get('introductions')->row();

		$array = array(
			'admin_id' => $introductions->admin_id,
			'customer_id' => $introductions->customer_id,
			'first_name' => $introductions->first_name,
			'gender' => $introductions->gender,
			'email' => $introductions->email,
			'phone' => $introductions->phone,
			'url' => $introductions->url,
			'current_location' => $introductions->current_location,
			'subject' => $introductions->subject,
			'profession_id' => $introductions->profession_id,
			'profession_stage_id' => $introductions->profession_stage_id,
			'country_id' => $introductions->country_id,
			'trust_id' => $this->input->post('trust_id'),
			'status_id' => $introductions->status_id,
			'role1_job_title' => $introductions->role1_job_title,
			'role1_name_of_employer' => $introductions->role1_name_of_employer,
			'role1_start_date' => $introductions->role1_start_date,
			'role1_end_date' => $introductions->role1_end_date,
			'role1_description' => $introductions->role1_description,
			'role2_job_title' => $introductions->role2_job_title,
			'role2_name_of_employer' => $introductions->role2_name_of_employer,
			'role2_start_date' => $introductions->role2_start_date,
			'role2_end_date' => $introductions->role2_end_date,
			'role2_description' => $introductions->role2_description,
			'role3_job_title' => $introductions->role3_job_title,
			'role3_name_of_employer' => $introductions->role3_name_of_employer,
			'role3_start_date' => $introductions->role3_start_date,
			'role3_end_date' => $introductions->role3_end_date,
			'role3_description' => $introductions->role3_description,
			'created_date' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('introductions', $array);
		$last_id = $this->db->insert_id();

		$job_introductions = $this->db->where('introduction_id', $id);
		$job_introductions = $this->db->get('introductions_job')->result();

		foreach ($job_introductions as $value) {
			$job_array = array(
				'introduction_id' => $last_id,
				'job_title' => $value->job_title,
				'name_of_employer' => $value->name_of_employer,
				'start_date' => $value->start_date,
				'end_date' => $value->end_date,
				'description' => $value->description,
			);

			$this->db->insert('introductions_job', $job_array);
		}

		$this->session->set_flashdata('SUCCESS', 'Introduction Successfully Copy.');
		redirect('panel/introductions/introductions_list');
	}

	public function printintroductions($id, $type = '') {
		$this->load->library('dompdf_gen');

		$getIntroductions = $this->panel_introductions_model->pdfIntroductionsInvoice($id);

		$more_jobs = $this->panel_introductions_model->introductionjobpdf($id);

		$created_date = date('d-m-Y h:i A', strtotime($getIntroductions->created_date));

		$role1_start_date = '';
		if (!empty($getIntroductions->role1_start_date)) {
			$role1_start_date = date('d-m-Y', strtotime($getIntroductions->role1_start_date));
		}

		$role2_end_date = '';
		if (!empty($getIntroductions->role2_end_date)) {
			$role2_end_date = date('d-m-Y', strtotime($getIntroductions->role2_end_date));
		}

		$role3_end_date = '';
		if (!empty($getIntroductions->role3_end_date)) {
			$role3_end_date = date('d-m-Y', strtotime($getIntroductions->role3_end_date));
		}

		$html = '';
		$html .= '<style>
		table {
			display: table; border-collapse: collapse;
		}
		.pricedetail tr td
		{
			font-family:Verdana;
			padding:8px;
			text-align:left;
		}
		.pricedetail tr th
		{
			font-family:Verdana;
			padding:8px;
			text-align:left;
			width:25%;
		}
		</style>
        <p><img src="' . base_url() . 'file/img/logo1.png"></p>
       <table border="1" width="100%" class="pricedetail" style="margin-top: 15px;">

 <tbody>

    <tr>
      <th> Executive </th>
      <td> ' . $getIntroductions->account_name . ' </td>

    </tr>
    <tr>
      <th>  Customer </th>
      <td>  ' . $getIntroductions->username . '</td>

    </tr>
    <tr>
      <th>Candidate Name  </th>
      <td> ' . $getIntroductions->first_name . ' </td>

    </tr>
    <tr>
      <th>Gender </th>
      <td>' . $getIntroductions->gender . '  </td>

    </tr>
    <tr>
      <th>  Candidate Email </th>
      <td> ' . $getIntroductions->email . ' </td>

    </tr>
    <tr>
      <th>  Candidate Phone</th>
      <td> ' . $getIntroductions->phone . ' </td>

    </tr>
    <tr>
      <th>Location  </th>
      <td>  ' . $getIntroductions->current_location . ' </td>

    </tr>
    <tr>
      <th>Subject </th>
      <td>  ' . $getIntroductions->subject . ' </td>

    </tr>
    <tr>
      <th>URL </th>
      <td> ' . $getIntroductions->url . ' </td>

    </tr>
    <tr>
      <th>Profession </th>
      <td>' . $getIntroductions->profession_name . ' </td>

    </tr>

      <tr>
      <th>Stage </th>
      <td> ' . $getIntroductions->profession_stage_name . '</td>

    </tr>

      <tr>
      <th> Trained in</th>
      <td> ' . $getIntroductions->country_name . ' </td>

    </tr>

      <tr>
      <th>  Name of Trust </th>
      <td> ' . $getIntroductions->name_of_trust . '</td>

    </tr>

      <tr>
      <th>  Status</th>
      <td>' . $getIntroductions->status_name . ' </td>

    </tr>
   <tr>
      <th>  Created Date</th>
      <td> ' . $created_date . '</td>
    </tr>

    </tbody>
	</table>


	<br /><br />
	<p  style="color:blue;">Role 1</p>
    <table border="1" width="100%" class="pricedetail" >

 <tbody>

      <tr>
      <th>Job Title </th>
      <td> ' . $getIntroductions->role1_job_title . ' </td>

    </tr>

      <tr>
      <th>Name of Employer  </th>
      <td>' . $getIntroductions->role1_name_of_employer . ' </td>

    </tr>

      <tr>
      <th> Start Date </th>
      <td> ' . $role1_start_date . '</td>

    </tr>

    <tr>
      <th>End Date </th>
      <td>' . date('d-m-Y', strtotime($getIntroductions->role1_end_date)) . ' </td>
    </tr>
    <tr>
      <th> Description</th>
      <td> ' . $getIntroductions->role1_description . '</td>
    </tr>

    </tbody>
	</table>

	<br /><br />
	<p  style="color:blue;">Role 2</p>
    <table border="1" width="100%" class="pricedetail" >

 <tbody>


    <tr>
      <th>  Job Title</th>
      <td>' . $getIntroductions->role2_job_title . ' </td>
    </tr>
    <tr>
      <th>  Name of Employer </th>
      <td>' . $getIntroductions->role2_name_of_employer . ' </td>
    </tr>
    <tr>
      <th>  Start Date</th>
      <td>  ' . date('d-m-Y', strtotime($getIntroductions->role2_start_date)) . '</td>
    </tr>

    <tr>
      <th> End Date</th>
      <td> ' . $role2_end_date . ' </td>
    </tr>

    <tr>
      <th> Description</th>
      <td> ' . $getIntroductions->role2_description . '</td>
    </tr>

 </tbody>
	</table>

	<br /><br />
	<p  style="color:blue;">Role 3</p>
    <table border="1" width="100%" class="pricedetail" >

 <tbody>

  <tr>
      <th>Job Title </th>
      <td>' . $getIntroductions->role3_job_title . ' </td>
    </tr>

  <tr>
      <th> Name of Employer</th>
      <td> ' . $getIntroductions->role3_name_of_employer . ' </td>
    </tr>
      <tr>
      <th>  Start Date  </th>
      <td> ' . date('d-m-Y', strtotime($getIntroductions->role3_start_date)) . '</td>
    </tr>
      <tr>
      <th>  End Date</th>
      <td> ' . $role3_end_date . ' </td>
    </tr>
      <tr>
      <th> Description</th>
      <td>' . $getIntroductions->role3_description . ' </td>
    </tr>
</tbody>
	</table>
    ';

		if (!empty($more_jobs)) {
			$i = 4;
			foreach ($more_jobs as $value) {
				$html .= '
<br /><br />
	<p  style="color:blue;">Role ' . $i . '</p>

    <table border="1" width="100%" class="pricedetail" >

 <tbody>
	<tr>
      <th>Job Title</th>
      <td>' . $value->job_title . '</td>
    </tr>
    <tr>
      <th>Name of Employer</th>
      <td>' . $value->name_of_employer . '</td>
    </tr>
    <tr>
      <th>Start Date</th>
      <td>' . date('d-m-Y', strtotime($value->start_date)) . '</td>
    </tr>
     <tr>
      <th>End Date</th>
      <td>' . date('d-m-Y', strtotime($value->end_date)) . '</td>
    </tr>
    <tr>
      <th>Description</th>
      <td>' . $value->description . '</td>
    </tr>
</tbody>
	</table>
    ';

				$i++;
			}
		}

		$pdfname = "Introductions" . date('YmdHis') . '.pdf';
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$output = $this->dompdf->output();
		if (!empty($type)) {
			$path = 'public/introductions/' . $pdfname . '';
			file_put_contents($path, $output);
			return $path;
		} else {
			$this->dompdf->stream($pdfname);
		}

	}

}
