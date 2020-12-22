<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	function index() {
		if ($this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/dashboard');
			exit;
		}
		redirect($this->config->item('panel_folder') . '/login/userlogin');
	}

	function userlogin() {

		

		if ($this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/dashboard');
			exit;
		}

		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		if (!empty($_POST)) {
		
			// $password = '123456';
			// $hash = password_hash($password,PASSWORD_DEFAULT);
   			// print_r($hash);
			// die();

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|callback__checkLogin|callback__check_email_verify');
			if ($this->form_validation->run()) {
				$this->load->model('panel/panel_login_model', '', TRUE);
				$user_data = $this->panel_login_model->get_user_data_from_email($this->input->post('email'));
				$this->session->set_userdata(array(
					'user_logged_in' => true,
					'user_id' => $user_data->user_id,
					'user_account_name' => $user_data->account_name,
					'user_account_role' => $user_data->role,
				));

				$this->panel_login_model->update_userdata_on_login($this->input->post('email'));
				$this->_reset_login_attempts($this->input->post('email'));
				redirect($this->config->item('panel_folder') . '/');
				exit();
			}
		}

		$this->load->view('panel/login/login_form');
	}

	public function _check_email_verify() {
		$this->load->model('panel/panel_login_model', '', TRUE);
		$count = $this->panel_login_model->check_email_verify_onlogin();

		if ($count == 1) {
			return TRUE;
		} else {
			$this->form_validation->set_message('_check_email_verify', "Email address not verified please contact admin");
			return FALSE;
		}
	}

	function _checkLogin() {
		$this->load->model('panel/panel_login_model', '', TRUE);
		$hashed_password = $this->panel_login_model->get_user_hash_from_email($this->input->post('email'));
		if ($hashed_password) {
			if (password_verify($this->input->post('password'), $hashed_password)) {
				return TRUE;
			} else {
				$this->form_validation->set_message('_checkLogin', "Incorrect email address or password!");
				return FALSE;
			}
		} else {
			$this->form_validation->set_message('_checkLogin', "Incorrect email address or password!");
			return FALSE;
		}
	}

	public function _reset_login_attempts($email) {
		$this->load->model('panel/panel_login_model', '', TRUE);
		$this->panel_login_model->reset_user_login_attempts($email);
		$this->panel_login_model->update_user_banned_lifting_time($email, NULL);
	}

	function logout() {
		$this->session->unset_userdata('user_logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_account_name');
		redirect($this->config->item('panel_folder') . '/login/userlogin');
	}

	public function forgotpassword() {

		if (!empty($_POST)) {
			$email = $this->input->post('email');
			$get = $this->db->where('email', $email);
			$get = $this->db->get('user_accounts');
			if ($get->num_rows() > 0) {
				$string = '';
				$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$max = strlen($characters) - 1;
				for ($i = 0; $i < 8; $i++) {
					$string .= $characters[mt_rand(0, $max)];
				}

				$hashed_password = password_hash($string, PASSWORD_DEFAULT);

				$data = array(
					'password' => $hashed_password,
				);
				//      $this->db->where('user_id', $get->row()->user_id);
				//      $this->db->update('user_accounts',$data);

				$data['name'] = $get->row()->account_name;
				$data['password'] = $string;
				$this->load->library('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('info@cbtfornurses.com', 'Cbtfornurses LTD');
				$this->email->to($this->input->post('email'));
				$htmlMessage = $this->load->view('email_app/forgot_password_panel', $data, true);
				$this->email->subject('Forgot Password - Cbtfornurses LTD');
				$this->email->message($htmlMessage);
				@$this->email->send();

				$this->session->set_flashdata('SUCCESSMSGREGISTER', 'Password successfully changed. please check your email.');
				redirect('panel/login/userlogin');
			} else {
				$this->session->set_flashdata('Message', 'Email-Id does not exist');
			}

		}
		$this->load->view('panel/login/forgotpassword');
	}

}
