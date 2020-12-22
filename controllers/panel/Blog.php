<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Blog extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_blog_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/blog/blog_list');
	}

	function blog_list() {

		$this->load->library('pagination');

		$total = $this->panel_blog_model->countBlog();
		$per_page = 40;
		$data['getBlog'] = $this->panel_blog_model->getBlog($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/blog/blog_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);
		$data['course_date'] = $this->db->get('user_accounts')->result();
		$data['heder_title'] = 'Blog List';
		$this->load->view('panel/blog/blog_list', $data);
	}
	function delete_blog($id) {
		$this->db->where('id', $id);
		$this->db->delete('blog');

		$this->session->set_flashdata('SUCCESS', 'Blog Deleted Successfully');
		redirect('panel/blog/blog_list');
	}

	function add_blog() {
		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$photo_image = $_FILES["photo_image"]["name"];
				$array_name = explode(".", $photo_image);
				$ext = end($array_name);

				$photo_image = date('ymdhis') . '.' . $ext;
				$folder = "img/blog/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
			} else {
				$photo_image = '';
			}

			$array = array(
				'author_user_id' => $this->input->post('author_user_id'),
				'title' => $this->input->post('title'),
				'slug' => $this->input->post('slug'),
				'description' => $this->input->post('description'),
				'meta_description' => $this->input->post('meta_description'),
				'user_status' => $this->input->post('user_status'),
				'photo_image' => $photo_image,
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('blog', $array);
			$this->session->set_flashdata('SUCCESS', 'Blog Created Successfully');
			redirect('panel/blog/blog_list');

		}

		$data['course_date'] = $this->db->get('user_accounts')->result();

		$data['heder_title'] = 'Add Blog';
		$this->load->view('panel/blog/add_blog', $data);
	}

	function edit_blog($id) {

		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$name = $_FILES["photo_image"]["name"];
				$array_name = explode(".", $name);
				$ext = end($array_name);
				$photo_image = date('ymdhis') . '.' . $ext;
				$folder = "img/blog/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
				//  move_uploaded_file($_FILES["image_upload"]["tmp_name"], $folder . $_FILES["image_upload"]["name"]);
			} else {
				$photo_image = $this->input->post('old_imagename');
			}

			$array = array(
				'author_user_id' => $this->input->post('author_user_id'),
				'title' => $this->input->post('title'),
				'slug' => $this->input->post('slug'),
				'description' => $this->input->post('description'),
				'meta_description' => $this->input->post('meta_description'),
				'user_status' => $this->input->post('user_status'),
				'photo_image' => $photo_image,

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('blog', $array);

			$this->session->set_flashdata('SUCCESS', 'Blog Updated Successfully');
			redirect('panel/blog/blog_list');
		}

		$apps = $this->db->where('id', $id);
		$apps = $this->db->get('blog')->row();
		$data['course_date'] = $this->db->get('user_accounts')->result();
		$data['apps'] = $apps;
		$data['heder_title'] = 'Edit Blog';
		$this->load->view('panel/blog/edit_blog', $data);
	}

}
