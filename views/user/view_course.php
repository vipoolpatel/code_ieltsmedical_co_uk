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
        <th colspan="3">Course Detail</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>Customer Name</td>
        <td>:</td>
        <td><?=$upComming->username?></td>
      </tr>
      <tr>
          <td>Courier</td>
            <td>:</td>
        <td><?=$upComming->courier_name?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$upComming->courier_website?></td>
      </tr>
      <tr>
            <td>Tracking No</td>
              <td>:</td>
        <td><?=$upComming->tracking_no?> </td>
      </tr>
      <tr>
        <td>Reference Number</td>
          <td>:</td>
        <td><?=$upComming->reference_number?></td>
      </tr>
      <tr>
        <td>Course Name</td>
          <td>:</td>
        <td><?=$upComming->course_name?></td>
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
        <td>Phone</td>
          <td>:</td>
        <td><?=$upComming->phone?></td>
      </tr>
      <tr>
        <td>Email</td>
          <td>:</td>
        <td><?=$upComming->email?></td>
      </tr>

      <tr>
        <td>Do you have an upcoming exam? </td>
          <td>:</td>
        <td>  <?=$upComming->upcoming_exam?></td>
      </tr>
      <?php
if ($upComming->upcoming_exam == 'Yes') {
	?>
      <tr>
        <td>Exam date </td>
          <td>:</td>
        <td><?=$upComming->exam_date?></td>
      </tr>

    <?php }
?>

<tr>
  <td>Taken the OET exam before? </td>
    <td>:</td>
  <td>    <?=$upComming->osce_exam_before?>
  </td>
</tr>

<tr>
  <td>Fee</td>
    <td>:</td>
  <td>         &pound;<?=$upComming->price?>
  </td>
</tr>

<tr>
  <td>Shared accommodation required</td>
  <td>:</td>
  <td><?=($upComming->accomodation == '0') ? 'No' : 'Yes'?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($upComming->accomodation == 1) {
	?>
      <?=$upComming->accomodation_qty?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&pound;<?=$upComming->total_accomodation?>
      <?php }
?>

  </td>
</tr>



<tr>
  <td>Private accommodation required</td>
  <td>:</td>
  <td><?=($upComming->private_accomodation == '0') ? 'No' : 'Yes'?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($upComming->private_accomodation == 1) {
	?>
      <?=$upComming->private_accomodation_qty?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&pound;<?=$upComming->total_private_accomodation?>
      <?php }
?>

  </td>
</tr>

<tr>
  <td>Meals required</td>
  <td>:</td>
  <td> <?=($upComming->meals == '0') ? 'No' : 'Yes'?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($upComming->meals == 1) {
	?>
    <?=$upComming->meals_qty?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &pound;<?=$upComming->total_meals?>
  <?php }
?>
  </td>
</tr>







<tr>
  <td>Company Code</td>
    <td>:</td>
  <td>       <?=$upComming->company_code?>
  </td>
</tr>

<tr>
  <td>Company <?=($upComming->company_type == '0') ? '%' : 'Amount'?></td>
    <td>:</td>
  <td>        <?=$upComming->company_price?>
  </td>
</tr>

<tr>
  <td>Total</td>
    <td>:</td>
  <td>

      &pound;<?=$upComming->final_total?>
  </td>
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
