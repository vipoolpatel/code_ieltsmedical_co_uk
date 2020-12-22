<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Book extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_logged_in')) {
			redirect($this->config->item('panel_folder') . '/login');
			exit();
		}

		$this->load->model('panel/panel_book_model', '', TRUE);
		$this->load->model('front/front_common_model', '', TRUE);
		require_once APPPATH . 'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();

	}

	public function index() {
		redirect($this->config->item('panel_folder') . '/book/book_list');
	}

	public function book_list() {

		$this->load->library('pagination');

		$total = $this->panel_book_model->countBook();
		$per_page = 40;
		$data['getBook'] = $this->panel_book_model->getBook($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/book/book_list';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Book and Video List';
		$this->load->view('panel/book/book_list', $data);
	}
	function delete_book($id) {
		$this->db->where('id', $id);
		$this->db->delete('book');

		$this->session->set_flashdata('SUCCESS', 'Book and Video Deleted Successfully');
		redirect('panel/book/book_list');
	}

	function add_book() {
		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$photo_image = $_FILES["photo_image"]["name"];
				$array_name = explode(".", $photo_image);
				$ext = end($array_name);

				$photo_image = date('ymdhis') . '.' . $ext;
				$folder = "img/book/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
			} else {
				$photo_image = '';
			}

			$array = array(
				'name' => $this->input->post('name'),
				'isbns' => $this->input->post('isbns'),
				'description' => $this->input->post('description'),
				'slug' => trim($this->input->post('slug')),
				'url' => $this->input->post('url'),
				'price' => $this->input->post('price'),
				'license_key' => $this->input->post('license_key'),
				'book_video_type' => $this->input->post('book_video_type'),
				'is_clothing' => !empty($this->input->post('is_clothing')) ? $this->input->post('is_clothing') : '',
				'is_on_sale' => !empty($this->input->post('is_on_sale')) ? $this->input->post('is_on_sale') : '',
				'sku' => !empty($this->input->post('sku')) ? $this->input->post('sku') : '',
				'description_feed' => !empty($this->input->post('description_feed')) ? $this->input->post('description_feed') : '',
				'availability' => !empty($this->input->post('availability')) ? $this->input->post('availability') : '',
				'google_product_category' => !empty($this->input->post('google_product_category')) ? $this->input->post('google_product_category') : '',
				'brand' => !empty($this->input->post('brand')) ? $this->input->post('brand') : '',
				'gtin' => !empty($this->input->post('gtin')) ? $this->input->post('gtin') : '',
				'mpn' => !empty($this->input->post('mpn')) ? $this->input->post('mpn') : '',
				'identifier_exists' => !empty($this->input->post('identifier_exists')) ? $this->input->post('identifier_exists') : '',
				'condition' => !empty($this->input->post('condition')) ? $this->input->post('condition') : '',
				'photo_image' => $photo_image,
				'created_date' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('book', $array);

			$book_id = $this->db->insert_id();

			if ($this->input->post('type')) {
				foreach ($this->input->post('type') as $type) {
					$array_tag = array(
						'book_id' => $book_id,
						'type' => $type,
					);
					$this->db->insert('book_type', $array_tag);
				}
			}

			$this->session->set_flashdata('SUCCESS', 'Book and Video Created Successfully');
			redirect('panel/book/book_list');

		}
		$data['heder_title'] = 'Add Book and Video';
		$this->load->view('panel/book/add_book', $data);
	}

	function edit_book($id) {

		if (!empty($_POST)) {
			if (!empty($_FILES["photo_image"]["name"])) {
				$name = $_FILES["photo_image"]["name"];

				$array_name = explode(".", $name);
				$ext = end($array_name);

				$photo_image = date('ymdhis') . '.' . $ext;

				$folder = "img/book/";
				move_uploaded_file($_FILES["photo_image"]["tmp_name"], $folder . $photo_image);
				//  move_uploaded_file($_FILES["image_upload"]["tmp_name"], $folder . $_FILES["image_upload"]["name"]);
			} else {
				$photo_image = $this->input->post('old_imagename');
			}

			$array = array(
				'name' => $this->input->post('name'),
				'isbns' => $this->input->post('isbns'),
				'url' => $this->input->post('url'),
				'slug' => trim($this->input->post('slug')),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'license_key' => $this->input->post('license_key'),
				'book_video_type' => $this->input->post('book_video_type'),
				'is_clothing' => !empty($this->input->post('is_clothing')) ? $this->input->post('is_clothing') : '',
				'is_on_sale' => !empty($this->input->post('is_on_sale')) ? $this->input->post('is_on_sale') : '',
				'sku' => !empty($this->input->post('sku')) ? $this->input->post('sku') : '',
				'description_feed' => !empty($this->input->post('description_feed')) ? $this->input->post('description_feed') : '',
				'availability' => !empty($this->input->post('availability')) ? $this->input->post('availability') : '',
				'google_product_category' => !empty($this->input->post('google_product_category')) ? $this->input->post('google_product_category') : '',
				'brand' => !empty($this->input->post('brand')) ? $this->input->post('brand') : '',
				'gtin' => !empty($this->input->post('gtin')) ? $this->input->post('gtin') : '',
				'mpn' => !empty($this->input->post('mpn')) ? $this->input->post('mpn') : '',
				'identifier_exists' => !empty($this->input->post('identifier_exists')) ? $this->input->post('identifier_exists') : '',
				'condition' => !empty($this->input->post('condition')) ? $this->input->post('condition') : '',
				'photo_image' => $photo_image,
			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('book', $array);

			$delete = $this->db->where('book_id', $this->input->post('id'));
			$delete = $this->db->delete('book_type');

			if ($this->input->post('type')) {
				foreach ($this->input->post('type') as $type) {
					$array_tag = array(
						'book_id' => $this->input->post('id'),
						'type' => $type,
					);
					$this->db->insert('book_type', $array_tag);
				}
			}

			$this->session->set_flashdata('SUCCESS', 'Book and Video Updated Successfully');
			redirect('panel/book/book_list');
		}

		$book = $this->db->where('id', $id);
		$book = $this->db->get('book')->row();

		$data['book'] = $book;

		$book_type = $this->db->where('book_id', $id);
		$book_type = $this->db->get('book_type')->result();
		$data['book_type'] = $book_type;

		$data['heder_title'] = 'Edit Book and Video';
		$this->load->view('panel/book/edit_book', $data);
	}

	public function book_order($type = 0) {
		// echo $type;
		// die;

		$data['today'] = $this->panel_book_model->getSalesRecord(date('Y-m-d'), '', '1');

		$data['weekly'] = $this->panel_book_model->getSalesRecord(date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week')));

		$data['monthly'] = $this->panel_book_model->getSalesRecord(date('Y-m-01', strtotime('this month')), date('Y-m-t', strtotime('this month')));

		$data['yearly'] = $this->panel_book_model->getSalesRecord(date('Y-01-01', strtotime('this year')), date('Y-m-t', strtotime('this year')));

		$data['total_sales'] = $this->panel_book_model->getSalesRecordTotal();

// total

		$this->load->library('pagination');

		$total = $this->panel_book_model->countBookorder($type);

		$per_page = 40;

		$data['getBookorder'] = $this->panel_book_model->getBookorder($per_page, $this->uri->segment(5), $type);
		$base_url = base_url() . '/panel/book/book_order/' . $type;

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '5';
		$this->pagination->initialize($config);

		if ($type == 0) {
			$title = 'Processing List';
		} else if ($type == 1) {
			$title = 'Order History';
		} else {
			$title = 'Order Cancelled';
		}
		$data['courier'] = $this->db->get('courier')->result();

		$data['heder_title'] = 'Book and Video Order List';
		$this->load->view('panel/book/book_order', $data);
	}

	function export_excel() {

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

		$objPHPExcel->getActiveSheet()->setCellValue('A1', '#');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Daily Sales Total');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Weekly Sales Total');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Monthly Sales Total');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Yearly Sales Total');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Total');

		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($style_header);
		$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($style_header);

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);

		$row = 2;

		$today = $this->panel_book_model->getSalesRecord(date('Y-m-d'), '', '1');

		$weekly = $this->panel_book_model->getSalesRecord(date('Y-m-d', strtotime('monday this week')), date('Y-m-d', strtotime('sunday this week')));

		$monthly = $this->panel_book_model->getSalesRecord(date('Y-m-01', strtotime('this month')), date('Y-m-t', strtotime('this month')));

		$yearly = $this->panel_book_model->getSalesRecord(date('Y-01-01', strtotime('this year')), date('Y-m-t', strtotime('this year')));

		$total_sales = $this->panel_book_model->getSalesRecordTotal();

		$objPHPExcel->getActiveSheet()->setCellValue('A' . $row, 'Courses Sold Total');
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $today->totalCourse);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $weekly->totalCourse);
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $monthly->totalCourse);
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $yearly->totalCourse);
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $total_sales->totalCourse);

		$row = 3;
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $row, 'Amount (£)');
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, !empty($today->totalAmount) ? number_format($today->totalAmount, 2) : '');
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $row, !empty($weekly->totalAmount) ? number_format($weekly->totalAmount, 2) : '');
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $row, !empty($monthly->totalAmount) ? number_format($monthly->totalAmount, 2) : '');
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, !empty($yearly->totalAmount) ? number_format($yearly->totalAmount, 2) : '');
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $row, !empty($total_sales->totalAmount) ? number_format($total_sales->totalAmount, 2) : '');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="report.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');

	}

	function delete_book_order($id) {
		//$id = $this->input->post('id');

		$this->db->where('book_order.id', $id);
		$this->db->delete('book_order');

		$this->db->where('book_order_item.id', $id);
		$this->db->delete('book_order_item');

		$this->session->set_flashdata('SUCCESS', 'Book Order Deleted Successfully');
		redirect('panel/book/book_order');

	}

	public function StatuschangeOrderBook() {
		$this->db->where('id', $this->input->post('id'));
		$this->db->set('status', $this->input->post('value'));
		$this->db->update('book_order');
		$this->session->set_flashdata('message_string', "Status Successfully Change!");
		$json['sucess'] = true;
		echo json_encode($json);
	}

	public function book_order_detail($id) {

		$getOrder = $this->db->where('id', $id);
		$getOrder = $this->db->get('book_order')->row();

		$getUser = $this->db->where('id', $getOrder->customer_id);
		$getUser = $this->db->get('customer')->row();

		$this->db->select('book_order_item.*,book.name');
		$this->db->from('book_order_item');
		$this->db->join('book', 'book.id = book_order_item.book_id', 'left');
		$this->db->where("book_order_item.order_id", $id);
		$this->db->order_by("book_order_item.id", "asc");
		$getdata = $this->db->get();
		$data['processing_list'] = $getdata->result();
		$data['getOrder'] = $getOrder;

		$data['getUser'] = $getUser;

		$data['heder_title'] = 'Book Order Detail';
		$this->load->view('panel/book/book_order_detail', $data);

	}

	public function printbook($id) {
		$this->load->library('dompdf_gen');
		$getOrder = $this->db->where('id', $id);
		$getOrder = $this->db->get('book_order')->row();

		$getdata = $this->db->select('book_order_item.*,book.name');
		$getdata = $this->db->from('book_order_item');
		$getdata = $this->db->join('book', 'book.id = book_order_item.book_id', 'left');
		$getdata = $this->db->where("book_order_item.order_id", $id);
		$getdata = $this->db->order_by("book_order_item.id", "asc");
		$getdata = $this->db->get()->result();

		$html_sting = '';
		foreach ($getdata as $value) {

			$html_sting .= '
			<tr>
			<td align="left">' . $value->name . '</td>
			<td align="center">' . $value->qty . '</td>
			<td>&pound;' . $value->subtotal . '</td>
			</tr>';
		}

		$html = '<style>
		table {
			display: table; border-collapse: collapse;
		}
		.pricedetail tr td
		{
			font-family:Verdana;
			padding:8px;

		}
		.pricedetail tr th
		{
			font-family:Verdana;
			padding:8px;
		}
		</style>
		<table border="0" width="100%" class="pricedetail" style="margin-top: 5px;">
		<tr>
		<td width="50%" valign="top">
		<p><img src="' . base_url() . 'file/img/booklogo.png"></p>
		<p>' . $getOrder->first_name . ' ' . $getOrder->last_name . '</p>
		<p>' . $getOrder->address . '</p>
		<p>' . $getOrder->zip_code . '</p>
		</td>
		<td valign="top">
		<p>Textbook Point LTD</p>
		<p>17 Highgate High Street,</p>
		<p>London,</p>
		<p>N6 5JT</p>
		<p>Order Number: ' . $getOrder->tracking_no . '</p>
		<p>Order Date: ' . date('M d, Y', strtotime($getOrder->created_date)) . '</p>
		</td>
		</tr>


		</table>
		<table border="1" width="100%" class="pricedetail" style="margin-top: 5px;">
		<tr>
		<th align="left">Product</th>
		<th>Quantity</th>
		<th>Price</th>
		</tr>
		' . $html_sting . '

		<tr>
		<td rowspan="2" align="left">
		<p><b>Customer Notes</b></p>
		<p>No shipping charges - due to combination shipment.</p>

		</td>
		<td align="left"><b>Subtotal</b></td>
		<td><b>&pound;' . $getOrder->total . '</b></td>
		</tr>
		<tr>

		<td align="left"><b>Total</b></td>
		<td><b>&pound;' . $getOrder->total . '</b></td>
		</tr>

		</table>';

		$pdfname = "Invoice" . date('YmdHis') . '.pdf';
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$output = $this->dompdf->output();
		$this->dompdf->stream($pdfname);
		// file_put_contents('public/invoice/' . $pdfname . '', $output);

	}

	public function add_tracking($id) {
		$this->load->model('front/front_common_model', '', TRUE);
		$update1 = $this->db->where('id', $this->input->post('order_no'));
		$update1 = $this->db->set('tracking_no', $this->input->post('tracking_no'));
		$update1 = $this->db->set('courier_id', $this->input->post('courier_id'));
		$update1 = $this->db->update('book_order');

		$getrecord = $this->db->where('id', $this->input->post('order_no'));
		$getrecord = $this->db->get('book_order')->row();

		$data['firstname'] = $getrecord->first_name;
		$data['tracking_no'] = $getrecord->tracking_no;

		$htmlMessage = $this->load->view('mail/book_success_customer_tracking', $data, true);

		$this->front_common_model->sendEmail($getrecord->email, 'Your Order Tracking Number', $htmlMessage);

		$this->session->set_flashdata('SUCCESS', "Tracking Number Successfully add!");
		redirect('panel/book/book_order');
	}

	public function create_feed() {
		$feed_products = [];
		$shop_name = "IELTS Medical";
		$shop_link = base_url();
//LOOP THROUGH PRODUCTS
		$getbook = $this->db->where('book_video_type', 'Book');
		$getbook = $this->db->get('book')->result();

		foreach ($getbook as $key => $product) {
//CREATE EMPTY ARRAY FOR GOOGLE-FRIENDLY INFO
			$gf_product = [];
//FLAGS FOR LATER
			$gf_product['is_clothing'] = $product->is_clothing; //set True or False, depending on whether product is clothing
			$gf_product['is_on_sale'] = $product->is_on_sale; //set True or False depending on whether product is on sale
			//feed attributes
			$gf_product['g:id'] = $product->id;
			$gf_product['g:sku'] = $product->sku;
			$gf_product['g:title'] = $product->name;
			$gf_product['g:description'] = $product->id;
			$gf_product['g:link'] = $shop_link . 'shop/' . $product->slug;
			$gf_product['g:image_link'] = $shop_link . 'img/book/' . $product->photo_image;
			$gf_product['g:availability'] = $product->availability;
			$gf_product['g:price'] = $product->price;
			$gf_product['g:google_product_category'] = $product->google_product_category;
			$gf_product['g:brand'] = $product->brand;
			$gf_product['g:gtin'] = $product->gtin;
			$gf_product['g:mpn'] = $product->mpn;
			$gf_product['g:identifier_exists'] = $product->identifier_exists;
			$gf_product['g:condition'] = $product->condition; //must be NEW or USED

			//remove this IF block if you don't sell any clothing
			// if ($gf_product['is_clothing']) {
			// 	$gf_product['g:age_group'] = $product['age_group']; //newborn/infant/toddle/kids/adult
			// 	$gf_product['g:color'] = $product['color'];
			// 	$gf_product['g:gender'] = $product['gender'];
			// 	$gf_product['g:size'] = $product['size'];
			// }
			// if ($gf_product['is_on_sale']) {
			// 	$gf_product['g:sale_price'] = $product['offer_price'];
			// 	$gf_product['g:sale_price_effective_date'] = $product['sale_startdate'] . " " . 				$product['sale_enddate'];
			// }

			$feed_products[] = $gf_product;
		}

		//CREATE XML
		//close the database connection
		$doc = new DOMDocument('1.0', 'UTF-8');

		$xmlRoot = $doc->createElement("rss");
		$xmlRoot = $doc->appendChild($xmlRoot);
		$xmlRoot->setAttribute('version', '2.0');
		$xmlRoot->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:g', "http://base.google.com/ns/1.0");

		$channelNode = $xmlRoot->appendChild($doc->createElement('channel'));
		$channelNode->appendChild($doc->createElement('title', $shop_name));
		$channelNode->appendChild($doc->createElement('link', $shop_link));

		foreach ($feed_products as $product) {
			$itemNode = $channelNode->appendChild($doc->createElement('item'));
			foreach ($product as $key => $value) {
				if ($value != "") {
					if (is_array($product[$key])) {
						$subItemNode = $itemNode->appendChild($doc->createElement($key));
						foreach ($product[$key] as $key2 => $value2) {
							$subItemNode->appendChild($doc->createElement($key2))->appendChild($doc->createTextNode($value2));
						}
					} else {
						$itemNode->appendChild($doc->createElement($key))->appendChild($doc->createTextNode($value));
					}

				} else {

					$itemNode->appendChild($doc->createElement($key));
				}

			}
		}

		$doc->formatOutput = true;
// echo "<pre>";
		// print_r($doc->saveXML());
		$pdfname = 'book.xml';
		file_put_contents('file/feed/' . $pdfname, $doc->saveXML());

		$this->session->set_flashdata('SUCCESS', "Book Feed Successfully created!");
		redirect('panel/book/book_list');
	}

	function add_book_and_video() {
		$getBook = $this->db->get('book')->result();
		$data['getBook'] = $getBook;

		$customer = $this->db->order_by('username', 'asc');
		$customer = $this->db->get('customer')->result();
		$data['customer'] = $customer;

		$data['heder_title'] = 'Add Book and Video';
		$this->load->view('panel/book/add_book_and_video', $data);
	}

	function add_to_cart() {
		$book_id = $this->input->post('book_id');

		$getBook = $this->db->where('id', $book_id);
		$getBook = $this->db->get('book')->row();

		$data = array(
			"id" => $book_id,
			"name" => 'book',
			"qty" => $this->input->post('qty'),
			"price" => $getBook->price,
		);

		$this->cart->insert($data);

		$this->session->set_flashdata('SUCCESS', 'Book and Video add in Cart');
		redirect('panel/book/add_book_and_video');
	}

	public function remove_cart($rowid) {
		$removed_cart = array(
			'rowid' => $rowid,
			'qty' => 0,
		);
		$this->cart->update($removed_cart);

		$this->session->set_flashdata('SUCCESS', 'Book and Video Deleted Successfully in Cart');
		redirect('panel/book/add_book_and_video');
	}

	public function submit_book() {

		if ($this->input->post('send_invoice')) {
			$payment = '0';
		} else {
			$payment = '0';
		}

		if (!empty($this->input->post('customer_id'))) {
			$customer = $this->db->where('id', $this->input->post('customer_id'));
			$customer = $this->db->get('customer')->row();
			$first_name = $customer->username;
			$last_name = $customer->lastname;
			$email = $customer->email;
		} else {
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
		}

		$reference_number = 'PL' . date('Ymdhis');

		$array = array(
			'reference_number' => $reference_number,
			'customer_id' => $this->input->post('customer_id'),
			// 'course_id' => $this->input->post('course_id'),
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'address' => $this->input->post('address'),
			'country' => $this->input->post('country'),
			'message' => $this->input->post('message'),
			'zip_code' => $this->input->post('zip_code'),
			'phone' => $this->input->post('phone'),
			'total' => $this->cart->total(),
			'international_delivery' => !empty($this->input->post('international_delivery')) ? $this->input->post('international_delivery') : '',
			'created_date' => date('Y-m-d H:i:s'),
			'payment' => $payment,
			'is_admin' => '1',
		);

		$this->db->insert('book_order', $array);
		$last_id = $this->db->insert_id();

		foreach ($this->cart->contents() as $item) {

			$array_item = array(
				'order_id' => $last_id,
				'book_id' => $item['id'],
				'price' => $item['price'],
				'qty' => $item['qty'],
				'subtotal' => $item['subtotal'],
				'created_date' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('book_order_item', $array_item);

		}

		$data['firstname'] = $first_name;
		if ($this->input->post('send_invoice')) {
			$source = '3972';
			$total = $this->cart->total();
			if (!empty($this->input->post('international_delivery'))) {
				$total = $this->cart->total() + $this->input->post('international_delivery');
			}

			$link = $this->front_common_model->MakePayment($last_id, 'book_order', $total, $source);

			$data['link'] = $link;
			$data['reference_number'] = $reference_number;

			$htmlMessage = $this->load->view('mail/book_success_customer_invoice', $data, true);

			$this->front_common_model->sendEmail($email, 'Payment Invoice - IELTS Medical', $htmlMessage);
		}

		// create new client
		if (empty($this->input->post('customer_id'))) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'book_order');
		}

		$this->cart->destroy();

		$this->session->set_flashdata('SUCCESS', 'Book and Video order successfully placed.');

		redirect('panel/book/book_order/0');

	}

	public function getCustomerDetail() {
		$customer_id = $this->input->post('customer_id');
		$customer = $this->db->where('id', $customer_id);
		$customer = $this->db->get('customer')->row();
		if (!empty($customer)) {
			echo json_encode($customer);
		} else {
			$data['username'] = '';
			$data['lastname'] = '';
			$data['email'] = '';
			$data['address'] = '';
			$data['phone'] = '';
			echo json_encode($data);
		}

	}

	function edit_book_order($id) {

		if (!empty($_POST)) {
			$array = array(

				'first_name' => !empty($this->input->post('first_name')) ? $this->input->post('first_name') : '',
				'last_name' => !empty($this->input->post('last_name')) ? $this->input->post('last_name') : '',
				'email' => !empty($this->input->post('email')) ? $this->input->post('email') : '',
				'address' => !empty($this->input->post('address')) ? $this->input->post('address') : '',
				'country' => !empty($this->input->post('country')) ? $this->input->post('country') : '',
				'message' => !empty($this->input->post('message')) ? $this->input->post('message') : '',
				'zip_code' => !empty($this->input->post('zip_code')) ? $this->input->post('zip_code') : '',
				'phone' => !empty($this->input->post('phone')) ? $this->input->post('phone') : '',

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('book_order', $array);

			$this->session->set_flashdata('SUCCESS', 'Book and Order Updated Successfully');
			redirect('panel/book/book_order');
		}

		$book = $this->db->where('id', $id);
		$book = $this->db->get('book_order')->row();

		$data['book'] = $book;

		$data['heder_title'] = 'Edit Book and Order';
		$this->load->view('panel/book/edit_book_order', $data);
	}

	public function ChangePaymentStatus() {
		$this->db->set('payment', $this->input->post('payment'));
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->input->post('table'));

		$json['sucess'] = true;
		echo json_encode($json);
	}

	public function license_key_order() {

		$this->load->library('pagination');
		$total = $this->panel_book_model->countLicenseKeyOrder();

		$per_page = 40;

		$data['getLicenseKeyOrder'] = $this->panel_book_model->getLicenseKeyOrder($per_page, $this->uri->segment(4));
		$base_url = base_url() . '/panel/book/license_key_order';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);

		$data['courier'] = $this->db->get('courier')->result();

		$data['heder_title'] = 'Licence Key Order List';
		$this->load->view('panel/book/license_key_order', $data);
	}

	public function license_key_order_detail($id) {

		$getOrder = $this->db->where('id', $id);
		$getOrder = $this->db->get('book_license_order')->row();

		$getUser = $this->db->where('id', $getOrder->customer_id);
		$getUser = $this->db->get('customer')->row();

		$data['getOrder'] = $getOrder;
		$data['getUser'] = $getUser;

		$data['heder_title'] = 'Licence Key Order Detail';
		$this->load->view('panel/book/license_key_order_detail', $data);

	}

	public function add_tracking_license_key_order($id) {
		$this->load->model('front/front_common_model', '', TRUE);
		$update1 = $this->db->where('id', $this->input->post('order_no'));
		$update1 = $this->db->set('tracking_no', $this->input->post('tracking_no'));
		$update1 = $this->db->set('courier_id', $this->input->post('courier_id'));
		$update1 = $this->db->update('book_license_order');

		$getrecord = $this->db->where('id', $this->input->post('order_no'));
		$getrecord = $this->db->get('book_license_order')->row();

		$data['firstname'] = $getrecord->first_name;
		$data['tracking_no'] = $getrecord->tracking_no;

		$htmlMessage = $this->load->view('mail/book_success_customer_tracking', $data, true);

		$this->front_common_model->sendEmail($getrecord->email, 'Your Order Tracking Number', $htmlMessage);

		$this->session->set_flashdata('SUCCESS', "Tracking Number Successfully add!");
		redirect('panel/book/license_key_order');
	}

	function edit_license_key_order($id) {

		if (!empty($_POST)) {
			$array = array(

				'first_name' => !empty($this->input->post('first_name')) ? $this->input->post('first_name') : '',
				'last_name' => !empty($this->input->post('last_name')) ? $this->input->post('last_name') : '',
				'email' => !empty($this->input->post('email')) ? $this->input->post('email') : '',
				'address' => !empty($this->input->post('address')) ? $this->input->post('address') : '',
				'country' => !empty($this->input->post('country')) ? $this->input->post('country') : '',
				'message' => !empty($this->input->post('message')) ? $this->input->post('message') : '',
				'zip_code' => !empty($this->input->post('zip_code')) ? $this->input->post('zip_code') : '',
				'phone' => !empty($this->input->post('phone')) ? $this->input->post('phone') : '',

			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('book_license_order', $array);

			$this->session->set_flashdata('SUCCESS', 'Book Licence Key Order Updated Successfully');
			redirect('panel/book/license_key_order');
		}

		$book = $this->db->where('id', $id);
		$book = $this->db->get('book_license_order')->row();

		$data['book'] = $book;

		$data['heder_title'] = 'Edit Book Licence Key Order';
		$this->load->view('panel/book/edit_license_key_order', $data);
	}

	function delete_license_key_order($id) {
		$this->db->where('book_license_order.id', $id);
		$this->db->delete('book_license_order');

		$this->session->set_flashdata('SUCCESS', 'Licence Key Order Deleted Successfully');
		redirect('panel/book/license_key_order');

	}

	function add_license_key_order() {
		$getBook = $this->db->where('book_video_type', 'License Key');
		$getBook = $this->db->get('book')->result();
		$data['getBook'] = $getBook;

		$customer = $this->db->order_by('username', 'asc');
		$customer = $this->db->get('customer')->result();
		$data['customer'] = $customer;

		$data['heder_title'] = 'Add License Key Order';
		$this->load->view('panel/book/add_license_key_order', $data);
	}

	public function submit_license_key() {

		if (!empty($this->input->post('customer_id'))) {
			$customer = $this->db->where('id', $this->input->post('customer_id'));
			$customer = $this->db->get('customer')->row();
			$first_name = $customer->username;
			$last_name = $customer->lastname;
			$email = $customer->email;
		} else {
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
		}

		$reference_number = 'PL' . date('Ymdhis');

		$getitem = $this->db->select('book.*');
		$getitem = $this->db->from('book');
		$getitem = $this->db->where("book.id", $this->input->post('license_key_id'));
		$getitem = $this->db->get()->row();

		$array = array(
			'reference_number' => $reference_number,
			'customer_id' => $this->input->post('customer_id'),
			'license_key_id' => $this->input->post('license_key_id'),
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'address' => $this->input->post('address'),
			'country' => $this->input->post('country'),
			'message' => $this->input->post('message'),
			'zip_code' => $this->input->post('zip_code'),
			'phone' => $getitem->price,
			'total' => $this->cart->total(),
			'international_delivery' => !empty($this->input->post('international_delivery')) ? $this->input->post('international_delivery') : '',
			'created_date' => date('Y-m-d H:i:s'),
			'payment' => '0',
			'is_admin' => '1',
		);

		$this->db->insert('book_license_order', $array);
		$last_id = $this->db->insert_id();

		$data['firstname'] = $first_name;
		if ($this->input->post('send_invoice')) {
			$source = '6629';
			$total = $this->cart->total();
			if (!empty($this->input->post('international_delivery'))) {
				$total = $this->cart->total() + $this->input->post('international_delivery');
			}

			$link = $this->front_common_model->MakePayment($last_id, 'book_license_order', $total, $source);

			$data['link'] = $link;
			$data['reference_number'] = $reference_number;

			$htmlMessage = $this->load->view('mail/license_success_customer_invoice', $data, true);

			$this->front_common_model->sendEmail($email, 'Payment Invoice - IELTS Medical', $htmlMessage);
		}

		// create new client
		if (empty($this->input->post('customer_id'))) {
			$this->front_common_model->CreateClient($this->input->post('first_name'), $this->input->post('last_name'), $this->input->post('email'), $last_id, 'customer_id', 'book_license_order');
		}

		$this->session->set_flashdata('SUCCESS', 'Licence key order successfully placed.');

		redirect('panel/book/license_key_order');

	}

	public function printlicensekey($id) {
		$this->load->library('dompdf_gen');
		$this->db->select('book_license_order.*,customer.username,book.license_key,courier.courier_name,courier.courier_website');
		$this->db->from('book_license_order');
		$this->db->join('courier', 'courier.id = book_license_order.courier_id', 'left');
		$this->db->join('customer', 'customer.id = book_license_order.customer_id', 'left');
		$this->db->join('book', 'book.id = book_license_order.license_key_id', 'left');
		$this->db->where('book_license_order.id', $id);
		$printcourse = $this->db->get()->row();

		$html_sting = '';
		$html = '<style>
		table {
			display: table; border-collapse: collapse;
		}
		.pricedetail tr td
		{
			font-family:Verdana;
			padding:8px;

		}
		.pricedetail tr th
		{
			font-family:Verdana;
			padding:8px;
		}
		</style>
		<table border="0" width="100%" class="pricedetail" style="margin-top: 5px;">
		<tr>
			<td valign="top">
			<p><img src="' . base_url() . 'file/img/logo1.png"></p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				Courier : ' . $printcourse->courier_name . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Website : ' . $printcourse->courier_website . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Tracking No : ' . $printcourse->tracking_no . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Licence Key : ' . $printcourse->license_key_name . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				First Name : ' . $printcourse->first_name . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Last Name : ' . $printcourse->last_name . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				 	Address : ' . $printcourse->address . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Post Code : ' . $printcourse->zip_code . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Phone : ' . $printcourse->phone . '
			</td>
		</tr>
		<tr>
			<td valign="top">
				Email : ' . $printcourse->email . '
			</td>
		</tr>

		</table>';

		$pdfname = "Invoice" . date('YmdHis') . '.pdf';
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$output = $this->dompdf->output();
		$this->dompdf->stream($pdfname);
		// file_put_contents('public/invoice/' . $pdfname . '', $output);
	}

	function add_licence($id) {

		$this->load->library('pagination');

		$total = $this->panel_book_model->countLicenceKey($id);
		$per_page = 500;
		$data['getLicence'] = $this->panel_book_model->getLicenceKey($id, $per_page, $this->uri->segment(5));
		$base_url = base_url() . '/panel/book/add_licence/' . $id . '/';

		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '5';
		$this->pagination->initialize($config);

		$data['heder_title'] = 'Add and List Licence';
		$data['book_id'] = $id;
		$this->load->view('panel/book/add_licence', $data);
	}

	public function upload_licence_individual() {

		$check = $this->db->where('licence_key_name', trim(strtoupper($this->input->post('licence_key_name'))));
		$check = $this->db->where('book_id', $this->input->post('book_id'));
		$check = $this->db->get('book_licence_key')->num_rows();
		if ($check == 0) {
			$arrays = array(
				'licence_key_name' => trim(strtoupper($this->input->post('licence_key_name'))),
				'book_id' => $this->input->post('book_id'),

			);

			$this->db->insert('book_licence_key', $arrays);
		}
		$this->session->set_flashdata('SUCCESS', "Licence key created successfully! ");
		redirect('panel/book/add_licence/' . $this->input->post('book_id'));

	}

	public function upload_licence_excel() {

		if ($_FILES['result_file']['size'] > 0) {
			$newfile = 'public/licence/';
			$picturename = date('YmdHis') . $_FILES['result_file']['name'];
			move_uploaded_file($_FILES['result_file']['tmp_name'], $newfile . $picturename);

			$file_type = PHPExcel_IOFactory::identify($newfile . $picturename);

			$objReader = PHPExcel_IOFactory::createReader($file_type);
			$objPHPExcel = $objReader->load($newfile . $picturename);
			$sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

			foreach ($sheet_data as $value) {

				if (!empty($value['A'])) {
					$chcked = $this->db->where('book_id', $this->input->post('book_id'));
					$chcked = $this->db->where('licence_key_name', $value['A']);
					$chcked = $this->db->get('book_licence_key')->num_rows();
					if ($chcked == 0) {
						$arrays = array(
							'licence_key_name' => trim($value['A']),
							'book_id' => $this->input->post('book_id'),
						);

						$this->db->insert('book_licence_key', $arrays);
					}
				}
			}
		}

		$this->session->set_flashdata('SUCCESS', "Licence key created successfully! ");
		redirect('panel/book/add_licence/' . $this->input->post('book_id'));

	}

	public function delete_licence($book_id, $id) {
		$this->db->where('id', $id);
		$this->db->delete('book_licence_key');
		$this->session->set_flashdata('SUCCESS', "Licence key deleted successfully! ");
		redirect('panel/book/add_licence/' . $book_id);
	}

}
