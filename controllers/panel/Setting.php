<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Setting extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		// $this->load->model('panel/panel_admin_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/setting/setting');
	}

function setting() {

 if(!empty($_POST))
        {
            $data = array(
                'live_courses_price' => $this->input->post('live_courses_price'),
                'live_courses_on_off' => $this->input->post('live_courses_on_off'),
                 'flex_courses_price' => $this->input->post('flex_courses_price'),
                'flex_courses_on_off' => $this->input->post('flex_courses_on_off'),
            );

            $this->db->where('id',1);
            $this->db->update('setting',$data);
            $this->session->set_flashdata('SUCCESS','Setting Updated Successfully');
           // redirect('panel/setting/setting');

        }

            $editUser = $this->db->where('id',1);
            $data['setting'] = $this->db->get('setting')->row();
     


		$data['heder_title'] = 'Setting';
		$this->load->view('panel/setting/setting', $data);
	}

	
}