
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('front/front_common_model', '', TRUE);
		$this->load->model('panel/panel_centercoursedates_model', '', TRUE);
	}

	public function about_us() {
		$getSlug = $this->front_common_model->getSlug('about-us');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/about/about_us', $data);
	}
	public function class_time() {
		$getSlug = $this->front_common_model->getSlug('class-times');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/class_time/class_time', $data);
	}
	public function alumni() {
		$getSlug = $this->front_common_model->getSlug('alumni');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/alumni/alumni', $data);
	}
	public function profile_sara() {
		$getSlug = $this->front_common_model->getSlug('ta-profile-sarah');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/profile_sara/profile_sara', $data);
	}
	public function uk_immigration() {
		$getSlug = $this->front_common_model->getSlug('uk-immigration');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/uk_immigration/uk_immigration', $data);
	}
	public function current_regulator_requirements() {
		$getSlug = $this->front_common_model->getSlug('current-regulator-requirements');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/current_regulator_requirements/current_regulator_requirements', $data);
	}
	public function star() {
		$getSlug = $this->front_common_model->getSlug('special-guest-stars');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/star/star', $data);
	}
	public function nhs_supplier() {
		$getSlug = $this->front_common_model->getSlug('nhs-approved-supplier');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/nhs_supplier/nhs_supplier', $data);
	}

	public function multi_national_hospitals_and_clinics() {
		$getSlug = $this->front_common_model->getSlug('multi-national-hospitals-and-clinics');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/page/multi_national_hospitals_and_clinics', $data);
	}

	public function nursing_career() {
		$getSlug = $this->front_common_model->getSlug('uk-nursing-careers-adviser-nurse-maria');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/nursing_career/nursing_career', $data);
	}
	public function english_department() {
		$getSlug = $this->front_common_model->getSlug('english-department-ielts-and-oet');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/english_department/english_department', $data);
	}
	public function our_result() {
		$getSlug = $this->front_common_model->getSlug('results');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/our_result/our_result', $data);
	}

	public function students_discount() {
		$getSlug = $this->front_common_model->getSlug('students-discount');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/students_discount/students_discount', $data);
	}

	public function private_exams() {
		$getSlug = $this->front_common_model->getSlug('closed-examinations');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/private_exams/private_exams', $data);
	}
	public function far() {
		$getSlug = $this->front_common_model->getSlug('our-story');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/far/far', $data);
	}

	public function online_courses() {
		$getSlug = $this->front_common_model->getSlug('online-courses');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

		$getBook = $this->db->select('book.*');
		$getBook = $this->db->where('book_video_type', 'Video');
		$getBook = $this->db->from('book');
		if ($this->input->get('type')) {
			$getBook = $this->db->join('book_type', 'book_type.book_id = book.id');
			$getBook = $this->db->where('book_type.type', $this->input->get('type'));
		}
		$getBook = $this->db->group_by('book.id');
		$getBook = $this->db->get()->result();
		$data['getBook'] = $getBook;

		$this->load->view('front/online_courses/online_courses', $data);
	}

	public function live_courses() {
		$getSlug = $this->front_common_model->getSlug('live-courses');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

		$data['gatDate'] = $this->front_common_model->fetch_live_course_exam();

		$setting = $this->db->where('id', '1');
		$setting = $this->db->get('setting')->row();

		$data['setting'] = $setting;

		$this->load->view('front/live_courses/live_courses', $data);
	}

	public function apps() {

		$getSlug = $this->front_common_model->getSlug('apple-ios-and-google-play-android-apps');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

		$getApps = $this->db->where('user_status', '1');
		$getApps = $this->db->get('apps')->result();
		$data['getApps'] = $getApps;

		$this->load->view('front/apps/apps', $data);
	}
	public function location() {
		$getSlug = $this->front_common_model->getSlug('locations');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/location/location', $data);
	}

	// blog section
	public function news() {

		$this->load->library('pagination');

		$getSlug = $this->front_common_model->getSlug('news');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

		$total = $this->front_common_model->countBlog();
		$per_page = 12;
		$data['getBlog'] = $this->front_common_model->getBlog($per_page, $this->uri->segment(2));
		$base_url = base_url() . 'news/';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '2';
		$this->pagination->initialize($config);

		$this->load->view('front/news/news', $data);
	}

	public function single_blog($slug) {
		$getBlog = $this->db->where('slug', $slug);
		$getBlog = $this->db->get('blog')->row();

		if (!empty($getBlog)) {
			$data['getBlog'] = $getBlog;
			$data['meta_title'] = !empty($getBlog->title) ? $getBlog->title : '';
			$data['meta_description'] = !empty($getBlog->meta_description) ? $getBlog->meta_description : '';
			$this->load->view('front/news/single_blog', $data);
		} else {
			redirect('news');
		}

	}

	// end blog section

	public function accommodation() {
		$getSlug = $this->front_common_model->getSlug('accommodation');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/accommodation/accommodation', $data);
	}

