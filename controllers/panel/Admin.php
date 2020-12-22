<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_admin_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/admin/admin_list');
	}

	function admin_list() {

		$this->load->library('pagination');

		$total = $this->panel_admin_model->countTutor();
		$per_page = 40;
		$data['getTutor'] = $this->panel_admin_model->getTutor($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/admin/admin_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Admin List';
		$this->load->view('panel/admin/admin_list', $data);
	}

	function add_admin() {
		if (!empty($_POST)) {
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_accounts.email]');
			if ($this->form_validation->run() == TRUE) {
				$this->load->model('front/front_common_model', '', TRUE);
				$newpasdsword = date('His');
				$password = password_hash($newpasdsword, PASSWORD_DEFAULT);
				$array = array(
					'account_name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'user_status' => $this->input->post('user_status'),
					'role' => $this->input->post('role'),
					'type' => $this->input->post('type'),
					'password' => $password,
					'registered' => date('Y-m-d H:i:s'),
				);

				$data['firstname'] = $this->input->post('name');
				$data['username'] = $this->input->post('email');
				$data['newpasdsword'] = $newpasdsword;

				$htmlMessage = $this->load->view('mail/create_admin_account', $data, true);

				$this->front_common_model->sendEmail($this->input->post('email'), 'IELTS Medical Admin Account', $htmlMessage);

				$this->db->insert('user_accounts', $array);
				$this->session->set_flashdata('SUCCESS', 'Admin Created Successfully');
				redirect('panel/admin/admin_list');
			}
		}
		$data['heder_title'] = 'Add Admin';
		$this->load->view('panel/admin/add_admin', $data);
	}

	function edit_admin($id) {
		if (!empty($_POST)) {
			if (!empty($this->input->post('password'))) {
				$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				$array_p = array(
					'password' => $password,
				);

				$update_p = $this->db->where('user_id', $this->input->post('id'));
				$update_p = $this->db->update('user_accounts', $array_p);
			}

			$array = array(
					'type' => $this->input->post('type'),
				'account_name' => $this->input->post('name'),
				'user_status' => $this->input->post('user_status'),
				'role' => $this->input->post('role'),
			);

			$this->db->where('user_id', $this->input->post('id'));
			$this->db->update('user_accounts', $array);

			$this->session->set_flashdata('SUCCESS', 'Admin Updated Successfully');
			redirect('panel/admin/admin_list');
		}

		$tutor = $this->db->where('user_id', $id);
		$tutor = $this->db->get('user_accounts')->row();

		$data['tutor'] = $tutor;
		$data['heder_title'] = 'Edit Admin';
		$this->load->view('panel/admin/edit_admin', $data);
	}

	function delete_admin($id) {
		$this->db->where('user_id', $id);
		$this->db->delete('user_accounts');

		$this->session->set_flashdata('SUCCESS', 'Admin Deleted Successfully');
		redirect('panel/admin/admin_list');
	}

}
