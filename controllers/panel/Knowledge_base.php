<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Knowledge_base extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_knowledge_base_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/knowledge_base/knowledge_base_list');
	}

	 function knowledge_base_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_knowledge_base_model->countKnowledgeBase();
        $per_page = 100;
        $data['getKnowledge'] = $this->panel_knowledge_base_model->getKnowledgeBase($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/knowledge_base/knowledge_base_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );

    
        $data['heder_title'] = 'Knowledge Base List';
        $this->load->view('panel/knowledge_base/knowledge_base_list', $data);        
    }

    function delete_knowledge_base($id) {
		$this->db->where('id', $id);
		$this->db->delete('knowledge_base');

		$this->session->set_flashdata('SUCCESS', 'Knowledge Base Deleted Successfully');
		redirect('panel/knowledge_base/knowledge_base_list');
	}

	function add_knowledge_base() {
		if (!empty($_POST)) {
			$array = array(
				'question' => $this->input->post('question'),
				'answer' => $this->input->post('answer'),
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('knowledge_base', $array);
			$this->session->set_flashdata('SUCCESS', 'Knowledge Base Created Successfully');
			redirect('panel/knowledge_base/knowledge_base_list');

		}
		$data['heder_title'] = 'Add Knowledge Base';
		$this->load->view('panel/knowledge_base/add_knowledge_base', $data);
	}

	function edit_knowledge_base($id) {

		if (!empty($_POST)) {
			$array = array(
				'question' => $this->input->post('question'),
				'answer' => $this->input->post('answer'),

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('knowledge_base', $array);

			$this->session->set_flashdata('SUCCESS', 'Knowledge Base Updated Successfully');
			redirect('panel/knowledge_base/knowledge_base_list');
		}

		$getKnowledgeBase = $this->db->where('id', $id);
		$getKnowledgeBase = $this->db->get('knowledge_base')->row();

		$data['getKnowledgeBase'] = $getKnowledgeBase;
		$data['heder_title'] = 'Edit Knowledge Base';
		$this->load->view('panel/knowledge_base/edit_knowledge_base', $data);
	}

	function view_knowledge_base($id) {

		$viewKnowledgeBase = $this->db->where('id', $id);
		$viewKnowledgeBase = $this->db->get('knowledge_base')->row();

		$data['viewKnowledgeBase'] = $viewKnowledgeBase;

		$data['heder_title'] = 'View Knowledge Base';
		$this->load->view('panel/knowledge_base/view_knowledge_base', $data);
	}
    
   
}