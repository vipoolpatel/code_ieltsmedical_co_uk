<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
 */
// $route['default_controller'] = 'panel/login';
$route['default_controller'] = 'home';

$route['about-us'] = 'page/about_us';
$route['about/class-times'] = 'page/class_time';
$route['about-us/alumni'] = 'page/alumni';
$route['about/ta-profile-sarah'] = 'page/profile_sara';
$route['about-us/uk-immigration'] = 'page/uk_immigration';
$route['about-us/current-regulator-requirements'] = 'page/current_regulator_requirements';
$route['about/special-guest-stars'] = 'page/star';
$route['about-us/nhs-approved-supplier'] = 'page/nhs_supplier';
$route['about-us/multi-national-hospitals-and-clinics'] = 'page/multi_national_hospitals_and_clinics';

// jobs
$route['about/nursing-jobs'] = 'page/nursing_jobs';
$route['about/medical-jobs'] = 'page/medical_jobs';
$route['about/teaching-assistant-jobs'] = 'page/teaching_assistant_jobs';

//end jobs

// $route['about-us/uk-nursing-careers-adviser-nurse-maria'] = 'page/nursing_career';
$route['about-us/english-department-ielts-and-oet'] = 'page/english_department';
$route['about/results'] = 'page/our_result';
$route['about/student-discounts'] = 'page/students_discount';
$route['about/closed-examinations'] = 'page/private_exams';
$route['about/our-story'] = 'page/far';

// Medical and Nursing Education Team Start
$route['about-us/lead-nmc-cbt-trainer-nurse-maria'] = 'page/lead_nmc_cbt_trainer_nurse_maria';

$route['about-us/melissa'] = 'page/melissa';
$route['about-us/christina'] = 'page/christina';

$route['about-us/nmc-osce-trainer-rhiannon'] = 'page/nmc_osce_trainer_claire';
$route['about-us/lead-paediatrics-trainer-brodie'] = 'page/lead_paediatrics_trainer_brodie';

// $route['about-us/lead-children-nursing-trainer-dee'] = 'page/lead_childerns_nursing_trainer_dee';
// $route['about-us/lead-midwifery-trainer-natalija'] = 'page/lead_midwifery_trainer_natalija';

$route['about-us/lead-mental-health-osce-trainer-gemma'] = 'page/lead_mental_health_osce_trainer_gemma';

// $route['about-us/uk-nursing-careers-adviser-nurse-maria'] = 'page/uk_nursing_careers_adviser_nurse_maria';
// Medical and Nursing Education Team End

// couse part
$route['ielts'] = 'page/courses/1';
$route['oet-for-nurses'] = 'page/courses/2';
$route['oet-for-doctors'] = 'page/courses/3';
$route['nmc-osce-for-nurses'] = 'page/courses/4';

$route['nmc-osce-for-midwives'] = 'page/courses/5';
$route['nmc-osce-for-paediatrics'] = 'page/courses/6';
$route['nmc-osce-for-mental-health'] = 'page/courses/7';
$route['nmc-cbt-for-nurses'] = 'page/courses/8';
$route['nmc-cbt-for-midwives'] = 'page/courses/10';
$route['gmc-plab-for-doctors'] = 'page/courses/9';

// end couse part

// couse part start

$route['oet-flex'] = 'page/courses_flex/1';
$route['cbt-flex'] = 'page/courses_flex/2';
$route['osce-flex'] = 'page/courses_flex/3';
$route['ielts-flex'] = 'page/courses_flex/4';
// couse part End

$route['services-category/online-courses'] = 'page/online_courses';
$route['services-category/online-live-courses'] = 'page/live_courses';
$route['about-us/apple-ios-and-google-play-android-apps'] = 'page/apps';

$route['locations'] = 'page/location';

$route['i-am-a-doctor'] = 'page/i_am_a_doctor';

$route['i-am-a-nurse'] = 'page/i_am_a_nurse';

$route['i-am-an-ahp'] = 'page/i_am_an_ahp';

$route['news'] = 'page/news';
$route['news/(:any)'] = 'page/news';
$route['locations/accommodation'] = 'page/accommodation';
$route['centre-course-dates'] = 'page/dates';

$route['services-category/books-and-ebooks'] = 'page/books';

$route['shop/(:any)'] = 'page/book_detail/$1';

$route['cart'] = 'page/cart';
$route['checkout'] = 'page/checkout';

$route['book-license-key/(:any)'] = 'page/book_license_key/$1';

$route['contact-form'] = 'page/contact_us';

$route['my-account'] = 'login/login';

$route['about/terms-and-conditions'] = 'page/general_terms_and_conditions';
$route['about/terms-and-conditions/privacy-policy'] = 'page/privacy_policy';
$route['about/terms-and-conditions/terms-and-conditions-affiliates'] = 'page/terms_conditions';

$route['about/terms-and-conditions/nmc-osce-pass-guarantee-terms-conditions'] = 'page/nmc_osce_pass_guarantee_terms_conditions';
$route['about/terms-and-conditions/ielts-medical-competition-terms-and-conditions'] = 'page/ielts_medial_competition_terms_and_conditions';

$route['about/terms-and-conditions/returns-policy-media-goods'] = 'page/returns_policy_media_goods';

$route['careers'] = 'page/careers';
$route['centre-course-dates/book'] = 'page/centre_course_book';

// login after route

$route['user/dashboard'] = 'user/index';
$route['user/book-order'] = 'user/book_order';
$route['user/center-course-dates'] = 'user/center_course_dates';
$route['user/profile'] = 'user/profile';
$route['user/logout'] = 'login/logout';

$route['panel'] = 'panel/login';
$route['404_override'] = 'home/redirect';
$route['translate_uri_dashes'] = FALSE;

$route['(:any)'] = 'page/single_blog/$1';