// book part
	public function books() {
		$getSlug = $this->front_common_model->getSlug('books-and-ebooks');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

		$getBook = $this->db->select('book.*');
		$getBook = $this->db->from('book');
		if (!empty($this->input->get('type')) && $this->input->get('type') == 'License Key') {
			$getBook = $this->db->where('book_video_type', 'License Key');
		} else {
			$getBook = $this->db->where('book_video_type', 'Book');
		}

		if ($this->input->get('type')) {
			if ($this->input->get('type') != 'License Key') {
				$getBook = $this->db->join('book_type', 'book_type.book_id = book.id');
				$getBook = $this->db->where('book_type.type', $this->input->get('type'));
			}
		}

		$getBook = $this->db->group_by('book.id');
		$getBook = $this->db->get()->result();
		$data['getBook'] = $getBook;
		$this->load->view('front/books/books', $data);
	}

	public function cart() {
		$getSlug = $this->front_common_model->getSlug('cart');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/books/cart', $data);
	}

	public function checkout() {
		if (!empty($this->cart->total())) {
			$getSlug = $this->front_common_model->getSlug('checkout');
			$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
			$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

			$country = $this->db->order_by('order_no', 'asc');
			$country = $this->db->get('country')->result();
			$data['country'] = $country;
			$this->load->view('front/books/checkout', $data);
		} else {
			redirect('services-category/books-and-ebooks');
		}

	}

	public function book_license_key($id) {
		if (!empty($id)) {
			$getSlug = $this->front_common_model->getSlug('book-license-key');
			$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
			$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';

			$country = $this->db->order_by('order_no', 'asc');
			$country = $this->db->get('country')->result();
			$data['country'] = $country;

			$book = $this->db->where('id', $id);
			$book = $this->db->get('book')->row();
			$data['book'] = $book;
			$data['license_key_id'] = $id;

			$this->load->view('front/books/book_license_key', $data);
		} else {
			redirect('services-category/books-and-ebooks');
		}

	}

// end book part

	public function contact_us() {
		$getSlug = $this->front_common_model->getSlug('contact-form');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/contact_us/contact_us', $data);
	}

	public function general_terms_and_conditions() {

		$data['meta_title'] = 'General Terms and Conditions - IELTS Medical London - call today - 0203 637 6722';

		$this->load->view('front/privacy_policy/general_terms_and_conditions', $data);
	}

	public function privacy_policy() {
		$getSlug = $this->front_common_model->getSlug('privacy-policy');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/privacy_policy/privacy_policy', $data);
	}

	public function terms_conditions() {
		$getSlug = $this->front_common_model->getSlug('terms-conditions');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/terms_conditions/terms_conditions', $data);
	}

	public function nmc_osce_pass_guarantee_terms_conditions() {
		$getSlug = $this->front_common_model->getSlug('nmc-osce-pass-guarantee-terms-conditions');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/terms_conditions/nmc_osce_pass_guarantee_terms_conditions', $data);
	}

	public function ielts_medial_competition_terms_and_conditions() {
		$getSlug = $this->front_common_model->getSlug('ielts-medial-competition-terms-and-conditions');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/terms_conditions/ielts_medial_competition_terms_and_conditions', $data);
	}

	public function returns_policy_media_goods() {
		$getSlug = $this->front_common_model->getSlug('returns-policy-media-goods');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/terms_conditions/returns_policy_media_goods', $data);
	}

	public function careers() {
		$getSlug = $this->front_common_model->getSlug('careers');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/careers/careers', $data);
	}

	public function dates() {
		$getSlug = $this->front_common_model->getSlug('centre-course-dates');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$data['getDate'] = $this->panel_centercoursedates_model->getCourseDate();
		$this->load->view('front/dates/dates', $data);
	}

	public function centre_course_book() {
		$id = base64_decode($this->input->get('id'));
		$getdata = $this->db->where('id', $id);
		$getdata = $this->db->get('centre_course_dates')->row();
		if (!empty($getdata)) {
			$data['getdata'] = $getdata;
			$data['meta_title'] = !empty($getdata->course) ? $getdata->course : '';

			$getlocation = $this->db->where('type', $getdata->type);
			$getlocation = $this->db->get('location')->result();
			$data['getlocation'] = $getlocation;
			$getExamType = $this->db->get('exam_type')->result();
			$data['getExamType'] = $getExamType;
			$this->load->view('front/dates/book', $data);
		} else {
			redirect('centre-course-dates');
		}

	}

	public function i_am_a_doctor() {
		$getSlug = $this->front_common_model->getSlug('i-am-a-doctor');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/i_am_a_doctor/i_am_a_doctor', $data);
	}

	public function i_am_a_nurse() {
		$getSlug = $this->front_common_model->getSlug('i-am-a-nurse');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/i_am_a_nurse/i_am_a_nurse', $data);
	}

	public function i_am_an_ahp() {
		$getSlug = $this->front_common_model->getSlug('i-am-an-ahp');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/i_am_an_ahp/i_am_an_ahp', $data);
	}

	// course part start

	public function courses($id) {

		$course_main = $this->db->where('id', $id);
		$course_main = $this->db->get('course_main')->row();
		if (!empty($course_main)) {

			$course = $this->db->where('start_date >=', date('Y-m-d'));
			$course = $this->db->where('course_main_id', $course_main->id);
			$course = $this->db->order_by('start_date');
			$course = $this->db->get('course')->result();
			$data['course'] = $course;

			$data['meta_title'] = !empty($course_main->course_main) ? $course_main->course_main . ' - IELTS Medical London - call today - 0203 637 6722' : '';
			$data['meta_description'] = !empty($course_main->meta_description) ? $course_main->meta_description : '';
			$data['course_main'] = $course_main;
			$this->load->view('front/courses/courses', $data);

		} else {
			redirect(base_url());
		}

	}

	public function courses_flex($id) {

		$flex_course = $this->db->where('id', $id);
		$flex_course = $this->db->get('flex_course')->row();
		if (!empty($flex_course)) {

			$flex_course_session = $this->db->where('flex_course_id', $id);
			$flex_course_session = $this->db->get('flex_course_session')->result();

			$flex_course_skill = $this->db->where('flex_course_id', $id);
			$flex_course_skill = $this->db->get('flex_course_skill')->result();

			$data['flex_course_skill'] = $flex_course_skill;

			$data['flex_course_session'] = $flex_course_session;

			$setting = $this->db->where('id', '1');
			$setting = $this->db->get('setting')->row();

			$data['setting'] = $setting;
			$data['meta_title'] = $flex_course->meta_title;
			$data['meta_description'] = $flex_course->meta_description;
			$data['flex_course'] = $flex_course;
			$this->load->view('front/courses/courses_flex', $data);

		} else {
			redirect(base_url());
		}

	}

	// course part End

	// Melissa page start
	public function melissa() {
		$getSlug = $this->front_common_model->getSlug('melissa');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/melissa/melissa', $data);
	}
	//Melissa page end

	// Melissa page start
	public function christina() {
		$getSlug = $this->front_common_model->getSlug('christina');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/christina/christina', $data);
	}
	//Melissa page end

