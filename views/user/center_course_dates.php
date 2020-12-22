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
                      <table>
                             <thead>
                               <tr>
                                 <th>ID</th>
                                 <th>Customer Name</th>
                                    <th>Centre Course</th>
                                   <th>More Now</th>
                               </tr>
                             </thead>
                             <tbody>
                             <?php
foreach ($upComming as $value) {

	?>
                               <tr>
                                 <td><?=$value->id?></td>
                                 <td><?=$value->username?></td>
                                 <td><?=$value->course?></td>
                                 <td><a class="genric-btn info-border" href="<?=base_url()?>user/view_center_course_dates?id=<?=base64_encode($value->id)?>"> More</a></td>
                               </tr>
                               <?php
}
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