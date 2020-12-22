


 <?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Sendemail extends CI_Controller {
  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('user_logged_in')) {
      redirect($this->config->item('panel_folder') . '/login');
      exit();
    }

//    $this->load->model('panel/panel_sendemail_model', '', TRUE);

  }

  function index() {
    redirect($this->config->item('panel_folder') . '/page/sendemail');
   //  $this->load->view('panel/sendemail/sendemail');
  }



 public function sendemail()
 {
  $subject = 'Application for Programmer Registration By - ' . $this->input->post("name");
  $programming_languages = implode(", ", $this->input->post("programming_languages"));
  $file_data = $this->upload_file();
  if(is_array($file_data))
  {
   $message = '
   <h3 align="center">Programmer Details</h3>
    <table border="1" width="100%" cellpadding="5">
     <tr>
      <td width="30%">Name</td>
      <td width="70%">'.$this->input->post("name").'</td>
     </tr>
     <tr>
      <td width="30%">Address</td>
      <td width="70%">'.$this->input->post("address").'</td>
     </tr>
     <tr>
      <td width="30%">Email Address</td>
      <td width="70%">'.$this->input->post("email").'</td>
     </tr>
     <tr>
      <td width="30%">Progamming Language Knowledge</td>
      <td width="70%">'.$programming_languages.'</td>
     </tr>
     <tr>
      <td width="30%">Experience Year</td>
      <td width="70%">'.$this->input->post("experience").'</td>
     </tr>
     <tr>
      <td width="30%">Phone Number</td>
      <td width="70%">'.$this->input->post("mobile").'</td>
     </tr>
     <tr>
      <td width="30%">Additional Information</td>
      <td width="70%">'.$this->input->post("additional_information").'</td>
     </tr>
    </table>
   ';


   $this->load->library('email');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        $this->email->from('info@.co.uk', 'Testing');
        $this->email->to('vipuldayani55@gmail.com');
        
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send())
        {
            echo "success";
            // die;
        }
 
 

   // $config = Array(
   //       'protocol'  => 'smtp',
   //       'smtp_host' => 'smtpout.secureserver.net',
   //       'smtp_port' => 80,
   //       'smtp_user' => 'xxxxxxxxxx', 
   //       'smtp_pass' => 'xxxxxxxxxx', 
   //       'mailtype'  => 'html',
   //       'charset'  => 'iso-8859-1',
   //       'wordwrap'  => TRUE
   //    );
   //$file_path = 'uploads/' . $file_name;
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($this->input->post("email"));
      $this->email->to('vipuldayani55@gmail.com');
      $this->email->subject($subject);
         $this->email->message($message);
         $this->email->attach($file_data['full_path']);
         if($this->email->send())
         {
          if(delete_files($file_data['file_path']))
          {
           $this->session->set_flashdata('message', 'Application Sended');
           redirect('sendemail');
          }
         }
         else
         {
          if(delete_files($file_data['file_path']))
          {
           $this->session->set_flashdata('message', 'There is an error in email send');
           redirect('sendemail');
          }
         }
     }
     else
     {
      $this->session->set_flashdata('message', 'There is an error in attach file');
        // redirect('sendemail');
     }

     $this->load->view('panel/sendemail/sendemail');    
 }



 function upload_file()
 {
  $config['upload_path'] = 'img/';
  $config['allowed_types'] = 'doc|docx|pdf';
  $this->load->library('upload', $config);
  if($this->upload->do_upload('resume'))
  {
   return $this->upload->data();   
  }
  else
  {
   return $this->upload->display_errors();
  }
 }
}