// Medical and Nursing Education Team Start
	public function lead_nmc_cbt_trainer_nurse_maria() {
		$getSlug = $this->front_common_model->getSlug('lead-nmc-cbt-trainer-nurse-ines');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/profile/lead_nmc_cbt_trainer_nurse_ines', $data);
	}
	public function nmc_osce_trainer_claire() {
		$getSlug = $this->front_common_model->getSlug('nmc-osce-trainer-claire');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/profile/nmc_osce_trainer_claire', $data);
	}

	public function lead_paediatrics_trainer_brodie() {
		$getSlug = $this->front_common_model->getSlug('lead-paediatrics-trainer-brodie');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/profile/lead_paediatrics_trainer_brodie', $data);
	}

	public function uk_nursing_careers_adviser_nurse_maria() {
		$getSlug = $this->front_common_model->getSlug('uk-nursing-careers-adviser-nurse-maria');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/profile/uk_nursing_careers_adviser_nurse_maria', $data);
	}

	// jobs part Start
	public function nursing_jobs() {
		$getSlug = $this->front_common_model->getSlug('nursing-jobs');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/job/nursing_jobs', $data);
	}

	public function medical_jobs() {
		$getSlug = $this->front_common_model->getSlug('medical-jobs');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/job/medical_jobs', $data);
	}

	public function teaching_assistant_jobs() {
		$getSlug = $this->front_common_model->getSlug('teaching-assistant-jobs');
		$data['meta_title'] = !empty($getSlug->title) ? $getSlug->title : '';
		$data['meta_description'] = !empty($getSlug->meta_description) ? $getSlug->meta_description : '';
		$this->load->view('front/job/teaching_assistant_jobs', $data);
	}

	// end jobs part

	public function lead_childerns_nursing_trainer_dee() {
		$data['meta_title'] = 'Lead Childerns Nursing Trainer - Dee';
		$this->load->view('front/profile/lead_childerns_nursing_trainer_denise', $data);
	}

	public function lead_midwifery_trainer_natalija() {
		$data['meta_title'] = 'Lead Midwifery Trainer - Natalija';
		$this->load->view('front/profile/lead_midwifery_trainer_natalija', $data);
	}

	public function lead_mental_health_osce_trainer_gemma() {
		$data['meta_title'] = 'Lead Mental Health OSCE Trainer Gemma - IELTS Medical London - call today - 0203 637 6722';
		$this->load->view('front/profile/lead_mental_health_osce_trainer_gemma', $data);
	}

	// Medical and Nursing Education Team End
	public function book_detail($slug = '') {
		$getDetail = $this->db->where('slug', $slug);
		$getDetail = $this->db->get('book')->row();
		if (!empty($getDetail)) {
			$data['getDetail'] = $getDetail;

			$data['meta_title'] = !empty($getDetail->name) ? $getDetail->name : '';
			$data['meta_description'] = !empty($getDetail->meta_description) ? $getDetail->meta_description : '';

			$this->load->view('front/books/detail', $data);
		} else {
			redirect(base_url());
		}
	}

}

?>
