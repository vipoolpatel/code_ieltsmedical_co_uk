<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('front/front_common_model', '', TRUE);

	}

	function login() {
		if ($this->session->userdata('customer_logged_in')) {
			redirect('user/dashboard');
			exit();
		}
		if (!empty($_POST)) {

			// $password = '123456';
			// $hash = password_hash($password,PASSWORD_DEFAULT);
   			// print_r($hash);
			// die();
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customer.email]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

			if ($this->form_validation->run()) {
				if ($this->input->post('current_captcha') == $this->input->post('captcha')) {
					$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
					$array = array(
						'username' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'password' => $password,
						'created_date' => date('Y-m-d H:i:s'),
					);
					$this->db->insert('customer', $array);
					$customer_id = $this->db->insert_id();
					$this->session->set_userdata(array(
						'customer_logged_in' => true,
						'customer_login_id' => $customer_id,
						'customer_username' => $this->input->post('username'),
					));

					$this->session->set_userdata($session_data);
					redirect(base_url() . 'user/dashboard');
				} else {
					$this->session->set_flashdata('ERROR', 'Captcha does not match.');
					redirect('my-account');
				}
			}
		}

		$getSlug = $this->front_common_model->getSlug('my-account');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/my_account/my_account', $data);

	}
	function login_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			//model function
			$this->load->model('front/front_login_model');
			$getdata = $this->front_login_model->login($email);
			if (!empty($getdata)) {
				if (password_verify($this->input->post('password'), $getdata->password)) {
					$this->session->set_userdata(array(
						'customer_logged_in' => true,
						'customer_login_id' => $getdata->id,
						'customer_username' => $getdata->username,
					));

					$this->session->set_userdata($session_data);
					redirect(base_url() . 'user/dashboard');
				} else {
					$this->session->set_flashdata('ERROR', 'Invalid Email and Password');
					redirect(base_url() . 'my-account');
				}
			} else {
				$this->session->set_flashdata('ERROR', 'Invalid Email and Password');
				redirect(base_url() . 'my-account');
			}

		} else {
			$this->session->set_flashdata('ERROR', 'Invalid Email and Password');
			redirect(base_url() . 'my-account');
		}
	}

	public function logout() {
		$this->session->unset_userdata('customer_logged_in');
		$this->session->unset_userdata('customer_login_id');
		$this->session->unset_userdata('customer_username');
		redirect('my-account');
	}

	// Forgot Password
	public function forgot_password()
	{	
		if (!empty($_POST)) {

			// $password = '123456';
			// $hash = password_hash($password,PASSWORD_DEFAULT);
   // 			print_r($hash);
			// die();

			
			//$email = $this->input->post();
			// echo "<pre>";
			// print_r($email);
			// die;
			$email = $this->input->post('email');
			$get   = $this->db->where('email',$email);
			$get = $this->db->get('customer');

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

				    $this->db->where('id', $get->row()->id);
				    $this->db->update('customer',$data);
				
				$data['username'] = $get->row()->username;
				$data['password'] = $string;
				$this->load->library('email');
				

			//
				$htmlMessage = $this->load->view('email_app/forgot_password', $data, true);
 				$config['protocol']    = 'smtp';
                $config['smtp_host']    = 'smtp.mailtrap.io';
                $config['smtp_port']    = '2525';
                $config['smtp_timeout'] = '60';

                $config['smtp_user']    = 'd8b347e75763a9';  
                $config['smtp_pass']    = '34d567f310b19e';  

                $config['charset']    = 'utf-8';
                $config['newline']    = "\r\n";
                $config['mailtype'] = 'html'; 
                $config['validation'] = TRUE; 
         

                $this->email->initialize($config);
                $this->email->set_mailtype("html");
                $this->email->from('vipuldayani55@gmail.com', 'Cbtfornurses LTD');
                $this->email->to('vipuldayani55@gmail.com');
                $this->email->subject('Forgot Password - Cbtfornurses LTD');
                $this->email->message($htmlMessage);
                $this->email->send();

			//

		    	// $config['mailtype'] = 'html';
				// $this->email->initialize($config);
				// $this->email->from('vipuldayani55@gmail.com', 'Cbtfornurses LTD');
				// $this->email->to($this->input->post('email'));
				// $htmlMessage = $this->load->view('email_app/forgot_password', $data, true);
				// $this->email->subject('Forgot Password - Cbtfornurses LTD');
				// $this->email->message($htmlMessage);
				// @$this->email->send();

				$this->session->set_flashdata('SUCCESS', 'Password successfully changed. please check your email.');
				
				redirect('login/forgot_password');
			}
			else {
				$this->session->set_flashdata('ERROR', 'Email-Id does not exist');
			}


		}
		$this->load->view('front/my_account/forgot_password');
	}

}
