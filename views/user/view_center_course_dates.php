<?php
$this->load->view('header/header');
?>
<link rel="stylesheet" href="<?=base_url()?>file/css/dashboard.css">
  <style type="text/css">
        table {
  width: 100%;
  border-collapse: collapse;
}
/* Zebra striping */
tr:nth-of-type(even) {
  background: #eee;
}
th {
  color: gray;
  font-weight: bold;
  border-bottom: 1px solid gray;
  border-top: 1px solid gray;
}
td, th {
  padding: 6px;
  text-align: left;
}

@media
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

  /* Force table to not be like tables anymore */
  table, thead, tbody, th, td, tr {
    display: block;
  }

  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  tr { border: 1px solid #ccc; }

  td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
  }

  td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
  }
  td:nth-of-type(1):before { content: "Course Name"; }
  td:nth-of-type(2):before { content: "Start Date"; }
  td:nth-of-type(3):before { content: "End Date"; }
  td:nth-of-type(4):before { content: "Time"; }
  td:nth-of-type(5):before { content: "Vanue"; }
  td:nth-of-type(6):before { content: "Fee"; }
  td:nth-of-type(7):before { content: "Places"; }

}
      </style>


<!-- Start faq Area -->
      <section class="faq-area section-gap" id="faq" style="margin-top: 50px;">
        <div class="container">
          <div class="row">

<?php
$this->load->view('header/sidebar');
?>
        <div class="col-lg-9">


<section class="faq-area section-gap">
    <table class="table table-striped">
    <thead>
      <tr>
        <th colspan="3">Course and Exam Date Detail</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>Customer Name</td>
        <td>:</td>
        <td><?=$upComming->username?></td>
      </tr>
      <tr>
          <td>Centre Course</td>
            <td>:</td>
        <td><?=$upComming->course?></td>
      </tr>
      <tr>
            <td>Candidate Number</td>
              <td>:</td>
        <td><?=$upComming->candidate_number?> </td>
      </tr>
      <tr>
        <td>NMC Number</td>
          <td>:</td>
        <td><?=$upComming->nmc_id_number?></td>
      </tr>
      <tr>
        <td>DOB</td>
          <td>:</td>
        <td><?=$upComming->dob?></td>
      </tr>
      <tr>
        <td>Country Study</td>
          <td>:</td>
        <td><?=$upComming->country_of_study?></td>
      </tr>
      <tr>
        <td>Nationality</td>
          <td>:</td>
        <td><?=$upComming->nationality?></td>
      </tr>
      <tr>
        <td>Location</td>
          <td>:</td>
        <td><?=$upComming->location?></td>
      </tr>
      <tr>
        <td>Phone</td>
          <td>:</td>
        <td><?=$upComming->phone?></td>
      </tr>
      <tr>
        <td>First Name</td>
          <td>:</td>
        <td><?=$upComming->first_name?></td>
      </tr>
      <tr>
        <td>Last Name</td>
          <td>:</td>
        <td><?=$upComming->last_name?></td>
      </tr>
      <tr>
        <td>Email</td>
          <td>:</td>
        <td><?=$upComming->email?></td>
      </tr>
      <tr>
        <td>Exam Before</td>
          <td>:</td>
        <td><?=$upComming->exam_before?></td>
      </tr>
      <tr>
        <td>Exam Upcoming</td>
          <td>:</td>
        <td><?=$upComming->exam_upcoming?></td>
      </tr>
      <tr>
        <td>Exam Date</td>
          <td>:</td>
        <td>   <?=date('d-m-Y', strtotime($upComming->exam_date));?></td>
      </tr>
      <tr>
        <td>Number Nights</td>
          <td>:</td>
        <td><?=$upComming->number_of_nights?></td>
      </tr>
       <tr>
        <td>Accommodation Need</td>
          <td>:</td>
        <td><?=$upComming->accommodation_need?></td>
      </tr>
       <tr>
        <td>Created Date</td>
          <td>:</td>
        <td> <?=date('d-m-Y h:i A', strtotime($upComming->created_date));?></td>
      </tr>
    </tbody>
  </table>



        </div>
      </section>



          </div>
          </div>
        </div>
      </section>





<?php
$this->load->view('header/footer');
?>



