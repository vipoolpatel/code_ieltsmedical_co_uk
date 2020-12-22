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
        <th colspan="3">Order Detail</th>
      </tr>
    </thead>
    <tbody>


      <tr>
          <td>First Name</td>
            <td>:</td>
        <td><?=$getRecord->first_name?></td>
      </tr>
      <tr>
            <td>Last Name</td>
              <td>:</td>
        <td><?=$getRecord->last_name?>	</td>
      </tr>
      <tr>
        <td>Email</td>
          <td>:</td>
        <td><?=$getRecord->email?></td>
      </tr>
      <tr>
        <td>Address</td>
          <td>:</td>
        <td><?=$getRecord->address?></td>
      </tr>
      <tr>
        <td>Country</td>
          <td>:</td>
        <td><?=$getRecord->country?></td>
      </tr>
      <tr>
        <td>Message</td>
          <td>:</td>
        <td><?=$getRecord->message?></td>
      </tr>
      <tr>
        <td>Post code</td>
          <td>:</td>
        <td><?=$getRecord->zip_code?></td>
      </tr>
      <tr>
        <td>Total</td>
          <td>:</td>
        <td>&pound;<?=$getRecord->total?></td>
      </tr>


       <tr>
        <td>Created Date</td>
          <td>:</td>
        <td> <?=date('d-m-Y h:i A', strtotime($getRecord->created_date));?></td>
      </tr>
    </tbody>
  </table>


   <table class="table table-striped">
    <thead>
       <tr>
          <th>#</th>
          <th>Item Name</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>


       <?php
if (!empty($getitem)) {
	foreach ($getitem as $value) {?>
                        <tr>
                            <td><?=$value->id?></td>
                            <td><?=$value->name?></td>
                            <td>&pound;<?=$value->price?></td>
                            <td><?=$value->qty?></td>
                            <td>&pound;<?=$value->subtotal?></td>
                        </tr>
                   <?php }
} else {?>
                    <tr>
                        <td colspan="100%">No record found!</td>
                    </tr>
              <?php }

?>
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



