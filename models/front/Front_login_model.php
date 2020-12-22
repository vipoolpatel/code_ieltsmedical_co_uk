<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Front_login_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function login($email) {
		$this->db->where('email', $email);
		return $this->db->get('customer')->row();
	}

}