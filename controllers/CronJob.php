<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class CronJob extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('front/front_common_model', '', TRUE);
	}

	public function introductions() {
		$date = date('Y-m-d', strtotime("-5 days"));

		$this->db->select('introductions.*,user_accounts.account_name,user_accounts.email as admin_email,customer.username,trust.name_of_trust,trust.name as name_of_contact,trust.email as contact_of_email, trust.phone as contact_of_phone,introductions_status.status_name, introductions_profession.profession_name, introductions_profession_stage.profession_stage_name,country.country_name');
		$this->db->from('introductions');
		$this->db->join('user_accounts', 'user_accounts.user_id = introductions.admin_id');
		$this->db->join('customer', 'customer.id = introductions.customer_id');
		$this->db->join('trust', 'trust.id = introductions.trust_id');
		$this->db->join('introductions_status', 'introductions_status.id = introductions.status_id');
		$this->db->join('introductions_profession', 'introductions_profession.id = introductions.profession_id', 'left');
		$this->db->join('introductions_profession_stage', 'introductions_profession_stage.id = introductions.profession_stage_id', 'left');
		$this->db->join('country', 'country.id = introductions.country_id', 'left');
		$this->db->where('DATE_FORMAT(introductions.created_date,"%Y-%m-%d")', $date);
		$query = $this->db->get()->result();
		foreach ($query as $value) {

			$name_of_trust = $value->name_of_trust;
			$first_name = $value->first_name;
			$admin_emaiil = $value->admin_email;
			$gender = $value->gender;

			$data['role1_job_title'] = $value->role1_job_title;
			$data['role1_start_date'] = $value->role1_start_date;
			$data['role1_end_date'] = $value->role1_end_date;
			$data['role1_description'] = $value->role1_description;

			$data['role2_job_title'] = $value->role2_job_title;
			$data['role2_start_date'] = $value->role2_start_date;
			$data['role2_end_date'] = $value->role2_end_date;
			$data['role2_description'] = $value->role2_description;

			$data['role3_job_title'] = $value->role3_job_title;
			$data['role3_start_date'] = $value->role3_start_date;
			$data['role3_end_date'] = $value->role3_end_date;
			$data['role3_description'] = $value->role3_description;

			$data['role1_name_of_employer'] = $value->role1_name_of_employer;
			$data['role2_name_of_employer'] = $value->role2_name_of_employer;
			$data['role3_name_of_employer'] = $value->role3_name_of_employer;

			if ($value->status_id == '1') {

				$data['article'] = $first_name . ' has expressed interest in working for ' . $name_of_trust;
				$article_trust = '';
				$article_trust .= $first_name . ' has expressed interest in working for ' . $name_of_trust;
				$article_trust .= "
					<p>" . $gender . " profile is below.</p>
					<p>Please let us know if you are interested in progressing with this healthcare professional's application. If we have not heard back from you within 5 working days, we shall presume that you are not interested in this application.</p>";

				$data['article_trust'] = $article_trust;

			} else if ($value->status_id == '2') {
				$data['article'] = $first_name . ' has been introduced to ' . $name_of_trust;
			} else if ($value->status_id == '3') {
				$data['article'] = $first_name . ' has been hired by ' . $name_of_trust;
			} else {
				$data['article'] = "We thought you should know that " . $name_of_trust . " has decided not to proceed.
				<br />
				We're sorry it didn't work out. We'd like to have a chat with you about your next steps. Please let us know when would be a convenient time.";
			}

			$htmlMessage_trust = $this->load->view('mail/introductions_trust', $data, true);
			$subject_admin = 'Trust ' . $name_of_trust . ' has not responded';
			$this->front_common_model->sendEmail($admin_emaiil, $subject_admin, $htmlMessage_trust);

		}
	}

	public function Center_Course_Dates_Booked_Exam() {
		$date = date('Y-m-d', strtotime("-1 days"));

		$this->db->select('centre_course_dates.course,centre_course_dates.venue,location.location,centre_course_dates.start_date,centre_course_dates.end_date,centre_course_dates.location_type');
		$this->db->from('centre_course_date_book');
		$this->db->join('centre_course_dates', 'centre_course_dates.id = centre_course_date_book.centre_course_id');
		$this->db->join('location', 'location.id = centre_course_date_book.location_id', 'left');
		$this->db->where('centre_course_date_book.payment', 1);
		$this->db->where('centre_course_dates.end_date >=', $date);
		$this->db->group_by('centre_course_dates.end_date');
		$query = $this->db->get();
		$getdata = $query->result();

		foreach ($getdata as $key => $value) {

			if ($value->start_date <= date('Y-m-d')) {
				$start_date = date('d-m-Y', strtotime($value->start_date));
				$end_date = date('d-m-Y', strtotime($value->end_date));

				$htmlMessage = '<p>
    	    	Hi Admin
    	    	<br />
    	    	This is an alert about the following exam whose closing date is on (date):  <br />

Exam date: ' . $start_date . ' <br />
Registration closing date: ' . $end_date . ' <br />
There are registrations for this exam: <a href="' . base_url() . 'panel">Login</a>

    	    	</p>';
				$this->front_common_model->sendEmail('hello@ieltsmedical.co.uk', 'Course and Exam Dates Notification - IELTS Medical', $htmlMessage);
			}
		}
	}

}

?>