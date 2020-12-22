<?php
$this->load->view('header/header');
?>
<style type="text/css">

 
   
@media only screen and (max-width: 768px) {

  .respon
   {
      width: 100% !important;
   }

}



   .table-data  {
   width: 100%;
   border-collapse: collapse;
   }
   /* Zebra striping */
   .table-data tr:nth-of-type(even) {
   background: #eee;
   }
   .table-data th {
   color: gray;
   font-weight: bold;
   border-bottom: 1px solid gray;
   border-top: 1px solid gray;
   }
  .table-data  td, th {
   padding: 6px;
   text-align: left;
   }
   @media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px)  {
   /* Force table to not be like tables anymore */
  .table-data {
      display: block;
   }
   .table-data-thead {
      display: block;
   }

  .table-data-tbody {
      display: block;
   }

  .table-data-th{
      display: block;
   }

   .table-data-td {
      display: block;
   }

   .table-data-tr {
      display: block;
   }



   /* Hide table headers (but not display: none;, for accessibility) */
   .table-data thead tr {
   position: absolute;
   top: -9999px;
   left: -9999px;
   }
   .table-data tr { border: 1px solid #ccc; }
  .table-data  td {
   /* Behave  like a "row" */
   border: none;
   border-bottom: 1px solid #eee;
   position: relative;
   padding-left: 50%;
   }
  .table-data  td:before {
   /* Now like a table header */
   position: absolute;
   /* Top/left values mimic padding */
   top: 6px;
   left: 6px;
   width: 45%;
   padding-right: 10px;
   white-space: nowrap;
   }
   .table-data td:nth-of-type(1):before { content: "#"; }
   .table-data td:nth-of-type(2):before { content: "Course name"; }
   .table-data td:nth-of-type(3):before { content: "Description"; }
   .table-data td:nth-of-type(4):before { content: "Start Date"; }
   .table-data td:nth-of-type(5):before { content: "End Date"; }
   .table-data td:nth-of-type(6):before { content: "Time"; }
   .table-data td:nth-of-type(7):before { content: "Venue"; }
   .table-data td:nth-of-type(8):before { content: "Fee"; }
   .table-data td:nth-of-type(9):before { content: "Book Now"; }
   }

   
</style>
<section class="generic-banner relative">
   <div class="overlay overlay-bg"></div>
   <div class="container">
      <div class="row height align-items-center justify-content-center">
         <div class="col-lg-10">
            <div class="generic-banner-content">
               <h2 class="text-white">Course and Exam Dates</h2>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="faq-area section-gap" id="faq">
   <div class="container" style="text-align:center">
      <a href="?type=Course" class="genric-btn info">Courses</a>
      <a href="?type=Exam" class="genric-btn info ">Exams</a>
      <br /><br />
   </div>
   <div class="container">
      <div class="row">
         <div class="col-lg-12  col-md-12">
            <?php
$this->load->view('message');
?>

            <?php
if (!empty($this->input->get('type')) && $this->input->get('type') == 'Exam') {
	?>
            <form action="" method="get">
                <input type="hidden" class="form-control" value="<?=!empty($this->input->get('type')) ? $this->input->get('type') : ''?>" name="type">
               <div class="input-group mb-3">

                  <input type="text" class="form-control respon" value="<?=!empty($this->input->get('course')) ? $this->input->get('course') : ''?>" name="course"  placeholder="Search" >

                  <input type="text" class="form-control datepicker_new respon" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" name="start_date"  placeholder="Exam Date">

                  <input type="text" class="form-control datepicker_new respon" value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" name="end_date"  placeholder="Closing Date" >

                    <input type="text" class="form-control respon" value="<?=!empty($this->input->get('fee')) ? $this->input->get('fee') : ''?>" name="fee"  placeholder="Fee" aria-describedby="basic-addon2">


                  <div class="input-group-append">
                     <button class="genric-btn info" type="submit">Search Now</button>
                  </div>
                  <div class="input-group-append">
                     <a class="genric-btn info" href="<?=base_url()?>centre-course-dates">Reset</a>
                  </div>
               </div>
            </form>

            <?php } else {?>

              <form action="" method="get">
                <input type="hidden" class="form-control" value="<?=!empty($this->input->get('type')) ? $this->input->get('type') : ''?>" name="type">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" value="<?=!empty($this->input->get('course')) ? $this->input->get('course') : ''?>" name="course" required placeholder="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                     <button class="genric-btn info" type="submit">Search Now</button>
                  </div>
                  <div class="input-group-append">
                     <a class="genric-btn info" href="<?=base_url()?>centre-course-dates">Reset</a>
                  </div>
               </div>
            </form>

<?php }
?>


            <br>
            <table class="table-data">
               <thead class="table-data-thead">
                  <tr class="table-data-tr">
                     <th class="table-data-th">#</th>
                     <th class="table-data-th">Course name</th>
                     <th class="table-data-th">Description</th>
                     <th class="table-data-th">
                        <?php
if (!empty($this->input->get('type')) && $this->input->get('type') == 'Exam') {
	echo "Exam Date";
} else {
	echo "Start Date";
}
?>
                     </th>
                     <th class="table-data-th">
                        <?php
if (!empty($this->input->get('type')) && $this->input->get('type') == 'Exam') {
	echo "Registration Closing Date";
} else {
	echo "End Date";
}
?>
                     </th>
                     <?php
if (!empty($this->input->get('type')) && $this->input->get('type') == 'Exam') {?>
                     <th class="table-data-th">Result Date</th>
                     <?php }
?>
                     <th class="table-data-th">Time</th>
                     <th class="table-data-th">Venue</th>
                     <th class="table-data-th">Fee</th>
                     <th class="table-data-th">Book Now</th>
                  </tr>
               </thead>
               <tbody class="table-data-tbody">
                  <?php
foreach ($getDate as $value) {
	?>
                  <tr>
                     <td class="table-data-td"><?=$value->id?></td>
                     <td class="table-data-td"><?=$value->course?></td>
                     <td class="table-data-td"><?=$value->description?></td>
                     <td class="table-data-td"><?=date('d-m-Y', strtotime($value->start_date))?></td>
                     <td class="table-data-td"><?php
if ($value->end_date != '0000-00-00') {
		echo date('d-m-Y', strtotime($value->end_date));
	}
	?></td>
                     <?php
if (!empty($this->input->get('type')) && $this->input->get('type') == 'Exam') {
		?>
                     <td class="table-data-td"><?php
if ($value->result_date != '0000-00-00') {
			echo date('d-m-Y', strtotime($value->result_date));
		}
		?></td>
                     <?php }
	?>
                     <td class="table-data-td"><?=$value->time?></td>
                     <td class="table-data-td"><?=$value->venue?></td>
                     <td class="table-data-td">&pound;<?=number_format($value->fee, 2)?></td>
                     <td class="table-data-td"><a class="genric-btn info-border" href="<?=base_url()?>centre-course-dates/book?id=<?=base64_encode($value->id)?>"> Book</a></td>
                  </tr>
                  <?php
}
?>
               </tbody>
            </table>
            <!-- Type here -->
         </div>
      </div>
   </div>
</section>
<?php
$this->load->view('header/common_book');
?>
<?php
$this->load->view('header/footer');
?>
<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>

<script>
$(document).ready(function() {
     $('.datepicker_new').datepicker({
       format: 'dd-mm-yyyy',
   });
});

</script>
