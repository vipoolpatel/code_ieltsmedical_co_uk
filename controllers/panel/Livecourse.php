<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Livecourse extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_live_course_model', '', TRUE );
        
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/live_course/live_course_booking_list' );        
    }
    

    function live_course_booking_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_live_course_model->countLiveCourse();
        $per_page = 100;
        $data['getCourse'] = $this->panel_live_course_model->getLiveCourse($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/live_course/live_course_booking_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );

      
        $data['course_datetime'] = $this->db->get('customer')->result();
      

        $data['heder_title'] = 'Live Course Booking List';
        $this->load->view('panel/live_course/live_course_booking_list',$data);        
    }
    
   
  

     function delete_live_course_booking($id) {      
       
        $this->db->where('id',$id);
        $this->db->delete('live_courses');
     
        $this->session->set_flashdata('SUCCESS', 'Live Course Booking Deleted Successfully');
        redirect('panel/livecourse/live_course_booking_list');
    }

       

    
}
