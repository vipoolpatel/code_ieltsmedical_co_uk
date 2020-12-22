<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coursedate extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_course_date_model', '', TRUE );
        
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/course_date/course_date_list' );        
    }
    

    function course_date_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_course_date_model->countCoursedate();
        $per_page = 40;
        $data['getCoursedate'] = $this->panel_course_date_model->getCoursedate($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/course_date/course_date_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );

        $data['course_datlocation'] = $this->db->get('location')->result();
        $data['course_datetime'] = $this->db->get('course')->result();
        $data['course_date'] = $this->db->get('course_main')->result();

        $data['heder_title'] = 'Course Date List';
        $this->load->view('panel/course_date/course_date_list',$data);        
    }
    
   
        
      function edit_course_date($id) {      
         if(!empty($_POST))
         {
                $array = array(
                    'course_main_id' => $this->input->post('course_main_id'),
                    'course_id' => $this->input->post('course_id'),
                    'location_id' => $this->input->post('location_id'),
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date'),
                    'time' => $this->input->post('time'),
                    'decription' => $this->input->post('decription'),                 
                );

                $this->db->where('id',$this->input->post('id'));
                $this->db->update('course_date',$array);
                
                $this->session->set_flashdata('SUCCESS', 'Course Date Updated Successfully');
                redirect('panel/coursedate/course_date_list');
         } 
                 
         
        $apps = $this->db->where('id',$id);
        $apps = $this->db->get('course_date')->row();

        $data['course_datlocation'] = $this->db->get('location')->result();
        $data['course_datetime'] = $this->db->get('course')->result();
        $data['course_date'] = $this->db->get('course_main')->result();
    

        $data['apps'] = $apps;
        $data['heder_title'] = 'Edit Course Date';
        $this->load->view('panel/course_date/edit_course_date',$data);        
    }
    
        function add_course_date() {
        if (!empty($_POST)) {
            

            $array = array(

                'course_main_id' => $this->input->post('course_main_id'),
                'course_id' => $this->input->post('course_id'),
                'location_id' => $this->input->post('location_id'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'time' => $this->input->post('time'),
                'decription' => $this->input->post('decription'),
                'created_date' => date('Y-m-d H:i:s'),
            );

            $this->db->insert('course_date', $array);
            $this->session->set_flashdata('SUCCESS', 'Course Date Created Successfully');
            redirect('panel/coursedate/course_date_list');

        }

        $data['course_datlocation'] = $this->db->get('location')->result();
        $data['course_datetime'] = $this->db->get('course')->result();
        $data['course_date'] = $this->db->get('course_main')->result();
    

        $data['heder_title'] = 'Add Course Date';
        $this->load->view('panel/course_date/add_course_date', $data);
    }


     function delete_course_date($id) {      
       
        $this->db->where('id',$id);
        $this->db->delete('course_date');
     
        $this->session->set_flashdata('SUCCESS', 'Course Date Deleted Successfully');
        redirect('panel/coursedate/course_date_list');
    }

       

    
}
