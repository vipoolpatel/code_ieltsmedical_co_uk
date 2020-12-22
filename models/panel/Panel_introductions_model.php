<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_introductions_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countIntroductions() {
		$this->db->from('introductions');
		$this->db->join('user_accounts', 'user_accounts.user_id = introductions.admin_id');
		$this->db->join('customer', 'customer.id = introductions.customer_id');
		$this->db->join('trust', 'trust.id = introductions.trust_id');
		$this->db->join('introductions_status', 'introductions_status.id = introductions.status_id');
		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('introductions.id', $this->input->get('id'));
		}
		if ($this->input->get('status_id')) {
			$this->db->where('introductions.status_id', $this->input->get('status_id'));
		}
		if ($this->input->get('client_id')) {
			$this->db->where('introductions.customer_id', $this->input->get('client_id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('introductions.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('introductions.email', $this->input->get('email'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('introductions.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('introductions.created_date <=', $this->input->get('end_date'));
		}

		return $this->db->count_all_results();
		// Search Box End
	}

	function getIntroductions($limit = NULL, $offset = NULL) {

		$this->db->select('introductions.*,user_accounts.account_name,customer.username,trust.name_of_trust,trust.name as name_of_contact,trust.email as contact_of_email, trust.phone as contact_of_phone,introductions_status.status_name, introductions_profession.profession_name, introductions_profession_stage.profession_stage_name,country.country_name');
		$this->db->from('introductions');
		$this->db->join('user_accounts', 'user_accounts.user_id = introductions.admin_id');
		$this->db->join('customer', 'customer.id = introductions.customer_id');
		$this->db->join('trust', 'trust.id = introductions.trust_id');
		$this->db->join('introductions_status', 'introductions_status.id = introductions.status_id');

		$this->db->join('introductions_profession', 'introductions_profession.id = introductions.profession_id', 'left');
		$this->db->join('introductions_profession_stage', 'introductions_profession_stage.id = introductions.profession_stage_id', 'left');
		$this->db->join('country', 'country.id = introductions.country_id', 'left');

		$this->db->limit($limit, $offset);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('introductions.id', $this->input->get('id'));
		}
		if ($this->input->get('client_id')) {
			$this->db->where('introductions.customer_id', $this->input->get('client_id'));
		}

		if ($this->input->get('status_id')) {
			$this->db->where('introductions.status_id', $this->input->get('status_id'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('introductions.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('introductions.email', $this->input->get('email'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('introductions.created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('introductions.created_date <=', $this->input->get('end_date'));
		}
		//Search Box End

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function view_introductions($id) {

		$this->db->select('introductions.*,user_accounts.account_name,customer.username,trust.name_of_trust,trust.name as name_of_contact,trust.email as contact_of_email, trust.phone as contact_of_phone,introductions_status.status_name, introductions_profession.profession_name, introductions_profession_stage.profession_stage_name,country.country_name');
		$this->db->from('introductions');
		$this->db->join('user_accounts', 'user_accounts.user_id = introductions.admin_id');
		$this->db->join('customer', 'customer.id = introductions.customer_id');
		$this->db->join('trust', 'trust.id = introductions.trust_id');
		$this->db->join('introductions_status', 'introductions_status.id = introductions.status_id');
		$this->db->join('introductions_profession', 'introductions_profession.id = introductions.profession_id', 'left');
		$this->db->join('introductions_profession_stage', 'introductions_profession_stage.id = introductions.profession_stage_id', 'left');
		$this->db->join('country', 'country.id = introductions.country_id', 'left');
		$this->db->where('introductions.id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	function countTrust() {
		$this->db->from('trust');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('name_of_trust')) {
			$this->db->like('name_of_trust', $this->input->get('name_of_trust'));
		}
		if ($this->input->get('name')) {
			$this->db->like('name', $this->input->get('name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('email', $this->input->get('email'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('created_date <=', $this->input->get('end_date'));
		}
		return $this->db->count_all_results();
		// Search Box End
	}
	function getTrust($limit = NULL, $offset = NULL) {

		$this->db->select('*');
		$this->db->from('trust');

		$this->db->limit($limit, $offset);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('name_of_trust')) {
			$this->db->like('name_of_trust', $this->input->get('name_of_trust'));
		}
		if ($this->input->get('name')) {
			$this->db->like('name', $this->input->get('name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('email', $this->input->get('email'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('created_date <=', $this->input->get('end_date'));
		}
		//Search Box End

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getStatusIntroductions($status_id) {
		$this->db->where('introductions.status_id', $status_id);
		$this->db->join('user_accounts', 'user_accounts.user_id = introductions.admin_id');
		return $this->db->get('introductions')->num_rows();
	}

	function pdfIntroductionsInvoice($id) {

		$this->db->select('introductions.*,user_accounts.account_name,customer.username,trust.name_of_trust,trust.name as name_of_contact,trust.email as contact_of_email, trust.phone as contact_of_phone,introductions_status.status_name, introductions_profession.profession_name, introductions_profession_stage.profession_stage_name,country.country_name');
		$this->db->from('introductions');
		$this->db->join('user_accounts', 'user_accounts.user_id = introductions.admin_id');
		$this->db->join('customer', 'customer.id = introductions.customer_id');
		$this->db->join('trust', 'trust.id = introductions.trust_id');
		$this->db->join('introductions_status', 'introductions_status.id = introductions.status_id');
		$this->db->join('introductions_profession', 'introductions_profession.id = introductions.profession_id');
		$this->db->join('introductions_profession_stage', 'introductions_profession_stage.id = introductions.profession_stage_id');
		$this->db->join('country', 'country.id = introductions.country_id');
		
		$this->db->where('introductions.id', $id);
		$query = $this->db->get();
	
		return $query->row();
	}


	public function introductionjobpdf($id){

		$this->db->select('introductions_job.*,introductions.first_name');
		$this->db->from('introductions_job');
		$this->db->join('introductions', 'introductions.id = introductions_job.introduction_id');
		$this->db->where('introductions.id', $id);
		$query = $this->db->get();
		return $query->result();


	}

	

}
