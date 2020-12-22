<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Emailsubscribe extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_emailsubscribe_model', '', TRUE);

	}

	function index() {
		redirect($this->config->item('panel_folder') . '/emailsubscribe/email_subscribe_list');
	}

	function email_subscribe_list() {

		$this->load->library('pagination');

		$total = $this->panel_emailsubscribe_model->countEmailsubscribe();
		$per_page = 40;
		$data['getEmailsubscribe'] = $this->panel_emailsubscribe_model->getEmailsubscribe($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/emailsubscribe/email_subscribe_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Email Subscribe List';
		$this->load->view('panel/emailsubscribe/email_subscribe_list', $data);
	}
	function delete_emailsubscribe($id) {
		$this->db->where('id', $id);
		$this->db->delete('email_subscribe');

		$this->session->set_flashdata('SUCCESS', 'Email Subscribe Deleted Successfully');
		redirect('panel/emailsubscribe/email_subscribe_list');
	}



      function export_excel()
    {

        $this->load->library('excel');
        require_once './application/third_party/PHPExcel.php';
        require_once './application/third_party/PHPExcel/IOFactory.php';

        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        $default_border = array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array('rgb' => '000000'),
        );

        $acc_default_border = array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array('rgb' => 'c7c7c7'),
        );
        $outlet_style_header = array(
          'font' => array(
            'color' => array('rgb' => '000000'),
            'size' => 10,
            'name' => 'Arial',
            'bold' => true,
          ),
        );
        $top_header_style = array(
          'borders' => array(
            'bottom' => $default_border,
            'left' => $default_border,
            'top' => $default_border,
            'right' => $default_border,
          ),
          'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'ffff03'),
          ),
          'font' => array(
            'color' => array('rgb' => '000000'),
            'size' => 15,
            'name' => 'Arial',
            'bold' => true,
          ),
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          ),
        );
        $style_header = array(
          'borders' => array(
            'bottom' => $default_border,
            'left' => $default_border,
            'top' => $default_border,
            'right' => $default_border,
          ),
          'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'ffff03'),
          ),
          'font' => array(
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Arial',
            'bold' => true,
          ),
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          ),
        );
        $account_value_style_header = array(
          'borders' => array(
            'bottom' => $default_border,
            'left' => $default_border,
            'top' => $default_border,
            'right' => $default_border,
          ),
          'font' => array(
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Arial',
          ),
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
          ),
        );
        $text_align_style = array(
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          ),
          'borders' => array(
            'bottom' => $default_border,
            'left' => $default_border,
            'top' => $default_border,
            'right' => $default_border,
          ),
          'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'ffff03'),
          ),
          'font' => array(
            'color' => array('rgb' => '000000'),
            'size' => 12,
            'name' => 'Arial',
            'bold' => true,
          ),
        );

        $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:C1');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Subscribe Email List');

        $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($top_header_style);
        $objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($top_header_style);
        $objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($top_header_style);
     

        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'ID');
        $objPHPExcel->getActiveSheet()->setCellValue('B2', 'Email');
        $objPHPExcel->getActiveSheet()->setCellValue('C2', 'Created Date');
       

        $objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($style_header);
        $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($style_header);
        $objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($style_header);
      

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
       
        $row = 3;
        $custDtaData  = $this->db->get('email_subscribe')->result();
        foreach ($custDtaData as $value)
        {
          $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $value->id);
          $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $value->email);
          $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $value->created_date);
          $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Subscribe_Email_Report.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

    }


}
