<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_blog_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countBlog() {
		$this->db->from('blog');

		 $this->db->join('user_accounts','user_accounts.user_id = blog.author_user_id');

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('account_name')) {
			$this->db->like('blog.title', $this->input->get('account_name'));
		}
		if ($this->input->get('start_date')) {
			$this->db->where('created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('created_date <=', $this->input->get('end_date'));
		}
		if ($this->input->get('author_user_id')) {
			$this->db->like('blog.author_user_id', $this->input->get('author_user_id'));
		}


		return $this->db->count_all_results();
		// Search Box End
	}

	function getBlog($limit = NULL, $offset = NULL) {
		$this->db->select('blog.*,user_accounts.account_name');
		$this->db->from('blog');
		$this->db->join('user_accounts','user_accounts.user_id = blog.author_user_id');
		$this->db->limit($limit, $offset);

		// Search Box Start
		if ($this->input->get('id')) {
			$this->db->where('id', $this->input->get('id'));
		}
		if ($this->input->get('account_name')) {
			$this->db->like('blog.title', $this->input->get('account_name'));
		}

		if ($this->input->get('start_date')) {
			$this->db->where('created_date >=', $this->input->get('start_date'));
		}
		if ($this->input->get('end_date')) {
			$this->db->where('created_date <=', $this->input->get('end_date'));
		}
		if ($this->input->get('author_user_id')) {
			$this->db->like('blog.author_user_id', $this->input->get('author_user_id'));
		}

		//Search Box End

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}