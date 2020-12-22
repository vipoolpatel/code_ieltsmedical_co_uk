<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Panel_calendar_book_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function countCalendarBook() {
		$this->db->from('calendar_booking');

		$this->db->join('calender', 'calender.id = calendar_booking.calendar_id', 'left');

		if ($this->input->get('id')) {
			$this->db->where('calendar_booking.id', $this->input->get('id'));
		}
		if ($this->input->get('main_title')) {
			$this->db->like('calender.main_title', $this->input->get('main_title'));
		}
		// if ($this->input->get('first_name')) {
		// 	$this->db->like('calendar_booking.first_name', $this->input->get('first_name'));
		// }
		if ($this->input->get('email')) {
			$this->db->like('email', $this->input->get('email'));
		}
		 if ($this->input->get('start_date')) {
            $this->db->where('created_at >=', $this->input->get('start_date'));
        }
        if ($this->input->get('end_date')) {
            $this->db->where('created_at <=', $this->input->get('end_date'));
        }
		

		return $this->db->count_all_results();

	}

	function getCalendarBook($limit = NULL, $offset = NULL) {
		$this->db->select('calendar_booking.*,calender.main_title');
		$this->db->from('calendar_booking');
		$this->db->join('calender', 'calender.id = calendar_booking.calendar_id', 'left');
		$this->db->limit($limit, $offset);
		// Search Box Start
		
		if ($this->input->get('id')) {
			$this->db->where('calendar_booking.id', $this->input->get('id'));
		}

		if ($this->input->get('main_title')) {
			$this->db->like('calender.main_title', $this->input->get('main_title'));
		}
		if ($this->input->get('first_name')) {
			$this->db->like('calendar_booking.first_name', $this->input->get('first_name'));
		}
		if ($this->input->get('email')) {
			$this->db->like('email', $this->input->get('email'));
		}
		 if ($this->input->get('start_date')) {
            $this->db->where('created_at >=', $this->input->get('start_date'));
        }
        if ($this->input->get('end_date')) {
            $this->db->where('created_at <=', $this->input->get('end_date'));
        }
		// Search Box End
		
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	

}
